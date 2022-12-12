<?php
class mcontact extends CI_Model{
     private $_table = 'df_contact';
     function __contruct() {
        parent::__construct();
        $this->load->database();
    }
   
    function get_all_data($off = null, $limit = null, $order = "") {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->limit($off, $limit);
        $this->db->order_by("created_date", $order);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    
    function get_data($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }
    
    function num_rows() {
        return $this->db->count_all_results($this->_table);
    }
    
    function delete_data($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->_table);
    }
    
    function add_data($data) {
        if ($this->db->insert($this->_table, $data))
            return $this->db->insert_id();
        else
            return FALSE;
    }

    function update_data($data, $id) {
        $this->db->where("id", $id);
        if ($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;
    }

    function count_same_ip_register($ip) {
        $end_time = date('Y-m-d H:i:s',strtotime("-60 minutes",strtotime(date('Y-m-d H:i:s'))));
        $sql = "SELECT count(id) as count_ip FROM ".$this->_table." WHERE from_ip='$ip' AND created_date >= '".$end_time."'";
        $query = $this->db->query($sql);
        $data = $query->row_array();

        return $data['count_ip'];
    }

    function count_register(){
        $sql = "SELECT count(id) as count_register FROM ".$this->_table." WHERE created_date >= '2021-02-01 00:00:00'";
        $query = $this->db->query($sql);
        $data = $query->row_array();

        return $data['count_register'];
    }
}
