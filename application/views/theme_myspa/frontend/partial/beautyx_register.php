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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets/frontend/css/main/momo_register.css?v=19<?php echo $this->config->item('version'); ?>"
    type="text/css" />
<!-- JAVASCRIPT
================================================== -->

<!-- Custom JavaScript
================================================== -->
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<!-- End JavaScript
================================================== -->
<div class="popup-combo item active momo-register">
    <img class="branch-img-pop-up" alt="img" loading="lazy"
        src="<?= base_url(); ?>assets/frontend/images/popup/form-popup-free-marketing-1.jpg" />
    <img class="pop-up-mobile" alt="img"
        src="<?= base_url(); ?>assets/frontend/images/popup/mobile-form-popup-free-marketing-1.jpg" />
    <div class="form-branch-app">
        <!-- <div class="decor-popup-noel1">
            <img alt="img" src="<?= base_url(); ?>assets/frontend/images/popup/decor_noel1.png" />
        </div> -->
        <!-- <img alt="img" class="decor-popup-tree"
            src="<?= base_url(); ?>assets/frontend/images/popup/decor-noel-tree.png" /> -->
        <div class="title">
            <p style="margin: auto"> Đăng ký bán hàng trên BeautyX
            </p>
        </div>
        <form action="">
            <!-- <div class="table-label">
                Thông tin liên hệ
            </div> -->
            <div class="input">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                <input type="text" name="name" id="pop_up_name" placeholder="Họ và tên *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                <input type="text" name="business_name" id="pop_up_business_name" placeholder="Doanh nghiệp *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/map-pin.svg" alt="icon">
                <input type="text" name="business_add" id="pop_up_business_add" placeholder="Địa chỉ" />
            </div>
            <div class="input">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/phone.svg" alt="icon">
                <input type="phone" name="phone" id="pop_up_phone" placeholder="Số điện thoại *" />
                <span class="errors_log">Missing!</span>
            </div>
            <div class="input">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/mail.svg" alt="icon">
                <input type="email" name="email" id="pop_up_email" placeholder="Email *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="table-label" style="display: none;">
                Thông tin tài khoản
            </div>
            <!-- <div class="sub-desc">
                <p class="red-text">25/50</p>
                <p>Doanh nghiệp đăng ký thành công</p>
            </div> -->
            <div class="input" style="display: none;">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                <input type="text" name="account_owner" id="pop_up_account_owner" placeholder="Tên chủ thẻ *" />
            </div>
            <div class="input" style="display: none;">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/credit-card.svg" alt="icon">
                <input type="phone" name="account_number" id="pop_up_account_number" placeholder="Số tài khoản *" />
                <span class="errors_log">missing</span>
            </div>
            <div class="input" style="display: none;">
                <img class="icon" src="<?= base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                <input type="text" name="bank_name" id="pop_up_bank_name" placeholder="Tên ngân hàng *" />
                <span class="errors_log">missing</span>
            </div>
            <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" />
            <input type="hidden" id="action" name="action" />
            <div class="btn-submit">
                <input type="button" name="submit" class="submit_momo" value="Đăng ký ngay" />
                <a href="<?= base_url(); ?>mo-gian-hang-tren-beautyx" class="view-more"> Tìm hiểu thêm </a>
            </div>
        </form>
        <!-- <div class="decor-popup-noel2">
            <img alt="image" src="<?= base_url(); ?>assets/frontend/images/popup/decor_noel2.png" />
        </div> -->
    </div>
</div>
<script src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script defer type="text/javascript">
Raven.config("https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321").install();
$(function() {
    $("#menu-wrap").addClass('minimize');
    $(".submit_momo").click(function() {
        // Recaptcha
        post_form();
    });

    function post_form() {
        const regex = /(84|0[3|5|7|8|9])+([0-9]{9}|[0-9]{8})\b/;
        // SUBMIT FORM
        // if ($.trim($('#pop_up_name').val()) == '') {
        //     $('#pop_up_name').focus();
        //     $('#pop_up_name').addClass('warning');
        //     $('#pop_up_name ~ .errors_log').show();
        //     return false;
        // } else {
        //     $('#pop_up_name').removeClass('warning');
        //     $('#pop_up_name ~ .errors_log').hide();
        // }
        // if ($.trim($('#pop_up_business_name').val()) == '') {
        //     $('#pop_up_business_name').focus();
        //     $('#pop_up_business_name').addClass('warning');
        //     $('#pop_up_business_name ~ .errors_log').show();
        //     return false;
        // } else {
        //     $('#pop_up_business_name').removeClass('warning');
        //     $('#pop_up_business_name ~ .errors_log').hide();
        // }
        if ($.trim($('#pop_up_phone').val()) == '') {
            $('#pop_up_phone').focus();
            $('#pop_up_phone').addClass('warning');
            $('#pop_up_phone ~ .errors_log').show();
            return false;
        } else {
            $('#pop_up_phone').removeClass('warning');
            $('#pop_up_phone ~ .errors_log').hide();
        }
        // if (regex.test($('#pop_up_phone').val())) {
        //     $('#pop_up_phone').removeClass('warning');
        //     $('#pop_up_phone ~ .errors_log').hide();
        // } else {
        //     $('#pop_up_phone').focus();
        //     $('#pop_up_phone').addClass('warning');
        //     $('#pop_up_phone ~ .errors_log').text('Số điện thoại sai định dạng');
        //     $('#pop_up_phone ~ .errors_log').show();
        //     return false;
        // }
        // if ($.trim($('#pop_up_email').val()) == '') {
        //     // warning('#pop_up_email');
        //     $('#pop_up_email').focus();
        //     $('#pop_up_email').addClass('warning');
        //     $('#pop_up_email ~ .errors_log').show();
        //     return false;
        // } else {
        //     $('#pop_up_email').removeClass('warning');
        //     $('#pop_up_email ~ .errors_log').hide();
        // }
        // if ($.trim($('#pop_up_account_owner').val()) == '') {
        //     // warning('#pop_up_account_owner');
        //     $('#pop_up_account_owner').focus();
        //     $('#pop_up_account_owner').addClass('warning');
        //     $('#pop_up_account_owner ~ .errors_log').show();
        //     return false;
        // }
        // else{
        //     $('#pop_up_account_owner').removeClass('warning');
        //     $('#pop_up_account_owner ~ .errors_log').hide();
        // }
        // if ($.trim($('#pop_up_account_number').val()) == '') {
        //     $('#pop_up_account_number').focus();
        //     $('#pop_up_account_number').addClass('warning');
        //     $('#pop_up_account_number ~ .errors_log').show();
        //     return false;
        // }
        // else{
        //     $('#pop_up_account_number').removeClass('warning');
        //     $('#pop_up_account_number ~ .errors_log').hide();
        // }
        // if ($.trim($('#pop_up_bank_name').val()) == '') {
        //     // warning('#pop_up_bank_name');
        //     $('#pop_up_bank_name').focus();
        //     $('#pop_up_bank_name').addClass('warning');
        //     $('#pop_up_bank_name ~ .errors_log').show();
        //     return false;
        // }
        // else{
        //     $('#pop_up_bank_name').removeClass('warning');
        //     $('#pop_up_bank_name ~ .errors_log').hide();
        // }


        $('.submit_momo').attr('disabled', 'disabled');
        $('.submit_momo').val('Đang gởi...');

        grecaptcha.ready(function() {
            grecaptcha.execute('<?= env('RECAPTCHA_V3_SITE_KEY'); ?>', {
                action: 'submit'
            }).then(function(token) {
                $('#g-recaptcha-response').val(token);
                $('#action').val('submit');
                let x = {
                    reg_name: $('#pop_up_name').val(),
                    reg_phone: $('#pop_up_phone').val(),
                    reg_business_name: $('#pop_up_business_name').val(),
                    reg_business_add: $('#pop_up_business_add').val(),
                    reg_email: $('#pop_up_email').val(),
                    reg_referral: $('#pop_up_referral').val(),
                    reg_branch_amount: $('#pop_up_branch_amount').val(),
                    reg_account_owner: $('#pop_up_account_owner').val(),
                    reg_account_number: $('#pop_up_account_number').val(),
                    reg_bank_name: $('#pop_up_bank_name').val(),
                    reg_pass: '',
                    reg_captcha: $('#g-recaptcha-response').val(),
                    reg_action: $('#action').val(),
                    reg_type: 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO',
                }
                console.log(x);
                Raven.setUserContext(x);
                Raven.captureMessage("Đăng ký", {
                    level: "info", // one of 'info', 'warning', or 'error'
                });
                $.ajax({
                    url: "<?php echo base_url() ?>Frontend/register_momo",
                    type: "post",
                    dataType: 'json',
                    data: {
                        reg_name: $('#pop_up_name').val(),
                        reg_phone: $('#pop_up_phone').val(),
                        reg_business_name: $('#pop_up_business_name').val(),
                        reg_business_add: $('#pop_up_business_add').val(),
                        reg_email: $('#pop_up_email').val(),
                        reg_referral: $('#pop_up_referral').val(),
                        reg_branch_amount: $('#pop_up_branch_amount').val(),
                        reg_account_owner: $('#pop_up_account_owner').val(),
                        reg_account_number: $('#pop_up_account_number').val(),
                        reg_bank_name: $('#pop_up_bank_name').val(),
                        reg_pass: '',
                        reg_captcha: $('#g-recaptcha-response').val(),
                        reg_action: $('#action').val(),
                        reg_type: 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO',
                    },
                    success: function(data) {
                        window.location = BASE_URL + 'thank-you-for-register';
                    }
                });
            })
        });
    }


})
</script>