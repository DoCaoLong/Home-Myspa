<?php
class mnotification_role extends CI_Model{
    private $_table = 'df_notification_role';
    function __contruct() {
        parent::__construct();
        $this->load->database();
    }
    /*


      */
    function get_all_data($off = null, $limit = null, $order = "") {
        $this->db->select('*');

        $this->db->limit($off, $limit);
        $this->db->order_by("date_time", $order);
        $query = $this->db->get($this->_table);
        $data = $query->result_array();
        return $data;
    }

    function get_data($uid) {
        $this->db->where("uid", $uid);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
    }

    function num_rows() {
        return $this->db->count_all_results($this->_table);
    }

    /*

    */
    function delete_data($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->_table);
    }
    /*

    */
    function add_data($data) {
        if ($this->db->insert($this->_table, $data))
            return $this->db->insert_id();
        else
            return FALSE;
    }
    /*

    */
    function update_data($data, $id) {
        $this->db->where("id", $id);
        if ($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;
    }

    function update_read_data($data, $status = null, $type = null) {
        if ($status != null)
            $this->db->where("status", $status);
        if ($type != null)
            $this->db->where("type", $type);
        if ($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;
    }

    function get_notification($off = null, $limit = null, $order = "",$unread = false) {
        $this->db->select('*, df_notification.id as noti_id');
        $this->db->from('df_notification');
        $this->db->join('df_user', 'df_notification.uid = df_user.id', 'left');
        if($unread == true){
            $this->db->where('df_notification.status',NOTIFICATION_UNREAD);
        }
        $this->db->limit($off, $limit);
        $this->db->order_by("df_notification.date_time", $order);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
?>