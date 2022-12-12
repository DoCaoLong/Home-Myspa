var call = null;
var maxTimeDialing = 40000;
var interValTimer = null;
var interValTimerInconming = null;
var timeOutDuration = null;
var stringeeAudio = {};
var incomingCall = null;

var stringeeCallUI = $(document.getElementById('stringee-call-ui'));
var stringeeCallUIContainer = $(document.getElementById('stringee-call-ui-container'));
var callStatus = $(document.getElementsByClassName('call-status'));
var callDuration = $(document.getElementsByClassName('call-duration'));
var callAvatar = $(document.getElementsByClassName('call-ui-avatar'));
var callDisplayNumber = $(document.getElementsByClassName('call-ui-phone-number'));
var reCallBtn = stringeeCallUIContainer.find('#stringee-right-button');
var hangupCallBtn = stringeeCallUIContainer.find('#stringee-left-button');

stringeeAudio["ringing"] = new Audio();
stringeeAudio["ringing"].src = BASE_URL+"assets/audio/ringing.mp3"
stringeeAudio["ringing"].volume  = 0.2;

stringeeAudio["busy"] = new Audio();
stringeeAudio["busy"].src = BASE_URL+"assets/audio/busy.mp3"
stringeeAudio["busy"].volume  = 0.2;

stringeeAudio["end"] = new Audio();
stringeeAudio["end"].src = BASE_URL+"assets/audio/end.mp3"
stringeeAudio["end"].volume  = 0.2;

stringeeAudio["answer"] = new Audio();
stringeeAudio["answer"].src = BASE_URL+"assets/audio/answer.mp3"
stringeeAudio["answer"].volume  = 0.2;

function makeStringeeCall(toNumber,videocall = false) {
	call = new StringeeCall(stringeeClient, STRINGEE_NUMBER, toNumber, videocall);
	settingCallEvent(call);
	call.makeCall(function (res) {
		connecting_stringee_call_ui()
		if(res.r == 10){
			disconnect_stringee_call_ui()
			end_stringee_call_sound_effect()
			callStatus.empty().text(lang['stringee_invalid_phone_number'])
		}
		else if(res.r == 8){
			disconnect_stringee_call_ui()
			end_stringee_call_sound_effect()
			callStatus.empty().text(lang['stringee_not_enough_money'])
		}else if(res.r != 0){
			disconnect_stringee_call_ui()
			end_stringee_call_sound_effect()
			callStatus.empty().text(res.message)
		}
	});
}

function hangupStringeeCall() {
	if(call != null){
		call.hangup(function () {
			localVideo.srcObject = null;
			remoteVideo.srcObject = null;
			end_stringee_call_ui()
			clearTimerTimeout()
		});
	}
}

function rejectStringeeCall() {
	if(call != null){
		call.reject(function (res) {
			localVideo.srcObject = null;
			remoteVideo.srcObject = null;
			disconnect_stringee_call_ui()
			clearTimerTimeout()
		});
	}
}

function answerStringeeCall() {
	if(call != null){
		call.answer(function (res) {
			console.log(res);
			answering_stringee_call_ui()
		});
	}
}

function settingClientEvents(client) {
	show_stringee_connect_status(0)
	client.on('connect', function () {
		show_stringee_connect_status(0)
		console.log('++++++++++++++ connected to StringeeServer');
	});

	client.on('authen', function (res) {
		show_stringee_connect_status(1)
		reset_stringee_call_ui()
		wait_action_stringee_call_ui()
		console.log('authenticate', res.message);
	});

	client.on('otherdeviceauthen', function (res) {
		if(res.status == "authenticated"){
			window.close()
		}
		console.log('otherdeviceauthen', res.status);
	});

	client.on('disconnect', function (r) {
		console.log('++++++++++++++ disconnected');
		disconnect_stringee_call_ui(lang['stringee_try_again_message'])
		show_stringee_connect_status(2)
		init_stringee()
	});

	client.on('incomingcall', function (incomingcall) {
		call = incomingcall;
		settingCallEvent(incomingcall);
		hangupCallBtn.removeClass('stringee-btn-hangup').addClass('stringee-btn-reject')
		reCallBtn.removeClass('stringee-btn-call').addClass('stringee-btn-answer')
		if(call.fromInternal != true){
			$('.loading-area').removeClass('hide')
			$('.loading-area').parent().append('<div class="drop-mask"></div>')
		}
		var get_staff_info = $.ajax({
            url: BASE_URL+"ManageUser/get_customer_info",
            type: "POST",
            data: {
                telephone : convertNumberPhoneDb(call.fromNumber),
                from_internal : call.fromInternal,
            },
		})
		$.when(get_staff_info).done(function(r1){
			if(r1 != 'null'){
				r1 = JSON.parse(r1);
				CUSTOMER_INFO = r1;
				if(call.fromInternal == true){
					CUSTOMER_INFO.display_telephone = (r1.group_name).join(' - ')
					CUSTOMER_INFO.telephone = (r1.id)
				}else {
					customer_frame.attr('src',BASE_URL+"ManageUser/customer_info_frame?member_id="+CUSTOMER_INFO.member_id_encoded)
				}
			}else {
				CUSTOMER_INFO = {
					fullname : lang['guest'],
					telephone : call.fromNumber,
					display_telephone: call.fromNumber,
					image: '',
				}
				customer_frame.attr('src',BASE_URL+"ManageUser/add_customer_frame?telephone="+convertNumberPhoneDb(call.fromNumber))
			}
			if(call.fromInternal != true){
				customer_frame.one('load',function() {
					$('.loading-area').addClass('hide')
					$('.loading-area').parent().find('.drop-mask').remove()
				})
			}
			
			$('#callTo').val(convertNumberPhoneDb(call.fromNumber))
			$('#internal').val((call.fromInternal))
			call.ringing(function (res) {
				init_ui();
				incoming_stringee_call_ui()
				ringing_stringee_sound_effect()
			})
		})

		// console.log('++++++++++++++ incomingcall', incomingcall);
	});

	client.on('requestnewtoken', function () {
		request_token_stringee()
	});
}

function settingCallEvent(call1) {
	call1.on('addlocalstream', function (stream) {
		console.log('addlocalstream');
		// reset srcObject to work around minor bugs in Chrome and Edge.
		localVideo.srcObject = null;
		localVideo.srcObject = stream;
	});

	call1.on('addremotestream', function (stream) {
		console.log('addremotestream');
		// reset srcObject to work around minor bugs in Chrome and Edge.
		remoteVideo.srcObject = null;
		remoteVideo.srcObject = stream;
	});

	call1.on('signalingstate', function (state) {
		console.log('STATUS: ',state.reason);
		switch (state.code) {
			case 0:
				connecting_stringee_call_ui()
				break;
			case 1:
				connecting_stringee_call_ui()
				break;
			case 2: //ringing
				ringing_stringee_call_ui()
				ringing_stringee_sound_effect()
				timeOutDuration = setTimeout(function(){
					hangupStringeeCall()
				},maxTimeDialing)
				break;
			case 3: //aswering
				clearTimeout(timeOutDuration)
				answering_stringee_call_ui()
				answering_stringee_sound_effect()
				var time_f = 0;
				var time_s = 0;
				var time_t = 0;
				var time_l = 0;
				interValTimer = setInterval(function(){
					time_l++;
					if(time_l == 10) {
						time_l = 0
						time_t++
					}
					if(time_t == 60){
						time_t = 0
						time_s++
					}
					if(time_s == 10){
						time_s = 0
						time_f++
					}
					callDuration.empty().text(convert_time(time_f,time_s,time_t,time_l))
					window.document.title = callDuration.text()
					window.focus()
				},1000);
				break;
			case 4: //SIMILAR aswering
				clearTimerTimeout()
				answering_stringee_call_ui()
				break;
			case 5: //busy
				clearTimerTimeout()
				busy_stringee_call_ui()
				busy_stringee_sound_effect()
				localVideo.srcObject = null;
				remoteVideo.srcObject = null;
				break;
			case 6: //end
				clearTimerTimeout()
				end_stringee_call_ui()
				end_stringee_call_sound_effect()
				localVideo.srcObject = null;
				remoteVideo.srcObject = null;
				break;
			default:
				clearTimerTimeout()
				reset_stringee_call_ui()
				break;
		}
	});


	call1.on('mediastate', function (state) {
		console.log('mediastate ');
		// console.log('mediastate ', call1);
		let reCallBtn = $(document).find('#stringee-right-button');
		let hangupCallBtn = $(document).find('#stringee-left-button');
		if(call1.toType != "external"){
			if(state.code == 1){
				hangupCallBtn.removeClass('stringee-btn-reject').addClass('stringee-btn-hangup')
				reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
				reCallBtn.prop('disabled',true)
				clearTimeout(timeOutDuration)
				answering_stringee_call_ui()
				answering_stringee_sound_effect()
				var time_f = 0;
				var time_s = 0;
				var time_t = 0;
				var time_l = 0;
				interValTimerInconming = setInterval(function(){
					time_l++;
					if(time_l == 10) {
						time_l = 0
						time_t++
					}
					if(time_t == 60){
						time_t = 0
						time_s++
					}
					if(time_s == 10){
						time_s = 0
						time_f++
					}
					callDuration.empty().text(convert_time(time_f,time_s,time_t,time_l))
				},1000);
			}
		}
		
	});

	call1.on('info', function (info) {
		console.log('on info:' + JSON.stringify(info));
	});

	call1.on('otherdevice', function (data) {
		console.log('on otherdevice:' + JSON.stringify(data));
		if ((data.type === 'CALL_STATE' && data.code >= 200) || data.type === 'CALL_END') {
		}
	});

}


function convert_time(time_f= 0 , time_s= 0,time_t =0,time_l =0){
		
	return time_f + "" + time_s +"" +":"+time_t+""+time_l;
}


function end_stringee_call_sound_effect(){
	stringeeAudio["ringing"].pause()
	stringeeAudio["answer"].pause()
	stringeeAudio["busy"].pause()
	stringeeAudio["end"].currentTime = 0
	stringeeAudio["end"].play()
}

function ringing_stringee_sound_effect(){
	stringeeAudio["busy"].pause()
	stringeeAudio["end"].pause()
	stringeeAudio["answer"].pause()
	stringeeAudio["ringing"].currentTime = 0
	stringeeAudio["ringing"].play()
}

function answering_stringee_sound_effect(){
	stringeeAudio["ringing"].pause()
	stringeeAudio["busy"].pause()
	stringeeAudio["end"].pause()
	stringeeAudio["answer"].currentTime = 0
	stringeeAudio["answer"].play()
}

function busy_stringee_sound_effect(){
	stringeeAudio["ringing"].pause()
	stringeeAudio["answer"].pause()
	stringeeAudio["end"].pause()
	stringeeAudio["busy"].currentTime = 0
	stringeeAudio["busy"].play()
}

function disconnect_stringee_call_ui(message = lang['stringee_status_disconnected']){
	reCallBtn.prop('disabled',false)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
	hangupCallBtn.prop('disabled',false)
	callAvatar.removeClass('animate-rotate')
	callAvatar.css("box-shadow", "0px 0px 20px 1px red")
	callStatus.empty().text(message).removeClass('text-primary').removeClass('text-success').addClass('text-danger')
	stringeeCallUIContainer.css('background-color','#ffe6e6')
}

function reset_stringee_call_ui(message = lang['stringee_status_connecting']){
	callStatus.empty().text(message).removeClass('text-danger').removeClass('text-success').removeClass('text-primary')
	callDuration.empty()
	callAvatar.css('box-shadow','')
	stringeeCallUIContainer.css('background-color','#f1f1f1')
	reCallBtn.prop('disabled',true)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
	hangupCallBtn.prop('disabled',true)
}

function wait_action_stringee_call_ui(message = lang['stringee_status_wait_action']){
	callStatus.empty().text(message).removeClass('text-danger').removeClass('text-success').removeClass('text-primary')
	callDuration.empty()
	callAvatar.css('box-shadow','')
	stringeeCallUIContainer.css('background-color','#f1f1f1')
	reCallBtn.prop('disabled',true)
	hangupCallBtn.prop('disabled',true)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
}

function connecting_stringee_call_ui(message = lang['stringee_status_connecting']){
	callStatus.empty().text(message).removeClass('text-danger')
	hangupCallBtn.prop('disabled',false)
	reCallBtn.prop('disabled',true)
}

function ringing_stringee_call_ui(message = lang['stringee_status_ringing']){
	callStatus.empty().text(message).removeClass('text-danger').addClass('text-success')
	callAvatar.css("box-shadow", "0px 0px 20px 1px green")
	hangupCallBtn.prop('disabled',false)
	reCallBtn.prop('disabled',true)
	stringeeCallUIContainer.css('background-color','#ddffcf')
}

function incoming_stringee_call_ui(message = lang['stringee_incoming_call']){
	hangupCallBtn.prop('disabled',false)
	reCallBtn.prop('disabled',false)
	reCallBtn.removeClass('stringee-btn-call').addClass('stringee-btn-answer')
	callStatus.empty().text(message).removeClass('text-danger').addClass('text-success')
	callAvatar.css("box-shadow", "0px 0px 20px 1px green")
	stringeeCallUIContainer.css('background-color','#ddffcf')
}

function answering_stringee_call_ui(message = lang['stringee_status_answering']){
	callStatus.empty().text(message).removeClass('text-success').addClass('text-primary')
	callAvatar.css("box-shadow", "0px 0px 20px 1px blue")
	callAvatar.addClass('animate-rotate')
	hangupCallBtn.prop('disabled',false)
	reCallBtn.prop('disabled',true)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
	callDuration.show()
	stringeeCallUIContainer.css('background-color','#ddcfff')
}

function busy_stringee_call_ui(message = lang['stringee_status_busy']){
	callStatus.empty().text(message).removeClass('text-primary').addClass('text-danger')
	callAvatar.css("box-shadow", "0px 0px 20px 1px red");
	callAvatar.removeClass('animate-rotate')
	hangupCallBtn.prop('disabled',true)
	reCallBtn.prop('disabled',false)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
	stringeeCallUIContainer.css('background-color','#ffe6e6');
}

function end_stringee_call_ui(message = lang['stringee_status_end']){
	callStatus.empty().text(message).removeClass('text-primary').addClass('text-danger')
	callAvatar.css("box-shadow", "0px 0px 20px 1px red");
	callAvatar.removeClass('animate-rotate')
	hangupCallBtn.prop('disabled',true)
	reCallBtn.prop('disabled',false)
	reCallBtn.removeClass('stringee-btn-answer').addClass('stringee-btn-call')
	stringeeCallUIContainer.css('background-color','#ffe6e6')
}


function init_ui(){
	if($('#callTo').val() != "null"){
		wait_action_stringee_call_ui()
	}else {
		reset_stringee_call_ui()
	}

	let userName = (CUSTOMER_INFO.fullname).toUpperCase();
	$('.call-role-name').empty().append(CUSTOMER_INFO.vi_name)
	let userAvatar = (CUSTOMER_INFO.image != "" && CUSTOMER_INFO.image != null) ? BASE_URL+"files/avatar/" + CUSTOMER_INFO.image : BASE_URL+"assets/img/default_avatar.jpg";
	let displayNumber = CUSTOMER_INFO.display_telephone;
	if($('#internal').val() == 'true'){
		if(CUSTOMER_INFO.group_name){
			displayNumber = (CUSTOMER_INFO.group_name).join(' - ');
		}
	}
	let callUserName = $(document.getElementsByClassName('call-username'));
	let callDuration = $(document.getElementsByClassName('call-duration'));
	let callAvatar = $(document.getElementsByClassName('call-ui-avatar'));
	var callDisplayNumber = $(document.getElementsByClassName('call-ui-phone-number'));
	let stringeeCallUIContainer = $(document.getElementById('stringee-call-ui-container'));
	let recallBtn = stringeeCallUIContainer.find('.stringee-btn-call');
	let hangupCallBtn = stringeeCallUIContainer.find('.stringee-btn-hangup');
	recallBtn.attr('data-username',userName);
	recallBtn.attr('data-stringee',"true");
	recallBtn.attr('data-phonenumber',$('#callTo').val());
	recallBtn.attr('data-displaynumber',convertNumberPhoneDb(displayNumber));
	callAvatar.attr('src',userAvatar)
	callDuration.empty().hide();
	callDisplayNumber.empty().text(convertNumberPhoneDb(displayNumber));
	callUserName.empty().text(userName);
}


// stringee click
$(document).on('click','.stringee-btn-call',function(){
	let toNumber = $('#callTo').val();
	toNumber = convertNumberPhoneStringee(toNumber);
	makeStringeeCall(toNumber);
})

$(document).on('click','.stringee-btn-answer',function(){
	answerStringeeCall();
	answering_stringee_sound_effect();
})

$(document).on('click','.stringee-btn-reject',function(){
	rejectStringeeCall();
	end_stringee_call_sound_effect()
})

$(document).on('click','.stringee-btn-hangup',function(){
	hangupStringeeCall();
	end_stringee_call_sound_effect()
})

$(document).on('click','.call-dismiss-from',function(){
	hangupStringeeCall();
	end_stringee_call_sound_effect()
	window.close();
})

$(document).on('click','.stringee-incoming .call-dismiss',function(){
	hangupStringeeCall();
	end_stringee_call_sound_effect()
	$('.stringee-incoming').slideUp("slow")
})

function convertNumberPhoneStringee(phoneNumber){
	let phone_area_code = 84
	let convertedPhone = phoneNumber;
	if(phoneNumber.charAt(0) == 0){
		convertedPhone =  phoneNumber.replace(/^.{1}/g, phone_area_code);
	}
	return convertedPhone
}

function convertNumberPhoneDb(phoneNumber){
	let phone_area_code = 0
	let convertedPhone = phoneNumber;
	if(phoneNumber.charAt(0) == 8 && phoneNumber.charAt(1) == 4 && phoneNumber >= 10000000){
		convertedPhone =  phoneNumber.replace(/^.{2}/g, phone_area_code);
	}
	return convertedPhone
}


function clearTimerTimeout(){
	clearInterval(interValTimer);
	clearInterval(interValTimerInconming);
	clearTimeout(timeOutDuration)
}

function show_stringee_connect_status(status)
{
	$('#owner_status').empty()
	let label =''
	let icon = ''
    if (status == 0) {
		label = $('<label>',{class:"text-primary m-r-xs", text: lang['stringee_connecting_status']})
		icon = ' <i class="glyphicon glyphicon-signal text-primary"></i>'
    }
    else if (status == 1) {
		label = $('<label>',{class:"text-success", text: lang['stringee_connected_status']})
		icon = ' <i class="glyphicon glyphicon-signal text-success"></i>'
    }
    else if (status == 2) {
		label = $('<label>',{class:"text-success", text: lang['stringee_cantconnect_status']})
		icon = ' <i class="glyphicon glyphicon-signal text-danger"></i>'
    }
	$('#owner_status').append(label).append(icon)
}

$(window).bind("beforeunload", function() { 
	hangupStringeeCall();
	rejectStringeeCall();
});