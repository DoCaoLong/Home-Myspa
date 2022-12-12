<?php

class mnotification extends CI_Model
{
    private $_table = 'df_notification';
    private $_notification_user_table = 'df_notification_user';
    private $_dashboard_news_table = 'df_dashboard_news';
    public  $_noti_id = null;

    function __contruct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('muser_group','muser','mnotification_user'));
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

    function get_data_by_id($id){
        $this->db->where("id", $id);
        $query = $this->db->get($this->_table);
        if ($query)
            return $query->row_array();
        else
            return FALSE;
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

    function update_read_data($data, $status = null, $type = null)
    {
        if ($type != null)
            $this->db->where("type", $type);
        if ($this->_noti_id != null)
            $this->db->where('id', $this->_noti_id);

        if ($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;
    }

    function get_notification($off = null, $limit = null, $order = "", $unread = false)
    {
        $this->db->select('*, df_notification.id as noti_id');
        $this->db->from('df_notification');
        $this->db->join('df_user', 'df_notification.uid = df_user.id', 'left');
        $this->db->limit($off, $limit);
        $this->db->order_by("df_notification.date_time", $order);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    function send_notification_for_role($role_id,$data){
        if(!is_array($role_id)){
            if(is_numeric($role_id)){
                $role_id = explode(" ",$role_id);
            }else {
                return FALSE;
            }
        }
        $role_id = array_map('strval',$role_id);
        $this->muser->_branch_id = $data['branch_id'];
        $user_receive = $this->muser->get_all_user_id_by_role($role_id);
        
        $noti_data = array(
            'branch_id' => $data['branch_id'],
            'role_id' => json_encode($role_id),
            'user_group_id' => json_encode(array()),
            'link' => $data['link'],
            'title' => $data['title'],
            'date_time' => $data['date_time'],
            'type' => $data['type']
        );

        if ($this->db->insert($this->_table, $noti_data)){
            $noti_id = $this->db->insert_id();
            $noti_user = array();
            foreach($user_receive as $user){
                $noti_user[] = array(
                    'notification_id' => $noti_id,
                    'uid' => $user,
                    'status' => NOTIFICATION_UNREAD,
                    'created_date' => $data['date_time']
                );
            }
            // var_dump($noti_user);die;
            $this->mnotification_user->add_multiple_data($noti_user);

            send_noti_for_app($this->db->database, $noti_id); // uncomment this line in production enviroment to send app notification
        }
        else{
            return FALSE;
        }
    }

    function send_notification_for_group($group_id,$data){
        if(!is_array($group_id)){
            if(is_numeric($group_id)){
                $group_id = explode(" ",$group_id);
            }else {
                return FALSE;
            }
        }
        $group_id = array_map('strval',$group_id);
        $this->muser->_branch_id = $data['branch_id'];
        $this->muser->_branch_general = true;
        $user_receive = $this->muser->get_all_user_id_by_group($group_id);
        $noti_data = array(
            'branch_id' => $data['branch_id'],
            'role_id' => json_encode(array()),
            'user_group_id' => json_encode($group_id),
            'link' => $data['link'],
            'title' => $data['title'],
            'date_time' => $data['date_time'],
            'type' => $data['type'],
            'app_receiver' => json_encode($data['app_receiver']),
            'host' => parse_url(base_url())['host'],
        );

        if ($this->db->insert($this->_table, $noti_data)){
            $noti_id =  $this->db->insert_id();
            $noti_user = array();
            foreach($user_receive as $user){
                $noti_user[] = array(
                    'notification_id' => $noti_id,
                    'uid' => $user,
                    'status' => NOTIFICATION_UNREAD,
                    'created_date' => $data['date_time']
                );
            }
            $this->mnotification_user->add_multiple_data($noti_user);
            send_noti_for_app($this->db->database,$noti_id);
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function send_notification_for_user($user_receive,$data, $moba = 0){
        if(!is_array($user_receive)){
            if(is_numeric($user_receive)){
                $user_receive = explode(" ",$user_receive);
            }else {
                return FALSE;
            }
        }
        $user_receive = array_map('strval',$user_receive);
        $noti_data = array(
            'branch_id' => $data['branch_id'],
            'role_id' => json_encode(array()),
            'user_group_id' => json_encode(array()),
            'link' => $data['link'],
            'title' => $data['title'],
            'date_time' => $data['date_time'],
            'type' => $data['type'],
            'app_receiver' => json_encode($data['app_receiver']),
            'host' => parse_url(base_url())['host'],
        );

        if ($this->db->insert($this->_table, $noti_data)){
            $noti_id =  $this->db->insert_id();
            $noti_user = array();
            foreach($user_receive as $user){
                $noti_user[] = array(
                    'notification_id' => $noti_id,
                    'uid' => $user,
                    'status' => NOTIFICATION_UNREAD,
                    'created_date' => $data['date_time']
                );
            }
            $this->mnotification_user->add_multiple_data($noti_user);
            send_noti_for_app($this->db->database,$noti_id, 0, $moba); // uncomment this line in production enviroment to send app notification
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function get_all_notification_by_user($off = null, $limit = null, $order = "",$user_id,$unread = false){
        $this->db->select($this->_table.'.*,'.$this->_notification_user_table.'.id as noti_user_id,'.$this->_notification_user_table.'.status');
        $this->db->from($this->_table);
        $this->db->join($this->_notification_user_table,$this->_notification_user_table.'.notification_id = '.$this->_table.'.id','left');
        $this->db->where($this->_notification_user_table.'.uid',$user_id);
        $this->db->where($this->_notification_user_table.'.type',0);
        $this->db->where($this->_notification_user_table.'.deleted',ACTIVE_STATUS);
        if($unread == true){
            $this->db->where($this->_notification_user_table.'.status',NOTIFICATION_UNREAD);
        }
        // type == 11 is transfer between sales/consum inventory notification
        $this->db->where("CASE WHEN $this->_table.type = 11 THEN $this->_table.branch_id = $this->_branch_id ELSE TRUE END ",null,false);
        $this->db->order_by('date_time',$order);
        $this->db->limit($off, $limit);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
        
    }

    function get_total_notification_by_user($user_id,$unread = false){
        $this->db->select("COUNT(*) as max");
        $this->db->from($this->_table);
        $this->db->join($this->_notification_user_table,$this->_notification_user_table.'.notification_id = '.$this->_table.'.id','left');
        $this->db->where($this->_notification_user_table.'.uid',$user_id);
        $this->db->where($this->_notification_user_table.'.type',0);
        $this->db->where($this->_notification_user_table.'.deleted',ACTIVE_STATUS);
        if($unread == true){
            $this->db->where($this->_notification_user_table.'.status',NOTIFICATION_UNREAD);
        }
        // type == 11 is transfer between sales/consum inventory notification
        $this->db->where("CASE WHEN $this->_table.type = 11 THEN $this->_table.branch_id = $this->_branch_id ELSE TRUE END ",null,false);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data['max'];
        
    }

    // function get_all_notification_by_user($off = null, $limit = null, $order = "DESC",$user_id,$unread = false){
    //     $sql = " SELECT O.* FROM ( SELECT df_notification.*, df_notification_user.id AS noti_user_id, df_notification_user.status ";
    //     $sql .= " FROM df_notification ";
    //     $sql .= " LEFT JOIN df_notification_user ON df_notification_user.notification_id = df_notification.id AND df_notification_user.type = 0 ";
    //     $sql .= " WHERE df_notification_user.uid = $user_id AND df_notification_user.deleted =0 ";
    //     if($unread == true){
    //         $sql .= " AND df_notification_user.status = " .NOTIFICATION_UNREAD ." ";
    //     }
    //     $sql .= "AND CASE WHEN df_notification.type = 11 THEN df_notification.branch_id = 16 ELSE TRUE END ";

    //     $sql .= " UNION ALL  ";

    //     $sql .= " SELECT df_dashboard_news.id,df_dashboard_news.title AS title,df_dashboard_news.created_date AS date_time, 'Dashboard' AS link,-1 AS `type`,branch_id, role_receiver AS role_id, group_receiver AS group_receiver, df_notification_user.id AS noti_user_id, df_notification_user.status ";
    //     $sql .= " FROM df_dashboard_news ";
    //     $sql .= " LEFT JOIN df_notification_user ON df_notification_user.notification_id = df_dashboard_news.id  AND df_notification_user.type = 1 ";
    //     $sql .= " WHERE df_notification_user.uid = $user_id AND df_notification_user.deleted =0 ";
    //     if($unread == true){
    //         $sql .= " AND df_notification_user.status = " .NOTIFICATION_UNREAD ." ";
    //     }
    //     $sql .= " ) AS O ";
    //     $sql .= " ORDER BY O.date_time $order ";

    //     if($off == null) {
    //         $off = 0;

    //     }
    //     if ($limit != null){
    //         $sql    .= " LIMIT $off,$limit";
    //     }

    //     $query = $this->db->query($sql);
    //     $data = $query->result_array();
    //     return $data;
        
    // }
}

?>
