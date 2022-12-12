<div class="popup-software">
    <div class="popup-software_content">
        <div class="form-regis_cancel">
            <img lazy data-src="<?= base_url(); ?>assets/frontend/images/icon/cancel-icon.svg" alt="btn-cancel">
        </div>
        <p class="popup-software_title">
            Đăng ký phần mềm quản lý spa
        </p>
        <div class="popup-software_wrap">
            <!-- <div class="popup-software_progressbar">
                <div class="software-progressbar_steps">
                    <div class="software-progressbar_step active">
                        <p class="progressbar-step_number">1</p>
                        <span class="progressbar-step_title">Thông tin đăng ký</span>
                    </div>
                    <div class="software-progressbar_step">
                        <p class="progressbar-step_number">2</p>
                        <span class="progressbar-step_title">Thông tin SPA/CLINIC/TMV</span>
                    </div>
                    <div class="software-progressbar_step">
                        <p class="progressbar-step_number">3</p>
                        <span class="progressbar-step_title">Hoàn thành</span>
                    </div>
                </div>
            </div> -->

            <div class="popup-sofware_infor">
                <div class="software-form active">
                    <p class="sofware-form_title">
                        Thông tin đăng ký
                    </p>
                    <form class="popup-sofware_form">
                        <div class="wrap-input-soft">
                            <div class="form-wrap_input">
                                <img src="<?= base_url(); ?>assets/frontend/images/icon/user.svg" alt="icon-user">
                                <input id="reg_name2" class="input-res" type="text" placeholder="Họ và tên">
                            </div>
                            <span class="test-err_form">Vui lòng nhập họ và tên</span>
                        </div>
                        <div class="wrap-input-soft">
                            <div class="form-wrap_input">
                                <img src="<?= base_url(); ?>assets/frontend/images/icon/phone_stroke_purple.svg"
                                    alt="icon-user">
                                <input id="reg_phone2" class="input-res" type="number" placeholder="Số điện thoại">
                            </div>
                            <span class="test-err_form">Vui lòng nhập Số điện thoại</span>
                        </div>

                        <div class="wrap-input-soft">
                            <div class="form-wrap_input">
                                <img src="<?= base_url(); ?>assets/frontend/images/icon/building.svg" alt="icon">
                                <input id="reg_business_name2" class="input-res" type="text"
                                    placeholder="Tên SPA/CLINIC/TMV">
                            </div>
                            <span class="test-err_form">Vui lòng nhập tên Spa</span>

                        </div>
                        <div class="wrap-input-soft">
                            <div class="form-wrap_input ">
                                <img src="<?= base_url(); ?>assets/frontend/images/icon/map-pin.svg" alt="icon">
                                <input id="reg_business_add2" class="input-res" type="text"
                                    placeholder="Địa chỉ SPA/CLINIC/TMV">
                            </div>
                            <span class="test-err_form">Vui lòng nhập địa chỉ Spa</span>

                        </div>
                        <div class="wrap-input-soft">
                            <div class="form-wrap_input">
                                <img src="<?= base_url(); ?>assets/frontend/images/icon/mail.svg" alt="icon">
                                <input id="reg_email2" class="input-res" type="text" placeholder="Email nhận thông tin">
                            </div>
                            <span class="test-err_form">Vui lòng nhập email</span>

                        </div>

                        <div class="wrap-btn_software">
                            <button onclick="handleSubmitRegisFormAppDesign()" type="button"
                                class="form-regis_btn-close sofware-form_button">
                                Tiếp tục
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>