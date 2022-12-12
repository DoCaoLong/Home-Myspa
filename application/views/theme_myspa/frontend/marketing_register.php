
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/main/momo_register.css" type="text/css" />
<!-- JAVASCRIPT
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollReveal.js"></script> -->

<!-- Custom JavaScript
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<?php echo $this_controller->nav_bar_frontend(); ?>
<div class="main-momo main-marketing">
    <div class="popup-combo item active  momo-register">
        <img class="branch-img-pop-up" src="<?php echo base_url();?>assets/frontend/images/popup/momo_marketing_register.png"/>
        <img class="pop-up-mobile" src="<?php echo base_url();?>assets/frontend/images/popup/momo_marketing_register_mobile.png"/>
        <div class="form-branch-app">
            <div class="title">
                <p>  Đăng ký gói truyền thông
                </p>
            </div>
            <form action="">
            <div class="table-label">
                Thông tin liên hệ
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url();?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                <input type="text"  name="name" id="pop_up_name" placeholder="Họ và tên *"/>
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url();?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                <input type="text" name="business_name" id="pop_up_business_name" placeholder="Doanh nghiệp *"/>
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url();?>assets/frontend/images/icon/Icon/map-pin.svg" alt="icon">
                <input type="text"  name="business_add" id="pop_up_business_add" placeholder="Địa chỉ"/>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url();?>assets/frontend/images/icon/Icon/phone.svg" alt="icon">
                <input type="phone" name="phone" id="pop_up_phone" placeholder="Số điện thoại *"/>
                <span class="errors_log">missing</span>
            </div>
            <div class="input">
                <img class="icon" src="<?php echo base_url();?>assets/frontend/images/icon/Icon/mail.svg" alt="icon">
                <input type="email" name="email" id="pop_up_email" placeholder="Email *"/>
                <span class="errors_log">missing</span>
            </div>
            <div class="btn-submit">
                <input type="button" name="submit" class="submit_momo" value="Đăng ký ngay"/>
                <a href="<?php echo base_url(); ?>mo-gian-hang-tren-beautyx" class="view-more"> Tìm hiểu thêm </a>
            </div>
            <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response"/>
            <input type="hidden" id="action" name="action"/>
            </form>
        </div>
    </div>
    <div class="backdrop-filter">
    </div>
</div>
<script src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script defer type="text/javascript">
    Raven.config("https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321").install();
    $(function() {
        const type = "<?=$register_type?>"
        $("#menu-wrap").addClass('minimize');
        $(".submit_momo").click(function(){
            // Recaptcha
            post_form();
        });
        function post_form(){
            const regex =/(84|0[3|5|7|8|9])+([0-9]{9}|[0-9]{8})\b/;
                // SUBMIT FORM
                if ($.trim($('#pop_up_name').val()) == '') {
                    $('#pop_up_name').focus();
                    $('#pop_up_name').addClass('warning');
                    $('#pop_up_name ~ .errors_log').show();
                    return false;
                }
                else{
                    $('#pop_up_name').removeClass('warning');
                    $('#pop_up_name ~ .errors_log').hide();
                }
                if ($.trim($('#pop_up_business_name').val()) == '') {
                    $('#pop_up_business_name').focus();
                    $('#pop_up_business_name').addClass('warning');
                    $('#pop_up_business_name ~ .errors_log').show();
                    return false;
                }
                else{
                    $('#pop_up_business_name').removeClass('warning');
                    $('#pop_up_business_name ~ .errors_log').hide();
                }
                if ($.trim($('#pop_up_phone').val()) == '') {
                    $('#pop_up_phone').focus();
                    $('#pop_up_phone').addClass('warning');
                    $('#pop_up_phone ~ .errors_log').show();
                    return false;
                }
                else{
                    $('#pop_up_phone').removeClass('warning');
                    $('#pop_up_phone ~ .errors_log').hide();
                }
                if(regex.test($('#pop_up_phone').val())){
                    $('#pop_up_phone').removeClass('warning');
                    $('#pop_up_phone ~ .errors_log').hide();
                }
                else{
                    $('#pop_up_phone').focus();
                    $('#pop_up_phone').addClass('warning');
                    $('#pop_up_phone ~ .errors_log').text('Số điện thoại sai định dạng');
                    $('#pop_up_phone ~ .errors_log').show();
                    return false;
                }
                if ($.trim($('#pop_up_email').val()) == '') {
                    // warning('#pop_up_email');
                    $('#pop_up_email').focus();
                    $('#pop_up_email').addClass('warning');
                    $('#pop_up_email ~ .errors_log').show();
                    return false;
                }
                else{
                    $('#pop_up_email').removeClass('warning');
                    $('#pop_up_email ~ .errors_log').hide();
                }
                
                
                $('.submit_momo').attr('disabled','disabled');
                $('.submit_momo').val('Đang gởi...');
                grecaptcha.ready(function() {
                grecaptcha.execute('<?=env('RECAPTCHA_V3_SITE_KEY');?>', {action: 'submit'}).then(function(token) {
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
                                console.log(x)
                                Raven.setUserContext(x);
                                Raven.captureMessage("Đăng ký", {
                                    level: "info", // one of 'info', 'warning', or 'error'
                                });
                    $.ajax({
                        url: "<?php echo base_url()?>Frontend/register_momo",
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
                            reg_account_owner: '',
                            reg_account_number: '',
                            reg_bank_name: '',
                            reg_pass: '',
                            reg_type: type,
                            reg_captcha: $('#g-recaptcha-response').val(),
                            reg_action: $('#action').val()
                        },
                        success: function (res) {
                            window.location = BASE_URL+'thank-you-for-register';
                        }
                        });
                    })
                });
        }
    })
</script>