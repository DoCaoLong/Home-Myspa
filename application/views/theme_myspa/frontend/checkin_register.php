<!-- JAVASCRIPT
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollReveal.js"></script> -->

<!-- Custom JavaScript
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/custom-home-1.js"></script>

<div class="register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="height: 100vh;background-color:transparent">
    <div class="modal-dialog modal-lg" role="document" style="background-color:transparent">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-12">
                    <br><br>
                    <h2 class="text-white" style="font-size: 20px;line-height: 26px;">
                        Đăng ký sử dụng <br/> Myspa Check In
                    </h2>
                    <br>
                </div>
                <!-- MultiStep Form -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Thông tin đăng ký</li>
                                <li>Thông tin Spa/Clinic/TMV</li>
                                <li>Hoàn thành</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Thông tin của bạn</h2>
                                <h3 class="fs-subtitle">Cho chúng tôi biết thông tin về bạn</h3>
                                <input type="text" name="name" id="reg_name" placeholder="Họ tên"/>
                                <input type="text" name="phone" id="reg_phone" placeholder="Số điện thoại"/>
                                <input type="button" name="next" class="next action-button" value="Tiếp theo"/>
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Thông tin Spa/Clinic/TMV</h2>
                                <h3 class="fs-subtitle">Thông tin về Spa/Salon của bạn</h3>
                                <input type="text" name="business_name" id="reg_business_name" placeholder="Tên Spa/Salon"/>
                                <input type="text" name="business_add" id="reg_business_add" placeholder="Địa chỉ Spa/Salon"/>
                                <input type="button" name="previous" class="previous action-button-previous" value="Trở lại"/>
                                <input type="button" name="next" class="next action-button" value="Tiếp theo"/>
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Hoàn thành</h2>
                                <h3 class="fs-subtitle">Email nhận thông tin</h3>
                                <input type="email" name="email" id="reg_email" placeholder="Email"/>
                                <input type="button" name="previous" class="previous action-button-previous" value="Trở lại"/>
                                <input type="submit" name="submit" class="submit action-button" value="Hoàn thành"/>
                            </fieldset>
                            <input type="hidden" id="reg_type" value="<?php echo $register_type?>"/> 
                            <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response"/>
                            <input type="hidden" id="action" name="action"/>
                        </form>
                    </div>
                </div>
                <!-- /.MultiStep Form -->
            </div>
        </div>
    </div>
</div>
        