<?php
class auth{
    private $_allow_group_arr = array();
    // set allow group for controller
    public function set_allow_role( $allow_group_arr ){
        $this->_allow_group_arr = $allow_group_arr;
    }
    public function check_role( $group_id ){
        if(in_array($group_id, $this->_allow_group_arr)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
