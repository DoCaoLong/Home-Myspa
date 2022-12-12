<?php


class UpdateTag
{
    /** @var CI_Controller */
    private $_CI;

    function __construct() {
        $this->_CI = &get_instance();
        Events::register('UpdateTag::CIupdate', [$this, 'handler']);
    }

    function handler()
    {
        fetchAsync(env('API_BASE_URL').'/v1/tags/ciUpdate');
    }
}
