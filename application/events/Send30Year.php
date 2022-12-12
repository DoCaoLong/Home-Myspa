<?php
class Send30Year
{
    /** @var CI_Controller */
    private $_CI;

    function __construct() {
        $this->_CI = &get_instance();
        Events::register('Send30Year::sendSlack', [$this, 'handler']);
    }

    function handler($data)
    {
        $header = ['Content-Type:application/json'];
        $post['source'] = 'MYSPA HOME';
        $db_name = env('DB_MULTIPLE', false) ? DBNAME : env('DB_DATABASE', null);
        run_background_process('php index.php Frontend/shitAsync ' . url_base64_encode(json_encode([
            'url' => env('API_BASE_URL').'/v1/organizations/'.$db_name.'/contact/'.$data['contact_id'].'/saleNotify',
            'data' => $post,
            'header' => $header
        ])));
    }
}