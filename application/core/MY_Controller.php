<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array("url", "form"));
        $this->load->library(array("form_validation", "session"));
        $this->load->model(array('mnotification','mrole_priviledge','mcompany_contract','msms_config','msms'));
        $this->load->database();
        $this->is_Login();
    }

    public function is_Login()
    {
        if ($this->session->userdata("username") && $this->session->userdata("password")) {
            return TRUE;
        }
        redirect(base_url() . "login");
    }

    function createLink($perPage, $numLink, $url, $total)
    {
        $this->load->library('pagination');
        $config['base_url'] = $url;
        $config['total_rows'] = $total;
        $config['per_page'] = $perPage;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = "<ul class='pagination pagination-sm m-t-none m-b-none'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['num_link'] = $numLink;
        $this->pagination->initialize($config);
        $link = $this->pagination->create_links();
        return $link;
    }

    public function access_right_list(){
        $access_right = array(
            'dashboard'  => array(
                'title'     =>  $this->lang->line('ar_dashboard'),
                'action'    =>  array(
                    'dashboard'     => $this->lang->line('ar_dashboard_dashboard'),
                    'today_board'   => $this->lang->line('ar_dashboard_today_board'),
                    'control_panel' => $this->lang->line('ar_dashboard_control_panel')
                )
            ),
            'manage_user'   => array(
                'title'     =>  $this->lang->line('ar_manage_user'),
                'action'    =>  array(
                    'admin_list'    => $this->lang->line('ar_manage_user_admin_list'),
                    'add_admin'     => $this->lang->line('ar_manage_user_add_admin'),
                    'edit_admin'    => $this->lang->line('ar_manage_user_edit_admin'),
                    'delete_admin'  => $this->lang->line('ar_manage_user_delete_admin'),
                    'member_list'   => $this->lang->line('ar_manage_user_member_list'),
                    'view_member'   => $this->lang->line('ar_manage_user_view_member'),
                    'add_member'    => $this->lang->line('ar_manage_user_add_member'),
                    'edit_member'   => $this->lang->line('ar_manage_user_edit_member'),
                    'delete_member' => $this->lang->line('ar_manage_user_delete_member'),
                    'merge_member'  => $this->lang->line('ar_manage_user_merge_member'),
                    'hide_member_phone' => $this->lang->line('ar_manage_user_hide_member_phone_number'),
                    'staff_list'    => $this->lang->line('ar_manage_user_staff_list'),
                    'add_staff'     => $this->lang->line('ar_manage_user_add_staff'),
                    'edit_staff'    => $this->lang->line('ar_manage_user_edit_staff'),
                    'delete_staff'  => $this->lang->line('ar_manage_user_delete_staff'),
                    'upload_photo'  => $this->lang->line('ar_manage_user_upload_photo'),
                    'edit_commission' => $this->lang->line('ar_manage_user_edit_commission'),
                    'edit_commission_transaction' => $this->lang->line('ar_manage_user_edit_commission_transaction'),
                    'review_list'   => $this->lang->line('ar_manage_user_review_list'),
                    //'limit_member_list' => $this->lang->line('ar_manage_user_limit_member_list'),
                    'edit_records'  => $this->lang->line('ar_manage_user_edit_records'),
                    'pay_salary'   => $this->lang->line('ar_manage_user_pay_salary'),
                )
            ),
            'manage_appointment'  => array(
                'title'     => $this->lang->line('ar_manage_appointment'),
                'action'    =>  array(
                    'appointment_list'  => $this->lang->line('ar_manage_appointment_appointment_list'),
                    // 'view_all_appointment' => $this->lang->line('ar_manage_appointment_view_all_appointment'),
                    'add_appointment'   => $this->lang->line('ar_manage_appointment_add_appointment'),
                    'view_appointment'  => $this->lang->line('ar_manage_appointment_view_appointment'),
                    'edit_appointment'  => $this->lang->line('ar_manage_appointment_edit_appointment'),
                    'delete_appointment'  => $this->lang->line('ar_manage_appointment_delete_appointment'),
                    'reminder'          => $this->lang->line('ar_manage_appointment_reminder'),
                    'delete_status' => $this->lang->line('ar_manage_appointment_delete_appointment_status'),
                    'delete_appointment_type' => $this->lang->line('ar_manage_appointment_delete_appointment_type')
                )
            ),
            'manage_order'  => array(
                'title'     => $this->lang->line('ar_manage_order'),
                'action'    =>  array(
                    'order_list'  => $this->lang->line('ar_manage_order_order_list'),
                    'add_order'   => $this->lang->line('ar_manage_order_add_order'),
                    'view_order'  => $this->lang->line('ar_manage_order_view_order'),
                    'edit_order'  => $this->lang->line('ar_manage_order_edit_order'),
                    'delete_order'  => $this->lang->line('ar_manage_order_delete_order'),
                    'get_staff_commission' => $this->lang->line('ar_manage_order_get_staff_commission'),
                    'view_staff_commission_money' => $this->lang->line('ar_manage_order_view_staff_commission_money'),
                    'update_staff_commission' => $this->lang->line('ar_manage_order_update_staff_commission'),
                    'update_staff_commission_create_order' => $this->lang->line('ar_manage_order_update_staff_commission_when_create_order'),
                    'bed_list'      => $this->lang->line('ar_manage_order_bed_list'),
                    'change_date'   => $this->lang->line('ar_manage_order_change_date'),
                    'change_pttt'   => $this->lang->line('ar_manage_order_change_pttt'),
                    'change_order_date'   => $this->lang->line('ar_manage_order_change_order_date'),
                    'change_payment_value' => $this->lang->line('ar_manage_order_change_payment'),
                    'delete_payment_history' => $this->lang->line('ar_manage_order_delete_payment_history'),
                    'change_discount_money' => $this->lang->line('ar_manage_order_change_discount_money'),
                    'refund_order'  => $this->lang->line('refund'),
                    'edit_reward_money' => $this->lang->line('ar_manage_order_edit_reward_money')
                )
            ),
            'manage_room'  => array(
                'title'     => $this->lang->line('ar_manage_room'),
                'action'    =>  array(
                    'bed_list'  => $this->lang->line('ar_manage_room_bed_list')
                )
            ),
            'manage_sms'  => array(
                'title'     => $this->lang->line('ar_manage_sms'),
                'action'    =>  array(
                    'customer_sms'  => $this->lang->line('ar_manage_sms_customer_sms')
                )
            ),
            'manage_services'  => array(
                'title'     => $this->lang->line('ar_manage_services'),
                'action'    =>  array(
                    'service_list'  => $this->lang->line('ar_manage_services_service_list'),
                    'add_service'   => $this->lang->line('ar_manage_services_add_service'),
                    'view_service'  => $this->lang->line('ar_manage_services_view_service'),
                    'edit_service'  => $this->lang->line('ar_manage_services_edit_service'),
                    'delete_service'  => $this->lang->line('ar_manage_services_delete_service')
                )
            ),
            'manage_product'  => array(
                'title'     => $this->lang->line('ar_manage_product'),
                'action'    =>  array(
                    'product_list'  => $this->lang->line('ar_manage_product_product_list'),
                    'add_product'   => $this->lang->line('ar_manage_product_add_product'),
                    'view_product'  => $this->lang->line('ar_manage_product_view_product'),
                    'edit_product'  => $this->lang->line('ar_manage_product_edit_product'),
                    'delete_product' => $this->lang->line('ar_manage_product_delete_product'),
                    'instock_list'  => $this->lang->line('ar_manage_product_instock_list'),
                    'create_import'  => $this->lang->line('ar_manage_product_add_import'),
                    'edit_import'  => $this->lang->line('ar_manage_product_edit_import'),
                    'delete_import'  => $this->lang->line('ar_manage_product_delete_import'),
                    'change_import_status'  => $this->lang->line('ar_manage_product_change_import_status'),
                )
            ),
            'manage_membership'  => array(
                'title'     => $this->lang->line('ar_manage_membership'),
                'action'    =>  array(
                    'service_card'      => $this->lang->line('ar_manage_membership_service_card'),
                    'add_card'          => $this->lang->line('ar_manage_membership_add_card'),
                    'edit_card'         => $this->lang->line('ar_manage_membership_edit_card'),
                    'delete_card'       => $this->lang->line('ar_manage_membership_delete_card'),
                    'service_card_value'        => $this->lang->line('ar_manage_membership_service_card_value'),
                    'form_service_card_value'   => $this->lang->line('ar_manage_membership_form_service_card_value'),
                    'delete_service_card'       => $this->lang->line('ar_manage_membership_delete_service_card'),
                    //'checkin_card'      => $this->lang->line('ar_manage_membership_checkin_card'),
                    'get_bill_info'     => $this->lang->line('ar_manage_membership_get_bill_info'),
                    'edit_treatment_times'      => $this->lang->line('ar_manage_membership_edit_treatment_times'),
                    'prepay_card'               => $this->lang->line('ar_manage_membership_prepay_card'),
                    'add_prepay_card'           => $this->lang->line('ar_manage_membership_add_prepay_card'),
                    'edit_prepay_card'          => $this->lang->line('ar_manage_membership_edit_prepay_card'),
                    'delete_prepay_card'        => $this->lang->line('ar_manage_membership_delete_prepay_card'),
                    'prepay_card_value'         => $this->lang->line('ar_manage_membership_prepay_card_value'),
                    'add_prepay_card_value'     => $this->lang->line('ar_manage_membership_add_prepay_card_value'),
                    'view_prepay_card_value'    => $this->lang->line('ar_manage_membership_view_prepay_card_value'),
                    'edit_prepay_card_value'    => $this->lang->line('ar_manage_membership_edit_prepay_card_value'),
                    'delete_prepay_card_value'  => $this->lang->line('ar_manage_membership_delete_prepay_card_value'),
                    'change_date'       => $this->lang->line('ar_manage_membership_change_date'),
                    'change_pttt'       => $this->lang->line('ar_manage_membership_change_pttt'),
                    'change_payment_value' => $this->lang->line('ar_manage_membership_change_payment'),
                    'delete_payment_history' => $this->lang->line('ar_manage_membership_delete_payment_history'),
                    'edit_reward_money' => $this->lang->line('ar_manage_membership_edit_reward_money')
                    //'view_use_prepaid_log'      => $this->lang->line('ar_dashboard_index')
                )
            ),
            'manage_happy_hours'  => array(
                'title'     => $this->lang->line('ar_manage_happy_hours'),
                'action'    =>  array(
                    'order_happy_hour' => $this->lang->line('ar_manage_happy_hours_order_happy_hour'),
                    'service_happy_hour' => $this->lang->line('ar_manage_happy_hours_service_happy_hour'),
                    'product_happy_hour' => $this->lang->line('ar_manage_happy_hours_product_happy_hour'),
                    'treatment_happy_hour' => $this->lang->line('ar_manage_happy_hours_treatment_happy_hour'),
                    'prepay_happy_hour' => $this->lang->line('ar_manage_happy_hours_prepay_happy_hour'),
                    'add_order_happy_hour' => $this->lang->line('ar_manage_happy_hours_add_order_happy_hour'),
                    'add_product_happy_hour' => $this->lang->line('ar_manage_happy_hours_add_product_happy_hour'),
                    'add_service_happy_hour' => $this->lang->line('ar_manage_happy_hours_add_service_happy_hour'),
                    'add_treatment_happy_hour' => $this->lang->line('ar_manage_happy_hours_add_treatment_happy_hour'),
                    'add_prepay_happy_hour' => $this->lang->line('ar_manage_happy_hours_add_prepay_happy_hour'),
                    'edit_order_happy_hour' => $this->lang->line('ar_manage_happy_hours_edit_order_happy_hour'),
                    'edit_product_happy_hour' => $this->lang->line('ar_manage_happy_hours_edit_product_happy_hour'),
                    'edit_service_happy_hour' => $this->lang->line('ar_manage_happy_hours_edit_service_happy_hour'),
                    'edit_treatment_happy_hour' => $this->lang->line('ar_manage_happy_hours_edit_treatment_happy_hour'),
                    'edit_prepay_happy_hour' => $this->lang->line('ar_manage_happy_hours_edit_prepay_happy_hour'),
                    'delete_order_happy_hour' => $this->lang->line('ar_manage_happy_hours_delete_order_happy_hour'),
                    'delete_product_happy_hour' => $this->lang->line('ar_manage_happy_hours_delete_product_happy_hour'),
                    'delete_service_happy_hour' => $this->lang->line('ar_manage_happy_hours_delete_service_happy_hour'),
                    'delete_treatment_happy_hour' => $this->lang->line('ar_manage_happy_hours_delete_treatment_happy_hour'),
                    'delete_prepay_happy_hour' => $this->lang->line('ar_manage_happy_hours_delete_prepay_happy_hour')
                )
            ),
            'manage_report'  => array(
                'title'     => $this->lang->line('ar_manage_report'),
                'action'    =>  array(
                    'member_report'     => $this->lang->line('ar_manage_report_member_report'),
                    'service_report'    => $this->lang->line('ar_manage_report_service_report'),
                    'sale_report'       => $this->lang->line('ar_manage_report_sale_report'),
                    'accountant'        => $this->lang->line('ar_manage_report_accountant'),
                    'debt_report'       => $this->lang->line('ar_manage_report_debt_report'),
                    'debt_customer_report'       => $this->lang->line('ar_manage_report_debt_customer_report'),
                    'membership_report' => $this->lang->line('ar_manage_report_membership_report'),
                    'product_report'    => $this->lang->line('ar_manage_report_product_report'),
                    'commission_report' => $this->lang->line('ar_manage_report_commission_report'),
                    'user_level_report' => $this->lang->line('ar_manage_report_user_level_report'),
                    'appointment'       => $this->lang->line('ar_manage_report_appointment'),
                    'point_report'      => $this->lang->line('ar_manage_report_reward_point'),
                    'general_report'      => $this->lang->line('ar_manage_report_general'),
                    'reward_account_report'      => $this->lang->line('ar_manage_report_reward_account_report'),
                    'salary_report'     => $this->lang->line('ar_manage_report_salary_report'),
                )
            ),
            'manage_income_outcome'  => array(
                'title'     => $this->lang->line('ar_manage_income_outcome'),
                'action'    =>  array(
                    'income_outcome_list'  => $this->lang->line('ar_manage_income_outcome_income_outcome_list'),
                    'add_income_outcome'   => $this->lang->line('ar_manage_income_outcome_add_income_outcome'),
                    'edit_income_outcome'  => $this->lang->line('ar_manage_income_outcome_edit_income_outcome'),
                    'delete_income_outcome'  => $this->lang->line('ar_manage_income_outcome_delete_income_outcome'),
                    'type_income_outcome_list'  => $this->lang->line('ar_manage_income_outcome_type_income_outcome_list'),
                    'add_type_income_outcome'  => $this->lang->line('ar_manage_income_outcome_add_type_income_outcome'),
                    'edit_type_income_outcome'  => $this->lang->line('ar_manage_income_outcome_edit_type_income_outcome'),
                    'delete_type_income_outcome'  => $this->lang->line('ar_manage_income_outcome_delete_type_income_outcome'),
                )
            ),
            'manage_category'  => array(
                'title'     => $this->lang->line('ar_manage_category'),
                'action'    =>  array(
                    'service_group_list'    => $this->lang->line('ar_manage_category_service_group_list'),
                    'add_service_group'     => $this->lang->line('ar_manage_category_add_service_group'),
                    'view_service_group'    => $this->lang->line('ar_manage_category_view_service_group'),
                    'edit_service_group'    => $this->lang->line('ar_manage_category_edit_service_group'),
                    'delete_service_group'  => $this->lang->line('ar_manage_category_delete_service_group'),
                    'brand_list'            => $this->lang->line('ar_manage_category_brand_list'),
                    'add_brand'             => $this->lang->line('ar_manage_category_add_brand'),
                    'view_brand'            => $this->lang->line('ar_manage_category_view_brand'),
                    'edit_brand'            => $this->lang->line('ar_manage_category_edit_brand'),
                    'delete_brand'          => $this->lang->line('ar_manage_category_delete_brand'),
                    'product_category_list'     => $this->lang->line('ar_manage_category_product_category_list'),
                    'add_product_category'      => $this->lang->line('ar_manage_category_add_product_category'),
                    'view_product_category'     => $this->lang->line('ar_manage_category_view_product_category'),
                    'edit_product_category'     => $this->lang->line('ar_manage_category_edit_product_category'),
                    'delete_product_category'   => $this->lang->line('ar_manage_category_delete_product_category')
                )
            ),
            'manage_system'  => array(
                'title'     => $this->lang->line('ar_manage_system_'),
                'action'    =>  array(
                    'company_info'      => $this->lang->line('ar_manage_system_company_info'),
                    'user_group'        => $this->lang->line('ar_manage_system_user_group'),
                    'user_group_access' => $this->lang->line('ar_manage_system_user_group_access'),
                    'add_user_group'    => $this->lang->line('ar_manage_system_add_user_group'),
                    'edit_user_group'   => $this->lang->line('ar_manage_system_edit_user_group'),
                    'delete_user_group' => $this->lang->line('ar_manage_system_delete_user_group'),
                    'branch'            => $this->lang->line('ar_manage_system_branch'),
                    //'add_branch'        => $this->lang->line('ar_manage_system_add_branch'),
                    'edit_branch'       => $this->lang->line('ar_manage_system_edit_branch'),
                    //'delete_branch'     => $this->lang->line('ar_manage_system_delete_branch'),
                    'customer_base'     => $this->lang->line('ar_manage_system_customer_base'),
                    'add_customer_base' => $this->lang->line('ar_manage_system_add_customer_base'),
                    'edit_customer_base'    => $this->lang->line('ar_manage_system_edit_customer_base'),
                    'delete_customer_base'  => $this->lang->line('ar_manage_system_delete_customer_base'),
                    'payment_method'    => $this->lang->line('ar_manage_system_payment_method'),
                    'add_payment_method'    => $this->lang->line('ar_manage_system_add_payment_method'),
                    'edit_payment_method'   => $this->lang->line('ar_manage_system_edit_payment_method'),
                    'delete_payment_method' => $this->lang->line('ar_manage_system_delete_payment_method'),
                    'bed_list'      => $this->lang->line('ar_manage_system_bed_list'),
                    'add_bed'       => $this->lang->line('ar_manage_system_add_bed'),
                    'edit_bed'      => $this->lang->line('ar_manage_system_edit_bed'),
                    'delete_bed'    => $this->lang->line('ar_manage_system_delete_bed'),
                    'room_list'     => $this->lang->line('ar_manage_system_room_list'),
                    'add_room'      => $this->lang->line('ar_manage_system_add_room'),
                    'edit_room'     => $this->lang->line('ar_manage_system_edit_room'),
                    'delete_room'   => $this->lang->line('ar_manage_system_delete_room'),
                    'access-branches' => $this->lang->line('ar_manage_system_access'),
                    'ip_blocked'    => $this->lang->line('ar_manage_system_ip_blocked'),
                    'setting'       => $this->lang->line('ar_manage_system_setting'),
                    'customer_level' => $this->lang->line('ar_manage_system_customer_level'),
                    'units'         => $this->lang->line('ar_manage_system_units'),
                    'reward_benefit'         => $this->lang->line('ar_manage_system_reward_benefit'),
                    'notification_setting' => $this->lang->line('ar_manage_system_notification_setting'),
                    'storage_manage' => $this->lang->line('ar_manage_system_storage_manage'),
                    'push_notifications' => $this->lang->line('ar_manage_system_push_notification'),
                )
            ),
            'notification'  => array(
                'title'     => $this->lang->line('ar_notification'),
                'action'    =>  array(
                    'notification_list' => $this->lang->line('ar_notification_notification_list'),
                    'get_notification'  => $this->lang->line('ar_notification_get_notification')
                )
            ),
            'manage_ajax'  => array(
                'title'     => $this->lang->line('ar_manage_ajax'),
                'action'    =>  array(
                    'add_member_note'   => $this->lang->line('ar_manage_ajax_add_member_note'),
                    'edit_member_info'  => $this->lang->line('ar_manage_ajax_edit_member_info')
                )
            ),
            'excel_reader'  => array(
                'title'     => $this->lang->line('ar_excel_reader'),
                'action'    =>  array(
                    'import_customer_list'  => $this->lang->line('ar_excel_reader_import_customer_list'),
                    'import_service_list'   => $this->lang->line('ar_excel_reader_import_service_list'),
                    'import_product_list'   => $this->lang->line('ar_excel_reader_import_product_list'),
                    'import_appointment_list'   => $this->lang->line('ar_excel_reader_import_appointment_list'),
                    'import_service_card'   => $this->lang->line('ar_excel_reader_import_service_card'),
                    'export_customer_list'  => $this->lang->line('ar_excel_reader_export_customer_list'),
                    'export_order_revenue'  => $this->lang->line('ar_excel_reader_export_order_revenue'),
                    'export_mbs_revenue'    => $this->lang->line('ar_excel_reader_export_mbs_revenue'),
                    'export_order_debt'     => $this->lang->line('ar_excel_reader_export_order_debt'),
                    'export_membership_report_detail' => $this->lang->line('ar_excel_reader_export_membership_report_detail'),
                    'export_commission_report'  => $this->lang->line('ar_excel_reader_export_commission_report'),
                    'export_product_list' => $this->lang->line('ar_excel_reader_export_product_list'),
                    'export_service_report' => $this->lang->line('ar_excel_reader_export_service_report'),
                    'export_product_report' => $this->lang->line('ar_excel_reader_export_product_report'),
                    'export_level_report'   => $this->lang->line('ar_excel_reader_export_level_report'),
                    'export_member_report'  => $this->lang->line('ar_excel_reader_export_member_report'),
                    'export_service_list'   => $this->lang->line('ar_excel_reader_export_service_list'),
                    'export_point_report'   => $this->lang->line('ar_excel_reader_export_point_report'),
                    'export_use_prepaid_log' => $this->lang->line('ar_excel_reader_export_use_prepaid_log'),
                    'export_product_instock' => $this->lang->line('ar_excel_reader_export_product_instock'),
                    'export_instock_list'   => $this->lang->line('ar_excel_reader_export_instock_list'),
                    'export_report_appointment' => $this->lang->line('ar_excel_reader_export_report_appointment'),
                    'export_income_outcome_list' => $this->lang->line('ar_excel_reader_export_income_outcome_list'),
                    'export_debt'           => $this->lang->line('ar_excel_reader_export_debt'),
                    'export_staff_commission' => $this->lang->line('ar_excel_reader_export_staff_commission'),
                    'export_order_list'     => $this->lang->line('ar_excel_reader_export_order_list'),
                    'export_debt_customer'     => $this->lang->line('ar_excel_reader_export_debt_customer'),
                    'export_wallet_report'     => $this->lang->line('ar_excel_reader_export_wallet_report'),
                    'export_review_report'     => $this->lang->line('ar_excel_reader_export_review_report'),
                    'export_gr_gi'     => $this->lang->line('ar_excel_reader_export_wallet_report'),
                    'export_general_report'     => $this->lang->line('ar_excel_reader_export_general'),
                    'export_reward_account_report'     => $this->lang->line('ar_excel_reader_export_reward_account_report'),
                    'export_service_report_customer'     => $this->lang->line('ar_excel_reader_export_service_report_customer'),
                    'export_product_report_customer'     => $this->lang->line('ar_excel_reader_export_product_report_customer'),
                    'export_working_time' => $this->lang->line('ar_excel_reader_export_working_time'),
                    'export_review_staff' => $this->lang->line('ar_excel_reader_export_review_staff'),
                    'export_review_order' => $this->lang->line('ar_excel_reader_export_review_order'),
                    'export_review_criteria' => $this->lang->line('ar_excel_reader_export_review_criteria'),
                    //'export_staff_kpi_achieved' => $this->lang->line('ar_excel_reader_export_staff_kpi_achieved'),
                    //'export_setting_staff_kpi' => $this->lang->line('ar_excel_reader_export_setting_staff_kpi'),
                    //'export_compare_staff_kpi' => $this->lang->line('ar_excel_reader_export_compare_staff_kpi'),
                    'export_salary_report' => $this->lang->line('ar_excel_reader_export_salary_report'),
                    'export_staff_list' => $this->lang->line('ar_excel_reader_export_staff_list'),
                )
            ),
            'manage_working_time' => array(
                'title'     => $this->lang->line('ar_manage_working_time'),
                'action'    =>  array(
                    'working_time_list'  => $this->lang->line('ar_manage_working_time_working_time_list'),
                    'change_time_working_time' => $this->lang->line('ar_manage_working_time_change_time_working_time'),
                    'delete_working_time' => $this->lang->line('ar_manage_working_time_delete_working_time')
                )
            ),
            'manage_review' => array(
                'title'     => $this->lang->line('ar_manage_review'),
                'action'    =>  array(
                    'review_list'  => $this->lang->line('ar_manage_review_review_list'),
                    'review_list_option'  => $this->lang->line('ar_manage_review_review_list_option')
                )
            ),
            'manage_point'   => array(
                'title'     =>  $this->lang->line('ar_manage_reward_point'),
                'action'    =>  array(
                    'member_point_list' => $this->lang->line('ar_manage_reward_point_list'),
                    'delete_point'  => $this->lang->line('ar_manage_reward_point_delete'),
                    'point_setup'   => $this->lang->line('ar_manage_reward_point_list_setting'),
                    'point_setup_form' => $this->lang->line('ar_manage_reward_point_add_update'),
                    'point_history' => $this->lang->line('ar_manage_reward_point_history')
                )
            ),
            'manage_process'    => array(
                'title' => $this->lang->line('ar_manage_progress'),
                'action' => array(
                    'process' => $this->lang->line('ar_manage_progress_list')
                )
            ),
            'manage_promotions' => array(
                'title' => $this->lang->line('ar_promotions'),
                'action'    =>  array(
                    'promotions_code_list' => $this->lang->line('ar_manage_promotions_code_list'),
                    'add_promotions' => $this->lang->line('ar_manage_add_promotions'),
                    'edit_promotions' => $this->lang->line('ar_manage_edit_promotions'),
                    'delete_promotions_code' => $this->lang->line('ar_manage_delete_promotion_code'),
                    'promotions_type_list' => $this->lang->line('ar_manage_promotions_type_list'),
                    'delete_promotions_type' => $this->lang->line('ar_manage_delete_promotions_type')
                )
            ),
//            'manage_asset' => array(
//                'title'     => $this->lang->line('asset_management'),
//                'action'    => array(
//                    'asset_list'    => $this->lang->line('ar_manage_asset_asset_list'),
//                    'add_asset'     => $this->lang->line('ar_manage_asset_add_asset'),
//                    'edit_asset'    => $this->lang->line('ar_manage_asset_edit_asset'),
//                    'delete_asset'  => $this->lang->line('ar_manage_asset_delete_asset')
//                )
//            ),
//            'manage_dashboard_news' => array(
//                'title'     => $this->lang->line('ar_manage_dashboard_news'),
//                'action'    => array(
//                    'dashboard_news_list'    => $this->lang->line('ar_manage_dashboard_news_dashboard_news_list'),
//                    'add_dashboard_news'     => $this->lang->line('ar_manage_dashboard_news_add_dashboard_news'),
//                    'edit_dashboard_news'    => $this->lang->line('ar_manage_dashboard_news_edit_dashboard_news'),
//                    'delete_dashboard_news'  => $this->lang->line('ar_manage_dashboard_news_delete_dashboard_news')
//                )
//            ),
            'manage_worktime'   => array(
                'title'     =>  $this->lang->line('ar_manage_worktime'),
                'action'    =>  array(
                    'work_time'     => $this->lang->line('ar_manage_worktime_work_time'),
                    'add_worktime'  => $this->lang->line('ar_manage_worktime_add_worktime'),
                    'edit_worktime' => $this->lang->line('ar_manage_worktime_edit_worktime'),
                    'delete_worktime' => $this->lang->line('ar_manage_worktime_delete_worktime'),
                    'add_date_off' => $this->lang->line('ar_manage_worktime_add_date_off'),
                    'edit_date_off' => $this->lang->line('ar_manage_worktime_edit_date_off'),
                    'delete_date_off' => $this->lang->line('ar_manage_worktime_delete_date_off'),
                )
            ),
//            'manage_kpi'  => array(
//                'title'     =>  $this->lang->line('ar_manage_kpi'),
//                'action'    =>  array(
//                    'criteria_kpi'              => $this->lang->line('arr_manage_kpi_criteria_kpi'),
//                    'setting_staff_kpi'         => $this->lang->line('arr_manage_kpi_setting_staff_kpi'),
//                    'edit_staff_kpi'            => $this->lang->line('arr_manage_kpi_edit_staff_kpi'),
//                    'add_staff_kpi'             => $this->lang->line('arr_manage_kpi_add_staff_kpi'),
//                    'change_status_criteria'    => $this->lang->line('arr_manage_kpi_change_status_criteria_kpi'),
//                    'compare_staff_kpi'         => $this->lang->line('arr_manage_kpi_compare_staff_kpi'),
//                )
//            ),
        );
        $company_contract = $this->mcompany_contract->get_data(1);
        if($company_contract['use_moba_app']){
            $access_right['app_management'] = array(
                'title'     =>  $this->lang->line('app_management'),
                'action'    =>  array(
                    'password_setting' => $this->lang->line('password_setting'),
                    'app_management' => $this->lang->line('app_mng')
                )
            );
        }
        return $access_right;
    }

    public function access_notification_list(){
        $access_right = array(
            NOTIFICATION_TYPE_REVIEW => array(
                'title' => $this->lang->line('customer_review'),
            ),
            NOTIFICATION_TYPE_BOOKING => array(
                'title' => $this->lang->line('booking_online_1'),
            ),
            NOTIFICATION_TYPE_APPOINTMENT => array(
                'title' => $this->lang->line('create_update_appointment'),
            ),
            NOTIFICATION_TYPE_ORDER_SALE => array(
                'title' => $this->lang->line('pay_order_service_card'),
            ),
            INVENTORY_BRANCH_TRANSFER => array(
                'title' => $this->lang->line('inventory_branch_transfer'),
            ),
            NOTIFICATION_TYPE_OUT_OF_STOCK => array(
                'title' => $this->lang->line('product_out_of_stock'),
            ),
            NOTIFICATION_TYPE_EXPIRY_WARNING => array(
                'title' => $this->lang->line('product_expiry'),
            ),
            NOTIFICATION_TYPE_STAFF_RECEIVE_COMMISSION => array(
                'title' => $this->lang->line('staff_receive_commission'),
            )
        );
        return $access_right;
    }

    public function access_ip_setting_list(){
        $access_right = array(
            BLOCK_IP => array(
                'title' => $this->lang->line('block_ip'),
            )
        );
        return $access_right;
    }

    public function check_access($controller, $action){
        $user_id = $this->session->userdata('user_id');
        if ($user_id == ROOT_ADMIN_ID) {
            if($controller == 'manage_user' && $action == 'limit_member_list') return false;
            elseif($controller == 'manage_user' && $action == 'hide_member_phone') return false;
            else return true;
        }
        else{
            $result = false;
            $user_group = $this->session->userdata('user_group_id');
            $user_group_id_list = array_filter(explode('|',$user_group));

            $access_right = array();
            foreach($user_group_id_list as $key => $user_group_id){
                $access_right = $this->mrole_priviledge->get_data_from_user_group_id($user_group_id);
                if(isset($access_right) && count($access_right) > 0){
                    $access_right['priviledge'] = (array)json_decode($access_right['priviledge']);
                    if (array_key_exists($controller, $access_right['priviledge'])) {
                        if (in_array($action, $access_right['priviledge'][$controller])) {
                            return true;
                        }
                    }
                }
            }
            return $result;
        }
    }
}

