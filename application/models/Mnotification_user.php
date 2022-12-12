<?php

class mnotification_user extends CI_Model
{
    private $_table = 'df_notification_user';
    public  $_noti_id = null;

    function __contruct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('muser_group','muser'));
    }

    function get_all_data($off = null, $limit = null, $order = "", $unread = false)
    {
        $this->db->select('*');
        if (isset($this->_branch_id)) {
            $this->db->group_start();
            $this->db->where('branch_id',0);
            $this->db->or_where('branch_id',$this->_branch_id);
            $this->db->group_end();
        }
        $this->db->limit($off, $limit);
        $this->db->order_by("date_time", $order);
        $query = $this->db->get($this->_table);
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
    
    function generate_uid_data_by_noti_id($id,$type = 0)
    {
        $sql = " SELECT GROUP_CONCAT(uid SEPARATOR ',') AS user_receive FROM $this->_table ";
        $sql .= " WHERE notification_id = $id AND type = $type ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data['user_receive'];
    }

    function get_data_by_id($id){
        $this->db->where("id", $id);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function update_data_by_noti_id_and_user_id($data,$noti_id,$user_id){
        $this->db->where("uid",$user_id);
        $this->db->where("notification_id",$noti_id);
        if($this->db->update($this->_table,$data)){
            return TRUE;
        }else{
            return FALSE;
        };

    }

    function num_rows()
    {
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

    function add_multiple_data($data){
        if(!empty($data)){
            $this->db->insert_batch($this->_table, $data);
        }
    }

    
}

?>