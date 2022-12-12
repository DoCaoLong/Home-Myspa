<?php
$page_content = [
    'hero-banner-title' => 'THAY ĐỔI NHỎ - HIỆU QUẢ LỚN',
    'hero-banner-subtitle' => ' Phần mềm quản lý <br>phòng khám <br>chuyên nghiệp nhất hiện nay',
    'hero-banner-check-list' => [
        'Giải pháp tối ưu quản lý phòng khám đa khoa, chuyên khoa',
        'Tiết kiệm thời gian, giảm chi phí vận hành nhân sự',
        'Góp phần nâng cao chất lượng dịch vụ tại phòng khám'
    ],
    'btn-register' => ['title' => 'ĐĂNG KÝ NGAY', 'description' => 'Đăng ký để trải nghiệm <br> phần mềm phòng khám miễn phí 7 ngày'],
    // counter data section 
    'counting-title' => 'Phần mềm quản lý phòng khám Myspa',
    'counter-content' => [
        [
            'num' => '+<p class="count">1000</p>',
            'description' => 'phòng khám tin dùng'
        ],
        [
            'num' => '+ <p class="count padding-right-xsm">5 </p> năm',
            'description' => 'Vận hành ổn định'
        ],
        [
            'num' => '+<p class="count">5000</p>',
            'description' => 'Người dùng trong và ngoài nước'
        ],
    ],
    // logo our customer 
    'our-cus-title' => 'Những phòng khám hàng đầu đã và đang sử dụng phần mềm phòng khám Myspa',
    'our-cus-logo' => [
        [
            [
                'src' => '/Partner-logo/tmv_kasa.png',
                'alt' => 'logo tmv kasa'
            ]
        ],
        [
            [
                'src' => '/Partner-logo/tmv-aqua.jpeg',
                'alt' => 'logo tmv kasa'
            ],
            [
                'src' => '/Partner-logo/tmv-amoon.png',
                'alt' => 'logo tmv kasa'
            ],
            [
                'src' => '/Partner-logo/tmv_kasa.png',
                'alt' => 'logo tmv aura clinic'
            ]
        ],
        [
            [
                'src' => '/Partner-logo/tmv-aura-clinic.png',
                'alt' => 'logo tmv aura clinic'
            ],
            [
                'src' => '/Partner-logo/tmv-pamas.png',
                'alt' => 'logo tmv pamas'
            ],
            [
                'src' => '/Partner-logo/spala-clinic.png',
                'alt' => 'logo tmv spala clinic'
            ],
            [
                'src' => '/Partner-logo/Frame 224-3.png',
                'alt' => 'logo tmv partner'
            ]
        ],
        [
            [
                'src' => '/Partner-logo/muse-clinic.png',
                'alt' => 'logo tmv muse'
            ],
            [
                'src' => '/Partner-logo/tmv_kasa.png',
                'alt' => 'logo tmv kasa'
            ],
            [
                'src' => '/Partner-logo/tmv_kasa.png',
                'alt' => 'logo tmv kasa'
            ]
        ],
        [
            [
                'src' => 'assets/frontend/images/Partner-logo/tmv_kasa.png',
                'alt' => 'logo tmv kasa'
            ]
        ]
    ],
];
?> <div id="container"></div> <?php echo $this_controller->nav_bar_frontend(); ?>
<!-- Primary Page Layouts
    ================================================== -->
<div class="section-block full-height background-color-purple banner-clinic mobile-banner ">
    <div class="home-text pt-72px-mobi">
        <div class="container">
            <div class="eleven pull-left columns">
                <div class="text-center-mobile">
                    <span class="quicksan-text-md font-weight-bold text-primary-demo ">
                        <?= $page_content['hero-banner-title'] ?> </span>
                </div>
                <br class="mobile-hide">
                <h1 class="text-primary-demo h1-cus-size"> <?= $page_content['hero-banner-subtitle'] ?> </h1>
                <ul class="text-primary-demo text-under-h1">
                    <li class="quicksan-text-md font-weight-bold flex-box"><span style="margin-right: 4px"
                            class="flex-box"> <img width="100%" height="" class="phone"
                                src="<?php echo base_url(); ?>assets/frontend/images/icon/Union.svg"
                                style="vertical-align: baseline;"
                                alt="icon phone" /></span><?= $page_content['hero-banner-check-list'][0] ?></li>
                    <li class="quicksan-text-md font-weight-bold flex-box" style="margin: 8px 0;"><span
                            style="margin-right: 4px" class="flex-box"> <img width="100%" height="" class="phone"
                                src="<?php echo base_url(); ?>assets/frontend/images/icon/Union.svg"
                                style="vertical-align: baseline;"
                                alt="icon phone" /></span><?= $page_content['hero-banner-check-list'][1] ?></li>
                    <li class="quicksan-text-md font-weight-bold flex-box" style="align-items: flex-start;"><span
                            style="margin-right: 4px;" class="flex-box"> <img width="100%" height="" class="phone"
                                src="<?php echo base_url(); ?>assets/frontend/images/icon/Union.svg"
                                style="vertical-align: baseline;"
                                alt="icon phone" /></span><?= $page_content['hero-banner-check-list'][2] ?></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="eleven pull-left columns flex-box btn-contain">
                <button class="btn-submit-landing-page green bottom-left-position unset-margin-top" id="send"
                    data-toggle="modal" data-target=".register-modal"> <?= $page_content['btn-register']['title'] ?>
                </button>
                <p class="quicksan-text-md font-weight-bold text-secondary-demo banner-register-description">
                    <?= $page_content['btn-register']['description'] ?></p>
            </div>
        </div>
    </div>
    <div class="mobile-banner-image">
        <img src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/banner/phan-mem-quan-ly-TMV-Clinic/banner-mobile.png"
            alt="mobile">
    </div>
</div>
<div class="section-block">
    <div
        class="section-block padding-bottom section-provide landing-pd bg-sincos-line number-section cls-relative unset-mar-mobi">
        <div class="container ">
            <div class="text-center text-white margin-bottom-main-title"
                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <h2 class="cus-title__home montserrat-text-md  text-white"> <?= $page_content['counting-title'] ?> </h2>
            </div>
            <div class="number-absolute-block flex-box justify-content-sapce-between text-primary-demo text-center"
                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div class="col-sm-12 col-md-4 col-xs-12 grey-circle perfect-circle big-circle circle-padding">
                    <div class="white-circle perfect-circle">
                        <span class=" montserrat-text-lger big-num-gap"
                            style="display: inline-flex;"><?= $page_content['counter-content'][0]['num'] ?></span>
                        <span
                            class="quicksan-text-md font-weight-bold text-inside-circle"><?= $page_content['counter-content'][0]['description'] ?></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-xs-12 grey-circle perfect-circle big-circle circle-padding">
                    <div class="white-circle perfect-circle">
                        <span class=" montserrat-text-lger big-num-gap "
                            style="display: inline-flex;"><?= $page_content['counter-content'][1]['num'] ?></span>
                        <span
                            class="quicksan-text-md font-weight-bold text-inside-circle"><?= $page_content['counter-content'][1]['description'] ?></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-xs-12 grey-circle perfect-circle big-circle circle-padding">
                    <div class="white-circle perfect-circle">
                        <span class=" montserrat-text-lger big-num-gap"
                            style="display: inline-flex;"><?= $page_content['counter-content'][2]['num'] ?></span>
                        <span
                            class="quicksan-text-md font-weight-bold text-inside-circle"><?= $page_content['counter-content'][2]['description'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white">
    <div class="section-block">
        <div class="container  text-primary-demo text-center">
            <div class="text-center margin-bottom-main-title"
                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <h2 class="cus-title__home montserrat-text-md  text-primary-demo"> <?= $page_content['our-cus-title'] ?>
                </h2>
            </div>
        </div>
        <div class="container grid-5-custom flex-box-row">
            <div class=" flex-box-column mobile-flex-hide">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="logo-partner-block tmv_kasa mobile-hide">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv_kasa.png" width="100%"
                        alt="">
                </div>
            </div>
            <div class=" flex-box-column margin-partner-logo-section">
                <div class="margin-first logo-partner-block aqua"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv-aqua.jpeg"
                        width="100%" alt="logo tmv auqa">
                </div>
                <div class="logo-partner-block tmv-amoon"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv-amoon.png"
                        width="100%" alt="logo tmv amoon">
                </div>
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="logo-partner-block tmv_kasa mobile-show">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv_kasa.png" width="100%"
                        alt="logo tmv kasa">
                </div>
            </div>
            <div class=" flex-box-column">
                <div class="logo-partner-block" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv-aura-clinic.png"
                        width="100%" alt="logo tmv aura">
                </div>
                <div class="margin-mid logo-partner-block tmv-pamas"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/tmv-pamas.png"
                        width="100%" alt="logo tmv pamas">
                </div>
                <div class="logo-partner-block spala-clinic"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/spala-clinic.png"
                        width="100%" alt="logo tmv spala">
                </div>
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="logo-partner-block mobile-show">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/Frame 224-3.png"
                        width="100%" alt="logo partner">
                </div>
            </div>
            <div class=" flex-box-column margin-partner-logo-section">
                <div class="margin-first logo-partner-block muse-clinic"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/muse-clinic.png"
                        width="100%" alt="logo tmv muse">
                </div>
                <div class="logo-partner-block bb-thanh-mai"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/bb-thanh-mai.png"
                        width="100%" alt="logo tmv bb thanh mai">
                </div>
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="logo-partner-block pmt-aesthetic-clinic mobile-show">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/pmt-aesthetic-clinic.png"
                        width="100%" alt="logo tmv aestheticr">
                </div>
            </div>
            <div class=" flex-box-column mobile-flex-hide">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="logo-partner-block pmt-aesthetic-clinic mobile-hide">
                    <img lazy data-src="<?= base_url(); ?>assets/frontend/images/Partner-logo/pmt-aesthetic-clinic.png"
                        width="100%" alt="logo tmv aesthetic">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white">
    <div class="section-block">
        <div class="container padding-top text-primary-demo text-center unset-pad-mobi">
            <div class="text-center margin-bottom-main-title">
                <h2 class="cus-title__home montserrat-text-md  text-primary-demo "
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Tính năng nổi bật phần mềm quản lý
                    phòng khám Myspa </h2>
            </div>
        </div>
        <div class="container mobile-flex-column" style="max-width:1202px">
            <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl mobile-hide">
                <div class="row margin-bottom-xl">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/user-Interface.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset unset-mar-mobi">
                            Giao diện phần mềm phòng khám dễ sử dụng </h3>
                        <p class="quicksan-text-md text-align-justify"> Giao diện hiện đại, dễ hiểu và tối ưu cho phòng
                            khám từ nhỏ đến lớn. Các tính năng được sắp xếp theo quy trình công việc thực tiễn tại các
                            phòng khám, giúp thuận tiện cho người quản lý. </p>
                    </div>
                </div>
                <div class="row margin-bottom-xl" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/customer.png"
                            alt="icon">
                    </div>
                    <div>
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Tích hợp nhiều
                            tính năng trên phần mềm quản lý phòng khám </h3>
                        <p class="quicksan-text-md text-align-justify"> Kết hợp nhiều tính năng quản lý nhân viên, quản
                            lý thuốc, kê toa, quản lý sản phẩm, kho thuốc… Báo cáo chuyên sâu với các biểu đồ hiện đại
                            giúp chủ phòng khám dễ dàng đối soát số liệu hằng tháng. </p>
                    </div>
                </div>
                <div class="row" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/feature.png"
                            alt="icon">
                    </div>
                    <div>
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Quản lý hồ sơ
                            khách hàng với phần mềm quản lý phòng khám đa khoa </h3>
                        <p class="quicksan-text-md text-align-justify"> Quản lý thông tin khách hàng như tên, số điện
                            thoại, địa chỉ, lịch đặt hẹn, quá trình điều trị, thông tin đơn thuốc… Quản lý hồ sơ sức
                            khỏe như huyết áp, mạch, các chỉ định cận lâm sàng, lịch sử khám chữa bệnh, ... </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl mobile-show mt-16px-mb"
                id="func">
                <div class="panel panel-default padding-sm unset-mar-mobi"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: transparent; border-radius: 8px">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/user-Interface.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset unset-mar-mobi"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Dễ dàng sử dụng với giao diện
                        hiện đại </h3>
                    <div id="func_One-1" class="panel-collapse  collapse clearfix-custom text-dark-blue padding-top-sm"
                        role="tabpanel" aria-labelledby="func_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <p class="quicksan-text-md text-align-justify"> Giao diện hiện đại, dễ hiểu với đầy đủ các tính
                            năng phù hợp cho các doanh nghiệp kinh doanh dịch vụ làm đẹp từ nhỏ đến lớn. Đội ngũ hỗ trợ
                            kỹ thuật dày dặn kinh nghiệm hướng dẫn khách hàng sử dụng phần mềm từ A đến Z. Miễn phí buổi
                            đào tạo tổng quan cho nhân sự của chuỗi doanh nghiệp. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="func_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#func" aria-expanded="false" href="#func_One-1"
                            aria-controls="func_One-1">
                            <img class="icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default padding-sm unset-mar-mobi"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/feature.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset unset-mar-mobi"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Tích hợp nhiều tính năng </h3>
                    <div id="func_One-2" class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm"
                        role="tabpanel" aria-labelledby="func_One2">
                        <p class="quicksan-text-md text-align-justify"> Phần mềm hỗ trợ 2 ngôn ngữ Tiếng Anh và Tiếng
                            Việt trong hệ thống. Kết hợp nhiều tính năng quản lý nhân sự, thông tin khách hàng, thu chi,
                            sản phẩm, kho hàng… Báo cáo chuyên sâu với các biểu đồ hiện đại giúp doanh nghiệp dễ dàng
                            đối soát số liệu hằng tháng. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="func_One2"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#func" aria-expanded="false" href="#func_One-2"
                            aria-controls="func_One-2">
                            <img class="icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default padding-sm"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/customer.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset unset-mar-mobi"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Quản lý thông tin khách hàng
                    </h3>
                    <div id="func_One-3" class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm"
                        role="tabpanel" aria-labelledby="func_One3">
                        <p class="quicksan-text-md text-align-justify"> Quản lý thông tin khách hàng hiệu quả như tên,
                            số điện thoại, địa chỉ, lịch đặt hẹn, quá trình điều trị, thông tin đơn thuốc… Dễ dàng tạo
                            chương trình khuyến mãi phù hợp, quà tặng khách hàng, chăm sóc khách hàng cũ tích hợp thêm
                            tính năng gửi SMS, gửi voucher khuyến mãi giúp khách hàng có những trải nghiệm tuyệt vời tại
                            phòng khám. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="func_One3"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#func" aria-expanded="false" href="#func_One-3"
                            aria-controls="func_One-3">
                            <img class="icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div>
                    <img class="image-size" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/phan-mem-tham-my-vien/1.png"
                        alt="Ngoc image">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block bg-transfer-bottom padding-bottom-xxl pb-100px-mobi padding-mobile-bottom-xl">
    <div class="container">
        <div class="container text-center">
            <div class="text-center margin-bottom-main-title"
                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <h2 class="cus-title__home montserrat-text-md  text-white"> Phần mềm quản lý phòng khám<br
                        class="mobile-hide" /> chuyên nghiệp nhất hiện nay </h2>
            </div>
        </div>
    </div>
    <div class=" container" style="max-width:1202px;" id="quan-ly-tham-my-vien">
        <div class="mobile-hide">
            <ul class="ul-tab" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <li class="Manage-customer active" data-href="#tabcontent-1"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer.svg"
                        alt="icon">
                    <h3 class="montserrat-text-md text-white active">Quản lý khách hàng</h3>
                </li>
                <li class="Controlling-economic" data-href="#tabcontent-2"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg"
                        alt="icon">
                    <h3 class="montserrat-text-md text-white">Quản lý tài chính</h3>
                </li>
                <li class="Manage-employee" id="quan-ly-nhan-su" data-href="#tabcontent-3"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg"
                        alt="icon">
                    <h3 class="montserrat-text-md text-white">Quản lý nhân sự</h3>
                </li>
                <li class="Manage-warehouse" data-href="#tabcontent-4"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <img lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg"
                        alt="icon">
                    <h3 class="montserrat-text-md text-white">Quản lý kho thuốc</h3>
                </li>
            </ul>
        </div>
        <div class="tab-pannel mobile-hide">
            <div id="tabcontent-1" class="tab-content ">
                <div class="row padding-top-md">
                    <div class="col-md-5 padding-unset-right">
                        <img lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/phan-mem-tham-my-vien/2 1.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" width="100%"
                            alt="Phần mềm quản lý phòng khám">
                    </div>
                    <div class="col-md-7 padding-top-md padding-left-xl" id="accordion1" role="tablist"
                        aria-multiselectable="true">
                        <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="flex-box justify-content-sapce-between" style="width: 100%" data-toggle="collapse"
                                href="#collapseOne" data-parent="#accordion2" aria-expanded="false"
                                aria-controls="collapseOne">
                                <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">Quản
                                    lý hồ sơ sức khoẻ khách hàng</h3>
                                <img class="icon" lazy
                                    data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                    alt="icon">
                            </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse  clearfix-custom collapse in" role="tabpanel"
                            aria-expanded="false" aria-labelledby="headingOne"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <p
                                class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                Phần mềm quản lý phòng khám giúp lưu trữ hồ sơ khách hàng dễ dàng. Giúp doanh nghiệp tối
                                ưu được chất lượng dịch vụ, xây dựng được quan hệ khách hàng từ đó thúc đẩy doanh thu.
                            </p>
                            <div class="col-md-6 padding-unset-left">
                                <div class="margin-bottom-mdd">
                                    <span class="high-light-span">
                                        <hr>
                                        <hr>
                                    </span>
                                    <p class="quicksan-text-md text-white text-align-justify"> Hồ sơ thông tin khách
                                        hàng được lưu trữ một cách chi tiết như: tên, sđt, nghề nghiệp, quá trình điều
                                        trị, bệnh án, đơn thuốc, chữ ký điện tử... </p>
                                </div>
                                <div class="margin-bottom-mdd">
                                    <span class="high-light-span">
                                        <hr>
                                        <hr>
                                    </span>
                                    <p class="quicksan-text-md text-white text-align-justifgity"> Phân chia tầng bậc
                                        khách hàng sử dụng dịch vụ (khách hàng đăng ký khám lần đầu, khách tái khám,
                                        khách hàng VIP…) </p>
                                </div>
                                <div class="margin-bottom-mdd">
                                    <span class="high-light-span">
                                        <hr>
                                        <hr>
                                    </span>
                                    <p class="quicksan-text-md text-white text-align-justify"> Phần mềm quản lý phòng
                                        khám răng hàm mặt tích hợp tính năng đặt lịch hẹn thăm khám online, giúp nhân sự
                                        chủ động sắp xếp thời gian phục vụ khách hàng. </p>
                                </div>
                            </div>
                            <div class="col-md-6 padding-unset-right">
                                <div class="margin-bottom-mdd">
                                    <span class="high-light-span">
                                        <hr>
                                        <hr>
                                    </span>
                                    <p class="quicksan-text-md text-white text-align-justify"> Lưu lại không giới hạn
                                        hình ảnh của khách hàng, trong quá trình thăm khám, điều trị tại phòng khám.
                                    </p>
                                </div>
                                <div class="margin-bottom-mdd">
                                    <span class="high-light-span">
                                        <hr>
                                        <hr>
                                    </span>
                                    <p class="quicksan-text-md text-white text-align-justify"> Kết nối được với điện
                                        thoại và máy tính bảng, dễ dàng thao tác khi nhân sự tư vấn khách hàng khi sử
                                        dụng dịch vụ thăm khám, điều trị bệnh… </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabcontent-2" class="tab-content" style="display: none">
                <div class="row padding-top-md">
                    <div class="col-md-5 padding-unset-right">
                        <img lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-thu-chi.png"
                            width="100%" alt="Phần mềm phòng khám quản lý thu chi">
                    </div>
                    <div class="col-md-7 padding-top-md padding-left-xl panel-group" id="manage" role="tablist"
                        aria-multiselectable="true">
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseTwo1">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage" aria-expanded="true"
                                    href="#collapseTwo-1" aria-controls="collapseTwo-1">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Quản lý tài chính - thu chi doanh nghiệp</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="collapseTwo-1" class="panel-collapse  collapse in clearfix-custom "
                                aria-expanded="true" role="tabpanel" aria-labelledby="collapseTwo1">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Thống kê và kiểm soát toàn bộ tình hình thu chi, doanh thu của một hoặc chuỗi cơ sở
                                    phòng khám. Tạo và lập phiếu thu chi, kiểm tra tài chính nhanh chóng với phần mềm
                                    quản lý phòng khám nhỏ đến lớn. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Quản lý quỹ tiền theo
                                            ngày/tuần/tháng/quý/năm, kiểm soát chặt chẽ dòng tiền giữa các cơ sở. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Xem lại chi tiết
                                            lịch sử thu chi hằng tháng, tồn đầu kỳ, tồn cuối kỳ, tổng thu và chi, đảm
                                            bảo tính chính xác với chi tiêu thực tế </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Phân quyền nhân sự
                                            quản lý thu chi theo từng danh mục chỉ định, quản lý trạng thái phiếu thu –
                                            chi trên phần mềm phòng khám Myspa. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseTwo2">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage" aria-expanded="false"
                                    href="#collapseTwo-2" aria-controls="collapseTwo-2">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Quản lý công nợ hiệu quả</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="collapseTwo-2" class="panel-collapse collapse clearfix-custom " role="tabpanel"
                                aria-labelledby="collapseTwo2">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Các đơn nhập sản phẩm, bán sản phẩm dịch vụ đều được ghi lại chi tiết, tự động cập
                                    nhật công nợ của khách hàng và nhà cung cấp khi phát sinh giao dịch/ thanh toán với
                                    phần mềm quản lý phòng khám </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Truy xuất dễ dàng
                                            công nợ từ phần mềm Myspa, báo cáo công nợ hàng tháng nhanh chóng. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Quản lý công nợ
                                            của khách hàng chi tiết, chặt chẽ theo ngày/tháng/ quý/ năm </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Thông báo công nợ
                                            hàng tháng để nhắc hẹn thanh toán </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Thống kê chi tiết
                                            công nợ nhà cung cấp </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Ghi nhận chi tiết để
                                            thu hồi công nợ, hạn chế sai sót </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabcontent-3" class="tab-content" style="display: none">
                <div class="row padding-top-md">
                    <div class="col-md-5 padding-unset-right">
                        <img lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-nhan-vien.png"
                            width="100%" alt="Phần mềm quản lý dịch vụ phòng khám">
                    </div>
                    <div class="col-md-7 padding-top-md padding-left-xl panel-group" id="manage-3" role="tablist"
                        aria-multiselectable="true">
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseThree1">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage-3" aria-expanded="true"
                                    href="#collapseThree-1" aria-controls="collapseTwo-1">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Quản lý nhân sự với phần mềm phòng khám </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="collapseThree-1" class="panel-collapse  collapse in clearfix-custom "
                                aria-expanded="true" role="tabpanel" aria-labelledby="collapseThree1">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Quy trình quản lý nhân sự dễ dàng hơn với phần mềm quản lý phòng khám của Myspa giúp
                                    doanh nghiệp có thể quản lý nhân sự từ xa một cách hiệu quả. Tích hợp hệ thống quản
                                    lý chấm công nhân sự thời gian check-in, check-out, tổng số giờ làm việc. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Phần mềm quản lý
                                            phòng khám Myspa thống kê đầy đủ thời gian làm việc của nhân sự, theo dõi
                                            bảng phân ca làm việc </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Quản lý, phân công
                                            và điều phối nhân sự của từng chi nhánh dễ dàng </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Cập nhật chi tiết số
                                            giờ làm việc của nhân sự, thời gian ra ca, vào ca đảm bảo tính minh bạch và
                                            quyền lợi cho nhân sự </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Tạo và cập nhật ghi
                                            chú cho mỗi trường hợp đặc biệt để giải quyết từng vấn đề phát sinh của nhân
                                            sự </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseThree2">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage-3" aria-expanded="false"
                                    href="#collapseThree-2" aria-controls="collapseThree-2">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Tự động tính hoa hồng và lương nhân sự </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="collapseThree-2" class="panel-collapse collapse clearfix-custom " role="tabpanel"
                                aria-labelledby="collapseThree2">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Phần mềm quản lý phòng khám giúp tính phần trăm hoa hồng và lương theo nội dung công
                                    việc của nhân viên. Tạo động lực cho nhân viên để chăm sóc khách hàng tốt nhất. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Quản lý và phân chia
                                            chính sách hoa hồng và lương theo cấp bậc nhân sự bác sĩ, kỹ thuật viên, phụ
                                            tá, tư vấn viên…Tính phần trăm hoa hồng, tiền tour dịch vụ cho từng bước
                                            hoặc cả buổi liệu trình. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Báo cáo rõ ràng,
                                            chính xác, nhân viên có thể đối chiếu tiền hoa hồng và lương. </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Loại bỏ rủi ro sai số
                                            liệu so với quản lý kiểu cũ như nhập liệu excel, ghi chép sổ sách. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Phần mềm quản lý
                                            phòng khám giúp tiết kiệm tối đa thời gian cho chủ phòng khám, xuất file
                                            tổng hợp cuối tháng dễ dàng. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabcontent-4" class="tab-content" style="display: none">
                <div class="row padding-top-md">
                    <div class="col-md-5 padding-unset-right">
                        <img lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-kho.png"
                            width="100%" alt="Phần mềm quản lý kho hàng cho phòng khám, thẫm mỹ viện">
                    </div>
                    <div class="col-md-7 padding-top-md padding-left-xl panel-group" id="manage-4" role="tablist"
                        aria-multiselectable="true">
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseFour1">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage-4" aria-expanded="true"
                                    href="#collapseFour-1" aria-controls="collapseFour-1">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Quản lý kho thuốc - vật tư</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="phần mềm quản lý phòng khám quản lý kho thuốc">
                                </a>
                            </div>
                            <div id="collapseFour-1" class="panel-collapse  collapse in clearfix-custom "
                                aria-expanded="true" role="tabpanel" aria-labelledby="collapseFour1">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Phần mềm quản lý phòng khám giúp chủ doanh nghiệp quản lý kho thuốc từ xa. Đồng bộ
                                    ngay trên hệ thống phần mềm, giúp chủ doanh nghiệp tiết kiệm thời gian quản lý và
                                    nhân sự kiểm kê. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Theo dõi chi tiết
                                            từng sản phẩm, trang thiết bị (phiếu nhập kho, danh mục thông tin thuốc và
                                            vật dụng y tế như: cách dùng, liều dùng mỗi ngày, giá bán, đơn vị tính, số
                                            lượng tồn, ngày hết hạn và lịch sử giá…) </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Dễ dàng với khâu
                                            kiểm kê hàng hóa, hàng tồn kho do quản lý đồng bộ tại phần mềm quản lý phòng
                                            khám. </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Xuất - nhập hàng hóa
                                            giữa các kho nội bộ với nhau </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="collapseFour2">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#manage-4" aria-expanded="false"
                                    href="#collapseFour-2" aria-controls="collapseFour-2">
                                    <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset">
                                        Quản lý thông tin dịch vụ, sản phẩm bán kèm</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="collapseFour-2" class="panel-collapse collapse clearfix-custom " role="tabpanel"
                                aria-labelledby="collapseFour2">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Phần mềm quản lý phòng khám giúp quản lý thông tin sản phẩm, dịch vụ rõ ràng, giúp
                                    chủ doanh nghiệp có thể kiểm kê được số lượng hàng tồn, hàng bán ra một cách chính
                                    xác. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Thống kê chi tiết tên
                                            sản phẩm/ liệu trình, mã hàng, nhãn hiệu, thông tin giá cả, ngày hết hạn...
                                        </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Thêm không giới
                                            hạn sản phẩm/ dịch vụ </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Theo dõi sản phẩm tồn
                                            kho trên phần mềm (hàng có sẵn, hết hàng…) </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Quản lý thông tin
                                            khuyến mãi của sản phẩm/ dịch vụ </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="manage_func" class="mobile-show">
            <div class="panel panel-default"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: #EEEDF2; border-radius: 8px">
                <div class="panel-heading" role="tab" id="manageFunc_One"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#manage_func" aria-expanded="false"
                        href="#manageFunc_One_Child" aria-controls="manageFunc_One">
                        <img class="cus-img__tabhome" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/Customer-Database-mobile.svg"
                            alt="icon">
                        <h3
                            class="quicksan-text-md font-weight-bold text-align-unset letter-spacing-sm padding-right-xsm margin-unset fontsize-14 text-purple ">
                            Quản lý khách hàng</h3>
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg" alt="icon">
                    </a>
                </div>
                <div id="manageFunc_One_Child" class="panel-collapse  collapse clearfix-custom text-dark-blue"
                    role="tabpanel" aria-labelledby="manageFunc_One"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý hồ sơ sức khoẻ khách hàng</h3>
                        <p class="quicksan-text-md text-align-justify"> Phần mềm quản lý phòng khám giúp lưu trữ hồ sơ
                            khách hàng dễ dàng. Giúp doanh nghiệp tối ưu được chất lượng dịch vụ, xây dựng được quan hệ
                            khách hàng từ đó thúc đẩy doanh thu. </p>
                        <div id="manageFunc_One-1"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_One1">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Hồ sơ thông tin khách hàng
                                được lưu trữ một cách chi tiết như: tên, sđt, nghề nghiệp, quá trình điều trị, bệnh án,
                                đơn thuốc, chữ ký điện tử... </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phân chia tầng bậc khách
                                hàng sử dụng dịch vụ (khách hàng đăng ký khám lần đầu, khách tái khám, khách hàng VIP…)
                            </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phần mềm quản lý phòng khám
                                răng hàm mặt tích hợp tính năng đặt lịch hẹn thăm khám online, giúp nhân sự chủ động sắp
                                xếp thời gian phục vụ khách hàng. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Lưu lại không giới hạn hình
                                ảnh của khách hàng, trong quá trình thăm khám, điều trị tại phòng khám. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Kết nối được với điện thoại
                                và máy tính bảng, dễ dàng thao tác khi nhân sự tư vấn khách hàng khi sử dụng dịch vụ
                                thăm khám, điều trị bệnh… </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_One1"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_One_Child" aria-expanded="false" href="#manageFunc_One-1"
                                aria-controls="manageFunc_One-1">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="image-icon">
                        <div class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/phan-mem-tham-my-vien/2 1.png"
                                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" width="100%"
                                alt="Phần mềm quản lý khách hàng cho phòng khám">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: #EEEDF2; border-radius: 8px">
                <div class="panel-heading" role="tab" id="manageFunc_Two"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#manage_func" aria-expanded="false"
                        href="#manageFunc_Two_Child" aria-controls="manageFunc_Two">
                        <img class="cus-img__tabhome" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/Finance-mobile.svg"
                            alt="icon">
                        <h3
                            class="quicksan-text-md font-weight-bold text-align-unset letter-spacing-sm padding-right-xsm margin-unset fontsize-14 text-purple">
                            Quản lý tài chính</h3>
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg" alt="icon">
                    </a>
                </div>
                <div id="manageFunc_Two_Child" class="panel-collapse collapse clearfix-custom text-dark-blue"
                    role="tabpanel" aria-labelledby="manageFunc_Two"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; margin-bottom: 0">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý tài chính - thu chi doanh nghiệp</h3>
                        <p class="quicksan-text-md text-align-justify"> Thống kê và kiểm soát toàn bộ tình hình thu chi,
                            doanh thu của một hoặc chuỗi cơ sở phòng khám. Tạo và lập phiếu thu chi, kiểm tra tài chính
                            nhanh chóng với phần mềm quản lý phòng khám nhỏ đến lớn. </p>
                        <div id="manageFunc_Two-1"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_Two1">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Quản lý quỹ tiền theo
                                ngày/tuần/tháng/quý/năm, kiểm soát chặt chẽ dòng tiền giữa các cơ sở. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Xem lại chi tiết lịch sử thu
                                chi hằng tháng, tồn đầu kỳ, tồn cuối kỳ, tổng thu và chi, đảm bảo tính chính xác với chi
                                tiêu thực tế </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phân quyền nhân sự quản lý
                                thu chi theo từng danh mục chỉ định, quản lý trạng thái phiếu thu – chi trên phần mềm
                                phòng khám Myspa. </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_Two1"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_Two_Child" aria-expanded="false" href="#manageFunc_Two-1"
                                aria-controls="manageFunc_Two-1">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý công nợ hiệu quả</h3>
                        <p class="quicksan-text-md text-align-justify"> Các đơn nhập sản phẩm, bán sản phẩm dịch vụ đều
                            được ghi lại chi tiết, tự động cập nhật công nợ của khách hàng và nhà cung cấp khi phát sinh
                            giao dịch/ thanh toán với phần mềm quản lý phòng khám </p>
                        <div id="manageFunc_Two-2"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_Two2">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Truy xuất dễ dàng công nợ từ
                                phần mềm Myspa, báo cáo công nợ hàng tháng nhanh chóng. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Quản lý công nợ của khách
                                hàng chi tiết, chặt chẽ theo ngày/tháng/ quý/ năm </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thông báo công nợ hàng tháng
                                để nhắc hẹn thanh toán </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thống kê chi tiết công nợ
                                nhà cung cấp </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Ghi nhận chi tiết để thu hồi
                                công nợ, hạn chế sai sót </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_Two2"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_Two_Child" aria-expanded="false" href="#manageFunc_Two-2"
                                aria-controls="manageFunc_Two-2">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="image-icon">
                        <div class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-thu-chi.png"
                                width="100%"
                                alt="Phần mềm quản lý thu chi cho phòng khám. Phần mềm quản lý công nợ cho phòng khám">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: #EEEDF2; border-radius: 8px">
                <div class="panel-heading" role="tab" id="manageFunc_third"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#manage_func" aria-expanded="false"
                        href="#manageFunc_third_Child" aria-controls="manageFunc_third">
                        <img class="cus-img__tabhome" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/Staff-mobile.svg"
                            alt="icon">
                        <h3
                            class="quicksan-text-md font-weight-bold text-align-unset letter-spacing-sm padding-right-xsm margin-unset fontsize-14 text-purple">
                            Quản lý nhân sự với phần mềm phòng khám</h3>
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg" alt="icon">
                    </a>
                </div>
                <div id="manageFunc_third_Child" class="panel-collapse collapse clearfix-custom text-dark-blue"
                    role="tabpanel" aria-labelledby="manageFunc_third"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; margin-bottom: 0">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý nhân sự với phần mềm thẩm mỹ viện Myspa</h3>
                        <p class="quicksan-text-md text-align-justify"> Quy trình quản lý nhân sự dễ dàng hơn với phần
                            mềm quản lý phòng khám, giúp chủ doanh nghiệp quản lý nhân sự từ xa hiệu quả. Tích hợp hệ
                            thống quản lý chấm công nhân sự thời gian check-in, check-out, tổng số giờ làm việc. </p>
                        <div id="manageFunc_third-1"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_third1">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thống kê đầy đủ thời gian
                                làm việc của nhân sự, theo dõi bảng phân ca làm việc trên phần mềm quản lý phòng khám.
                            </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phân công và điều phối nhân
                                sự của từng chi nhánh dễ dàng </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Cập nhật chi tiết số giờ làm
                                việc, thời gian ra ca, vào ca đảm bảo tính minh bạch và quyền lợi cho nhân sự </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Tạo và cập nhật ghi chú cho
                                mỗi trường hợp đặc biệt để giải quyết các vấn đề phát sinh. </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_third1"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_third_Child" aria-expanded="false" href="#manageFunc_third-1"
                                aria-controls="manageFunc_third-1">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Tự động tính hoa hồng và lương nhân sự </h3>
                        <p class="quicksan-text-md text-align-justify"> Phần mềm quản lý phòng khám giúp tính phần trăm
                            hoa hồng và lương theo nội dung công việc của nhân viên. Tạo động lực cho nhân viên để chăm
                            sóc khách hàng tốt nhất. </p>
                        <div id="manageFunc_third-2"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_third2">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Quản lý và phân chia chính
                                sách hoa hồng và lương theo cấp bậc nhân sự bác sĩ, kỹ thuật viên, phụ tá, tư vấn
                                viên…Tính phần trăm hoa hồng, tiền tour dịch vụ cho từng bước hoặc cả buổi liệu trình.
                            </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Báo cáo rõ ràng, chính xác,
                                nhân viên có thể đối chiếu tiền hoa hồng và lương. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Loại bỏ rủi ro sai số liệu
                                so với quản lý kiểu cũ như nhập liệu excel, ghi chép sổ sách. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phần mềm quản lý phòng khám
                                giúp tiết kiệm tối đa thời gian cho chủ phòng khám, xuất file tổng hợp cuối tháng dễ
                                dàng. </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_third2"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_third_Child" aria-expanded="false" href="#manageFunc_third-2"
                                aria-controls="manageFunc_third-2">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="image-icon">
                        <div class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-nhan-vien.png"
                                width="100%" alt="Phần mềm quản lý dịch vụ phòng khám"
                                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: #EEEDF2; border-radius: 8px">
                <div class="panel-heading" role="tab" id="manageFunc_fourth"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#manage_func" aria-expanded="false"
                        href="#manageFunc_fourth_Child" aria-controls="manageFunc_fourth">
                        <img class="cus-img__tabhome" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Icon/Warehouse-mobile.svg"
                            alt="icon">
                        <h3
                            class="quicksan-text-md font-weight-bold text-align-unset letter-spacing-sm padding-right-xsm margin-unset fontsize-14 text-purple">
                            Quản lý kho thuốc</h3>
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg" alt="icon">
                    </a>
                </div>
                <div id="manageFunc_fourth_Child" class="panel-collapse collapse clearfix-custom text-dark-blue"
                    role="tabpanel" aria-labelledby="manageFunc_fourth"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; margin-bottom: 0">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý kho thuốc - vật tư</h3>
                        <p class="quicksan-text-md text-align-justify"> Phần mềm quản lý phòng khám giúp chủ doanh
                            nghiệp quản lý kho thuốc từ xa. Đồng bộ ngay trên hệ thống phần mềm, giúp chủ doanh nghiệp
                            tiết kiệm thời gian quản lý và nhân sự kiểm kê. </p>
                        <div id="manageFunc_fourth-1"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_fourth1">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Theo dõi chi tiết từng sản
                                phẩm, trang thiết bị (phiếu nhập kho, danh mục thông tin thuốc và vật dụng y tế như:
                                cách dùng, liều dùng mỗi ngày, giá bán, đơn vị tính, số lượng tồn, ngày hết hạn và lịch
                                sử giá…) </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Dễ dàng với khâu kiểm kê
                                hàng hóa, hàng tồn kho do quản lý đồng bộ tại phần mềm quản lý phòng khám. </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Xuất - nhập hàng hóa giữa
                                các kho nội bộ với nhau </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_fourth1"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_fourth_Child" aria-expanded="false" href="#manageFunc_fourth-1"
                                aria-controls="manageFunc_fourth-1">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-default"
                        style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none">
                        <h3
                            class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset margin-0__fontsize-18px-mb">
                            Quản lý thông tin dịch vụ, sản phẩm bán kèm</h3>
                        <p class="quicksan-text-md text-align-justify"> Quản lý thông tin sản phẩm, dịch vụ rõ ràng,
                            giúp chủ doanh nghiệp có thể kiểm kê được số lượng hàng tồn, hàng bán ra một cách chính xác.
                        </p>
                        <div id="manageFunc_fourth-2"
                            class="panel-collapse collapse  clearfix-custom text-dark-blue padding-left-xsm padding-bottom-xsm"
                            role="tabpanel" aria-labelledby="manageFunc_fourth2">
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thống kê chi tiết tên sản
                                phẩm/ liệu trình, mã hàng, nhãn hiệu, thông tin giá cả, ngày hết hạn... </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thêm không giới hạn sản
                                phẩm/ dịch vụ </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Theo dõi sản phẩm tồn kho
                                trên phần mềm (hàng có sẵn, hết hàng…) </p>
                            <p class="quicksan-text-md text-align-justify padding-top-xsm"> Quản lý thông tin khuyến mãi
                                của sản phẩm/ dịch vụ </p>
                        </div>
                        <div class="panel-heading btn-more" role="tab" id="manageFunc_fourth2"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                            <a class="collapsed" style="width: 100%" data-toggle="collapse"
                                data-parent="#manageFunc_fourth_Child" aria-expanded="false" href="#manageFunc_fourth-2"
                                aria-controls="manageFunc_fourth-2">
                                <p
                                    class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                    Xem thêm</p>
                            </a>
                        </div>
                    </div>
                    <div class="image-icon">
                        <div class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/quan-ly-kho.png"
                                width="100%" alt="Phần mềm quản lý phòng khám quản lý kho hàng"
                                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-blue">
    <div class="section-block">
        <div class="container padding-top-xl text-center mobile-hide"
            style="max-width: 1270px;background: url('<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Group 189.png') bottom no-repeat; background-size: cover"
            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <div class="text-center margin-bottom-main-title">
                <h2 class=" cus-title__home montserrat-text-md  text-primary-demo"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Quản lý online hiệu quả với<br>
                    phần mềm quản lý phòng khám </h2>
            </div>
            <div class="col-12">
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="row text-primary-demo">
                        <div class="image-icon">
                            <img class="" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Branch Management.png"
                                alt="Phần mềm quản lý chi nhánh phòng khám từ xa">
                        </div>
                        <div>
                            <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Quản lý
                                online <br> nhiều chi nhánh </h3>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md margin-top-sm"> Phần mềm quản
                                lý phòng khám đa khoa hỗ trợ vận hành quy trình quản lý chuỗi chi nhánh cho chủ phòng
                                khám với các tính năng phân quyền cho nhân sự quản lý, điều phối nhân viên và kiểm soát
                                tình trạng công việc. </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Phân quyền cho nhân sự từng
                                chi nhánh với ID định danh riêng biệt, linh hoạt sắp xếp và điều phối nhân sự giữa các
                                chi nhánh. </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Thống kê doanh thu chi tiết
                                theo ngày/tháng từng chi nhánh riêng lẻ và quản lý tổng hợp thông tin, hồ sơ khám bệnh
                                của khách hàng. </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Thiết lập khuyến mãi cho
                                toàn bộ chi nhánh hoặc từng chi nhánh. </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Cập nhật quản lý kho bãi
                                thường xuyên, đối soát chính xác. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6"></div>
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <div class="row margin-top-xxxl text-primary-demo">
                        <div class="image-icon">
                            <img class="" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Report.png" alt="icon">
                        </div>
                        <div>
                            <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Báo cáo
                                thống kê số liệu <br> nhiều chi nhánh </h3>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md margin-top-sm"> Xem chi tiết
                                báo cáo từng chi nhánh bằng số liệu và biểu đồ như doanh thu, lợi nhuận, khách hàng mới
                                cũ, chi phí nhân sự,... </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Báo cáo quản lý kho thuốc -
                                vật tư về số lượng nhập tồn kho của thuốc để bổ sung cho các chi nhánh khi cần thiết.
                            </p>
                            <p class="quicksan-text-md text-align-justify margin-bottom-md"> Báo cáo và thống kê nhân
                                sự, tình hình làm việc trong tháng để có sự điều phối tốt nhất. </p>
                            <p class="quicksan-text-md text-align-justify"> Hỗ trợ xuất báo cáo từng hạng mục bằng file
                                Excel nhanh chóng </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container padding-bottom-xxl mobile-flex-column mobile-show padding-top-xl ">
            <div class="  text-center margin-bottom-main-title">
                <h2 class=" cus-title__home montserrat-text-md text-primary-demo"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" id="quan-ly-spa-tu-xa"> Quản lý
                    online hiệu quả với<br> Phần mềm phòng khám </h2>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div class="cus-img-70">
                    <img class="image-size" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/manage_clinic_mobile.png"
                        alt=" image">
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl mobile-show " id="func_remote">
                <div class="panel panel-default padding-sm mt-16px-mb "
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: transparent; border-radius: 8px;margin-bottom: 0px">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Branch Management.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Quản lý online <br> nhiều chi
                        nhánh </h3>
                    <div id="func_remote_One-1"
                        class="panel-collapse  collapse clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                        aria-labelledby="func_remote_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phần mềm quản lý phòng khám
                            Myspa hỗ trợ quy trình vận hành nhiều chi nhánh cho chủ doanh nghiệp phòng khám tư nhân. Với
                            các tính năng như phân quyền cho nhân sự quản lý, điều phối nhân viên và kiểm soát tình
                            trạng công việc. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thống kê doanh thu chi tiết theo
                            ngày/tháng từng chi nhánh riêng lẻ và quản lý tổng hợp thông tin, hồ sơ khám bệnh của khách
                            hàng. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Thiết lập khuyến mãi cho toàn bộ
                            chi nhánh hoặc từng chi nhánh. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Cập nhật quản lý kho bãi thường
                            xuyên, đối soát chính xác. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Áp dụng khuyến mãi cho toàn bộ
                            chi nhánh hoặc từng chi nhánh tùy theo chương trình khuyến mãi </p>
                    </div>
                    <div class="panel-heading" role="tab" id="func_remote_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#func_remote" aria-expanded="false"
                            href="#func_remote_One-1" aria-controls="func_remote_One-1">
                            <img class="icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default padding-sm"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background-color: transparent; border-radius: 8px; margin-bottom: 0px">
                    <div class="image-icon image-icon__cus-mb">
                        <img class="" lazy data-src="<?php echo base_url(); ?>assets/frontend/images/icon/Report.png"
                            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" alt="icon">
                    </div>
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Báo cáo & thống kê nhiều chi
                        nhánh </h3>
                    <div id="func_remote_One-2"
                        class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                        aria-labelledby="func_remote_One2">
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Xem chi tiết báo cáo từng chi
                            nhánh bằng số liệu và biểu đồ như doanh thu, lợi nhuận, khách hàng mới cũ, chi phí nhân
                            sự,... </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Báo cáo quản lý kho thuốc - vật
                            tư về số lượng nhập tồn kho của thuốc để bổ sung cho các chi nhánh khi cần thiết. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Báo cáo và thống kê nhân sự,
                            tình hình làm việc trong tháng để có sự điều phối tốt nhất. </p>
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Hỗ trợ xuất báo cáo từng hạng
                            mục bằng file Excel nhanh chóng </p>
                    </div>
                    <div class="panel-heading" role="tab" id="func_remote_One2"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#func_remote" aria-expanded="false"
                            href="#func_remote_One-2" aria-controls="func_remote_One-2">
                            <img class="icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block bg-transfer-top padding-top-xxxl padding-bottom-xxl sm unset-pad-bot-mobi"
    id="cham-soc-khach-hang">
    <div class="container">
        <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="container text-center">
            <div class=" row text-center margin-bottom-main-title margin-unset-bottom">
                <h2 class="cus-title__home montserrat-text-md text-white"> Chăm sóc khách hàng <br> Nâng cao trải nghiệm
                    dịch vụ </h2>
            </div>
        </div>
    </div>
    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="container mobile-hide">
        <div class="tab-pannel">
            <div id="servicecontent-1" class="tab-content ">
                <div class="row padding-top-md">
                    <div class="col-md-6 padding-top-md padding-right-xl panel-group" id="customerService"
                        role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="customerService1">
                                <a class="flex-box flex-box-align-items-baseline justify-content-sapce-between padding-right-xsm"
                                    style="width: 100%" data-toggle="collapse" data-parent="#customerService"
                                    aria-expanded="true" href="#customerService-1" aria-controls="customerService-1">
                                    <h3
                                        class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm">
                                        Quản lý lịch tái khám, lịch hẹn </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="customerService-1" class="panel-collapse  collapse in clearfix-custom "
                                aria-expanded="true" role="tabpanel" aria-labelledby="customerService1">
                                <p
                                    class="quicksan-text-md text-white font-weight-bold text-align justify-content-sapce-between margin-bottom-mdd">
                                    Với hệ thống quản lý lịch hẹn của phần mềm quản lý phòng khám chuyên nghiệp, chủ
                                    doanh nghiệp dễ dàng nhắc lịch hẹn cho khách hàng, theo dõi thời gian điều trị hiệu
                                    quả. </p>
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Quản lý chi tiết đặt
                                            hẹn lần đầu, lịch tái khám của khách hàng. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Dễ dàng điều chỉnh
                                            và thay đổi lịch hẹn, giúp nhân viên dễ dàng quản lý </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justifgity"> Tính năng sms nhắc
                                            hẹn khách hàng, đảm bảo khách hàng đến thăm khám, nâng cao chất lượng dịch
                                            vụ </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Phân công nhân sự tư
                                            vấn, kỹ thuật viên, bác sĩ phục vụ khách hàng theo thời gian làm việc trống
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="customerService2">
                                <a class="flex-box flex-box-align-items-baseline justify-content-sapce-between padding-right-xsm"
                                    style="width: 100%" data-toggle="collapse" data-parent="#customerService"
                                    aria-expanded="false" href="#customerService-2" aria-controls="customerService-2">
                                    <h3
                                        class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm">
                                        Đặt hẹn trực tuyến dễ dàng </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="Phần mềm đặt hẹn trực tuyến cho phòng khám">
                                </a>
                            </div>
                            <div id="customerService-2" class="panel-collapse collapse clearfix-custom " role="tabpanel"
                                aria-labelledby="customerService2">
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Phần mềm quản lý
                                            phòng khám tư nhân giúp khách hàng đặt hẹn online nhanh chóng. </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Tiết kiệm thời gian
                                            cho khách hàng và doanh nghiệp </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Hỗ trợ check-in cho
                                            khách hàng đã đặt hẹn online </p>
                                    </div>
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Đồng bộ lịch hẹn trên
                                            hệ thống, nhắc hẹn khách hàng và sắp xếp nhân viên phục vụ khách. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default custom-faq">
                            <div class="title-box-white flex-box justify-content-sapce-between margin-bottom-md panel-heading"
                                role="tab" id="customerService3">
                                <a class="flex-box flex-box-align-items-baseline justify-content-sapce-between padding-right-xsm"
                                    style="width: 100%" data-toggle="collapse" data-parent="#customerService"
                                    aria-expanded="false" href="#customerService-3" aria-controls="customerService-3">
                                    <h3
                                        class="montserrat-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm">
                                        Đánh giá dịch vụ khách quan </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="customerService-3" class="panel-collapse collapse clearfix-custom " role="tabpanel"
                                aria-labelledby="customerService3">
                                <div class="col-md-6 padding-unset-left">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Tích hợp tính năng
                                            đánh giá sản phẩm/ dịch vụ từ khách hàng trên các hệ thống của phòng khám từ
                                            website, fanpage… </p>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-unset-right">
                                    <div class="margin-bottom-mdd">
                                        <span class="high-light-span">
                                            <hr>
                                            <hr>
                                        </span>
                                        <p class="quicksan-text-md text-white text-align-justify"> Ghi nhận các phản hồi
                                            từ khách hàng, thống kê và báo cáo theo ngày/tuần/tháng, giúp phòng khám tối
                                            ưu hiệu quả dịch vụ </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                        class="col-md-6 padding-unset-left">
                        <div class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/16 1.png"
                                width="100%" alt="Phần mềm quản lý lịch hẹn thẩm mỹ viện">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-xxl mobile-flex-column mobile-show">
        <div class="col-md-7 col-lg-7 col-sm-12" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <div class="cus-img-70">
                <img class="image-size" lazy
                    data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/phan-mem-tham-my-vien/customer_mobile.png"
                    alt=" image">
            </div>
        </div>
        <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl  unset-pad-mobi flexY-16px-mobi"
            id="func_higher_control">
            <div class="panel panel-default pad-8px-mobi padding-unset-top  padding-bottom-md margin-top-sm"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: #F5F5F7; border-radius: 8px;margin-bottom: 0px">
                <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                    style="padding-top: 0px;" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Quản lý
                    lịch tái khám, lịch hẹn </h3>
                <div id="func_higher_control_One-1"
                    class="panel-collapse  collapse clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                    aria-labelledby="func_higher_control_One1"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Với hệ thống quản lý lịch hẹn của
                        phần mềm quản lý phòng khám chuyên nghiệp, chủ doanh nghiệp dễ dàng nhắc lịch hẹn cho khách
                        hàng, theo dõi thời gian điều trị hiệu quả. </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Quản lý chi tiết đặt hẹn lần đầu,
                        lịch tái khám của khách hàng. </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Dễ dàng điều chỉnh và thay đổi lịch
                        hẹn, giúp nhân viên dễ dàng quản lý </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Tính năng sms nhắc hẹn khách hàng,
                        đảm bảo khách hàng đến thăm khám, nâng cao chất lượng dịch vụ </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phân công nhân sự tư vấn, kỹ thuật
                        viên, bác sĩ phục vụ khách hàng theo thời gian làm việc trống </p>
                </div>
                <div class="panel-heading unset-mar-mobi" role="tab" id="func_higher_control_One1"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#func_higher_control" aria-expanded="false"
                        href="#func_higher_control_One-1" aria-controls="func_higher_control_One-1">
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                        <p
                            class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                            Xem chi tiết</p>
                    </a>
                </div>
            </div>
            <div class="panel panel-default pad-8px-mobi  unset-marY-mobi padding-bottom-md margin-top-md"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background-color: #F5F5F7; border-radius: 8px; margin-bottom: 0px">
                <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                    style="padding-top: 0px;" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Đặt hẹn
                    trực tuyến dễ dàng </h3>
                <div id="func_higher_control_One-2"
                    class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                    aria-labelledby="func_higher_control_One2">
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Khách hàng dễ dàng đặt hẹn online
                        trên website hoặc ứng dụng được tích hợp với phần mềm </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Tiết kiệm thời gian cho khách hàng
                        và doanh nghiệp, tiết kiệm nhiệm vụ hành chính </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Hỗ trợ check-in cho khách hàng đã
                        đặt hẹn online </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Đồng bộ lịch hẹn trên hệ thống, nhắc
                        hẹn cho nhân viên và khách hàng để đảm bảo được chất lượng dịch vụ </p>
                </div>
                <div class="panel-heading unset-mar-mobi" role="tab" id="func_higher_control_One2"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#func_higher_control" aria-expanded="false"
                        href="#func_higher_control_One-2" aria-controls="func_remote_One-2">
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                        <p
                            class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                            Xem chi tiết</p>
                    </a>
                </div>
            </div>
            <div class="panel panel-default pad-8px-mobi unset-marY-mobi  padding-bottom-md margin-top-md"
                style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background-color: #F5F5F7; border-radius: 8px; margin-bottom: 0px">
                <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                    style="padding-top: 0px;" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Tính
                    năng đánh giá dịch vụ </h3>
                <div id="func_higher_control_One-3"
                    class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                    aria-labelledby="func_higher_control_One3">
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Tích hợp tính năng đánh giá sản
                        phẩm/ dịch vụ từ khách hàng trên các hệ thống của phòng khám từ website và hệ thống đa kênh của
                        Myspa </p>
                    <p class="quicksan-text-md text-align-justify padding-top-xsm"> Ghi nhận các phản hồi từ khách hàng,
                        thống kê và báo cáo theo ngày/tuần/tháng, giúp phòng khám tối ưu hiệu quả quản lý dịch vụ </p>
                </div>
                <div class="panel-heading unset-mar-mobi" role="tab" id="func_higher_control_One3"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                        data-toggle="collapse" data-parent="#func_higher_control" aria-expanded="false"
                        href="#func_higher_control_One-3" aria-controls="func_remote_One-2">
                        <img class="icon" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                        <p
                            class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                            Xem chi tiết</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white background-color-blue">
    <div class="section-block">
        <div class="container padding-top text-primary-demo text-center unset-pad-mobi">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                class="text-center margin-bottom-main-title">
                <h2 class="cus-title__home montserrat-text-md  text-primary-demo"> Marketing hiệu quả <br> với phần mềm
                    phòng khám Myspa </h2>
            </div>
        </div>
        <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
            class="container padding-bottom-xl mobile-hide">
            <div class="col-md-4 padding-sm padding-unset-left padding-unset-top">
                <div class="cls-relative linear-box text-align-justify">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group.png"
                        width="100%" alt="Phần mềm quản lý liệu trình phòng khám">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white">Quản lý khám bệnh cho khách hàng</h3>
                        <p class="quicksan-text-md text-white text-bold">Theo dõi chi tiết được hồ sơ khám bệnh của
                            khách hàng một cách chi tiết...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Quản lý khám bệnh cho khách hàng</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Tích hợp tính năng quản lý
                                lịch hẹn, chủ phòng khám có thể chủ động nhắc hẹn khách hàng khi đến thời gian tái khám.
                            </p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý chi tiết thông tin điều trị của
                                khách hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý các chỉ định cận lâm sàng, phẫu
                                thuật, kê đơn thuốc…</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý thuốc - vật tư chi tiết trong
                                mỗi lần thực hiện điều trị</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-top">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-1.png"
                        width="100%" alt="Chăm sóc khách hàng (Web và App thương hiệu)">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Chăm sóc khách hàng <br>từ Web - App
                            thương hiệu</h3>
                        <p class="quicksan-text-md text-white text-bold">Xây dựng hệ thống web và app thương hiệu...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white letter-spacing-sm">Chăm sóc khách hàng <br>từ Web -
                                App thương hiệu</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Xây dựng hệ thống web và app thương
                                hiệu, quản lý khách hàng trên hệ thống phần mềm quản lý phòng khám trên website và app,
                                mang lại hiệu quả cao, không bỏ sót khách hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Tích hợp tại một nơi, doanh nghiệp dễ
                                dàng quản lý và số liệu cập nhật chính xác</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-top padding-unset-right ">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-2.png"
                        width="100%" alt="Bán hàng đa kênh Giải pháp TMĐT cho phòng khám đa khoa và thẩm mỹ viện">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm"> Bán hàng đa kênh trên BeautyX (Giải
                            pháp TMĐT cho phòng khám)</h3>
                        <p class="quicksan-text-md text-white text-bold">Đưa hệ thống phòng khám lên sàn thương mại điện
                            tử, liên kết với hệ thống web và app...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white"> Bán hàng đa kênh trên BeautyX (Giải pháp TMĐT cho
                                phòng khám)</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Đưa hệ thống phòng khám lên sàn thương
                                mại điện tử, liên kết với hệ thống web và app thương hiệu, dẫn khách hàng từ đa kênh bán
                                hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Bán nhiều nơi nhưng quản lý thông tin
                                khách hàng tại một điểm</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Chăm sóc khách hàng chu đáo, giúp tăng
                                doanh thu cho dịch vụ phòng khám</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom padding-unset-left">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-3.png"
                        width="100%" alt="Quản lý chương trình khuyến mãi cho khách hàng phòng khám">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Vận hành<br>chương trình khuyến mãi
                        </h3>
                        <p class="quicksan-text-md text-white text-bold">Quản lý và vận hành các chương trình khuyến mãi
                            cho các phòng khám ngay trên phần mềm ...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Vận hành<br>chương trình khuyến mãi</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Quản lý và vận hành các
                                chương trình khuyến mãi cho các phòng khám ngay trên phần mềm quản lý phòng khám chuyên
                                nghiệp. Doanh nghiệp có thể thúc đẩy doanh số bán sản phẩm/dịch vụ thông qua các ưu đãi
                                đặc biệt cho khách hàng.</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Phần mềm phòng khám hỗ trợ thiết lập
                                các CTKM cho khách hàng: chiết khấu sản phẩm dịch vụ (giảm theo %), mua X tặng Y…</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Thiết lập và quản lý thông tin khách
                                hàng tham gia chương trình</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Tùy chỉnh linh hoạt cho từng đối tượng
                                được áp dụng khuyến mãi</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Thiết lập khung giờ đặc biệt, ngày lễ,
                                khoảng thời gian cho CTKM…</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-4.png"
                        width="100%" alt="Phần mềm quản lý phòng khám hỗ trợ SMS Marketing">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Gửi SMS thông qua phần mềm phòng
                            khám</h3>
                        <p class="quicksan-text-md text-white text-bold">Gửi nhắc hẹn, thông tin khuyến mãi cho khách
                            hàng bằng SMS . Chủ doanh nghiệp...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Gửi SMS thông qua phần mềm phòng khám</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Gửi nhắc hẹn, thông tin
                                khuyến mãi cho khách hàng bằng SMS Marketing tích hợp trên phần mềm quản lý phòng khám
                                tư nhân Myspa, giúp khách hàng trở thành khách hàng trung thành.</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Duy trì quan hệ và xây dựng hệ thống dữ
                                liệu khách hàng tiềm năng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Gửi nhắc hẹn, thông tin khuyến mãi,
                                chúc mừng sinh nhật thông qua SMS marketing để khách hàng sử dụng thêm dịch vụ</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Duy trì quan hệ và xây dựng hệ thống dữ
                                liệu khách hàng tiềm năng </p>
                            <p class="quicksan-text-md text-white margin-top-sm">Phân hạng khách hàng theo thói quen sử
                                dụng dịch vụ gửi SMS Marketing để thông báo khuyến mãi, ưu đãi dành riêng cho khách
                                hàng... </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom padding-unset-right">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-5.png"
                        width="100%" alt="Phần mềm quản lý liệu trình phòng khám">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Đồng bộ với <br>máy bán hàng POS,...
                        </h3>
                        <p class="quicksan-text-md text-white text-bold">Phần mềm phòng khám đồng bộ với máy bán hàng
                            POS, máy quét mã vạch sản phẩm,...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Đồng bộ với <br>máy bán hàng POS,...</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Phần mềm phòng khám đồng bộ với máy bán
                                hàng POS, máy quét mã vạch sản phẩm,...</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý sản phẩm và dịch vụ bán ra,
                                kiểm soát được tình trạng bán hàng (tên sản phẩm, giá cả, mã sản phẩm, số lượng…)</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Linh hoạt thay đổi sản phẩm, dịch vụ
                                theo nhu cầu của khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-show owl-carousel owl-theme" id="mobile-marketing-section">
            <div class="col-md-4 padding-sm padding-unset-left padding-unset-top">
                <div class="cls-relative linear-box text-align-justify">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group.png"
                        width="100%" alt="Phần mềm quản lý liệu trình dành cho thẩm mỹ viện và phòng khám">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white">Quản lý khám bệnh cho khách hàng</h3>
                        <p class="quicksan-text-md text-white text-bold">Tích hợp tính năng quản lý lịch hẹn, chủ phòng
                            khám có thể chủ động nhắc hẹn khách hàng khi đến thời gian tái khám.</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Quản lý khám bệnh cho khách hàng</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Tích hợp tính năng quản lý
                                lịch hẹn, chủ phòng khám có thể chủ động nhắc hẹn khách hàng khi đến thời gian tái khám.
                            </p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý chi tiết thông tin điều trị của
                                khách hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý các chỉ định cận lâm sàng, phẫu
                                thuật, kê đơn thuốc…</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý thuốc - vật tư chi tiết trong
                                mỗi lần thực hiện điều trị</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Khấu hao sản phẩm chi tiết trong mỗi
                                lần thực hiện liệu trình hoặc dịch vụ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-top">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-1.png"
                        width="100%" alt="Chăm sóc khách hàng (Web và App thương hiệu)">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Chăm sóc khách hàng <br>từ Web - App
                            thương hiệu</h3>
                        <p class="quicksan-text-md text-white text-bold">Xây dựng hệ thống web và app thương hiệu...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white letter-spacing-sm">Chăm sóc khách hàng <br>từ Web -
                                App thương hiệu</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Xây dựng hệ thống web và app thương
                                hiệu, quản lý khách hàng trên hệ thống phần mềm quản lý phòng khám trên website và app,
                                mang lại hiệu quả cao, không bỏ sót khách hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Tích hợp tại một nơi, doanh nghiệp dễ
                                dàng quản lý và số liệu cập nhật chính xác</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-top padding-unset-right ">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-2.png"
                        width="100%" alt="Bán hàng đa kênh Giải pháp TMĐT cho phòng khám đa khoa">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm"> Bán hàng đa kênh trên BeautyX (Giải
                            pháp TMĐT cho phòng khám)</h3>
                        <p class="quicksan-text-md text-white text-bold">Đưa hệ thống phòng khám đa khoa lên sàn thương
                            mại điện tử, liên kết với hệ thống web và a...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white"> Bán hàng đa kênh trên BeautyX (Giải pháp TMĐT cho
                                phòng khám)</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Đưa hệ thống phòng khám lên sàn thương
                                mại điện tử, liên kết với hệ thống web và app thương hiệu, dẫn khách hàng từ đa kênh bán
                                hàng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Bán nhiều nơi nhưng quản lý thông tin
                                khách hàng tại một điểm</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Chăm sóc khách hàng chu đáo, giúp tăng
                                doanh thu cho dịch vụ phòng khám</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom padding-unset-left">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-3.png"
                        width="100%" alt="Quản lý chương trình khuyến mãi cho khách hàng">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Quản lý<br> chương trình khuyến mãi
                        </h3>
                        <p class="quicksan-text-md text-white text-bold">Quản lý các chương trình khuyến mãi cho các
                            doanh nghiệp phòng khám ngay trên phần mềm ...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Quản lý<br> chương trình khuyến mãi</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Quản lý và vận hành các
                                chương trình khuyến mãi cho các phòng khám ngay trên phần mềm quản lý phòng khám chuyên
                                nghiệp. Doanh nghiệp có thể thúc đẩy doanh số bán sản phẩm/dịch vụ thông qua các ưu đãi
                                đặc biệt cho khách hàng.</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Phần mềm phòng khám hỗ trợ thiết lập
                                các CTKM cho khách hàng: chiết khấu sản phẩm dịch vụ (giảm theo %), mua X tặng Y…</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Thiết lập và quản lý thông tin khách
                                hàng tham gia chương trình</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Tùy chỉnh linh hoạt cho từng đối tượng
                                được áp dụng khuyến mãi</p>
                            <p class="quicksan-text-md text-white margin-top-xsm">Thiết lập khung giờ đặc biệt, ngày lễ,
                                khoảng thời gian cho CTKM…</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-4.png"
                        width="100%" alt="Phần mềm quản lý phòng khám, thẫm mỹ viện hỗ trợ SMS Marketing">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Gửi SMS thông qua phần mềm phòng
                            khám</h3>
                        <p class="quicksan-text-md text-white text-bold">Gửi nhắc hẹn, thông tin khuyến mãi cho khách
                            hàng bằng SMS Marketing tích hợp trên phần mềm...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Gửi SMS thông qua phần mềm phòng khám</h3>
                            <p class="quicksan-text-md text-white text-bold margin-top-sm">Gửi nhắc hẹn, thông tin
                                khuyến mãi cho khách hàng bằng SMS Marketing tích hợp trên phần mềm quản lý phòng khám
                                tư nhân Myspa, giúp khách hàng trở thành khách hàng trung thành.</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Duy trì quan hệ và xây dựng hệ thống dữ
                                liệu khách hàng tiềm năng</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Gửi nhắc hẹn, thông tin khuyến mãi,
                                chúc mừng sinh nhật thông qua SMS marketing để khách hàng sử dụng thêm dịch vụ</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Duy trì quan hệ và xây dựng hệ thống dữ
                                liệu khách hàng tiềm năng </p>
                            <p class="quicksan-text-md text-white margin-top-sm">Phân hạng khách hàng theo thói quen sử
                                dụng dịch vụ gửi SMS Marketing để thông báo khuyến mãi, ưu đãi dành riêng cho khách
                                hàng... </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 padding-sm padding-unset-bottom padding-unset-right">
                <div class="cls-relative linear-box">
                    <img class="img-linear" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Background/Mask-Group-5.png"
                        width="100%" alt="Phần mềm quản lý liệu trình phòng khám">
                    <div class="bg-linear-purple"></div>
                    <div class="bg-box-shadow"></div>
                    <div class="text-center content-linear-box padding-linear-custom-content">
                        <h3 class="montserrat-text-md text-white letter-spacing-sm">Đồng bộ với <br>máy bán hàng POS,...
                        </h3>
                        <p class="quicksan-text-md text-white text-bold">hần mềm phòng khám đồng bộ với máy bán hàng
                            POS, máy quét mã vạch sản phẩm,...</p>
                    </div>
                    <div class="bg-linear-hiden-layer">
                        <div class="bg-linear-dark-purple padding-right-sm padding-left-sm padding-top-sm">
                            <h3 class="montserrat-text-md text-white">Đồng bộ với <br>máy bán hàng POS,...</h3>
                            <p class="quicksan-text-md text-white margin-top-sm">Phần mềm phòng khám đồng bộ với máy bán
                                hàng POS, máy quét mã vạch sản phẩm,...</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Quản lý sản phẩm và dịch vụ bán ra,
                                kiểm soát được tình trạng bán hàng (tên sản phẩm, giá cả, mã sản phẩm, số lượng…)</p>
                            <p class="quicksan-text-md text-white margin-top-sm">Linh hoạt thay đổi sản phẩm, dịch vụ
                                theo nhu cầu của khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white">
    <div class="section-block">
        <div class="container padding-top text-primary-demo text-center unset-pad-mobi">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                class="text-center margin-bottom-main-title">
                <h2 class="cus-title__home montserrat-text-md  text-primary-demo"> Điều gì khác biệt của <br> phần mềm
                    quản lý phòng khám Myspa so với những phần mềm khác </h2>
            </div>
        </div>
        <div class="container padding-bottom-xl mobile-hide" style="max-width:1202px">
            <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="row margin-bottom-xl">
                    <div>
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Phần mềm
                            chuyên biệt dành cho phòng khám </h3>
                        <p class="quicksan-text-md text-align-justify"> Phần mềm quản lý phòng khám online cung cấp giải
                            pháp vận hành chuyên biệt cho phòng khám. Quản lý lịch hẹn khám bệnh, tính % hoa hồng cho
                            nhân viên theo từng cấp bậc (bác sĩ, tư vấn…), dịch vụ thực hiện, quản lý sản phẩm,...Tính
                            năng phần mềm luôn cập nhật thường xuyên đảm bảo quá trình sử dụng hiệu quả. </p>
                    </div>
                </div>
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="row margin-bottom-xl">
                    <div>
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Hỗ trợ khách
                            hàng tận tâm 24/7 </h3>
                        <p class="quicksan-text-md text-align-justify"> Hỗ trợ cài đặt phần mềm phòng khám, hướng dẫn sử
                            dụng cho chủ doanh nghiệp trước, trong và sau mua. Hỗ trợ buổi training riêng cho nhân sự
                            nhiều chi nhánh. Đội ngũ tư vấn tận tình và giàu kinh nghiệm hỗ trợ tối đa khách hàng khắc
                            phục được những vấn đề thường gặp trong quản lý phòng khám. </p>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"> Giải pháp khép
                            kín và thương mại điện tử cho phòng khám </h3>
                        <p class="quicksan-text-md text-align-justify"> Myspa mang đến giải pháp khép kín từ offline đến
                            online cho hệ thống phòng khám. Phần mềm quản lý phòng khám ngoài quản lý - vận hành tối ưu
                            còn liên kết với sàn thương mại điện tử BeautyX, giúp mang đến nguồn khách hàng ổn định và
                            chất lượng, tăng doanh thu bán hàng cho doanh nghiệp. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="cus-img-70">
                    <img class="image-size" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Manage-time-table.png"
                        alt="manage image">
                </div>
            </div>
        </div>
        <div class="container padding-bottom-xxl mobile-flex-column mobile-show">
            <div class="col-md-7 col-lg-7 col-sm-12" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div class="cus-img-70">
                    <img class="image-size" lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Manage-time-table.png" alt=" image">
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 text-primary-demo padding-right-xl mobile-show" id="section_why">
                <div class="panel panel-default padding-sm mt-16px-mobi unset-pad-bot-mobi"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background: transparent; border-radius: 8px;margin-bottom: 0px">
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Phần mềm chuyên biệt dành cho
                        phòng khám </h3>
                    <div id="section_why_One-1"
                        class="panel-collapse  collapse clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                        aria-labelledby="section_why_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Phần mềm quản lý phòng khám
                            online cung cấp giải pháp vận hành chuyên biệt cho phòng khám. Quản lý lịch hẹn khám bệnh,
                            tính % hoa hồng cho nhân viên theo từng cấp bậc (bác sĩ, tư vấn…), dịch vụ thực hiện, quản
                            lý sản phẩm,...Tính năng phần mềm luôn cập nhật thường xuyên đảm bảo quá trình sử dụng hiệu
                            quả. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="section_why_One1"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#section_why" aria-expanded="false"
                            href="#section_why_One-1" aria-controls="section_why_One-1">
                            <img class="  icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default padding-sm unset-pad-bot-mobi"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background-color: transparent; border-radius: 8px; margin-bottom: 0px">
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Hỗ trợ khách hàng tận tâm 24/7
                    </h3>
                    <div id="section_why_One-2"
                        class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                        aria-labelledby="section_why_One2">
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Hỗ trợ cài đặt phần mềm phòng
                            khám, hướng dẫn sử dụng cho chủ doanh nghiệp trước, trong và sau mua. Hỗ trợ buổi training
                            riêng cho nhân sự nhiều chi nhánh. Đội ngũ tư vấn tận tình và giàu kinh nghiệm hỗ trợ tối đa
                            khách hàng khắc phục được những vấn đề thường gặp trong quản lý phòng khám. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="section_why_One2"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#section_why" aria-expanded="false"
                            href="#section_why_One-2" aria-controls="func_remote_One-2">
                            <img class="  icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default padding-sm unset-pad-bot-mobi"
                    style="transition: all 0.5s ease-in-out 0s; border: none; box-shadow: none; background-color: transparent; border-radius: 8px; margin-bottom: 0px">
                    <h3 class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Giải pháp khép kín và thương
                        mại điện tử cho phòng khám </h3>
                    <div id="section_why_One-3"
                        class="panel-collapse collapse  clearfix-custom text-dark-blue padding-top-sm" role="tabpanel"
                        aria-labelledby="section_why_One3">
                        <p class="quicksan-text-md text-align-justify padding-top-xsm"> Myspa mang đến giải pháp khép
                            kín từ offline đến online cho hệ thống phòng khám. Phần mềm quản lý phòng khám ngoài quản lý
                            - vận hành tối ưu còn liên kết với sàn thương mại điện tử BeautyX, giúp mang đến nguồn khách
                            hàng ổn định và chất lượng, tăng doanh thu bán hàng cho doanh nghiệp. </p>
                    </div>
                    <div class="panel-heading" role="tab" id="section_why_One3"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <a class="flex-box justify-content-sapce-between collapsed" style="width: 100%"
                            data-toggle="collapse" data-parent="#section_why" aria-expanded="false"
                            href="#section_why_One-3" aria-controls="func_remote_One-2">
                            <img class="  icon" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-blue.svg" alt="icon">
                            <p
                                class="quicksan-text-md  text-primary-demo text-align-unset letter-spacing-sm padding-right-xsm ">
                                Xem chi tiết</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-blue">
    <div class="section-block">
        <div class="container padding-top-xl p text-primary-demo text-center unset-padY-mobi"
            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <div class="text-center margin-bottom-main-title">
                <h2 class="cus-title__home montserrat-text-md  text-primary-demo"> Khách hàng nói gì <br> về phần mềm
                    phòng khám Myspa? </h2>
            </div>
        </div>
        <div class="container pt-24px-mobi" style="max-width:1202px">
            <div class="twelve columns margin-unset">
                <div id="owl-sep-1" class="owl-carousel owl-theme max-width-unset partner-section"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <div class="item flex-box-row">
                        <div class="partner-left padding-unset-right">
                            <img class="image-size" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/Motiva.jpg"
                                width="100%" height="100%" alt="anh khach hang">
                        </div>
                        <div class="partner-right padding-unset flex-box">
                            <div class="bg-quote quote-content">
                                <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-left"> Anh
                                    Lê Văn Quang </h3>
                                <p
                                    class="quicksan-text-md text-bold text-primary-demo text-align-justify padding-bottom-sm">
                                    Chủ doanh nghiệp Thẩm mỹ viện Motiva </p>
                                <p
                                    class="quicksan-text-md text-primary-demo text-align-justify padding-bottom-xsm fontsize-14">
                                    "Là nhà phân phối độc quyền Motiva duy nhất tại Việt Nam. Nên công việc quản lý của
                                    tôi khá bận rộn từ việc quản lý cơ sở thẩm mỹ đến việc phân phối sản phẩm. Việc quản
                                    lý trước đây của tôi khác khó khăn do sử dụng phần mềm quản lý kho riêng và phần mềm
                                    quản lý cơ sở làm đẹp riêng để duy trì vận hành. Sau khi biết đến phần mềm quản lý
                                    phòng khám Myspa tôi đã thực sự hài lòng bởi phần mềm tích hợp được việc quản lý kho
                                    thuốc và vận hành cơ sở thẩm mỹ của tôi tại một nơi. Hơn nửa đội ngũ hỗ trợ rất
                                    nhiệt tình và tận tâm kể cả sau khi mua dịch vụ." </p>
                                <div class="logo-partner">
                                    <img class="image-contain" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/motiva.png"
                                        alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-box-row">
                        <div class="partner-left padding-unset-right">
                            <img class="image-size" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/Lux_beauty.jpg"
                                width="100%" height="100%" alt="anh khach hang">
                        </div>
                        <div class="partner-right padding-unset flex-box">
                            <div class="bg-quote quote-content">
                                <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-left"> Bác
                                    sĩ Phương </h3>
                                <p
                                    class="quicksan-text-md text-bold text-primary-demo text-align-justify padding-bottom-sm">
                                    Chủ doanh nghiệp Lux Beauty </p>
                                <p
                                    class="quicksan-text-md text-primary-demo text-align-justify padding-bottom-sm fontsize-14">
                                    "Là bác sĩ chuyên khoa da liễu với 11 năm kinh nghiệm trong lĩnh vực thẩm mỹ nội
                                    khoa, tôi luôn ấp ủ ước mơ để mở riêng cho mình một phòng khám da liễu. Năm 2020,
                                    chính là năm đánh dấu sự hình thành đứa con tinh thần của tôi - Lux Beauty Center.
                                    Vì có ít kinh nghiệm về vận hành nên điều tôi quan tâm hơn hết sau khi mở phòng khám
                                    là làm quản lý sao tối ưu hiệu nhất. Tình cờ biết đến phần mềm quản lý phòng khám
                                    Myspa thông qua mạng, sau khi trải nghiệm và dùng thử phần mềm kết quả vượt ngoài
                                    mong đợi của tôi. Phần mềm dễ sử dụng, tính năng tích hợp đa dạng rất phù hợp với
                                    phòng khám, lại có đội ngũ hỗ trợ thân thiện nên tôi đã rất tin tưởng và luôn khi
                                    giới thiệu phần mềm đến người thân bạn bè tôi.” </p>
                                <div class="logo-partner">
                                    <img class="image-contain width-cus-100px" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/lux-logo.png"
                                        width="65" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item flex-box-row">
                        <div class="partner-left padding-unset-right">
                            <img class="image-size image-contain" lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/PMT-Aesthetic-Clinic-3-1.jpg"
                                width="100%" height="100%" alt="anh khach hang">
                        </div>
                        <div class="partner-right padding-unset flex-box">
                            <div class="bg-quote quote-content">
                                <h3 class="montserrat-text-md font-weight-bold text-primary-demo text-align-left"> Bs.
                                    Phạm Minh Trường </h3>
                                <p
                                    class="quicksan-text-md text-bold text-primary-demo text-align-justify padding-bottom-sm">
                                    Chủ doanh nghiệp PMT Aesthetic phòng khám </p>
                                <p
                                    class="quicksan-text-md text-primary-demo text-align-justify padding-bottom-xsm fontsize-14">
                                    "Là chủ PMT Aesthetic Clinic, tôi luôn muốn tối ưu quản lý vận hành của doanh
                                    nghiệp, để phát triển thương hiệu và mở rộng thêm nhiều chi nhánh. Tôi không thể lúc
                                    nào cũng ở cơ sở để luôn quản lý và giám sát nhân viên mình làm việc. Sau khi tìm
                                    hiểu, trao đổi với anh chị đã sử dụng cũng như dùng thử phần mềm quản lý phòng khám
                                    da liễu Myspa. Tôi đã quyết định sử dụng Myspa để quản lý phòng khám của mình. Phần
                                    mềm tích hợp các tính năng như quản lý thông tin khách hàng, lịch hẹn, nhân viên,
                                    kho hàng,... giúp tôi tiết kiệm rất nhiều thời gian trong quản lý. Ngoài ra, hệ
                                    thống phần mềm chạy khá mượt, giao diện dễ nhìn, luôn có các chương trình khuyến mãi
                                    hỗ trợ khách hàng, nhân viên chuyên nghiệp. Tôi cảm thấy rất hài lòng những gì mà
                                    Myspa mang lại.” </p>
                                <div class="logo-partner ">
                                    <img class="image-contain" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-khach-hang/phan-mem-quan-ly-TMV-Clinic/pmv.png"
                                        width="65" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white padding-top-xxl padding-bottom-xxl unset-padY-mobi">
    <div class="container padding-bottom-xl unset-padY-mobi">
        <div class="container text-center">
            <div class="text-center margin-bottom-main-title margin-unset-bottom">
                <h2 data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="cus-title__home montserrat-text-md  text-primary-demo"> Một số câu hỏi thường gặp về <br>
                    phần mềm quản lý phòng khám Myspa </h2>
            </div>
        </div>
    </div>
    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="container-custom container">
        <div class="tab-pannel">
            <div id="questcontent-1" class="tab-content ">
                <div class="padding-top-md flex-box-mobile-column-reverse">
                    <div class="col-md-6 padding-top-md QaA_custom padding-right-xl panel-group unset-mar-pad-mobi"
                        id="q_aOne" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default padding-sm"
                            style="border-radius: 8px;transition: all 0.5s ease-in-out 0s;background: transparent;">
                            <div class="flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne1">
                                <a class="flex-box flex-box-align-items-baseline justify-content-sapce-between"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-1" aria-controls="q_aOne-1">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Phần mềm quản lý phòng khám Myspa khác gì so với quản lý kiểu truyền thống ?
                                    </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-1"
                                class="panel-collapse  collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                aria-expanded="false" role="tabpanel" aria-labelledby="q_aOne1">
                                <p class="quicksan-text-md padding-bottom-sm"> So với việc quản lý truyền thống thì phần
                                    mềm quản lý phòng khám Myspa sẽ tối ưu hóa việc quản lý và vận hành giúp quản lý
                                    nhanh chóng, dễ dàng, chính xác hơn. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Hạn chế xảy ra tình trạng sai số liệu và
                                    dễ dàng đồng bộ hóa dữ liệu </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Tiết kiệm thời gian và chi phí không phải
                                    ghi chép sổ sách, tích hợp nhiều tính năng như quản lý doanh thu công nợ, quản lý
                                    nhân viên, quản lý tồn kho… </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne2">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-2" aria-controls="q_aOne-2">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Phòng khám ít chi nhánh có nên sử dụng phần mềm quản lý phòng khám không?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-2"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne2">
                                <p class="quicksan-text-md padding-bottom-sm"> Dù ít chi nhánh nhưng việc tối ưu quản lý
                                    sẽ giúp chủ doanh nghiệp tiết kiệm không ít chi phí vận hành, nhân sự và sản phẩm…
                                </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Tuỳ thuộc vào số lượng chi nhánh, phần
                                    mềm Myspa sở hữu đa dạng tính năng được tích hợp trên hệ thống từ cơ bản đến nâng
                                    cao giúp doanh nghiệp quản lý dễ dàng. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Phần mềm Myspa luôn cập nhật thường xuyên
                                    các tính năng để phù hợp với nhu cầu phát triển của các phòng khám. Cập nhật tính
                                    năng mới hoàn toàn miễn phí. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne3">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-3" aria-controls="q_aOne-3">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Phần mềm quản lý phòng khám Myspa có khó dùng không? </h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-3"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne3">
                                <p class="quicksan-text-md padding-bottom-sm"> Giao diện và trải nghiệm phần mềm (UI/UX)
                                    của Myspa dựa trên mức độ hiệu quả hài lòng của khách hàng khi sử dụng mà thiết kế,
                                    nên rất dễ dàng thao tác và sử dụng. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Đội ngũ hỗ trợ 24/7 cho các chủ doanh
                                    nghiệp phòng khám khi gặp khó khăn trong việc sử dụng phần mềm. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Nhân viên doanh nghiệp phòng khám được hỗ
                                    trợ các buổi training sử dụng phần mềm phòng khám miễn phí </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne5">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-5" aria-controls="q_aOne-5">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Doanh nghiệp phát triển phần mềm quản lý phòng khám Myspa có uy tín?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-5"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne5">
                                <p class="quicksan-text-md padding-bottom-sm"> Doanh nghiệp ký kết hợp tác chính thức
                                    với tập đoàn công nghệ hàng đầu tại Việt Nam - NextTech của shark Nguyễn Hòa Bình
                                </p>
                                <p class="quicksan-text-md padding-bottom-sm"> +1000 phòng khám trong và ngoài nước đã
                                    hài lòng và sử dụng ổn định phần mềm quản lý phòng khám. Myspa chắc chắn là đơn vị
                                    uy tín để các chủ doanh nghiệp tin dùng. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne6">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-6" aria-controls="q_aOne-6">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Khi sử dụng phần mềm quản lý phòng khám, thông tin khách hàng của tôi có được
                                        bảo mật không?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-6"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne6">
                                <p class="quicksan-text-md padding-bottom-sm"> Chính sách ký kết hợp đồng giữa hai bên
                                    đã bao gồm bảo mật thông tin của khách hàng của các chủ doanh nghiệp. Ứng dụng công
                                    nghệ tiên tiến mã hóa đường truyền dữ liệu theo chuẩn SSL/TLS giữa máy chủ và thiết
                                    bị, đảm bảo an toàn và bảo mật cho doanh nghiệp. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne7">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-7" aria-controls="q_aOne-7">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Làm sao để đăng ký dùng phần mềm quản lý phòng khám Myspa?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-7"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne7">
                                <p class="quicksan-text-md padding-bottom-sm"> Bước 1: Khách hàng điền đầy đủ thông tin:
                                    họ tên, số điện thoại, email, tên doanh nghiệp, số lượng chi nhánh…tại thông tin
                                    đăng ký bên dưới </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Bước 2: Nhận tư vấn từ bộ phận chăm sóc
                                    của Myspa về phần mềm quản lý phòng khám tai mũi họng, phần mềm quản lý phòng khám
                                    da liễu… để đáp ứng phù hợp với từng doanh nghiệp như số lượng chi nhánh, nhu cầu
                                    quản lý vận hành phòng khám. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Bước 3: Dùng thử và trải nghiệm các tính
                                    năng trên phần mềm quản lý phòng khám. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Bước 4: Hai bên ký kết hợp đồng để sử
                                    dụng phần mềm quản lý phòng khám. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Bước 5: Bộ phận kỹ thuật hỗ trợ cài đặt
                                    phần mềm cho khách hàng, hướng dẫn sử dụng phần mềm cho chủ doanh nghiệp và nhân
                                    viên. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Đội ngũ hỗ trợ kỹ thuật 24/7 của Myspa
                                    liên hệ tại: </p>
                                <p class="quicksan-text-md padding-bottom-sm padding-left-xsm">
                                    <a href="tel:0343131003">
                                        <p><i class="icon icon-call-end"></i>&nbsp;&nbsp;Tổng đài tư vấn: 034 3131 003
                                        </p>
                                    </a>
                                </p>
                                <p class="quicksan-text-md padding-bottom-sm padding-left-xsm"> Email: support@myspa.vn
                                </p>
                                <p class="quicksan-text-md padding-bottom-sm padding-left-xsm"> Hoặc group zalo chăm sóc
                                    khách hàng </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne8">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-8" aria-controls="q_aOne-8">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Phần mềm quản lý phòng khám Myspa bảo hành như thế nào?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-8"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne8">
                                <p class="quicksan-text-md padding-bottom-sm"> Phần mềm quản lý phòng khám Myspa được
                                    bảo hành trong suốt thời gian sử dụng của doanh nghiệp. Bộ phận kỹ thuật sẽ hỗ trợ
                                    khắc phục lỗi miễn phí 24/7 (nếu có). </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aOne9">
                                <a class="flex-box justify-content-sapce-between flex-box-align-items-baseline"
                                    style="width: 100%" data-toggle="collapse" data-parent="#q_aOne"
                                    aria-expanded="false" href="#q_aOne-9" aria-controls="q_aOne-9">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi">
                                        Phần mềm quản lý phòng khám hoạt động trên những thiết bị nào?</h3>
                                    <img class="icon" lazy
                                        data-src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aOne-9"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aOne9">
                                <p class="quicksan-text-md padding-bottom-sm"> Phần mềm phòng khám Myspa hoạt động
                                    online trên mọi thiết bị từ máy tính, laptop, máy tính bảng, đến điện thoại di động…
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding-unset-left">
                        <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="cus-img-70">
                            <img lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/7.png"
                                width="100%" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-xl padding-top-xxl ">
        <div class="container text-center">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                class="text-center margin-bottom-main-title margin-unset-bottom ">
                <h2 class="font-weight-bold text-primary-demo" style="margin-bottom: 4px"> Một số câu hỏi thường gặp về
                    <br> tính năng phần mềm quản lý phòng khám Myspa </h2>
            </div>
        </div>
    </div>
    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
        class="container-custom container mb-24px-mobi">
        <div class="tab-pannel">
            <div id="questcontent-2" class="tab-content ">
                <div class="padding-top-md">
                    <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                        class="col-md-6 padding-unset-left">
                        <div class="cus-img-70">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/anh-phan-mem/9.png"
                                width="100%" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 padding-top-md QaA_custom padding-right-xl panel-group unset-mar-pad-mobi  "
                        id="q_aTwo" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default padding-sm"
                            style="border-radius: 8px;transition: all 0.5s ease-in-out 0s;background: transparent;">
                            <div class="flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo1">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-1"
                                    aria-controls="q_aTwo-1">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Phần mềm Myspa có quản lý phần mềm quản lý phòng khám nha khoa hay thú y không?
                                    </h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-1"
                                class="panel-collapse  collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                aria-expanded="false" role="tabpanel" aria-labelledby="q_aTwo1">
                                <p class="quicksan-text-md padding-bottom-sm"> Có. Phần mềm phòng khám Myspa có thể quản
                                    lý được cả phòng khám nha khoa, phần mềm quản lý phòng khám nha khoa, phần mềm quản
                                    lý phòng khám thú y, phần mềm quản lý phòng khám mắt… </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo2">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-2"
                                    aria-controls="q_aTwo-2">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Phần mềm có hỗ trợ tính lương và hoa hồng của nhân viên không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-2"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo2">
                                <p class="quicksan-text-md padding-bottom-sm"> Có, khách hàng có thể cài đặt mặc định
                                    mức lương và hoa hồng theo tùy cấp bậc nhân viên từ tư vấn, kỹ thuật viên, bác sĩ,
                                    phụ tá… Tiền thưởng thêm có thể cài đặt theo phần trăm doanh thu, dịch vụ thực hiện
                                    liệu trình, phẫu thuật. Dễ dàng điều chỉnh tiền thưởng thêm cho cá nhân (nhân viên
                                    lâu năm, tay nghề cao) </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo3">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-3"
                                    aria-controls="q_aTwo-3">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Nhân viên có thể xem lương và hoa hồng của bản thân trên phần mềm không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-3"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo3">
                                <p class="quicksan-text-md padding-bottom-sm"> phần mềm quản lý phòng khám Myspa chỉ hỗ
                                    trợ tài khoản admin (quản trị viên) xem và tùy chỉnh lương và hoa hồng cho nhân viên
                                </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo4">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-4"
                                    aria-controls="q_aTwo-4">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Một dịch vụ phẫu thuật, khám bệnh trong toa khám bệnh có thể thêm nhiều kỹ thuật
                                        viên, bác sĩ không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-4"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo4">
                                <p class="quicksan-text-md padding-bottom-sm"> Được, chủ doanh nghiệp có thể thêm nhiều
                                    kỹ thuật viên, bác sĩ, tư vấn viên trên phần mềm quản lý phòng khám trong một đơn
                                    hàng dịch vụ. Tiền lương và hoa hồng cho nhân viên trên từng công việc sẽ được tự
                                    động tính vào cuối tháng....Một nhân viên có thể đảm nhiệm nhiều vai trò, vừa tư vấn
                                    vừa là kỹ thuật viên, phụ tá. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo5">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-5"
                                    aria-controls="q_aTwo-5">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Có thể sử dụng hình thức thanh toán vừa tiền mặt, vừa cà thẻ, chuyển khoản trong
                                        cùng một đơn hàng trên phần mềm không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-5"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo5">
                                <p class="quicksan-text-md padding-bottom-sm"> Có, phần mềm quản lý phòng khám Myspa
                                    giúp chủ doanh nghiệp cài đặt nhiều phương thức thanh toán cho khách hàng như tiền
                                    mặt, cà thẻ và chuyển khoản trong cùng một đơn dịch vụ. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo6">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-6"
                                    aria-controls="q_aTwo-6">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Phần mềm quản lý phòng khám Myspa có hỗ trợ tính năng tạo đơn thuốc không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-6"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo6">
                                <p class="quicksan-text-md padding-bottom-sm"> Có, doanh nghiệp có thể tạo đơn thuốc dễ
                                    dàng ngay trên phần mềm và xem lại lịch sử đơn thuốc đã kê cho khách hàng trong phần
                                    quản lý thông tin khách hàng. </p>
                            </div>
                        </div>
                        <div class="panel panel-default padding-sm"
                            style="transition: all 0.5s ease-in-out 0s; border-bottom: 1px solid #E2E1E8">
                            <div class=" flex-box justify-content-sapce-between  panel-heading" role="tab" id="q_aTwo8">
                                <a class="flex-box justify-content-sapce-between" style="width: 100%"
                                    data-toggle="collapse" data-parent="#q_aTwo" aria-expanded="false" href="#q_aTwo-8"
                                    aria-controls="q_aTwo-8">
                                    <h3
                                        class="quicksan-text-md font-weight-bold text-primary-demo text-align-unset letter-spacing-sm unset-mar-pad-mobi  ">
                                        Trong quá trình sử dụng, có được yêu cầu chỉnh sửa, bổ sung tính năng trong phần
                                        mềm quản lý phòng khám Myspa không?</h3>
                                    <img class="icon"
                                        src="<?php echo base_url(); ?>assets/frontend/images/icon/up-purple.svg"
                                        alt="icon">
                                </a>
                            </div>
                            <div id="q_aTwo-8"
                                class="panel-collapse collapse clearfix-custom border-top text-dark-blue padding-top-sm"
                                role="tabpanel" aria-labelledby="q_aTwo8">
                                <p class="quicksan-text-md padding-bottom-sm"> Myspa sẽ đáp ứng ngay yêu cầu của khách
                                    hàng nếu yêu cầu nhỏ và không mất nhiều thời gian. </p>
                                <p class="quicksan-text-md padding-bottom-sm"> Trường hợp khách hàng muốn nâng cấp phần
                                    mềm quản lý chuỗi phòng khám nha khoa, phần mềm quản lý phòng khám sản phụ khoa hoặc
                                    các lĩnh vực khác theo yêu cầu riêng thì Myspa sẽ phân tích và gửi bản báo giá nâng
                                    cấp phần mềm theo yêu cầu. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-blue cls-relative height-seven">
    <div class="container" style="z-index:2">
        <div class="container padding-top-xl text-center" style="z-index:2">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                class="text-center margin-bottom-main-title">
                <h2 class="text-primary-demo" style="margin-bottom: 4px"> Đăng ký phần mềm quản lý phòng khám </h2>
                <span class="quicksan-text-md text-primary-demo font-weight-bold text-inside-circle"> Miễn phí dùng thử
                    7 ngày </span>
                <div class="padding-top-xl" id="submit-for-trial-section">
                    <button class="btn-submit-landing-page green bottom-left-position unset-margin-top" id="send"
                        data-toggle="modal" data-target=".register-modal"> ĐĂNG KÝ NGAY </button>
                </div>
            </div>
        </div>
    </div>
    <div style="max-width:1202px;margin: 0 auto;padding: 0;">
        <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="submit-section-background">
            <img lazy data-src="<?php echo base_url(); ?>assets/frontend/images/bg-multiple-device.png"
                alt="background multiple device">
        </div>
    </div>
</div>
<div class="section-block bg-transfer-top marketing-solution" style="background: #7FC128;">
    <div class="container">
        <div class="container text-center padding-top-xxl">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                class="text-center margin-bottom-main-title">
                <h2 class="text-white mY-48px mY-24px-mobi margin-unset"> GIẢI PHÁP MARKETING <br> VÀ TỐI ƯU VẬN HÀNH
                    QUẢN LÝ TẠI MỘT NƠI </h2>
            </div>
        </div>
    </div>
    <div class="bg-transfer-top-2layers">
        <div class="container" style="max-width:1202px;">
            <div class="flex-custom">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"
                    class="col-md-5 padding-unset-right margin-top-custom">
                    <!-- <span class="quicksan-text-md text-white font-weight-bold" style="text-align:unset">
                            App thương hiệu
                        </span>
                        <br> -->
                    <h2 class=" h1-cus-size text-white" style="text-align:unset;letter-spacing: -0.02em;"> Thiết kế App
                        thương hiệu <br> cho Spa, Thẩm Mỹ Viện, <br> Salon, Nail </h2>
                    <div class="padding-top-xl" id="submit-for-trial-section"
                        data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                        <!-- <button class="btn-submit-landing-page green bottom-left-position unset-margin-top" id="send"  data-toggle="modal" data-target=".register-modal">
                                ĐĂNG KÝ NGAY
                            </button> -->
                        <a class="quicksan-text-md text-white"
                            href="<?php echo base_url() ?>thiet-ke-app-thuong-hieu">Tìm hiểu về nền tảng kinh doanh
                            online spa, thẩm mỹ viện, salon, phòng khám... <img class="  padding-left-xsm vector-long"
                                lazy
                                data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Vector-long-white.svg"
                                alt="icon"></a>
                    </div>
                </div>
                <div class="col-md-7 cus-margin-clinic-nail">
                    <img lazy data-src="<?php echo base_url(); ?>assets/frontend/images/bg-solution-section.png"
                        width="100%" alt="background multiple device">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block background-color-white marketing-solution-section secMa-home unset-pad-mobi">
    <div class="container" style="max-width:1202px; position: unset">
        <div class=" text-center margin-bottom-main-title"
            data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <h2 class="cus-title__home montserrat-text-md  text-primary-demo"> Giải pháp số hóa marketing <br
                    class="mobile-hide" /> và vận hành quản lý khép kín Myspa </h2>
        </div>
        <div class="myspa-circle-service" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
            <div class="bg-ellipse ellipse-block clearfix-custom ">
                <div class="col-md-4 col-sm-4 col-lg-4 left-side clearfix-custom">
                    <div class="ellipse-item ">
                        <div class="img-block">
                            <img class="image-size"
                                src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Omnichannel.png"
                                loading="lazy" alt="Giải pháp quản lý Myspa">
                        </div>
                        <p class="quicksan-text-lg text-primary-demo text-center"> Bán hàng đa kênh </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 mid-side clearfix-custom">
                    <div class="tool-tip">
                        <div class="child">
                            <a href="<?php echo base_url(); ?>phan-mem-quan-ly-spa">
                                <img class="tooltip-icon"
                                    src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Icon/Icon/myspa.svg"
                                    loading="lazy" alt="tool tip">
                            </a>
                        </div>
                        <div class="name">
                            <p class="montserrat-text-md text-center"> Phần mềm spa </p>
                        </div>
                    </div>
                    <div class="tool-tip">
                        <div class="child">
                            <a href="<?php echo base_url(); ?>phan-mem-quan-ly-phong-kham-tham-my-vien">
                                <img class="tooltip-icon"
                                    src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Icon/Icon/clinic.svg"
                                    loading="lazy" alt="tool tip">
                            </a>
                        </div>
                        <div class="name">
                            <p class="montserrat-text-md text-center"> Phần mềm <br> phòng khám </p>
                        </div>
                    </div>
                    <div class="tool-tip">
                        <div class="child">
                            <a href="<?php echo base_url(); ?>phan-mem-quan-ly-salon-toc">
                                <img class="tooltip-icon"
                                    src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Icon/Icon/salon.svg"
                                    loading="lazy" alt="tool tip">
                            </a>
                        </div>
                        <div class="name">
                            <p class="montserrat-text-md text-center"> Phần mềm <br> salon tóc </p>
                        </div>
                    </div>
                    <div class="tool-tip">
                        <div class="child">
                            <a href="<?php echo base_url(); ?>phan-mem-quan-ly-tiem-nails">
                                <img class="tooltip-icon"
                                    src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Icon/Icon/nails.svg"
                                    loading="lazy" alt="tool tip">
                            </a>
                        </div>
                        <div class="name">
                            <p class="montserrat-text-md text-center"> Phần mềm <br> tiệm nails </p>
                        </div>
                    </div>
                    <div class="ellipse-item">
                        <div class="img-block">
                            <img class="image-size"
                                src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Myspa-Manager.png"
                                loading="lazy" alt="Phần mềm quản lý Myspa">
                        </div>
                        <p class="quicksan-text-lg text-primary-demo text-center"> Phần mềm quản lý </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 right-side clearfix-custom">
                    <div class="ellipse-item">
                        <div class="img-block">
                            <img class="image-size"
                                src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/App-Checkin.png"
                                loading="lazy" alt="Phần mềm quản lý Myspa">
                        </div>
                        <p class="quicksan-text-lg text-primary-demo text-center"> Go Checkin </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 clearfix-custom">
                    <div class="ellipse-item">
                        <div class="img-block">
                            <img class="image-size"
                                src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Booking-Flatform.png"
                                loading="lazy" alt="Phần mềm quản lý Myspa">
                        </div>
                        <p class="quicksan-text-lg text-primary-demo text-center"> Nền tảng kinh doanh ngành làm đẹp
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 clearfix-custom">
                    <div class="ellipse-item">
                        <div class="img-block">
                            <a href="<?php echo base_url(); ?>thiet-ke-app-thuong-hieu">
                                <img class="image-size"
                                    src="<?php echo base_url(); ?>assets/frontend/images/main/homepage/Brand-App.png"
                                    loading="lazy" alt="Phần mềm quản lý Myspa">
                            </a>
                        </div>
                        <p class="quicksan-text-lg text-primary-demo text-center"> Thiết kế app </p>
                    </div>
                </div>
                <div class="blur-layout">
                </div>
            </div>
            <!-- <div id="myspa-circle-mobile" class="owl-carousel owl-theme mobile-show">
                    <div class="item">
                        <div class="avatar">
                        <a href="#"><img src="<?php echo base_url(); ?>/assets/frontend/images/main/homepage/Omnichannel.png" alt=""></a>
                        </div>
                        <a href="#">
                        <div class="step-title"></div>
                        </a>
                    </div>
                    <div class="item">
                        <div class="avatar">
                        <a href="#"><img src="<?php echo base_url(); ?>/assets/frontend/images/main/homepage/Myspa-Manager.png" alt=""></a>
                        </div>
                        <a href="#">
                        <div class="step-title"></div>
                        </a>
                    </div>
                    <div class="item">
                        <div class="avatar">
                        <a href="#"><img src="<?php echo base_url(); ?>/assets/frontend/images/main/homepage/App-Checkin.png" alt=""></a>
                        </div>
                        <a href="#">
                        <div class="step-title"></div>
                        </a>
                    </div>
                    <div class="item">
                        <div class="avatar">
                        <a href="#"><img src="<?php echo base_url(); ?>/assets/frontend/images/main/homepage/Booking-Flatform.png" alt=""></a>
                        </div>
                        <a href="#">
                        <div class="step-title"></div>
                        </a>
                    </div>
                    <div class="item">
                        <div class="avatar">
                        <a href="#"><img src="<?php echo base_url(); ?>/assets/frontend/images/main/homepage/Brand-App.png" alt=""></a>
                        </div>
                        <a href="#">
                        <div class="step-title"></div>
                        </a>
                    </div>
                </div> -->
        </div>
    </div>
</div>
<div class="section-block background-color-blue cls-relative bg-online-marketing unset-mar-mobi">
    <div style="max-width:1202px;margin: 0 auto;padding: 0;">
        <div class="row margin-unset-bottom">
            <div class="col-md-7 margin-bottom-xxl margin-top-xxl padding-right-xxl"
                data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <img lazy data-src="<?php echo base_url(); ?>assets/frontend/images/comingsoon-section-image.png"
                    width="100%" alt="background multiple device">
            </div>
            <div class="col-md-5 padding-unset-left margin-bottom-xxl margin-top-xxl">
                <div class="mobile-hide" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> <img lazy
                        data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/icon-xe-hang.png"
                        alt="Icon xe hang "> </div>
                <!-- <div> <p class="success-text-xl padding-bottom-sm"  data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> COMING SOON </p></div> -->
                <h2 class=" h1-cus-size text-primary-demo " style="text-align:unset"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s"> Nền tảng <br> kinh doanh online
                    <br> cho ngành làm đẹp spa, <br> thẩm mỹ viện, salon, phòng khám </h2>
                <div class="padding-top-sm" id="submit-for-trial-section"
                    data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                    <a class="quicksan-text-md text-bold text-primary-demo"
                        href="<?php echo base_url() ?>nen-tang-kinh-doanh-nganh-lam-dep">Tìm hiểu về nền tảng kinh doanh
                        online spa, thẩm mỹ viện, salon, phòng khám...<img class="  padding-left-xsm vector-long" lazy
                            data-src="<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Vector-long-purple.svg"
                            alt="icon"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners --> <?php echo $this->footer_frontend(); ?> </div>
<!-- JAVASCRIPT
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/retina.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/header-anime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/tipper.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/letters.js"></script>
<!-- <script  type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrolltoid.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollReveal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.chaffle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/anime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollMonitor.js"></script>
<script type="text/javascript"
    src="<?php echo base_url(); ?>assets/frontend/js/animation-home-1.js?v=<?php echo $this->config->item('version'); ?>">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/owlCarousel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/parallax.js"></script>
<!-- <script  type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/vivus.js"></script> -->
<!-- Custom JavaScript
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<script defer type="text/javascript">
// duyệt tất cả tấm ảnh cần lazy-load
const lazyImages = document.querySelectorAll('[lazy]');
// chờ các tấm ảnh này xuất hiện trên màn hình
const lazyImageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        // tấm ảnh này đã xuất hiện trên màn hình
        if (entry.isIntersecting) {
            const lazyImage = entry.target;
            const src = lazyImage.dataset.src;
            lazyImage.tagName.toLowerCase() === 'img'
                // <img>: copy  lazy data-src sang src
                ? lazyImage.src = src
                // <div>: copy  lazy data-src sang background-image
                : lazyImage.style.backgroundImage = "url(\'" + src + "\')";
            // copy xong rồi thì bỏ attribute lazy đi
            lazyImage.removeAttribute('lazy');
            // job done, không cần observe nó nữa
            observer.unobserve(lazyImage);
        }
    });
});
// Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
lazyImages.forEach((lazyImage) => {
    lazyImageObserver.observe(lazyImage);
});
$(function() {
    // Set the date we're counting down to
    var countDownDate = new Date("Sep 24, 2021 23:59:59").getTime();
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
        $('.time-date').empty().html(days + '<br><small>ngày</small>');
        $('.time-hour').empty().html(hours + '<br><small>giờ</small>');
        $('.time-minute').empty().html(minutes + '<br><small>phút</small>');
        $('.time-second').empty().html(seconds + '<br><small>giây</small>');
        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
        }
    }, 1000);
    //Update register number
    var x = setInterval(function() {
        $.ajax({
            url: BASE_URL + "Frontend/get_count_register",
            type: "get",
            dataType: 'json',
            success: function(result) {
                var count_register = result.count_register;
                $('.current-progress').width(parseFloat(count_register * 100 / 1000) + '%');
                $('.remain-progress').width((80 - parseFloat(count_register * 100 / 1000)) +
                    '%');
                $('.register-count').empty().append(result.count_register);
            }
        });
        return false;
    }, 10000);
    // change icon
    $('.Manage-customer').click(function() {
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-customer > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer.svg'
            );
        $('.Controlling-economic > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg'
            );
        $('.Manage-employee > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg'
            );
        $('.Manage-warehouse > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg'
            );
        $('.Controlling-economic,.Manage-employee,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-2,#tabcontent-3,#tabcontent-4').fadeOut(0);
    });
    $('.Controlling-economic').click(function() {
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Controlling-economic > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg'
            );
        $('.Controlling-economic > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic.svg'
            );
        $('.Manage-employee > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg'
            );
        $('.Manage-warehouse > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg'
            );
        $('.Manage-customer,.Manage-employee,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-3,#tabcontent-4').fadeOut(0);
    });
    $('.Manage-employee').click(function() {
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-employee > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg'
            );
        $('.Controlling-economic > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg'
            );
        $('.Manage-employee > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee.svg'
            );
        $('.Manage-warehouse > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg'
            );
        $('.Controlling-economic,.Manage-customer,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-2,#tabcontent-4').fadeOut(0);
    });
    $('.Manage-warehouse').click(function() {
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-warehouse > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg'
            );
        $('.Controlling-economic > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg'
            );
        $('.Manage-employee > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg'
            );
        $('.Manage-warehouse > img').attr('src',
            '<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse.svg'
            ).fadeIn(10000);
        $('.Controlling-economic,.Manage-employee,.Manage-customer').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-2,#tabcontent-3').fadeOut(0);
    });
    var hash = location.hash;
    if (hash == '#dang-ky') {
        $('#send').trigger('click');
    }
    if (hash == '#quan-ly-nhan-vien-tham-my-vien') {
        $('#quan-ly-nhan-su,#manageFunc_third').trigger('click');
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#quan-ly-tham-my-vien").offset().top
        }, 2000);
    }
    //custom function section for mobile version
    $("#func .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#EEEDF2');
            parent.parent().css('border-radius', '8px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $(this).children().last().html('Thu gọn');
        }
        $("#func .panel-default").each(function() {
            var child_status = $(this).children().last().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().last());
            if (child_status == "true") {
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '0px');
                $(this).children().last().children().first().children().last().html(
                    'Xem chi tiết');
            }
        })
    });
    //custom function section for mobile version
    $("#manage_func .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            // console.log(a);
            $(this).children().last().html('Thu gọn');
        }
        $("#manage_func .panel-default").each(function() {
            var child_status = $(this).children().last().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().last());
            if (child_status == "true") {
                $(this).children().last().children().first().children().last().html('Xem thêm');
            }
        })
    });
    //custom function remote section for mobile version
    $("#func_remote .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $(this).children().last().html('Thu gọn');
        }
        $("#func_remote .panel-default").each(function() {
            var child_status = $(this).children().last().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().last());
            if (child_status == "true") {
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '0px');
                $(this).children().last().children().first().children().last().html(
                    'Xem chi tiết');
            }
        })
    });
    //custom function higher control section for mobile version
    $("#func_higher_control .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $(this).children().last().html('Thu gọn');
        }
        $("#func_higher_control .panel-default").each(function() {
            var child_status = $(this).children().last().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().last());
            if (child_status == "true") {
                $(this).css('background', '#F5F5F7');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '16px');
                $(this).children().last().children().first().children().last().html(
                    'Xem chi tiết');
            }
        })
    });
    //custom function higher control section for mobile version
    $("#section_why .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $(this).children().last().html('Thu gọn');
        }
        $("#section_why .panel-default").each(function() {
            var child_status = $(this).children().last().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().last());
            if (child_status == "true") {
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '16px');
                $(this).children().last().children().first().children().last().html(
                    'Xem chi tiết');
            }
        })
    });
    //custom q and a animate
    $("#q_aOne .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#EEEDF2');
            parent.parent().css('border-radius', '8px');
            parent.parent().css('border', '0px');
        }
        $("#q_aOne .panel-default").each(function() {
            var child_status = $(this).children().first().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().first().children().first());
            if (child_status == "true") {
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '1px solid #E2E1E8');
                $(this).css('border-radius', '0px');
            }
        })
    });
    $("#q_aTwo .panel-default .panel-heading a").on("click", function() {
        var a = $(this).attr('aria-expanded');
        var parent = $(this).parent();
        if (a == "false") {
            parent.parent().css('background', '#EEEDF2');
            parent.parent().css('border-radius', '8px');
            parent.parent().css('border', '0px');
        }
        $("#q_aTwo .panel-default").each(function() {
            var child_status = $(this).children().first().children().first().attr(
                'aria-expanded');
            // console.log($(this).children().first().children().first());
            if (child_status == "true") {
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '1px solid #E2E1E8');
                $(this).css('border-radius', '0px');
            }
        })
    });
    // counting animate
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 7000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    /* Separate Carousels */
    var owl_1 = $("#owl-sep-1");
    owl_1.owlCarousel({
        navigation: true,
        navigationText: [
            "<img src='<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Left Arrow.png' alt='icon'>",
            "<img src='<?php echo base_url(); ?>assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Right Arrow.png' alt='icon'>"
        ],
        rewindNav: true,
        scrollPerPage: false,
        dots: false,
        pagination: false,
        transitionStyle: "fade",
        slideSpeed: 500,
        paginationSpeed: 500,
        singleItem: true,
        autoPlay: false,
        autoHeight: true
    });
    var owl_2 = $("#mobile-marketing-section");
    owl_2.owlCarousel({
        navigation: false,
        rewindNav: true,
        scrollPerPage: false,
        dots: true,
        pagination: true,
        // transitionStyle : "fade",
        slideSpeed: 500,
        paginationSpeed: 500,
        singleItem: true,
        autoPlay: false,
        autoHeight: true,
    });
});
</script>