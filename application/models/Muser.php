<?php

class muser extends CI_Model
{
    private $_table = 'df_user';
    private $_table_member = 'df_member';
    private $_table_staff = 'df_staff';
    private $_table_mbs_card = 'df_mbs_card';
    private $_table_order = 'df_order';
    private $_table_order_payment_history = 'df_order_payment_history';
    private $_table_payment_history = 'df_payment_history';
    private $_table_service_card = 'df_service_card';
    private $_table_prepay_card = 'df_prepay_card';
    private $_user_tb = 'df_user';
    private $_role_tb = 'df_role';
    private $_table_order_detail = 'df_order_detail';
    public $_uid = null;
    public $_role = null;
    public $_phone = null;
    public $_branch_id = null;
    public $_branch_general = false;
    public $_view_all_user = false; // toggle view deleted/blocked user
    public $_limit_list = false; // Limit user list of staff

    function __contruct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(['muser_group', 'mprepay_card', 'mprepay_card_log']);
    }

    function get_all_data($off = "", $limit = "", $order = "")
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->limit($off, $limit);
        $this->db->order_by("fullname", $order);

        if (isset($this->_uid) && $this->_uid > 0) {
            $this->db->where('id', $this->_uid);
        }

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }

        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function get_data($id)
    {
        $this->db->where("id", $id);
        if (isset($this->_role) && $this->_role > 0 ) {
            $this->db->where("role_id", $this->_role);
        }
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function get_data_for_call($telephone,$internal = false){
        $this->db->select($this->_table.".*,".$this->_role_tb.".role_name,".$this->_role_tb.".vi_name,".$this->_table_member.".id as member_id" );
        if($internal == true){
            $this->db->where($this->_table.".id", $telephone);
        }else {
            $this->db->where($this->_table.".telephone", $telephone);
        }
        $this->db->join($this->_role_tb, $this->_role_tb . '.id =' . $this->_table . '.role_id','left');
        $this->db->join($this->_table_member, $this->_table_member . '.uid =' . $this->_table . '.id','left');
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function get_data_by_phone($phone)
    {
        $this->db->where("telephone", $phone);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function search_data()
    {
        if ($this->_phone != null) {
            $this->db->where("telephone", $this->_phone);
        }
        if (isset($this->_role) && $this->_role > 0) {
            $this->db->where("role_id", $this->_role);
        }
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function get_data_by_email($email){
        $this->db->where("email", $email);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }


    function num_rows()
    {
        $this->db->where('deleted', ACTIVE_STATUS);
        return $this->db->count_all_results($this->_table);
    }

    function delete_data($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->_table);
    }

    function add_data($data)
    {
        if ($this->db->insert($this->_table, $data))
            return $this->db->insert_id();
        else
            return FALSE;
    }

    function update_data($data, $id)
    {
        $this->db->where("id", $id);
        if ($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;
    }

    // check email
    function check_email($email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        $no = $query->num_rows();
        if ($no < 1) {
            return true;
        } else {
            return false;
        }
    }

    // check phone
    function check_phone_exist($phone,$uid = null,$role_id = null, $password = false)
    {
        if (trim($phone) == '') return false;
        $this->db->select('telephone');
        if ($uid != null) {
            $this->db->where('id !=', $uid);
        }
        if ($role_id != null) {
            $this->db->where('role_id =', $role_id);
        }
        if($password){
            $this->db->where('password <>', '');
        }
        $this->db->where('telephone', $phone);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        $no = $query->num_rows();
        if ($no >= 1) {
            return true;
        } else {
            return false;
        }
    }

    // check email
    function check_user_by_email($email)
    {
        $this->db->select('email, fullname');
        $this->db->where('email', $email);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query) {
            $result = $query->row_array();
            return $result;
        } else {
            return false;
        }
    }

    // get user by group
    function get_user_by_group($user_group_id)
    {
        $this->db->select('*');
        $this->db->where('user_group_id', $user_group_id);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // get user email
    function get_email($id)
    {
        $this->db->select('email');
        $this->db->where('id', $id);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query) {
            $result = $query->row_array();
            return $result['email'];
        } else {
            return false;
        }
    }

    // get user by email, password
    function get_user($email, $password)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('role_id !=', ROLE_MEMBER);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    // get user by telephone, password
    function get_user_by_telephone($telephone, $password)
    {
        $this->db->select('*');
        $this->db->where('telephone', $telephone);
        $this->db->where('password', $password);
        if($this->_role !== null)
            $this->db->where('role_id',$this->_role);
        // else
        //     $this->db->where('role_id', ROLE_MEMBER);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    // get user by telephone, password
    function get_user_by_telephone_db2($telephone, $password)
    {
        $db2 = $this->load->database('db2', TRUE);

        $db2->select('*');
        $db2->where('telephone', $telephone);
        $db2->where('password', $password);
        $db2->where('role_id', ROLE_MEMBER);
        $db2->where('status', ACTIVE_STATUS);
        $db2->where('deleted', ACTIVE_STATUS);
        $query = $db2->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    function get_user_by_telephone_db3($telephone, $password)
    {
        $db3 = $this->load->database('db3', TRUE);

        $db3->select('*');
        $db3->where('telephone', $telephone);
        $db3->where('password', $password);
        $db3->where('role_id', ROLE_MEMBER);
        $db3->where('status', ACTIVE_STATUS);
        $db3->where('deleted', ACTIVE_STATUS);
        $query = $db3->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    // get user by email, password
    function get_user_by_email($email, $password)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        if($this->_role !== null) $this->db->where('role_id', $this->_role);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    // get group of user
    function get_user_group_id($id)
    {
        $this->db->select('user_group_id');
        $this->db->where("id", $id);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query) {
            $result = $query->row_array();
            return $result['user_group_id'];
        } else {
            return FALSE;
        }
    }

    // get user
    function get_user_in_group($user_group_id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where("user_group_id", $user_group_id);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get();
        if ($query) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    // search user
    function search_user($fullname, $email)
    {
        $this->db->select('*');
        $this->db->where('fullname', $fullname);
        $this->db->or_where('email', $email);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    // get admin group_id
    function get_admin_user()
    {
        $this->db->select('*');
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->where('deleted', ACTIVE_STATUS);

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }

        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    // get name form uid, id
    function get_fullname_from_uid($uid)
    {
        $this->db->select('fullname');
        $this->db->where('id', $uid);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['fullname'];
        } else {
            return '';
        }
    }

    // get avatar form uid
    function get_avatar_from_uid($uid)
    {
        $this->db->select('image');
        $this->db->where('id', $uid);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['image'];
        } else {
            return array();
        }
    }

    // get user from mobile
    function get_user_by_phone($phone, $role_id = null)
    {
        if (!isset($phone) || $phone == '') return false;
        $this->db->select('*');
        $this->db->where('telephone', $phone);
        if ($role_id != null) {
            $this->db->where('role_id =', $role_id);
        }
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return false;
    }

    function get_member_list($limit = "", $off = "", $order = "",$keyword = "",$except = null)
    {
        $this->db->select($this->_table.'.id,'.$this->_table.'.fullname,'.$this->_table.'.telephone,'.$this->_table.'.email,'.$this->_table.'.image,'.$this->_table_member.'.member_code, YEAR('.$this->_table.'.birthday) as year,'.$this->_table.'.branch_id,'.$this->_table.'.address');
        $this->db->from($this->_table);
        $this->db->join($this->_table_member, $this->_table.'.id ='.$this->_table_member.'.uid');
        $this->db->join($this->_table_mbs_card, $this->_table.'.id ='.$this->_table_mbs_card.'.uid','left');

        $this->db->where($this->_table.'.role_id', ROLE_MEMBER);
        $this->db->where($this->_table.'.deleted', ACTIVE_STATUS);
        $this->db->where($this->_table_member.'.deleted', ACTIVE_STATUS);

        if($this->_limit_list){
            $this->db->group_start();
            $this->db->where("$this->_table_member.staff_id_referral",$this->_limit_list);
            $this->db->or_where("$this->_table_member.uid_handle",$this->_limit_list);
            $this->db->group_end();
        }

        if ($keyword != ''){
            $keyword = str_replace(PRE_CODE_MEMBER,'',$keyword);
            $this->db->group_start();
            $this->db->like($this->_table.'.fullname',$keyword);
            $this->db->or_like($this->_table.'.telephone',$keyword);
            $this->db->or_like($this->_table.'.email',$keyword);
            $this->db->or_like($this->_table_member.'.referral_code',$keyword);
            $this->db->or_like($this->_table.'.customer_backup_code',$keyword);
            $this->db->or_like($this->_table_member.'.member_code',$keyword);
            $this->db->or_like($this->_table_mbs_card.'.code',$keyword);
            $this->db->group_end();
        }

        if($except != null && $except != "") {

            $this->db->where($this->_table.'.id <> ' . $except);
        }

        $this->db->limit($limit, $off);
        $this->db->order_by($this->_table.'.fullname', $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_staff_list($limit = "", $off = "", $order = "",$keyword = "")
    {
        $this->db->select($this->_table.'.id,'.$this->_table.'.fullname,'.$this->_table.'.telephone,'.$this->_table.'.email,'.$this->_table.'.image,'.$this->_table_staff.'.staff_code, YEAR('.$this->_table.'.birthday) as year');
        $this->db->from($this->_table);
        $this->db->join($this->_table_staff, $this->_table.'.id ='.$this->_table_staff.'.uid');
        $this->db->where($this->_table.'.role_id', ROLE_STAFF);
        $this->db->where($this->_table.'.deleted', ACTIVE_STATUS);
        $this->db->where($this->_table_staff.'.deleted', ACTIVE_STATUS);

        if ($keyword != ''){
            $keyword = str_replace(PRE_CODE_STAFF,'',$keyword);
            $this->db->group_start();
            $this->db->like($this->_table.'.fullname',$keyword);
            $this->db->or_like($this->_table.'.telephone',$keyword);
            $this->db->or_like($this->_table.'.email',$keyword);
            $this->db->or_like($this->_table_staff.'.staff_code',$keyword);
            $this->db->group_end();
        }

        $this->db->limit($limit, $off);
        $this->db->order_by($this->_table.'.fullname', $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_total_count_member($keyword = "")
    {
        $this->db->where('role_id', ROLE_MEMBER);
        $this->db->where('deleted', ACTIVE_STATUS);

        if ($keyword != ''){
            $this->db->group_start();
            $this->db->like($this->_table.'.fullname',$keyword);
            $this->db->or_like($this->_table.'.telephone',$keyword);
            $this->db->or_like($this->_table.'.email',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results($this->_table);
    }

    function get_total_count_staff($keyword = "") {
        $this->db->join($this->_table_staff, $this->_table.'.id ='.$this->_table_staff.'.uid');
        $this->db->where($this->_table.'.role_id', ROLE_STAFF);
        $this->db->where($this->_table.'.deleted', ACTIVE_STATUS);
        $this->db->where($this->_table_staff.'.deleted', ACTIVE_STATUS);

        if ($keyword != ''){
            $this->db->group_start();
            $this->db->like($this->_table.'.fullname',$keyword);
            $this->db->or_like($this->_table.'.telephone',$keyword);
            $this->db->or_like($this->_table.'.email',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results($this->_table);
    }

    function get_new_member_by_date($date) {
        $this->db->where('role_id', ROLE_MEMBER);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('DATE(created_date) = ',$date);
        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }
        return $this->db->count_all_results($this->_table);
    }

    function get_user_by_role($role){
        $this->db->select('id,fullname,telephone,email,image,user_group_id,deleted,status,branch_id');
        $this->db->where('role_id', $role);
        if(!$this->_view_all_user){
            $this->db->where('deleted', ACTIVE_STATUS);
            $this->db->where('status', ACTIVE);
        }
        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->group_start();
            $this->db->where('branch_id', $this->_branch_id);
            $this->db->or_where('branch_id', 0);
            $this->db->group_end();
        }
        $this->db->order_by("user_group_id", 'asc');
        $this->db->order_by("fullname", 'asc');
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_user_by_role_branch_or_general($role){
        $this->db->select('id,fullname,telephone,email,image,user_group_id');
        $this->db->where('role_id', $role);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('status', ACTIVE);
        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->group_start();
            $this->db->where('branch_id', $this->_branch_id);
            $this->db->or_where('branch_id', 0);
            $this->db->group_end();
        }
        $this->db->order_by("user_group_id", 'asc');
        $this->db->order_by("fullname", 'asc');
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
    // User level
    function get_all_user_level_data($off = "", $limit = "", $order = "")
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->limit($off, $limit);
        $this->db->order_by("id", $order);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }


    function get_user_level_report($limit = "", $off = "", $order = "", $from_date = '', $to_date = '', $keyword = '', $sql_str = '',$birthday_filter= ''){
        $sql = " SELECT u.branch_id,u.fullname,u.telephone,u.email,u.id AS uid,  ";
        $sql .= " (SELECT (total_paid_order + total_paid_service_card + total_paid_prepay_card) FROM df_user_summary WHERE df_user_summary.uid = u.id ORDER BY id ASC LIMIT 1) AS total_prepay ";
        $sql .= " FROM df_user AS u ";
        $sql .= " JOIN df_user_summary ON df_user_summary.uid = u.id ";
        $sql .= " WHERE u.deleted = 0 AND u.role_id = 4 ";
        if ($keyword != ''){
            $sql    .= " AND (u.fullname LIKE '%$keyword%' OR u.email LIKE '%$keyword%' OR u.telephone LIKE '%$keyword%')";
        }
        if($from_date != null) {
            $sql    .= ' AND u.created_date >= "'.$from_date.'"';
            $sql    .= " AND u.created_date >= '{$from_date}' ";
        }

        if($to_date != null){
            $sql    .= " AND u.created_date <= '{$to_date} 23:59:59' ";
        }

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND u.branch_id = '.$this->_branch_id;
        }
        if ($birthday_filter != ''){
            $month_current  = date('m');
            $date_current   = date('d');
            $sql .= " AND MONTH(u.birthday) = $month_current";
            $sql .= " AND DAY(u.birthday) = $date_current";
        }
        if ($sql_str != '') {
            $sql .= ' HAVING '.$sql_str;
        }
        if($order != ""){
            $sql .= " ORDER BY total_prepay $order ";
        }
        if ($off != '' && $off > 0) {
            $sql .= ' LIMIT '.$off;

            if ($limit != '' && $limit > 0) {
                $sql .= ' , '.$limit;
            }
        } elseif ($limit != '' && $limit > 0) {
            $sql .= ' LIMIT '.$limit;
        }
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    function get_user_level_data_order($limit = "", $off = "", $order = "", $from_date = '', $to_date = '', $keyword = '', $sql_str = '',$birthday_filter= ''){
        $sql = "SELECT H.*, SUM(H.prepay) as total_prepay FROM (";
        $sql .= "SELECT A.* FROM ( SELECT $this->_table.branch_id,$this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_order.uid, $this->_table_order_payment_history.prepay FROM ".$this->_table;
        $sql .= " JOIN $this->_table_order ON $this->_table_order.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_order_payment_history ON $this->_table_order_payment_history.ord_id = $this->_table_order.id ";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        $sql .= " AND $this->_table_order.deleted = ".ACTIVE_STATUS;
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
            $sql    .= ' AND '.$this->_table_order_payment_history.'.branch_id = '.$this->_branch_id;
        }
        if ($birthday_filter != ''){
                $month_current  = date('m');
                $date_current   = date('d');
                $sql .= " AND MONTH($this->_table.birthday) = $month_current";
                $sql .= " AND DAY($this->_table.birthday) = $date_current";
        }

        $sql    .= ') as A UNION ';
        $sql .= "SELECT B.* FROM ( SELECT $this->_table.branch_id,$this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_service_card.uid, $this->_table_payment_history.prepay FROM $this->_table";
        $sql .= " JOIN $this->_table_service_card ON $this->_table_service_card.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_payment_history ON $this->_table_payment_history.card_id = $this->_table_service_card.id and $this->_table_payment_history.card_type = 1";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        $sql .= " AND $this->_table_service_card.deleted = ".ACTIVE_STATUS;
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
            $sql    .= ' AND '.$this->_table_payment_history.'.branch_id = '.$this->_branch_id;
        }
        if ($birthday_filter != ''){
                $month_current  = date('m');
                $date_current   = date('d');
                $sql .= " AND MONTH($this->_table.birthday) = $month_current";
                $sql .= " AND DAY($this->_table.birthday) = $date_current";
        }

        $sql .= ") as B UNION ";
        $sql .= "SELECT C.* FROM ( SELECT $this->_table.branch_id,$this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_prepay_card.uid, $this->_table_payment_history.prepay FROM $this->_table";
        $sql .= " JOIN $this->_table_prepay_card ON $this->_table_prepay_card.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_payment_history ON $this->_table_payment_history.card_id = $this->_table_prepay_card.id and $this->_table_payment_history.card_type = 2";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        $sql .= " AND $this->_table_prepay_card.deleted = ".ACTIVE_STATUS;
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
        }
        if ($birthday_filter != ''){
                $month_current  = date('m');
                $date_current   = date('d');
                $sql .= " AND MONTH($this->_table.birthday) = $month_current";
                $sql .= " AND DAY($this->_table.birthday) = $date_current";
        }

        $sql .= ") as C";
        $sql .= ") as H GROUP BY H.uid";
        if ($sql_str != '') {
            $sql .= ' HAVING '.$sql_str;
        }
        if($order != ""){
            $sql .= " ORDER BY total_prepay $order ";
        }
        if ($off != '' && $off > 0) {
            $sql .= ' LIMIT '.$off;

            if ($limit != '' && $limit > 0) {
                $sql .= ' , '.$limit;
            }
        } elseif ($limit != '' && $limit > 0) {
            $sql .= ' LIMIT '.$limit;
        }
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    function num_rows_user_level($from_date = null, $to_date = null, $keyword, $sql_str = '')
    {
        $sql = "SELECT H.*, SUM(H.prepay) as total_prepay FROM (";
        $sql .= "SELECT A.* FROM ( SELECT $this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_order.uid, $this->_table_order_payment_history.prepay FROM ".$this->_table;
        $sql .= " JOIN $this->_table_order ON $this->_table_order.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_order_payment_history ON $this->_table_order_payment_history.ord_id = $this->_table_order.id ";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
        }

        $sql    .= ') as A UNION ';
        $sql .= "SELECT B.* FROM ( SELECT $this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_service_card.uid, $this->_table_payment_history.prepay FROM $this->_table";
        $sql .= " JOIN $this->_table_service_card ON $this->_table_service_card.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_payment_history ON $this->_table_payment_history.card_id = $this->_table_service_card.id and $this->_table_payment_history.card_type = 1";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
        }

        $sql .= ") as B UNION ";
        $sql .= "SELECT C.* FROM ( SELECT $this->_table.fullname, $this->_table.telephone, $this->_table.email, $this->_table_prepay_card.uid, $this->_table_payment_history.prepay FROM $this->_table";
        $sql .= " JOIN $this->_table_prepay_card ON $this->_table_prepay_card.uid = $this->_table.id";
        $sql .= " JOIN $this->_table_payment_history ON $this->_table_payment_history.card_id = $this->_table_prepay_card.id and $this->_table_payment_history.card_type = 2";

        if ($keyword != ''){
            $sql    .= " WHERE ($this->_table.fullname LIKE '%$keyword%' OR $this->_table.email LIKE '%$keyword%' OR $this->_table.telephone LIKE '%$keyword%')";
        }
        if($from_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date >= "'.$from_date.'"';

        if($to_date != null)
            $sql    .= ' AND '.$this->_table.'.created_date <= "'.$to_date.' 23:59:59'.'"';

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql    .= ' AND '.$this->_table.'.branch_id = '.$this->_branch_id;
        }

        $sql .= ") as C";
        $sql .= ") as H GROUP BY H.uid";
        if ($sql_str != '') {
            $sql .= ' HAVING '.$sql_str;
        }

        $query = $this->db->query($sql);
        $data = $query->result_array();
        return count($data);
    }

    function customer_export($from_date = null,$to_date = null,$month_arr = array(),$service_arr = array(),$keyword = null,$member_group= null , $member_from = null ,$staff_id_referral = null, $uid_handle = null,$birthday =false,$province_id = null,$district_id = null,$ward_id = null,$nationality_id = null){

        $where_prefix = " WHERE ";

        $sql = " SELECT DISTINCT(u.id) as uid, u.*,df_member_from.from_name,df_user_group.group_name,user_create.fullname AS created_by,m.member_code,m.referral_code,m.staff_id_referral,staff_referral.fullname AS staff_contact,m.uid_handle,staff_handle.fullname AS staff_handle,df_branch.branch_name,df_user_medical.medical_history ";
        $sql .= " ,(SELECT GROUP_CONCAT(df_member_note.member_note) FROM df_member_note WHERE df_member_note.uid = u.id AND df_member_note.deleted = 0 GROUP BY df_member_note.uid) AS member_note ";
        $sql .= " ,(df_user_summary.total_paid_order + df_user_summary.total_paid_service_card + df_user_summary.total_paid_prepay_card) AS sum_prepay ";
        $sql .= " ,df_user_summary.service_used AS service_used ";
        $sql .= " FROM df_user AS u ";
        $sql .= " LEFT JOIN df_member AS m ON m.uid = u.id ";
        $sql .= " LEFT JOIN df_user_group ON df_user_group.id = u.user_group_id ";
        $sql .= " LEFT JOIN df_member_from ON df_member_from.id = u.user_from_id ";
        $sql .= " LEFT JOIN df_user AS staff_handle ON staff_handle.id = m.uid_handle ";
        $sql .= " LEFT JOIN df_user AS staff_referral ON staff_referral.id = m.staff_id_referral ";
        $sql .= " LEFT JOIN df_user AS user_create ON user_create.id = u.created_by_id ";
        $sql .= " LEFT JOIN df_branch ON df_branch.id = u.branch_id ";
        $sql .= " LEFT JOIN df_user_summary ON df_user_summary.uid = u.id ";
        $sql .= " LEFT JOIN df_user_medical ON df_user_medical.user_id = u.id ";
        $sql .= " LEFT JOIN df_order ON df_order.uid = u.id ";
        $sql .= " LEFT JOIN df_order_detail ON df_order_detail.order_id = df_order.id ";

        $sql .= " WHERE u.deleted = 0 AND u.role_id = 4 ";

        $where_prefix = " AND ";

        if (is_array($service_arr) && count($service_arr) > 0) {

            $sql .= " $where_prefix df_order_detail.type = ".SERVICE_TYPE ." ";
            $count = 0;
            $sql .= " AND ( ";
            foreach($service_arr as $service) {
                $count++;
                $sql .=  " df_order_detail.item_id = $service ";
                if($count != count($service_arr)){
                    $sql .= " OR ";
                }
            }
            $sql .= " ) ";
            $where_prefix = " AND ";
        }

        if (is_array($month_arr) && count($month_arr) > 0) {

            $count = 0;
            $sql .= " $where_prefix ( ";
            foreach($month_arr as $month) {
                $count++;
                $sql .= " MONTH(u.birthday) = $month ";
                if($count != count($month_arr)){
                    $sql .= " OR ";
                }
            }
            $sql .= " ) ";
            $where_prefix = " AND ";
        }

        if ($from_date != null || $to_date != null){

            if($from_date != null){
                $sql .= " $where_prefix u.created_date >= '$from_date 00:00:00' ";
                $where_prefix = " AND ";
            }
            if($to_date != null){
                $sql .= " $where_prefix u.created_date <= '$to_date 23:59:59' ";
                $where_prefix = " AND ";
            }
        }
        if($keyword != null){
            $keyword = str_replace(PRE_CODE_MEMBER,'',$keyword);
            $sql .= " $where_prefix ( ";
            $sql .= " u.member_code LIKE %$keyword% ";
            $sql .= " OR u.referral_code LIKE %$keyword% ";
            $sql .= " OR u.fullname LIKE %$keyword% ";
            $sql .= " OR u.telephone LIKE %$keyword% ";
            $sql .= " ) ";
            $where_prefix = " AND ";
        }

        if($member_group != null){
            $sql .= " $where_prefix u.user_group_id = $member_group ";
            $where_prefix = " AND ";
        }

        //Filter by member from
        if($member_from != null){
            $sql .= " $where_prefix u.user_from_id = $member_from ";
            $where_prefix = " AND ";
        }

        //Filter by staff referral
        if($staff_id_referral != null){
            $sql .= " $where_prefix u.staff_id_referral = $staff_id_referral ";
            $where_prefix = " AND ";
        }

        //Filter by uid handle
        if($uid_handle != null){
            $sql .= " $where_prefix u.uid_handle = $uid_handle ";
            $where_prefix = " AND ";
        }

        //Filter by province
        if($province_id != null){
            $sql .= " $where_prefix u.province = $province_id ";
            $where_prefix = " AND ";
        }

        //Filter by district
        if($district_id != null){
            $sql .= " $where_prefix u.district = $district_id ";
            $where_prefix = " AND ";
        }

        //Filter by ward
        if($ward_id != null){
            $sql .= " $where_prefix u.ward = $ward_id ";
            $where_prefix = " AND ";
        }

        //Filter by nationality
        if($nationality_id != null){
            $sql .= " $where_prefix u.nationality = $nationality_id ";
            $where_prefix = " AND ";
        }

        //Filter by birthday date
        if($birthday == true){
            $month_current  = date('m');
            $date_current   = date('d');
            $sql .= " $where_prefix MONTH(u.birthday) = $month_current ";
            $sql .= " AND DAY(u.birthday) = $date_current ";
            $where_prefix = " AND ";
        }
        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql .= " $where_prefix u.branch_id = $this->_branch_id ";
        }

        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;

    }

    function customer_has_not_return_export(){
        $sql = " SELECT O.*,GROUP_CONCAT(DISTINCT df_order_detail.item_name) AS services_used FROM (SELECT L.branch_id,L.id,L.fullname,L.telephone,L.birthday,L.sex,L.email,L.created_date,df_user_group.group_name,df_member_from.from_name,IFNULL(df_branch.branch_name,'{$this->lang->line('all_branch')}') as branch_name,SUM(L.sum_prepay) AS sum_prepay,MAX(L.order_created_date) AS order_created_date ";
        $sql .= " FROM (SELECT df_user.*,SUM(df_order.total_money) AS sum_prepay,MAX(df_order.created_date) as order_created_date ";
        $sql .= " FROM df_user ";
        $sql .= " LEFT JOIN df_order ON df_order.uid = df_user.id AND df_order.payment_method_id <> -1  ";
        $sql .= " AND df_order.deleted = 0 AND df_order.status = 1 ";
        $sql .= " WHERE df_user.deleted = 0 ";
        $sql .= " GROUP BY df_user.id ";
        $sql .= " UNION ALL ";
        $sql .= " SELECT df_user.*,SUM(df_payment_history.prepay) AS sum_prepay,MAX(df_service_card.created_date) as order_created_date ";
        $sql .= " FROM df_user ";
        $sql .= " LEFT JOIN df_service_card ON df_service_card.uid = df_user.id AND df_service_card.deleted = 0 ";
        $sql .= " LEFT JOIN df_payment_history ON df_payment_history.card_id = df_service_card.id AND df_payment_history.card_type = 1 ";
        $sql .= " AND df_payment_history.deleted = 0 ";
        $sql .= " WHERE df_user.deleted = 0 ";
        $sql .= " GROUP BY df_user.id ";
        $sql .= " UNION ALL ";
        $sql .= " SELECT df_user.*,SUM(df_payment_history.prepay) AS sum_prepay,MAX(df_prepay_card.created_date) as order_created_date ";
        $sql .= " FROM df_user ";
        $sql .= " LEFT JOIN df_prepay_card ON df_prepay_card.uid = df_user.id AND df_prepay_card.deleted = 0 ";
        $sql .= " LEFT JOIN df_payment_history ON df_payment_history.card_id = df_prepay_card.id AND df_payment_history.card_type = 2 ";
        $sql .= " AND df_payment_history.deleted = 0 ";
        $sql .= " WHERE df_user.deleted = 0 ";
        $sql .= " GROUP BY df_user.id) AS L  ";
        $sql .= " LEFT JOIN df_user_group ON df_user_group.id = L.user_group_id ";
        $sql .= " LEFT JOIN df_member_from ON df_member_from.id = L.user_from_id ";
        $sql .= " LEFT JOIN df_branch ON df_branch.id = L.branch_id ";
        $sql .= " WHERE L.order_created_date IS NOT NULL ";
        $sql .= " GROUP BY L.id  ";
        $sql .= " ) as O ";
        $sql .= " LEFT JOIN df_order ON df_order.uid = O.id ";
        $sql .= " LEFT JOIN df_order_detail ON  df_order_detail.order_id = df_order.id ";

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql .= " WHERE O.branch_id = $this->_branch_id ";
        }

        $sql .= " GROUP BY O.id ";


        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    function customer_has_not_order_export() {
        $sql = " SELECT df_user.*,IFNULL(df_branch.branch_name,'{$this->lang->line('all_branch')}') as branch_name,df_user_group.group_name,df_member_from.from_name ";
        $sql .= " FROM df_user ";
        $sql .= " LEFT JOIN df_order ON df_user.id = df_order.uid ";
        $sql .= " LEFT JOIN df_branch ON df_branch.id = df_user.branch_id ";
        $sql .= " LEFT JOIN df_user_group ON df_user_group.id = df_user.user_group_id ";
        $sql .= " LEFT JOIN df_member_from ON df_member_from.id = df_user.user_from_id ";
        $sql .= " WHERE df_order.uid IS NULL AND df_user.deleted = 0 AND df_user.role_id = 4 ";

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $sql .= " AND df_user.branch_id = $this->_branch_id ";
        }
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    function check_user_id($id){
        $this->db->select('id');
        $this->db->where('id', $id);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        $no = $query->num_rows();
        if ($no < 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_admin_list($off = null, $limit = null, $order = "", $keyword = null)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('id !=', ROOT_ADMIN_ID);

        if ($keyword != null) {
            $this->db->group_start();
            $this->db->like('fullname', $keyword);
            $this->db->or_like('telephone',$keyword);
            $this->db->or_like('email',$keyword);
            $this->db->group_end();
        }

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }
        $this->db->limit($off, $limit);
        $this->db->order_by("id", $order);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    function num_rows_admin($keyword = null)
    {
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('id !=', ROOT_ADMIN_ID);

        if ($keyword != null) {
            $this->db->group_start();
            $this->db->like('fullname', $keyword);
            $this->db->or_like('telephone',$keyword);
            $this->db->or_like('email',$keyword);
            $this->db->group_end();
        }

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }

        return $this->db->count_all_results($this->_table);
    }

    function get_total_count_admin($keyword = "")
    {
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('id !=', ROOT_ADMIN_ID);

        if ($keyword != ''){
            $this->db->group_start();
            $this->db->like($this->_table.'.fullname',$keyword);
            $this->db->or_like($this->_table.'.telephone',$keyword);
            $this->db->or_like($this->_table.'.email',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results($this->_table);
    }

    function get_lastest_id(){
        $sql = "SELECT IFNULL(MAX(id),0) as lastest_id FROM $this->_table ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['lastest_id'];

    }

    function insert_batch_import($data){
        if(!empty($data)){

            $this->db->insert_batch($this->_table, $data);
        }
    }

    function get_all_user_phone(){
        $sql = " SELECT DISTINCT telephone FROM df_user WHERE telephone <> '' AND telephone IS NOT NULL AND telephone NOT LIKE '%\'%' ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }

    function get_all_user_id_by_group($list_group){
        if(empty($list_group)){
            return array();
        }
        $this->db->select('id');
        $this->db->where('deleted', ACTIVE_STATUS);

        if($this->_branch_general){
            $this->db->group_start();
            $this->db->where('branch_id', $this->_branch_id);
            $this->db->or_where('branch_id', 0);
            $this->db->group_end();
        } else {
            if(isset($this->_branch_id) && $this->_branch_id != 0){
                $this->db->where('branch_id', $this->_branch_id);
            }
        }

        $this->db->group_start();
        foreach($list_group as $group){
            $this->db->or_like('user_group_id', "|".$group."|");
            $this->db->or_where('user_group_id',$group);
        }
        $this->db->group_end();

        $query = $this->db->get($this->_table);
        $query = $query->result_array();
        $data = array();
        foreach($query as $q){
            $data[] = $q['id'];
        }
        return $data;
    }

    function get_all_user_id_by_role($list_role){
        if(empty($list_role)){
            return array();
        }
        $this->db->select('id');
        $this->db->where('deleted', ACTIVE_STATUS);
        if(isset($this->_branch_id) && $this->_branch_id != 0){
            $this->db->where('branch_id', $this->_branch_id);
        }
        $this->db->group_start();
        foreach($list_role as $role_id){
            $this->db->or_where('role_id',$role_id);
        }
        $this->db->group_end();

        $query = $this->db->get($this->_table);
        $query = $query->result_array();
        $data = array();
        foreach($query as $q){
            $data[] = $q['id'];
        }
        return $data;
    }

    function get_all_user_by_group($group_id)
    {

        $handle_group_id = array_filter(explode('|',$group_id));

        $this->db->select($this->_table . '.*');
        $this->db->from($this->_table);
        $this->db->where($this->_table . '.deleted', ACTIVE_STATUS);
        $this->db->where($this->_table . '.status', ACTIVE);
        $this->db->where($this->_table . '.id <> '. ROOT_ADMIN_ID);
        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where($this->_table.'.branch_id', $this->_branch_id);
        }

        $this->db->group_start();
        foreach($handle_group_id as $gid) {
            $this->db->where($this->_user_tb.'.user_group_id',$gid);
            $this->db->or_like($this->_user_tb.'.user_group_id','|'.$gid.'|');
        }
        $this->db->group_end();
        
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function get_all_admin_loginable($num_rows = false){

        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('id !=', ROOT_ADMIN_ID);
        $this->db->where('loginable', 1);
        $query = $this->db->get();
        $data = $query->result_array();
        if($num_rows == true){
            $data = $query->num_rows();
        }
        return $data;
    }



    function generate_service_interest_id($service_list,$sii,$selector = 'all'){
        $services = array_filter(explode('|',$sii));
        $services_interest = array();
        foreach($service_list as $sl){
            foreach($services as $s){
                if($sl['id'] == $s) {
                    if($selector == 'all'){
                        $services_interest[] = $sl;
                    }else {
                        $services_interest[] = $sl[$selector];
                    }

                }
            }
        }
        return $services_interest;
    }

    // check identify card
    function check_id_card_exist($id_number,$uid = null,$role_id = null) {
        if (trim($id_number) == '') return false;
        $this->db->select('identify_number');
        if ($uid != null) {
            $this->db->where('id !=', $uid);
        }
        if ($role_id != null) {
            $this->db->where('role_id =', $role_id);
        }
        $this->db->where('identify_number', $id_number);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        $no = $query->num_rows();
        if ($no >= 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_staff_by_booking_online(){
        $this->db->select($this->_table.'.id,fullname,telephone,email,image,user_group_id,stage_name');
        $this->db->join($this->_table_staff, $this->_table.'.id ='.$this->_table_staff.'.uid','left');
        $this->db->where($this->_table.'.role_id', '2');
        $this->db->where($this->_table.'.deleted', ACTIVE_STATUS);
        $this->db->where($this->_table.'.status', ACTIVE);
        $this->db->where($this->_table_staff.'.booking_online', 1);

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->group_start();
            $this->db->where($this->_table.'.branch_id', $this->_branch_id);
            $this->db->or_where($this->_table.'.branch_id', 0);
            $this->db->group_end();
        }
        $this->db->order_by($this->_table.".user_group_id", 'asc');
        $this->db->order_by($this->_table.".fullname", 'asc');
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_all_admin_staff_active() {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('id !=', ROOT_ADMIN_ID);
        $this->db->where('status', '0');
        $this->db->group_start();
        $this->db->where('role_id', ROLE_ADMIN);
        $this->db->or_where('role_id', ROLE_STAFF);
        $this->db->group_end();

        if (isset($this->_branch_id) && $this->_branch_id > 0) {
            $this->db->where('branch_id', $this->_branch_id);
        }
        
        $this->db->order_by("fullname", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function is_new_customer($uid) {
        $sql_order = " SELECT * FROM df_order WHERE df_order.uid = $uid LIMIT 1";
        $query_prepay_card = $this->db->query($sql_order);
        $has_pay_order = $query_prepay_card->row_array();

        $sql_service_card = " SELECT * FROM df_service_card WHERE df_service_card.uid = $uid LIMIT 1";
        $query_prepay_card = $this->db->query($sql_service_card);
        $has_pay_service_card = $query_prepay_card->row_array();

        $sql_prepay_card = " SELECT * FROM df_prepay_card WHERE df_prepay_card.uid = $uid LIMIT 1";
        $query_prepay_card = $this->db->query($sql_prepay_card);
        $has_pay_prepay_card = $query_prepay_card->row_array();

        if(!empty($has_pay_order) || !empty($has_pay_service_card) || !empty($has_pay_prepay_card)) {
            return FALSE;
        }
        return TRUE;
    }

    function check_phone_existed_except_uid($phone,$uid)
    {
        if (trim($phone) == '') return false;
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id <>', $uid);
        $this->db->where('telephone', $phone);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    function get_data_by_member_code($member_code) {
        $sql = "SELECT df_user.telephone,df_member.* FROM df_user ";
        $sql .= "JOIN df_member ON df_member.uid = df_user.id ";
        $sql .= "WHERE df_member.member_code = '$member_code' ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }

    function get_data_by_staff_code($staff_code) {
        $sql = "SELECT df_user.telephone,df_staff.* FROM df_user ";
        $sql .= "JOIN df_staff ON df_staff.uid = df_user.id ";
        $sql .= "WHERE df_staff.staff_code = '$staff_code' ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }

    function get_user_by_email1($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    function get_data_by_name($fullname)
    {
        $this->db->select('*');
        $this->db->where('UPPER(fullname)', strtoupper($fullname));
        $this->db->where('status', ACTIVE_STATUS);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    function get_all_admin_staff_active_loginable_with_setting_number_account($number_account = null)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id !=', ROOT_ADMIN_ID);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('status', ACTIVE);
        $this->db->where('loginable', '1');
        $this->db->group_start();
        $this->db->where('role_id',ROLE_ADMIN);
        $this->db->or_where('role_id',ROLE_STAFF);
        $this->db->group_end();
        if ($number_account != null) {
            $this->db->limit($number_account);
        }
        $this->db->order_by("created_date", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function get_minimum_user_data($uid){
        $this->db->select('fullname, (CASE WHEN image = "" THEN "'.base_url().'assets/img/default_avatar.jpg" ELSE CONCAT("'.base_url().'files/'.COMPANY_N.'/avatar/",image) END) as user_image');
        $this->db->where('id',$uid);
        $query = $this->db->get($this->_table);
        return $query->row_array();
    }
    
    function get_prepaid_account_by_uid($uid){
    }

    function get_total_service_used_by_uid($uid){
        $sql = "
            SELECT `service_used` from df_user_summary
            WHERE uid = $uid
        ";
        $query = $this->db->query($sql);
        $serviceUsed = $query->row_array()['service_used'];
        return $serviceUsed ? count(explode(',',$serviceUsed)) : 0;

    }

    function get_total_treatment_used_uid($uid){
        $this->db->select('*');
        $this->db->from('df_service_card');
        $this->db->where("uid", $uid);
        $this->db->where("deleted", ACTIVE_STATUS);
        $this->db->where('service_combo_id', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_staff_by_dbname($dbname) {
        $this->db->db_select($dbname);
        $this->db->select('count(id) as total_staff');
        $this->db->from($this->_table);
        $this->db->group_start();
        $this->db->where($this->_table.'.role_id',ROLE_ADMIN);
        $this->db->or_where($this->_table.'.role_id',ROLE_STAFF);
        $this->db->group_end();
        $this->db->where("deleted", ACTIVE_STATUS);
        $query = $this->db->get();
        $total = $query->row_array();
        $this->db->db_select(DBNAME);

        return $total['total_staff'];
    }
}
?>