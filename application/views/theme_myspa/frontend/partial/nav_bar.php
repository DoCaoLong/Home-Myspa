<?php
$link = array();
$link['home'] = base_url();
$link['about-us'] = base_url() . "ve-chung-toi";
$link['customer'] = base_url() . "blog/category/khach-hang/";
$link['recruit'] = base_url() . "tuyen-dung";
$link['landing_page_spa'] = base_url() . "phan-mem-quan-ly-spa";
$link['landing_page_clinic'] = base_url() . "phan-mem-quan-ly-phong-kham";
$link['landing_page_salon'] = base_url() . "phan-mem-quan-ly-salon-toc";
$link['landing_page_nail'] = base_url() . "phan-mem-quan-ly-tiem-nails";
$link['landing_page_app_design'] = base_url() . "thiet-ke-app-thuong-hieu";
$link['landing_page_beauty_ecosystem'] = base_url() . "nen-tang-kinh-doanh-nganh-lam-dep";
$link['landing_beautyx_connection'] = base_url() . "mo-gian-hang-tren-beautyx";
$link['pricing'] = base_url() . "bang-gia-phan-mem";
$link['brand_app_pricing'] = base_url() . "bang-gia-thiet-ke-app";
$link['news'] = base_url() . "blog";
$link['contact'] = base_url() . "ho-tro";
// $link['event'] = base_url() . "su-kien";
?>
<nav id="menu-wrap">
    <div class="menu">
        <a href="<?= base_url(); ?>">
            <div class="logo"></div>
        </a>
        <a href="#" class="menu-mobile">
            <span class="dot dot1"></span>
        </a>
        <ul>
            <li>
                <a href="<?= $link["home"] ?>"
                    class="<?= $actual_link === $link["home"] ? ('current-color-green ') : '' ?> ">Trang chủ</a>
            </li>
            <li class="sub-menu" style="cursor: pointer">

                <a href="#"
                    class="<?= ($actual_link === $link["about-us"] || $actual_link === $link["recruit"]) ? ('current-color-green ') : '' ?>">
                    Về Myspa
                    <span class="padding-left-xsm"><img height="" class="drop-down-icon"
                            src="<?= base_url(); ?>assets/frontend/images/icon/vector-down-purple.svg"
                            alt="icon fire" /></span>
                </a>
                <ul class="drop-down-box">
                    <li>
                        <a href="<?= $link["about-us"] ?>"
                            class="<?= $actual_link === $link["about-us"] ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">Giới
                            thiệu</a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['recruit'] ?>"
                            class="<?= ($actual_link === $link['recruit']) ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Tuyển dụng
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="<?= $link["customer"] ?>">Khách hàng</a>
            </li>
            <li class="sub-menu" style="cursor: pointer">
                <a href="#" class="<?= ($actual_link === $link['landing_page_spa'] ||
                                $actual_link === $link['landing_page_clinic'] ||
                                $actual_link === $link['landing_page_salon'] ||
                                $actual_link === $link['landing_page_nail'] ||
                                $actual_link === $link['landing_page_app_design'] ||
                                $actual_link === $link['landing_beautyx_connection']) ? ('current-color-green ') : '' ?>
                                ">Giải Pháp<span class="padding-left-xsm"><img height="" class="drop-down-icon"
                            src="<?= base_url(); ?>assets/frontend/images/icon/vector-down-purple.svg"
                            alt="icon fire" /></span></a>
                <ul class="drop-down-box">
                    <li>
                        <a href="<?= $link["landing_page_spa"] ?>"
                            class="<?= ($actual_link === $link["landing_page_spa"] ? ('current-color-green ') : '') ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Phần mềm quản lý Spa
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['landing_page_clinic'] ?>"
                            class="<?= ($actual_link === $link['landing_page_clinic']) ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Phần mềm quản lý Phòng Khám
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['landing_page_salon'] ?>"
                            class="<?= ($actual_link === $link['landing_page_salon']) ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Phần mềm quản lý Salon Tóc
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['landing_page_nail'] ?>"
                            class="<?= ($actual_link === $link['landing_page_nail']) ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Phần mềm quản lý Tiệm Nails
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['landing_page_app_design'] ?>"
                            class="<?= ($actual_link === $link['landing_page_app_design']) ? ('current-color-green ') : '' ?> text-primary-demo quicksan-text-md font-weight-bold">
                            Thiết kế App Thương Hiệu - chăm sóc khách hàng
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['landing_beautyx_connection'] ?>"
                            class="<?= ($actual_link === $link['landing_beautyx_connection']) ? ('current-color-green ') : '' ?> text-primary-demo quicksan-text-md font-weight-bold">
                            Mở gian hàng trên BeautyX
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub-menu" style="cursor: pointer">
                <a href="#" class="<?= ($actual_link === $link['pricing']) ? ('current-color-green ') : '' ?>">Bảng
                    giá<img height="" class="drop-down-icon"
                        src="<?= base_url(); ?>assets/frontend/images/icon/vector-down-purple.svg"
                        alt="icon fire" /></a>
                <ul class="drop-down-box">
                    <li>
                        <a href="<?= $link['pricing'] ?>"
                            class="<?= ($actual_link === $link['pricing']) ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Bảng giá phần mềm
                        </a>
                    </li>
                    <!-- <hr> -->
                    <li>
                        <a href="<?= $link['brand_app_pricing'] ?>"
                            class="<?= $actual_link ===  $link['brand_app_pricing'] ? ('current-color-green ') : '' ?>text-primary-demo quicksan-text-md font-weight-bold">
                            Bảng giá thiết kế app
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= $link['news'] ?>">Tin tức</a>
            </li>
            <li>
                <a href="<?= $link['contact'] ?>"
                    class="<?= ($actual_link === $link['contact']) ? ('current-color-green ') : '' ?>">Hỗ trợ</a>
            </li>
            <!-- <li class="nav-event">
                <a href="<?= $link['event'] ?>"
                    class="<?= ($actual_link === $link['event']) ? ('current-color-green ') : '' ?>">Sự kiện</a>
                <img class="icon-new" src="<?= base_url(); ?>assets/frontend/images/event/icon_new.png"
                    alt="icon-new" />
            </li> -->
            <li>
                <a href="tel:0343131003"><span style="margin-right: 4px"> <img class="phone icon"
                            src="<?= base_url(); ?>assets/frontend/images/icon/phone.svg" alt="icon phone" /></span>
                    034 3131 003</a>
            </li>
        </ul>
    </div>
</nav>

<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/global.js"></script>