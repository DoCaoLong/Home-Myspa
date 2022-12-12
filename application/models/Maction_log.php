<?php
class maction_log extends CI_Model{
     private $_table = 'df_action_log';
     private $_table_user = 'df_user';
     function __contruct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all_data($off = "", $limit = "", $order = "") {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->limit($off, $limit);
        $this->db->order_by("username", $order);
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

    function get_data_by_apt_id($reference_id,$action) {
        $this->db->where("reference_id", $reference_id);
        $this->db->where("action", $action);
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

    function get_order_deletion_data($order_id){
        $this->db->select($this->_table.'.date_time,'.$this->_table_user.'.fullname');
        $this->db->join($this->_table_user, $this->_table_user.'.id = '.$this->_table.'.uid');
        $this->db->where('reference_id',$order_id);
        $this->db->where('action', DELETE_ORDER);
        $this->db->order_by($this->_table.'.date_time','desc'); // You need this line to get the last person who deleted this order
        $query = $this->db->get($this->_table);
        if($query){
            return $query->row_array();
        }else{
            return FALSE;
        }

    }

    function get_service_card_deletion_data($card_id){
        $this->db->select($this->_table.'.date_time,'.$this->_table_user.'.fullname');
        $this->db->join($this->_table_user, $this->_table_user.'.id = '.$this->_table.'.uid');
        $this->db->where('reference_id',$card_id);
        $this->db->where('action', DELETE_SERVICE_CARD);
        $this->db->order_by($this->_table.'.date_time','desc'); // You need this line to get the last person who deleted this order
        $query = $this->db->get($this->_table);
        if($query){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }

    function get_prepay_card_deletion_data($card_id){
        $this->db->select($this->_table.'.date_time,'.$this->_table_user.'.fullname');
        $this->db->join($this->_table_user, $this->_table_user.'.id = '.$this->_table.'.uid');
        $this->db->where('reference_id',$card_id);
        $this->db->where('action', DELETE_PREPAY_CARD);
        $this->db->order_by($this->_table.'.date_time','desc'); // You need this line to get the last person who deleted this order
        $query = $this->db->get($this->_table);
        if($query){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
}

