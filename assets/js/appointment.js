/**
 * on 11/8/17.
 */
$(function(){

    $('.clear_btn').click(function(){
        reset_modal();
    });

    $('.delete_btn').click(function(){
        delete_appointment();
    });

    $('.save_btn').click(function(){
        TYPE_EDIT = 1;
        if (CLICK_MODE == 0){
            create_appointment();
        }
        else if (CLICK_MODE == 1) {
            update_appointment();
        }else if (CLICK_MODE == 2) { //CREATE NEW APPOINTMENT WITHOUT SELECT ON FULLCALENDAR
            create_appointment_without_select();
        }
    });

    $('.save_setting_btn').click(function(){
        $(this).attr('disabled','disabled');
        $('#setting_appointment_form').submit();
    });
});

function save_appointment_setting(){
    var apt_view = 0;
    var selected = $("input[type='radio'][name='apt_view[]']:checked");
    if (selected.length > 0) {
        apt_view = selected.val();
    }
    var ckb_dbs = $('#day_view_by_staff').is(':checked') ? 1 : 0;
    $.ajax({
        url: BASE_URL+"ManageAppointment/setting",
        type: "post",
        dataType: 'json',
        data: {
            save_appointment_setting: 'yes',
            apt_open_time:$('#apt_open_time').val(),
            apt_close_time:$('#apt_close_time').val(),
            apt_slot_duration:$('#apt_slot_duration').val(),
            apt_view:apt_view,
            apt_setting_staff:remove_duplicate_value_in_array($('#setting_appointment_staff_id_assigned').val()),
            day_view_by_staff:ckb_dbs
        },
        success: function (data) {
            if (typeof(data) == 'object' && data.status == 'ok') {
                location.reload();
            } else {
                alert(data.message);
                $('.save_setting_btn').removeAttr('disabled');
            }
        }
    });
    return;
}

function generate_staff_list_setting(staff_assign = null){
    $('#setting_appointment_staff_id_assigned').select2("val",null);
    $('#setting_appointment_staff_id_assigned').prop('disabled',true);
    $.ajax({
        url :  BASE_URL+"ManageAjax/get_staffs_list_appointment_setting",
        type: "get",
        dataType : "json",
        success: function (data){
            if(typeof(data) == 'object') {
                data_obj = data.data
                $('#setting_appointment_staff_id_assigned').empty();
                $.each(data_obj,function(key,value){
                    let opt_group = $('<optgroup>',{label: key})
                    $('#setting_appointment_staff_id_assigned').append(opt_group)
                    $.each(value,function(key2,value2){
                        let newOption = new Option(value2.fullname,value2.uid,false,false);
                        opt_group.append(newOption);
                    })

                })
                if (data.staff_uids_hide != null && data.staff_uids_hide.length > 0) {
                    $('#setting_appointment_staff_id_assigned').select2('val',remove_duplicate_value_in_array(data.staff_uids_hide));
                }
            }
            $('#setting_appointment_staff_id_assigned').prop('disabled',false);
        }
    })
}

function generate_staff_list_by_branch(staff_assign = null){
    let select = $('.appointment_branch').find(':selected');
    $('#appointment_staff_id_assigned').prop('disabled',true);
    $.ajax({
        url :  BASE_URL+"ManageAjax/get_staffs_based_on_branch",
        type: "get",
        dataType : "json",
        data : {
            branch_id : select.val(),
            date_time: $('#apt_date_time').val(),
            check_staff: CHECK_STAFF
        },
        success: function (data){
            if(typeof(data) == 'object') {
                data_obj = data.data
                $('#appointment_staff_id_assigned').empty();
                $.each(data_obj,function(key,value){
                    let opt_group = $('<optgroup>',{label: key})
                    $('#appointment_staff_id_assigned').append(opt_group)
                    $.each(value,function(key2,value2){
                        let newOption = new Option(value2.fullname,value2.uid,false,false);
                        opt_group.append(newOption);
                    })

                })
                if (staff_assign != null && staff_assign.length > 0) {
                    let staff_assign_ar = remove_duplicate_value_in_array(staff_assign)
                    $('#appointment_staff_id_assigned').select2('val',staff_assign_ar);
                }
                if (data.duplicate_time_staff != null && (data.duplicate_time_staff).length > 0) {
                    for (let i = 0; i < (data.duplicate_time_staff).length; i++) {
                        if (data.duplicate_time_staff[i].workday_status == 0) {
                            $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]').addClass('staff_time_color');
                            let attribute = $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]')[0].hasAttribute('duplicate');
                            if (!attribute) {
                                $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]').attr('duplicate',true)
                            }
                        } else {
                            $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]').addClass('staff_time_color');
                            if ($('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]')[0]) {
                                let duplicate_staff = $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]')[0].hasAttribute('duplicate_staff');
                                if (!duplicate_staff) {
                                    $('#appointment_staff_id_assigned option[value="' + data.duplicate_time_staff[i].uid + '"]').attr('duplicate_staff',true)
                                }
                            }
                        }
                    }
                }
            }
            $('#appointment_staff_id_assigned').prop('disabled',false);
        }
    })
}

function remove_duplicate_value_in_array(arr){
    let removeDuplicate = new Set(arr);
    let new_arr = [...removeDuplicate];
    return new_arr;
}

function generate_service_list_by_branch(service_assign = null){
    let select = $('.appointment_branch').find(':selected');
    $('#appointment_service_id_assigned').prop('disabled',true);
    $.ajax({
        url :  BASE_URL+"ManageAjax/get_services_based_on_branch",
        type: "get",
        dataType : "json",
        data : {
            branch_id : select.val()
        },
        success: function (data){
            if(typeof(data) == 'object') {
                data_obj = data.data
                $('#appointment_service_id_assigned').empty();
                $.each(data_obj,function(key,value){
                    let opt_group = $('<optgroup>',{label: key})
                    $('#appointment_service_id_assigned').append(opt_group)
                    $.each(value,function(key2,value2){
                        let newOption = new Option(value2.service_name,value2.id,false,false);
                        opt_group.append(newOption);
                    })

                })
                if (service_assign != null && service_assign.length > 0) {
                    $('#appointment_service_id_assigned').select2('val',service_assign);
                }
            }
            $('#appointment_service_id_assigned').prop('disabled',false);
        }
    })
}

function reset_modal() {
    $('#quick_link').hide();
    $('#title').val('');
    $('#input_cus_name').val('');
    $('#input_cus_phone').val('');
    $('#input_cus_phone_hidden').val('');
    $('#input_cus_email').val('');
    $('#customer_list_mbs').select2("val", null);
    $(".select-appointment-staff").select2("val", null);
    $(".select-appointment-service").select2("val", null);
    $('#apt_date_time').data('DateTimePicker').clear();
    $('#apt_date_time').data('DateTimePicker').show();
    $("input[type='radio'][name='apt_status[]']").prop('checked', false);
    $("input[type='checkbox'][name='apt_type[]']").prop('checked', false);
    $('.apt-label').empty();
    $('.apt-label').fadeOut(0);
    $('#appointment_staff_assigned').empty();
    $('#apt_date_time').data('DateTimePicker').hide();
    $('#sex').val('');
    $('#birthday').val('');
    $('#job').val('');
    $('#address').val('');
    $('#facebook').val('');
    $('#province').select2().val('').trigger('change');
    $('#btn_show_modal_customer').addClass('hide');
    $('#btn_add_new_customer').removeClass('hide');
    $('#btn_add_new_customer').removeClass('active');
    $('.new-customer-info').hide();
    $('.replication_btn').addClass('hide');
    $('.repeat').hide();
    $('.btn-repeat').hide();
    $('#apt_step').val('');
    $('#apt_times').val('');
    $("input[type='checkbox'][name='repeat']").prop('checked', false);
}

function assign_appointment_staff() {
    var staff_assign = $('#appointment_staff_id_assigned').val();

    var str = '';
    if (staff_assign != null && staff_assign.length > 0) {
        staff_assigned = staff_assign;
    }else {
        var staff_assigned = $('#appointment_staff_id_assigned').val();
    }
    staff_assigned_arr = remove_duplicate_value_in_array(staff_assigned)
    if (staff_assigned_arr != null && staff_assigned_arr.length > 0) {
        for (var i = 0; i < staff_assigned_arr.length; i++) {
            for (var j = 0; j < staff_list.length; j++) {
                if (staff_assigned_arr[i] == staff_list[j].id) {
    
                    str += '<span class="m-r-xs text-center text-xs inline m-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+staff_list[j].fullname+'">';
                    if (staff_list[j].image != '')
                        str += '    <img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30 m-r-xs"/>';
                    else
                        str += '    <img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30 m-r-xs"/>';
                    str += '    <br>'+staff_list[j].fullname;
                    str += '</span>';

                    break;
                }
            }
        }
    }
    $('#appointment_staff_assigned').empty().append(str);
}