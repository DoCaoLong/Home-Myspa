<?php
class mnotification_priviledge extends CI_Model{
    private $_table = 'df_notification_priviledge';
     function __contruct() {
        parent::__construct();
        $this->load->database();
    }
    
    function get_all_data( $off = null, $limit = null, $order = "" ){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('deleted',ACTIVE_STATUS);
        $query = $this->db->get();
        $data  = $query->result_array();
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
        $this->db->where('deleted',ACTIVE_STATUS);
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


    function check_type_exist($type){
        $this->db->select('id');
        $this->db->where('type',$type);
        $query = $this->db->get($this->_table);
        if( $query ){
            $result = $query->row_array();
            return $result['id'];
        }
        else{
            return;
        }
    }

    function get_data_by_type($type){
        $this->db->where("type", $type);
        $this->db->where('deleted', ACTIVE_STATUS);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }
 }

