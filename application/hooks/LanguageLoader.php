<?php
class LanguageLoader
{
    function initialize()
    {
        $ci =& get_instance();
        $ci->load->helper('language');
        $ci->load->library(array("session"));
        $siteLang = $ci->session->userdata('site_lang');
        $language = $ci->config->item('language');
        if ($siteLang) {
            $ci->lang->load('myspa_lang',$siteLang);
        } else {
            $ci->lang->load('myspa_lang', $language);
        }
    }
}