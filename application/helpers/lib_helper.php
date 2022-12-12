<?php
// return province list
function province_list()
{
    $CI = get_instance();
    $CI->load->database();
    $CI->load->model('mprovince');
    $province_data = $CI->mprovince->get_all_data();
    return $province_data;
}

function show_status($status)
{
    $result = '';
    if ($status == ACTIVE) {
        $result = '<i class="fa fa-circle text-success text-xs"></i>&nbsp;Active';
    } else {
        $result .= '<i class="fa fa-circle text-danger text-xs"></i>&nbsp;Block';
    }
    return $result;
}

function show_order_status($status)
{
    $result = '';
    $CI = get_instance();
    if ($status == PENDING) {
        $result = '<i class="fa fa-circle text-primary text-xs"></i>&nbsp;'.$CI->lang->line('order_status_wait_for_pay');
    }
    elseif ($status == PAID) {
        $result = '<i class="fa fa-circle text-success text-xs"></i>&nbsp;'.$CI->lang->line('order_status_paid');
    }
    elseif ($status == REFUNDED) {
        $result = '<i class="fa fa-circle text-muted text-xs"></i>&nbsp;'.$CI->lang->line('order_status_refund');
    }
    elseif ($status == CANCELLED) {
        $result = '<i class="fa fa-circle text-danger text-xs"></i>&nbsp;'.$CI->lang->line('order_status_cancelled');
    }
    elseif ($status == PREPAID) {
        $result = '<i class="fa fa-circle text-warning text-xs"></i>&nbsp;'.$CI->lang->line('order_status_debit');
    }
    return $result;
}

// encode string
function encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

// decode string
function decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

// fotmat money
function format_money($money, $decimals = 0, $currency = null)
{
    $CI  = get_instance();
    if ($decimals == '') $decimals = 0;
    if ($CI->session->userdata('site_currency')['unit']=='USD') {
        $decimals = 2;
    }
    if (is_numeric($money))
        return number_format($money,$decimals) . $currency;
}
function un_format_money($money) {
    return str_replace(",","",$money);
}

// format date for db
function format_date_for_db($date)
{
    if (isset($date) && strlen($date) > 0) {
        $date_arr = explode('/', $date);
        if (strlen($date_arr[1]) < 2) $date_arr[1] = '0'.$date_arr[1];
        if (strlen($date_arr[0]) < 2) $date_arr[0] = '0'.$date_arr[0];
        $date_db = date_create($date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0]);
        return date_format($date_db, 'Y-m-d');
    } else {
        return;
    }
}

function format_date_time_now_for_db($date)
{
    $time_now = date('H:i:s',strtotime('now'));
    if (isset($date) && strlen($date) > 0) {
        $date_arr = explode('/', $date);
        if (strlen($date_arr[1]) < 2) $date_arr[1] = '0'.$date_arr[1];
        if (strlen($date_arr[0]) < 2) $date_arr[0] = '0'.$date_arr[0];
        $date_db = date_create($date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0]);
        return date_format($date_db, 'Y-m-d '.$time_now);
    } else {
        return;
    }
}

// format date time for db
function format_date_time_for_db($datetime)
{
    if (isset($datetime) && strlen($datetime) > 0) {
        $dt_arr = explode(' ', $datetime);
        if (isset($dt_arr[0]) && isset($dt_arr[1])) {
            $date_arr = explode('/', $dt_arr[0]);
            if (strlen($date_arr[1]) < 2) $date_arr[1] = '0'.$date_arr[1];
            if (strlen($date_arr[0]) < 2) $date_arr[0] = '0'.$date_arr[0];

            $ddd =  $date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0];
            $date_db = date_create($ddd);
            $date_db = date_format($date_db,'Y-m-d').' '.$dt_arr[1];

            return $date_db;
        } else {
            return;
        }
    } else {
        return;
    }
}

// format date for view in web
function format_date_for_view($date)
{
    if($date == '0000-00-00 00:00:00' || $date == '0000-00-00'){
        return;
    }
    if (isset($date) && strlen($date) > 0) {
        $result_date = date("d/m/Y", strtotime($date));
        return $result_date;
    } else {
        return;
    }
}

// format date time for view in web
function format_date_time_for_view($date_time)
{
    if (isset($date_time) && strlen($date_time) > 0 && $date_time != '0000-00-00 00:00:00') {
        $result_date_time = date("d/m/Y H:i:s", strtotime($date_time));
        return $result_date_time;
    } else {
        return;
    }
}

// format date time for view in web
function format_date_time($date_time, $to_format = 'd/m/Y H:i:s')
{
    if (isset($date_time) && strlen($date_time) > 0 && $date_time != '0000-00-00 00:00:00') {
        $result_date_time = date($to_format, strtotime($date_time));
        return $result_date_time;
    } else {
        return;
    }
}

// format date time for view in web
function format_date_time_for_appointment_view($date_time)
{
    if (isset($date_time) && strlen($date_time) > 0) {
        $result_date_time = date("d/m/Y H:i", strtotime($date_time));
        return $result_date_time;
    } else {
        return;
    }
}

// format date time view "ago" : example: 15 seconds ago, 1 day ago
function time_elapsed_string($datetime, $full = false)
{
    $no_codew = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $no_codew->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'mới đây';
}

// show notification status
function show_notification_status($status)
{
    $CI = get_instance();

    $result = '';
    if ($status == NOTIFICATION_UNREAD) {
        $result = '<span class="text-danger text-bold noti-unread">'.$CI->lang->line('notification_unread_status_label').'</span>';
    } elseif ($status == NOTIFICATION_READ) {
        $result = '<span class="text-success text-bold noti-readed">'.$CI->lang->line('notification_readed_status_label').'</span>';
    }
    return $result;
}

// generate code
function generate_code($no)
{
    $no_code = $no + 1;
    $result = '';
    switch (true) {
        case ($no_code < 10):
            $result .= '0000' . $no_code;
            break;
        case ($no_code >= 10 && $no_code < 100):
            $result .= '000' . $no_code;
            break;
        case ($no_code >= 100 && $no_code < 1000):
            $result .= '00' . $no_code;
            break;
        case ($no_code >= 1000 && $no_code < 10000):
            $result .= '0' . $no_code;
            break;
        case ($no_code >= 10000):
            $result .= $no_code;
            break;
    }
    return $result;
}

function format_revenue($value)
{
    if (isset($value)) {
        $result = $value;
    } else {
        $result = 0;
    }
    return $result;
}

function cleanupentries($entry) {
    $entry = trim($entry);
    $entry = stripslashes($entry);
    $entry = htmlspecialchars($entry);

    return $entry;
}

function sendMail($list, $subject, $content,$attachment = null){
    $CI = get_instance();
    $CI->load->library('email');
    // Cấu hình
    $config['charset']  = 'utf-8';
    $config['mailtype'] = 'html';
    $config['wordwrap'] = TRUE;

    $config['protocol']     = env('MAIL_SMTP_PROTOCOL', 'smtp');
    $config['smtp_host']    = env('MAIL_SMTP_HOST');
    $config['smtp_user']    = env('MAIL_SMTP_USER');
    $config['smtp_pass']    = env('MAIL_SMTP_PASS');
    $config['smtp_port']    = env('MAIL_SMTP_PORT', 465);
    $config['validate']     = TRUE;
    $config['smtp_timeout'] = 30;

    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->clear(TRUE);
    //cau hinh email va ten nguoi gui
    $CI->email->from('support@myspa.vn', 'MYSPA.VN');
    $CI->email->to($list);

    $CI->email->subject($subject);
    $CI->email->message($content);

    if($attachment != null){
        $CI->email->attach($attachment);
    }
    //thuc hien gui
    if ( ! $CI->email->send())
    {
        // Generate error
        return $CI->email->print_debugger();
    }else{
        return true;
    }
}

function generate_invoice_number($no){
    $no_code = $no;
    $result = '';
    switch (true) {
        case ($no_code < 10):
            $result .= '000000' . $no_code;
            break;
        case ($no_code >= 10 && $no_code < 100):
            $result .= '00000' . $no_code;
            break;
        case ($no_code >= 100 && $no_code < 1000):
            $result .= '0000' . $no_code;
            break;
        case ($no_code >= 1000 && $no_code < 10000):
            $result .= '000' . $no_code;
            break;
        case ($no_code >= 10000 && $no_code < 100000):
            $result .= '00' . $no_code;
            break;
        case ($no_code >= 100000 && $no_code < 1000000):
            $result .= '0' . $no_code;
            break;
        case ($no_code >= 1000000):
            $result .= $no_code;
            break;
    }
    return $result;
}

function de_generate_invoice_number($no){
    return (int)$no;
}

// Function to get the client ip address
function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function get_monday_sunday($date){
    $dates_array = array();

    if(date('N', strtotime($date)) == 7){

        $dates_array['monday'] = date("Y-m-d", strtotime('Monday this week', strtotime($date)));
        $dates_array['sunday'] =  date("Y-m-d", strtotime('Sunday this week', strtotime($date)));

    }else{
        $dates_array['monday'] = date("Y-m-d", strtotime('Monday this week', strtotime($date)));
        $dates_array['sunday'] =  date("Y-m-d", strtotime('Sunday this week', strtotime($date)));
    }
    return $dates_array;
}

function get_firstday_lastday_of_month($date){
    $months_array = array();

    $months_array['firstday'] = date("Y-m-d", strtotime('first day of this month', strtotime($date)));
    $months_array['lastday'] =  date("Y-m-d", strtotime('last day of this month', strtotime($date)));

    return $months_array;
}

function generate_random_string($length = 6) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function convert_vi_to_en($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}


function send_SMS_in_bg($phone, $message){
    $phone = str_replace(',','',trim($phone));
    $message = convert_vi_to_en($message);
    $available = checkAvailableBalanceToSendSMS($message);
    if(isset($available) && $available != null) {
        
        // $data_sms['status'] = 'success';
        // $data_sms['message'] = 'Đã gửi tin nhắn đến các số điện thoại hợp lệ.';

        $command = "php index.php SMSSender send_sms \"$phone\" \"$message\"";

        run_background_process($command);

    }else {

        $data_sms['status'] = 'fail';
        $data_sms['message'] = 'Số tiền trong tài khoản không đủ, vui lòng nạp thêm';

    }
    return $data_sms;
}

function send_SMS($phone, $message) {
    $phone = str_replace(',','',trim($phone));
    if ($phone != '' && $message != '') {

        $CI = get_instance();
        $CI->load->database();
        $CI->load->model('msms_config');

        $CI->msms_config->_active = 1;
        $sms_config = $CI->msms_config->get_data();

        if (isset($sms_config) && is_array($sms_config) && count($sms_config) > 0 && ($sms_config['type'] == DEFAULT_SPEEDSMS || $sms_config['type'] == SPEEDSMS || $sms_config['type'] == SPEEDSMS_ANDROID)) {
            $message = convert_vi_to_en($message);
        } else {
            $message = convert_vi_to_en($message);
            $message = urlencode($message);
        }

        $result = send_sms_api_route($phone,$message,$sms_config);

        return $result;

    }
}

function send_sms_api_route($phone,$message,$sms_config){
    if (isset($sms_config) && is_array($sms_config) && count($sms_config) > 0) {
        $type = $sms_config['type'];
        switch($type) {
            case DEFAULT_SPEEDSMS:
                try {
                    $result = sendSpeedSMS($phone,$message,null,null);
                    return $result;
                }catch(Exception $e){

                }
                break;
            case SPEEDSMS:
                try {
                    $result = sendSpeedSMS($phone,$message,$sms_config['acc'],$sms_config['brandname']);
                    return $result;
                }catch(Exception $e){

                }
                break;
            case SPEEDSMS2:
                try {
                    $result = sendSpeedSMS($phone,$message,$sms_config['acc'],$sms_config['brandname']);
                    return $result;
                }catch(Exception $e){

                }
                break;
            case SPEEDSMS_ANDROID:
                try {
                    $result = sendSpeedSMS($phone,$message,$sms_config['acc'],$sms_config['brandname']);
                    return $result;
                }catch(Exception $e){

                }
                break;
            case MOTIPLUS:
                try {
                    sendMotiPlusSMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
            case VIETGUYS:
                try {
                    sendVietguysSMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
            case EFOREA:
                try {
                    sendEforeaSMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
            case ESMS:
                try {
                    sendESMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
            case VMGSMS:
                try {
                    sendVMGSMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
            case VNPT:
                try {
                    sendVNPTSMS($phone,$message,$sms_config['acc'],$sms_config['secret_key'],$sms_config['brandname']);
                }catch(Exception $e){

                }
                break;
        }
    } else {
        try {
            $result = sendSpeedSMS($phone,$message,null,null);
            return $result;
        }catch(Exception $e){

        }
    }
}

function checkAvailableBalanceToSendSMS($message){
    $CI = get_instance();
    $CI->load->database();
    $CI->load->model(array('msms','msms_history','maction_log','msms_config'));
    $blc = $CI->msms->get_data(1);
    $CI->msms_config->_active = 1;
    $sms_config = $CI->msms_config->get_data();

    $balance = $blc['balance'];
    $apikey = $sms_config['acc'];
    $brandname = $sms_config['brandname'];
    $sms_type = $sms_config['type'];

    $type_speed_sms = (isset($apikey) && $apikey != '' && $apikey != null && isset($brandname) && $brandname != '' && $brandname != null) ? 2 : 1;
    $price_sms = SMS_PRICE_800;
    if ($type_speed_sms == 2) {
        if ($sms_type == SPEEDSMS_ANDROID) {
            $price_sms = SMS_PRICE_150;
        } else {
            $price_sms = SMS_PRICE_800;
        }
    } else {
        $price_sms = SMS_PRICE;
    }

    $count_character = 70; //per SMS
    if (strlen($message) == mb_strlen($message, 'utf-8')) {
        $count_character = 160;
    }

    $sms_price = ceil(mb_strlen($message,'utf-8')/$count_character)*$price_sms;

    if($balance >= $sms_price){
        return array('balance' => $balance,'price' => $sms_price,'type' => $type_speed_sms,'price_sms' => $price_sms);
    }else {
        return null;
    }

}

function sendSpeedSMS($phone,$message,$apikey,$brandname) {
    $data_sms = array();
    $available_send = checkAvailableBalanceToSendSMS($message);

    if (isset($available_send) && $available_send != null) {
        $phone_send = array($phone);
        $CI2 = get_instance();
        $CI2->load->library('speedSMSAPI');
        $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
        $balance = isset($available_send['balance']) ? $available_send['balance'] : 0;
        $sms_price = isset($available_send['price']) ? $available_send['price'] : 0;
        $price_sms = isset($available_send['price_sms']) ? $available_send['price_sms'] : 0;
        $type_speed_sms = isset($available_send['type']) ? $available_send['type'] : 0;

        $sms = new SpeedSMSAPI();
        if ($type_speed_sms == 2) {
            $sms->accessToken = $apikey;
            $result = $sms->sendSMS($phone_send, $message, SpeedSMSAPI::SMS_TYPE_BRANDNAME, $brandname, 1);
        } else {
            $result = $sms->sendSMS($phone_send, $message, SpeedSMSAPI::SMS_TYPE_CSKH, "", 1);
        }

        if (is_array($result) && count($result) > 0){

            if ($result['status'] == 'success') {
                $data_sms = array(
                    'status'        => $result['status'],
                    'code'          => $result['code'],
                    'tranId'        => $result['data']['tranId'],
                    'totalSMS'      => $result['data']['totalSMS'],
                    'totalPrice'    => $result['data']['totalPrice'],
                    'invalidPhone'  => json_encode($result['data']['invalidPhone']),
                    'created_date'  => date('Y-m-d H:i:s'),
                    'created_by_id' => -1,
                    'phone'         => $phone,
                    'message'       => $message,
                    'brandname'     => $brandname
                );

                $reference_id = $CI2->msms_history->add_data($data_sms);

                $count_success_sms = $result['data']['totalSMS'];
                $total_money = $count_success_sms * $price_sms;

                $balance_remain = $balance - $total_money;

                $data_sms['total_money'] = $total_money;

                $balance_data = array(
                    'balance'   => $balance_remain
                );
                $data_sms['balance']    = $balance_remain;

                $CI2->msms->update_data($balance_data,1);

                //--Log --//
                $log_arr = array(
                    'uid' => -1,
                    'email' => '',
                    'action' => SMS_TO_CUSTOMER,
                    'action_table' => '',
                    'reference_id' => (isset($reference_id) && is_numeric($reference_id)) ? $reference_id : -1,
                    'date_time' => date('Y-m-d H:i:s')
                );
                $CI2->maction_log->add_data($log_arr);
            }
            else{
                $data_sms['status'] = 'fail';
                $data_sms['message'] = 'Gửi tin nhắn không thành công.';
            }
        }
        //--end
    } else {
        $data_sms['status'] = 'fail';
        $data_sms['message'] = 'Số tiền trong tài khoản không đủ, vui lòng nạp thêm';
    }
    return $data_sms;
}

//MOTIPLUS
function sendMotiPlusSMS($phones,$message,$apikey,$secretkey,$brandname){
    if (isset($apikey) && $apikey != '' && isset($secretkey) && $secretkey != '' && isset($brandname) && $brandname != '') {
        $CI2 = get_instance();
        $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
        $data_sms = array(
            'status'        => 'sent',
            'code'          => '',
            'tranId'        => '',
            'totalSMS'      => 1,
            'totalPrice'    => 0,
            'invalidPhone'  => '',
            'created_date'  => date('Y-m-d H:i:s'),
            'created_by_id' => -1,
            'phone'         => $phones,
            'message'       => $message,
            'brandname'     => $brandname
        );
        $reference_id = $CI2->msms_history->add_data($data_sms);


        $url = "http://motiplus.vn/api/SendMultipleSMS_v3?apikey=".$apikey."&secretkey=".$secretkey."&content=".$message."&type=2&phone=".$phones."&brandname=".$brandname;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

//VIETGUYS.BIZ
function sendVietguysSMS($phones,$message,$user,$pwd,$brandname){

    $CI2 = get_instance();
    $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
    $data_sms = array(
        'status'        => 'sent',
        'code'          => '',
        'tranId'        => '',
        'totalSMS'      => 1,
        'totalPrice'    => 0,
        'invalidPhone'  => '',
        'created_date'  => date('Y-m-d H:i:s'),
        'created_by_id' => -1,
        'phone'         => $phones,
        'message'       => $message,
        'brandname'     => $brandname
    );
    $reference_id = $CI2->msms_history->add_data($data_sms);

    $url = 'https://cloudsms.vietguys.biz:4438/api/index.php?u='.$user.'&pwd='.$pwd.'&from='.$brandname.'&phone='.$phones.'&sms='.$message;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, true);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//EFOREA SMS
function sendEforeaSMS($phones,$message,$apikey,$secretkey,$brandname){
    if (isset($secretkey) && $secretkey != '') {

        $CI2 = get_instance();
        $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
        $data_sms = array(
            'status'        => 'sent',
            'code'          => '',
            'tranId'        => '',
            'totalSMS'      => 1,
            'totalPrice'    => 0,
            'invalidPhone'  => '',
            'created_date'  => date('Y-m-d H:i:s'),
            'created_by_id' => -1,
            'phone'         => $phones,
            'message'       => $message,
            'brandname'     => $brandname
        );
        $reference_id = $CI2->msms_history->add_data($data_sms);


        $url = 'http://178.128.28.158:8069/api/eforea/sent_sms';

        $data['params'] = array(
            'mobile' => $phones,
            'content' => convert_vi_to_en(urldecode($message))
        );

        $data = json_encode($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'token: '.$secretkey,
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);
        curl_close($ch);

        return;
    }
}

//ESMS
function sendESMS($phones,$message,$apikey,$secretkey,$brandname){
    if (isset($apikey) && $apikey != '' && isset($secretkey) && $secretkey != '' && isset($brandname) && $brandname != '') {
        $CI2 = get_instance();
        $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
        $data_sms = array(
            'status'        => 'sent',
            'code'          => '',
            'tranId'        => '',
            'totalSMS'      => 1,
            'totalPrice'    => 0,
            'invalidPhone'  => '',
            'created_date'  => date('Y-m-d H:i:s'),
            'created_by_id' => -1,
            'phone'         => $phones,
            'message'       => $message,
            'brandname'     => $brandname
        );
        $reference_id = $CI2->msms_history->add_data($data_sms);



        $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$phones.'&Content='.$message.'&ApiKey='.$apikey.'&SecretKey='.$secretkey.'&SmsType=2&Brandname='.$brandname;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

//VMG SMS
function sendVMGSMS($phones,$message,$user,$pwd,$brandname){

    $CI2 = get_instance();
    $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
    $data_sms = array(
        'status'        => 'sent',
        'code'          => '',
        'tranId'        => '',
        'totalSMS'      => 1,
        'totalPrice'    => 0,
        'invalidPhone'  => '',
        'created_date'  => date('Y-m-d H:i:s'),
        'created_by_id' => -1,
        'phone'         => $phones,
        'message'       => $message,
        'brandname'     => $brandname
    );
    $reference_id = $CI2->msms_history->add_data($data_sms);

    $data = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
        <Body>
            <BulkSendSms xmlns='http://tempuri.org/'>
                <msisdn>$phones</msisdn>
                <alias>$brandname</alias>
                <message>$message</message>
                <sendTime></sendTime>
                <authenticateUser>$user</authenticateUser>
                <authenticatePass>$pwd</authenticatePass>
            </BulkSendSms>
        </Body>
        </Envelope>";
    $url = 'https://secure.brandsms.vn/vmgapi.asmx?wsdl';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//VNPT SMS
function sendVNPTSMS($phones,$message,$user,$pwd,$brandname) {

    $CI2 = get_instance();
    $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
    $data_sms = array(
        'status'        => 'sent',
        'code'          => '',
        'tranId'        => '',
        'totalSMS'      => 1,
        'totalPrice'    => 0,
        'invalidPhone'  => '',
        'created_date'  => date('Y-m-d H:i:s'),
        'created_by_id' => -1,
        'phone'         => $phones,
        'message'       => $message,
        'brandname'     => $brandname
    );
    $reference_id = $CI2->msms_history->add_data($data_sms);

    $url = 'http://sms.vnpthue.com.vn/ws/smsbrandname.asmx?wsdl';
    $data = "<Envelope xmlns='http://schemas.xmlsoap.org/soap/envelope/'>
                <Body>
                    <GuiMotNoiDungNhieuSo xmlns='http://tempuri.org/'>
                        <tenKhachHang></tenKhachHang>
                        <phone>$phones</phone>
                        <msg>$message</msg>
                        <username>$user</username>
                        <password>$pwd</password>
                        <id>57</id>
                    </GuiMotNoiDungNhieuSo>
                </Body>
            </Envelope>";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
//Viettel
function sendBulkSms($message, $toNumbers, $user, $password, $brandname) {

    $CI2 = get_instance();
    $CI2->load->model(array('msms','msms_history','maction_log','msms_config'));
    $data_sms = array(
        'status'        => 'sent',
        'code'          => '',
        'tranId'        => '',
        'totalSMS'      => 1,
        'totalPrice'    => 0,
        'invalidPhone'  => '',
        'created_date'  => date('Y-m-d H:i:s'),
        'created_by_id' => -1,
        'phone'         => $phones,
        'message'       => $message,
        'brandname'     => $brandname
    );
    $reference_id = $CI2->msms_history->add_data($data_sms);

    $url = 'http://ams.tinnhanthuonghieu.vn:8009/bulkapi?wsdl';

    $client = new SoapClient($url);
    $params = array(
        "User" => $user,
        "Password" => $password,
        "CPCode" => $brandname,
        "RequestID" => "1",
        "UserID" => $toNumbers,
        "ReceiverID" => $toNumbers,
        "ServiceID" => $brandname,
        "CommandCode" => "bulksms",
        "Content" => $message,
        "ContentType" => "0"
    );
    $response = $client->__soapCall("wsCpMt", array($params));
    return $response;
}

function runSocket($type, $data) {
    $array_data = array(
        'type' => $type,
        'data' => $data
    );
    $data_json = json_encode($array_data);
    try {
        // $client = new WebSocket\Client(WEBSOCKET);
        // $client->send($data_json);
        return;
    } catch (Exception $e) {
        echo 'Không kết nối được: ',  $e->getMessage(), "\n";
    }
}
function runSocket2($type, $data) {
    $array_data = array(
        'type' => $type,
        'data' => $data
    );
    $data_json = json_encode($array_data);
    try {
//        $client = new WebSocket\Client(WEBSOCKET);
//        if($client->isConnected()){
//            $client->send($data_json);
//        }
        return;
    } catch (Exception $e) {
        echo 'Không kết nối được: ',  $e->getMessage(), "\n";
    }
}

function get_menu($user_id, $user_group_id) {
    $CI  = get_instance();
    $CI->load->model(['msms_config', 'msms']);
    $options = $CI->moption->get_data(1);
    $first_date_this_month = date('01/m/Y');
    $last_day_this_month = date('t/m/Y');
    $this_month = date('m/Y');

    $sms_config = $CI->msms_config->get_data();
    $sms_balance = -1;
    if (isset($sms_config) && is_array($sms_config) && count($sms_config) > 0 && $sms_config['type'] == SPEEDSMS_ANDROID){
        $balance = $CI->msms->get_data(1);
        if (isset($balance) && is_array($balance) && count($balance) > 0) {
            $sms_balance = $balance['balance'];
        } else {
            $sms_balance = 0;
        }
    }

    $menu_dashboard     = check_menu_access('dashboard', 'dashboard',$user_id,$user_group_id);
    $menu_member_list   = check_menu_access('manage_user', 'member_list',$user_id,$user_group_id);
    $menu_admin_list    = check_menu_access('manage_user', 'admin_list',$user_id,$user_group_id);
    $menu_staff_list    = check_menu_access('manage_user', 'staff_list',$user_id,$user_group_id);
    $menu_work_time     = check_menu_access('manage_worktime', 'work_time',$user_id,$user_group_id);
    $menu_appointment   = check_menu_access('manage_appointment', 'appointment_list',$user_id,$user_group_id);
    $menu_order         = check_menu_access('manage_order', 'order_list',$user_id,$user_group_id);
    $menu_bed           = check_menu_access('manage_room', 'bed_list',$user_id,$user_group_id);
    $menu_service       = check_menu_access('manage_services', 'service_list',$user_id,$user_group_id);
    $menu_product       = check_menu_access('manage_product', 'product_list',$user_id,$user_group_id);
    $menu_point         = check_menu_access('manage_point', 'member_point_list',$user_id,$user_group_id);
    $menu_instock       = check_menu_access('manage_product', 'instock_list',$user_id,$user_group_id);
    $menu_service_card  = check_menu_access('manage_membership', 'service_card',$user_id,$user_group_id);
    $menu_prepay_card   = check_menu_access('manage_membership', 'prepay_card',$user_id,$user_group_id);
    $menu_prepay_card_value = check_menu_access('manage_membership', 'prepay_card_value',$user_id,$user_group_id);
    $menu_service_card_value = check_menu_access('manage_membership', 'service_card_value',$user_id,$user_group_id);
    $menu_order_happy_hour          = check_menu_access('manage_happy_hours', 'order_happy_hour',$user_id,$user_group_id);
    $menu_product_happy_hour        = check_menu_access('manage_happy_hours', 'product_happy_hour',$user_id,$user_group_id);
    $menu_service_happy_hour        = check_menu_access('manage_happy_hours', 'service_happy_hour',$user_id,$user_group_id);
    $menu_service_card_happy_hour   = check_menu_access('manage_happy_hours', 'treatment_happy_hour',$user_id,$user_group_id);
    $menu_prepay_card_happy_hour    = check_menu_access('manage_happy_hours', 'prepay_happy_hour',$user_id,$user_group_id);
    $a_r_1 = check_menu_access('manage_report', 'member_report',$user_id,$user_group_id);
    $a_r_2 = check_menu_access('manage_report', 'service_report',$user_id,$user_group_id);
    $a_r_3 = check_menu_access('manage_report', 'sale_report',$user_id,$user_group_id);
    $a_r_4 = check_menu_access('manage_report', 'user_level_report',$user_id,$user_group_id);
    $a_r_5 = check_menu_access('manage_report', 'debt_report',$user_id,$user_group_id);
    $a_r_6 = check_menu_access('manage_report', 'product_report',$user_id,$user_group_id);
    $a_r_7 = check_menu_access('manage_report', 'commission_report',$user_id,$user_group_id);
    $a_r_8 = check_menu_access('manage_report', 'membership_report',$user_id,$user_group_id);
    $a_r_9 = check_menu_access('manage_report', 'point_report',$user_id,$user_group_id);
    $a_r_9 = check_menu_access('manage_report', 'point_report',$user_id,$user_group_id);
    $a_r_10 = check_menu_access('manage_report', 'appointment',$user_id,$user_group_id);
    $a_r_11 = check_menu_access('manage_report', 'general_report',$user_id,$user_group_id);
    $a_r_12 = check_menu_access('manage_report', 'reward_account_report',$user_id,$user_group_id);
    $a_r_13 = check_menu_access('manage_report', 'salary_report',$user_id,$user_group_id);
    $a_m_c_1 = check_menu_access('manage_category', 'service_group_list',$user_id,$user_group_id);
    $a_m_c_2 = check_menu_access('manage_category', 'brand_list',$user_id,$user_group_id);
    $a_m_c_3 = check_menu_access('manage_category', 'product_category_list',$user_id,$user_group_id);
    $a_s_1 = check_menu_access('manage_system', 'company_info',$user_id,$user_group_id);
    $a_s_2 = check_menu_access('manage_system', 'user_group',$user_id,$user_group_id);
    $a_s_3 = check_menu_access('manage_system', 'branch',$user_id,$user_group_id);
    $a_s_4 = check_menu_access('manage_system', 'customer_base',$user_id,$user_group_id);
    $a_s_5 = check_menu_access('manage_system', 'payment_method',$user_id,$user_group_id);
    $a_s_6 = check_menu_access('manage_system', 'bed_list',$user_id,$user_group_id);
    $a_s_7 = check_menu_access('manage_system', 'room_list',$user_id,$user_group_id);
    $a_s_8 = check_menu_access('manage_system', 'ip_blocked',$user_id,$user_group_id);
    $a_s_9 = check_menu_access('manage_system', 'setting',$user_id,$user_group_id);
    $a_s_10 = check_menu_access('manage_system', 'customer_level',$user_id,$user_group_id);
    $a_s_11 = check_menu_access('manage_system', 'units',$user_id,$user_group_id);
    $a_s_13 = check_menu_access('manage_system', 'reward_benefit',$user_id,$user_group_id);
    $a_s_12 = check_menu_access('manage_system', 'notification_setting',$user_id,$user_group_id);
    $a_s_14 = check_menu_access('manage_system', 'storage_manage',$user_id,$user_group_id);
    $a_s_15 = check_menu_access('manage_system', 'push_notifications',$user_id,$user_group_id);
    $a_f_1 = check_menu_access('manage_review', 'review_list',$user_id,$user_group_id);
    $a_f_2 = check_menu_access('manage_review', 'review_list_option',$user_id,$user_group_id);
    $a_i_1 = check_menu_access('manage_income_outcome', 'income_outcome_list',$user_id,$user_group_id);
    $a_i_2 = check_menu_access('manage_income_outcome', 'type_income_outcome_list',$user_id,$user_group_id);
    $menu_promotions = check_menu_access('manage_promotions', 'promotions_code_list',$user_id,$user_group_id);
    $menu_promotions_type = check_menu_access('manage_promotions', 'promotions_type_list',$user_id,$user_group_id);
    $menu_dashboard_news = check_menu_access('manage_dashboard_news', 'dashboard_news_list',$user_id,$user_group_id);
    $menu_asset = check_menu_access('manage_asset', 'asset_list',$user_id,$user_group_id);
    $menu_notification = check_menu_access('notification', 'notification_list',$user_id,$user_group_id);
    $menu_contact_list = check_menu_access('manage_contact', 'contact_list',$user_id,$user_group_id);
    $menu_time_keeping = check_menu_access('manage_working_time', 'working_time_list',$user_id,$user_group_id);
    $menu_sms = check_menu_access('manage_sms', 'customer_sms',$user_id,$user_group_id);
    $menu_criteria_kpi = check_menu_access('manage_kpi', 'criteria_kpi',$user_id,$user_group_id);
    $menu_staff_kpi = check_menu_access('manage_kpi', 'setting_staff_kpi',$user_id,$user_group_id);
    $menu_pre_order = false;
    
    $nav_list = [
        ['title' => $CI->lang->line('treatment_process'),'code' => 'process', 'url' => 'ManageProcess/process', 'icon' => '', 'icon_web' => '', 'has_access' => false, 'extra_class' => 'hide','controller_access' => 'manage_process'],
        ['title' => 'Home', 'code' => 'dashboard', 'url' => 'Dashboard','icon' => 'speedometer','icon_web' => 'icon icon-speedometer','has_access' => $menu_dashboard],
        ['title' => $CI->lang->line('customer'), 'code' => 'member_list', 'url' => 'ManageUser/member_list','icon' => 'user','icon_web' => 'icon icon-users','has_access' => $menu_member_list],
        ['title' => $CI->lang->line('appointment'), 'code' => 'appointment', 'url' => 'ManageAppointment','icon' => 'calendar','icon_web' => 'icon icon-calendar','has_access' => $menu_appointment],
        [
            'title' => $CI->lang->line('sales_pos'),
            'url' => '',
            'code' => 'manage_sales_pos',
            'icon' => 'handbag','icon_web' => 'icon icon-handbag',
            'has_access' => ( $menu_order || $menu_bed ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('create_order'), 'code' => 'create_order', 'url' => 'ManageOrder/add_order', 'has_access' => $menu_order],
                ['title' => $CI->lang->line('list_order'), 'code' => 'list_order', 'url' => 'ManageOrder/order_list', 'has_access' => $menu_order],
                ['title' => $CI->lang->line('pre_order_list'), 'code' => 'pre_order_list', 'url' => 'ManageOrder/pre_order_list', 'has_access' => $menu_pre_order],
                ['title' => $CI->lang->line('bed_and_room'), 'code' => 'bed_and_room', 'url' => 'ManageRoom/bed_list', 'has_access' => $menu_bed],
            ],
        ],
        [
            'title' => $CI->lang->line('membership'),
            'url' => '',
            'code' => 'manage_membership',
            'icon' => 'credit-card','icon_web' => 'icon icon-credit-card',
            'has_access' => ($menu_service_card || $menu_prepay_card || $menu_prepay_card_value || $menu_service_card_value) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('service_card'), 'code' => 'service_card', 'url' => 'ManageMBS/service_card', 'has_access' => $menu_service_card],
                ['title' => $CI->lang->line('prepay_card'), 'code' => 'prepay_card', 'url' => 'ManageMBS/prepay_card', 'has_access' => $menu_prepay_card],
                ['title' => $CI->lang->line('prepay_card_value'), 'code' => 'prepay_card_value', 'url' => 'ManageMBS/prepay_card_value', 'has_access' => $menu_prepay_card_value],
                ['title' => $CI->lang->line('combo_treatment'), 'code' => 'combo_treatment', 'url' => 'ManageMBS/service_card_value', 'has_access' => $menu_service_card_value],
            ],
        ],
        [
            'title' => $CI->lang->line('collection_pay_th1'),
            'url' => '',
            'code' => 'manage_collection_pay_th',
            'icon' => 'calculator','icon_web' => 'fa fa-exchange',
            'has_access' => ( $a_i_1 || $a_i_2 ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('collection_pay_list'), 'code' => 'collection_pay_list', 'url' => "ManageIncomeOutcome/income_outcome_list?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_i_1],
                ['title' => $CI->lang->line('type_collection_pay_list'), 'code' => 'type_collection_pay_list', 'url' => "ManageIncomeOutcome/type_income_outcome_list?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_i_2],
            ],
        ],
        [
            'title' => $CI->lang->line('report'),
            'url' => '',
            'code' => 'manage_report',
            'icon' => 'chart','icon_web' => 'icon icon-bar-chart',
            'has_access' => ($a_r_1 || $a_r_2 || $a_r_3 || $a_r_4 || $a_r_5 || $a_r_6 || $a_r_7 || $a_r_8 || $a_r_9 || $a_r_10 || $a_r_11 || $a_r_12) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('user'), 'code' => 'report_user', 'url' => "ManageReport/member_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_1],
                ['title' => $CI->lang->line('service'), 'code' => 'report_service', 'url' => "ManageReport/service_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_2],
                ['title' => $CI->lang->line('product'), 'code' => 'report_product', 'url' => "ManageReport/product_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_6],
                ['title' => $CI->lang->line('revenue'), 'code' => 'report_revenue', 'url' => "ManageReport/sale_report_all?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_3],
                ['title' => $CI->lang->line('year_revenue'), 'code' => 'report_year_revenue', 'url' => "ManageReport/sale_report", 'has_access' => $a_r_3],
                ['title' => $CI->lang->line('member_level'), 'code' => 'report_member_level', 'url' => "ManageReport/user_level_report", 'has_access' => $a_r_4],
                ['title' => $CI->lang->line('debt_1'), 'code' => 'report_debt_1', 'url' => "ManageReport/debt_report?from_date=$first_date_this_month&to_date=$last_day_this_month&type=on", 'has_access' => $a_r_5],
                ['title' => $CI->lang->line('service_package'), 'code' => 'report_service_package', 'url' => "ManageReport/membership_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_8],
                ['title' => "Commission", 'code' => 'report_commission', 'url' => "ManageReport/commission_report?commission_debt_type=1&from_date=$first_date_this_month&to_date=$last_day_this_month&commission_report_type=on&commission_sharing_type=on", 'has_access' => $a_r_7],
                ['title' => $CI->lang->line('reward_point'), 'code' => 'report_point', 'url' => "ManageReport/point_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_9],
                ['title' => $CI->lang->line('schedule'), 'code' => 'report_schedule', 'url' => "ManageReport/appointment?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_10],
                ['title' => $CI->lang->line('general_report'), 'code' => 'report_general_report', 'url' => "ManageReport/general_report?from_date=$first_date_this_month&to_date=$last_day_this_month", 'has_access' => $a_r_11],
                ['title' => $CI->lang->line('reward_account'), 'code' => 'report_reward_account', 'url' => "ManageReport/reward_account_report", 'has_access' => $a_r_12],
                ['title' => $CI->lang->line('salary'), 'code' => 'report_salary', 'url' => "ManageReport/salary_report?salary_type=1&from_month=$first_date_this_month&to_month=$last_day_this_month", 'has_access' => $a_r_13],
            ],
        ],
        [
            'title' => $CI->lang->line('send_sms'),
            'code' => 'send_sms',
            'url' => '',
            'icon' => 'envelope',
            'icon_web' => 'icon icon-envelope',
            'badge' => $sms_balance,
            'has_access' => $menu_sms,
            'sub' => [
                ['title' => $CI->lang->line('send_sms_to_customer'), 'code' => 'send_sms_to_customer', 'url' => "ManageSMS/customer_sms", 'has_access' => $menu_sms],
                ['title' => $CI->lang->line('send_sms_default'), 'code' => 'send_sms_default', 'url' => "ManageSMS/pre_sms?type=1", 'has_access' => $menu_sms],
                ['title' => $CI->lang->line('send_sms_history'), 'code' => 'sms_history', 'url' => "ManageSMS/sms_history", 'has_access' => $menu_sms],
            ],
        ],
        [
            'title' => $CI->lang->line('team'),
            'url' => '',
            'code' => 'manage_team',
            'icon' => 'people','icon_web' => 'icon icon-users',
            'has_access' => ( $menu_staff_list || $menu_admin_list ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('admin'), 'code' => 'admin_list', 'url' => "ManageUser/admin_list", 'has_access' => $menu_admin_list],
                ['title' => $CI->lang->line('staff'), 'code' => 'staff_list', 'url' => "ManageUser/staff_list", 'has_access' => $menu_staff_list],
                ['title' => $CI->lang->line('work_time'), 'code' => 'work_time', 'url' => "ManageWorkTime/work_time", 'has_access' => $menu_work_time],
            ],
        ],
        [
            'title' => $CI->lang->line('service'),
            'url' => '',
            'code' => 'manage_service',
            'icon' => 'handbag','icon_web' => 'icon icon-handbag',
            'has_access' => ( $a_m_c_1 || $menu_service ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('service_list'), 'code' => 'service_list', 'url' => "ManageServices/service_list", 'has_access' => $menu_service],
                ['title' => $CI->lang->line('service_cate'), 'code' => 'service_cate', 'url' => "ManageCategory/service_group_list", 'has_access' => $a_m_c_1],
            ],
        ],
        [
            'title' => $CI->lang->line('product'),
            'url' => '',
            'code' => 'manage_product',
            'icon' => 'present','icon_web' => 'icon icon-present',
            'has_access' => ($menu_product || $menu_instock || $a_m_c_2 || $a_m_c_3 || $a_s_11)? true : false,
            'sub' => [
                ['title' => $CI->lang->line('products_sale'), 'code' => 'product_list', 'url' => "ManageProduct/product_list", 'has_access' => $menu_product],
                ['title' => $CI->lang->line('inventory'), 'code' => 'inventory', 'url' => "ManageProduct/instock_list", 'has_access' => $menu_instock],
                ['title' => $CI->lang->line('product_consumable'), 'code' => 'product_consumable', 'url' => "ManageProduct/product_list?product_type=1", 'has_access' => ($options['use_attrition_product'] == 1 && $menu_product) ? true : false],
                ['title' => $CI->lang->line('consum_inventory'), 'code' => 'consum_inventory', 'url' => "ManageProduct/instock_list?product_type=1", 'has_access' => ($options['use_attrition_product'] == 1 && $menu_instock) ? true : false],
                ['title' => $CI->lang->line('product_cate'), 'code' => 'product_cate', 'url' => "ManageCategory/product_category_list", 'has_access' => $a_m_c_3],
                ['title' => $CI->lang->line('product_brand'), 'code' => 'product_brand', 'url' => "ManageCategory/brand_list", 'has_access' => $a_m_c_2],
                ['title' => $CI->lang->line('product_units'), 'code' => 'product_unit', 'url' => "ManageSystem/units", 'has_access' => $a_s_11],
            ],
        ],
        [
            'title' => $CI->lang->line('system'),
            'url' => '',
            'code' => 'manage_system',
            'icon' => 'settings','icon_web' => 'icon icon-settings',
            'has_access' => ($a_s_1 || $a_s_2 || $a_s_3 || $a_s_4 || $a_s_5 || $a_s_6 || $a_s_7 || $a_s_8 || $a_s_9 || $a_s_10 || $a_s_11 || $a_s_12 || $a_s_13 || $a_s_14 || $a_s_15) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('company_info'), 'code' => 'company_info', 'url' => "ManageSystem/company_info", 'has_access' => $a_s_1],
                ['title' => $CI->lang->line('user_group'), 'code' => 'user_group', 'url' => "ManageSystem/user_group", 'has_access' => $a_s_2],
                ['title' => $CI->lang->line('branch'), 'code' => 'branch', 'url' => "ManageSystem/branch", 'extra_class' => '', 'has_access' => $a_s_3],
                ['title' => $CI->lang->line('user_from'), 'code' => 'user_from', 'url' => "ManageSystem/customer_base", 'has_access' => $a_s_4],
                ['title' => $CI->lang->line('payment_method'), 'code' => 'payment_method', 'url' => "ManageSystem/payment_method", 'has_access' => $a_s_5],
                ['title' => $CI->lang->line('bed'), 'code' => 'bed', 'url' => "ManageSystem/bed_list", 'has_access' => $a_s_6],
                ['title' => $CI->lang->line('room'), 'code' => 'room', 'url' => "ManageSystem/room_list", 'has_access' => $a_s_7],
                ['title' => $CI->lang->line('block_ip'), 'code' => 'block_ip', 'url' => "ManageSystem/ip_blocked", 'has_access' => $a_s_8],
                ['title' => $CI->lang->line('setting_general'), 'code' => 'setting_general', 'url' => "ManageSystem/setting", 'has_access' => $a_s_9],
                ['title' => $CI->lang->line('member_level'), 'code' => 'member_level', 'url' => "ManageSystem/customer_level", 'has_access' => $a_s_10],
                ['title' => $CI->lang->line('notification_setting'), 'code' => 'notification_setting', 'url' => "ManageSystem/notification_setting", 'has_access' => $a_s_12],
                ['title' => $CI->lang->line('benefits_menu'), 'code' => 'benefits_menu', 'url' => "ManageSystem/reward_benefit_list", 'has_access' => $a_s_13],
                ['title' => $CI->lang->line('storage_manage'), 'code' => 'storage_manage', 'url' => "ManageSystem/storage_manage", 'has_access' => $a_s_14],
                ['title' => $CI->lang->line('push_notifications'), 'code' => 'push_notifications', 'url' => "ManageSystem/push_notifications", 'has_access' => $a_s_15],
            ],
        ],
        ['title' => $CI->lang->line('timekeeping'), 'code' => 'timekeeping', 'url' => "ManageWorkingTime/index?start_date=".urlencode(date('d/m/Y'))."&&end_date=".urlencode(date('d/m/Y')),'icon' => 'clock','icon_web' => 'icon-clock', 'has_access' => $menu_time_keeping],
        [
            'title' => $CI->lang->line('service_review'),
            'url' => '',
            'code' => 'manage_review',
            'icon' => 'star','icon_web' => 'icon icon-star',
            'has_access' => ( $a_f_1 || $a_f_2 ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('customer_review'), 'code' => 'customer_review', 'url' => "ManageReview/review_list", 'has_access' => $a_f_1],
                ['title' => $CI->lang->line('point_to_review'), 'code' => 'point_to_review', 'url' => "ManageReview/review_list_option", 'has_access' => $a_f_2],
            ],
        ],
        [
            'title' => $CI->lang->line('happy_hour'),
            'url' => '',
            'code' => 'manage_happy_hour',
            'icon' => 'tag','icon_web' => 'fa fa-tags',
            'has_access' => ( $menu_order_happy_hour || $menu_service_happy_hour || $menu_product_happy_hour || $menu_service_card_happy_hour || $menu_prepay_card_happy_hour ) ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('order'), 'code' => 'order', 'url' => "ManageHappyHours/order_happy_hour", 'has_access' => $menu_order_happy_hour],
                ['title' => $CI->lang->line('service'), 'code' => 'service', 'url' => "ManageHappyHours/service_happy_hour", 'has_access' => $menu_service_happy_hour],
                ['title' => $CI->lang->line('product'), 'code' => 'product', 'url' => "ManageHappyHours/product_happy_hour", 'has_access' => $menu_product_happy_hour],
                ['title' => $CI->lang->line('service_card'), 'code' => 'service_card', 'url' => "ManageHappyHours/treatment_happy_hour", 'has_access' => $menu_service_card_happy_hour],
                ['title' => $CI->lang->line('prepay_card'), 'code' => 'prepay_card', 'url' => "ManageHappyHours/prepay_happy_hour", 'has_access' => $menu_prepay_card_happy_hour],
            ],
        ],
        [
            'title' => $CI->lang->line('reward_point'),
            'url' => '',
            'code' => 'manage_point',
            'icon' => 'social-dropbox','icon_web' => 'icon icon-social-dropbox',
            'extra_class' => 'hide',
            'has_access' => $menu_point ? true : false,
            'sub' => [
                ['title' => "Cài đặt", 'code' => 'setting', 'url' => "ManagePoint/point_setup_form", 'has_access' => $menu_point],
                ['title' => "Danh sách", 'code' => 'point_list', 'url' => "ManagePoint/member_point_list", 'has_access' => $menu_point],
                ['title' => "Lịch sử quy đổi", 'code' => 'transfer_history', 'url' => "ManagePoint/point_history", 'has_access' => $menu_point],
            ],
        ],
        ['title' => $CI->lang->line('inbox'), 'code' => 'contact_list', 'url' => 'ManageContact/contact_list','icon' => 'envelope','icon_web' => 'icon icon-envelope', 'extra_class' => 'hide', 'has_access' => $menu_contact_list],
        ['title' => $CI->lang->line('notification'), 'code' => 'notification_list', 'url' => 'Notification/notification_list','icon' => 'bell','icon_web' => 'icon icon-bell', 'extra_class' => '', 'has_access' => $menu_notification],
        [
            'title' => $CI->lang->line('promotions'),
            'url' => '',
            'code' => 'manage_promotion',
            'icon' => 'tag','icon_web' => 'icon icon-tag',
            'extra_class' => '',
            'has_access' => $menu_promotions || $menu_promotions_type ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('promotions_list'), 'code' => 'promotions_list', 'url' => "ManagePromotions/promotions_code_list", 'has_access' => $menu_promotions],
                ['title' => $CI->lang->line('promotions_cate'), 'code' => 'promotions_cate', 'url' => "ManagePromotions/promotions_type_list", 'has_access' => $menu_promotions_type],
            ],
        ],
        ['title' => $CI->lang->line('asset'), 'code' => 'manage_asset', 'url' => 'ManageAsset/asset_list','icon' => 'home','icon_web' => 'icon icon-home', 'extra_class' => '', 'has_access' => $menu_asset ],
        ['title' => $CI->lang->line('dashboard_news'), 'code' => 'manage_dashboard_news', 'url' => 'ManageDashboardNews/dashboard_news','icon' => 'speech','icon_web' => 'icon icon-speech', 'extra_class' => '', 'has_access' => $menu_dashboard_news],
        [
            'title' => $CI->lang->line('kpi_staff'),
            'url' => '',
            'code' => 'manage_kpi',
            'icon' => 'target','icon_web' => 'icon icon-target',
            'extra_class' => '',
            'has_access' => $menu_criteria_kpi || $menu_staff_kpi ? true : false,
            'sub' => [
                ['title' => $CI->lang->line('setting_staff_kpi'), 'code' => 'setting_staff_kpi', 'url' => "ManageKPI/setting_staff_kpi", 'has_access' => $menu_staff_kpi],
                ['title' => $CI->lang->line('criteria_list'), 'code' => 'criteria_list', 'url' => "ManageKPI/criteria_list", 'has_access' => $menu_criteria_kpi],
            ],
        ],
    ];


    // moba menu
    $nav_list[] = ['title' => 'BRAND APP', 'code' => 'moba_manager_dashboard', 'url' => 'moba_manager/dashboard','icon' => 'icon-screen-smartphone','icon_web' => 'icon icon-screen-smartphone', 'extra_class' => '', 'has_access' => false];

    $nav_list = remove_unauthorize_nav_list($nav_list);
    return $nav_list;
}

function remove_unauthorize_nav_list($nav_list) {
    for($i = 0; $i< count($nav_list);$i++) {
        if($nav_list[$i]['has_access'] == false) {
            $nav_list[$i] = array();
            continue;
        }
        if(isset($nav_list[$i]['sub'])) {
            $sub_menu = $nav_list[$i]['sub'];
            for($j = 0; $j< count($sub_menu);$j++) {
                if($sub_menu[$j]['has_access'] == false) {
                    $nav_list[$i]['sub'][$j] = array();
                }
            }
            $nav_list[$i]['sub'] = array_filter($nav_list[$i]['sub']);
            $nav_list[$i]['sub'] = array_values($nav_list[$i]['sub']);
        }
    }


    $nav =  array_values(array_filter($nav_list));
    return $nav;
}

function check_menu_access($controller, $action, $user_id, $user_group_id){
    $CI = get_instance();
    // $user_id = $CI->session->userdata('user_id');
    if ($user_id == ROOT_ADMIN_ID) return true;
    else{
        $result = false;
        $user_group = array_filter(explode('|',$user_group_id));
        foreach($user_group as $group_id){
            $access_right = $CI->mrole_priviledge->get_data_from_user_group_id($group_id);
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

function get_gender_name($gender_code){
    $CI = get_instance();
    $gender_translated = '';
    if($gender_code == 1){
        $gender_translated = $CI->lang->line('male');
    }else if($gender_code == 2){
        $gender_translated = $CI->lang->line('female');
    }
    return $gender_translated;
}

function utf8convert($str) {
    if(!$str) return false;
    $utf8 = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
    return $str;
}

function file_name_convert($file_name){
    $file_name = utf8convert($file_name);
    $file_name = str_replace(' ', '_', $file_name);
    $file_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $file_name);
    return strtolower($file_name);
}

function format_month_year_for_view($date)
{
    if (isset($date) && strlen($date) > 0) {
        $result_date = date("m/Y", strtotime($date));
        return $result_date;
    } else {
        return;
    }
}

function format_string_for_csv($data){
    return "=\"" . $data . "\"";
}

function create_task_scheduler($type,$minute = '0', $hours = '0'){
    $execute_scheduler_function = '';
    $task_name = '';
    switch ($type) {
        case 1:
            $execute_scheduler_function = 'send_mail_revenue';
            $task_name = 'SendMailRevenue';
            break;
        case 2:
            $execute_scheduler_function = 'send_warning_expire_contract_email';
            $task_name = 'SendMailExpireContract';
            break;
        case 3:
            $execute_scheduler_function = 'send_warning_expiry_inventory_notify';
            $task_name = 'SendNotifyProductExpiry';
            break;
        default:
            # code...
            break;
    }
    // $base_url = base_url()."Scheduler/send_mail_revenue";
    $cd_to_project_cmd = "cd ".FCPATH;
    $exec_php_cmd = "php index.php scheduler {$execute_scheduler_function}";
    $command_run = $cd_to_project_cmd ." && ". $exec_php_cmd; // command file to run function send_mail_revenue

    if (substr(php_uname(), 0, 7) == "Windows"){
        $file_run = FCPATH."files".DIRECTORY_SEPARATOR."$task_name.bat";
        $fp = fopen($file_run,'w');
        fwrite($fp,$command_run);
        fclose($fp);
        $command = "schtasks /create /tn {$task_name} /tr {$file_run} /sc daily /st 00:00:00"; // create task scheduler (win 10) at 00:00 everyday
        exec($command);
    }else {
        $file_run = FCPATH."files".DIRECTORY_SEPARATOR."$task_name.txt";
        $command = "$minute $hours * * * {$command_run}"." > /dev/null 2>&1 & echo $!"; // cronjob execute at 00:00 everyday
        exec($command,$op);
        $pid = (int)$op[0];
        return $pid;
    }
    return $task_name;
}

function hide_phone_number_with_config($phone_number, $part, $number){// $part: 1 = head, 2 = tail
    $length = strlen($phone_number);
    if($number>$length){
        return str_repeat('*', $number);
    }else{
        if($part == 1){
            return str_repeat('*', $length-$number).substr($phone_number,-$number);
        }elseif($part == 2){
            return substr($phone_number,0,$number).str_repeat('*', $length-$number);
        }else{
            return $phone_number;
        }
    }
}
function hide_phone_number($phone_number){
    return hide_phone_number_with_config($phone_number,1,5);
}

function delete_task_scheduler($pid){
    if (substr(php_uname(), 0, 7) == "Windows"){
        $task_name = $pid;
        $command = "schtasks /delete /f /tn ".$task_name; //delete task scheduler (win 10)
        exec($command);
    }else {
        $command = 'kill '.$pid;
        exec($command);
        if (get_process_status($pid) == false)return true;
        else return false;
    }
}

function get_process_status($pid){
    $command = 'ps -p '.$pid;
    exec($command,$op);
    if (!isset($op[1]))return false;
    else return true;
}

function show_import_status($status)
{
    $result = '';
    $CI = get_instance();
    if ($status == 0) {
        $result = '<i class="fa fa-circle text-primary text-xs"></i>&nbsp;'.$CI->lang->line('import_status_pending');
    }
    elseif ($status == 1) {
        $result = '<i class="fa fa-circle text-success text-xs"></i>&nbsp;'.$CI->lang->line('import_status_confirmed');
    }
    elseif ($status == 2) {
        $result = '<i class="fa fa-circle text-danger text-xs"></i>&nbsp;'.$CI->lang->line('import_status_canceled');
    }
    return $result;
}
function generate_import_note($note){
    $CI = get_instance();
    $keyword = array(
        '[export_for]',
        '[import_from]'
    );
    $replacement = array(
        $CI->lang->line('export_for'),
        $CI->lang->line('import_from')
    );
    return str_replace($keyword,$replacement,$note);
}
function generate_refund_note($note){
    $CI = get_instance();
    $keyword = array(
        '[prepaid_card_value_refund]',
        '[topup_from_refund_service_card]',
        '[topup_from_transfer_service_card]',
        '[topup_from_refund_order]'
    );
    $replacement = array(
        $CI->lang->line('prepaid_card_value_refund'),
        $CI->lang->line('topup_from_refund_service_card'),
        $CI->lang->line('topup_from_transfer_service_card'),
        $CI->lang->line('topup_from_refund_order')
    );
    return str_replace($keyword,$replacement,$note);
}
function get_import_status_name($status)
{
    $result = '';
    $CI = get_instance();
    if ($status == 0) {
        $result = $CI->lang->line('import_status_pending');
    }
    elseif ($status == 1) {
        $result = $CI->lang->line('import_status_confirmed');
    }
    elseif ($status == 2) {
        $result = $CI->lang->line('import_status_canceled');
    }
    return $result;
}

function date_compare($element1, $element2) {
    $datetime1 = strtotime($element1['created_date']);
    $datetime2 = strtotime($element2['created_date']);
    return $datetime1 - $datetime2;
}

function generate_array_to_export($array = array(),$data_csv = array(),$title = array(),$footer = array()){
    $arr = array();
    //title
    $arr[0] = $title;

    //body
    for($i = 0; $i < count($array); $i++){
        $new_item = array();
        foreach($data_csv as $d){
            array_push($new_item,$array[$i][$d]);
        }
        $arr[] = $new_item;
    }

    //footer
    if(count($footer) > 0) {
        $arr[][0] = null;
        for($i = 0 ; $i < count($title) ;$i++ ){
            if( !isset($footer[$i]) || $footer[$i] == null ){
                $footer[$i] = null;
            }
        }
        ksort($footer);
        $arr[] = $footer;
    }
    return $arr ;
}

function array_to_csv($array = array(),$data_csv = array(),$title = array(),$footer = array(), $delim = ",", $newline = "\r\n", $enclosure = '"'){
    $out = '';
    //title
    foreach($title as $titl){

        $out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $titl).$enclosure.$delim;
    }
    $out = substr($out, 0, -strlen($delim)).$newline;

    //body
    foreach($array as $item){
        $arr = array();
        foreach($data_csv as $d){
            array_push($arr,$item[$d]);
        }
        $line = to_string_for_csv($arr,$enclosure,$delim);
        $out .= implode('', $line).$newline;
    }

    //footer
    if(count($footer) > 0) {
        $out .= $newline;
        $footer_line ='';
        for($i = 0 ; $i < count($title) ;$i++ ){


            if( ! (isset($footer[$i]) && $footer[$i] != null)){
                $footer[$i] = '';
            }
            $footer_line .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $footer[$i]).$enclosure.$delim;
        }
        $out .= substr($footer_line, 0, -strlen($delim)).$newline;
    }

    return chr(239) . chr(187) . chr(191) . $out ;
}

function download_csv_file($file_name,string $data){
    $CI = get_instance();
    $CI->load->library(array('excel'));
    $path_to_temp = FCPATH."files".DIRECTORY_SEPARATOR."report".DIRECTORY_SEPARATOR ;
    $file_path = $path_to_temp.$file_name.".csv";
    $fp = fopen($file_path, 'w+');
    fwrite($fp, $data);
    fclose($fp);
    $objReader = PHPExcel_IOFactory::createReader('CSV');
    $objReader->setDelimiter(",");
    // $objReader->setInputEncoding('UTF-8');
    $objReader->setEnclosure('"');
    $objPHPExcelReader =   $objReader->load($file_path);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'Excel5');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
    header('Cache-Control: max-age=0');
    $objWriter->save('php://output');
    //unlink($file_path);
    // die;
}

function download_xlsx_from_array($file_name,$data,$style = array()){
    require_once FCPATH.'/vendor/box/spout/src/Spout/Autoloader/autoload.php';
    $writer = new Box\Spout\Writer\WriterFactory;
    $border = (new Box\Spout\Writer\Style\BorderBuilder)->setBorderRight('000000','thin','solid')->setBorderBottom('000000','thin','solid')->build();
    $style = (new Box\Spout\Writer\Style\StyleBuilder)
                ->setShouldWrapText()
                ->setBackgroundColor('92D040')
                ->setBorder($border)
                ->build();
    $writer = $writer::create('xlsx');
    $writer->openToBrowser("$file_name.xlsx");
    $writer->addRowWithStyle($data[0],$style);
    $body = array_splice($data,1);

    $style = (new Box\Spout\Writer\Style\StyleBuilder)
                ->setShouldWrapText()->build();
    $writer->addRowsWithStyle($body,$style);
    $writer->close();
}

function store_xlsx_from_array($file_name,$path,$data,$sheet_name = null) {
    require_once FCPATH.'/vendor/box/spout/src/Spout/Autoloader/autoload.php';
    $writer = new Box\Spout\Writer\WriterFactory;
    // $color = new Box\Spout\Writer\Style\Color;
    $writer = $writer::create('xlsx');
    if($path != null) {
        $writer->openToFile($path.$file_name.'.xlsx');
    }else {
        $writer->openToBrowser("$file_name.xlsx");
    }
    $sheet = $writer->getCurrentSheet();
    for($i = 0; $i < count($data); $i++) {

        if(!empty($sheet_name)) {
            if(isset($sheet_name[$i])) {
                $sheet->setName($sheet_name[$i]);
            }
        }
        if(!empty($data[$i])) {
            $border = (new Box\Spout\Writer\Style\BorderBuilder)->setBorderRight('000000','thin','solid')->setBorderBottom('000000','thin','solid')->build();
            $style = (new Box\Spout\Writer\Style\StyleBuilder)
                        ->setShouldWrapText()
                        ->setBackgroundColor('92D040')
                        ->setBorder($border)
                        ->build();
            $writer->addRowWithStyle($data[$i][0],$style);
            $body = array_splice($data[$i],1);
            $style = (new Box\Spout\Writer\Style\StyleBuilder)
                ->setShouldWrapText()
                ->build();
            $writer->addRowsWithStyle($body,$style);

        }
        if($i != count($data) - 1) {
            $sheet = $writer->addNewSheetAndMakeItCurrent();
        }

    }
    $writer->close();
    return $path.$file_name.'.xlsx';
}

function download_xls_from_array($file_name,$array,$style = array()){
    ob_clean();
    $CI = get_instance();
    $CI->load->library(array('excel'));
    $objPHPExcel = new PHPExcel();
    $xls_file = $objPHPExcel->getActiveSheet();


    $xls_file->fromArray(
        $array,  // The data to set
        null,        // Array values with this value will not be set
        'A1'         // Top left coordinate of the worksheet range where
                    //    we want to set these values (default is A1)
    );

    // available type format style ['fill','font','borders','alignment','numberformat','protection','quotePrefix']
    if(!empty($style)){
        foreach($style as $cor => $st){
            $xls_file->getStyle($cor)->applyFromArray($st);
        }
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
    header('Cache-Control: max-age=0');
    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $writer->save('php://output');
}

function to_string_for_csv($arr = array(),$enclosure, $delim){

    if(count($arr) > 0){
        foreach($arr as $key => $name){
            $arr[$key] = $enclosure.str_replace($enclosure, $enclosure.$enclosure, $name).$enclosure.$delim;
        }
        return $arr;
    }
}

function query_convert_array_object($array){
    $sql = "CONCAT('[', ";
    $sql .= " GROUP_CONCAT( ";
    $sql .= "  CONCAT('{ '";
    $lastKey = key(array_slice($array, -1, 1, true));
    foreach($array as $key => $item){
        if($key != $lastKey){
            $sql .= "     '\"$key\":\"', ($item), '\",' ";
        }else {
            $sql .= "     '\"$key\":\"', ($item), '\"' ";
        }
    }
    $sql .= " ' }') ";
    $sql .= "),']') ";
    return $sql;
}

function is_root_admin(){
    $CI = get_instance();
    $current_user = $CI->session->userdata('user_id');
    if($current_user != ROOT_ADMIN_ID) return FALSE;
    return TRUE;
}
function is_admin(){
    $CI = get_instance();
    $current_user = $CI->session->userdata('user_role');
    if($current_user != ROLE_ADMIN) return FALSE;
    return TRUE;
}
function val_to_time($val){
    $hour = floor($val*5/60);
    $min = $val*5%60;
    return ($hour<10?("0".$hour):$hour).":".($min<10?("0".$min):$min);
}

function time_to_val($time){
    $time = explode(':',$time);
    return (int)(($time[0]*60+$time[1])/5);
}

function get_country(){
    return [
    ["Viet Nam", "Viet Nam"],
    ["United States", "United States"],
    ["United Kingdom", "United Kingdom"],
    ["Afghanistan", "Afghanistan"],
    ["Aland Islands", "Aland Islands"],
    ["Albania", "Albania"],
    ["Algeria", "Algeria"],
    ["American Samoa", "American Samoa"],
    ["Andorra", "Andorra"],
    ["Angola", "Angola"],
    ["Anguilla", "Anguilla"],
    ["Antarctica", "Antarctica"],
    ["Antigua and Barbuda", "Antigua and Barbuda"],
    ["Argentina", "Argentina"],
    ["Armenia", "Armenia"],
    ["Aruba", "Aruba"],
    ["Australia", "Australia"],
    ["Austria", "Austria"],
    ["Azerbaijan", "Azerbaijan"],
    ["Bahamas", "Bahamas"],
    ["Bahrain", "Bahrain"],
    ["Bangladesh", "Bangladesh"],
    ["Barbados", "Barbados"],
    ["Belarus", "Belarus"],
    ["Belgium", "Belgium"],
    ["Belize", "Belize"],
    ["Benin", "Benin"],
    ["Bermuda", "Bermuda"],
    ["Bhutan", "Bhutan"],
    ["Bolivia, Plurinational State of", "Bolivia, Plurinational State of"],
    ["Bonaire, Sint Eustatius and Saba", "Bonaire, Sint Eustatius and Saba"],
    ["Bosnia and Herzegovina", "Bosnia and Herzegovina"],
    ["Botswana", "Botswana"],
    ["Bouvet Island", "Bouvet Island"],
    ["Brazil", "Brazil"],
    ["British Indian Ocean Territory", "British Indian Ocean Territory"],
    ["Brunei Darussalam", "Brunei Darussalam"],
    ["Bulgaria", "Bulgaria"],
    ["Burkina Faso", "Burkina Faso"],
    ["Burundi", "Burundi"],
    ["Cambodia", "Cambodia"],
    ["Cameroon", "Cameroon"],
    ["Canada", "Canada"],
    ["Cape Verde", "Cape Verde"],
    ["Cayman Islands", "Cayman Islands"],
    ["Central African Republic", "Central African Republic"],
    ["Chad", "Chad"],
    ["Chile", "Chile"],
    ["China", "China"],
    ["Christmas Island", "Christmas Island"],
    ["Cocos (Keeling) Islands", "Cocos (Keeling) Islands"],
    ["Colombia", "Colombia"],
    ["Comoros", "Comoros"],
    ["Congo", "Congo"],
    ["Congo, The Democratic Republic of The", "Congo, The Democratic Republic of The"],
    ["Cook Islands", "Cook Islands"],
    ["Costa Rica", "Costa Rica"],
    ["Cote D'ivoire", "Cote D'ivoire"],
    ["Croatia", "Croatia"],
    ["Cuba", "Cuba"],
    ["Curacao", "Curacao"],
    ["Cyprus", "Cyprus"],
    ["Czech Republic", "Czech Republic"],
    ["Denmark", "Denmark"],
    ["Djibouti", "Djibouti"],
    ["Dominica", "Dominica"],
    ["Dominican Republic", "Dominican Republic"],
    ["Ecuador", "Ecuador"],
    ["Egypt", "Egypt"],
    ["El Salvador", "El Salvador"],
    ["Equatorial Guinea", "Equatorial Guinea"],
    ["Eritrea", "Eritrea"],
    ["Estonia", "Estonia"],
    ["Ethiopia", "Ethiopia"],
    ["Falkland Islands (Malvinas)", "Falkland Islands (Malvinas)"],
    ["Faroe Islands", "Faroe Islands"],
    ["Fiji", "Fiji"],
    ["Finland", "Finland"],
    ["France", "France"],
    ["French Guiana", "French Guiana"],
    ["French Polynesia", "French Polynesia"],
    ["French Southern Territories", "French Southern Territories"],
    ["Gabon", "Gabon"],
    ["Gambia", "Gambia"],
    ["Georgia", "Georgia"],
    ["Germany", "Germany"],
    ["Ghana", "Ghana"],
    ["Gibraltar", "Gibraltar"],
    ["Greece", "Greece"],
    ["Greenland", "Greenland"],
    ["Grenada", "Grenada"],
    ["Guadeloupe", "Guadeloupe"],
    ["Guam", "Guam"],
    ["Guatemala", "Guatemala"],
    ["Guernsey", "Guernsey"],
    ["Guinea", "Guinea"],
    ["Guinea-bissau", "Guinea-bissau"],
    ["Guyana", "Guyana"],
    ["Haiti", "Haiti"],
    ["Heard Island and Mcdonald Islands", "Heard Island and Mcdonald Islands"],
    ["Holy See (Vatican City State)", "Holy See (Vatican City State)"],
    ["Honduras", "Honduras"],
    ["Hong Kong", "Hong Kong"],
    ["Hungary", "Hungary"],
    ["Iceland", "Iceland"],
    ["India", "India"],
    ["Indonesia", "Indonesia"],
    ["Iran, Islamic Republic of", "Iran, Islamic Republic of"],
    ["Iraq", "Iraq"],
    ["Ireland", "Ireland"],
    ["Isle of Man", "Isle of Man"],
    ["Israel", "Israel"],
    ["Italy", "Italy"],
    ["Jamaica", "Jamaica"],
    ["Japan", "Japan"],
    ["Jersey", "Jersey"],
    ["Jordan", "Jordan"],
    ["Kazakhstan", "Kazakhstan"],
    ["Kenya", "Kenya"],
    ["Kiribati", "Kiribati"],
    ["Korea, Democratic People's Republic of", "Korea, Democratic People's Republic of"],
    ["Korea, Republic of", "Korea, Republic of"],
    ["Kuwait", "Kuwait"],
    ["Kyrgyzstan", "Kyrgyzstan"],
    ["Lao People's Democratic Republic", "Lao People's Democratic Republic"],
    ["Latvia", "Latvia"],
    ["Lebanon", "Lebanon"],
    ["Lesotho", "Lesotho"],
    [";Liberia", "Liberia"],
    ["Libya", "Libya"],
    ["Liechtenstein", "Liechtenstein"],
    ["Lithuania", "Lithuania"],
    ["Luxembourg", "Luxembourg"],
    ["Macao", "Macao"],
    ["Macedonia, The Former Yugoslav Republic of", "Macedonia, The Former Yugoslav Republic of"],
    ["Madagascar", "Madagascar"],
    ["Malawi", "Malawi"],
    ["Malaysia", "Malaysia"],
    ["Maldives", "Maldives"],
    ["Mali", "Mali"],
    ["Malta", "Malta"],
    ["Marshall Islands", "Marshall Islands"],
    ["Martinique", "Martinique"],
    ["Mauritania", "Mauritania"],
    ["Mauritius", "Mauritius"],
    ["Mayotte", "Mayotte"],
    ["Mexico", "Mexico"],
    ["Micronesia, Federated States of", "Micronesia, Federated States of"],
    ["Moldova, Republic of", "Moldova, Republic of"],
    ["Monaco", "Monaco"],
    ["Mongolia", "Mongolia"],
    ["Montenegro", "Montenegro"],
    ["Montserrat", "Montserrat"],
    ["Morocco", "Morocco"],
    ["Mozambique", "Mozambique"],
    ["Myanmar", "Myanmar"],
    ["Namibia", "Namibia"],
    ["Nauru", "Nauru"],
    ["Nepal", "Nepal"],
    ["Netherlands", "Netherlands"],
    ["New Caledonia", "New Caledonia"],
    ["New Zealand", "New Zealand"],
    ["Nicaragua", "Nicaragua"],
    ["Niger", "Niger"],
    ["Nigeria", "Nigeria"],
    ["Niue", "Niue"],
    ["Norfolk Island", "Norfolk Island"],
    ["Northern Mariana Islands", "Northern Mariana Islands"],
    ["Norway", "Norway"],
    ["Oman", "Oman"],
    ["Pakistan", "Pakistan"],
    ["Palau", "Palau"],
    ["Palestinian Territory, Occupied", "Palestinian Territory, Occupied"],
    ["Panama", "Panama"],
    ["Papua New Guinea", "Papua New Guinea"],
    ["Paraguay", "Paraguay"],
    ["Peru", "Peru"],
    ["Philippines", "Philippines"],
    ["Pitcairn", "Pitcairn"],
    ["Poland", "Poland"],
    ["Portugal", "Portugal"],
    ["Puerto Rico", "Puerto Rico"],
    ["Qatar", "Qatar"],
    ["Reunion", "Reunion"],
    ["Romania", "Romania"],
    ["Russian Federation", "Russian Federation"],
    ["Rwanda", "Rwanda"],
    ["Saint Barthelemy", "Saint Barthelemy"],
    ["Saint Helena, Ascension and Tristan da Cunha", "Saint Helena, Ascension and Tristan da Cunha"],
    ["Saint Kitts and Nevis", "Saint Kitts and Nevis"],
    ["Saint Lucia", "Saint Lucia"],
    ["Saint Martin (French part)", "Saint Martin (French part)"],
    ["Saint Pierre and Miquelon", "Saint Pierre and Miquelon"],
    ["Saint Vincent and The Grenadines", "Saint Vincent and The Grenadines"],
    ["Samoa", "Samoa"],
    ["San Marino", "San Marino"],
    ["Sao Tome and Principe", "Sao Tome and Principe"],
    ["Saudi Arabia", "Saudi Arabia"],
    ["Senegal", "Senegal"],
    ["Serbia", "Serbia"],
    ["Seychelles", "Seychelles"],
    ["Sierra Leone", "Sierra Leone"],
    ["Singapore", "Singapore"],
    ["Sint Maarten (Dutch part)", "Sint Maarten (Dutch part)"],
    ["Slovakia", "Slovakia"],
    ["Slovenia", "Slovenia"],
    ["Solomon Islands", "Solomon Islands"],
    ["Somalia", "Somalia"],
    ["South Africa", "South Africa"],
    ["South Georgia and The South Sandwich Islands", "South Georgia and The South Sandwich Islands"],
    ["South Sudan", "South Sudan"],
    ["Spain", "Spain"],
    ["Sri Lanka", "Sri Lanka"],
    ["Sudan", "Sudan"],
    ["Suriname", "Suriname"],
    ["Svalbard and Jan Mayen", "Svalbard and Jan Mayen"],
    ["Swaziland", "Swaziland"],
    ["Sweden", "Sweden"],
    ["Switzerland", "Switzerland"],
    ["Syrian Arab Republic", "Syrian Arab Republic"],
    ["Taiwan, Province of China", "Taiwan, Province of China"],
    ["Tajikistan", "Tajikistan"],
    ["Tanzania, United Republic of", "Tanzania, United Republic of"],
    ["Thailand", "Thailand"],
    ["Timor-leste", "Timor-leste"],
    ["Togo", "Togo"],
    ["Tokelau", "Tokelau"],
    ["Tonga", "Tonga"],
    ["Trinidad and Tobago", "Trinidad and Tobago"],
    ["Tunisia", "Tunisia"],
    ["Turkey", "Turkey"],
    ["Turkmenistan", "Turkmenistan"],
    ["Turks and Caicos Islands", "Turks and Caicos Islands"],
    ["Tuvalu", "Tuvalu"],
    ["Uganda", "Uganda"],
    ["Ukraine", "Ukraine"],
    ["United Arab Emirates", "United Arab Emirates"],
    ["United Kingdom", "United Kingdom"],
    ["United States", "United States"],
    ["United States Minor Outlying Islands", "United States Minor Outlying Islands"],
    ["Uruguay", "Uruguay"],
    ["Uzbekistan", "Uzbekistan"],
    ["Vanuatu", "Vanuatu"],
    ["Venezuela, Bolivarian Republic of", "Venezuela, Bolivarian Republic of"],
    ["Virgin Islands, British", "Virgin Islands, British"],
    ["Virgin Islands, U.S.", "Virgin Islands, U.S."],
    ["Wallis and Futuna", "Wallis and Futuna"],
    ["Western Sahara", "Western Sahara"],
    ["Yemen", "Yemen"],
    ["Zambia", "Zambia"],
    ["Zimbabwe", "Zimbabwe"]
];
}

function random_code($number_character) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $number_character; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
function slack($message, $channel)
{
    $data = http_build_query([
        "token" => "xoxp-203338040548-203338040676-845646828246-7ab637f08799fd204f0dbb6e8fbca805",
        // "channel" => 'bear-thug-life',
        "channel" => (env('SLACK_CHANNEL') ? $channel : 'test'),
        "text" => $message, //"Hello, Foo-Bar channel message.",
        "username" => "MySlackBot",
    ]);
    sleep(random_int(1,3));
    fetchAsync('https://slack.com/api/chat.postMessage', $data);

    return  '';
}

function format_phone($telephone){
    return preg_replace('/,|\.|\s/', '', $telephone);
}

function send_noti_for_app($dbname,$noti_id,$type = 0, $moba = 0){
    if (!USE_FIREBASE) return;
    // send_noti_without_thread($noti_id,$type);
    $command = "php index.php AppNotification send_noti_with_thread \"$dbname\" $noti_id $type $moba";
    run_background_process($command);
}

function send_noti_without_thread($noti_id,$type){
    $CI = get_instance();
    $CI->load->model(array('mnotification','mnotification_user','mdashboard_news'));
    $app_receiver = $CI->mnotification->get_data($noti_id)['app_receiver'];
    // var_dump(json_decode($app_receiver));die;
    $app_receiver = json_decode($app_receiver);
    $topic = array();
    foreach($app_receiver as $noti_type => $ar) {
        if(!empty($ar)) {
            foreach($ar as $app) {
                if($app != -1) {
                    $topic[] = generate_app_notification_topic_name_by_type($noti_type,$app);
                }
            }
        }
    }

//    var_dump($topic);die;
    if($type == 0) {
        $noti_data = $CI->mnotification->get_data($noti_id);
        $noti_data['title_2'] = generate_notifcation_type_to_title($noti_data['type']);

    }elseif($type == 1) {
        $noti_data = $CI->mdashboard_news->get_data($noti_id);
        $noti_data['url'] = base_url()."Dashboard";
        $noti_data['title_2'] = $CI->lang->line('dashboard_news_noti').': '.$noti_data['title'];
        $noti_data['title'] = $noti_data['content'];
    }
     //Send notification to app
    $noti_data = array(
        'url' => base_url().$noti_data['link'],
        'title' => $noti_data['title_2'],
        'body' => $noti_data['title'],
        'content_available' => true,
        'priority' => 'high'
    );

    //fcm api connection
    $headers = array(
        'Authorization: key=' . $CI->config->item('fcm_server_key'),
        'Content-Type: application/json'
    );

    $curl_opt = array(
        CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_SSL_VERIFYPEER => FALSE
    );
    $mh = curl_multi_init();
    // var_dump($topic);die;
    foreach($topic as $key => $t){
        $message = [
            'to' => $t,
            'data' => $noti_data,
            'notification' => $noti_data,
        ];
        $curl_opt[CURLOPT_POSTFIELDS] = json_encode($message);
        $ch[$key] = curl_init();
        curl_setopt_array($ch[$key],$curl_opt);
        curl_multi_add_handle($mh,$ch[$key]);
    }

    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);

    curl_multi_close($mh);
    // echo 'Thread Done!';
}

function run_background_process($command){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        pclose(popen("start /B ". $command, "w"));
    } else {
        exec($command  . " > /dev/null &");
    }
}

function generate_topic_app_notification($receiver,$noti_type){
    $topic = array();
    // $receiver = array('11352'); //for test

    foreach($receiver as $r){
        $topic[] = generate_app_notification_topic_name_by_type($noti_type,$r);
    }
    return $topic;
}

function generate_app_notification_topic_name_by_type($domain,$noti_type,$key = '1'){
    $topic_type = '/topics';
    $prefix = 'myspa';
    $key = encode($key);
    if(isset($noti_type) && $noti_type != ''){
        switch ($noti_type) {
            case 'all_company':
                return "$topic_type/$prefix..all";
                break;
            case 'all_user':
                return "$topic_type/$prefix..$domain";
                break;
            case 'list_user':
                return "$topic_type/$prefix..$domain..user-$key";
                break;
            case 'group_user':
                return "$topic_type/$prefix..$domain..gkey-$key";
                break;
            case 'role_user':
                return "$topic_type/$prefix..$domain..rkey-$key";
                break;
            default:
                return "$topic_type/$prefix..$domain..user-$key";
                break;
        }
    }else {
        return 'Unknow topic type';
    }
}

function generate_moba_app_notification_topic_name_by_type($domain, $noti_type,$key = '1'){
    $prefix = '/topics';
    $topic_type = 'myspa-moba';
    $key = encode($key);
    if(isset($noti_type) && $noti_type != ''){
        switch ($noti_type) {
            case 'all_user':
                return "$prefix/$topic_type..$domain..user";
                break;
            case 'all_guest':
                return "$prefix/$topic_type..$domain..guest";
                break;
            case 'list_user':
                return "$prefix/$topic_type..$domain..user-$key";
                break;
            default:
                return "$prefix/$topic_type..$domain..user-$key";
                break;
        }
    }else {
        return 'Unknow topic type';
    }
}

function generate_notifcation_type_to_title($type){
    $CI = get_instance();
    $type_title = array(
        '-1'     => $CI->lang->line('notification_type_user_push') ,
        '1'     => $CI->lang->line('notification_type_check_in') ,
        '2'     => $CI->lang->line('notification_type_contact') ,
        '3'     => $CI->lang->line('notification_type_booking'),
        '4'     => $CI->lang->line('notification_type_review'),
        '5'     => $CI->lang->line('notification_type_order_sale'),
        '6'     => $CI->lang->line('notification_type_appointment'),
        '7'     => $CI->lang->line('notification_type_staff_receive_commission'),
        '11'    => $CI->lang->line('notification_type_inventory_branch_transfer'),
        '12'    => $CI->lang->line('notification_type_out_of_stock'),
        '13'    => $CI->lang->line('notification_type_product_expiry_warning'),
        '14'    => $CI->lang->line('notification_type_annoucement_promotion'),
    );
    return isset($type_title[$type]) ? $type_title[$type] : '';
}

function seconds_to_day_conversion($seconds){
    return (($seconds/60)/60)/24;
}

function convert_contract_type_to_color($type){
    foreach(MYSPA_PLANS as $plan => $value) {
        if($type == $plan) {
            return $value['color'];
        }else {
            $color = "#c377e0";
        }
    }
    return $color;
}

function convert_contract_type_to_title($type){
    $CI = get_instance();
    $title = $CI->lang->line('basic');
    if($type == 'basic'){
        $title = $CI->lang->line('basic');
    }else if($type == 'medium'){
        $title = $CI->lang->line('medium');
    }else if($type == 'vip'){
        $title = $CI->lang->line('vip');
    }else {
        $title = $CI->lang->line('basic');
    }
    return $title;
}

function count_total_money_extension_contract($plan = 'basic',$branch_num = 1){
    $total_money = 0;
    $monthly_fee = 0;
    $monthly_extra_branch_fee = 0;
    foreach(MYSPA_PLANS as $key => $value ) {
        if($plan == $key) {
            $monthly_fee = $value['monthly_fee'];
            $monthly_extra_branch_fee = $value['monthly_extra_branch_fee'];
            break;
        }
    }
    $branch_num = $branch_num - 1 ; //except first branch;
    $yearly_fee = ($monthly_fee * 12) + (($monthly_extra_branch_fee * $branch_num) * 12);
    $total_money = $yearly_fee;
    return $total_money;
}

function create_folder_if_not_exist($folder_path){
    if(is_dir($folder_path) == false){
        mkdir($folder_path,0755,true);
    }
    return true;
}

function generate_referral_setting_title_by_type($type) {
    $CI = get_instance();
    switch ($type) {
        case 1:
            return $CI->lang->line('referral_type_1');
            break;
        case 2:

            return $CI->lang->line('referral_type_2');
            break;
        default:
            # code...
            break;
    }
}

function generate_url_params($mixed = array()) {
    $params_url = "";
    if(is_array($mixed)){
        if(!empty($mixed)) {
            $params_url = http_build_query($mixed,'','&');
        }
    }
    if($params_url != "" ){
        return "?".$params_url;
    }
    return $params_url;
}
function get_dir_total($directory,$type) {
    $size = 0;
    $counter = 0;
    if(!file_exists($directory)) {
        return 0;
    }
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory,FilesystemIterator::SKIP_DOTS)) as $file){
        $size+=$file->getSize();
        $counter++;
    }
    return ['total_size' => $size,'total_file' => $counter,'type' => $type];
}

function get_folder_total($user_folder) {
    if(COMPANY_N == '') {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR;
    }else {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR.COMPANY_N.DIRECTORY_SEPARATOR;
    }
    $dir_total = [];
    foreach($user_folder as $f){
        $folder = $base_dir.$f;
        $dir_total[] = get_dir_total($folder,$f);
    }
    return $dir_total;
}

function get_folder_files($type,$offset,$limit) {
    if(COMPANY_N == '') {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR;
    }else {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR.COMPANY_N.DIRECTORY_SEPARATOR;
    }
    $folder = $base_dir.$type;
    $user_file_list = get_dir_files($folder,$type,$offset,$limit);
    return $user_file_list;
}

function get_dir_files($directory,$prefix,$offset,$limit) {
    $files['files'] = [];
    $files['type'] = $prefix;
    $files['dir'] = $directory;
    $size = 0;
    $counter = 0;
    if(!file_exists($directory)) {
        return [];
    }
    foreach(new LimitIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory,FilesystemIterator::SKIP_DOTS)),$offset,$limit) as $file){
        $file = array(
            'file_size' => $file->getSize(),
            'file_name' => $file->getFileName(),
            'file_extension' => $file->getExtension(),
            'file_url' => generate_file_path_to_url($file->getRealPath())
        );
        $files['files'][] = $file;
        $size += $file['file_size'];
        $counter++;
    }
    $files['total_size'] = $size;
    $files['total_file'] = $counter;
    return $files;
}

function generate_url_to_file_path($url) {

    $prefix_url = "";
    $url = explode('files',$url);
    $prefix_url = isset($url[1]) ? $url[1] : "";
    $prefix_path = str_replace("/",DIRECTORY_SEPARATOR,$prefix_url);
    $dir = FCPATH."files".DIRECTORY_SEPARATOR.$prefix_path;
    return str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR,$dir);
}

function generate_file_path_to_url($dir) {
    $prefix_path = "";
    $dir = explode('files',$dir);
    $prefix_path = isset($dir[1]) ? $dir[1] : "";
    $prefix_url = str_replace(DIRECTORY_SEPARATOR,"/",$prefix_path);
    $url = base_url()."files".$prefix_url;
    return $url;
}

function format_size_units($bytes)
{
    if (abs($bytes) >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif (abs($bytes) >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif (abs($bytes) >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif (abs($bytes) > 1)
    {
        $bytes = $bytes . ' B';
    }
    elseif (abs($bytes) == 1)
    {
        $bytes = $bytes . ' B';
    }
    else
    {
        $bytes = '0 B';
    }

    return $bytes;
}

function convert_gb_to_bytes($gb) {
    $bytes = (round($gb * 1073741824, 2));
    return $bytes;
}

function convert_bytes_to_gb($bytes) {
    $gb = (round($bytes / 1073741824, 3));
    return $gb;
}

function is_image($extension)
{
	$image_type = ['jpge','jpg','png','gif'];

	if(in_array(strtolower($extension), $image_type))
	{
		return true;
	}
	return false;
}

function prepare_db_structure($dbname) {
    if(check_existed_db_in_connection($dbname)){
        return ['status' => 'fail', 'message' => "DB `$dbname` đã tồn tại trong connection"];
    }else {
        $base_structure = FCPATH."files".DIRECTORY_SEPARATOR."db_structure".DIRECTORY_SEPARATOR.MYSPA_STRUCTURE_TENANT.".sql";
        if(file_exists($base_structure)) {
            $tenant_structure = FCPATH."files".DIRECTORY_SEPARATOR."db_structure".DIRECTORY_SEPARATOR."new_tenant_structure.sql";
            if(file_exists($tenant_structure)) {
                unlink($tenant_structure);
            }
            copy($base_structure,$tenant_structure);

            $s = file_get_contents($tenant_structure);
            $s = str_replace('[myspa_db_name]',$dbname,$s);
            unlink($tenant_structure);
            file_put_contents($tenant_structure, $s);
            return ['status' => 'ok', 'message' => "PREPARED", 'tenant_structure' => $tenant_structure];
        }else {
            echo "MYSPA STRUCTURE DOES NOT EXIST";exit;
            return ['status' => 'fail', 'message' => "Không tìm thấy sql db structure '$base_structure' "];
        }
    }
}


function execute_tenant_structure($path) {
    $CI = get_instance();
    $CI->load->database();
    $mysqli = new mysqli($CI->db->hostname, $CI->db->username, $CI->db->password);
    if (mysqli_connect_errno()) {
        return false;
    }
    $sql = file_get_contents($path);
    $mysqli->multi_query($sql);
    return true;
}

function check_existed_db_in_connection($dbname) {
    $CI = get_instance();
    $CI->load->database();
    $CI->db->db_select(MYSPA_MANAGER_DBNAME);
    $sql = "
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '$dbname'
    ";

    $query = $CI->db->query($sql);
    $data = $query->row_array();
    $CI->db->db_select(DBNAME);
    if(!empty($data)) {
        return true;
    }else {
        return false;
    }
}

function add_dns_record_cloudflare($api_token,$zone_id,$data) {

    $curl = curl_init();

    $data = json_encode($data);
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "content-type: application/json",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return ['success' => false,'errors' => [0 =>['message' => 'Không thể kết nối tới cloudflare!']]];
    } else {
        return json_decode($response,true);
    }

}

function update_dns_record_cloudflare($api_token,$zone_id,$dns_record_id,$data){
    $curl = curl_init();

    $data = json_encode($data);
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records/$dns_record_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: b2a730c3-670a-bf72-5df3-0599b065dceb"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return ['success' => false,'errors' => [0 =>['message' => 'Không thể kết nối tới cloudflare!']]];
    } else {
        return json_decode($response,true);
    }
}

function delete_dns_record_cloudflare($api_token,$zone_id,$dns_record_id) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records/$dns_record_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "DELETE",
    CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 9912cf03-ed7a-7f90-eb98-7eaeeb905fbe"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return ['success' => false,'errors' => [0 =>['message' => 'Không thể kết nối tới cloudflare!']]];
    } else {
        return json_decode($response,true);
    }
}

function available_dns_record_cloudflare($api_token,$zone_id,$subdomain) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records?type=A&name=$subdomain",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "content-type: application/json",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return false;
    } else {
        $response = json_decode($response,true);
        if(empty($response['result'])) {
            return true;
        }
        return false;
    }
}

function find_dns_record_cloudflare_by_subdomain($api_token,$zone_id,$subdomain) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records?type=A&name=$subdomain",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "content-type: application/json",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return 'Không thể kết nối tới cloudflare!';
    } else {
        $response = json_decode($response,true);
        if($response['success']) {
            return $response['result'];
        }else {
            return $response['errors'][0]['message'];
        }
    }
}

function get_list_dns_record_cloudflare($api_token,$zone_id,$type = "A") {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records?type=$type",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "authorization: $api_token",
        "content-type: application/json",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return 'Không thể kết nối tới cloudflare!';
    } else {
        $response = json_decode($response,true);
        if($response['success']) {
            return $response['result'];
        }else {
            return $response['errors'][0]['message'];
        }
    }
}

function regenerate_db_structure_tenant() {
    $CI =& get_instance();
    $CI->load->dbutil();
    $CI->load->database();
    $CI->load->helper('file');
    $CI->db->db_select(MYSPA_STRUCTURE_TENANT);
    if(!$CI->dbutil->database_exists(MYSPA_STRUCTURE_TENANT)) {
        return json_encode(['status' => 'fail','message' => 'Không tìm thấy database: ' . MYSPA_STRUCTURE_TENANT .' để đổng bộ']);exit;
    }
    $structure_name = MYSPA_STRUCTURE_TENANT;
    $structure_tenant = $structure_name.".sql";
    $backup = $CI->dbutil->backup(['format' => 'sql','add_drop' => false]);
    $path_to_structure = FCPATH."files".DIRECTORY_SEPARATOR."db_structure".DIRECTORY_SEPARATOR;
    if(!is_dir($path_to_structure)) {
        mkdir($path_to_structure, 0777, true);
    }
    if(file_exists($path_to_structure.$structure_tenant)){
        unlink($path_to_structure.$structure_tenant);
    }
    write_file($path_to_structure.$structure_tenant, $backup);
    $prepend_structure = "\r\nCREATE DATABASE [myspa_db_name]; \r\nUSE [myspa_db_name]; \r\n";
    $sql_structure = file_get_contents($path_to_structure.$structure_tenant);
    file_put_contents($path_to_structure.$structure_tenant,$prepend_structure.$sql_structure);

    $CI->db->db_select(DBNAME);
    return json_encode(
        [
            'status' => 'ok',
            'message' => 'Đã đồng bộ cấu trúc từ database: '.MYSPA_STRUCTURE_TENANT,
            'data' => [
                'filename' => MYSPA_STRUCTURE_TENANT.".sql",
                'filetime' => date('d/m/Y H:i:s',filemtime($path_to_structure.$structure_tenant)),
            ]
        ]
    );
}

function search_prepare_query($raw_search_query) {
    preg_match_all('#\{(.*?)\}#',$raw_search_query,$aq);
    $query_statement['WHERE'] = "";
    $query_statement['SORT'] = "";
    foreach($aq[1] as $query) {
        $statement_type = explode(' ',trim($query));
        if($statement_type[0] == 'WHERE') {
            $handled_query = array_splice($statement_type,1);
            $handled_query = implode(' ',$handled_query);
            $query_statement['WHERE'] .= " AND $handled_query ";
        }

        if($statement_type[0] == 'ORDER') {
            $query_statement['SORT'] = "";
            $handled_query = implode(' ',$statement_type);
            $query_statement['SORT'] .= " $handled_query ";
        }
    }
    return $query_statement;
}

function get_menu_myspa_manager($user_id, $user_group_id) {
    $CI  = get_instance();
    $options = $CI->moption->get_data(1);
    $first_date_this_month = date('01/m/Y');
    $last_day_this_month = date('t/m/Y');

    // $menu_dashboard     = check_menu_access('dashboard', 'dashboard',$user_id,$user_group_id);
    // $menu_member_list   = check_menu_access('manage_user', 'member_list',$user_id,$user_group_id);


    $nav_list = [
        ['title' => 'QUẢN LÝ TENANT','code' => 'manage_tenant', 'url' => 'myspa_manager/ManageTenant/index', 'icon' => 'home', 'icon_web' => 'icon icon-screen-desktop', 'has_access' => true, 'extra_class' => '','controller_access' => ''],
        // [
        //     'title' => $CI->lang->line('sales_pos'),
        //     'url' => '',
        //     'code' => 'manage_sales_pos',
        //     'icon' => 'handbag','icon_web' => 'icon icon-handbag',
        //     'has_access' => ( true || true ) ? true : false,
        //     'sub' => [
        //         ['title' => $CI->lang->line('create_order'), 'code' => 'create_order', 'url' => 'ManageOrder/add_order', 'has_access' => true],
        //         ['title' => $CI->lang->line('list_order'), 'code' => 'list_order', 'url' => 'ManageOrder/order_list', 'has_access' => true],
        //         ['title' => $CI->lang->line('bed_and_room'), 'code' => 'bed_and_room', 'url' => 'ManageRoom/bed_list', 'has_access' => true],
        //     ],
        // ],

    ];

    $nav_list = remove_unauthorize_nav_list($nav_list);
    return $nav_list;
}

function generate_merchant_action_log_title($title) {

    $CI = get_instance();
    $keyword = array(
        '[send_mail_logging]'
    );
    $replacement = array(
        'Gửi mail'
    );
    return str_replace($keyword,$replacement,$title);
}

function remove_spaces($val){
    return preg_replace("/\s+/", "", $val);
}
function resizeImage($SrcImage,$DestImage, $MaxWidth,$MaxHeight,$Quality)
{
    list($iWidth,$iHeight,$type)	= getimagesize($SrcImage);
    $ImageScale          	= min($MaxWidth/$iWidth, $MaxHeight/$iHeight);
    $NewWidth              	= ceil($ImageScale*$iWidth);
    $NewHeight             	= ceil($ImageScale*$iHeight);
    $NewCanves             	= imagecreatetruecolor($NewWidth, $NewHeight);

    switch(strtolower(image_type_to_mime_type($type)))
    {
        case 'image/jpeg':
            $NewImage = imagecreatefromjpeg($SrcImage);
            break;
        case 'image/png':
            $NewImage = imagecreatefrompng($SrcImage);
            break;
        case 'image/gif':
            $NewImage = imagecreatefromgif($SrcImage);
            break;
        default:
            return false;
    }

    // Resize Image
    if(imagecopyresampled($NewCanves, $NewImage,0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight))
    {
        // copy file
        if(imagejpeg($NewCanves,$DestImage,$Quality))
        {
            imagedestroy($NewCanves);
            return true;
        }
    }
}
function get_folder_files_url($folder_name) {
    if(COMPANY_N == '') {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR;
    }else {
        $base_dir = FCPATH."files".DIRECTORY_SEPARATOR.COMPANY_N.DIRECTORY_SEPARATOR;
    }
    $folder_url = $base_dir.$folder_name.DIRECTORY_SEPARATOR;
    return $folder_url;
}

function dd(...$vars){
    var_dump(...$vars);die;
}

function filter_array_column(array $column,array $array = [], $multiple = false){
    $filtered_array = [];
    if($multiple) {
        foreach($array as $index => $item) {
            foreach($item as $key => $value) {
                if(in_array($key, $column)) {
                    $filtered_array[$index][$key] = $value;
                }
            }
        }
    }else {
        foreach($array as $key => $value) {
            if(in_array($key, $column)) {
                $filtered_array[$key] = $value;
            }
        }
    }

    return $filtered_array;
}

function cast_variable($value, $type = 'string') {
    switch ($type) {
        case 'string':
            $casted = (string) $type;
            break;
        case 'int':
            $casted = (int) $type;
            break;
        case 'float':
            $casted = (float) $type;
            break;
        case 'bool' | 'boolean':
            $casted = (bool) $type;
            break;

        case 'json':
            $casted = json_encode($type);
            break;
        default:
            $casted = $value;
            break;
    }

    return $casted;
}


function change_array_column_name(array $columns,array $array, $multiple = false){
    if($multiple) {
        foreach($array as $index => $item) {
            foreach($item as $key => $value) {
                foreach($columns as $column => $to) {
                    if($key == $column) {
                        $array[$index][$to] = $value;
                        unset($array[$index][$column]);
                    }
                }
            }
        }
    }else {
        foreach($array as $key => $value) {
            foreach($columns as $from => $to) {
                if($key == $from) {
                    $array[$to] = $value;
                    unset($array[$from]);
                }
            }
        }
    }

    return $array;
}

function is_valid_location($lat, $long)
{
    $lat_pattern = '/^(\+|-)?(?:90(?:(?:\.0{1,8})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/';
    $long_pattern = '/^(\+|-)?(?:180(?:(?:\.0{1,8})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/';
    return preg_match($lat_pattern, $lat) && preg_match($long_pattern, $long);
}

function is_valid_date($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}


function get_total_available_prepaid_money_by_uid($uid) {
    $CI = get_instance();
    $CI->load->database();
    $CI->load->model(array('mprovince', 'mprepay_card', 'mprepay_card_log', 'morder_detail', 'morder_payment_history', 'morder', 'mpayment_history'));
    $total_use_value = $CI->mprepay_card->get_total_prepay_card_use_value_by_uid($uid);
    $prepay_card_debit = 0;
    $prepay_card_list = $CI->mprepay_card->get_data_from_uid($uid);
    $debt = $CI->morder_payment_history->get_debt_from_user($uid);
    $total_debt = 0;
    foreach($debt as $item) {
        $total_debt += $item['remain_money'];
    }
    foreach($prepay_card_list as $key => $prepay_card){
        $order_card = $CI->morder_detail->get_card_data($prepay_card['id'], 4);
        $debit = 0;
        if($order_card){
            $debt_val = 0;
            foreach($debt as $value){
                if($value['ord_id'] == $order_card['order_id']){
                    $debt_val = $value['remain_money'];
                    break;
                }
            }
            $order_data = $CI->morder->get_data($order_card['order_id']);
            $topup_rate = $order_data['total_money'] == 0? 0:$debt_val/$order_data['total_money'];
            $debit = $order_card['price']*$order_card['quantity']*$topup_rate;
        }
        else
            $debit = $CI->mpayment_history->get_last_remain_money_by_card_id($prepay_card['id'],PREPAY_CARD_TYPE);
        $prepay_card_debit += $debit;
    }
    $total_charged_money = $CI->mprepay_card_log->get_total_charged_by_uid($uid);
    $total_available = $total_use_value - $prepay_card_debit - $total_charged_money;
    return array(
        'total_debt'        => $total_debt,
        'total_available'   => $total_available,
        'total_use_value'   => $total_use_value,
        'prepay_card_debit' => $prepay_card_debit,
        'total_charged_money' => $total_charged_money,
    );
}

function url_image($image_path, $image = null, $checkImageResponse = true){
    if(!$image) {
        return  base_url('files/default.jpg');
    }

    $pathArr = array_filter(['files', COMPANY_N, $image_path, $image]);

    $url = base_url(array_to_path($pathArr));

    // if($checkImageResponse && !UR_exists($url)) {
    //     return  base_url('files/default.jpg');
    // }
    return $url;
}

function array_to_path($array){
    return implode('/', $array);
}

function UR_exists($url){
    $headers=get_headers($url);
    return stripos($headers[0],"200 OK")?true:false;
 }

 function get_menu_moba_manager($user_id, $user_group_id) {
    $CI  = get_instance();
    $options = $CI->moption->get_data(1);

    // $menu_dashboard     = check_menu_access('dashboard', 'dashboard',$user_id,$user_group_id);
    // $menu_member_list   = check_menu_access('manage_user', 'member_list',$user_id,$user_group_id);


    $nav_list = [
        [
            'title' => lang('gallery'),
            'code' => 'manage_gallery',
            'url' => 'moba_manager/ManageGallery/index',
            'icon' => 'picture',
            'icon_web' => 'icon icon-picture',
            'has_access' => true,
            'extra_class' => '',
            'controller_access' => ''
        ],
        [
            'title' => lang('branch'),
            'code' => 'manage_branch',
            'url' => 'moba_manager/ManageBranch/index',
            'icon' => 'direction',
            'icon_web' => 'icon icon-direction',
            'has_access' => true,
            'extra_class' => '',
            'controller_access' => ''
        ],
        [
            'title' => lang('manage_banner'),
            'code' => 'manage_banner',
            'url' => 'moba_manager/ManageBanner/index',
            'icon' => 'film',
            'icon_web' => 'icon icon-film',
            'has_access' => true,
            'extra_class' => '',
            'controller_access' => ''
        ],
        [
            'title' => lang('manage_moba_home_screen'),
            'code' => 'manage_moba_home_screen',
            'url' => '',
            'icon' => 'screen-smartphone',
            'icon_web' => 'icon icon-screen-smartphone',
            'has_access' => true,
            'extra_class' => '',
            'controller_access' => '',
            'sub' => [
                ['title' => lang('featured_services'), 'code' => 'featured_services', 'url' => 'moba_manager/ManageMobaHome/featured_service_list', 'has_access' => true],
                ['title' => lang('service_product_treatment_acronym_chain'), 'code' => 'spt_list', 'url' => 'moba_manager/ManageMobaHome/spt_list', 'has_access' => true],
            ],
        ],
        // [
        //     'title' => $CI->lang->line('sales_pos'),
        //     'url' => '',
        //     'code' => 'manage_sales_pos',
        //     'icon' => 'handbag','icon_web' => 'icon icon-handbag',
        //     'has_access' => ( true || true ) ? true : false,
            // 'sub' => [

        // ],

    ];

    $nav_list = remove_unauthorize_nav_list($nav_list);
    return $nav_list;
}

function moba_manager_base_url($uri = '', array $params = [])
{
    $CI = get_instance();
    if($CI->input->get('merchant_app') == 1) {
        $params['merchant_app'] = '1';
    }

    $query = http_build_query($params);

    $searchParams = $query != '' ? '?' . $query : '';

    return base_url('moba_manager/'. $uri . $searchParams);
}

function upload_image($image_path, $image) {

    $file_name = date('YmdHis').'.jpg';
    $dst = 'files/' . $image_path. '/';

    if(MULTIPLE_DB == true){
        if(is_dir(FCPATH. "files".DIRECTORY_SEPARATOR.COMPANY_NAME.DIRECTORY_SEPARATOR.$image_path) == false){
            mkdir((FCPATH. "files".DIRECTORY_SEPARATOR.COMPANY_NAME.DIRECTORY_SEPARATOR.$image_path),0777,true);
        }
        $dst = "files".DIRECTORY_SEPARATOR.COMPANY_NAME.DIRECTORY_SEPARATOR.$image_path.DIRECTORY_SEPARATOR;
    }

    $config['upload_path'] = $dst;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['file_name'] = $file_name;

    $CI = get_instance();
    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($image)){
        $error = array('error' => $CI->upload->display_errors());
        return $error;
    }
    else{
        $data = array('upload_data' => $CI->upload->data());
        if($data['upload_data']['file_size'] > 3000){
            ImageJPEG(ImageCreateFromString(file_get_contents($data['upload_data']['full_path'])), $data['upload_data']['full_path'], 70);
        }
        return $data;
    }

}

function lang($key) {
    $CI = get_instance();

    return $CI->lang->line($key);
}

function is_url($uri){
    if(preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$uri)){
      return $uri;
    }
    else{
        return false;
    }
}

function generate_url($hostname, $path)
{
    return 'https://' . $hostname . '/' . $path;
}

function subArraysToString($ar, $sep = ', ') {
    $str = '';
    foreach ($ar as $val) {
        $str .= implode($sep, $val);
        $str .= $sep; // add separator between sub-arrays
    }
    $str = rtrim($str, $sep); // remove last separator
    return $str;
}