<!-- popup regis -->
<div class="popup-regis">
    <div class="popup-regis_content">
        <div class="form-regis_cancel">
            <img src="<?= base_url(); ?>assets/frontend/images/icon/cancel-icon.svg" alt="btn-cancel">
        </div>
        <div class="popup-regis_img">
            <img lazy data-src="<?= base_url(); ?>assets/frontend/images/popup/form-popup-free-marketing-1.jpg"
                alt="btn-play">
        </div>
        <div class="popup-regis_form">
            <div class="regis-form_header">
                <p class="regis-form_header-title">Đăng ký bán hàng trên BeautyX</p>
            </div>
            <div class="regis-form_body">
                <p class="regis-form_body-title">Thông tin liên hệ</p>
                <form class="form-body_wrap">
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/user.svg" alt="icon-user">
                        <input id="reg_name" class="input-res" type="text" placeholder="Họ và tên">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/building.svg" alt="icon-user">
                        <input id="reg_business_name" class="input-res" type="text" placeholder="Doanh nghiệp">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/map-pin.svg" alt="icon-user">
                        <input id="reg_business_add" class="input-res" type="text" placeholder="Địa chỉ">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/phone_stroke_purple.svg"
                            alt="icon-user">
                        <input required id="reg_phone" class="input-res" type="number"
                            placeholder="Số điện thoại (bắt buộc)">
                    </div>
                    <span class="test-err_form">Vui lòng nhập số điện thoại</span>

                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/mail.svg" alt="icon-user">
                        <input id="reg_email" class="input-res" type="email" placeholder="Email">
                    </div>
                    <button onclick="handleSubmitRegisFormBeautyx()" type="button" class="form-regis_btn">Đăng
                        ký
                        ngay</button>
                </form>
                <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu">
                    <p class="form-seemore">
                        Tìm hiểu thêm
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- close popup-regis -->

<!-- popup regis MB -->
<div class="popup-regis_mb">
    <div class="popup-regis_mb-content">
        <div class="form-regis_cancel">
            <img src="<?= base_url(); ?>assets/frontend/images/icon/cancel-icon.svg" alt="btn-cancel">
        </div>
        <div class="popup-regis_form">
            <div class="regis-form_header">
                <p class="regis-form_header-title">Đăng ký bán hàng trên BeautyX</p>
            </div>
            <div class="regis-form_body">
                <form class="form-body_wrap" action="handleSubmitRegisFormBeautyx()" method="post">
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/user.svg" alt="icon-user">
                        <input id="reg_name" class="input-res" type="text" placeholder="Họ và tên">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/building.svg" alt="icon-user">
                        <input id="reg_business_name" class="input-res" type="text" placeholder="Doanh nghiệp">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/map-pin.svg" alt="icon-user">
                        <input id="reg_business_add" class="input-res" type="text" placeholder="Địa chỉ">
                    </div>
                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/phone_stroke_purple.svg"
                            alt="icon-user">
                        <input required id="reg_phone" class="input-res" type="number"
                            placeholder="Số điện thoại (bắt buộc)">
                    </div>
                    <span class="test-err_form">Vui lòng nhập số điện thoại</span>

                    <div class="form-wrap_input">
                        <img src="<?= base_url(); ?>assets/frontend/images/icon/mail.svg" alt="icon-user">
                        <input id="reg_email" class="input-res" type="email" placeholder="Email">
                    </div>

                    <button onclick="handleSubmitRegisFormBeautyx()" type="button" class="form-regis_btn">Đăng ký
                        ngay</button>
                </form>
                <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu">
                    <p class="form-seemore">
                        Tìm hiểu thêm
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- close popup regis MB -->