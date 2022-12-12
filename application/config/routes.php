<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    |	example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    |	https://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There are three reserved routes:
    |
    |	$route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded.
    |
    |	$route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router which controller/method to use if those
    | provided in the URL cannot be matched to a valid route.
    |
    |	$route['translate_uri_dashes'] = FALSE;
    |
    | This is not exactly a route, but allows you to automatically route
    | controller and method names that contain dashes. '-' isn't a valid
    | class or method name character, so it requires translation.
    | When you set this option to TRUE, it will replace ALL dashes in the
    | controller and method URI segments.
    |
    | Examples:	my-controller/index	-> my_controller/index
    |		my-controller/my-method	-> my_controller/my_method
    */

    $route['default_controller']= 'frontend/index';
    $route['trang-chu']         = 'frontend/index';
    $route['ve-chung-toi']      = 'frontend/about';
    $route['blog/about'] = 'frontend/about';
    $route['ve-chung-toi-founder']      = 'frontend/about_we';
    $route['tuyen-dung']      = 'frontend/recruit';
    $route['tuyen-dung-viec-lam']      = 'frontend/job';
    $route['chi-tiet-viec-lam/([a-zA-Z0-9_\.\-]+)']      = 'frontend/job_detail/$1';
    $route['phan-mem']          = 'frontend/software';
    $route['thiet-bi']          = 'frontend/product';
    $route['bang-gia']          = 'frontend/pricing';
    $route['blog']              = 'frontend/blog';
    $route['dieu-khoan-su-dung']= 'frontend/term_condition';
    $route['huong-dan-su-dung'] = 'frontend/guide';
    $route['ho-tro']            = 'frontend/lienhe';
    $route['gift']              = 'frontend/sale_ad';
    // $route['chuong-trinh-tro-gia'] = 'frontend/sale';
    // ---------------
    // redirect router 
    $route['phan-mem-quan-ly-tham-my-vien'] = 'frontend/landing_clinic_redirect';
    $route['phan-mem'] = 'frontend/landing_myspa_redirect';
    $route['phan-mem-quan-ly-phong-kham-tham-my-vien'] = 'frontend/landing_myspa_redirect_phong_kham';
    // ---------------
    // landing page routers
    $route['chuong-trinh-tro-gia'] = 'frontend/landing_myspa';
    $route['phan-mem-quan-ly-spa'] = 'frontend/landing_myspa';
    $route['phan-mem-quan-ly-phong-kham'] = 'frontend/landing_clinic';
    $route['phan-mem-quan-ly-salon-toc'] = 'frontend/landing_salon';
    $route['phan-mem-quan-ly-tiem-nails'] = 'frontend/landing_nail';
    $route['thiet-ke-app-thuong-hieu'] = 'frontend/landing_app_design';
    $route['nen-tang-kinh-doanh-nganh-lam-dep'] = 'frontend/landing_momo_connection';
    $route['mo-gian-hang-tren-beautyx'] = 'frontend/landing_momo_connection';
    // ---------------
    $route['login']             = 'Login/login';
    $route['logout']            = 'Login/logout';
    $route['khoi-phuc-mat-khau']= 'Login/forgot_password';
    $route['tao-mat-khau-moi']  = 'Login/reset_password';
    $route['404_override']      = 'my404';
    // --------------------
    // hash route
    $route['app-myspamanager'] = 'frontend/landing_myspa';
    // --------------------
    // demo route
    $route['trang-chu-demo'] = 'frontend/index_demo';
    $route['bang-gia-phan-mem']      = 'frontend/pricing';
    $route['bang-gia-phan-mem-demo']      = 'frontend/pricing_demo';
    $route['bang-gia-gia-thiet-ke-app']          = 'frontend/brand_app_pricing';
    $route['bang-gia-thiet-ke-app']          = 'frontend/brand_app_pricing';
    // --------------------
    $route['log']               = 'ManageLog/system_log';
    $route['dat-hen']           = 'Booking/index';
    $route['thank-you']         = 'Booking/thankyou';
    $route['thank-you-reviewed']= 'Review/thankyou';
    $route['thank-you-for-register'] = 'frontend/thankyou';
    $route['cors/(:any)/tim-kiem/'] = 'frontend/get_data/$1';
    // Link for register form
    // $route['su-kien'] = 'frontend/eventVietKorea';
    $route['dang-ky-goi-truyen-thong'] = 'frontend/marketing_register';
    $route['dang-ky-su-dung-myspa-check-in'] = 'frontend/checkin_register';
    $route['dang-ky-lien-ket-ban-hang-tren-beautyx'] = 'frontend/momo_register';
    $route['lien-ket-vi-dien-tu-momo'] = 'frontend/momo_register';
    // Momo contact 
    $route['cua-hang/([a-zA-Z0-9_\.\-]+)'] = 'Organizations/index/$1';
    $route['cua-hang/([a-zA-Z0-9_\.\-]+/dich-vu/(:any))'] = 'Organizations/service/$2';
    // ----------------------
    $route['moba_manager'] 		= 'moba_manager/dashboard';

    $route['moba/v1/login'] 		= 'moba_api/v1/Login/login';
    $route['moba/v1/logout'] 		= 'moba_api/v1/Login/logout';
    $route['moba/v1/home'] 			= 'moba_api/v1/Home/index';
    $route['moba/v1/(:any)/(:any)'] = 'moba_api/v1/$1/$2';
    $route['translate_uri_dashes'] = FALSE;