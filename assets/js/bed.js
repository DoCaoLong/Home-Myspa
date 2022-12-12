/**
 *  4/22/18.
 */

function set_interval() {
    if (BED_LIST.length && BED_LIST.length > 0) {
        for(var i = 0, ln = BED_LIST.length; i < ln; i++) {
            (function(i) {
                var bed_ = BED_LIST[i];
                if (bed_.checkin == 1) {
                    var interval_id = setInterval(function(){
                        countTime(bed_.time_in, bed_.id, bed_.total_time);
                    },1000);

                    //apply interval
                    var bed = {};
                    bed.id = bed_.id;
                    bed.interval = interval_id;

                    var flag = false;
                    for (var j = 0; j < BED_INTERVAL.length; j++) {
                        if (BED_INTERVAL[j].id == bed.id) {
                            BED_INTERVAL[j].interval = bed.interval;
                            flag = true;
                            break;
                        }
                    }
                    if (!flag) {
                        BED_INTERVAL[BED_INTERVAL.length] = bed;
                    }
                }
            })(i);
        }
    }
}

function checkout(bed_id,order_id) {

    var time = getTime();
    var end_start = getToday();

    $.ajax({
        url: BASE_URL+"ManageRoom/checkout",
        type: "post",
        dataType: 'json',
        data: {
            checkout: 'yes',
            bed_id:bed_id,
            order_id:order_id,
            time: end_start
        },
        success: function (data) {
            if (typeof(data) == 'object') {
                if (data.status == 'ok') {
                    update_bed(bed_id, true);
                }
            }
        }
    });
}

function getToday() {
    var today = new Date();
    var y = today.getFullYear();
    var mo = today.getMonth()+1;
    var d = today.getDate();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    mo = checkTime(mo);
    d = checkTime(d);
    m = checkTime(m);
    s = checkTime(s);

    var date = y + '-' + mo + '-' + d;
    var time = h + ":" + m + ":" + s;
    var time_start = date+' '+time;

    return time_start;
}

function getTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);

    var time = h + ":" + m;

    return time;
}

// Clock
function countTime(time,bed_id,total_time) {

    time = new Date(time.replace(/-/g, '/'));
    var date1   = new Date(time);
    var date2   = new Date();

    var diff = date2.getTime() - date1.getTime();

    var msec = diff;
    var hh = Math.floor(msec / 1000 / 60 / 60);
    msec -= hh * 1000 * 60 * 60;
    var mm = Math.floor(msec / 1000 / 60);
    msec -= mm * 1000 * 60;
    var ss = Math.floor(msec / 1000);
    msec -= ss * 1000;

    mm = checkTime(mm);
    ss = checkTime(ss);
    $('#bed_time_'+bed_id).empty().append(hh + ":" + mm);
    $('#progress_'+bed_id).attr('data-original-title',hh + ":" + mm);
    if(total_time!=0){
        if(hh*60+mm>=total_time){
            $('#progress_'+bed_id).find('.progress-bar').css('width','100%');
        }else{
            $('#progress_'+bed_id).find('.progress-bar').css('width',((hh*60+mm)/total_time*100)+'%');
        }   
    }

}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
// End clock

function show_room(room_id) {
    if (room_id == 0) {
        $('.room').fadeIn(300);
    } else {
        $('.room').fadeOut(0);
        $('.room-'+room_id).fadeIn(300);
    }
}

Number.prototype.clamp = function(min, max) {
    return Math.min(Math.max(this, min), max);
};

(function($){
    $.fn.filterFind = function(selector) { 
        return this.find('*')         // Take the current selection and find all descendants,
                   .addBack()         // add the original selection back to the set 
                   .filter(selector); // and filter by the selector.
    };
})(jQuery);

(function($) {
    $.fn.svgDraw = function(progress) {
        this.filterFind('path').each(function() {
            var pathLength = this.getTotalLength();
            $(this).css('strokeDasharray', pathLength + ' ' + pathLength);
            $(this).css('strokeDashoffset', pathLength * ((1 - progress)).clamp(0, 1));
        });
        
        return this;
    };
})(jQuery);

function draw_progress(loadbed = false){
    $('.progress-button .progress-circle path').css('opacity',1);
    if(loadbed) load_new_bed();
    $('.progress-button .progress-circle').svgDraw(0);
    var progress = 0;
    LOADING_INTERVAL = setInterval(function() {
        progress += 1/200;
        $('.progress-button .progress-circle').svgDraw(progress);
        if(progress >= 1) {
            clearInterval(LOADING_INTERVAL);
            draw_progress(true);
        }
    }, 50);
}


$('.progress-button').on('click', function() {
    clearInterval(LOADING_INTERVAL);
    draw_progress(true);
});