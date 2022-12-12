<?php
/**
 * Created by PhpStorm.
 * Date: 12/13/16
 * Time: 2:54 PM
 */

class MY_Loader extends CI_Loader {

    public function __construct(){
        parent::__construct();
        $this->CI =& get_instance();
        $this->_ci_events_paths = array(APPPATH);
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
            $this->CI->load->model(array('mnotification','muser','mcompany_info','mstaff','mbranch','mip_blocked','moption','mcompany_contract','mip_priviledge','mmyspa_manager','morder_payment_history','mpayment_history','msms_config','msms'));
            $this->CI->load->helper('lib_helper');
            $this->CI->load->database();
            $user_id            = $this->CI->session->userdata('user_id');
            $this->CI->mnotification->_branch_id = $this->CI->session->userdata('branch_id');
            $vars['notification_list']  = $this->CI->mnotification->get_all_notification_by_user(20,0,'desc',$user_id,true);

            $this->CI->mcompany_info->_branch_id = $this->CI->session->userdata('branch_id');
            $vars['company_info']       = $this->CI->mcompany_info->get_data();
            $vars['system_options']       = $this->CI->moption->get_data();
            $vars['option']       = $this->CI->moption->get_data(1);
            $check_front_page       = null;
            //if (!isset($vars['front_page']) || $vars['front_page'] === FALSE) {
            $vars['hide_member_phone']  = $this->CI->check_access('manage_user','hide_member_phone');
            //    $check_front_page = false;
            //}
            $vars['current_currency'] = $this->CI->session->userdata('site_currency') ? $this->CI->session->userdata('site_currency') : $this->CI->config->item('base_currency');
            $vars['base_currency'] = $vars['current_currency'];
            $vars['nav_list'] = get_menu($this->CI->session->userdata('user_id'),$this->CI->session->userdata('user_group_id'));

            $this->view('layout/header', $vars);
            $this->view($template_name, $vars);
            $this->view('layout/footer', $vars);
        endif;

    }
    function footer_frontend(){
        $this->view('frontend/partial/footer');
    }
    function nav_bar_frontend(){
        $this->view('frontend/partial/nav_bar');
    }
    function pop_up_frontend($vars = array()){
        $this->view('frontend/partial/pop_up',$vars);
    }
    public function template_frontend($template_name, $vars = array(), $return = FALSE)
    {
        $vars['actual_link'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $vars['this_controller'] = $this;
        if($return):
            $content  = $this->view('frontend/layout/header', $vars, $return);
            $content .= $this->view('frontend/'.$template_name, $vars, $return);
            $content .= $this->view('frontend/layout/footer', $vars, $return);

            return $content;
        else:
            $this->view('frontend/layout/header', $vars);
            $this->view('frontend/'.$template_name, $vars);
            $this->view('frontend/layout/footer', $vars);
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

    public function event($event = '', $params = NULL, $object_name = NULL)
    {
        if (is_array($event))
        {
            foreach ($event as $class)
            {
                $this->library($class, $params);
            }

            return;
        }

        if ($event == '' OR isset($this->_base_classes[$event]))
        {
            return FALSE;
        }

        if ( ! is_null($params) && ! is_array($params))
        {
            $params = NULL;
        }

        $this->_ci_events_class($event, $params, $object_name);
    }

    public function events($event = '', $params = NULL, $object_name = NULL)
    {
        if (is_array($event))
        {
            foreach ($event as $class)
            {
                $this->library($class, $params);
            }
        }
        return;
    }

    protected function _ci_events_class($class, $params = NULL, $object_name = NULL) {
        // Get the class name, and while we're at it trim any slashes.
        // The directory path can be included as part of the class name,
        // but we don't want a leading slash
        $class = str_replace('.php', '', trim($class, '/'));

        // Was the path included with the class name?
        // We look for a slash to determine this
        $subdir = '';
        if (($last_slash = strrpos($class, '/')) !== FALSE) {
            // Extract the path
            $subdir = substr($class, 0, $last_slash + 1);

            // Get the filename from the path
            $class = substr($class, $last_slash + 1);
        }

        // We'll test for both lowercase and capitalized versions of the file name
        foreach (array(ucfirst($class), strtolower($class)) as $class) {
            $subclass = APPPATH . 'events/' . $subdir . config_item('subclass_prefix') . $class . '.php';

            // Is this a class extension request?
            if (file_exists($subclass)) {
                $baseclass = BASEPATH . 'events/' . ucfirst($class) . '.php';

                if (!file_exists($baseclass)) {
                    log_message('error', "Unable to load the requested class: " . $class);
                    show_error("Unable to load the requested class: " . $class);
                }

                // Safety:  Was the class already loaded by a previous call?
                if (in_array($subclass, $this->_ci_library_paths)) {
                    // Before we deem this to be a duplicate request, let's see
                    // if a custom object name is being supplied.  If so, we'll
                    // return a new instance of the object
                    if (!is_null($object_name)) {
                        $CI = & get_instance();
                        if (!isset($CI->$object_name)) {
                            return $this->_ci_init_library($class, config_item('subclass_prefix'), $params, $object_name);
                        }
                    }

                    $is_duplicate = TRUE;
                    log_message('debug', $class . " class already loaded. Second attempt ignored.");
                    return;
                }

                include_once($baseclass);
                include_once($subclass);
                $this->_ci_library_paths[] = $subclass;

                return $this->_ci_init_library($class, config_item('subclass_prefix'), $params, $object_name);
            }

            // Lets search for the requested library file and load it.
            $is_duplicate = FALSE;
            foreach ($this->_ci_events_paths as $path) {
                $filepath = $path . 'events/' . $subdir . $class . '.php';

                // Does the file exist?  No?  Bummer...
                if (!file_exists($filepath)) {
                    continue;
                }

                // Safety:  Was the class already loaded by a previous call?
                if (in_array($filepath, $this->_ci_library_paths)) {
                    // Before we deem this to be a duplicate request, let's see
                    // if a custom object name is being supplied.  If so, we'll
                    // return a new instance of the object
                    if (!is_null($object_name)) {
                        $CI = & get_instance();
                        if (!isset($CI->$object_name)) {
                            return $this->_ci_init_library($class, '', $params, $object_name);
                        }
                    }

                    $is_duplicate = TRUE;
                    log_message('debug', $class . " class already loaded. Second attempt ignored.");
                    return;
                }

                include_once($filepath);
                $this->_ci_library_paths[] = $filepath;
                return $this->_ci_init_library($class, '', $params, $object_name);
            }
        } // END FOREACH
        // One last attempt.  Maybe the library is in a subdirectory, but it wasn't specified?
        if ($subdir == '') {
            $path = strtolower($class) . '/' . $class;
            return $this->_ci_load_class($path, $params);
        }

        // If we got this far we were unable to find the requested class.
        // We do not issue errors if the load call failed due to a duplicate request
        if ($is_duplicate == FALSE) {
            log_message('error', "Unable to load the requested class: " . $class);
            show_error("Unable to load the requested class: " . $class);
        }
    }
}