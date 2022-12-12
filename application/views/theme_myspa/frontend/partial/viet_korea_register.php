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

.momo-register .form-branch-app form {
    background-color: transparent !important;
    padding: 0 24px 24px 24px !important;
}

.momo-register .form-branch-app {
    left: -10px !important;
    width: 100% !important;
}

.form-select {
    cursor: pointer;
    color: #fff;
}

.form-select option {
    color: #350201;
}

.form-select {
    width: 100%;
    background-color: transparent;
    outline: 0;
    border: 0;
    font-size: 18px;
    font-weight: bold;
    border-bottom: 2px solid #fff;
    padding: 8px 0;
}

.momo-register .form-branch-app .form-event_box {
    margin-top: 0;
    top: 50%;
    left: 48px;
    transform: translate(0%, -50%);
    width: 70%;
}

.momo-register .form-branch-app .form-event_box {
    margin-top: 0;
    top: 50%;
    left: 48px;
    transform: translate(0%, -50%);
    width: 70%;
}

@media screen and (max-width: 767.98px) {
    .momo-register .form-branch-app {
        left: 0 !important;

    }

    #popup_combo .modal-content button {
        width: max-content !important;
        height: unset !important;
        font-size: 12px;
    }

    .momo-register .form-branch-app form {
        background-color: transparent !important;
        padding: 0 24px 24px 24px !important;
    }

    .form-select {
        font-size: 12px;
    }

    .momo-register .form-branch-app .form-event_box {
        margin-top: 0;
        top: unset;
        left: unset;
        transform: unset;
        width: 100%;
    }

}
</style>

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
<div style="background: unset" class="popup-combo item active momo-register">
    <img class="branch-img-pop-up" alt="img" loading="lazy"
        src="<?= base_url(); ?>assets/frontend/images/popup/bg-viet-han.jpg" />
    <img class="pop-up-mobile" alt="img" src="<?= base_url(); ?>assets/frontend/images/popup/bg-viet-han-mb.jpg" />
    <div class="form-branch-app">
        <div class="form-event_box">
            <div class="form-event_header">
                <p style="margin :0" class="form-event_title">
                    Đăng ký tham gia
                </p>
            </div>
            <form class="form-event">
                <div class="input-wrap">
                    <input id="pop_up_name2" type="text" placeholder="Họ và tên">
                </div>
                <div class="input-wrap">
                    <input id="pop_up_phone2" type="text" placeholder="Số điện thoại">
                </div>
                <div class="input-wrap">
                    <input id="pop_up_business_name2" type="text" placeholder="Doanh nghiệp">
                </div>
                <div class="input-wrap">
                    <select id="pop_up_select2" class="form-select" aria-label="Default select example">
                        <option value="Hạng mục quan tâm" selected>Hạng mục quan tâm</option>
                        <option value="Vé thường tham dự">Vé thường tham dự</option>
                        <option value="Tôn vinh thương hiệu vàng làm đẹp uy tín quốc gia">Tôn vinh thương hiệu vàng làm
                            đẹp uy tín quốc gia</option>
                        <option value="Tôn vinh thương hiệu vàng đào tạo làm đẹp uy tín quốc gia">Tôn vinh thương hiệu
                            vàng đào tạo làm đẹp uy tín quốc gia</option>
                        <option value="Tôn vinh hệ thống xuất sắc 2022">Tôn vinh hệ thống xuất sắc 2022</option>
                        <option value="Tôn vinh thương hiệu sản phẩm uy tín quốc gia">Tôn vinh thương hiệu sản phẩm uy
                            tín quốc gia</option>
                        <option value="Tôn vinh thương hiệu bàn tay vàng xuất sắc quốc gia">Tôn vinh thương hiệu bàn tay
                            vàng xuất sắc quốc gia</option>
                    </select>
                </div>
                <div class="form-btn_wrap">
                    <button onclick="() => post_form2()" type="button" class="form-event_btn submit-popup">Đăng ký
                        ngay</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script defer type="text/javascript">
$(".submit-form").click(function() {
    if (($.trim($('#pop_up_phone').val()) !== '') && ($.trim($('#pop_up_select').val()) !== 'Hạng mục quan tâm')) {
        post_form();
    } else {
        alert("Vui lòng điền đầy đủ thông tin")
    }
});

$(".submit-popup").click(function() {
   if (($.trim($('#pop_up_phone2').val()) !== '') && ($.trim($('#pop_up_select2').val()) !== 'Hạng mục quan tâm')) {
        post_form();
    } else {
        alert("Vui lòng điền đầy đủ thông tin")
    }
});

function post_form() {
    $('.submit-form').attr('disabled', 'disabled');
    $('.submit-form').val('Đang gởi...');
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
                reg_message: $('#pop_up_select').val(),
                reg_captcha: $('#g-recaptcha-response').val(),
                reg_action: $('#action').val(),
            }
            console.log(x);

            $.ajax({
                url: "<?php echo base_url() ?>Frontend/send30year",
                type: "post",
                dataType: 'json',
                data: {
                    reg_name: $('#pop_up_name').val() !== "" ? $('#pop_up_name').val() : $(
                        '#pop_up_name2').val(),
                    reg_phone: $('#pop_up_phone').val() !== "" ? $('#pop_up_phone').val() : $(
                        '#pop_up_phone2').val(),
                    reg_business_name: $('#pop_up_business_name').val() !== "" ? $(
                        '#pop_up_business_name').val() : $('#pop_up_business_name2').val(),
                    reg_message:$('#pop_up_select').val() !== "" &&  $('#pop_up_select').val() !== "Hạng mục quan tâm"  ? $('#pop_up_select').val() :
                        $(
                            '#pop_up_select2').val(),
                    reg_captcha: $('#g-recaptcha-response').val() ? $('#g-recaptcha-response')
                        .val() : $('#g-recaptcha-response2').val(),
                    reg_action: $('#action').val(),
                },
                success: function(data) {
                    window.location = BASE_URL + 'thank-you-for-register';
                }
            });
        })
    });
}
</script>