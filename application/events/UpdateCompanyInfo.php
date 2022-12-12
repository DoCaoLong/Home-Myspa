<?php


class UpdateCompanyInfo
{
    /** @var CI_Controller */
    private $_CI;

    function __construct() {
        $this->_CI = &get_instance();
        Events::register('UpdateCompanyInfo::CIupdate', [$this, 'handler']);
    }

    function handler($data)
    {
        if (isset($data['database'])) {
            fetchAsync(env('API_BASE_URL').'/v1/organizations/'.$data['database'].'/ciUpdate');
        }
    }
}