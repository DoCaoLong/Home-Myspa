<?php

class muser_group extends CI_Model
{
    private $_table = 'df_user_group';
    public $_role  = null;
    public $_view_all_group = false;

    function __contruct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('mrole');
    }

    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted', ACTIVE_STATUS);
        if ($this->_role != null) {
            $this->db->where('role_id', $this->_role);
        }
        $this->db->order_by("role_id", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function get_all_data_not_member()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('role_id !=', ROLE_MEMBER);
        $this->db->order_by("role_id", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function get_data($id)
    {
        $this->db->where("id", $id);
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

    function get_user_group($role = null)
    {
        $this->db->select('*');
        $this->db->where('deleted', ACTIVE_STATUS);
        if($role != null)
            $this->db->where('role_id', $role);
        $this->db->from($this->_table);
        $this->db->order_by("group_name", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function group_for_member()
    {
        $this->db->select('*');
        $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('role_id', ROLE_MEMBER);
        $this->db->from($this->_table);
        $this->db->order_by("group_name", 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function group_for_staff($deleted = 0,$order_by_id = false)
    {
        $this->db->select('*');
        if($deleted == 0){
            $this->db->where('deleted', ACTIVE_STATUS);
        }else if($deleted == 1){
            $this->db->where('deleted', 1);
        }
        if(!$this->_view_all_group) $this->db->where('deleted', ACTIVE_STATUS);
        $this->db->where('role_id', ROLE_STAFF);
        $this->db->from($this->_table);
        if($order_by_id == true){
            $this->db->order_by("id", 'asc');
        }else {
            $this->db->order_by("group_name", 'asc');
        }
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function check_group_name($group_name)
    {
        $this->db->select('group_name');
        $this->db->where('UPPER(group_name)',strtoupper($group_name));
        $this->db->from($this->_table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_data_from_name($name) {
        $this->db->where('UPPER(group_name)',strtoupper($name));
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function get_role_id($group_id)
    {
        $this->db->where("id", $group_id);
        $query = $this->db->get($this->_table);
        if ($query) {
            $result = $query->row_array();
            return $result['role_id'];
        } else {
            return FALSE;
        }
    }

    function get_group_name($group_id)
    {
        $this->db->select('group_name');
        $this->db->where('id', $group_id);
        $this->db->from($this->_table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['group_name'];
        } else {
            return '';
        }
    }

    function get_data_group_by_role_id($role_id){
        $this->db->select('*');
        $this->db->where('deleted',ACTIVE_STATUS);
        $this->db->where('status',ACTIVE_STATUS);
        $this->db->where('role_id',$role_id);
        $this->db->from($this->_table);

        $query = $this->db->get();
        $data = $query->result_array();
        return $data;

    }

    function get_group_id_by_role_id($role_id){
        $this->db->select('*');
        $this->db->where('deleted',ACTIVE_STATUS);
        $this->db->where('status',ACTIVE_STATUS);
        $this->db->group_start();
        foreach($role_id as $role){
            $this->db->or_where('role_id',$role);
        }
        $this->db->group_end();
        $this->db->from($this->_table);

        $query = $this->db->get();
        $query = $query->result_array();
        $data = array();
        foreach($query as $q){
            $data[] = $q['id'];
        }
        return $data;

    }
}
