<?php
/**
 * Created by PhpStorm.
 *
 * Date: 12/1/17
 * Time: 3:59 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ini_set('error_reporting', E_STRICT);

require_once APPPATH."/third_party/PHPExcel/Classes/PHPExcel.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}

?>
