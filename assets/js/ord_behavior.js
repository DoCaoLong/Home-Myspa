$(function(){
	$('.select-staff').change(function(){
        assign_staff();
    });
    if($(window).width() <= 1024){
        $('div.select-staff,div.select-bed,div.select-service-staff').find('.select2-input').attr('readonly',true);
    }


    $('#ord_date').datetimepicker({
        sideBySide: true,
        format: 'DD/MM/YYYY HH:mm:ss',
        locale: moment.locale(moment_locale),
    });

    $('#date_start_ht').datetimepicker({
        sideBySide: true,
        format: 'DD/MM/YYYY',
        locale: moment.locale(moment_locale),
    });

    $('#modal_refund .btn-refund').on('click',function(){
        sid             = $('#sid_refund').val();
        type            = $('#type_refund').val();
        duplicate       = $('#dup_refund').val();
        refund_money    = un_format_money($('#money_refund').val());
        refund_date     = $('#date_start_ht').val();
        branch_id       = $('#branch_id').val();
        refund_to_prepay_card = $('#refund_to_prepay_card').is(':checked')?1:0;
        $.ajax({
            url      : BASE_URL+"ManageOrder/refund_order",
            type     : "post",
            dataType : 'json',
            data     : {
                sid: sid,
                type: type,
                duplicate: duplicate,
                refund_money: refund_money,
                refund_date: refund_date,
                branch_id: branch_id,
                refund_to_prepay_card: refund_to_prepay_card
            },
            success  : function(data){
                if(data.status == 'ok'){
                    ORDER_REMAIN += refund_money;
                    append_payment_history(data.payment);
                    prepaid_list.push(data.payment);
                    Notify(data.message);
                }else{
                    Notify(data.message, 'warning');
                }
            },
            error    : function(error){
                console.log(error);
            }
        });
    });

    // Load customer details
    $('#btn_show_modal_customer').click(function(){
        load_customer_detail(true);
    });

    $('').click(function(){
        $('.new-customer-info').slideDown(500);
    });

    $('#btn_add_new_customer').on("click", function(){
        $(this).toggleClass('active').promise().done(function(){
            if($(this).hasClass('active')) $('.new-customer-info').slideDown(500);
            else $('.new-customer-info').slideUp(500);
        });
    });

    // Save set service attrition product
    $('.service_attrition_product_save_btn').click(function(){
        set_order_attrition_product();
        $('#modal_attrition_product').modal('hide');
    });

    // Search Service
    $('#search_service_id').on("change",function(){
        var sid = $(this).val();
        var element = $('#tab_1 ul.list-services > li[value = "'+sid+'"]');
        calculate_order(element,'plus');
    });
    // Search Product
    $('#search_product_id').on("change",function(){
        var pid = $(this).val();
        var element = $('#tab_pro_1 ul.list-products > li[value = "'+pid+'"]');
        calculate_order(element,'plus');
    });
    // SERVICE_CARD
    $('#search_card_id').on("change",function(){
        var cid = $(this).val();
        if(cid[0]=='c'){
            var element = $('ul.list-service-cards > li[value = "'+cid.substr(1)+'"]');
        }else{
            var element = $('ul.list-prepay-cards > li[value = "'+cid.substr(1)+'"]');
        }
        calculate_order(element,'plus');
    });
    $('.list-service-cards > li').click(function(){
        var element = $(this);
        calculate_order(element,'plus');
    });
    $('.list-prepay-cards > li').click(function(){
        var element = $(this);
        calculate_order(element,'plus');
    });


    // SERVICE

    $('.list-services > li').click(function(){
        var element = $(this);
        calculate_order(element,'plus');
    });
    $('.list-services > li > .group-btn > .btn-danger').click(function(){
        var element = $(this).parent().parent();
        calculate_order(element,'delete');
    });

    $('#input_cus_name').change(function(){
        $('#cus_name').empty().append($('#input_cus_name').val());
    });
    $('#input_cus_phone').change(function(){
        $('#input_cus_phone_hidden').val($('#input_cus_phone').val());
        $('#cus_phone').empty().append($('#input_cus_phone').val());
    });
    $('#input_cus_email').change(function(){
        $('#cus_email').empty().append($('#input_cus_email').val());
    });
    $('#input_coupon_code').change(function(){
        $('#coupon_code').empty().append($('#input_coupon_code').val());
    });

    $('#bed_id').on('change',function(){
        update_payment();
    });

    //  ORDER SMS
    $('#ckb_sms').change(function(){
        var ckb_sms = $('#ckb_sms').is(':checked') ? 1 : 0;
        update_order_sms(ckb_sms,1);
    });

    // PRODUCT
    $('.list-products > li').click(function(){
        var element = $(this);
        calculate_order(element,'plus');
    });
    $('.list-products > li > .group-btn > .btn-danger').click(function(){
        var element = $(this).parent().parent();
        calculate_order(element,'delete');
    });
    // END ORDER

    $(window).resize(function() {
        if($(window).width() < 576) {
            $('.logo').css('position','relative', 'important');
            $('.logo').css('text-align','center', 'important');
            $('.logo').css('margin-bottom','10px', 'important');
            $('.logo').addClass('col-xs-12');
        }else{
            $('.logo').css('position','absolute', 'important');
            $('.logo').css('margin-bottom','0px', 'important');
            $('.logo').css('text-align','left', 'important');
        }
    }).resize();
});

function makeup_bill() {
    $('#order_print .tbl-order tbody tr').each(function(){
        var html = $(this).html();
        alert(html);
        //$(this).find('td:first-child').attr('colspan',4);
    });
}

$(document).on('change',`[name="payment_method_id[]"]`,function() {
    update_reward_tab();
})

const update_order_payment = (payment_id = -1, type = 2) => { // 1 means changed remain, 2 means changed value
    sum_order = ORDER_REMAIN;
    total_payment = 0;
    $('.payment-method').each(function(){
        id = $(this).find(`[name="payment_method_value[]"]`).attr('id');
        payment_method = $(this).find(`[name="payment_method_id[]"]`).val();
        current_id = id.split('_').slice(-1);
        if(payment_id < 0){
            payment_value = un_format_money($(`#payment_method_value_${current_id}`).val());
            payment_value = payment_value < 0 ? 0 : payment_value;
            total_payment += payment_value;
            if(sum_order - total_payment >= 0){
                if($(this).is(":last-child")){
                    if(!ORDER_PAID && AUTOFILL){
                        $(`#payment_method_value_${current_id}`).val(format_currency(sum_order - total_payment + payment_value));
                        $(`#payment_method_remain_${current_id}`).val(0);
                    }else{
                        $(`#payment_method_value_${current_id}`).val(format_currency(payment_value));
                        $(`#payment_method_remain_${current_id}`).val(format_currency(sum_order - total_payment));
                    }
                    
                }else
                    $(`#payment_method_remain_${current_id}`).val(format_currency(sum_order - total_payment));
            }
            else{
                $(`#payment_method_value_${current_id}`).val(format_currency(payment_value + sum_order - total_payment));
                $(`#payment_method_remain_${current_id}`).val(0);
                total_payment = sum_order;
            }
        }
        else{
            if(payment_id == current_id){
                if(type == 1){
                    // Edit remain money
                    remain = un_format_money($(`#payment_method_remain_${current_id}`).val());
                    if(remain + total_payment > sum_order){
                        remain = sum_order - total_payment;
                        $(`#payment_method_remain_${current_id}`).val(format_currency(remain));
                    }
                    total_paid = sum_order - remain;
                    $(`#payment_method_value_${current_id}`).val(format_currency(total_paid - total_payment));
                    total_payment = total_paid;
                }else{
                    // Edit value
                    paid = un_format_money($(`#payment_method_value_${current_id}`).val());
                    if(paid + total_payment > sum_order){
                        paid = sum_order - total_payment;
                        $(`#payment_method_value_${current_id}`).val(format_currency(paid));
                    }
                    total_payment += paid;
                    $(`#payment_method_remain_${current_id}`).val(format_currency(sum_order - total_payment));
                }
            }else if(current_id > payment_id){
                paid = un_format_money($(`#payment_method_value_${current_id}`).val());
                total_payment += paid;
                if(sum_order - total_payment > 0)
                    $(`#payment_method_remain_${current_id}`).val(format_currency(sum_order - total_payment));
                else{
                    paid = paid + sum_order - total_payment;
                    $(`#payment_method_value_${current_id}`).val(format_currency(paid));
                    $(`#payment_method_remain_${current_id}`).val(0);
                    total_payment = sum_order;
                }
            }else{
                total_payment += un_format_money($(`#payment_method_value_${current_id}`).val());
            }
        }

        
    });

    update_reward_tab();

    
    
}

function update_reward_tab() {
    
    current_total_payment_reward = 0;
    total_payment_method_reward = 0;
    total_payment_reward = 0;

    $('.payment-method').each(function(){
        id = $(this).find(`[name="payment_method_value[]"]`).attr('id');
        payment_method = $(this).find(`[name="payment_method_id[]"]`).val();
        current_id = id.split('_').slice(-1);
        if(payment_method != -1 && payment_method != -3) {
            payment_reward_value = un_format_money($(`#payment_method_value_${current_id}`).val());
            payment_reward_value = payment_reward_value < 0 ? 0 : payment_reward_value;
            total_payment_reward += payment_reward_value;
            total_payment_method_reward += 1;
        }
    })
    let changed_paid_reward_total = 0;
    $('.payment_his_prepay').each(function(i,e) {

        let _this = $(e);
        let payment_method = _this.closest('tr').find('select.payment_method_history').val();
        if(payment_method != -1 && payment_method != -3 ) {
            changed_paid_reward_total += refresh_value(_this.val())
        }
    })
    current_total_payment_reward = total_payment_reward + changed_paid_reward_total;
    $(document).find('#total_pay_money_value').text(format_currency(current_total_payment_reward)).attr('title',format_currency(current_total_payment_reward))
    $('.input_inreward').trigger('input')
    generate_referral_money();
    generate_referral_total();
}



function calculate_card(action_id,item_id,duplicate){
    if(ORDER_PAID){
        Notify(lang['edit_order_error_msg'],'danger');
        return;
    }
    var deleted = false;
    var same_item = false;
    for(var i = 0; i< service_arr.length; i++){
        if(service_arr[i].s_id == item_id && service_arr[i].type == 3 && service_arr[i].dup_count == duplicate){
            switch(action_id){
                case 1:// plus
                    // Get last same card
                    let max_dup_count = 0;
                    for(j = service_arr.length - 1; j >= 0; j-- ){
                        if(service_arr[j].s_id == item_id && service_arr[j].type == 3){
                            // Clone this card with increased dup_count
                            service_arr.splice(j + 1, 0 , { ...service_arr[i], dup_count: service_arr[j].dup_count + 1 });
                            break;
                        }
                    }
                    generate_order();
                    return;
                case 2:// minus
                    if(service_arr[i].s_quantity == 1){
                        // delete staff_commission first
                        for(var j = 0;j <service_staff_commissions.length;j++){
                            if(service_arr[i].s_id == service_staff_commissions[j].sid && service_staff_commissions[j].type == 3 && service_arr[i].dup_count == service_staff_commissions[j].ord_detail_id){
                                service_staff_commissions.splice(j,1);
                                j--;
                            }
                        }
                        // Now delete item
                        service_arr.splice(i,1);
                        i--;
                        deleted = true;
                    }else{
                        service_arr[i].s_quantity = parseInt(service_arr[i].s_quantity) - 1;
                    }
                case 3:// delete
                    // delete staff_commission first
                    for(var j = 0;j <service_staff_commissions.length;j++){
                        if(service_arr[i].s_id == service_staff_commissions[j].sid && service_staff_commissions[j].type == 3 && service_arr[i].dup_count == service_staff_commissions[j].ord_detail_id){
                            service_staff_commissions.splice(j,1);
                            j--;
                        }
                    }
                    // Now delete item
                    service_arr.splice(i,1);
                    i--;
                    deleted = true;
            }
            if(!deleted){
                // re-calculate total money, only work for single service treatment
                if(service_arr[i].use_service_card == 0){
                    if (service_arr[i].s_special_price && service_arr[i].s_special_price >= 0 && (!service_arr[i].unlimited)) {
                        service_arr[i].s_discount  = parseFloat(service_arr[i].s_price) - parseFloat(service_arr[i].s_special_price);
                        service_arr[i].s_discount  = parseFloat(service_arr[i].s_discount) * service_arr[i].s_quantity*(service_arr[i].times?service_arr[i].times:1);
                    }
                    service_arr[i].s_price = parseFloat(un_format_money($('#item_price_'+service_arr[i].s_id+'_'+service_arr[i].type+'_'+service_arr[i].dup_count).val()));
                    service_arr[i].s_total = (parseFloat(service_arr[i].s_price) * service_arr[i].s_quantity * (service_arr[i].times?service_arr[i].times:1)) - parseFloat(service_arr[i].s_discount);
                }
            }
        }else if(service_arr[i].s_id == item_id && service_arr[i].type == 3 && service_arr[i].dup_count != duplicate){
            same_item = true;
        }
    }
    if(deleted && !same_item)
        $(`.list-service-cards>li[value=${item_id}]`).removeClass('active');
    generate_order();
}

function update_service_card(element, item_id, type, duplicate, action){
    if(ORDER_PAID){
        Notify(lang['edit_order_error_msg'],'danger');
        return;
    }
    for(var i = 0; i< service_arr.length;i++){
        if(service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate){
            var price_changed = true;
            var quantity_changed = 0;
            switch(action){
                case 'change_type': // switch between service and service_as_service_card
                    // Re-init dup_count value
                    service_arr[i].dup_count = 0;
                    // Change dup_count because you changed type
                    for(var j = service_arr.length-1; j>=0; j--){
                        if(service_arr[j].s_id == service_arr[i].s_id && service_arr[j].type == ((type==3)?1:3)){
                            service_arr[i].dup_count = service_arr[j].dup_count + 1;
                        }
                    }
                    // Change type
                    service_arr[i].type = ((type==3)?1:3);
                    set_attrition_product(service_arr[i].s_id,service_arr[i].dup_count);
                    // Change type of corresponding staff_commission (if have)
                    for(var j = 0;j<service_staff_commissions.length;j++){
                        if(service_staff_commissions[j].sid == service_arr[i].s_id && service_staff_commissions[j].type == type && service_staff_commissions[j].ord_detail_id == duplicate){
                            service_staff_commissions[j].type = ((type==3)?1:3);
                            service_staff_commissions[j].ord_detail_id = service_arr[i].dup_count;
                        }
                    }
                    service_arr[i].times = 1;
                    service_arr[i].promotion = 0;
                    service_arr[i].unlimited = 0;
                    break;
                case 'unlimited':
                    service_arr[i].unlimited = 1;
                    price_changed = false;
                    break;
                case 'limited':
                    service_arr[i].unlimited = 0;
                    service_arr[i].times = 1;
                    service_arr[i].promotion = 0;
                    break;
                case 'plus_num_use':
                    service_arr[i].times = parseInt(service_arr[i].times) + 1;
                    quantity_changed = 1;
                    break;
                case 'minus_num_use':
                    if(service_arr[i].times > 1) service_arr[i].times -= 1;
                    quantity_changed = -1;
                    break;
                case 'assign_num_use':
                    quantity = element.value;
                    if(Number.isInteger(parseInt(quantity)) && quantity > 0) {
                        quantity_changed = quantity - service_arr[i].times;
                        service_arr[i].times = quantity;
                    }
                    break;
                case 'plus_promo':
                    service_arr[i].promotion = parseInt(service_arr[i].promotion) + 1;
                    price_changed = false;
                    break;
                case 'minus_promo':
                    if(service_arr[i].promotion > 0) service_arr[i].promotion -= 1;
                    price_changed = false;
                    break;
                case 'assign_promo':
                    quantity = element.value;
                    if(Number.isInteger(parseInt(quantity)) && quantity > 0) service_arr[i].promotion = quantity;
                    price_changed = false;
                    break;
                case 'assign_expiry':
                    expired_date = element.value;
                    service_arr[i].expired_date = expired_date;
                    price_changed = false;
                    break;
            }
            // re-calculate total money
            if(price_changed){
                let no_promo = true;
                if(typeof order_obj.coupon_code !== 'undefined' && order_obj.coupon_code !== ''){
                    order_obj.promotion_value.forEach(v => {
                        if(type == 3 && v.type == 1 && v.item_list.includes(item_id)){ // Change from service card to service, so we update discount depending on promotion program
                            service_arr[i].s_discount_unit = v.discount_unit;
                            service_arr[i].s_discount = v.discount_unit == '%' ? v.value : (v.value*s_quantity);
                            no_promo = false;
                        }
                    });
                }
                if(no_promo){
                    // Init discount
                    service_arr[i].s_discount = 0;
                    service_arr[i].s_discount_unit = BASE_CURRENCY_SYMBOL;
                    if(service_arr[i].s_happy_h_code !== null && service_arr[i].s_happy_h_code != '-1' && (!service_arr[i].unlimited)){ // Update discount due to happy hour price
                        service_arr[i].s_discount_unit = $(`#tab_1 ul.list-services>li[value=${item_id}]`).find(`.s-happy_h-unit`).text();
                        service_arr[i].s_discount  = (service_arr[i].s_discount_unit == '%') 
                                                    ? 100 - parseFloat(service_arr[i].s_happy_h_price)/parseFloat(service_arr[i].s_price)*100 
                                                    : (parseFloat(service_arr[i].s_price) - parseFloat(service_arr[i].s_happy_h_price))
                                                    * service_arr[i].s_quantity*(service_arr[i].times?service_arr[i].times:1);
                    }else{ // Update discount due normally
                        if (service_arr[i].s_special_price >= 0 && (!service_arr[i].unlimited)) {
                            service_arr[i].s_discount  = parseFloat(service_arr[i].s_price) - parseFloat(service_arr[i].s_special_price);
                            service_arr[i].s_discount  = parseFloat(service_arr[i].s_discount) * service_arr[i].s_quantity*(service_arr[i].times?service_arr[i].times:1);
                        }
                    }
                }
                service_arr[i].s_price = parseFloat(un_format_money($('#item_price_'+service_arr[i].s_id+'_'+type+'_'+duplicate).val()));
                service_arr[i].s_total = service_arr[i].s_discount_unit == '%' 
                                        ? (parseFloat(service_arr[i].s_price) * service_arr[i].s_quantity * (service_arr[i].times?service_arr[i].times:1))*(100-parseFloat(service_arr[i].s_discount))/100
                                        : (parseFloat(service_arr[i].s_price) * service_arr[i].s_quantity * (service_arr[i].times?service_arr[i].times:1)) - parseFloat(service_arr[i].s_discount);
                update_commission_order(item_id, service_arr[i].type, service_arr[i].dup_count, quantity_changed);
            }
        }
    }
    generate_order();
}

 // Some how we got another checkin_submit in view_member_ajax and our popover btns are calling that function, so i rename this one
function card_checkin_submit(card_id,type, show = '') {
    order_detail_id = 0;
    for(var i = 0; i< service_card.length;i++){
        if(service_card[i].service_card_value_id > 0){ // COmbo LT
            for(var j = 0; j < service_card[i].service_detail.length;j ++){
                if(service_card[i].service_detail[j].id == card_id){
                    for(var k = service_arr.length-1;k >= 0; k--){
                        if(service_arr[k].s_id == service_card[i].service_detail[j].sid && service_arr[k].type == 1){
                            order_detail_id = service_arr[k].dup_count + 1;
                            break;
                        }
                    }
                    break;
                }
            }
        }else{ // LT don le
            if(service_card[i].id == card_id){
                for(var j = service_arr.length-1;j >= 0; j--){
                    if(service_arr[j].s_id == service_card[i].sid && service_arr[j].type == 1){
                        order_detail_id = service_arr[j].dup_count + 1;
                        break;
                    }
                }
                break;
            }
        }
    }
    $.ajax({
        url      : BASE_URL+"ManageMBS/checkin_card",
        type     : "post",
        dataType : 'json',
        data     : {
            card_id  : card_id,
            type:type, // = 2 minus 1/2 treatment programe
            order_detail_id: order_detail_id
        },
        success  : function (result){
            if (typeof(result) == 'object') {
                if (result.status == 'ok') {
                    $('#count_time_'+card_id).empty().append(result.data_return);
                    $('#popover_'+card_id).popover('hide');
                    $('#card_'+card_id).append('<i class="fa fa-circle text-danger text-xs red-blink "></i>');
                    make_bill(result.service_return, card_id, result.data_return,type);
                    if(show == '') {
                        $('#modal_customer').modal('hide');
                    }
                } else {
                    alert(result.message);
                }
            }
        },
        error: function (error){
            console.log('error: '+ JSON.stringify(error));
        }
    });
    return false;
}

// Show quantity
$('#quantity-check').click(function(){
    if($(this).prop('checked')){
        $('.quantity-detail').removeClass('hide');
        var checked = 1;
    }else{
        $('.quantity-detail').addClass('hide');
        var checked = 0;
    }
    $.ajax({
        url:BASE_URL+"ManageOrder/save_check_quantity_option",
        type:'post',
        data:{'checked':checked},
        success:function(response){
            return;
        },
        error:function(error){
            return;
        }
    })
});

function delete_checkin_card(card_id,order_detail_id){
    $.ajax({
        url:BASE_URL+"ManageOrder/delete_checkin_card",
        type:"post",
        data:{
            'card_id':card_id,
            'order_detail_id':order_detail_id
        },
        success:function(response){
            return;
        },
        error:function(error){
            return;
        }
    });
}

function delete_payment_method(element){
    id = $(element).parent().parent().find(`[name="payment_method_value[]"]`).attr('id').split('_').slice(-1);
    $(element).parent().parent().slideUp(500,function(){ 
        $(this).remove(); 
        update_order_payment(id);
    });
}

function remove_promotion_tags(){
    $('ul.list-services>li, ul.list-products>li').each((i,e)=>{
        $(e).find('.s-promotion-price').remove();
        $(e).find('.s-promotion-tag').remove();
        if($(e).find('.happy_h-code').text() != -1){
            $(e).find('.s-happy_h-price').removeClass('hide');
            $(e).find('.s-happy_h-price').nextAll('label').removeClass('hide');
        }else{
            if($(e).find('.s-special-price').text() == ''){
                $(e).find('.s-price').removeClass('text-l-t');
            }else{
                $(e).find('.s-special-price').removeClass('hide');
            }
        }
    });
}

function add_promotion_tags(element,value,discount_unit){
    $(element).find('.s-special-price').addClass('hide');
    $(element).find('.s-happy_h-price').addClass('hide');
    $(element).find('.s-happy_h-price').nextAll('label').addClass('hide');
    $(element).find('.s-price').addClass('text-l-t');
    service_price = un_format_money($(element).find('.s-price').last().text());
    if(discount_unit == '%')
        promotion_price = service_price*(100-value)/100;
    else
        promotion_price = service_price - value;
    $(element).find('.s-special-price').after(`<span class="s-promotion-price text-primary">${format_currency(promotion_price)}</span>`);
    $(element).find('.s-happy_h-unit').after(`<div class="s-promotion-tag"><span>-${format_currency(value)}${discount_unit}</span></div>`);

    delete order_obj.happy_hour_code;
}

const remove_service_promotions = () => {
    service_arr.forEach((v,i)=>{
        if((v.type == 1 && v.use_service_card == 0) || v.type == 2){
            element = v.type==1?$(`#tab_1 .list-services>li[value="${v.s_id}"]`):$(`#tab_pro_1 .list-products>li[value="${v.s_id}"]`);
            if($(element).find('.happy_h-code').text() == -1){ // Service without happy hour
                service_arr[i].s_discount_unit = BASE_CURRENCY_SYMBOL;
                special_price = $(element).find('.s-special-price').text();
                if(special_price === ''){
                    service_arr[i].s_special_price = -1;
                    service_arr[i].s_total = service_arr[i].s_price*service_arr[i].s_quantity;
                    service_arr[i].s_discount = 0;
                }else{
                    service_arr[i].s_special_price = un_format_money(special_price);
                    service_arr[i].s_discount = (service_arr[i].s_price - service_arr[i].s_special_price)*service_arr[i].s_quantity;
                    service_arr[i].s_total = service_arr[i].s_special_price*service_arr[i].s_quantity;
                }
            }else{ // Service with happy hour
                service_arr[i].s_happy_h_code   = $(element).find('.happy_h-code').text();
                service_arr[i].s_happy_h_price  = un_format_money($(element).find('.s-happy_h-price').text());
                service_arr[i].s_discount_unit  = $(element).find('.s-happy_h-unit').text();
                service_arr[i].s_total          = service_arr[i].s_happy_h_price*service_arr[i].s_quantity;
                if(service_arr[i].s_discount_unit == '%'){
                    service_arr[i].s_discount   = 100 - (service_arr[i].s_happy_h_price/service_arr[i].s_price)*100;
                }else{
                    service_arr[i].s_discount   = (service_arr[i].s_price - service_arr[i].s_happy_h_price)*service_arr[i].s_quantity;
                }
            }
            for(j=0;j<service_staff_commissions.length;j++){
                if(service_staff_commissions[j].sid==v.s_id && service_staff_commissions[j].type==v.type && service_staff_commissions[j].ord_detail_id == v.dup_count){
                    if(service_staff_commissions[j].commission_percent != 0){
                        service_staff_commissions[j].commission = service_staff_commissions[j].commission_percent*service_arr[i].s_total/100
                    }
                }
            }
        }
    });
}

const remove_promotion = () => {
    if(typeof order_obj.coupon_code === 'undefined') return;
    remove_promotion_tags();
    $('#active_promotion').parent().remove();
    if(order_obj.promotion_value[0].type == 0){
        order_obj.discount_percent = order_obj.happy_hour.discount;
        update_payment();
    }else{
        remove_service_promotions();
    }
    order_obj.coupon_code = '';
    order_obj.promotion_value = [];
    generate_order();
}