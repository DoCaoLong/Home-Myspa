<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader2 extends MX_Loader {
    public $CI;
    public function __construct(){
        parent::__construct();
        $this->CI = CI::$APP;
        $this->CI->load->helper(['lib_helper']);
        
		$this->load->library(array("session"));
        
    }

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $vars['first_date_this_month']  = date('01/m/Y');
        $vars['last_day_this_month']    = date('t/m/Y');

        if($return):
            $content  = $this->view('layout/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('layout/footer', $vars, $return);

            return $content;
        else:
            $this->CI->load->model(array('mnotification','muser','mcompany_info','mstaff','mbranch','mip_blocked','moption','mcompany_contract','mmyspa_manager','mip_priviledge','morder_payment_history','mpayment_history','msms_config','msms'));
            $this->CI->load->database();
            $user_id            = $this->CI->session->userdata('user_id');
            $this->CI->mnotification->_branch_id = $this->CI->session->userdata('branch_id');
            $vars['notification_list']  = $this->CI->mnotification->get_all_notification_by_user(20,0,'desc',$user_id,true);

            $this->CI->mcompany_info->_branch_id = $this->CI->session->userdata('branch_id');
            $vars['company_info']       = $this->CI->mcompany_info->get_data_by_branch(0);
            $vars['hide_member_phone']  = false;
            $vars['current_currency'] = $this->CI->session->userdata('site_currency') ? $this->CI->session->userdata('site_currency') : $this->CI->config->item('base_currency');
            $vars['base_currency'] = $vars['current_currency'];
            $vars['nav_list'] = get_menu_moba_manager($this->CI->session->userdata('user_id'),$this->CI->session->userdata('user_group_id'));
            $this->view('layout/header', $vars);
            $this->view($template_name, $vars);
            $this->view('layout/footer', $vars);
        endif;

    }

    public function check_access_menu($controller, $action){
        $user_id = $this->session->userdata('user_id');
        if ($user_id == ROOT_ADMIN_ID) return true;
        else{
            $result = false;
            $user_group = $this->session->userdata('user_group_id');
            $user_group_id_list = array_filter(explode('|',$user_group));
            foreach($user_group_id_list as $key => $user_group_id){
                $access_right = $this->mrole_priviledge->get_data_from_user_group_id($user_group_id);
                if(isset($access_right) && count($access_right) > 0){
                    $access_right['priviledge'] = (array)json_decode($access_right['priviledge']);
                    if (array_key_exists($controller, $access_right['priviledge'])) {
                        if (in_array($action, $access_right['priviledge'][$controller])) {
                            return true;
                        }
                    }
                }
            }
            return $result;
        }
    }

}