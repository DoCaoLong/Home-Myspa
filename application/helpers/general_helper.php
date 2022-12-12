<?php

use GuzzleHttp\RequestOptions;

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('fetch')) {
    function fetch($url, $post = [], $header = [], $method = '') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, (!empty($method)) ? $method : 'PATCH');
        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, true);
            if (is_array($post) && isset($header['Content-Type']) && $header['Content-Type'] == 'application/json') {
                $post = json_encode($post);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        $resp = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($resp, true);
    }
}

if (!function_exists('fetchAsync')) {
    /**
     * @param string $url
     * @param null $post
     * @param array $header
     */
    function fetchAsync(string $url, $post = null, array $header = []) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, true);
            if (is_array($post) && isset($header['Content-Type']) && $header['Content-Type'] == 'application/json') {
                $post = json_encode($post);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        $mh = curl_multi_init();
        curl_multi_add_handle($mh,$ch);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);

        curl_multi_remove_handle($mh, $ch);
        curl_multi_close($mh);
    }
}

function getDomainInfo(){
    // define('DOMAIN_INFO',array(
    //     'dev2021' => array(
    //             'database' => 'dev2021',
    //             'domain' => 'https://demo2.myspa.vn'
    //         ),
    //     'yen_spa' => array(
    //             'database' => 'yen_spa',
    //             'domain' => 'https://yen_spa-premium.myspa.vn'
    //         ),
    //     'tao_lao' => array(
    //         'database' => 'tao_lao',
    //         'domain' => 'https://tao_lao-premium.myspa.vn'
    //     ),
    // ));

    if (!defined('DOMAIN_INFO')) {
        define('DOMAIN_INFO', [
            env('DB_DATABASE') => [
                'database' => env('DB_DATABASE'),
                'domain' => env('BASE_URL')
            ],
        ]);
    }
}

if (!function_exists('url_base64_encode')) {
    function url_base64_encode($str = '')
    {
        return strtr(base64_encode($str), '+=/', '.-~');
    }
}

if (!function_exists('url_base64_decode')) {
    function url_base64_decode($str = '')
    {
        return base64_decode(strtr($str, '.-~', '+=/'));
    }
}

function validate_captcha($captcha, $action)
{
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".env('RECAPTCHA_V3_SECRET')."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response, true);
    return !empty($response["success"]) && $response["success"] && $response["score"] >= 0.35;
}
function getClientIP()
{
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP))
	{
		$ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
		$ip = $forward;
	}
	else
	{
		$ip = $remote;
	}

	return $ip;
}
