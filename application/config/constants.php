<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// new add
// user role
define('ROLE_ADMIN',1);
define('ROLE_STAFF',2);
define('ROLE_MEMBER',4);
define('ROLE_S_ADMIN',5);

// status
define('ACTIVE',0);
define('INACTIVE',1);

//is_momo_ecommerce_enable
define('IS_MOMO_ECOMMERCE_ENABLE_OFF',"0");
define('IS_MOMO_ECOMMERCE_ENABLE_ON',"1");

// sex
define('MALE',1);
define('FEMALE',2);

// key to encrypt
define('KEY','df%$^*!!**');
define('PRIVATE_KEY','myspaHDHCM^*%');

// action for log table
define('LOGIN','login');
define('LOGIN_API','login from API');
define('LOGIN_TOKEN','login by token');
define('LOGOUT','logout');
define('LOGOUT_API','logout from API');
define('CHANGE_PASSWORD','change password');
define('LOGIN_FAIL','login fail');
// Manage user

//-- member
define('MEMBER_LIST','member_list');
define('ADD_MEMBER','add memeber');
define('MEMBER_REGISTER','memeber register');
define('EDIT_MEMBER','edit member');
define('DELETE_MEMBER','delete member');
define('SEARCH_MEMBER','search_member');

//-- PT
define('PT_LIST','pt_list');
define('ADD_PT','add PT');
define('EDIT_PT','edit PT');
define('DELETE_PT','delete PT');
define('SEARCH_PT','search_pt');

//-- admin
define('ADD_ADMIN','add admin');
define('EDIT_ADMIN','edit admin');
define('DELETE_ADMIN','delete admin');

//-- staff
define('ADD_STAFF','add staff');
define('EDIT_STAFF','edit staff');
define('DELETE_STAFF','delete staff');

// Promotion log
define("ADD_CHECKIN",'add check in');
define("ADD_CHECKOUT",'add check out');

// Promotion log
define("ADD_PROMOTION",'add promotion');
define("EDIT_PROMOTION",'edit promotion');
define("DELETE_PROMOTION",'delete promotion');

//-- practice room
define('ADD_PRACTICE_ROOM','add practice room');
define('EDIT_PRACTICE_ROOM','edit practice room');
define('DELETE_PRACTICE_ROOM','delete practice room');

// System
//-- company info
define('ADD_COMPANY_INFO','add company info');
define('EDIT_COMPANY_INFO','edit company info');
define('DELETE_COMPANY_INFO','delete compnay info');

//-- user group
define('ADD_USER_GROUP','add user group');
define('EDIT_USER_GROUP','edit user group');
define('DELETE_USER_GROUP','delete user group');

//-- user level
define('ADD_USER_LEVEL','add user level');
define('EDIT_USER_LEVEL','edit user level');
define('DELETE_USER_LEVEL','delete user level');

//-- branch
define('ADD_BRANCH','add branch');
define('EDIT_BRANCH','edit branch');
define('DELETE_BRANCH','delete branch');

//-- customer base
define('ADD_CUSTOMER_BASE','add customer base');
define('EDIT_CUSTOMER_BASE','edit customer base');
define('DELETE_CUSTOMER_BASE','delete customer base');

//-- payment method
define('ADD_PAYMENT_METHOD','add payment method');
define('EDIT_PAYMENT_METHOD','edit payment method');
define('DELETE_PAYMENT_METHOD','delete payment method');

//--ROLE PRIVILEDGE
define('UPDATE_ROLE_PRIVILEDGE','Update role priviledge');

//--SERVICE
define('ADD_SERVICE','add service');
define('EDIT_SERVICE','edit service');
define('DELETE_SERVICE','delete service');

//--SERVICE GROUP
define('ADD_SERVICE_GROUP','add service group');
define('EDIT_SERVICE_GROUP','edit service group');
define('DELETE_SERVICE_GROUP','delete service group');

//--INCOME OUTCOME
define('ADD_INCOME_OUTCOME','add in/out money');
define('EDIT_INCOME_OUTCOME','edit in/out money');
define('DELETE_INCOME_OUTCOME','delete in/out money');

//--DEBT
define('ADD_DEBT','add debt');
define('EDIT_DEBT','edit debt');
define('DELETE_DEBT','delete debt');

//--BRAND
define('ADD_BRAND','add brand');
define('EDIT_BRAND','edit brand');
define('DELETE_BRAND','delete brand');

//--PRODUCT
define('ADD_PRODUCT','add product');
define('EDIT_PRODUCT','edit product');
define('DELETE_PRODUCT','delete product');

//--PRODUCT CATEGORY
define('ADD_PRODUCT_CATEGORY','add product category');
define('EDIT_PRODUCT_CATEGORY','edit product category');
define('DELETE_PRODUCT_CATEGORY','delete product category');

//--PRODUCT TYPE
define('PRODUCT_TYPE_SALE',0);
define('PRODUCT_TYPE_CONSUMABLE',1);
define('PRODUCT_TYPE_SALE_AND_CONSUMABLE',2);

//--ORDER
define('ADD_ORDER','add order');
define('EDIT_ORDER','edit order');
define('SPLIT_ORDER','split order');
define('MERGE_ORDER','merge order');
define('DELETE_ORDER','delete order');
define('UNDO_DELETE_ORDER','undo delete order');

//--ORDER_STAFF (COMMISSION)
define('ADD_COMMISSION','add commission');
define('EDIT_COMMISSION','edit commission');
define('DELETE_COMMISSION','delete commission');

//--ORDER_STAFF (COMMISSION TRANSACTION)
define('EDIT_COMMISSION_TRANSACTION','edit commission transaction');

//--USER
define('ADD_USER','add user');
define('EDIT_USER','edit user');
define('DELETE_USER','delete user');

//--APPOINTMENT
define('ADD_APPOINTMENT','add appointment');
define('BOOK_APPOINTMENT','book appointment');
define('EDIT_APPOINTMENT','edit appointment');
define('DELETE_APPOINTMENT','delete appointment');

//--APPOINTMENT SETTING
define('ADD_APPOINTMENT_SETTING','add appointment setting');
define('BOOK_APPOINTMENT_SETTING','book appointment setting');
define('EDIT_APPOINTMENT_SETTING','edit appointment setting');
define('DELETE_APPOINTMENT_SETTING','delete appointment setting');

//--USER PHOTO
define('ADD_USER_PHOTO','add user photo');
define('EDIT_USER_PHOTO','edit user photo');
define('DELETE_USER_PHOTO','delete user photo');

//--INSTOCK
define('ADD_INSTOCK','input instock');
define('EDIT_INSTOCK','edit instock');
define('DELETE_INSTOCK','delete instock');

//--IMPORT
define('ADD_IMPORT','add import');
define('EDIT_IMPORT','edit import');
define('DELETE_IMPORT','delete import');

//--BED MNG
define('ADD_BED','add bed');
define('EDIT_BED','edit bed');
define('DELETE_BED','delete bed');

//--IMPORT SOURCE
define('ADD_IMPORT_SOURCE','add import source');
define('EDIT_IMPORT_SOURCE','edit import source');
define('DELETE_IMPORT_SOURCE','delete import source');

//--ROOM MNG
define('ADD_ROOM','add room');
define('EDIT_ROOM','edit room');
define('DELETE_ROOM','delete room');

//--SERVICE CARD
define('ADD_SERVICE_CARD','add service card');
define('EDIT_SERVICE_CARD','edit service card');
define('DELETE_SERVICE_CARD','delete service card');
define('UNDO_DELETE_SERVICE_CARD','undo delete service card');

//--SERVICE_CARD_VALUE
define('ADD_SERVICE_CARD_VALUE','add service card value');
define('EDIT_SERVICE_CARD_VALUE','edit service card value');
define('DELETE_SERVICE_CARD_VALUE','delete service card value');

//--SERVICE CARD LOG
define('ADD_SERVICE_CARD_LOG','add service card log');
define('EDIT_SERVICE_CARD_LOG','edit service card log');
define('DELETE_SERVICE_CARD_LOG','delete service card log');
define('CHECK_IN_SERVICE_CARD','checkin service card log');
define('CHECK_OUT_SERVICE_CARD','checkout service card log');

//--PREPAY CARD
define('ADD_PREPAY_CARD','add prepay card');
define('EDIT_PREPAY_CARD','edit prepay card');
define('DELETE_PREPAY_CARD','delete prepay card');
define('UNDO_DELETE_PREPAY_CARD','undo delete prepay card');

//--PREPAY CARD VALUE
define('ADD_PREPAY_CARD_VALUE','add prepay card value');
define('EDIT_PREPAY_CARD_VALUE','edit prepay card value');
define('DELETE_PREPAY_CARD_VALUE','delete prepay card value');

//--PREPAY CARD LOG
define('ADD_PREPAY_CARD_LOG','add service card log');
define('EDIT_PREPAY_CARD_LOG','edit service card log');
define('DELETE_PREPAY_CARD_LOG','delete service card log');

//--PAYMENT HISTORY
define('ADD_PAYMENT','add payment');
define('DELETE_PAYMENT','delete payment');

//--MEMBER NOTE
define('ADD_MEMBER_NOTE','add member note');
define('EDIT_MEMBER_NOTE','edit member note');
define('DELETE_MEMBER_NOTE','delete member note');

//--REVIEW
define('ADD_REVIEW','add review');
define('EDIT_REVIEW','edit review');
define('DELETE_REVIEW','delete review');

//--MONEY IN OUT TYPE
define('ADD_MONEY_IN_OUT_TYPE','add money in out type');
define('EDIT_INCOME_OUTCOME_TYPE','edit in/out money type');
define('DELETE_INCOME_OUTCOME_TYPE','delete in/out money type');

//--DEBT TYPE
define('ADD_DEBT_TYPE','add debt type');

//--IP BLOCKED
define('EDIT_IP_BLOCKED','edit ip blocked');

//--OPTION
define('EDIT_OPTION','edit option');

//--OPTION
define('EDIT_MBS_CARD','edit membership card');

//--WORKING TIME
define('WKT_CHECKIN','staff checkin');

//--ACTION LOG
define('VIEW_SYSTEM_LOG','view system log');

//--API TOKEN
define('ADD_TOKEN','add token');
define('EDIT_TOKEN','edit token');
define('DELETE_TOKEN','delete token');

//--REWARD BENEFIT
define('ADD_REWARD_BENEFIT','add reward benefit');
define('EDIT_REWARD_BENEFIT','edit reward benefit');
define('DELETE_REWARD_BENEFIT','delete reward benefit');

//--PROMOTIONS
define('ADD_PROMOTIONS_CODE','add promotions code');
define('EDIT_PROMOTIONS_CODE','edit promotions code');
define('DELETE_PROMOTIONS_CODE','delete promotions code');
define('ADD_PROMOTIONS_TYPE','add promotions type');
define('EDIT_PROMOTIONS_TYPE','edit promotions type');
define('DELETE_PROMOTIONS_TYPE','delete promotions type');

//--ASSET
define('ADD_ASSET','add asset');
define('EDIT_ASSET','edit asset');
define('DELETE_ASSET','delete asset');


//--DASHBOARD NEWS
define('ADD_DASHBOARD_NEWS','add dashboard news');
define('EDIT_DASHBOARD_NEWS','edit dashboard news');
define('DELETE_DASHBOARD_NEWS','delete dashboard news');

//--RECORDS
define('ADD_RECORDS','add records');
define('EDIT_RECORDS','edit records');
define('DELETE_RECORDS','delete records');

//--RECORDS TYPE
define('ADD_RECORDS_TYPE','add records type');
define('EDIT_RECORDS_TYPE','edit records type');
define('DELETE_RECORDS_TYPE','delete records type');

//--NOTIFICATION PRIVILEDGE
define('UPDATE_NOTIFICATION_PRIVILEDGE','update notification priviledge');

// GUIDELINE
define('ADD_GUIDELINE','add guidline');
define('EDIT_GUIDELINE','edit guideline');
define('DELETE_GUIDELINE','delete guideline');

// GUIDELINE TYPE
define('ADD_GUIDELINE_TYPE','add guidline_type');
define('EDIT_GUIDELINE_TYPE','edit guideline_type');
define('DELETE_GUIDELINE_TYPE','delete guideline_type');

// WORKING TIME
define('DELETE_WORKING_TIME','delete working_time');

//--APPOINTMENT TYPE
define('ADD_APPOINTMENT_TYPE','add appointment type');
define('EDIT_APPOINTMENT_TYPE','edit appointment type');
define('DELETE_APPOINTMENT_TYPE','delete appointment type');

// DF table list
define('TABLE_USER','df_user');
define('TABLE_STAFF','df_staff');
define('TABLE_MEMBER','df_member');
define('TABLE_BRANCH','df_branch');
define('TABLE_COMPANY_INFO','df_company_info');
define('TABLE_CUSTOMER_BASE','df_customer_base');
define('TABLE_PROMOTION','df_promotion');
define('TABLE_USER_GROUP','df_user_group');
define('TABLE_PAYMENT_METHOD','df_payment_method');
define('TABLE_MEMBER_NOTE','df_member_note');
define('TABLE_ROLE_PRIVILEDGE','df_role_priviledge');

define('TABLE_SERVICE','df_service');
define('TABLE_SERVICE_GROUP','df_service_group');
define('TABLE_BRAND','df_brand');
define('TABLE_PRODUCT','df_product');
define('TABLE_PRODUCT_CATEGORY','df_product_category');
define('TABLE_CONTACT','df_contact');
define('TABLE_ORDER','df_order');
define('TABLE_ORDER_STAFF','df_order_staff');
define('TABLE_APPOINTMENT','df_appointment');
define('TABLE_APPOINTMENT_SETTING','df_appointment_setting');
define('TABLE_USER_PHOTO','df_user_photo');
define('TABLE_INSTOCK','df_instock');
define('TABLE_BED','df_bed');
define('TABLE_ROOM','df_room');
define('TABLE_SERVICE_CARD','df_service_card');
define('TABLE_SERVICE_CARD_VALUE','df_service_card_value');
define('TABLE_SERVICE_CARD_LOG','df_service_card_log');
define('TABLE_PREPAY_CARD','df_prepay_card');
define('TABLE_PREPAY_CARD_VALUE','df_prepay_card_value');
define('TABLE_PREPAY_CARD_LOG','df_prepay_log');
define('TABLE_PAYMENT_HISTORY','df_payment_history');
define('TABLE_IP_BLOCKED','df_ip_blocked');
define('TABLE_WORKING_TIME','df_working_time');
define('TABLE_OPTION','df_option');
define('TABLE_MBS_CARD','df_mbs_card');
define('TABLE_ORDER_PAYMENT_HISTORY','df_order_payment_history');
define('TABLE_ACTION_LOG','df_action_log');
define('TABLE_USER_LEVEL','df_user_level');
define('TABLE_MONEY_IN_OUT','df_money_in_out');
define('TABLE_MONEY_IN_OUT_TYPE','df_money_in_out_type');
define('TABLE_DEBT','df_debt');
define('TABLE_DEBT_TYPE','df_debt_type');
define('TABLE_REVIEW','df_review');
define('TABLE_API_TOKEN','df_api_token');
define('TABLE_IMPORT','df_import');
define('TABLE_IMPORT_SOURCE','df_import_source');
define('TABLE_PROMOTIONS_CODE','df_promotions_code');
define('TABLE_PROMOTIONS_TYPE','df_promotions_type');
define('TABLE_NOTIFICATION_PRIVILEDGE','df_notification_priviledge');
define('TABLE_ASSET','df_asset');
define('TABLE_RECORDS','df_records');
define('TABLE_RECORDS_TYPE','df_records_type');
define('TABLE_DASHBOARD_NEWS','df_dashboard_news');
define('TABLE_GUIDELINE','df_guideline');
define('TABLE_GUIDELINE_TYPE','df_guideline_type');
define('TABLE_APPOINTMENT_TYPE','df_appointment_type');
define('TABLE_MEMBER_REWARD_BENEFIT','df_member_reward_benefit');
define('TABLE_APPOINTMENT_STATUS','df_appointment_status');

//--Error
define('EMPTY_FIELD_ERROR','Thông tin bắt buộc nhập');
define('NONE_SELECTED_ERROR','Vui lòng chọn một');
define('EMAIL_ERROR','Email này đã tồn tại');
define('PHONE_ERROR','Phone này đã tồn tại');
define('PASSWORD_ERROR','Password không trùng nhau');
define('ID_CARD_ERROR','CMND này đã tồn tại');

//--PROMOTION METHOD
define('DISCOUNT_MONEY',1);
define('DISCOUNT_PERCENT',2);
define('MONTHLY_BONUS',3);
define('DAILY_BONUS',4);

//-- delete status
define('ACTIVE_STATUS',0);
define('DELETED_STATUS',1);
define('NOT_CHECK_DELETED',NULL);

//--notification status
define('NOTIFICATION_UNREAD',1);
define('NOTIFICATION_READ',2);
define('ALL_BRANCH',0);

//--notification type
define('NOTIFICATION_TYPE_USER_PUSH',-1);
define('NOTIFICATION_TYPE_CHECK_IN',1);
define('NOTIFICATION_TYPE_CONTACT',2);
define('NOTIFICATION_TYPE_BOOKING',3);
define('NOTIFICATION_TYPE_REVIEW',4);
define('NOTIFICATION_TYPE_ORDER_SALE',5);
define('NOTIFICATION_TYPE_APPOINTMENT',6);
define('NOTIFICATION_TYPE_STAFF_RECEIVE_COMMISSION',7);

define('INVENTORY_BRANCH_TRANSFER',11);
define('NOTIFICATION_TYPE_OUT_OF_STOCK',12);
define('NOTIFICATION_TYPE_EXPIRY_WARNING',13);
define('NOTIFICATION_TYPE_ANNOUCEMENT_PROMO',14);

//--PREFIX CODES
define('PRE_CODE_CONTRACT','HĐ-');
define('PRE_CODE_MEMBER','KH-');
define('PRE_CODE_STAFF','NV-');
define('PRE_CODE_PT','HLV-');
define('PRE_CODE_PROMOTION','PRO-');

define('PRE_CODE_SERVICE','DV-');
define('PRE_CODE_PRODUCT','SP-');
define('PRE_CODE_ORDER','ĐH-');
define('PRE_CODE_CARD','THE-LT-');
define('PRE_CODE_PREPAY_CARD','THE-TT-');
define('PRE_CODE_COMBO','CB-');
define('PRE_CODE_IMPORT','NK-');
define('PRE_CODE_EXPORT','XK-');

define('PRE_CODE_BRANCH','CN');
//-- page array
define('ACCESS_ENABLE','checked=checked');
define('ACCESS_DISABLE','can_not_access');
define('ACCESS_ON','ON');
define('ACCESS_OFF','');

//--TYPE
define('SERVICE_TYPE',1);
define('PRODUCT_TYPE',2);
define('COMBO_TREATMENT_TYPE',3);
define('PREPAY_TYPE',4);

define('TREATMENT_TYPE',3); //TREATMENT TYPE SIMILIAR COMBO TREATMENT TYPE

//--ROOT ADMIN ID
define('ROOT_ADMIN_ID',1);

define('HOTLINE','0899310908');
define('LINK_CONTACT_MANAGEMENT','ManageContact/contact_list');
define('LINK_BOOKING_MANAGEMENT','ManageAppointment');
define('LINK_REVIEW_MANAGEMENT','ManageReview/view');

//-- CONTACT
define('MESSAGE_UNREAD',0);
define('MESSAGE_READED',1);
define("LOGO_TYPE_MOBA",1);
define("LOGO_TYPE_MOMO",2);
define("LOGO_TYPE_NEW_YEAR",3);

//--UPDATE READ
define('UPDATE_READED','update message to readed');

//--ORDER STATUS
define('PENDING',0);
define('PAID',1);
define('REFUNDED',2);
define('CANCELLED',3);
define('PREPAID',4);

define('KHACH_LE',-1);

//-- Update status
define('UPDATE_SUCCESS','Cập nhật thành công');

//-- Forgot Password
define('WAITING_CONFIRM',0);
define('CONFIRMED',1);
define('EXPIRED',2);

//-- Import status
define('IMPORT_SUCCESS','Nạp file thành công');
define('IMPORT_FAIL','Nạp file không thành công');

//-- SMS
define('SMS_PRICE',500);
define('SMS_PRICE_800',800);
define('SMS_PRICE_150',150);
define('SMS_PRICE_200',200);

//-- SMS CONFIG
define('DEFAULT_SPEEDSMS',0);
define('SPEEDSMS',1);
define('MOTIPLUS',2);
define('VIETGUYS',3);
define('TOOMARKETER',4);
define('EFOREA',5);
define('ESMS',6);
define('VMGSMS',7);
define('VNPT',8);
define('SPEEDSMS2',9);
define('SPEEDSMS_ANDROID',10);
define('MOBIPHONE',11);
define('SIMOSMS',12);


//-- SEND SMS
define('SMS_TO_CUSTOMER','Gởi tin nhắn đến KH');
define('SMS_TO_MERCHANT','Gởi tin nhắn đến DN');

//-- ACCOUNTANT
define('ACCOUNTANT_CONFIRMED','Accountant confirm payment');

//--CARD TYPE
define('SERVICE_CARD_TYPE',1);
define('PREPAY_CARD_TYPE',2);

//--CARD STATUS
define('CARD_CHECKIN_STATUS',1);
define('CARD_CHECKOUT_STATUS',2);

define('SUPPORT_EMAIL','hiep@myspa.vn');

// IP BLOCKED
define('ACCEPTED_ALL',0);
define('BLOCKED_ALL',1);

// PAYMENT METHOD: PREPAY_CARD
define('PAY_BY_PREPAY_CARD',-1);

define('REFUND_MONEY','HOÀN TIỀN LẠI CHO KHÁCH HÀNG');

//-- REMIND INTERACTIVE
define('REMIND_DAYS',7);

define('CHECKIN',1);
define('CHECKOUT',2);

define('MINUS_HAFT_TREATMENT',2);

//-- APPOINTMENT
define('APT_PENDING',0);
define('APT_CONFIRMED',1);
define('APT_NOT_ARRIVED',2);
define('APT_CANCELLED',3);
define('APT_ARRIVED',4);
define('APT_BOOK_ONLINE',5);
define ('STATUS_APT_NAME', array('Chưa xác nhận', 'Đã xác nhận', 'Không đến', 'Hủy', 'Đã đến', 'Đặt online'));
define ('STATUS_APT_NAME_ENG', array('Unconfirmed', 'Confirmed', 'Not come', 'Cancelled', 'Arrived', 'Online Booking'));
define ('STATUS_APT_NAME_IND', array('Unconfirmed', 'Confirmed', 'Not come', 'Cancelled', 'Arrived', 'Online Booking'));
define ('STATUS_BG_CLASS', array('primary', 'success', 'warning', 'danger', 'pink', 'info'));

//-- BOOKING
define('BOOKING_ONLINE_TYPE',1);
define('BOOKING_MOBILE_APP_TYPE',2);

define('APPOINTMENT_TYPE_DEFAULT',0);
define('APPOINTMENT_TYPE_CUSTOMER_CARE',1);
define('APPOINTMENT_TYPE_TREATMENT_PROGRAM',2);
define('APPOINTMENT_TYPE_CUSTOMER_TREATMENT',3);

//-- SMS CONTENT
define('SMS_BOOKING_TO_CUSTOMER',1);
define('SMS_BOOKING_TO_MERCHANT',2);
define('SMS_BOOKING_REMINDER',3);
define('SMS_AFTER_TREATMENT',4);
define('SMS_AFTER_USE_WALLET',5);
define('SMS_THANK_YOU',6);
define('SMS_CREATE_TREATMENT',7);
define('SMS_CREATE_PREPAY',8);
define('SMS_CHANGE_REWARD_ACCOUNT_BALANCE',9);

//-- PROMOTIONS METHOD
define('DISCOUNT_ON_BILL',1);
define('DISCOUNT_ON_SERVICE',2);

//-- BACKEND VERSION
define('VERSION','4.5.2');

//-- IP ACCESS
define('IP_ACCESS','27.2.113.224');

//-- ACCESS TO LOG SYSTEM
define('LOG_SYSTEM_ACCESS_EMAIL','hiep@myspa.vn,support@myspa.vn');

//-- APP API
define('APP_MOBILE','-2');

define('SERVICE', array ('basic_month' => "Cơ bản (theo tháng)", 'medium_month' => "Chuyên nghiệp (theo tháng)", 'vip_month' => "Cao cấp (theo tháng)",
    'basic_full' => "Cơ bản (trọn gói)", 'medium_full' => "Chuyên nghiệp (trọn gói)", 'vip_full' => "Cao cấp (trọn gói)"));
define('SERVICE_DURATION', array(12, 24, 36, 48));

define('MYSPA_PLANS', array (
    'basic' => array(
        "color" => "#c377e0",
        "monthly_fee" => 299000,
        "monthly_extra_branch_fee" => 0,
    ),
    'medium' => array(
        "color" => "#abd373",
        "monthly_fee" => 599000,
        "monthly_extra_branch_fee" => 0,
    ),
    'vip' => array(
        "color" => "#f69733",
        "monthly_fee" => 1299000,
        "monthly_extra_branch_fee" => 240000,
    ),
));

//-- WEBSOCKET
define('WEBSOCKET', "wss://myspaserversocket.herokuapp.com/");

//-- SERVICE LIMITATION
// ADMIN ACCOUNT LIMITATION
define('ADMIN_ACCOUNT_LIMITATION',array(
    'basic_month' => 1,
    'medium_month' => 10,
    'vip_month' => -1, //unlimit
    'basic_full' => 1,
    'medium_full' => 10,
    'vip_full' => -1, //unlimit
));
// STAFF ACCOUNT LIMITATION
define('STAFF_ACCOUNT_LIMITATION',array(
    'basic_month' => 1,
    'medium_month' => 10,
    'vip_month' => -1, //unlimit
    'basic_full' => 1,
    'medium_full' => 10,
    'vip_full' => -1, //unlimit
));

define('USE_FIREBASE',true);

// HAPPY HOUR MODULE
define('HAPPY_HOUR_TABLE','df_happy_hours');
define('EDIT_HAPPY_HOUR','edit happy hour');
define('ADD_HAPPY_HOUR','add happy hour');
define('DELETE_HAPPY_HOUR','delete happy hour');
define('CODE_ERROR','Mã này đã tồn tại');

define('HAPPY_HOUR_INCOMING',2);
define('HAPPY_HOUR_ACTIVE',3);
define('HAPPY_HOUR_PASSED',4);

define('ORDER_HAPPY_HOUR',0);
define('SERVICE_HAPPY_HOUR',1);
define('PRODUCT_HAPPY_HOUR',2);
define('TREATMENT_HAPPY_HOUR',3);
define('PREPAY_HAPPY_HOUR',4);
define('SERVICE_GROUP_HAPPY_HOUR',5);
define('PRODUCT_GROUP_HAPPY_HOUR',6);
define('BRAND_HAPPY_HOUR',7);

// Form order
define('ADD_FORM_ORDER','add form order');
define('EDIT_FORM_ORDER','edit form order');
define('DELETE_FORM_ORDER','delete form order');
define('TABLE_FORM_ORDER','df_form_order');
define('PRE_CODE_FORM','PO-');
define('FORM_STATUS',-1);

define('MERGE_STATUS',2);


define('MULTIPLE_DB', env('DB_MULTIPLE', false));

if(MULTIPLE_DB){
    define('COMPANY_N',COMPANY_NAME);
}else {
    define('COMPANY_N','');
}
//-- REWARD ACCOUNT
define('TRANSACTION_EARN_TYPE',0);
define('TRANSACTION_PAY_TYPE',1);
define('TRANSACTION_REFUNDED_TYPE',2);
define('ORDER_TYPE',0);
define('PAY_BY_REWARD_ACCOUNT',-3);

// For searching
define('SEARCH_ORDER','0');
define('SEARCH_SERVICE','1');
define('SEARCH_PRODUCT','2');
define('SEARCH_TREATMENT','3');
define('SEARCH_PREPAID','4');
define('SEARCH_CUSTOMER_NAME','5');
define('SEARCH_CUSTOMER_PHONE','6');
define('SEARCH_CUSTOMER_CODE','7');
define('SEARCH_SERVICE_CARD','8');
define('SEARCH_PREPAY_CARD','9');

// For booking
define('MINUTE_TYPE','1');
define('HOUR_TYPE','2');
define('DAY_TYPE','3');
define('MONTH_TYPE','4');
define('YEAR_TYPE','5');

// IP SETTING
define('BLOCK_IP','1');

define('DEFAULT_STATUS', array (
    array(
        "id"            => '0',
        "color"         => "7266BA",
        "status_vie"    => "Chưa xác nhận",
        "status_en"     => "Unconfirmed",
        "priority"      => "6"
    ),
    array(
        "id"            => '1',
        "color"         => "9ACC51",
        "status_vie"    => "Xác nhận",
        "status_en"     => "Confirmed",
        "priority"      => "5"
    ),
    array(
        "id"            => '2',
        "color"         => "FAD733",
        "status_vie"    => "Không đến",
        "status_en"     => "Not come",
        "priority"      => "4"
    ),
    array(
        "id"            => '3',
        "color"         => "F26C4F",
        "status_vie"    => "Hủy",
        "status_en"     => "Cancel",
        "priority"      => "3"
    ),
    array(
        "id"            => '4',
        "color"         => "FA91C8",
        "status_vie"    => "Đã đến",
        "status_en"     => "Arrived",
        "priority"      => "2"
    ),
    array(
        "id"            => '5',
        "color"         => "69CAF7",
        "status_vie"    => "Đặt online",
        "status_en"     => "Online Booking",
        "priority"      => "1"
    )
));

define('DEFAULT_TYPE', array (
    array(
        "id"            => '0',
        "status_vie"    => "Mặc định",
        "status_en"     => "Default",
    ),
    array(
        "id"            => '1',
        "status_vie"    => "Lịch chăm sóc",
        "status_en"     => "Care appointment",
    ),
    array(
        "id"            => '2',
        "status_vie"    => "Lịch liệu trình",
        "status_en"     => "Treatment schedule",
    ),
    array(
        "id"            => '3',
        "status_vie"    => "Lịch điều trị",
        "status_en"     => "Customer treatment",
    )
));

define('REVENUE_SUPPORT',200000000);

define('LOGIN_API_CUSTOMER','login from API by customer');
define('CREATED_BY_APP_USER','-2');
define('FROM_BRAND_APP','-2');
define('MOBA_APP','1');
define('MOMO_APP','1');
define('CHECKIN_APP', 2);
define('ORDER_PROMO', 0);
define('SERVICE_PROMO', 1);
define('PRODUCT_PROMO', 2);
define('TREATMENT_PROMO', 3);
define('SERVICE_CATE_PROMO', 5);
define('PRODUCT_CATE_PROMO', 6);
define('PRODUCT_BRAND_PROMO', 7);

define('MOBA_TREATMENT_TYPE', 'TREATMENT');
define('MOBA_PREPAY_CARD_TYPE', 'PREPAY');
define('MOBA_SERVICE_TYPE', 'SERVICE');
define('MOBA_PRODUCT_TYPE', 'PRODUCT');
define('MOBA_ITEM_FAVORITE_TYPE', 1);
define('MOBA_ITEM_UNFAVORITE_TYPE', 2);

define('PRE_ORDER_NEW_STATUS', 0);
define('PRE_ORDER_SEEN_STATUS', 1);
define('PRE_ORDER_TRANSFERRED_STATUS', 2);

define('CREATED_BY_IMPORT_DATA','-3');
define('NOTIFY_BUILDING_BRAND_APP',1); //1: Notify building brand app

define('TYPE_SOFTWARE','SOFTWARE');
define('TYPE_CLINIC','CLINIC');
define('TYPE_NAILS','NAILS');
define('TYPE_SALON','SALON');
define('TYPE_MOBA','MOBA');
define('TYPE_CHECKIN','CHECKIN');
define('TYPE_BEAUTYX','BEAUTYX');