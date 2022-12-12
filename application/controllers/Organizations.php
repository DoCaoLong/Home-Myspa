<?php

class Organizations extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function index($org)
    {
        $this->load->view('organizations/momo_miniapp', ['org' => $org]);
    }

    function service($name) {
        $this->load->view('organizations/momo_miniapp_service', ['service' => $name . '?' . $this->input->server('QUERY_STRING')]);
    }
}