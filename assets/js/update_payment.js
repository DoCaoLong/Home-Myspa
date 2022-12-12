function update_payment(type){ //type = 1: add new service card, 2: edit service card

    var price           = refresh_value($('#price').val());
    var discount        = refresh_value($('#discount').val());
    var total_price     = refresh_value($('#total_price').val());
    var transfer_available = refresh_value($('#transfer_available').val())
    var prepay          = refresh_value($('#prepay').val()) + transfer_available;
    var remain_money    = refresh_value($('#remain_money').val());
    var org_remain_money= refresh_value($('#org_remain_money').val());
    var reward_money= refresh_value($('#reward_money_pay').val());

    total_price     = price - discount;
    if (type == 1)
        remain_money    = total_price - (prepay +  reward_money);

    if (type == 2)
        remain_money    = org_remain_money - (prepay +  reward_money);


    $('#total_price').val(format_currency(total_price));
    $('#remain_money').val(format_currency(remain_money)).trigger('change');
    $('#input_reward_money').trigger('input');
}

$(document).on('change',`[name="payment_method_id[]"]`,function() {
    update_payment_method();
})

const update_payment_method = (payment_id = -1, type = 2) => {
    if($('#org_remain_money').length > 0)
        total_money = refresh_value($('#org_remain_money').val());
    else
        total_money = refresh_value($('#total_price').val());
    // let total_money = $('')
    transfer_available = refresh_value($('#transfer_available').val());
    if(transfer_available <= total_money){
        total_money -= transfer_available;
        $('#money_excess').text(0);
        $('#money_excess').parent().addClass('hide');
    }
    else{
        if($('#transfer_service_card').val() == 1){
            $('#money_excess').text(format_currency(transfer_available - total_money));
            $('#money_excess').parent().removeClass('hide');
        }
        total_money = 0;
    }
    total_payment = 0;
    total_payment_reward = 0;
    current_total_payment_reward = 0;
    last_remain = 0;
    $('.payment-method').each(function(){
        id = $(this).find(`[name="prepay[]"]`).attr('id');
        payment_method = $(this).find(`[name="payment_method_id[]"]`).val();
        current_id = id.split('_').slice(-1);
        if(payment_method != -1 && payment_method != -3) {
            payment_reward_value = un_format_money($(`#prepay_${current_id}`).val());
            payment_reward_value = payment_reward_value < 0 ? 0 : payment_reward_value;
            total_payment_reward += payment_reward_value;
        }
        if(payment_id < 0){
            payment_value = un_format_money($(`#prepay_${current_id}`).val());
            total_payment += payment_value;
            if(total_money - total_payment >= 0){
                if($(this).is(":last-child")){
                    $(`#prepay_${current_id}`).val(format_currency(total_money - total_payment + payment_value));
                    $(`#remain_money_${current_id}`).val(0);
                }else
                    $(`#remain_money_${current_id}`).val(format_currency(total_money - total_payment));
            }
            else{
                $(`#prepay_${current_id}`).val(format_currency(payment_value + total_money - total_payment < 0 ? 0 : payment_value + total_money - total_payment));
                $(`#remain_money_${current_id}`).val(0);
                total_payment = total_money;
            }
        }
        else{
            if(payment_id == current_id){
                if(type == 1){
                    // Edit remain money
                    remain = un_format_money($(`#remain_money_${current_id}`).val());
                    if(remain + total_payment > total_money){
                        remain = total_money - total_payment;
                        $(`#remain_money_${current_id}`).val(format_currency(remain));
                    }
                    total_paid = total_money - remain;
                    $(`#prepay_${current_id}`).val(format_currency(total_paid - total_payment));
                    total_payment = total_paid;
                }else{
                    // Edit value
                    paid = un_format_money($(`#prepay_${current_id}`).val());
                    if(paid + total_payment > total_money){
                        paid = total_money - total_payment;
                        $(`#prepay_${current_id}`).val(format_currency(paid));
                    }
                    total_payment += paid;
                    $(`#remain_money_${current_id}`).val(format_currency(total_money - total_payment));
                }
            }else if(current_id > payment_id){
                paid = un_format_money($(`#prepay_${current_id}`).val());
                total_payment += paid;
                if(total_money - total_payment > 0)
                    $(`#remain_money_${current_id}`).val(format_currency(total_money - total_payment));
                else{
                    paid = paid + total_money - total_payment;
                    $(`#prepay_${current_id}`).val(format_currency(paid));
                    $(`#remain_money_${current_id}`).val(0);
                    total_payment = total_money;
                }
            }else{
                total_payment += un_format_money($(`#prepay_${current_id}`).val());
            }
        }
        money_excess = un_format_money($(`#remain_money_${current_id}`).val());
    });
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
    $('input[name="total_payment_reward"]').val(current_total_payment_reward)
    $('.list_referral_reward').trigger('updated')
    $('#input_reward_money').trigger('input')
    update_mbs_commission();
}

const add_payment_method = (value = 0, method = '') => {
    
    let last_payment_method = $('.payment-method').last();
    let remain_money        = un_format_money($(last_payment_method).find(`[name="remain_money[]"]`).val()) - value;
    let new_id              = (+$(last_payment_method).find(`[name="prepay[]"]`).attr('id').split('_').slice(-1))+1;
    let html = `<div class="clearfix"></div>
                <div class="payment-method">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>${lang['payment_method']}</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-danger payment-btn rounded-left" onclick="delete_payment_method(this)"><i class="glyphicon glyphicon-minus"></i></span>
                                <select data-rel="select2" id="payment_method_id_${new_id}" name="payment_method_id[]" class="w-full form-control rounded-right">
                                    <option value=""></option>
                                    ${PAYMENT_METHOD.map(v=>`<option value="${v.id}">${v.payment_method_name}</option>`)}
                                    ${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-1"]').length ?`<option value="-1" ${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-1"]').attr('disabled')}>${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-1"]').text()}</option>`:``}
                                    ${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-3"]').length ?`<option value="-3" ${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-3"]').attr('disabled')}>${$(last_payment_method).find(`[name="payment_method_id[]"]`).find('option[value="-3"]').text()}</option>`:``}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>${lang['prepay']} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input name="prepay[]" id="prepay_${new_id}" onblur="update_format_money(this); update_payment_method(${new_id},2); assign_staff()" onkeyup="update_format_money(this); update_payment_method(${new_id},2); assign_staff()" class="form-control rounded-left text-right" type="text" value="${format_currency(value)}">
                                <span class="input-group-addon rounded-right">${BASE_CURRENCY_SYMBOL}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>${lang['remain']} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input name="remain_money[]" id="remain_money_${new_id}" onblur="update_format_money(this);update_payment_method(${new_id},1)" onkeyup="update_format_money(this);update_payment_method(${new_id},1)" class="form-control rounded-left text-right" type="text" value="${format_currency(remain_money)}">
                                <span class="input-group-addon rounded-right">${BASE_CURRENCY_SYMBOL}</span>
                            </div>
                        </div>
                    </div>
                </div>`;
    $(last_payment_method).after(html);
    $(`#payment_method_id_${new_id}`).select2().val(method).trigger('change');
}

const delete_payment_method = element => {
    id = $(element).parent().parent().parent().parent().find(`[name="prepay[]"]`).attr('id').split('_').slice(-1);
    $(element).parent().parent().parent().parent().slideUp(500,function(){
        $(this).remove();
        update_payment_method(id);
    });
}

const update_mbs_commission = (v = 0) => {
    let prepay = 0;
    $('.payment-method').each(function(){
        id = $(this).find(`[name="prepay[]"]`).attr('id').split('_').slice(-1);
        prepay += un_format_money($(`#prepay_${id}`).val());
    });
    update_commission(format_currency(prepay));
}
