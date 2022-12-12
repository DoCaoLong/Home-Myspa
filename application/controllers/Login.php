<?php
require APPPATH . '/libraries/Mobile_Detect.php';

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url", "form",'lib_helper'));
        $this->load->library(array("form_validation", "session"));
        $this->load->model(array('muser', 'maction_log', 'mrole', 'muser_group','mcompany_info','mforgot_password','mip_blocked','mapi_token','mcompany_contract','mip_priviledge','mlog'));
        $this->load->database();

    }

    public function index()
    {
        $this->load->view('layout/login');
    }

    public function login()
    {
        $from_ip        = $_SERVER['REMOTE_ADDR'];
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $this->session->set_flashdata('general_error', '');
        $this->session->set_flashdata('email_error', '');
        $this->session->set_flashdata('password_error', '');
        $this->session->set_flashdata('login_error', '');

        $submit_form = cleanupentries($this->input->post('submit_form'));
        $email = cleanupentries($this->input->post('email'));
        $password = cleanupentries($this->input->post('password'));

        $date_time = date("Y-m-d H:i:s");

        //check spam
        $content_check = $email;
        if (!$this->check_nospam($from_ip,$content_check)) {
            echo 'Login 5 times fail, please try again after 15 minutes or contact 0899310908 / Đăng nhập quá 5 lần không thành công, vui lòng thử lại sau 15 phút hoặc liên hệ 0899310908';
            exit;
        }
        //end check

        $check_api_login = false;
        $api_user_token = isset($_SERVER['HTTP_USER_TOKEN']) ? $_SERVER['HTTP_USER_TOKEN'] : '';

        if (isset($api_user_token) && trim($api_user_token) != '') {
            $api_uid = $this->mapi_token->get_uid_by_token($api_user_token);
            if ($api_uid) {
                $api_user = $this->muser->get_data($api_uid);
                if ($api_user) {
                    $email = $api_user['email'];
                    $password = $api_user['password'];
                    $check_api_login = true;
                    $submit_form = true;
                }
            }
        }

        $data['company_info'] = $this->mcompany_info->get_data();
        $data['company_contract'] = $this->mcompany_contract->get_data();
        $company_contract = $data['company_contract'];

        if ($submit_form) {
            $flag = true;
            if (empty($email)) {
                $flag = false;
                $this->session->set_flashdata('email_error', '<span style="color:red">Trường Bắt Buộc Nhập</span>');
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $flag = false;
                    $this->session->set_flashdata('email_error', '<span style="color:red">Email không hợp lệ</span>');
                }
            }
            if (empty($password)) {
                $flag = false;
                $this->session->set_flashdata('password_error', '<span style="color:red">Trường Bắt Buộc Nhập</span>');
            } else {
                if (strlen($password) < 6) {
                    $flag = false;
                    $this->session->set_flashdata('password_error', '<span style="color:red">Password quá ngắn, cần 6 kí tự trở lên</span>');
                }
            }
            if ($flag == false) {
                $log_arr = array(
                    'uid'          => -1, //guess
                    'action'       => LOGIN_FAIL,
                    'action_table' => TABLE_USER,
                    'email'        => $email,
                    'reference_id' => -1, //guess
                    'date_time'    => $date_time,
                    'from_ip'      => $from_ip
                );
                $this->maction_log->add_data($log_arr);

                $slack_msg = $email.' vừa đăng nhập '.base_url().' ko thành công *[do sai thông tin đăng nhập]*.';
                slack($slack_msg,"canhbao");

                $this->load->view('layout/login',$data);
            } else {
                $password_check = ($check_api_login === true) ? $password : md5($password);
                $date_time      = date("Y-m-d H:i:s");
                $user_check     = $this->muser->get_user($email, $password_check);

                if ( $user_check != false ) {
                    $mobile_detect = new Mobile_Detect;
                    $manager_app = ($mobile_detect->isMobile() && !$mobile_detect->is('Firefox') && !$mobile_detect->is('Chrome')
                        && !$mobile_detect->is('Safari') && !$mobile_detect->is('IE')
                        && !$mobile_detect->is('UC Browser') && !$mobile_detect->is('Kindle Fire')
                        && !$mobile_detect->is('Opera') && !$mobile_detect->is('Dolfin')
                    )?1:0;

                    if ($company_contract['status_number_account'] == 1) {
                        if ($user_check['id'] != ROOT_ADMIN_ID && ($user_check['status'] == INACTIVE || $user_check['loginable'] == 0) ) {
                            $this->session->set_flashdata('login_error', '<span style="color:red">Bạn không có quyền vào hệ thống</span>');

                            $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' ko thành công *[do ko có quyền vào hệ thống]*.';
                            slack($slack_msg,"canhbao");

                            $this->load->view('layout/login',$data);
                        } else {
                            $log_arr = array(
                                'uid'          => $user_check['id'],
                                'action'       => LOGIN,
                                'action_table' => TABLE_USER,
                                'email'        => $email,
                                'reference_id' => $user_check['id'],
                                'date_time'    => $date_time,
                                'from_ip'      => $from_ip
                            );
                            if($user_check['id'] != ROOT_ADMIN_ID){
                                if(isset($data['company_contract']['status']) && $data['company_contract']['status'] == INACTIVE) {
                                    $this->session->set_flashdata('general_error', '<span class="text-danger">Hệ thống tạm ngưng vì quá thời gian sử dụng. Quý Khách hàng vui lòng gọi số hotline 093 566 6158 để gia hạn hợp đồng. Xin cảm ơn!</span>');

                                    $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' ko thành công *[do quá thời hạn sử dụng]*.';
                                    slack($slack_msg,"thongbaoquantrong");

                                    $this->load->view('layout/login',$data);
                                    return;
                                }
                            }
                            $this->session->set_userdata('user_id', $user_check['id']);
                            $this->session->set_userdata('username', $email);
                            $this->session->set_userdata('fullname', $user_check['fullname']);
                            $this->session->set_userdata('password', $password);
                            $this->session->set_userdata('image', $user_check['image']);
                            $this->session->set_userdata('user_group_id', $user_check['user_group_id']);
                            $this->session->set_userdata('user_role', $user_check['role_id']);
                            $this->session->set_userdata('branch_id', $user_check['branch_id']);

                            $user_data = $this->muser->get_data($user_check['id']);
                            $created_by_name = $this->muser->get_data($user_data['created_by_id'])['fullname'];
                            $site_lang = (isset($user_data['site_lang']) && $user_data['site_lang'] != '') ? $user_data['site_lang'] : $this->config->item('language');
                            $this->session->set_userdata('site_lang', $site_lang);
                            $site_currency = (isset($user_data['site_currency']) && $user_data['site_currency'] != '') ? json_decode($user_data['site_currency'],true) : $this->config->item('base_currency');
                            $this->session->set_userdata('site_currency', $site_currency);
                            
                            //IP BLOCKED
                            $ips_data = $this->mip_blocked->get_data(1);
                            $ip_priviledge  = $this->mip_priviledge->get_data(1);
                            $group_arr      = json_decode($ip_priviledge['group']);
                            $user_group_id  = $this->session->userdata('user_group_id') ? explode('|',($this->session->userdata('user_group_id'))) : $this->session->userdata('user_group_id');
                            if (isset($ips_data['status']) && $ips_data['status'] == 1) {
                                $ip_add = get_client_ip_env();
                                if ($group_arr != null && count($group_arr) > 0) {
                                    foreach ($group_arr as $g_arr) {
                                        if ($user_group_id != '' && count($user_group_id) > 0) {
                                            foreach ($user_group_id as $us_gr) {
                                                if ($g_arr == $us_gr) {
                                                    if (isset($ips_data['ips']) && $ips_data['ips'] != '') {
                                                        $ip_arr = explode('|',$ips_data['ips']);
                                                        if (!in_array($ip_add,$ip_arr) && $ip_add != IP_ACCESS) {
                                                            echo 'Service denied!';
                                                            exit;
                                                        }
                                                    } 
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            $this->maction_log->add_data($log_arr);

                            if( $this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE ) {
                                $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' thành công.';
                                if(in_array($user_check['email'], $this->config->item('except_emails'))){
                                    slack($slack_msg,"canhbao");
                                } else {
                                    $slack_msg .= ' *['.$created_by_name.']* lưu ý hỗ trợ KH kịp thời. Cám ơn!';
                                    slack($slack_msg,"thongbaoquantrong");
                                }
                            }

                            if (!empty($company_contract) && $company_contract['date_end'] != '' && $company_contract['date_end'] != '0000-00-00 00:00:00') {
                                if ($company_contract['last_date_login_notify'] != date("Y-m-d") && $user_check['email'] != SUPPORT_EMAIL){
                                    $data_last_date_login_notify = array('last_date_login_notify' => date("Y-m-d"));
                                    $this->mcompany_contract->update_or_create_data($data_last_date_login_notify,1);
                                    $date_end = strtotime($company_contract['date_end']);
                                    $remain_days = seconds_to_day_conversion($date_end - strtotime(date('Y-m-d', strtotime('now'))));
                                    $slack_msg_check_expired = base_url().' | '.$company_contract['company_name'].' | '.$company_contract['plan'].' | '.$company_contract['fullname'].' | '.$company_contract['telephone'].' | '.$company_contract['email'].' | '.$company_contract['address'].': '.' start ngày '.format_date_for_view($company_contract['date_start']).' hết hạn ngày '.format_date_for_view($company_contract['date_end']);
                                    $slack_msg_check_expired .= '. Đăng nhập từ: *'.(($manager_app == 1)?'Myspa Manager':'Browser').'* | đăng nhập lần gần nhất: '.format_date_for_view($company_contract['last_date_login_notify']).'. Số ngày còn lại: *['.$remain_days.' ngày]*';
                                    if($remain_days <= 30){
                                        slack($slack_msg_check_expired,"canhbaogiahan");
                                    } else {
                                        slack($slack_msg_check_expired,"canhbao");
                                    }
                                }
                            }

                            $merchant_app_param = ($this->input->get('merchant_app') == 1) ? '?merchant_app=1' : ''; redirect(base_url() . 'dashboard'.$merchant_app_param);
                        }
                    }
                    else {
                        if ($user_check['id'] != ROOT_ADMIN_ID && ($user_check['status'] == INACTIVE) ) {
                            $this->session->set_flashdata('login_error', '<span style="color:red">Bạn không có quyền vào hệ thống</span>');

                            $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' ko thành công *[do ko có quyền vào hệ thống]*.';
                            slack($slack_msg,"canhbao");

                            $this->load->view('layout/login',$data);
                        } else {
                            $log_arr = array(
                                'uid'          => $user_check['id'],
                                'action'       => LOGIN,
                                'action_table' => TABLE_USER,
                                'email'        => $email,
                                'reference_id' => $user_check['id'],
                                'date_time'    => $date_time,
                                'from_ip'      => $from_ip
                            );
                            if($user_check['id'] != ROOT_ADMIN_ID){
                                if(isset($data['company_contract']['status']) && $data['company_contract']['status'] == INACTIVE) {
                                    $this->session->set_flashdata('general_error', '<span class="text-danger">Hệ thống tạm ngưng vì quá thời gian sử dụng. Quý Khách hàng vui lòng gọi số hotline 0899 310 908 để gia hạn hợp đồng. Xin cảm ơn!</span>');

                                    $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' ko thành công *[do quá thời hạn sử dụng]*.';
                                    slack($slack_msg,"thongbaoquantrong");

                                    $this->load->view('layout/login',$data);
                                    return;
                                }
                            }
                            $this->session->set_userdata('user_id', $user_check['id']);
                            $this->session->set_userdata('username', $email);
                            $this->session->set_userdata('fullname', $user_check['fullname']);
                            $this->session->set_userdata('password', $password);
                            $this->session->set_userdata('image', $user_check['image']);
                            $this->session->set_userdata('user_group_id', $user_check['user_group_id']);
                            $this->session->set_userdata('user_role', $user_check['role_id']);
                            $this->session->set_userdata('branch_id', $user_check['branch_id']);

                            $user_data = $this->muser->get_data($user_check['id']);
                            $created_by_name = $this->muser->get_data($user_data['created_by_id'])['fullname'];
                            $site_lang = (isset($user_data['site_lang']) && $user_data['site_lang'] != '') ? $user_data['site_lang'] : $this->config->item('language');
                            $this->session->set_userdata('site_lang', $site_lang);
                            $site_currency = (isset($user_data['site_currency']) && $user_data['site_currency'] != '') ? json_decode($user_data['site_currency'],true) : $this->config->item('base_currency');
                            $this->session->set_userdata('site_currency', $site_currency);

                            //IP BLOCKED
                            $ips_data = $this->mip_blocked->get_data(1);
                            $ip_priviledge  = $this->mip_priviledge->get_data(1);
                            $group_arr      = json_decode($ip_priviledge['group']);
                            $user_group_id  = $this->session->userdata('user_group_id') ? explode('|',($this->session->userdata('user_group_id'))) : $this->session->userdata('user_group_id');
                            if (isset($ips_data['status']) && $ips_data['status'] == 1) {
                                $ip_add = get_client_ip_env();
                                if ($group_arr != null && count($group_arr) > 0) {
                                    foreach ($group_arr as $g_arr) {
                                        if ($user_group_id != '' && count($user_group_id) > 0) {
                                            foreach ($user_group_id as $us_gr) {
                                                if ($g_arr == $us_gr) {
                                                    if (isset($ips_data['ips']) && $ips_data['ips'] != '') {
                                                        $ip_arr = explode('|',$ips_data['ips']);
                                                        if (!in_array($ip_add,$ip_arr) && $ip_add != IP_ACCESS) {
                                                            echo 'Service denied!';
                                                            exit;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            $this->maction_log->add_data($log_arr);

                            if( $this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE ) {
                                $slack_msg = $user_check['fullname'].' | '.$user_check['telephone'].' | '.$user_check['email'].' vừa đăng nhập '.base_url().' thành công.';
                                if(in_array($user_check['email'], $this->config->item('except_emails'))){
                                    slack($slack_msg,"canhbao");
                                } else {
                                    $slack_msg .= ' *['.$created_by_name.']* lưu ý hỗ trợ KH kịp thời. Cám ơn!';
                                    slack($slack_msg,"thongbaoquantrong");
                                }
                            }

                            if (!empty($company_contract) && $company_contract['date_end'] != '' && $company_contract['date_end'] != '0000-00-00 00:00:00') {
                                if ($company_contract['last_date_login_notify'] != date("Y-m-d") && $user_check['email'] != SUPPORT_EMAIL){
                                    $data_last_date_login_notify = array('last_date_login_notify' => date("Y-m-d"));
                                    $this->mcompany_contract->update_or_create_data($data_last_date_login_notify,1);
                                    $date_end = strtotime($company_contract['date_end']);
                                    $remain_days = seconds_to_day_conversion($date_end - strtotime(date('Y-m-d', strtotime('now'))));
                                    $slack_msg_check_expired = base_url().' | '.$company_contract['company_name'].' | '.$company_contract['plan'].' | '.$company_contract['fullname'].' | '.$company_contract['telephone'].' | '.$company_contract['email'].' | '.$company_contract['address'].': '.' start ngày '.format_date_for_view($company_contract['date_start']).' hết hạn ngày '.format_date_for_view($company_contract['date_end']);
                                    $slack_msg_check_expired .= '. Đăng nhập từ: '.(($manager_app == 1)?'Myspa Manager':'Browser').' | đăng nhập lần gần nhất: '.format_date_for_view($company_contract['last_date_login_notify']).'. Số ngày còn lại: *['.$remain_days.' ngày]*';
                                    if($remain_days <= 30){
                                        slack($slack_msg_check_expired,"canhbaogiahan");
                                    } else {
                                        slack($slack_msg_check_expired,"canhbao");
                                    }
                                }
                            }

                            $merchant_app_param = ($this->input->get('merchant_app') == 1) ? '?merchant_app=1' : ''; redirect(base_url() . 'dashboard'.$merchant_app_param);
                        }
                    }
                } else {


                    $log_arr = array(
                        'uid'          => -1, //guess
                        'action'       => LOGIN_FAIL,
                        'action_table' => TABLE_USER,
                        'email'        => $email,
                        'reference_id' => -1, //guess
                        'date_time'    => $date_time,
                        'from_ip'      => $from_ip
                    );
                    $this->maction_log->add_data($log_arr);

                    $data['email'] = $email;
                    $data['password'] = $password;
                    $this->session->set_flashdata('login_error', '<span style="color:red">Sai email hoặc password</span>');
                    $check_exist = $this->muser->get_user_by_email1($email);
                    $created_by_name = "Team Sales";
                    $fullname = '';
                    $telephone = '';
                    if ($check_exist) {
                        $data_user = $this->muser->get_data($check_exist['id']);
                        $fullname = $data_user['fullname'].' | ';
                        $telephone = $data_user['telephone'].' | ';
                        $created_by_name = '*['.$this->muser->get_data($data_user['created_by_id'])['fullname'].']*';
                    }
                    if( $this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE ) {
                        $slack_msg = $fullname.$telephone.$email.' vừa đăng nhập '.base_url().' không thành công.';
                        if(!in_array($user_check['email'], $this->config->item('except_emails'))){
                            $slack_msg .= ' '.$created_by_name.' vui lòng kiểm tra và hỗ trợ Khách hàng đang muốn coi demo. Cám ơn!';
                        }
                        slack($slack_msg,"thongbaoquantrong");
                    }

                    $this->load->view('layout/login', $data);
                }
            }
        } else {
            if ($this->session->userdata('user_id')&& $this->session->userdata('user_id') > 0)  {
                $merchant_app_param = ($this->input->get('merchant_app') == 1) ? '?merchant_app=1' : ''; redirect(base_url() . 'dashboard'.$merchant_app_param);
            } else {
                $this->load->view('layout/login',$data);
            }
        }
    }

    // logout
    function logout()
    {
        if ($this->session->userdata('user_id')){
            $date_time = date("Y-m-d H:i:s");
            $user_id   = $this->session->userdata('user_id');
            $email     = $this->session->userdata('username');
            $log_arr   = array(
                            'uid'          => $user_id,
                            'email'        => $email,
                            'action'       => LOGOUT,
                            'action_table' => TABLE_USER,
                            'reference_id' => $user_id,
                            'date_time'    => $date_time
                        );
            $this->maction_log->add_data($log_arr);
            $this->session->sess_destroy();
        }
        $data['company_info'] = $this->mcompany_info->get_data();
        $data['company_contract'] = $this->mcompany_contract->get_data();
        $this->load->view('layout/login',$data);
    }

    // forgot password
    function forgot_password() {
        $from_ip        = $_SERVER['REMOTE_ADDR'];
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $this->session->set_flashdata('email_error', '');
        $this->session->set_flashdata('general_error', '');
        $this->session->set_flashdata('class_hide', '');
        $company_info = $this->mcompany_info->get_data();

        if ($this->input->post('submit_form')) {
            $flag = true;
            $email = cleanupentries($this->input->post('email'));
            if (empty($email)) {
                $flag = false;
                $this->session->set_flashdata('email_error', '<span style="color:red">Trường Bắt Buộc Nhập</span>');
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $flag = false;
                    $this->session->set_flashdata('email_error', '<span style="color:red">Email không hợp lệ</span>');
                }
            }
            if ($flag == false) {
                $data['company_info'] = $company_info;
                $this->load->view('layout/forgot_password',$data);
            } else {
                $check_user_exist = $this->muser->check_user_by_email($email);
                if (is_array($check_user_exist) && count($check_user_exist) > 0) {
                    $token = md5($email.rand(0, 9999999));
                    $token_link = base_url().'tao-mat-khau-moi?token='.$token;

                    $date_time = date("Y-m-d H:i:s");

                    $data = array(
                        'email' => $email,
                        'token' => $token,
                        'status'=> WAITING_CONFIRM,
                        'created_date'  => $date_time
                    );

                    $reference_id = $this->mforgot_password->add_data($data);
                    if ($reference_id > 0) {

                        $list1  = array($email);
                        $list2  = array('ceo@myspa.vn');

                        $title  = 'Khôi phục mật khẩu';
                        $email_content = 'Dear '.$check_user_exist['fullname'].'!<br><br>Bạn đã yêu cầu khôi phục mật khẩu, vui lòng click vào link dưới đây (hoặc copy paste vào thanh địa chỉ trên trình duyệt) để tới trang đặt mật khẩu mới.<br><a href="'.$token_link.'">'.$token_link.'</a>';

                        //Send to customer
                        try {
                            $check_sent = sendMail($list1, $title, $email_content);
                            if ($check_sent) {
                                $this->session->set_flashdata('general_error', '<h4 class="text-primary"><i class="icon icon-check"></i> Email xác nhận đã được gởi tới bạn, vui lòng kiểm tra hòm thư</h4>');
                                $this->session->set_flashdata('class_hide', ' class="hide" ');
                                $data['company_info'] = $company_info;
                                $this->load->view('layout/forgot_password',$data);
                            }
                        }catch(Exception $e){
                            $this->session->set_flashdata('general_error', '<span class="text-danger"><i class="icon icon-close"></i> Không thể gởi email xác nhận, vui lòng thử lại sau.</span>');
                            $data['company_info'] = $company_info;
                            $this->load->view('layout/forgot_password', $data);
                        }

                        try {
                            $title2 = $check_user_exist['fullname'].' khôi phục mật khẩu';
                            $email_content2 = 'From IP:'. $from_ip.'<br>From browser: '.$from_browser.'<br>Token url: '.$token_link;
                            sendMail($list2, $title2, $email_content2);
                        }catch(Exception $e){

                        }
                    }
                } else {
                    $this->session->set_flashdata('general_error', 'Email không tồn tại trên hệ thống');
                    $data['company_info'] = $company_info;
                    $this->load->view('layout/forgot_password', $data);
                }
            }
        } else {
            $data['company_info'] = $company_info;
            $this->load->view('layout/forgot_password', $data);
        }
    }

    function reset_password() {
        $this->session->set_flashdata('password_error', '');
        $this->session->set_flashdata('general_error', '');
        $company_info = $this->mcompany_info->get_data();

        if ($this->input->post('submit_form')) {
            $flag = true;

            $token      = trim($this->input->get('token'));
            $password   = cleanupentries($this->input->post('password'));

            if (empty($password)) {
                $flag = false;
                $this->session->set_flashdata('password_error', '<span style="color:red">' . EMPTY_FIELD_ERROR . '</span>');
            } else {
                if (strlen($password) < 6) {
                    $flag = false;
                    $this->session->set_flashdata('password_error', '<span style="color:red">Password quá ngắn, cần 6 kí tự trở lên</span>');
                }
            }

            if (!$flag) {
                $data['company_info'] = $company_info;
                $this->load->view('layout/new_password', $data);
            } else {
                $data_arr = $this->mforgot_password->get_data_from_token($token);

                if ( is_array($data_arr) && count($data_arr) > 0 ){
                    if ($data_arr['status'] == WAITING_CONFIRM) {
                        $now = date("Y-m-d H:i:s");

                        $datetime1  = new DateTime($data_arr['created_date']);
                        $datetime2  = new DateTime($now);
                        $interval   = $datetime1->diff($datetime2);
                        $hours      = $interval->format('%h');
                        if ($hours <= 48) {
                            $data = array(
                                'status'    => CONFIRMED
                            );
                            $this->mforgot_password->update_data($data, $data_arr['id']);
                            $user = $this->muser->get_data_by_email($data_arr['email']);
                            $data_user = array(
                                'password'  => md5($password)
                            );
                            if (is_array($user) && count($user) > 0){
                                if ($this->muser->update_data($data_user, $user['id'])){
                                    $this->session->set_flashdata('general_error', '<span class="text-primary"><i class="icon icon-check"></i> Tạo mật khẩu thành công.<br>Vui lòng đăng nhập bằng mật khẩu mới vào hệ thống</span>');
                                    $data['company_info'] = $company_info;
                                    $this->load->view('layout/login', $data);
                                }
                            }
                        } else {
                            $this->session->set_flashdata('general_error', '<span class="text-danger"><i class="icon icon-close"></i> Link xác nhận đã hết hạn.</span>');
                            $data['company_info'] = $company_info;
                            $this->load->view('layout/forgot_password', $data);
                        }
                    } else {
                        $this->session->set_flashdata('general_error', '<span class="text-danger"><i class="icon icon-close"></i> Link xác nhận đã hết hiệu lực.</span>');
                        $data['company_info'] = $company_info;
                        $this->load->view('layout/forgot_password', $data);
                    }
                }
            }
        } else {
            $data['company_info'] = $company_info;
            $this->load->view('layout/new_password', $data);
        }
    }


    private function check_nospam($ip,$content_check) {

        $spam_arr = array('..', './','\.','*','/etc','passwd','/','%','win.ini','proc','version','windows','boot','.ini','system32','gethostbyname','perl -e','echo','write','response');

        foreach ($spam_arr as $spam) {
            if (strpos($content_check, $spam) !== FALSE) {
                slack('Url: '.base_url().' | Spam ip: '.$ip.'| Content: '.$content_check,"warning");
                return false;
            }
        }

        $count_ip = $this->mlog->count_same_ip_register($ip);

        if ($count_ip >= 5) {
            slack('Url: '.base_url().' | Spam ip: '.$ip.'| Count:'.$count_ip.'| Content: '.$content_check,"warning");
            return false;
        } else {
            return true;
        }
    }

}

