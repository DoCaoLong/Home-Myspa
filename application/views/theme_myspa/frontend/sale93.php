<!-- MENU
================================================== -->

<nav id="menu-wrap" class="menu-back landing-page cbp-af-header">
    <div class="menu">
        <a href="<?php echo base_url();?>"><div class="logo"></div></a>
        <ul>
            <li>
                <a class="change-color-hover-green text-white" href="<?php echo base_url();?>"><?php echo $this->lang->line('home_page');?></a>
            </li>
            <!-- <li>
                <a class="change-color-hover-green text-white current-color-green" href="#">CT Trợ giá<span class="cls-relative"><img class="hot-deal-jun" src="<?php echo base_url();?>assets/frontend/images/fire-hoticon.png"/></span></a>
            </li> -->
            <li>
                <a class="change-color-hover-green text-white" href="<?php echo base_url();?>ve-chung-toi"><?php echo $this->lang->line('about');?></a>
            </li>
            <li>
                <a class="change-color-hover-green text-white" href="https://myspa.vn/blog/category/khach-hang"><?php echo $this->lang->line('customer');?></a>
            </li>
            <li>
                <a class="change-color-hover-green flex-box width-fitcontent-mobile padding-bottom-xsm"  >Giải Pháp<span class="padding-left-xsm"><img  height="" class="drop-down-icon" src="<?php echo base_url();?>assets/frontend/images/icon/vector-down-white.svg" alt="icon fire"/></span></a>
                <ul class="drop-down-box black-bg">
                    <li>
                    <a href="<?php echo base_url();?>phan-mem-quan-ly-spa" class="text-white quicksan-text-md font-weight-bold">Phần mềm quản lý Spa</a> 
                    </li>
                    <hr>
                    <li> <a href="<?php echo base_url();?>phan-mem-quan-ly-phong-kham-tham-my-vien" class="text-white quicksan-text-md font-weight-bold"> Phần mềm quản lý TMV, Clinic </a></li>
                    <hr>
                    <li> <a href="<?php echo base_url();?>phan-mem-quan-ly-salon-toc" class="text-white quicksan-text-md font-weight-bold"> Phần mềm quản lý Salon Tóc</a></li>
                    <hr>
                    <li> <a href="<?php echo base_url();?>phan-mem-quan-ly-tiem-nails" class="text-white quicksan-text-md font-weight-bold"> Phần mềm quản lý Tiệm Nails </a></li>
                    <hr>
                        <li> <a href="<?php echo base_url();?>thiet-ke-app-thuong-hieu" class="text-white quicksan-text-md font-weight-bold"> Thiết kế App Thương Hiệu </a></li>
                </ul>
            </li>
            <li>
                <a class="change-color-hover-green text-white" href="<?php echo base_url();?>bang-gia"><?php echo $this->lang->line('price-list');?></a>
            </li>
            <li>
                <a class="change-color-hover-green text-white" href="https://myspa.vn/blog"><?php echo $this->lang->line('news');?></a>
            </li>
            <li>
                <a class="change-color-hover-green text-white" href="<?php echo base_url();?>ho-tro"><?php echo $this->lang->line('support_1');?></a>
            </li>
            <li>
                <a class="change-color-hover-green text-white login" href="tel:0899855223"><i class="icon icon-call-end"></i> 0899 855 223</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Primary Page Layout
================================================== -->
<div class="section-block padding-bottom section-provide background-sale93">
    <div class="container text-center">
        <br><br><br><br><br>
        <img style="width: 80%; max-width: 800px" src="<?php echo base_url();?>assets/frontend/images/Trogia67-banner.png"/>
        <!-- progress  -->
        <div class="popup-progress popup-progress-1">
            <div style="margin-bottom:5px" data-toggle="tooltip" data-placement="bottom" id="popup_progress" class="progress progress-xs bg-white active progress-striped">
                <div class="progress-bar current-progress"  style="width:<?php echo ($count_register*100)/1000;?>%;background-color: #9ACC51">
                    <span class="text-bold text-20 register-count"><?php echo $count_register;?></span><span> Spa đã được trợ giá</span>
                </div>
                <div class="progress-bar remain-progress bg-white" style="width:<?php echo (100-($count_register*100)/1000);?>%;background-color: #FFF; text-align: right; padding-right:20px;">
                    <span class="text-primary" style="color:#9ACC51">Số lượng có hạn</span>
                </div>
            </div>
            <div class="progress-time text-center hide">
                <span class="time-number time-date">00<br><small>ngày</small></span>
                <span class="time-separate">:</span>
                <span class="time-number time-hour">00<br><small>giờ</small></span>
                <span class="time-separate">:</span>
                <span class="time-number time-minute">00<br><small>phút</small></span>
                <span class="time-separate">:</span>
                <span class="time-number time-second">00<br><small>giây</small></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <br><br>
    </div>
</div>
<div class="section-block padding-bottom section-provide section-register">
    <div class="container">
        <div class="clearfix"></div>
        <br><br>
        <div class="home-title1 text-center" style="margin-bottom: 20px; color:#31257E; ">
            <h2 class="sales-title">GIẢI PHÁP CHO SPA - THẨM MỸ VIỆN<br>ĐÓNG CỬA CHỐNG DỊCH, VẪN CÓ DOANH THU</h2>
            <br>
            <div id="reg_header" ></div>
            <br>
            <img width="45px" src="<?php echo base_url();?>assets/frontend/images/Icon_muiten.png"/>
            <br><br>
            <h2 class="sales-title">ĐĂNG KÝ TRẢI NGHIỆM NGAY</h2>
            <span style="font-size:16px;">Miễn phí dùng thử. Đăng ký trước, kích hoạt sử dụng sau</span>
            <div class="clearfix"></div>
            <br>
            <div class="four columns"></div>
            <div class="four columns" style="padding: 0 30px 30px; border-radius: 10px; background-color: #fff; box-shadow: 0px 0px 15px #D5D2E5">
                <div class="form">
                    <!--form-->
                    <br>
                    <div class="input-area" style="display: flex;flex-direction: column;align-items: center;">
                        <input type="text" name="fname" id="reg_name_1" placeholder="Tên của bạn">
                        <input type="text" name="yphone" id="reg_phone_1" placeholder="Số điện thoại">
                        <input type="email" name="yemail" id="reg_email_1" placeholder="Email">
                        <input type="text" name="bname" id="reg_business_name_1" placeholder="Tên Spa/Salon">
                        <input type="text" name="referral" id="reg_referral_1" placeholder="Bạn biết Myspa qua số ĐT/email...">
                    </div>
                    <div class="text-center" style="margin-top: 30px;">
                        <button class="btn register-btn-1 button-effect button--moema button--text-thick button--text-upper text-purple btn-sale93" id="register_gift_btn" style="border: none;background-color:#fff;color: #e75558;font-size: 16px;font-weight: 700;">ĐĂNG KÝ</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br><br><br>
    </div>
</div>
<div class="clearfix"></div>
<div class="section-block padding-bottom padding-top padding-top-page-1 section-present" style="padding-top: 90px" data-scroll-reveal="enter bottom move 30px over 0.9s after 0.1s">
    <div class="text-white text-center">
        <p style="max-width:700px; margin:140px auto 60px; font-size:18px; font-style: italic; ">Đại dịch một lần nữa trở lại và diễn biến phức tạp hơn trước, gây tổn thất nặng nề về mặt kinh tế đến hầu hết các loại hình kinh doanh chung, không chỉ riêng gì các hệ thống spa, thẩm mỹ viện, salon. Thay vì đổ lỗi do tình hình dịch làm doanh thu sụt giảm, tại sao không tìm giải pháp để ứng phó và sống sót qua mùa dịch này.</p>
    </div>
</div>
<div class="clearfix"></div>
<br><br>
<div class="section-block padding-bottom padding-top padding-top-page-1 section-provide" style="padding-top: 60px;">
    <div class="container text-center">
        <h2 class="sales-title">MYSPA VÀ MPOS ĐỒNG HÀNH CÙNG CHỦ SPA</h2>
        <div class="clearfix"></div>
        <div class="two columns"></div>
        <div class="eight columns">
            <p style="color:#31257E; font-size: 18px;">Đừng để Covi “nhấn chìm” công việc kinh doanh spa, thẩm mỹ viện của bạn. Thay đổi để sống sót là cách duy nhất để doanh nghiệp VẪN CÓ DOANH THU dù kinh doanh thẩm mỹ phải đóng cửa chống dịch. Giải pháp từ Myspa và mPOS:</p>
        </div>
        <img class="img-content" src="<?php echo base_url();?>assets/frontend/images/Landingpage-Trogia67.jpg"/>
    </div>
</div>
<div class="section-block padding-bottom background-color-white how-it-work">
    <div>
        <h2 style="margin-bottom:20px; color:#31257E; font-size: 24px;">MYSPA - Phần Mềm Quản Lý Spa Chuyên Nghiệp</h2>
        <div class="container text-center" style="color:#31257E; font-size: 18px;">
            <div class="clearfix"></div>
            <div class="">
                <img src="<?php echo base_url();?>assets/frontend/images/how-it-work.jpg"/>
                <p style="color:#31257E; font-size: 18px;">(và còn nhiều tính năng khác)</p>
            </div>
            <div class="clearfix"></div>
            <div class="two columns"></div>
            <div class="eight columns">
                <p>Với <b>1000+</b> thương hiệu spa nổi tiếng như Aqua Clinic, BB Thanh Mai, World Medical, Mr.Dam Beauty Clinic tin dùng, vận hành ổn định hơn 3 năm. Myspa chắc chắn là trợ thủ đắc lực không thể thiếu cho các chủ Spa.</p>
                <div class="clearfix"></div>
                <br><br>
                <div class="clearfix"></div>
                <div class="text-center" style="margin-top: 20px;">
                    <a href="#reg_header" class="btn register-btn-1 button-effect button--moema button--text-thick button--text-upper btn-success" id="register_gift_btn" style="border: none;background-color:#31257E !important;color: #fff;font-size: 20px; line-height: 16px; font-weight: 900; padding:15px 0 !important">ĐĂNG KÝ NGAY
                        <br><span class="text-xs text-spacing-xs" style="font-weight: 400; line-height: 10px; font-size: 8px">kích hoạt sử dụng sau</span>
                    </a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Partners -->
<div class="section-block padding-top-small padding-bottom-small">
    <div class="home-link" data-scroll-reveal="enter bottom move 30px over 0.9s after 0.1s">
        <div class="container">
            <div class="twelve columns">
                <div id="owl-sep-4" class="owl-carousel owl-theme" style="display: flex;flex-direction: row; max-width: 100%;">
                    <div class="item">
                        <img style="margin-top: -15px !important; width:120px !important" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logo-mrDam.jpeg"/>
                    </div>
                    <div class="item">
                        <img style="margin-top: 5px !important; width: 80px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logoWorld.png"/>
                    </div>
                    <div class="item">
                        <img style="margin-top: 20px !important;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/museclinic.png"/>
                    </div>
                    <div class="item">
                        <img style="width:150px !important; max-width: 150px !important; margin-top: 10px !important" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/bbbeaute.png "/>
                    </div>
                    <div class="item">
                        <img style="width: 80px !important; margin-top: -15px !important" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/orient.jpg"/>
                    </div>
                    <div class="item">
                        <img style="width: 40px !important; margin-top: -5px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logo-nalee.png"/>
                    </div>
                    <div class="item">
                        <img style="margin-top: 3px !important; width:65px !important" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logo-mCare.png"/>
                    </div>
                    <div class="item">
                        <img style="width: 80px !important; margin-top: -15px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logo-world-beauty-clinic.png"/>
                    </div>
                    <div class="item">
                        <img style="width: 45px !important; margin-top: -10px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logosparadise-05.png"/>
                    </div>
                    <div class="item">
                        <img style="width: 80px !important; margin-top: -20px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logo-thienkhue-beautyacademy-2-01.png"/>
                    </div>
                    <div class="item">
                        <img style="margin-top: 0px !important; width: 40px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logobeu.png"/>
                    </div>
                    <div class="item">
                        <img style="margin-top: -20px !important; width: 80px;" src="<?php echo base_url(); ?>/assets/frontend/images/merchant_logo/logoparagon.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<br><br><br>
<!-- footer -->
<div class="section-block padding-top-bottom background-color-dark-purple">
        <div class="container footer">
            <div class="twelve flex-box flex-columnMobile" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <a href="/" class="logo-footer margin-unset flex-box"><img class="image-contain"src="<?php echo base_url();?>assets/frontend/images/logos/logo-v-w.png" width="115" height="100%" alt="Myspa logo"/></a>
                <p class="slogan-footer max-width-unset padding-left-sm">Phần mềm số 1 về Quản Lý, CSKH dành cho Spa, Salon, Clinic, TMV</p>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12  column unfloatMobile" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <p>&nbsp;</p>
                <h6 class="text-left text-white montserrat-text-md">CÔNG TY MYSPA</h6>
                <a href="<?php echo base_url();?>ve-chung-toi"><p>Về chúng tôi</p></a>
                <a href="https://myspa.vn/blog/category/khach-hang/"><p>Khách hàng</p></a>
                <a href="<?php echo base_url();?>phan-mem"><p >Phần mềm</p></a>
                <a href="<?php echo base_url();?>bang-gia"><p >Bảng giá</p></a>
                <a href="<?php echo base_url();?>blog"><p>Tin tức</p></a>
                <a href="<?php echo base_url();?>ho-tro"><p >Hỗ trợ</p></a>
                <!--            <a href="--><?php //echo base_url();?><!--thiet-bi"><p  >Thiết bị</p></a>-->
                <a href="<?php echo base_url();?>blog/category/tuyen-dung"><p>Tuyển dụng</p></a>
                <a href="<?php echo base_url();?>dieu-khoan-su-dung"><p>Điều khoản sử dụng</p></a>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12  column unfloatMobile" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <p>&nbsp;</p>
                <h6 class="text-left text-white montserrat-text-md">HỖ TRỢ KHÁCH HÀNG</h6>
                <a href="tel:0899310908">
                    <p><i class="icon icon-call-end"></i>&nbsp;&nbsp;Tổng đài tư vấn: 0899 310 908</p>
                </a>
                <a href="tel:0899855223">
                    <p><i class="icon icon-call-end"></i>&nbsp;&nbsp;Tổng đài CSKH: 0899 855 223</p>
                </a>
                <a href="mailto:sales@myspa.vn"><p ><i class="icon icon-envelope"></i>&nbsp;&nbsp; sales@myspa.vn</p></a>
                <a href="mailto:support@myspa.vn"><p ><i class="icon icon-envelope"></i>&nbsp;&nbsp; support@myspa.vn</p></a>
                <a href="<?php echo base_url();?>bang-gia/#questions"><p>Câu hỏi thường gặp</p></a>
            </div>
<div class="col-md-3 col-lg-3 col-sm-12  column unfloatMobile" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <p>&nbsp;</p>
            <h6 class="text-left text-white montserrat-text-md">GIẢI PHÁP</h6>
            <a class="text-bold " href="<?php echo base_url(); ?>phan-mem-quan-ly-spa">
                <p class="quicksan-text-md text-bold">Phần mềm quản lý Spa</p>
            </a>
            <a class="text-bold " href="<?php echo base_url(); ?>phan-mem-quan-ly-phong-kham-tham-my-vien">
                <p class="quicksan-text-md text-bold">Phần mềm quản lý thẩm mỹ viện, clinic</p>
            </a>
            <a class="text-bold " href="<?php echo base_url(); ?>phan-mem-quan-ly-salon-toc">
                <p class="quicksan-text-md text-bold">Phần mềm quản lý Salon Tóc</p>
            </a>
            <a class="text-bold " href="<?php echo base_url(); ?>phan-mem-quan-ly-tiem-nails">
                <p class="quicksan-text-md text-bold">Phần mềm quản lý Tiệm Nails</p>
            </a>
            <a class="text-bold " href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu">
                <p>Thiết kế app thương hiệu</p>
            </a>
            <a class="text-bold " href="<?php echo base_url(); ?>nen-tang-kinh-doanh-nganh-lam-dep">
                <p>Nền tảng kinh doanh ngành làm đẹp</p>
            </a>
        </div>
            <div class="col-md-3 col-lg-3 col-sm-12  column unfloatMobile" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div>
                    <p>&nbsp;</p>
                    <h6 class="text-left text-white montserrat-text-md">MYSPA MANAGER APP</h6>
                    <p>&nbsp;</p>
                    <div class="link-btn">
                        <a href="https://play.google.com/store/apps/details?id=com.myspa.merchant" class="theme-btn google-play-btn">
                            <i class="fa fa-android"></i>
                            <span>Available On</span>
                            Google Play
                        </a>
                        <a href="https://itunes.apple.com/app/myspa-merchant/id1458962203" class="theme-btn app-store-btn">
                            <i class="fa fa-apple"></i>
                            <span>Available On</span>
                            Apple Store
                        </a>
                    </div>
                </div>
                <div>
                    <div class="social-footer">
                        <ul class="list-social-footer">
                            <li class="icon-footer tipped" data-title="facebook" data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
                                <a href="https://www.facebook.com/MyspaVietnam/" target="_blank"><span class="fa-facebook"></span></a>
                            </li>
                            <li class="icon-footer tipped" data-title="linkedin" data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
                                <a href="https://www.linkedin.com/in/myspa/" target="_blank"><span class="fa-linkedin"></span></a>
                            </li>
                            <li class="icon-footer tipped" data-title="youtube" data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
                                <a href="https://www.youtube.com/channel/UCghJOZKur_BMB5KYyVf2KhQ" target="_blank"><span class="fa-youtube"></span></a>
                            </li>
                            <li class="icon-footer tipped" data-title="instagram" data-tipper-options='{"direction":"top","follow":"true","margin":25}'>
                                <a href="https://www.instagram.com/myspa.vn_phanmemquanlyspa/" target="_blank"><span class="fa-instagram"></span></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div><br>
                        <div class="">
                            <a target="_blank" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=46314">
                                <img class="img-trade" width="100%" height="100%" src="<?php echo base_url();?>assets/frontend/images/logoSaleNoti.png" alt="image trade" width="100%" height="100%"/>
                            </a>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-white background-color-dark-purple">
        <p class="text-sm">© 2018 MYSPA JSC - Công ty CP MYSPA - Lầu 4, Nam Giao building 261-263 Phan Xích Long, Phường 2, Quận Phú Nhuận, TP.HCM - GPĐKKD: 0314964245, cấp ngày:03/04/2018, bởi Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư TP.HCM</span></p>
        <br>
    </div>

<!-- JAVASCRIPT
================================================== -->

<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/retina.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/header-anime.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/tipper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/scrolltoid.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/scrollReveal.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.chaffle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/vivus.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/owlCarousel.js"></script>
<!-- Custom JavaScript
================================================== -->
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/custom-about.js?v=<?php echo $this->config->item('version'); ?>"></script>

<!-- End Document
================================================== -->

<script type="text/javascript">
    if ($(window).width() < 728) {
        $('.img-content').attr("src","<?php echo base_url();?>assets/frontend/images/Landingpage-Trogia67-mobile.jpg");
        $('#img_campaign').attr("width","375px");
        $('#img_campaign').attr("max-width","100%");
    }

    // Set the date we're counting down to
    var countDownDate = new Date("sep 24, 2021 23:59:59").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      $('.time-date').empty().html(days+'<br><small>ngày</small>');
      $('.time-hour').empty().html(hours+'<br><small>giờ</small>');
      $('.time-minute').empty().html(minutes+'<br><small>phút</small>');
      $('.time-second').empty().html(seconds+'<br><small>giây</small>');

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
      }
    }, 1000);


    //Update register number
    var x = setInterval(function() {
        $.ajax({
            url: BASE_URL+"Frontend/get_count_register",
            type: "get",
            dataType: 'json',
            success: function (result) {
                var count_register = result.count_register;
                $('.current-progress').width(parseFloat(count_register*100/1000)+'%');
                $('.remain-progress').width((80-parseFloat(count_register*100/1000))+'%');
                $('.register-count').empty().append(result.count_register);
            }
        });
        return false;
      
    }, 10000);

    $(function(){
        var owl_4 = $('#owl-sep-4');
        owl_4.owlCarousel({
            loop:true,
            pagination : false,
            slideSpeed : 500,
            paginationSpeed : 500,
            autoPlay: 5000,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                960:{
                    items:5
                },
                1200:{
                    items:7
                }
            }
        });

        owl_4.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });


        $("#register_gift_btn").click(function(){
            // SUBMIT FORM
            if ($.trim($('#reg_phone_1').val()) == '') {
                $('#reg_phone_1').focus();
                return false;
            }

            $('#register_gift_btn').attr('disabled','disabled');
            $('#register_gift_btn').empty().append('Đang gởi...');
            $.ajax({
                url: "<?php echo base_url()?>Frontend/register",
                type: "post",
                dataType: 'json',
                data: {
                    reg_name: $('#reg_name_1').val(),
                    reg_phone: $('#reg_phone_1').val(),
                    reg_business_name: $('#reg_business_name_1').val(),
                    reg_business_add: $('#reg_business_add_1').val(),
                    reg_email: $('#reg_email_1').val(),
                    reg_pass: '',
                    reg_type: 'ĐĂNG KÝ NHẬN TRỢ GIÁ 93% - MPOS',
                    reg_referral: $('#reg_referral_1').val(),
                },
                success: function (data) {
                    $('.submit').removeAttr('disabled');
                    $('.submit').val('Submit');
                    if (typeof(data) == 'object') {
                        if (data.status == 'ok') {
                            window.location = BASE_URL+'thank-you-for-register';
                            //$('#msform').empty().append('<br><h4 class="text-white text-center">Thank you <i class="icon icon-check text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                        } else {
                            $('#msform').empty().append('<br><h4 class="text-white text-center">Thất bại <i class="icon icon-ban text-lg"></i></h4><br><p class="text-center text-white">' + data.message + '<br><br></p>');
                        }
                    }
                }
            });
            return false;
        });

    });

    function set_type(type) {
        $('#reg_type').val(type);
    }
</script>