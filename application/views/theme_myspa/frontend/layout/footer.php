<?php if ($page_id == "brand_app_pricing" || $page_id == "landing_page_app_design" || $page_id == "momo_register" || $page_id == "landing_page_beauty_ecosystem" || $page_id == "checkin_register"|| $page_id == "home_v2") { ?>
<?php } else { ?> <div class="modal fade register-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-12">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close" href="#"><span
                            class="text-white" aria-hidden="true">&times;</span></a>
                    <br><br>
                    <h2 class="text-white" style="font-size: 20px;line-height: 26px;"> <?php switch ($page_id) {
                                case "landing_page_spa":
                                    echo "Đăng ký phần mềm quản lý spa";
                                    break;
                                case "landing_page_clinic":
                                    echo "Đăng ký để trải nghiệm phần mềm phòng khám miễn phí";
                                    break;
                                case "landing_page_nail":
                                    echo "Đăng ký phần mềm quản lý tiệm nails";
                                    break;
                                case "landing_page_salon":
                                    echo "Đăng ký phần mềm quản lý salon tóc";
                                    break;
                                default:
                                    echo "Đăng ký phần mềm quản lý spa";
                                    break;
                            }
                            ?> </h2>
                    <br>
                </div>
                <!-- MultiStep Form -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Thông tin đăng ký</li> <?php switch ($page_id) {
                                        case "landing_page_spa":
                                            echo "<li>Thông tin Spa</li>";
                                            break;
                                        case "landing_page_clinic":
                                            echo "<li>Thông tin Thẩm mỹ viện, Clinic</li>";
                                            break;
                                        case "landing_page_nail":
                                            echo "<li>Thông tin tiệm nails</li>";
                                            break;
                                        case "landing_page_salon":
                                            echo "<li>Thông tin salon tóc</li>";
                                            break;
                                        default:
                                            echo "<li>Thông tin Spa/Clinic/TMV</li>";
                                    }
                                    ?> <li>Hoàn thành</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Thông tin của bạn</h2>
                                <h3 class="fs-subtitle">Cho chúng tôi biết thông tin về bạn</h3>
                                <input type="text" name="name" id="reg_name" placeholder="Họ tên" />
                                <input type="text" name="phone" id="reg_phone" placeholder="Số điện thoại" />
                                <input type="button" name="next" class="next action-button" value="Tiếp theo" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Thông tin Spa/Clinic/TMV</h2>
                                <h3 class="fs-subtitle">Thông tin về Spa/Salon của bạn</h3>
                                <input type="text" name="business_name" id="reg_business_name"
                                    placeholder="Tên Spa/Salon" />
                                <input type="text" name="business_add" id="reg_business_add"
                                    placeholder="Địa chỉ Spa/Salon" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Trở lại" />
                                <input type="button" name="next" class="next action-button" value="Tiếp theo" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Hoàn thành</h2>
                                <h3 class="fs-subtitle">Email nhận thông tin</h3>
                                <input type="email" name="email" id="reg_email" placeholder="Email" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Trở lại" />
                                <input type="button" name="submit" class="submit action-button" value="Hoàn thành" />
                            </fieldset>
                            <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" />
                            <input type="hidden" id="action" name="action" />
                            <input type="hidden" id="reg_type" value="<?php echo $register_type ?>" />
                        </form>
                    </div>
                </div>
                <!-- /.MultiStep Form -->
            </div>
        </div>
    </div>
</div> <?php } ?>
<!-- beta remove all library --> <?php if ($page_id != 'home_v2') { ?> <script
    src="https://www.google.com/recaptcha/api.js?render=<?php echo env('RECAPTCHA_V3_SITE_KEY'); ?>"></script>
<script src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script async>
var form_count = 0;
Raven.config("https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321").install();
$(function() {
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    $(".next").click(function() {
        console.log(this);
        if (form_count == 0) {
            if ($.trim($('#reg_name').val()) == '') {
                $('#reg_name').focus();
                alert('thiếu họ và tên ');
                return false;
            }
            if ($.trim($('#reg_phone').val()) == '') {
                $('#reg_phone').focus();
                alert('Quý khách cần nhập sdt để được tư vấn!');
                return false;
            }
        } else if (form_count == 1) {
            if ($.trim($('#reg_business_name').val()) == '') {
                $('#reg_business_name').focus();
                alert('Quý khách cần nhập tên spa hoặc công ty để được tư vấn!');
                return false;
            }
            if ($.trim($('#reg_business_add').val()) == '') {
                $('#reg_business_add').focus();
                alert('Quý khách thêm địa chỉ spa để Myspa tư vấn chính xác hơn!');
                return false;
            }
        }
        form_count++;
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
    $(".previous").click(function() {
        if (animating) return false;
        animating = true;
        form_count--;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'left': left
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
    $(".submit").click(function() {
        post_form();
    });

    function post_form() {
        var pageId = "<?php echo $page_id ?>";
        // console.log(pageId);
        switch (pageId + "") {
            case "landing_page_spa":
                $('#reg_type').val('<?= TYPE_SOFTWARE ?>');
                break;
            case "landing_page_clinic":
                $('#reg_type').val('<?= TYPE_CLINIC ?>')
                break;
            case "landing_page_nail":
                $('#reg_type').val('<?= TYPE_NAILS ?>');
                break;
            case "landing_page_salon":
                $('#reg_type').val('<?= TYPE_SALON ?>');
                break;
            case "landing_page_app_design":
                $('#reg_type').val('<?= TYPE_MOBA ?>');
                break;
            case "checkin_register":
                $('#reg_type').val('<?= TYPE_CHECKIN ?>');
                break;
            case "brand_app_pricing":
                $('#reg_type').val('<?= TYPE_MOBA ?>');
                break;
            case "pricing":
                break;
            default:
                $('#reg_type').val('<?= TYPE_SOFTWARE ?>');
                break;
        }
        $('.submit').attr('disabled', 'disabled');
        $('.submit').val('Đang gởi...');
        // Recaptcha
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo env('RECAPTCHA_V3_SITE_KEY'); ?>', {
                action: 'submit'
            }).then(function(token) {
                let x = {
                    reg_name: $('#reg_name').val(),
                    reg_phone: $('#reg_phone').val(),
                    reg_business_name: $('#reg_business_name').val(),
                    reg_business_add: $('#reg_business_add').val(),
                    reg_email: $('#reg_email').val(),
                    reg_referral: $('#reg_referral').val(),
                    reg_discount_code: $('#reg_discount_code').val(),
                    reg_branch_amount: $('#reg_branch_amount').val(),
                    reg_pass: '',
                    reg_type: $('#reg_type').val(),
                    reg_captcha: token,
                    reg_action: 'submit'
                }
                console.log(x)
                Raven.setUserContext(x);
                Raven.captureMessage("Đăng ký", {
                    level: "info", // one of 'info', 'warning', or 'error'
                });
                $.ajax({
                    url: "<?php if ($page_id == 'landing_page_app_design') {
                                            echo base_url() . 'Frontend/register_branch_app';
                                        } else {
                                            echo base_url() . 'Frontend/register';
                                        } ?>",
                    type: "post",
                    async: true,
                    dataType: 'json',
                    data: {
                        reg_name: $('#reg_name').val(),
                        reg_phone: $('#reg_phone').val(),
                        reg_business_name: $('#reg_business_name').val(),
                        reg_business_add: $('#reg_business_add').val(),
                        reg_email: $('#reg_email').val(),
                        reg_referral: $('#reg_referral').val(),
                        reg_discount_code: $('#reg_discount_code').val(),
                        reg_branch_amount: $('#reg_branch_amount').val(),
                        reg_pass: '',
                        reg_type: $('#reg_type').val(),
                        reg_captcha: token,
                        reg_action: 'submit'
                    },
                    success: function(res) {
                        // if (typeof res == 'object' && res.status != 'fail') {
                        // console.log(res)
                        window.location = BASE_URL + 'thank-you-for-register';
                        // }
                    }
                });
            });
        });
    }
    //Parallax
    $('.parallax-pattern').parallax("50%", 0.3);
});
</script>
<script>
(function(a, s, y, n, c, h, i, d, e) {
    s.className += ' ' + y;
    h.start = 1 * new Date;
    h.end = i = function() {
        s.className = s.className.replace(RegExp(' ?' + y), '')
    };
    (a[n] = a[n] || []).hide = h;
    setTimeout(function() {
        i();
        h.end = null
    }, c);
    h.timeout = c;
})(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
    'GTM-M4X4WRN': true
});
</script>
<script defer>
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-101732198-1', 'auto');
ga('require', 'GTM-M4X4WRN');
ga('set', 'userId', '153935109');
ga('send', 'pageview');
</script>
<script type="text/javascript">
(function(c, l, a, r, i, t, y) {
    c[a] = c[a] || function() {
        (c[a].q = c[a].q || []).push(arguments)
    };
    t = l.createElement(r);
    t.async = 1;
    t.src = "https://www.clarity.ms/tag/" + i;
    y = l.getElementsByTagName(r)[0];
    y.parentNode.insertBefore(t, y);
})(window, document, "clarity", "script", "cxpe6ndibx");
</script>
<!-- Latest compiled and minified JavaScript --> <?php } else { ?> <script lazy
    data-src="https://www.google.com/recaptcha/api.js?render=<?php echo env('RECAPTCHA_V3_SITE_KEY'); ?>">
</script>
<script lazy data-src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script async>
document.querySelectorAll("[data-target='.register-modal']").forEach(function(x) {
    x.addEventListener('click', function(e) {
        document.querySelectorAll('script[lazy]').forEach(async (item) => {
            await lazyScript(item);
            Raven.config(
                "https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321"
                ).install();
        });
    })
})
const lazyScript = ((props) => {
    const lazyScript = props;
    const src = props.dataset.src;
    // <script>: copy  lazy data-src sang src
    if (props.tagName.toLowerCase() === 'script') props.src = src
    // copy xong rồi thì bỏ attribute lazy đi
    props.removeAttribute('lazy');
});
var form_count = 0;
$(function() {
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    $(".next").click(function() {
        console.log(this);
        if (form_count == 0) {
            if ($.trim($('#reg_name').val()) == '') {
                $('#reg_name').focus();
                alert('thiếu họ và tên ');
                return false;
            }
            if ($.trim($('#reg_phone').val()) == '') {
                $('#reg_phone').focus();
                alert('Quý khách cần nhập sdt để được tư vấn!');
                return false;
            }
        } else if (form_count == 1) {
            if ($.trim($('#reg_business_name').val()) == '') {
                $('#reg_business_name').focus();
                alert('Quý khách cần nhập tên spa hoặc công ty để được tư vấn!');
                return false;
            }
            if ($.trim($('#reg_business_add').val()) == '') {
                $('#reg_business_add').focus();
                alert('Quý khách thêm địa chỉ spa để Myspa tư vấn chính xác hơn!');
                return false;
            }
        }
        form_count++;
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
    $(".previous").click(function() {
        if (animating) return false;
        animating = true;
        form_count--;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'left': left,
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity,
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
    $(".submit").click(function() {
        post_form();
    });

    function post_form() {
        var pageId = "<?php echo $page_id ?>";
        // console.log(pageId);
        switch (pageId + "") {
            case "landing_page_spa":
                $('#reg_type').val('<?= TYPE_SOFTWARE ?>');
                break;
            case "landing_page_clinic":
                $('#reg_type').val('<?= TYPE_CLINIC ?>')
                break;
            case "landing_page_nail":
                $('#reg_type').val('<?= TYPE_NAILS ?>');
                break;
            case "landing_page_salon":
                $('#reg_type').val('<?= TYPE_SALON ?>');
                break;
            case "landing_page_app_design":
                $('#reg_type').val('<?= TYPE_MOBA ?>');
                break;
            case "checkin_register":
                $('#reg_type').val('<?= TYPE_CHECKIN ?>');
                break;
            case "brand_app_pricing":
                $('#reg_type').val('<?= TYPE_MOBA ?>');
                break;
            case "pricing":
                break;
            default:
                $('#reg_type').val('<?= TYPE_SOFTWARE ?>');
                break;
        }
        $('.submit').attr('disabled', 'disabled');
        $('.submit').val('Đang gởi...');
        // Recaptcha
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo env('RECAPTCHA_V3_SITE_KEY'); ?>', {
                action: 'submit'
            }).then(function(token) {
                let x = {
                    reg_name: $('#reg_name').val(),
                    reg_phone: $('#reg_phone').val(),
                    reg_business_name: $('#reg_business_name').val(),
                    reg_business_add: $('#reg_business_add').val(),
                    reg_email: $('#reg_email').val(),
                    reg_referral: $('#reg_referral').val(),
                    reg_discount_code: $('#reg_discount_code').val(),
                    reg_branch_amount: $('#reg_branch_amount').val(),
                    reg_pass: '',
                    reg_type: $('#reg_type').val(),
                    reg_captcha: token,
                    reg_action: 'submit'
                }
                console.log(x)
                Raven.setUserContext(x);
                Raven.captureMessage("Đăng ký", {
                    level: "info", // one of 'info', 'warning', or 'error'
                });
                $.ajax({
                    url: "<?= ($page_id == 'landing_page_app_design') ?  base_url() . 'Frontend/register_branch_app' :  base_url() . 'Frontend/register' ?>",
                    type: "post",
                    async: true,
                    dataType: 'json',
                    data: {
                        reg_name: $('#reg_name').val(),
                        reg_phone: $('#reg_phone').val(),
                        reg_business_name: $('#reg_business_name').val(),
                        reg_business_add: $('#reg_business_add').val(),
                        reg_email: $('#reg_email').val(),
                        reg_referral: $('#reg_referral').val(),
                        reg_discount_code: $('#reg_discount_code').val(),
                        reg_branch_amount: $('#reg_branch_amount').val(),
                        reg_pass: '',
                        reg_type: $('#reg_type').val(),
                        reg_captcha: token,
                        reg_action: 'submit'
                    },
                    success: function(res) {
                        // if (typeof res == 'object' && res.status != 'fail') {
                        // console.log(res)
                        window.location = BASE_URL + 'thank-you-for-register';
                        // }
                    }
                });
            });
        });
    }
    //Parallax
    $('.parallax-pattern').parallax("50%", 0.3);
});
</script>
<script src="<?= base_url(); ?>assets/frontend/js/partial.js?v=19<?= $this->config->item('version'); ?>"></script>
<script defer src="<?= base_url(); ?>assets/frontend/js/remove_unecessary_dom.js"></script> <?php } ?>
<?php if($page_id !== "home_v2" ){?>
<link async rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/bootstrap.min.css">
<script src="<?= base_url(); ?>assets/frontend/js/bootstrap.min.js"></script> <?php }?>
<!-- end  -->
<a class="" href="tel:0343131003">
    <button id="button_call"><img src="<?= base_url(); ?>assets/frontend/images/icon/phone-white.svg" alt="">
        <span>034 3131 003</span> </button>
</a>
</body>

</html>