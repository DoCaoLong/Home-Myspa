<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/form_branch_register.css" type="text/css" />
<!-- Modal -->
<?php
if ((isset($landing_page) && $landing_page == 'landing_page_app_design')) { ?>
    <div class="modal fade flex-box-notimportant " id="popup_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: none; background: transparent !important">
                <div class="modal-body text-center" style="padding: 0;border-radius: 16px">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="popup-combo item active branch-app app-design">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img class="branch-img-pop-up" src="<?php echo base_url(); ?>assets/frontend/images/popup/popup-registation-thiet-ke-app-website.jpeg" />
                                <img class="pop-up-mobile" src="<?php echo base_url(); ?>assets/frontend/images/popup/mobile-popup-registation-thiet-ke-app-website.png" />
                                <div class="form-branch-app">
                                    <div class="title">
                                        <p> ĐĂNG KÝ ƯU ĐÃI
                                            THIẾT KẾ APP
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
                                            <p class="red-text">25/50 </p>
                                            <p>Doanh nghiệp đăng ký thành công</p>
                                        </div>
                                        <div class="btn-submit">
                                            <input type="submit" name="submit" class="submit submit_branch_app action-button" value="Nhận ưu đãi ngay" />
                                        </div>
                                        <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu" class="view-more"> Tìm hiểu thêm </a>
                                    </form>
                                </div>
                                <div class="text-center combo-btns hide">
                                    <a target="_blank" href="https://demo-premium.myspa.vn/dat-hen" class="btn btn-success">Trải nghiệm ngay</a>
                                </div>
                            </div>

                        </div>
                        <!-- Controls -->
                        <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } elseif ($page_id == 'momo_register') { ?>
    <div class="modal fade flex-box-notimportant " id="popup_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: none; background: transparent !important">
                <div class="modal-body text-center" style="padding: 0;border-radius: 16px">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="popup-combo item active momo-register">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img class="branch-img-pop-up" src="<?php echo base_url(); ?>assets/frontend/images/popup/form-popup-free-marketing-1.jpg" />
                                <img class="pop-up-mobile" src="<?php echo base_url(); ?>assets/frontend/images/popup/mobile-form-popup-free-marketing-1.jpg" />
                                <div class="form-branch-app">
                                    <div class="title">
                                        <p> Đăng ký bán hàng trên MOMO
                                        </p>
                                    </div>
                                    <form action="">
                                        <div class="table-label">
                                            Thông tin liên hệ
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                                            <input type="text" name="name" id="pop_up_name" placeholder="Họ và tên *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                                            <input type="text" name="business_name" id="pop_up_business_name" placeholder="Doanh nghiệp *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/map-pin.svg" alt="icon">
                                            <input type="text" name="business_add" id="pop_up_business_add" placeholder="Địa chỉ" />
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/phone.svg" alt="icon">
                                            <input type="phone" name="phone" id="pop_up_phone" placeholder="Số điện thoại *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/mail.svg" alt="icon">
                                            <input type="email" name="email" id="pop_up_email" placeholder="Email *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="table-label">
                                            Thông tin tài khoản
                                        </div>
                                        <!-- <div class="sub-desc">
                                            <p class="red-text">25/50</p>
                                            <p>Doanh nghiệp đăng ký thành công</p>
                                        </div> -->
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                                            <input type="text" name="account_owner" id="pop_up_account_owner" placeholder="Tên chủ thẻ *" />
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/credit-card.svg" alt="icon">
                                            <input type="phone" required name="account_number" id="pop_up_account_number" placeholder="Số tài khoản *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                                            <input type="text" name="bank_name" id="pop_up_bank_name" placeholder="Tên ngân hàng *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="btn-submit">
                                            <input type="submit" name="submit" class="submit_momo" value="Đăng ký ngay" />
                                            <a href="<?php echo base_url(); ?>mo-gian-hang-tren-beautyx" class="view-more"> Tìm hiểu thêm </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Controls -->
                        <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="modal fade flex-box-notimportant " id="popup_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="popup-combo item active  branch-app">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <img class="branch-img-pop-up" src="<?php echo base_url(); ?>assets/frontend/images/popup/form-popup-manager-software-promo-13-12-2021.jpg" />
                                <img class="pop-up-mobile" src="<?php echo base_url(); ?>assets/frontend/images/popup/mobile-form-popup-manager-software-promo-13-12-2021.png" />
                                <div class="form-branch-app">
                                    <div class="title" style="background: #3ea83c;">
                                        <p> ĐĂNG KÝ ƯU ĐÃI <br class="mobile-hide">
                                            PHẦN MỀM MYSPA
                                        </p>
                                    </div>
                                    <form action="">
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/user.svg" alt="icon">
                                            <input type="text" name="name" id="pop_up_name" placeholder="Họ và tên *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/building.svg" alt="icon">
                                            <input type="text" name="business_name" id="pop_up_business_name" placeholder="Doanh nghiệp" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/map-pin.svg" alt="icon">
                                            <input type="text" name="business_add" id="pop_up_business_add" placeholder="Địa chỉ" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/phone.svg" alt="icon">
                                            <input type="tel" name="phone" id="pop_up_phone" placeholder="Số điện thoại *" />
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/mail.svg" alt="icon">
                                            <input type="email" name="email" id="pop_up_email" placeholder="Email *" />
                                            <span class="errors_log">missing</span>
                                        </div>
                                        <div class="input">
                                            <img class="icon" src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/ticket.svg" alt="icon">
                                            <input type="text" name="discount_code" id="pop_up_discount_code" placeholder="Mã khuyến mãi" />
                                        </div>
                                        <div class="btn-submit">
                                            <input type="submit" name="submit" class="submit submit_myspa action-button" style="background: #3e178c;" value="Nhận ưu đãi ngay" />
                                        </div>
                                        <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu" class="view-more"> Tìm hiểu thêm </a>
                                        <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" />
                                        <input type="hidden" id="action" name="action" />
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Controls -->
                        <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script src="https://cdn.ravenjs.com/3.26.4/raven.min.js" crossorigin="anonymous"></script>
<script defer type="text/javascript">
    Raven.config("https://a224810d8d8449ef83d954ffb2478876@o1108259.ingest.sentry.io/6743321").install();
    $(function() {
        const session = sessionStorage.getItem('popUpMyspa');
        window.onload = (event) => {
            popUp();
        };

        function popUp() {
            setTimeout(function() {
                $('#popup_combo').modal('show');
                $('#popup_combo').css('display', 'flex');
            }, 1000);
        }

        $('#carousel-example-generic').carousel({
            autoPlay: false,
        });
        // $('#carousel-example-generic').on('hover',  $(".carousel-example-generic").data('owlCarousel').stop());

        $(".submit_myspa").click(function() {
            // SUBMIT FORM
            $('#pop_up_type').val('<?= TYPE_SOFTWARE ?>');
            if ($.trim($('#pop_up_name').val()) == '') {
                $('#pop_up_name').focus();
                $('#pop_up_name').addClass('warning');
                // $('#pop_up_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_name').removeClass('warning');
            }
            if ($.trim($('#pop_up_business_name').val()) == '') {
                $('#pop_up_business_name').focus();
                $('#pop_up_business_name').addClass('warning');
                // $('#pop_up_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_business_name').removeClass('warning');
            }
            if ($.trim($('#pop_up_phone').val()) == '') {
                $('#pop_up_phone').focus();
                $('#pop_up_phone').addClass('warning');
                // $('#pop_up_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_phone').removeClass('warning');
            }
            if ($.trim($('#pop_up_email').val()) == '') {
                // warning('#pop_up_email');
                $('#pop_up_email').focus();
                $('#pop_up_email').addClass('warning');
                // $('#pop_up_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_email').removeClass('warning');
            }


            $('.submit_myspa').attr('disabled', 'disabled');
            $('.submit_myspa').val('Đang gởi...');
            console.log($('#pop_up_type').val());
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= env('RECAPTCHA_V3_SITE_KEY'); ?>', {action: 'submit'}).then(function(token) {}) {
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
                        url: "<?php echo base_url() ?>Frontend/register",
                        type: "post",
                        dataType: 'json',
                        data: {
                            reg_name: $('#pop_up_name').val(),
                            reg_phone: $('#pop_up_phone').val(),
                            reg_business_name: $('#pop_up_business_name').val(),
                            reg_business_add: $('#pop_up_business_add').val(),
                            reg_email: $('#pop_up_email').val(),
                            reg_referral: $('#pop_up_referral').val(),
                            reg_discount_code: $('#pop_up_discount_code').val(),
                            reg_branch_amount: $('#pop_up_branch_amount').val(),
                            reg_pass: '',
                            reg_type: $('#pop_up_type').val(),
                        },
                        success: function(data) {
                            $('.submit_myspa').removeAttr('disabled');
                            $('.submit_myspa').val('Submit');
                            
                            window.location = BASE_URL + 'thank-you-for-register';
                            // if (typeof(data) == 'object') {
                            //     if (data.status == 'ok') {
                            //     } else {
                            //         $('#msform').empty().append('<br><h4 class="text-white text-center">Thất bại <i class="icon icon-ban text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                            //     }
                            // }
                        }
                    });
                    return false;
                }
            });
        });
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
            console.log($('#branch_app_type').val());
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= env('RECAPTCHA_V3_SITE_KEY'); ?>', {action: 'submit'}).then(function(token) {}) {
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
                        url: "<?php echo base_url() ?>Frontend/register_branch_app",
                        type: "post",
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
                            reg_type: $('#branch_app_type').val(),
                        },
                        success: function(data) {
                            $('.submit_branch_app').removeAttr('disabled');
                            $('.submit_branch_app').val('Submit');
                            window.location = BASE_URL + 'thank-you-for-register';
                            // if (typeof(data) == 'object') {
                            //     if (data.status == 'ok') {
                            //     } else {
                            //         $('#msform').empty().append('<br><h4 class="text-white text-center">Thất bại <i class="icon icon-ban text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                            //     }
                            // }
                        }
                    });
                    return false;
                }
            });
        });
        $(".submit_momo").click(function() {
            const regex = /(84|0[3|5|7|8|9])+([0-9]{9}|[0-9]{8})\b/;
            // SUBMIT FORM
            if ($.trim($('#pop_up_name').val()) == '') {
                $('#pop_up_name').focus();
                $('#pop_up_name').addClass('warning');
                $('#pop_up_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_name').removeClass('warning');
                $('#pop_up_name ~ .errors_log').hide();
            }
            if ($.trim($('#pop_up_business_name').val()) == '') {
                $('#pop_up_business_name').focus();
                $('#pop_up_business_name').addClass('warning');
                $('#pop_up_business_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_business_name').removeClass('warning');
                $('#pop_up_business_name ~ .errors_log').hide();
            }
            if ($.trim($('#pop_up_phone').val()) == '') {
                $('#pop_up_phone').focus();
                $('#pop_up_phone').addClass('warning');
                $('#pop_up_phone ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_phone').removeClass('warning');
                $('#pop_up_phone ~ .errors_log').hide();
            }
            if (regex.test($('#pop_up_phone').val())) {
                $('#pop_up_phone').removeClass('warning');
                $('#pop_up_phone ~ .errors_log').hide();
            } else {
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
            } else {
                $('#pop_up_email').removeClass('warning');
                $('#pop_up_email ~ .errors_log').hide();
            }
            if ($.trim($('#pop_up_account_owner').val()) == '') {
                // warning('#pop_up_account_owner');
                $('#pop_up_account_owner').focus();
                $('#pop_up_account_owner').addClass('warning');
                $('#pop_up_account_owner ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_account_owner').removeClass('warning');
                $('#pop_up_account_owner ~ .errors_log').hide();
            }
            if ($.trim($('#pop_up_account_number').val()) == '') {
                $('#pop_up_account_number').focus();
                $('#pop_up_account_number').addClass('warning');
                $('#pop_up_account_number ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_account_number').removeClass('warning');
                $('#pop_up_account_number ~ .errors_log').hide();
            }
            if ($.trim($('#pop_up_bank_name').val()) == '') {
                // warning('#pop_up_bank_name');
                $('#pop_up_bank_name').focus();
                $('#pop_up_bank_name').addClass('warning');
                $('#pop_up_bank_name ~ .errors_log').show();
                return false;
            } else {
                $('#pop_up_bank_name').removeClass('warning');
                $('#pop_up_bank_name ~ .errors_log').hide();
            }


            $('.submit_myspa').attr('disabled', 'disabled');
            $('.submit_myspa').val('Đang gởi...');
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= env('RECAPTCHA_V3_SITE_KEY'); ?>', {action: 'submit'}).then(function(token) {}) {
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
                        url: "<?php echo base_url() ?>Frontend/register_momo",
                        type: "post",
                        dataType: 'json',
                        async: true,
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
                            reg_type: 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO',
                        },
                        success: function(data) {
                            $('.submit_myspa').removeAttr('disabled');
                            $('.submit_myspa').val('Submit');
                            window.location = BASE_URL + 'thank-you-for-register';
                            // if (typeof(data) == 'object') {
                            //     if (data.status == 'ok') {
                            //     } else {
                            //         $('#msform').empty().append('<br><h4 class="text-white text-center">Thất bại <i class="icon icon-ban text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                            //     }
                            // }
                        }
                    });
                    return false;
                }
            });
        });
    })
</script>