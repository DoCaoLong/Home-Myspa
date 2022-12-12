<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOBA_Controller extends MX_Controller {
    public $_numLink = 5;
    public $_perpage = 20;
    public $_offset = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['lib_helper','url']);
        $this->_offset = $this->uri->segment(4);
        $this->is_Login();
	}

    public function is_Login()
    {
        if ($this->session->userdata("username") && $this->session->userdata("password")) {
            return TRUE;
        }
        redirect(base_url() . "login");
    }

    function createLink($perPage, $numLink, $url, $total)
    {
        $this->load->library('pagination');
        $config['base_url'] = $url;
        $config['total_rows'] = $total;
        $config['per_page'] = $perPage;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = "<nav><ul class='pagination pagination-sm'>";
        $config['full_tag_close'] = "</ul></nav>";

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='page-item active'><a href class='page-link'>";
        $config['cur_tag_close'] = "</a></li>";

        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";

        $config['attributes'] = array('class' => 'page-link');

        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";

        
        $config['first_tag_open'] = "<li class='page-item'>";
        $config['first_tag_close'] = "</li>";

        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tag_close'] = "</li>";

        $config['next_link'] = '&gt;';
        $config['prev_link'] = '&lt;';
        $config['last_link'] = '&gt;&gt;';
        $config['first_link'] = '&lt;&lt;';
        $config['num_link'] = $numLink;

        $config['link_tag'] = ['class'=> 'page-link'];
        $this->pagination->initialize($config);
        $link = $this->pagination->create_links();
        return $link;
	}
	
	public function check_access($controller, $action){
        $user_id = $this->session->userdata('user_id');
        if ($user_id == ROOT_ADMIN_ID) {
            if($controller == 'manage_user' && $action == 'limit_member_list') return false;
            elseif($controller == 'manage_user' && $action == 'hide_member_phone') return false;
            else return true;
        }
        else{
            $result = false;
            $user_group = $this->session->userdata('user_group_id');
            $user_group_id_list = array_filter(explode('|',$user_group));

            $access_right = array();
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
    
    public function controller_url($method = ''){
        return base_url('moba_manager/'. static::class . '/'. $method);
    }
}
