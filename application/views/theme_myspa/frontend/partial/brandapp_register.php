<style scoped>
    .modal-body {
        padding: 0 !important;
        background: transparent !important;
    }

    #popup_combo .modal-content {
        border-radius: 16px !important;
        background-color: transparent !important;
        box-shadow: none;
        border: none;
    }
</style>
<!-- import css  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/form_branch_register.css?v=19<?php echo $this->config->item('version'); ?>" type="text/css" />
<!-- end css  -->
<div class="popup-combo item active branch-app app-design">
    <img class="branch-img-pop-up" src="<?php echo base_url(); ?>assets/frontend/images/popup/popup-registation-thiet-ke-app-website.jpeg" />
    <img class="pop-up-mobile" src="<?php echo base_url(); ?>assets/frontend/images/popup/mobile-popup-registation-thiet-ke-app-website.png" />
    <div class="form-branch-app">
        <div class="title">
            <p>Đăng ký ưu đãi thiết kế app
            </p>
        </div>
        <form action="">
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                <input type="text" required name="name" id="branch_app_name" placeholder="Họ và tên *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                <input type="text" required name="business_name" id="branch_app_business_name" placeholder="Doanh nghiệp" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/map-pin.svg" alt="icon">
                <input type="text" name="business_add" id="branch_app_business_add" placeholder="Địa chỉ" />
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/phone.svg" alt="icon">
                <input type="phone" required name="phone" id="branch_app_phone" placeholder="Số điện thoại *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/mail.svg" alt="icon">
                <input type="email" required name="email" id="branch_app_email" placeholder="Email *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/ticket.svg" alt="icon">
                <input type="text" name="discount_code" id="branch_app_discount_code" placeholder="Mã khuyến mãi" />
            </div>
            <div class="sub-desc">
                <p class="red-text">125/150 </p>
                <p> Doanh nghiệp đăng ký thành công</p>
            </div>
            <div class="btn-submit">
                <input type="submit" name="submit" class="submit_branch_app action-button" value="Nhận ưu đãi ngay" />
            </div>
            <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" />
            <input type="hidden" id="action" name="action" />
            <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu" class="view-more"> Tìm hiểu thêm </a>
        </form>
    </div>
    <div class="text-center combo-btns hide">
        <a target="_blank" href="https://demo-premium.myspa.vn/dat-hen" class="btn btn-success">Trải nghiệm ngay</a>
    </div>
</div>

<script src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script defer type="text/javascript">
    Raven.config("https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321").install();
    // {
    //     logger: "my-logger",
    //     whitelistUrls: [/disqus\.com/, /getsentry\.com/],
    //     ignoreErrors: ["fb_xd_fragment", /ReferenceError:.*/],
    //     includePaths: [/https?:\/\/(www\.)?getsentry\.com/],
    // }).install();
    $(".submit_branch_app").click(function() {
        // SUBMIT FORM
        $('#branch_app_type').val('ĐĂNG KÝ THIẾT KẾ APP THƯƠNG HIỆU');

        if ($.trim($('#branch_app_name').val()) == '') {
            $('#branch_app_name').focus();
            $('#branch_app_name').addClass('warning');
            // $('#branch_app_name ~ .errors_log').show();
            return false;
        } else {
            $('#branch_app_name').removeClass('warning');
        }
        if ($.trim($('#branch_app_business_name').val()) == '') {
            $('#branch_app_business_name').focus();
            $('#branch_app_business_name').addClass('warning');
            // $('#branch_app_name ~ .errors_log').show();
            return false;
        } else {
            $('#branch_app_business_name').removeClass('warning');
        }
        if ($.trim($('#branch_app_phone').val()) == '') {
            $('#branch_app_phone').focus();
            $('#branch_app_phone').addClass('warning');
            // $('#branch_app_name ~ .errors_log').show();
            return false;
        } else {
            $('#branch_app_phone').removeClass('warning');
        }
        if ($.trim($('#branch_app_email').val()) == '') {
            // warning('#branch_app_email');
            $('#branch_app_email').focus();
            $('#branch_app_email').addClass('warning');
            // $('#branch_app_name ~ .errors_log').show();
            return false;
        } else {
            $('#branch_app_email').removeClass('warning');
        }


        $('.submit_branch_app').attr('disabled', 'disabled');
        $('.submit_branch_app').val('Đang gởi...');
        console.log({
            reg_name: $('#branch_app_name').val(),
            reg_phone: $('#branch_app_phone').val(),
            reg_business_name: $('#branch_app_business_name').val(),
            reg_business_add: $('#branch_app_business_add').val(),
            reg_email: $('#branch_app_email').val(),
            reg_referral: 'Branch_App-WEBSITE',
            reg_discount_code: $('#branch_app_discount_code').val(),
            reg_branch_amount: $('#branch_app_branch_amount').val(),
            reg_pass: '',
            reg_type: $('#branch_app_type').val(),
        });
        grecaptcha.ready(function() {
            grecaptcha.execute('<?= env('RECAPTCHA_V3_SITE_KEY'); ?>', {
                action: 'submit'
            }).then(function(token) {
                $('#g-recaptcha-response').val(token);
                $('#action').val('submit');

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
                        console.log(x);
                        Raven.setUserContext(x);
                        Raven.captureMessage("Đăng ký", {
                            level: "info", // one of 'info', 'warning', or 'error'
                        });
                $.ajax({
                    url: "<?php echo base_url() ?>Frontend/register_branch_app",
                    type: "post",
                    async: true,
                    dataType: 'json',
                    data: {
                        reg_name: $('#branch_app_name').val(),
                        reg_phone: $('#branch_app_phone').val(),
                        reg_business_name: $('#branch_app_business_name').val(),
                        reg_business_add: $('#branch_app_business_add').val(),
                        reg_email: $('#branch_app_email').val(),
                        reg_referral: 'Branch_App-WEBSITE',
                        reg_discount_code: $('#branch_app_discount_code').val(),
                        reg_branch_amount: $('#branch_app_branch_amount').val(),
                        reg_pass: '',
                        reg_captcha: $('#g-recaptcha-response').val(),
                        reg_action: $('#action').val(),
                        reg_type: $('#branch_app_type').val(),
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.submit_branch_app').removeAttr('disabled');
                        $('.submit_branch_app').val('Submit');
                        window.location = BASE_URL + 'thank-you-for-register';

                        // if (typeof(data) == 'object' && data.status != 'fail') {
                        // } else {
                        //     $('#msform').empty().append('<br><h4 class="text-white text-center">Thất bại <i class="icon icon-ban text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                        // }
                    }
                });
                return false;
            })
        });
    });
</script>