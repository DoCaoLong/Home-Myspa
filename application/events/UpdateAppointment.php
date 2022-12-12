<?php


class UpdateAppointment
{
    /** @var CI_Controller */
    private $_CI;

    function __construct() {
        $this->_CI = &get_instance();
        Events::register('UpdateAppointment::CIupdate', [$this, 'handler']);
    }

    function handler($data)
    {
        if (isset($data['database'])) {
            fetchAsync(env('API_BASE_URL').'/v1/organizations/'.$data['database'].'/appointments/'.$data['id'].'/ciUpdate');
        }
    }
}