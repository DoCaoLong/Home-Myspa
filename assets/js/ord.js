
function show_staff_in_bill_2(){
    var staff_assign = [];
    for (var h = 0; h < service_staff_commissions.length; h++) {
        if(jQuery.inArray(service_staff_commissions[h].uid , staff_assign) === -1) {
            staff_assign[staff_assign.length] = service_staff_commissions[h].uid;
        }
    }

    if (staff_assign != null && staff_assign.length > 0) {
        var str = '<h5>'+lang["staff_serve"]+': ';
        var count = 0;
        for (var i = 0; i < staff_assign.length; i++) {
            for (var j = 0; j < staff_list.length; j++) {
                if (staff_assign[i] == staff_list[j].id) {
                    if (count > 0) str += ', ';
                    str += staff_list[j].fullname;
                    count++;
                    break;
                }
            }
        }
        str += '</h5>';
    }
    $('#order_print #cus_email').append(str);
    $('#order_print #cus_name').prepend(lang["customer"]+': ');
}

// function search_product(keyword) {
//     if (keyword == '') $('.list-products > li').show();
//     else {
//         $('.list-products > li').hide();
//         $('.list-products > li.sku-'+keyword).show();
//     }
// }

// Actions fired when user add/delete staff in order'commission
function assign_staff(){
    var staff_assign = $('#staff_id').val();
    var str = '';
    var edit_commission = (EDIT_COMMISSION_CREATE_ORDER == true)?'':'disabled';

    // Staff selected list is not null
    if (staff_assign != null && staff_assign.length > 0) {
        if($('#staff_assign').html().replace(/\s/g,'') == '') str += '<tr><td colspan="5" class="text-right">Commission/Tip</td></tr>';
        if(staff_assign.length > $('#staff_assign tr').length -1){ // Insert new staff commission
            for(var i = 0; i< staff_assign.length;i++){
                if($('#staff_assigned_'+staff_assign[i]).length == 0){
                    // Push new data to service_staff_commission
                    staff_data  = staff_assign[i].split('_');
                    staff_obj   = new Object;
                    staff_obj.ord_detail_id         = -1;
                    staff_obj.card_id               = 0;
                    staff_obj.card_type             = 0;
                    staff_obj.uid                   = staff_data[0];
                    staff_obj.group_id              = staff_data[1];
                    staff_obj.type                  = 0;
                    staff_obj.commission_percent    = 0;
                    staff_obj.commission_money      = 0;
                    staff_obj.commission            = 0;
                    staff_obj.plan                  = 0;
                    staff_obj.sid                   = 0;
                    staff_obj.pid                   = 0;
                    staff_obj.quantity              = 0;
                    staff_obj.commission_sharing    = staff_assign.length;
                    service_staff_commissions.push(staff_obj);

                    // Create new view of order_staff
                    for (var j = 0; j < staff_list.length; j++) {
                        if (staff_data[0] == staff_list[j].id) {
                            str += '<tr>';
                            if (staff_list[j].image != '')
                                str += '    <td style="width:35px;"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                            else
                                str += '    <td style="width:35px;"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                            str += '    <td>'+staff_list[j].fullname+'</td>';
                            var hide = (VIEW_COMMISSION == true)?'':'hidden';

                            str += '    <td>';
                            str += '    <div class="row">';
                            str += '        <div class="radio col-xs-6 no-pd">';
                            str += '            <label class="i-checks">';
                            str += '                <input type="radio" name="commission_plan_2_'+staff_assign[i]+'" value="2" />';
                            str += '                <i></i>';
                            str +=                  lang['consult'];
                            str += '            </label>';
                            str += '        </div>';
                            str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                            str += '            <label class="i-checks">';
                            str += '                <input type="radio" name="commission_plan_2_'+staff_assign[i]+'" value="1" />';
                            str += '                <i></i>';
                            str +=                  lang['perform'];
                            str += '            </label>';
                            str += '        </div>';
                            str += '    </div>';
                            str += '    </td>';

                            str += '    <td '+hide+' class="text-right" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" id="staff_percent_assigned_'+staff_assign[i]+'" value="0" onblur="number_format(this);update_order_staff_commission(\''+staff_assign[i]+'\');" onkeyup="number_format(this);update_order_staff_commission(\''+staff_assign[i]+'\');" '+(ORDER_ID!=null?'onchange="update_staff_commission(\''+ORDER_ID+'\')"':'')+' placeholder="commission" class="text-right text-bold text-black">%</td>';
                            str += '    <td '+hide+' class="text-right" style="width:100px;"><input '+edit_commission+' style="width:100px; max-width:95%" type="text" id="staff_assigned_'+staff_assign[i]+'" value="0" onblur="update_format_money(this);assign_order_staff_commission(\''+staff_assign[i]+'\')" onkeyup="update_format_money(this);assign_order_staff_commission(\''+staff_assign[i]+'\')" '+(ORDER_ID!=null?'onchange="update_staff_commission(\''+ORDER_ID+'\')"':'')+' placeholder="commission" class="text-right text-bold text-black"></td>';
                            str += '</tr>';
                        }
                    }
                }
            }
        }else if(staff_assign.length < $('#staff_assign tr').length -1){ // Delete staff from list and from service_staff_commissions
            $('#staff_assign').children().children('tr').each(function(){
                if($(this).children(4).find('input[type="text"]').length>0){
                    var id = $(this).children(4).find('input[type="text"]').attr('id');
                    if(!staff_assign.includes(id.replace('staff_percent_assigned_',''))){
                        $(this).remove();
                        staff_data = id.replace('staff_percent_assigned_','').split('_');
                        for(var i = 0; i< service_staff_commissions.length; i++){
                            if(service_staff_commissions[i].uid == staff_data[0] && service_staff_commissions[i].group_id == staff_data[1] && service_staff_commissions[i].ord_detail_id == -1){
                                service_staff_commissions.splice(i,1);
                                i--;
                            }
                        }
                    }
                }
            });
        }
        // Update other staff's commission_sharing
        for(var j = 0; j < service_staff_commissions.length;j++){
            if(service_staff_commissions[j].ord_detail_id == -1){
                service_staff_commissions[j].commission_sharing = staff_assign.length;
            }
        }
    } else {
        // Staff list is empty because user deleted last staff => empty list and service_staff_commissions
        str = '';
        for(var i = 0; i< service_staff_commissions.length; i++){
            if(service_staff_commissions[i].ord_detail_id == -1){
                service_staff_commissions.splice(i,1);
                i--;
            }
        }
        $('#staff_assign').empty();
    }
    $('#staff_assign').append(str);
    if(ORDER_PAID){ // Call ajax function to update staff commission when order is PAID/PREPAID
        update_staff_commission(ORDER_ID);
    }
    //Scroll to bottom order
    //scroll_bottom_order();
}

//COMMISSION STAFF
// This is called when user add/delete staff of service/treatment/prepay_card/product
function assign_service_staff_by_staff_group_commission(){
    // Get data of service
    var item_id = $('#sid_selected').val();
    var type    = $('#s_type').val();
    var dup     = $('#s_dup').val();
    var staff_assign = $('#service_staff_id_assigned').val();
    var SERVICE_CARD = false;
    var edit_commission = (EDIT_COMMISSION_CREATE_ORDER == true)?'':'disabled';

    // Get service match above data
    for(var i = 0;i < service_arr.length; i++){
        if(service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == dup){
            if(service_arr[i].use_service_card > 0 && type == 1){
                // Action on treatment that is checked in
                if(service_card.length > 0 ){
                    for(var j = 0; j< service_card.length; j++){ 
                        loop_break = false;
                        if(service_card[j].service_card_value_id > 0){// Lieu trinh combo
                            for(var k = 0; k < service_card[j].service_detail.length; k++){
                                if(service_card[j].service_detail[k].id == service_arr[i].use_service_card){
                                    var discount_ratio = service_card[j].total_price/service_card[j].price;
                                    var ser_detail = service_card[j].service_detail[k];
                                    var item_total = ser_detail.total_price/((ser_detail.unlimited ==1)?1:ser_detail.times)*discount_ratio*service_arr[i].s_quantity;
                                    loop_break = true;
                                    break;
                                }
                            }
                        }else if(service_card[j].id == service_arr[i].use_service_card){// Lieu trinh don le
                            var discount_ratio = service_card[j].total_price/service_card[j].price;
                            var item_total = ((service_card[j].unlimited==1)?(service_card[j].final_price*discount_ratio):(service_card[j].total_price/service_card[j].times))*service_arr[i].s_quantity;
                            break;
                        }
                        if(loop_break) break;
                    }
                }
            }else {
                if(type == 3 && service_arr[i].use_service_card > 0) SERVICE_CARD = true;

                var item_total = un_format_money($('#item_price_total_'+item_id+'_'+type+'_'+dup).val());
            }
            break;
        }
    }
    var item_quantity   = un_format_money($('#item_quantity_'+item_id+'_'+type+'_'+dup).val());
    var hide = (VIEW_COMMISSION == true) ? '':' hide ';

    var str = '';
    if (staff_assign != null && staff_assign.length > 0){
        if(staff_assign.length == 1){
            if($('#service_staff_assigned tr').length-1 > staff_assign.length){// delete
                $('#service_staff_assigned').children().children('tr').each(function(){
                    if($(this).children(4).find('input[type="text"]').length>0){
                        var id = $(this).children(4).find('input[type="text"]').attr('id');
                        if(!staff_assign.includes(id.replace('service_staff_percent_assigned_',''))){
                            $(this).remove();
                        } 
                    }
                });
                if(type == 3 || type == 4){
                    let staff_cms_arr = get_card_commission(item_id,type);
                    let staff_cms = 0;
                    if ((staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 1)||(staff_cms_arr.plan == 0 && staff_cms_arr.percent == 0)) {
                        staff_commission = parseFloat(staff_cms_arr.money) * parseFloat(item_quantity);
                    } else if ((staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 2)||(staff_cms_arr.plan == 0 && staff_cms_arr.percent != 0)) {
                        // Calculate commission with percent defined
                        staff_cms = staff_cms_arr.percent;
                        staff_commission = parseFloat(item_total)*parseFloat(staff_cms)/100;
                    }
                    $(`#service_staff_percent_assigned_${staff_assign[0]}`).val(number_format(staff_cms));
                    $(`#service_staff_assigned_${staff_assign[0]}`).val(format_currency(Math.round(staff_commission)));
                }
            }else{
                str += '<tr><td colspan="5" class="text-right"><span>Commission</span></td></tr>';
                var staff_assign_ = staff_assign[0].split('_');
                for (var j = 0; j < staff_list.length; j++) {
                    if (staff_assign_[0] == staff_list[j].id) {

                        var staff_cms = 0;
                        var staff_commission = 0;
                        var cls_opacity_1 = '';
                        var cls_opacity_2 = '';
                        if(type == 3){
                            if(SERVICE_CARD == true){ // Service combo that is already existed, so we need to get commission options defined by user 
                                var staff_cms_arr = get_card_commission(item_id,type);
                            }else{ // New service combo create by 1 service only, so we let user define it's commission
                                var staff_cms_arr = get_commission_by_staff(item_id, type, staff_assign_[0],staff_assign_[1]);
                            }
                        }else if(type == 4){ // Prepay card, need to get commission defined
                            var staff_cms_arr = get_card_commission(item_id,type);
                        }else{ // Normal service/product
                            var staff_cms_arr = get_commission_by_staff(item_id, type, staff_assign_[0],staff_assign_[1]);
                        }
                        
                        // Calculate commission by plan = 1 or self defined without percent
                        if ((staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 1)||(staff_cms_arr.plan == 0 && staff_cms_arr.percent == 0)) {
                            cls_opacity_1 = 'cls-opacity-30';
                            staff_commission = parseFloat(staff_cms_arr.money) * parseFloat(item_quantity);
                        } else if ((staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 2)||(staff_cms_arr.plan == 0 && staff_cms_arr.percent != 0)) {
                            // Calculate commission with percent defined
                            cls_opacity_2 = 'cls-opacity-30';
                            staff_cms = staff_cms_arr.percent;
                            staff_commission = parseFloat(item_total)*parseFloat(staff_cms)/100;
                        }
                    
                        // Create view for staff commission
                        str += '<tr>';
                        if (staff_list[j].image != '')
                            str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                        else
                            str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                        str += '    <td>'+staff_list[j].fullname+'</td>';
                        str += '    <td>';
                        str += '    <div class="row">';
                        str += '        <div class="radio col-xs-6 no-pd">';
                        str += '            <label class="i-checks">';
                        str += '                <input type="radio" name="commission_plan_'+staff_assign+'" value="2" '+((staff_cms_arr.plan == 2)?'checked=checked':'')+'/>';
                        str += '                <i></i>';
                        str +=                  lang['consult'];
                        str += '            </label>';
                        str += '        </div>';
                        str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                        str += '            <label class="i-checks">';
                        str += '                <input type="radio" name="commission_plan_'+staff_assign+'" value="1" '+((staff_cms_arr.plan == 1)?'checked=checked':'')+'/>';
                        str += '                <i></i>';
                        str +=                  lang['perform'];
                        str += '            </label>';
                        str += '        </div>';
                        str += '    </div>';
                        str += '    </td>';
                        str += '    <td class="text-right '+cls_opacity_1+ hide +'" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" onchange="calculate_commission('+item_id+','+type+','+"\'"+staff_assign[0]+"\'"+','+dup+')" id="service_staff_percent_assigned_'+staff_assign[0]+'" value="'+number_format(staff_cms)+'" onblur="number_format(this);" onkeyup="number_format(this);" placeholder="commission %" class="text-right text-bold text-black">%</td>';
                        str += '    <td class="text-right '+cls_opacity_2+ hide +'" style="width:80px;"><input type="hidden" id="service_staff_money_assigned_'+staff_assign[0]+'" value="'+staff_cms_arr.money+'"/><input '+edit_commission+' style="width:80px; max-width:95%" type="text" id="service_staff_assigned_'+staff_assign[0]+'" value="'+format_currency(Math.round(staff_commission))+'" onblur="update_format_money(this);" onkeyup="update_format_money(this);" placeholder="commission" class="text-right text-bold text-black"></td>';
                        str += '</tr>';
                        break;
                    }
                }
                $('#service_staff_assigned').empty().append(str);
            }
        }else{
            if((type == 3 && SERVICE_CARD == true) || type == 4){ // Commission of cards
                var staff_cms = 0;
                var staff_commission = 0;
                var cls_opacity_1 = '';
                var cls_opacity_2 = '';
                var staff_cms_arr = get_card_commission(item_id,type);
                if(staff_cms_arr.money == 0 && staff_cms_arr.percent == 0){// Not setup for commission, so do it as usual
                    if($('#service_staff_assigned tr').length-1 < staff_assign.length){// insert
                        for(var i = 0; i<staff_assign.length; i++){
                            if($('#service_staff_assigned').find('#service_staff_money_assigned_'+staff_assign[i]).length<=0){// Find the last inserted
                                var staff_assign_ = staff_assign[i].split('_');
                                for (var j = 0; j < staff_list.length; j++) {
                                    if (staff_assign_[0] == staff_list[j].id) {
                                        str += '<tr>';
                                        if (staff_list[j].image != '')
                                            str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                                        else
                                            str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                                        str += '    <td>'+staff_list[j].fullname+'</td>';
                                        str += '    <td>';
                                        str += '    <div class="row">';
                                        str += '        <div class="radio col-xs-6 no-pd">';
                                        str += '            <label class="i-checks">';
                                        str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="2" '+((staff_cms_arr.plan == 2)?'checked=checked':'')+'/>';
                                        str += '                <i></i>';
                                        str +=                  lang['consult'];
                                        str += '            </label>';
                                        str += '        </div>';
                                        str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                                        str += '            <label class="i-checks">';
                                        str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="1" '+((staff_cms_arr.plan == 1)?'checked=checked':'')+'/>';
                                        str += '                <i></i>';
                                        str +=                  lang['perform'];
                                        str += '            </label>';
                                        str += '        </div>';
                                        str += '    </div>';
                                        str += '    </td>';
                                        str += '    <td class="text-right '+cls_opacity_1+ hide +'" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" onchange="calculate_commission('+item_id+','+type+','+"\'"+staff_assign[i]+"\'"+','+dup+')" id="service_staff_percent_assigned_'+staff_assign[i]+'" value="'+number_format(0)+'" onblur="number_format(this);" onkeyup="number_format(this);" placeholder="commission %" class="text-right text-bold text-black">%</td>';
                                        str += '    <td class="text-right '+cls_opacity_2+ hide +'" style="width:80px;"><input type="hidden" id="service_staff_money_assigned_'+staff_assign[i]+'" value="'+0+'"/><input '+edit_commission+' style="width:80px; max-width:95%" type="text" id="service_staff_assigned_'+staff_assign[i]+'" value="'+format_currency(0)+'" onblur="update_format_money(this);" onkeyup="update_format_money(this);" placeholder="commission" class="text-right text-bold text-black"></td>';
                                        str += '</tr>';
                                        break;
                                    }
                                }
                                $('#service_staff_assigned').children().append(str);
                            }
                        }
                    }else if($('#service_staff_assigned tr').length-1 > staff_assign.length){// delete
                        var i = 0;
                        $('#service_staff_assigned').children().children('tr').each(function(){
                            if($(this).children(4).find('input[type="text"]').length>0){
                                var id = $(this).children(4).find('input[type="text"]').attr('id');
                                if(!staff_assign.includes(id.replace('service_staff_percent_assigned_',''))){
                                    $(this).remove();
                                } 
                            }
                        });
                    }
                }else{ // Update all commissions: all staffs divide commission equally
                    if (staff_cms_arr && staff_cms_arr.percent == 0) {
                        cls_opacity_1 = 'cls-opacity-30';
                        staff_commission = parseFloat(staff_cms_arr.money) * parseFloat(item_quantity);
                    } else {
                        cls_opacity_2 = 'cls-opacity-30';
                        staff_cms = staff_cms_arr.percent;
                        staff_commission = parseFloat(item_total)*parseFloat(staff_cms)/100;
                    }
                    var staff_count = staff_assign.length;
                    $('#service_staff_assigned').children().empty().append('<tr><td colspan="5" class="text-right"><span>Commission</span></td></tr>');
                    for(var i = 0; i< staff_count; i++){
                        var staff_assign_ = staff_assign[i].split('_');
                        for(var j = 0; j < staff_list.length; j++){
                            if (staff_assign_[0] == staff_list[j].id) {

                                if (staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 1) {
                                    cls_opacity_1 = 'cls-opacity-30';
                                    staff_commission = parseFloat(staff_cms_arr.money) * parseFloat(item_quantity);
                                } else if (staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 2) {
                                    cls_opacity_2 = 'cls-opacity-30';
                                    staff_cms = staff_cms_arr.percent;
                                    staff_commission = parseFloat(item_total)*parseFloat(staff_cms)/100*item_quantity;
                                }

                                str += '<tr>';
                                if (staff_list[j].image != '')
                                    str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                                else
                                    str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                                str += '    <td>'+staff_list[j].fullname+'</td>';
                                str += '    <td>';
                                str += '    <div class="row">';
                                str += '        <div class="radio col-xs-6 no-pd">';
                                str += '            <label class="i-checks">';
                                str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="2" '+((staff_cms_arr.plan == 2)?'checked=checked':'')+'/>';
                                str += '                <i></i>';
                                str +=                  lang['consult'];
                                str += '            </label>';
                                str += '        </div>';
                                str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                                str += '            <label class="i-checks">';
                                str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="1" '+((staff_cms_arr.plan == 1)?'checked=checked':'')+'/>';
                                str += '                <i></i>';
                                str +=                  lang['perform'];
                                str += '            </label>';
                                str += '        </div>';
                                str += '    </div>';
                                str += '    </td>';
                                str += '    <td class="text-right '+cls_opacity_1+ hide +'" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" onchange="calculate_commission('+item_id+','+type+','+"\'"+staff_assign[i]+"\'"+','+dup+')" id="service_staff_percent_assigned_'+staff_assign[i]+'" value="'+number_format((staff_cms/staff_count*100)/100)+'" onblur="number_format(this);" onkeyup="number_format(this);" placeholder="commission %" class="text-right text-bold text-black">%</td>';
                                str += '    <td class="text-right '+cls_opacity_2+ hide +'" style="width:80px;"><input type="hidden" id="service_staff_money_assigned_'+staff_assign[i]+'" value="'+Math.round(staff_cms_arr.money/staff_count)+'"/><input '+edit_commission+' style="width:80px; max-width:95%" type="text" id="service_staff_assigned_'+staff_assign[i]+'" value="'+format_currency(Math.round(staff_commission/staff_count))+'" onblur="update_format_money(this);" onkeyup="update_format_money(this);" placeholder="commission" class="text-right text-bold text-black"></td>';
                                str += '</tr>';
                                break;
                            }
                        }
                    }
                    $('#service_staff_assigned').children().append(str);
                }
            }else{ // Normal product/service commission
                if($('#service_staff_assigned tr').length-1 < staff_assign.length){// insert
                    for(var i = 0; i<staff_assign.length; i++){
                        if($('#service_staff_assigned').find('#service_staff_money_assigned_'+staff_assign[i]).length<=0){// Find the last inserted
                            var staff_assign_ = staff_assign[i].split('_');
                            for (var j = 0; j < staff_list.length; j++) {
                                if (staff_assign_[0] == staff_list[j].id) {
                                    var staff_cms = 0;
                                    var staff_commission = 0;
                                    var cls_opacity_1 = '';
                                    var cls_opacity_2 = '';
                                    var staff_cms_arr = get_commission_by_staff(item_id, type, staff_assign_[0],staff_assign_[1]);

                                    if (staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 1) {
                                        cls_opacity_1 = 'cls-opacity-30';
                                        staff_commission = parseFloat(staff_cms_arr.money) * parseFloat(item_quantity);
                                    } else if (staff_cms_arr && staff_cms_arr.plan && staff_cms_arr.plan == 2) {
                                        cls_opacity_2 = 'cls-opacity-30';
                                        staff_cms = staff_cms_arr.percent;
                                        staff_commission = parseFloat(item_total)*parseFloat(staff_cms)/100;
                                    }

                                    str += '<tr>';
                                    if (staff_list[j].image != '')
                                        str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                                    else
                                        str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                                    str += '    <td>'+staff_list[j].fullname+'</td>';
                                    str += '    <td>';
                                    str += '    <div class="row">';
                                    str += '        <div class="radio col-xs-6 no-pd">';
                                    str += '            <label class="i-checks">';
                                    str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="2" '+((staff_cms_arr.plan == 2)?'checked=checked':'')+'/>';
                                    str += '                <i></i>';
                                    str +=                  lang['consult'];
                                    str += '            </label>';
                                    str += '        </div>';
                                    str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                                    str += '            <label class="i-checks">';
                                    str += '                <input type="radio" name="commission_plan_'+staff_assign[i]+'" value="1" '+((staff_cms_arr.plan == 1)?'checked=checked':'')+'/>';
                                    str += '                <i></i>';
                                    str +=                  lang['perform'];
                                    str += '            </label>';
                                    str += '        </div>';
                                    str += '    </div>';
                                    str += '    </td>';
                                    str += '    <td class="text-right '+cls_opacity_1+ hide +'" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" onchange="calculate_commission('+item_id+','+type+','+"\'"+staff_assign[i]+"\'"+','+dup+')" id="service_staff_percent_assigned_'+staff_assign[i]+'" value="'+number_format(staff_cms)+'" onblur="number_format(this);" onkeyup="number_format(this);" placeholder="commission %" class="text-right text-bold text-black">%</td>';
                                    str += '    <td class="text-right '+cls_opacity_2+ hide +'" style="width:80px;"><input type="hidden" id="service_staff_money_assigned_'+staff_assign[i]+'" value="'+staff_cms_arr.money+'"/><input '+edit_commission+' style="width:80px; max-width:95%" type="text" id="service_staff_assigned_'+staff_assign[i]+'" value="'+format_currency(staff_commission)+'" onblur="update_format_money(this);" onkeyup="update_format_money(this);" placeholder="commission" class="text-right text-bold text-black"></td>';
                                    str += '</tr>';
                                    break;
                                }
                            }
                            $('#service_staff_assigned').children().append(str);
                        }
                    }
                }else if($('#service_staff_assigned tr').length-1 > staff_assign.length){// delete
                    var i = 0;
                    $('#service_staff_assigned').children().children('tr').each(function(){
                        if($(this).children(4).find('input[type="text"]').length>0){
                            var id = $(this).children(4).find('input[type="text"]').attr('id');
                            if(!staff_assign.includes(id.replace('service_staff_percent_assigned_',''))){
                                $(this).remove();
                            } 
                        }
                    });
                }
            }
        }
    }else{
        $('#service_staff_assigned').empty();
    }   
}

// Calculate commission when user change commission percent
function calculate_commission(item_id, type, staff_assign_id, duplicate) {
    var percent = $('#service_staff_percent_assigned_'+staff_assign_id).val();
    percent = number_format(percent);
    for (var i = 0; i < service_arr.length; i++) {
        if (service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate) {
            if(service_arr[i].use_service_card > 0 && service_arr[i].type == 1){
                if(service_card.length > 0){ // Get actual money of service that is checked in
                    var loop_break = false;
                    for(var j = 0; j< service_card.length; j++){ 
                        if(service_card[j].service_card_value_id > 0){// Lieu trinh combo
                            for(var k = 0; k < service_card[j].service_detail.length; k++){
                                if(service_card[j].service_detail[k].id == service_arr[i].use_service_card){
                                    ser_detail = service_card[j].service_detail[k];
                                    var discount_ratio = service_card[j].total_price/service_card[j].price;
                                    var commission = percent * ser_detail.total_price/((ser_detail.unlimited == 1)?1:ser_detail.times)/100*discount_ratio;
                                    loop_break = true;
                                    break;
                                }
                            }
                        }else if(service_card[j].id == service_arr[i].use_service_card){// Lieu trinh don le
                            var discount_ratio = service_card[j].total_price/service_card[j].price;
                            var commission = percent * ((service_card[j].unlimited == 1)?(service_card[j].final_price*discount_ratio):(service_card[j].total_price/service_card[j].times))/100;
                            break;
                        }
                        if(loop_break) break;
                    }
                }
            }else var commission = percent * service_arr[i].s_total/100/service_arr[i].s_quantity;
            //$('#service_staff_money_assigned_'+staff_assign_id).val(format_currency(commission));
            $('#service_staff_assigned_'+staff_assign_id).val(format_currency(Math.round(commission*service_arr[i].s_quantity)));
            break;
        }
    }
    return;
}

// Ajax call to get commission by staff (for product/service)
function get_commission_by_staff(item_id, type, uid, group_id) {
    var commisison = 0;
    $.ajax({
        url: BASE_URL+"ManageServices/get_commission_by_staff",
        type: "get",
        dataType: 'json',
        async: false,
        data: {
            'load_commission_by_staff' : 'yes',
            'item_id'   : item_id,
            'type'      : type,
            'uid'       : uid,
            'group_id'  : group_id
        },
        success: function (data) {
            if (typeof (data) == 'object') {
                if (data.status == 'ok') {
                    commisison = data.commission;
                }
            }
        }
    });
    return commisison;
}

// Ajax call to get commission by staff (for service_combo/prepay card)
function get_card_commission(item_id,type){
    var commission = 0;
    $.ajax({
        url: BASE_URL+"ManageMBS/get_card_commission",
        type: 'get',
        dataType: 'json',
        async: false,
        data: {
            'item_id'   : item_id,
            'type'      : type   
        },
        success: function(data){
            if (typeof (data) == 'object') {
                if (data.status == 'ok') {
                    commission = data.commission;
                }
            }
        }
    });
    return commission;
}

// Show current staff commission on order
function gen_service_staff(sid,type,duplicate){
    var edit_commission = (EDIT_COMMISSION_CREATE_ORDER == true)?'':'disabled';
    var hide = (VIEW_COMMISSION == true) ? '':' hide ';
    var staff_selected_arr = [];
    var str = '';
    str += '<tr><td colspan="5" class="text-right"><span>Commission</span></td></tr>';
    for (var i = 0; i < service_staff_commissions.length; i++) {
        if (service_staff_commissions[i].sid == sid && service_staff_commissions[i].type == type && service_staff_commissions[i].ord_detail_id == duplicate) {
            for (var j = 0; j < staff_list.length; j++) {
                if (service_staff_commissions[i].uid == staff_list[j].id) {
                    staff_selected_arr[staff_selected_arr.length] = service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id;
                    str += '<tr>';
                    if (staff_list[j].image != '')
                        str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /></td>';
                    else
                        str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30" /></td>';
                    str += '    <td>'+staff_list[j].fullname+'</td>';
                    str += '    <td>';
                    str += '    <div class="row">';
                    str += '        <div class="radio col-xs-6 no-pd">';
                    str += '            <label class="i-checks">';
                    str += '                <input type="radio" name="commission_plan_'+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+'" value="2" '+((service_staff_commissions[i].plan == 2)?'checked=checked':'')+'/>';
                    str += '                <i></i>';
                    str +=                  lang['consult'];
                    str += '            </label>';
                    str += '        </div>';
                    str += '        <div class="radio col-xs-6 no-pd" style="margin-top:10px">';
                    str += '            <label class="i-checks">';
                    str += '                <input type="radio" name="commission_plan_'+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+'" value="1" '+((service_staff_commissions[i].plan == 1)?'checked=checked':'')+'/>';
                    str += '                <i></i>';
                    str +=                  lang['perform'];
                    str += '            </label>';
                    str += '        </div>';
                    str += '    </div>';
                    str += '    </td>';
                    str += '    <td class="text-right '+hide+'" style="width:40px;"><input '+edit_commission+' style="width:25px; max-width:80%" type="text" id="service_staff_percent_assigned_'+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+'" onchange="calculate_commission('+service_staff_commissions[i].sid+','+service_staff_commissions[i].type+','+"\'"+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+"\'"+','+service_staff_commissions[i].ord_detail_id+')" value="'+(service_staff_commissions[i].commission_percent)+'" onblur="number_format(this);" onkeyup="number_format(this);" placeholder="commission %" class="text-right text-bold text-black">%</td>';
                    str += '    <td class="text-right '+hide+'" style="width:80px;"><input type="hidden" id="service_staff_money_assigned_'+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+'" value="'+service_staff_commissions[i].commission_money+'"/><input '+edit_commission+' style="width:80px; max-width:95%" type="text" id="service_staff_assigned_'+service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id+'" value="'+format_currency(service_staff_commissions[i].commission)+'" onblur="update_format_money(this);" onkeyup="update_format_money(this);" placeholder="commission" class="text-right text-bold text-black"></td>';
                    str += '</tr>';
                    break;
                }
            }
        }
    }
    $('#service_staff_id_assigned').select2('val',staff_selected_arr);
    $('#service_staff_assigned').empty().append(str);
}

// Is this useless ?
function get_commission() {
    //Staff commission
    var staff_commission    = new Object();
    var commission          = 0;
    order_obj.commission    = 0;
    staff_commissions       = [];
    if (order_obj.staffs != null) {
        for (var i = 0; i < order_obj.staffs.length; i++) {
            commission          = 0;
            commission          = un_format_money($.trim($("#staff_assigned_"+order_obj.staffs[i]).val()));

            staff_commission                = {};
            staff_commission.uid            = order_obj.staffs[i];
            staff_commission.commission     = commission;
            staff_commissions[i]            = staff_commission;
            order_obj.commission            += parseFloat(commission);
        }
    }
}

// Get service staff commission selected, then add it to service_staff_commissions
function get_service_staff_commission() {
    //Staff commission
    var staff_assign        = $('#service_staff_id_assigned').val();
    var s_id                = $('#sid_selected').val();
    var s_quantity          = $('#s_quantity').val();
    var s_type              = $('#s_type').val();
    var s_dup               = $('#s_dup').val();
    var s_commission_plan   = $('#s_commission_plan_').val();
    
    // Remove current commissions of this service
    for (var i = 0; i < service_staff_commissions.length; i++) {
        if (service_staff_commissions[i].sid == s_id && service_staff_commissions[i].type == s_type && service_staff_commissions[i].ord_detail_id == s_dup) {
            service_staff_commissions.splice(i,1);
            i = i-1;
        }
    }
    
    // Assign selected staff commissions
    if (staff_assign != null) {
        for (var i = 0; i < staff_assign.length; i++) {
            var staff_assign_ = staff_assign[i].split('_');

            var commission_percent  = ($.trim($("#service_staff_percent_assigned_"+staff_assign[i]).val()));
            var commission_money    = un_format_money($.trim($("#service_staff_money_assigned_"+staff_assign[i]).val()));
            var commission          = un_format_money($.trim($("#service_staff_assigned_"+staff_assign[i]).val()));
            var commission_plan     = $("input[type='radio'][name='commission_plan_"+staff_assign[i]+"']:checked").val();

            staff_commission                = {};
            staff_commission.uid            = staff_assign_[0];
            staff_commission.group_id       = staff_assign_[1];
            staff_commission.commission_percent = commission_percent;
            staff_commission.commission_money   = commission_money;
            staff_commission.s_commission_plan  = s_commission_plan;
            staff_commission.commission         = commission;
            staff_commission.plan           = commission_plan;
            staff_commission.sid            = s_id;
            staff_commission.type           = s_type;
            staff_commission.quantity       = s_quantity;
            staff_commission.ord_detail_id  = s_dup;
            staff_commission.commission_sharing = staff_assign.length;
            service_staff_commissions[service_staff_commissions.length] = staff_commission;
        }
    }
    return;
}

// Show service staff commission on order
function set_service_staff_commission() {
    var s_id    = $('#sid_selected').val();
    var s_type  = $('#s_type').val();
    var s_dup   = $('#s_dup').val();
    var str = '';
    for (var i = 0; i < service_staff_commissions.length; i++) {
        if (service_staff_commissions[i].sid == s_id && service_staff_commissions[i].type == s_type && service_staff_commissions[i].ord_detail_id == s_dup ) {
            for (var j = 0; j < staff_list.length; j++) {
                if (service_staff_commissions[i].uid == staff_list[j].id) {

                    var com_money = (VIEW_COMMISSION == true) ? format_currency(service_staff_commissions[i].commission) : '';

                    if (staff_list[j].image != '')
                        str += '<span class="m-r-xs text-center text-xs inline" data-toggle="tooltip" data-placement="top" title="'+staff_list[j].fullname+'"><img src="'+BASE_URL+'files/'+COMPANY_N+'/avatar/'+staff_list[j].image+'" class="avatar-30" /><br>'+com_money+'</span>';
                    else
                        str += '<span class="m-r-xs text-center text-xs inline" data-toggle="tooltip" data-placement="top" title="'+staff_list[j].fullname+'"><img src="'+BASE_URL+'assets/img/default_avatar.jpg" class="avatar-30 m-r-xs" /><br>'+com_money+'</span>';
                    break;
                }
            }
        }
    }
    $('#service_staff_list_'+s_id+'_'+s_type+'_'+s_dup).empty().append(str);
    $('[data-toggle="tooltip"]').tooltip();
}

// Reset commission of previous service on modal
function reset_service_staff_commission() {
    $('#service_staff_id_assigned').select2('val','');
    $('#service_staff_assigned').empty();
}

// Reset attr product of previous service on modal
function reset_new_attrition_product() {
    $('#attrition_product_id').select2('val','');
    $('#attrition_product_assigned').empty();
}

function update_return_money() {
    var total = order_obj.total;
    var add_money = ($.trim($('#add_money').val()) != '')? $.trim($('#add_money').val()): 0;
    var return_money = 0;

    add_money = (add_money != 0) ? add_money.split(',').join('') : 0;
    if (add_money != 0)
        return_money = add_money - total;

    $('#return_money').val(format_currency(return_money));
}


/**
 * Function update payment info (discount/tax/total)
 *
 * field_type == null: update anything except discount_money/tax_money
 * field_type == 1: update discount_money
 * field_type == 2: update tax_money
 */
function update_payment(field_type = false) {
    var total       = parseInt(order_obj.sub_total);
    if(field_type == 1){
        // Get fee value
        var discount_symbol = 0;
        var discount        = un_format_money($('#order_discount').val() || 0); 
        var tax             = un_format_money($('#tax').val() || 0);
        var tax_symbol      = $('#tax_symbol').val() == '%'? 1: 0;
        // Update current discount
        $('#discount').val(format_currency(discount));
        $('#discount_symbol').val(0);
        $('#discount_symbol').next('.fee-symbol').text(BASE_CURRENCY_SYMBOL);
        // Update other fee
        total -= discount;
        if(tax_symbol){ 
            $('#order_tax').val(format_currency(total*tax/100));
            tax_money = total*tax/100;
        }
        else{
            $('#order_tax').val(format_currency(tax));
            tax_money = tax;
        }
        total = parseFloat(total) + parseFloat(tax_money);
    }else if(field_type == 2){
        // Get fee values
        var tax_symbol      = 0;
        var discount        = un_format_money($('#discount').val() || 0); 
        var tax             = un_format_money($('#order_tax').val() || 0); 
        var discount_symbol = $('#discount_symbol').val() == '%'? 1: 0;
        // Update other fees
        if(discount_symbol){ 
            $('#order_discount').val(format_currency(total*discount/100));
            discount_money = total*discount/100;
        }
        else{
            $('#order_discount').val(format_currency(discount));
            discount_money = discount;
        }
        total -= parseInt(un_format_money($('#order_discount').val()));
        // Update tax
        $('#tax').val(format_currency(tax));
        $('#tax_symbol').val(0);
        $('#tax_symbol').next('.fee-symbol').text(BASE_CURRENCY_SYMBOL);
        total = parseFloat(total) + parseFloat(tax);
    }else{
        // Get fee values
        var tax         = ($.trim($('#tax').val()) != '' && $('#tax').length > 0)? un_format_money($.trim($('#tax').val())): 0;
        var discount    = ($.trim($('#discount').val()) != '' && $('#discount').length > 0)? un_format_money($.trim($('#discount').val())): 0;
        // Get fee symbol
        var tax_symbol         = $('#tax_symbol').val() == '%'? 1: 0;
        var discount_symbol    = $('#discount_symbol').val() == '%'? 1: 0;
        // Update fee money 
        if(discount_symbol){ 
            $('#order_discount').val(format_currency(total*discount/100));
            discount_money = total*discount/100;
        }
        else{
            $('#order_discount').val(format_currency(discount));
            discount_money = discount;
        }
        total -= parseInt(un_format_money($('#order_discount').val()));
        if(tax_symbol){ 
            $('#order_tax').val(format_currency(total*tax/100));
            tax_money = total*tax/100;
        }
        else{
            $('#order_tax').val(format_currency(tax));
            tax_money = tax;
        }
        total = parseFloat(total) + parseFloat(tax_money);
    }

    // Update promotion
    if(typeof(order_obj.happy_hour) !== 'undefined' && (order_obj.coupon_code === '' || typeof order_obj.coupon_code === 'undefined')){
        order_obj.happy_hour.discount            = discount;
        order_obj.happy_hour.discount_symbol     = discount_symbol;
        order_obj.happy_hour.tax                 = tax;
        order_obj.happy_hour.tax_symbol          = tax_symbol;
    }

    order_obj.tax       = tax_money || tax;
    order_obj.discount_percent   = discount;
    order_obj.discount  = discount_money || discount;
    order_obj.total     = total;

    if(!ORDER_PAID) ORDER_REMAIN = order_obj.total;
    $('#order_total').val(format_currency(total));
    update_order_commission();
    $('#ord_remain').val(format_currency(ORDER_REMAIN));
    update_order_payment();

    // Remove promotion + happy hour
    if(field_type){
        delete order_obj.happy_hour_code;
        remove_promotion();
    }
}

function update_format() {
    var total         = un_format_money($.trim($('#order_total').val()));
    order_obj.total   = total;
    $('#order_total').val(format_currency(total));
}

function update_discount() {
    if ($.trim($('#order_discount_percent').val()) != '') {
        var total       = order_obj.sub_total;
        var discount_percent = ($.trim($('#order_discount_percent').val()) != '')? $.trim($('#order_discount_percent').val()): 0;

        var discount = (discount_percent * total) / 100;
        $('#order_discount').val(format_currency(discount));
        update_payment();
    }
}

function scroll_bottom_order() {
    $('.pre-order-box').animate({
        scrollTop: $('.pre-order-box')[0].scrollHeight
    }, 300);
}

function get_customer(uid){
    $.ajax({
        url: BASE_URL+"ManageUser/get_customer",
        type: "get",
        dataType: 'json',
        data: {
            get_customer: 'yes',
            uid:uid
        },
        success: function (data) {
            if (typeof(data) == 'object') {
                if (data.status == 'ok') {
                    repoFormatSelection_2(data.customer);

                    $('#check_get_customer').prop('checked', true);
                    $('.sw').removeClass('hide');
                    $('#input_cus_phone').attr('readonly','readonly');

                } else {
                    alert('Load failed, please try again.');
                }
            }
        }
    });
}

function load_bed_list() {
    $('#modal_bed .modal-content').empty().append('<br><br><br><h5 class="text-center">Loading...</h5><br><br><br>');
    $.ajax({
        url: BASE_URL+"ManageRoom/load_bed_list",
        type: "get",
        data: {
            load_bed_list: 'yes'
        },
        success: function (data) {
            $('#modal_bed .modal-content').empty().append(data);
        }
    });
}

function update_ord_remain(element){
    if($(element).attr('id').includes('remain')){
        if(un_format_money($(element).val()) > ORDER_REMAIN) $(element).val(format_currency(ORDER_REMAIN));
        var order_prepay = ORDER_REMAIN - un_format_money($('#ord_remain').val());
        $('#ord_prepay').val(format_currency(order_prepay));
    }else{
        var order_remain = ORDER_REMAIN - un_format_money($('#ord_prepay').val());
        $('#ord_remain').val(format_currency(order_remain<0?0:order_remain));
    }
    update_order_payment();
    return;
}

// Delete or add/minus by clicking buttons
function item_quantity(action_id, item_id, type, duplicate) {
    if (type == 1) {
        var element = $('#tab_1 ul.list-services > li[value = "'+item_id+'"]');
    } else if(type == 2) {
        var element = $('#tab_pro_1 ul.list-products > li[value = "'+item_id+'"]');
    }else if (type == 3){
        calculate_card(action_id, item_id, duplicate);
        return;
    }else{
        var element = $('.list-prepay-cards > li[value = "'+item_id+'"]');
    }
    if (action_id == 1) {
        calculate_order(element,'plus',1,duplicate);
    } else if (action_id == 2) {
        calculate_order(element,'minus',1,duplicate);
    } else if (action_id == 3) {
        calculate_order(element,'delete',1,duplicate);
    }
    return;
}

// Assign new value for service/product
function update_quantity(obj, item_id, type,duplicate) {
    var quantity = obj.value;
    if (type == 1) {
        var element = $('#tab_1 ul.list-services > li[value = "'+item_id+'"]');
    } else if(type == 2) {
        var element = $('#tab_pro_1 ul.list-products > li[value = "'+item_id+'"]');
    } else if(type == 4) {
        var element = $(`ul.list-prepay-cards > li[value="${item_id}"]`);
    }
    calculate_order(element,'assign',quantity,duplicate); // To make it clearly, assign means that give the quantity this new value, instead of adding value to quantity
    return;
}

function update_commission_on_bill(){
    for(var i = 0; i < service_arr.length; i++){
        for (var j = 0; j < service_staff_commissions.length; j++) {
            if (service_arr[i].s_id == service_staff_commissions[j].sid && service_arr[i].type == service_staff_commissions[j].type && service_arr[i].dup_count == service_staff_commissions[j].ord_detail_id) {
                if (service_arr[i].commission_plan == 1) {
                    service_staff_commissions[j].commission = service_staff_commissions[j].commission_money * service_arr[i].s_quantity;
                } else if(service_arr[i].commission_plan == 2) {
                    service_staff_commissions[j].commission = service_staff_commissions[j].commission_percent * service_arr[i].s_total/100;
                }
            }
        }
    }
    return;
}

// Show modal to modify service staff commission
function show_assign_service_staff(sid,type,duplicate){
    $('#sid_selected').val(sid);
    $('#s_type').val(type);
    $('#s_dup').val(duplicate);
    var s_commission = 0;

    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].s_id == sid && (service_arr[i].type == type || (type == 3 && service_arr[i].use_service_card == 0))) {
            $('#modal_staff_assign .modal-header h4').empty().append(service_arr[i].s_name);
            s_commission = service_arr[i].commission;
            $('#s_commission').val(s_commission);
            $('#s_quantity').val(service_arr[i].s_quantity);
            $('#s_commission_plan_').val(service_arr[i].commission_plan);
            break;
        }
    }
    reset_service_staff_commission();
    gen_service_staff(sid,type,duplicate);
    $('#modal_staff_assign').modal('show');
}

function append_order_payment_history(order_payment_return){
    var str = '';
    for (var i = 0; i < order_payment_return.ord_prepaid_list.length; i++) {
        str += '<tr>';
        str += '    <td>';
        str += '        <strong>#'+order_payment_return.ord_prepaid_list[i].id+'</strong><br>';
        str += '        <span class="text-xs">'+order_payment_return.ord_prepaid_list[i].created_date+'</span>';
        str += '    </td>';
        str += '    <td>'+order_payment_return.ord_prepaid_list[i].payment_method_name+'</td>';
        str += '    <td class="text-right"><strong>'+format_currency(order_payment_return.ord_prepaid_list[i].prepay)+' ('+CURRENT_CURRENCY+')</strong></td>';
        str += '    <td class="text-right text-danger">'+format_currency(order_payment_return.ord_prepaid_list[i].remain_money)+' ('+CURRENT_CURRENCY+')</td>';
        str += '</tr>';
    }
    $('#tbl_payment_history tbody').empty().append(str);
}

function change_unit_discount(obj,item_id,type,duplicate) {
    
    if (ORDER_PAID === true) return;
    var unit = $(obj).text();
    if (unit == BASE_CURRENCY_SYMBOL) {
        $(obj).text('%');
    } else {
        $(obj).text(BASE_CURRENCY_SYMBOL);
    }
    var element = $('#item_discount_'+item_id+'_'+type+'_'+duplicate+' input');
    change_value_discount(element,item_id,type, duplicate);
}

function show_assign_attrition_product(sid,type,quantity,dup_count){
    $('#attrition_product_sid_selected').val(sid);
    $('#attrition_product_s_type').val(type);
    $('#attrition_product_sid_quantity').val(quantity);
    $('#attrition_product_dup_count').val(dup_count);
    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].s_id == sid && service_arr[i].type == type && service_arr[i].dup_count == dup_count) {
            $('#modal_attrition_product .modal-header h4').empty().append(service_arr[i].s_name + ' x'+quantity);
            break;
        }
    }
    reset_new_attrition_product();
    gen_new_attrition_product(sid,type,quantity,dup_count);
    $('#modal_attrition_product').modal('show');
}

function set_attrition_product (sid,dup_count) {
    var str = '';
    var flag = false;
    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].type == SERVICE_TYPE) {

            str += '<tr>';
            str += '<td colspan="3"><div class="b-t m-t-sm m-b-sm"><strong>'+service_arr[i].s_name+'</strong></div></td>';
            str += '<td class="text-right"><div class="b-t m-t-sm m-b-sm"><strong>x'+service_arr[i].s_quantity+'</strong></div></td>';
            str += '</tr>';

            flag = false;
            for (var h = 0; h < order_attrition_products.length; h++) {
                if (service_arr[i].s_id == order_attrition_products[h].sid && order_attrition_products[h].ord_detail_id == service_arr[i].dup_count) {// Exist attr_product
                    
                    for (var k = 0; k < attrition_products.length; k++) {
                        if (order_attrition_products[h].pid == attrition_products[k].id) {

                            flag = true;

                            var temp = $('#attrition_product_assigned_order_'+service_arr[i].s_id+'_'+order_attrition_products[h].pid+'_'+order_attrition_products[h].ord_detail_id).val();

                            if (service_arr[i].s_id == sid) {
                                temp = parseFloat(service_arr[i].s_quantity) * parseFloat(order_attrition_products[h].attrition_quantity);
                                temp = Math.round(temp*1000)/1000;
                            }

                            var unit_symbol = (attrition_products[k].unit_symbol != null)? attrition_products[k].unit_symbol : ' unit';

                            str += '<tr id="tr_attr_prod_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'">';
                            if (attrition_products[k].image != '')
                                str += '    <td style="width:35px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/product/'+attrition_products[k].image+'" class="thumb-xs m-r-xs m-b-xs" /></td>';
                            else
                                str += '    <td style="width:35px"><img src="'+BASE_URL+'assets/img/no-img.jpg" class="thumb-xs m-r-xs m-b-xs"/></td>';
                            str += '    <td class="'+(attrition_products[k].status == 1 ? 'text-danger' : '')+'">'+attrition_products[k].product_name+(attrition_products[k].status == 1 ? ' (Blocked)' : '')+'<br><span class="text-xxs text-italic text-success">('+order_attrition_products[h].attrition_quantity+' '+unit_symbol+')</span></td>';
                            str += '    <td class="text-right" style="width:145px;">';
                            str += '    <input value="'+temp+'" style="width:100px; max-width:95%" type="text" id="attrition_product_assigned_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'" placeholder="" class="text-right text-bold text-black" />';

                            str += '    <input type="hidden" value="'+order_attrition_products[h].attrition_quantity+'" id="attr_quantity_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'"/>';

                            str += '    </td>';
                            str += '    <td style="width: 40px">&nbsp;'+unit_symbol+'</td>';
                            str += '</tr>';
                        }
                    }
                }
            }
            if (!flag) {
                for (var j = 0; j < service_attrition_product.length; j++) {
                    if (service_arr[i].s_id == service_attrition_product[j].sid) {
                        for (var k = 0; k < attrition_products.length; k++) {
                            if (service_attrition_product[j].pid == attrition_products[k].id) {

                                var temp = $('#attrition_product_assigned_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count).val();
                                if (service_arr[i].s_id == sid && service_arr[i].dup_count == dup_count) {
                                    temp = parseFloat(service_arr[i].s_quantity) * parseFloat(service_attrition_product[j].attrition_quantity);
                                    temp = Math.round(temp*1000)/1000;
                                }
                                if (temp == null) temp = service_attrition_product[j].attrition_quantity;

                                var temp_attr_quantity = $('#attr_quantity_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count).val();
                                if (temp_attr_quantity == null) temp_attr_quantity = service_attrition_product[j].attrition_quantity;

                                var unit_symbol = (attrition_products[k].unit_symbol != null)? attrition_products[k].unit_symbol : ' unit';

                                str += '<tr id="tr_attr_prod_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'">';
                                if (attrition_products[k].image != '')
                                    str += '    <td style="width:40px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/product/'+attrition_products[k].image+'" class="thumb-xs m-r-xs m-b-xs" /></td>';
                                else
                                    str += '    <td style="width:40px"><img src="'+BASE_URL+'assets/img/no-img.jpg" class="thumb-xs m-r-xs m-b-xs"/></td>';
                                str += '    <td class="'+(attrition_products[k].status == 1 ? 'text-danger' : '')+'">'+attrition_products[k].product_name+(attrition_products[k].status == 1 ? ' (Blocked)' : '')+'<br><span class="text-xxs text-italic text-success">('+service_attrition_product[j].attrition_quantity+' '+unit_symbol+')</span></td>';
                                str += '    <td class="text-right" style="width:145px;">';
                                str += '    <input value="'+temp+'" style="width:100px; max-width:95%" type="text" id="attrition_product_assigned_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'" placeholder="" class="text-right text-bold text-black" />';

                                str += '    <input type="hidden" value="'+temp_attr_quantity+'" id="attr_quantity_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'"/>';

                                str += '    </td>';
                                str += '    <td style="width: 40px">&nbsp;'+unit_symbol+'</td>';
                                str += '</tr>';
                            }
                        }
                    }
                }
            }

            if (ORDER_PAID === false) {
                str += '<tr id="sv_attr_prod_tr_'+service_arr[i].s_id+'_'+service_arr[i].dup_count+'">';
                str += '    <td colspan="4">';
                str += '        <button onclick="show_assign_attrition_product('+service_arr[i].s_id+',1,'+service_arr[i].s_quantity+','+service_arr[i].dup_count+')" class="btn btn-xs btn-icon btn-default btn-rounded btn-dashed" data-toggle="tooltip" data-placement="right" title="" data-original-title="Thêm sản phẩm tiêu hao"><i class="fa fa-plus"></i></button>';
                str += '    </td>';
                str += '</tr>';
            }
        }
    }
    $('#attrition_product_assigned_order').empty().append(str);
    $('[data-toggle="tooltip"]').tooltip();

    get_order_attrition_product();
    return;
}

function set_order_attrition_by_load(){
    var str = '';
    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].type == SERVICE_TYPE) {

            str += '<tr>';
            str += '<td colspan="3"><div class="b-t m-t-sm m-b-sm"><strong>'+service_arr[i].s_name+'</strong></div></td>';
            str += '<td class="text-right"><div class="b-t m-t-sm m-b-sm"><strong>x'+service_arr[i].s_quantity+'</strong></div></td>';
            str += '</tr>';

            for (var h = 0; h < order_attrition_products.length; h++) {
                if (service_arr[i].s_id == order_attrition_products[h].sid && service_arr[i].dup_count == order_attrition_products[h].ord_detail_id) {

                    for (var k = 0; k < attrition_products.length; k++) {
                        if (order_attrition_products[h].pid == attrition_products[k].id) {

                            var temp = order_attrition_products[h].quantity;

                            var unit_symbol = (attrition_products[k].unit_symbol != null)? attrition_products[k].unit_symbol : ' unit';

                            str += '<tr id="tr_attr_prod_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'">';
                            if (attrition_products[k].image != '')
                                str += '    <td style="width:40px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/product/'+attrition_products[k].image+'" class="thumb-xs m-r-xs m-b-xs" /></td>';
                            else
                                str += '    <td style="width:40px"><img src="'+BASE_URL+'assets/img/no-img.jpg" class="thumb-xs m-r-xs m-b-xs"/></td>';
                            str += '    <td class="'+(attrition_products[k].status == 1 ? 'text-danger' : '')+'">'+attrition_products[k].product_name+(attrition_products[k].status == 1 ? ' (Blocked)' : '')+'<br><span class="text-xxs text-italic text-success">('+order_attrition_products[h].attrition_quantity+' '+unit_symbol+')</span></td>';
                            str += '    <td class="text-right" style="width:145px;">';
                            str += '    <input value="'+temp+'" style="width:100px; max-width:95%" type="text" id="attrition_product_assigned_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'" placeholder="" class="text-right text-bold text-black" />';

                            str += '    <input type="hidden" value="'+order_attrition_products[h].attrition_quantity+'" id="attr_quantity_order_'+service_arr[i].s_id+'_'+attrition_products[k].id+'_'+service_arr[i].dup_count+'"/>';

                            str += '    </td>';
                            str += '    <td style="width: 40px">&nbsp;'+unit_symbol+'</td>';
                            str += '</tr>';
                        }
                    }
                }
            }

            if (ORDER_PAID === false) {
                str += '<tr id="sv_attr_prod_tr_'+service_arr[i].s_id+'_'+service_arr[i].dup_count+'">';
                str += '    <td colspan="4">';
                str += '        <button onclick="show_assign_attrition_product('+service_arr[i].s_id+',1,'+service_arr[i].s_quantity+','+service_arr[i].dup_count+')" class="btn btn-xs btn-icon btn-default btn-rounded btn-dashed" data-toggle="tooltip" data-placement="right" title="" data-original-title="Thêm sản phẩm tiêu hao"><i class="fa fa-plus"></i></button>';
                str += '    </td>';
                str += '</tr>';
            }
        }
    }
    $('#attrition_product_assigned_order').empty().append(str);
    $('[data-toggle="tooltip"]').tooltip();

    return;
}

function load_order_attrition_product() {
    var service_attrition_product_obj = {};
    order_attrition_products = [];

    for(var i = 0; i < service_arr.length; i++) {
        for (var j = 0; j < order_attrition.length; j++) {
            if (service_arr[i].s_id == order_attrition[j].sid && service_arr[i].dup_count == order_attrition[j].ord_detail_id) {
                service_attrition_product_obj = {};
                service_attrition_product_obj.sid           = service_arr[i].s_id;
                service_attrition_product_obj.pid           = order_attrition[j].pid;
                service_attrition_product_obj.item_name     = order_attrition[j].item_name;
                service_attrition_product_obj.quantity      = order_attrition[j].quantity;
                service_attrition_product_obj.attrition_quantity = order_attrition[j].attrition_quantity;
                service_attrition_product_obj.ord_detail_id = order_attrition[j].ord_detail_id;

                order_attrition_products[order_attrition_products.length] = service_attrition_product_obj;
            }
        }
    }
    set_order_attrition_by_load();
    return;
}

function get_order_attrition_product() {
    var service_attrition_product_obj = {};
    order_attrition_products = [];
    for(var i = 0; i < service_arr.length; i++) {
        for (var j = 0; j < attrition_products.length; j++) {
            service_attrition_product_obj = {};
            if ($('#attrition_product_assigned_order_' + service_arr[i].s_id + '_' + attrition_products[j].id+'_'+service_arr[i].dup_count).length != 0) {
                service_attrition_product_obj.sid           = service_arr[i].s_id;
                service_attrition_product_obj.pid           = attrition_products[j].id;
                service_attrition_product_obj.item_name     = attrition_products[j].product_name;
                service_attrition_product_obj.quantity      = $('#attrition_product_assigned_order_' + service_arr[i].s_id + '_' + attrition_products[j].id+'_'+service_arr[i].dup_count).val();
                service_attrition_product_obj.attrition_quantity = $('#attr_quantity_order_' + service_arr[i].s_id + '_' + attrition_products[j].id+'_'+service_arr[i].dup_count).val();
                service_attrition_product_obj.ord_detail_id = service_arr[i].dup_count;

                order_attrition_products[order_attrition_products.length] = service_attrition_product_obj;
            }
        }
    }
    return;
}

function set_order_attrition_product() {
    var sid        = $('#attrition_product_sid_selected').val();
    var pid_arr    = $('#attrition_product_id').val();
    var dup_count  = $('#attrition_product_dup_count').val();
    var str = '';
    if (pid_arr != null) {
        for (var i = 0; i < pid_arr.length; i ++) {
            if ($('#attrition_product_assigned_order_'+sid+'_'+pid_arr[i]+'_'+dup_count).length == 0) {
                for (var j = 0; j < attrition_products.length; j++) {
                    if (pid_arr[i] == attrition_products[j].id) {
                        var temp = $('#attrition_product_assigned_'+pid_arr[i]+'_'+dup_count).val();
                        if (temp == null) temp = 0;

                        var temp_attr_quantity = temp_attr_quantity = $('#attrition_product_quantity_assigned_'+pid_arr[i]+'_'+dup_count).val();
                        if (temp_attr_quantity == null || temp_attr_quantity == 0) {
                            for (var t = 0; t < service_arr.length; t++) {
                                if (sid == service_arr[t].s_id && service_arr[t].type == SERVICE_TYPE && dup_count == service_arr[t].dup_count) {
                                    temp_attr_quantity = parseFloat(temp) / parseFloat(service_arr[t].s_quantity);
                                    temp_attr_quantity = Math.round(temp_attr_quantity*1000)/1000;
                                    break;
                                }
                            }
                        }
                        temp_attr_quantity = (temp_attr_quantity == null) ? 0 : temp_attr_quantity;

                        var unit_symbol = (attrition_products[j].unit_symbol != null)? attrition_products[j].unit_symbol : ' unit';
                        str += '<tr id="tr_attr_prod_order_'+sid+'_'+pid_arr[i]+'">';
                        if (attrition_products[j].image != '')
                            str += '    <td style="width:40px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/product/'+attrition_products[j].image+'" class="thumb-xs m-r-xs m-b-xs" /></td>';
                        else
                            str += '    <td style="width:40px"><img src="'+BASE_URL+'assets/img/no-img.jpg" class="thumb-xs m-r-xs m-b-xs"/></td>';
                        str += '    <td class="'+(attrition_products[j].status == 1 ? 'text-danger' : '')+'">'+attrition_products[j].product_name+(attrition_products[j].status == 1 ? ' (Blocked)' : '')+'</td>';
                        str += '    <td class="text-right" style="width:145px;">';
                        str += '        <input value="'+temp+'" style="width:100px; max-width:95%" type="text" id="attrition_product_assigned_order_'+sid+'_'+pid_arr[i]+'_'+dup_count+'" placeholder="" class="text-right text-bold text-black">';
                        str += '        <input type="hidden" value="'+temp_attr_quantity+'" id="attr_quantity_order_'+sid+'_'+pid_arr[i]+'_'+dup_count+'"/>';
                        str += '    </td>';
                        str += '    <td style="width: 40px">&nbsp;'+unit_symbol+'</td>';
                        str += '</tr>';
                        break;
                    }
                }
            } else {
                $('#attrition_product_assigned_order_'+sid+'_'+pid_arr[i]+'_'+dup_count).val($('#attrition_product_assigned_'+pid_arr[i]+'_'+dup_count).val());
            }
        }
    }
    $('#sv_attr_prod_tr_'+sid+'_'+dup_count).prev().after(str);

    var flag = false;
    for (var i = 0; i < attrition_products.length; i++) {
        flag = false;
        if (pid_arr != null) {
            for (var j = 0; j < pid_arr.length; j++) {
                if (attrition_products[i].id == pid_arr[j]) {
                    flag = true;
                    break;
                }
            }
        }
        if (!flag) {
            $('#tr_attr_prod_order_'+sid+'_'+attrition_products[i].id+'_'+dup_count).remove();
        }
    }

    get_order_attrition_product();

    return;
}

function gen_new_attrition_product(sid,type,quantity,dup_count){
    var pid_arr = [];
    var flag = false;
    for (var h = 0; h < order_attrition_products.length; h++) {
        flag = false;
        if (sid == order_attrition_products[h].sid && order_attrition_products[h].ord_detail_id == dup_count) {
            flag = true;
            for (var k = 0; k < attrition_products.length; k++) {
                if (order_attrition_products[h].pid == attrition_products[k].id) {
                    pid_arr[pid_arr.length] = order_attrition_products[h].pid;
                }
            }
        }
    }

    $('#attrition_product_id').select2('val',pid_arr);
    set_new_attrition_product(sid,pid_arr,2,dup_count);
    return;
}

function set_new_attrition_product(sid,pid_arr,gen_type,dup_count) { //gen_type: 1 - gen from select new attrition product, 2 - gen from order attrition product
    var attrition_product_assigned = pid_arr;
    var str = '';
    if (attrition_product_assigned != null && attrition_product_assigned.length > 0) {
        for (var i = 0; i < attrition_product_assigned.length; i++) {
            for (var j = 0; j < attrition_products.length; j++) {
                if (attrition_product_assigned[i] == attrition_products[j].id) {
                    var temp = (gen_type != null && gen_type == 2) ? $('#attrition_product_assigned_order_'+sid+'_'+attrition_product_assigned[i]+'_'+dup_count).val() : $('#attrition_product_assigned_'+attrition_product_assigned[i]+'_'+dup_count).val();
                    if (temp == null) temp = 0;

                    var temp_attr_quantity = $('#attr_quantity_order_'+sid+'_'+attrition_product_assigned[i]+'_'+dup_count).val();
                    if (temp_attr_quantity == null) temp_attr_quantity = 0;

                    var unit_symbol = (attrition_products[j].unit_symbol != null)? attrition_products[j].unit_symbol : ' unit';

                    str += '<tr>';
                    if (attrition_products[j].image != '')
                        str += '    <td style="width:40px"><img src="'+BASE_URL+'files/'+COMPANY_N+'/product/'+attrition_products[j].image+'" class="thumb m-r-xs m-b-xs" /></td>';
                    else
                        str += '    <td style="width:40px"><img src="'+BASE_URL+'assets/img/no-img.jpg" class="thumb m-r-xs m-b-xs"/></td>';
                    str += '    <td class="'+(attrition_products[j].status == 1 ? 'text-danger' : '')+'">'+attrition_products[j].product_name+(attrition_products[j].status == 1 ? ' (Blocked)' : '')+'</td>';
                    str += '    <td class="text-right" style="width:145px;">';
                    str += '        <input value="'+temp+'" style="width:100px; max-width:95%" type="text" id="attrition_product_assigned_'+attrition_product_assigned[i]+'_'+dup_count+'" placeholder="0" class="text-right text-bold text-black">';
                    str += '        <input value="'+temp_attr_quantity+'" type="hidden" id="attrition_product_quantity_assigned_'+attrition_product_assigned[i]+'_'+dup_count+'"/>';
                    str += '    </td>';
                    str += '    <td style="width: 40px">&nbsp;'+unit_symbol+'</td>';
                    str += '</tr>';
                    break;
                }
            }
        }
    }
    $('#attrition_product_assigned').empty().append(str);
}

// Update all commission of service after updating quantity of service
function update_commission_order(item_id, type, duplicate, quantity_change){
    for(var i = 0; i < service_arr.length; i++){
        if(service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate){
            if(service_arr[i].use_service_card > 0 && service_arr[i].type == 1){// checkin the LT
                total = 0;
                for(var j = 0; j< service_card.length; j++){
                    found = false;
                    if(service_card[j].service_card_value_id > 0){
                        for(var k = 0; k < service_card[j].service_detail.length; k ++){
                            if(service_arr[i].use_service_card == service_card[j].service_detail[k].id){
                                found = true;
                                var discount_ratio = service_card[j].total_price/service_card[j].price;
                                total = service_card[j].service_detail[k].total_price/((service_card[j].service_detail[k].unlimited==1)?1:service_card[j].service_detail[k].times)*service_arr[i].s_quantity*discount_ratio;
                                break;
                            }
                        }
                    }else{
                        if(service_card[j].id == service_arr[i].use_service_card){
                            var discount_ratio = service_card[j].total_price/service_card[j].price;
                            total = (service_card[j].unlimited==1)?(service_card[j].final_price*service_arr[i].s_quantity*discount_ratio):(service_card[j].total_price/service_card[j].times*service_arr[i].s_quantity);
                            break;
                        }
                    }
                    if(found) break;
                }
            }else{
                total = service_arr[i].s_total;
            }
            for(var j = 0; j < service_staff_commissions.length; j++ ){
                if(service_arr[i].s_id == service_staff_commissions[j].sid && service_arr[i].type == service_staff_commissions[j].type && service_arr[i].dup_count == service_staff_commissions[j].ord_detail_id){
                    if(service_staff_commissions[j].commission_percent!=0){
                        service_staff_commissions[j].commission = Math.round(total * service_staff_commissions[j].commission_percent / 100,2);
                    }else{ // Update tien tour
                        if(service_arr[i].type == 3 && service_arr[i].use_service_card == 0){
                            if(parseInt(service_arr[i].times) - parseInt(quantity_change) > 0){
                                service_staff_commissions[j].commission = Math.round(service_staff_commissions[j].commission/(service_arr[i].times-quantity_change)*service_arr[i].times,2);
                            }
                        }else if(parseInt(service_arr[i].s_quantity)-parseInt(quantity_change) > 0){
                            service_staff_commissions[j].commission = Math.round(service_staff_commissions[j].commission/(service_arr[i].s_quantity-quantity_change)*service_arr[i].s_quantity,2);
                        }
                    }
                }
            }
            break;
        }
    }
}

function change_value_discount(element,item_id,type,duplicate) {
    var discount = un_format_money($(element).val());
    var discount_type = $('#item_discount_'+item_id+'_'+type+'_'+duplicate+ ' label').text();

    for(var i = 0; i < service_arr.length; i++){
        if ( service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate){
            var item_price = parseFloat(service_arr[i].s_price);
            var s_total = item_price * service_arr[i].s_quantity;
            if(service_arr[i].use_service_card == 0 && service_arr[i].type == 3) s_total *= service_arr[i].times;
            if (discount_type == BASE_CURRENCY_SYMBOL) {
                service_arr[i].s_discount_unit = BASE_CURRENCY_SYMBOL;
                service_arr[i].s_total = parseFloat(s_total) - parseFloat(discount);
                service_arr[i].s_discount   = parseFloat(discount);
                if(!$(element).attr('readonly') && service_arr[i].s_discount != parseFloat(service_arr[i].s_price - service_arr[i].s_promo_price) * service_arr[i].s_quantity*(service_arr[i].times?service_arr[i].times:1))
                    service_arr[i].s_promo_code = -1;
            } else if(discount_type == '%') {
                service_arr[i].s_discount_unit = '%';
                service_arr[i].s_total = s_total - (s_total * parseFloat(discount)/100);
                service_arr[i].s_discount   = parseFloat(discount);
                if(!$(element).attr('readonly') && service_arr[i].s_discount != (100 - service_arr[i].s_promo_price/service_arr[i].s_price * 100))
                    service_arr[i].s_promo_code = -1;
            }

            if(typeof service_arr[i].prepay !== 'undefined' && service_arr[i].prepay !== null) update_service_prepay(item_id, type, duplicate);
            break;
        }
    }
    update_commission_order(item_id,type,duplicate,0);
    generate_order();
    return;
}

function change_value_price(element,item_id,type,duplicate) {
    var price = un_format_money($(element).val());
    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate){
            service_arr[i].s_price = parseFloat(price);
            service_arr[i].s_total = (service_arr[i].s_discount_unit=="%")
                                    ?(parseFloat(service_arr[i].s_price) * service_arr[i].s_quantity * ((service_arr[i].times)?service_arr[i].times:1))*(100-parseFloat(service_arr[i].s_discount))/100
                                    :(parseFloat(service_arr[i].s_price) * service_arr[i].s_quantity * ((service_arr[i].times)?service_arr[i].times:1))  - parseFloat(service_arr[i].s_discount);
            break;
        }
    }
    update_service_prepay(item_id, type, duplicate);
    update_commission_order(item_id, type, duplicate, 0);
    generate_order();
    return;
}

function change_value_price_total(element, item_id, type, duplicate){
    var total = un_format_money($(element).val());
    for(var i = 0; i < service_arr.length; i++){
        if (service_arr[i].s_id == item_id && service_arr[i].type == type && service_arr[i].dup_count == duplicate){
            service_arr[i].s_total = parseFloat(total);
            break;
        }
    }
    update_service_prepay(item_id, type, duplicate);
    update_commission_order(item_id, type, duplicate, 0);
    generate_order();
    return;
}

// Ajax call to change commissions after editing PAID/PREPAID order
function update_staff_commission(order_id) {
    $.ajax({
        url: BASE_URL+"ManageOrder/update_staff_commission",
        type: "post",
        dataType: 'json',
        data: {
            update_staff_commission: 'yes',
            order_id: order_id,
            service_staff_commissions: service_staff_commissions
        },
        success: function (data) {
            if (typeof (data) == 'object') {
                if (data.status == 'ok') {
                    Notify(data.message);
                }else{
                    Notify(data.message,'danger');
                }
            }
        }
    });
}

// temp data of service combo, in case user only save order
function update_temp_card_data(sid, type, dup_count){
    for(var i = 0;i < service_arr.length; i++){
        if(service_arr[i].s_id == sid && service_arr[i].type == type && service_arr[i].dup_count == dup_count){
            var temp_service_arr = [];
            temp_service_arr.times          = service_arr[i].times;
            temp_service_arr['promotion']       = service_arr[i].promotion;
            temp_service_arr['unlimited']       = service_arr[i].unlimited;
            temp_service_arr['time_expired']    = service_arr[i].expired_date;
            temp_service_arr['service_staff']   = [];
            staff_cms_list = [];
            for(var j = 0; j < service_staff_commissions; j++){
                if(service_staff_commissions[j].sid == sid && service_staff_commissions[j].type == type && service_staff_commissions[j].ord_detail_id == dup_count){
                    staff_cms = [];
                    staff_cms['uid']                = service_staff_commissions[j].uid;
                    staff_cms['group_id']           = service_staff_commissions[j].group_id;
                    staff_cms['commission']         = service_staff_commissions[j].commission;
                    staff_cms['commission_money']   = service_staff_commissions[j].commission_money;
                    staff_cms['commission_percent'] = service_staff_commissions[j].commission_percent;
                    staff_cms_list.push(staff_cms);
                }
            }
            temp_service_arr['commission_staff'] = staff_cms_list;
            
            break;
        }
    }
    
    if(temp_service_arr.length > 0){
        $.ajax({
            url: BASE_URL+'ManageOrder/update_temp_card_data',
            type: "post",
            dataType: 'json',
            data: {
                temp_service_arr: JSON.stringify(temp_service_arr),
                order_detail_id: dup_count
            },
            success: function (data) {
                if (typeof (data) == 'object') {
                    if (data.status == 'fail') {
                        alert(data.message);
                    }
                }
            } 
        })
    }
}

// Update order staff commission of choosen staff
function update_order_staff_commission(staff_assign){
    staff_data = staff_assign.split('_');
    percent = ($('#staff_percent_assigned_'+staff_assign).val());
    commission = (percent > 0) ? parseFloat(percent)*parseFloat(un_format_money($('#order_total').val()))/100 : un_format_money($('#staff_assigned_'+staff_assign).val());
    commission = Math.round(commission);
    console.log(commission);
    $('#staff_assigned_'+staff_assign).val(format_currency(commission));
    for(var i =0; i<service_staff_commissions.length;i++){
        if(service_staff_commissions[i].uid == staff_data[0] && service_staff_commissions[i].group_id == staff_data[1] && service_staff_commissions[i].ord_detail_id == -1){
            service_staff_commissions[i].commission_percent = percent;
            service_staff_commissions[i].commission = commission;
            service_staff_commissions[i].plan = $("input[type='radio'][name='commission_plan_2_"+staff_assign+"']:checked").val();
        }
    }
}

function update_order_commission(){
    for(var i=0;i < service_staff_commissions.length; i++){
        if(service_staff_commissions[i].ord_detail_id == -1){
            update_order_staff_commission(service_staff_commissions[i].uid+'_'+service_staff_commissions[i].group_id);
        }
    }
}

function assign_order_staff_commission(staff_assign){
    staff_data = staff_assign.split('_');
    $('#staff_percent_assigned_'+staff_assign).val(0);
    for(var i =0; i<service_staff_commissions.length;i++){
        if(service_staff_commissions[i].uid == staff_data[0] && service_staff_commissions[i].group_id == staff_data[1] && service_staff_commissions[i].ord_detail_id == -1){
            service_staff_commissions[i].commission_percent = 0;
            service_staff_commissions[i].commission = un_format_money($('#staff_assigned_'+staff_assign).val());
            service_staff_commissions[i].plan = $("input[type='radio'][name='commission_plan_2_"+staff_assign+"']:checked").val();
        }
    }
}

function reset_order(){
    // reset objects of order
    service_staff_commissions = [];
    order_obj = new Object;
    service_arr = [];
    staff_commissions = [];
    order_attrition_products = [];
    // reset order
    $('#ord_date').empty();
    $('.tbl-order>tbody').empty();
    if($('#ckb_prepay').prop('checked')==true) $('#ckb_prepay').click();
    $('#ord_note').val('');
    $('#payment_method_id').val('').change();
    $('#staff_id').val('').change();
    $('#staff_assign').empty();
    $('#bed_id').val('').change();
    $('.tbl-order>tfoot').hide();

    $('.list-services>li').removeClass('active');
    $('.list-products>li').removeClass('active');
    $('.list-service-cards>li').removeClass('active');
    $('.list-prepay-cards>li').removeClass('active');
}
