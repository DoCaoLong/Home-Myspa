<?php
$page = $_SESSION['page_content'];
// Hero banner section 
$page_h1 = nl2br($page['banner']['h1']);
$page_banner_image_url = nl2br($page['banner']['banner_image_url']);
$page_h1_content = nl2br($page['banner']['content']);
$page_quote = nl2br($page['banner']['quote_content']);
$page_quote_author = $page['banner']['author_name'];
// end herobanner 

// about product section 
$page_about_myspa_product_title = nl2br($page['about_myspa_product']['title']);
$page_about_myspa_product_devive_image_url = $page['about_myspa_product']['devive_image_url'];
$page_about_myspa_product_beautyx_network_image_url = $page['about_myspa_product']['beautyx_network_image_url'];
// end product

// Core value section 
$page_core_value_title = $page['core_value']['title'];
$page_core_value_section_image_url = $page['core_value']['section_image']['devive_image_url'];

$page_core_value_core_value_list_item_1_title = $page['core_value']['core_value_list']['core_value_item_1']['title']; //1
$page_core_value_core_value_list_item_1_content = $page['core_value']['core_value_list']['core_value_item_1']['content'];
$page_core_value_core_value_list_item_1_icon_url = $page['core_value']['core_value_list']['core_value_item_1']['icon_url'];

$page_core_value_core_value_list_item_2_title = $page['core_value']['core_value_list']['core_value_item_2']['title']; //2
$page_core_value_core_value_list_item_2_content = $page['core_value']['core_value_list']['core_value_item_2']['content'];
$page_core_value_core_value_list_item_2_icon_url = $page['core_value']['core_value_list']['core_value_item_2']['icon_url'];

$page_core_value_core_value_list_item_3_title = $page['core_value']['core_value_list']['core_value_item_3']['title']; //3
$page_core_value_core_value_list_item_3_content = $page['core_value']['core_value_list']['core_value_item_3']['content'];
$page_core_value_core_value_list_item_3_icon_url = $page['core_value']['core_value_list']['core_value_item_3']['icon_url'];
// end core value

// Merchant and partner section 
$page_merchant_and_partner_title = $page['merchant_and_partner']['title'];
$page_merchant_and_partner_map_url = $page['merchant_and_partner']['map_url'];
$page_merchant_and_partner_description = $page['merchant_and_partner']['description'];

$page_merchant_and_partner_mc_title = $page['merchant_and_partner']['mc_logo_section']['title'];
$page_merchant_and_partner_mc_logos = $page['merchant_and_partner']['mc_logo_section'];
array_shift($page_merchant_and_partner_mc_logos);

$page_merchant_and_partner_partner_title = $page['merchant_and_partner']['partner_logo_section']['title'];
$page_merchant_and_partner_partner_logos = $page['merchant_and_partner']['partner_logo_section'];
array_shift($page_merchant_and_partner_partner_logos);
// end Merchant and partner

// Myspa team section
$page_myspa_team_title = $page['myspa_team']['title'];
$page_myspa_team_bod_team = $page['myspa_team']['bod_team'];
$page_myspa_team_core_team = $page['myspa_team']['core_team'];
// end Myspa team

// Investor section 
$page_vc_and_investor_title = $page['vc_and_investor']['title'];
$page_vc_and_investor_investor_logo_url = $page['vc_and_investor']['investor_logo_url'];
$page_vc_and_investor_investor_logo_url = $page['vc_and_investor']['investor_logo_url'];
$page_vc_and_investor_inverstor_name = $page['vc_and_investor']['inverstor_name'];
$page_vc_and_investor_inverstor_subtitle = $page['vc_and_investor']['inverstor_subtitle'];
// end Investor

// Activities section 
$page_achievement_section_title = $page['achievement_section']['title'];
$page_achievement_section_counting = $page['achievement_section']['counting'];

$page_active_section_title = $page['active_section']['title'];

$page_active_section_coOperating = $page['active_section']['co-operating'];
$page_active_section_coOperating_title = $page['active_section']['co-operating']['title'];
array_shift($page_active_section_coOperating);

$page_active_section_event_and_workshop = $page['active_section']['event_and_workshop'];
$page_active_section_event_and_workshop_title = $page['active_section']['event_and_workshop']['title'];
array_shift($page_active_section_event_and_workshop);

$page_active_section_favourite_events = $page['active_section']['favourite_events'];
$page_active_section_favourite_events_title = $page['active_section']['favourite_events']['title'];
array_shift($page_active_section_favourite_events);
// end Activities

// Join With US section
$page_join_with_us_title = $page['join_with_us']['title'];
$page_join_with_us_description = nl2br($page['join_with_us']['description']);
$page_join_with_us_form_tiitle = nl2br($page['join_with_us']['form_tiitle']);

// end Join With US
?>
<!-- Header -->
<?= $this_controller->nav_bar_frontend(); ?>
<!-- close header -->

<!-- Body -->
<div class="about-page">
    <!-- about banner -->
    <section class="about-banner">
        <div id="particles-js">
        </div>
        <div class="about-banner_img">
            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/about-banner.png" alt="banner">
        </div>
        <div class="about-banner_wrap">
            <div class="about-banner_text">
                <div class="about-banner_img_seo">
                    <img src="<?= $page_banner_image_url ?>" alt="">
                </div>
                <span>
                    Số hóa
                </span>
                <span>
                    Khởi tạo
                </span>
                <span>
                    Thành
                </span>
                <span>
                    Công
                </span>
            </div>
            <!-- about we -->
            <div class="about-we">
                <div class="about-title">
                    <div class="about-title_img">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                    </div>
                    <h1 class="about-title_text"><?= $page_h1 ?></h1>
                </div>
                <div class="about-we_text">
                    <span><?= $page_h1_content ?></span>
                </div>

                <div class="about-we_child">
                    <div class="about-child_wrap">
                        <span>"<?= $page_quote ?>"</span>
                    </div>
                    <span class="about-we_auth"><strong><?= $page_quote_author ?></strong></span>

                </div>
            </div>
            <!-- close about we -->
        </div>


    </section>
    <!-- close about banner -->

    <!-- about product -->
    <section class="about-product">
        <div class="about-product_container">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-title">
                <div class="about-title_img">
                    <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                </div>
                <h2 class="about-title_text"><?= $page_about_myspa_product_title ?></h2>
            </div>

            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="product-device_img">
                <img src="<?= $page_about_myspa_product_devive_image_url ?>" alt="">
            </div>
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="product-diagram_img">
                <img src="<?= $page_about_myspa_product_beautyx_network_image_url ?>" alt="">
            </div>
        </div>
    </section>
    <!-- close about product -->

    <!-- about value  -->
    <section class="about-value">
        <div class="about-value-container">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-title">
                <div class="about-title_img">
                    <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                </div>
                <h2 class="about-title_text"><?= $page_core_value_title ?></h2>
            </div>

            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.3s" class="about-value_wrap">
                <div class="about-value_left">
                    <div class="value-left_img">
                        <img src="<?= $page_core_value_section_image_url ?>" alt="">
                    </div>
                </div>
                <div class="about-value_right">
                    <div class="value-right_item">
                        <div class="item-img">
                            <img src="<?= $page_core_value_core_value_list_item_1_icon_url ?>" alt="">
                        </div>
                        <div class="item-content">
                            <div class="item-name"><?= $page_core_value_core_value_list_item_1_title ?></div>
                            <div class="item-desc"><span><?= $page_core_value_core_value_list_item_1_content ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="value-right_item">
                        <div class="item-img">
                            <img src="<?= $page_core_value_core_value_list_item_2_icon_url ?>" alt="">
                        </div>
                        <div class="item-content">
                            <div class="item-name"><?= $page_core_value_core_value_list_item_2_title ?></div>
                            <div class="item-desc"><span><?= $page_core_value_core_value_list_item_2_content ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="value-right_item">
                        <div class="item-img">
                            <img src="<?= $page_core_value_core_value_list_item_3_icon_url ?>" alt="">
                        </div>
                        <div class="item-content">
                            <div class="item-name"><?= $page_core_value_core_value_list_item_3_title ?></div>
                            <div class="item-desc"><span><?= $page_core_value_core_value_list_item_3_content ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- close about value  -->

    <!-- about client -->
    <section class="about-client">
        <div class="about-client_container">
            <div class="about-client_wrap">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-client_left">
                    <div class="left-client_title">
                        <div class="client-left_img">
                            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                        </div>
                        <h2 class="client-left_text">
                            <li>
                                <span><?= $page_merchant_and_partner_title ?></span>
                            </li>
                            <span><?= $page_merchant_and_partner_title ?></span>
                        </h2>
                    </div>
                    <div class="left-client_desc">
                        <span><?= $page_merchant_and_partner_description ?></span>
                    </div>

                    <div class="left-client_img">
                        <img src="<?= $page_merchant_and_partner_map_url ?>"
                            alt="<?= $page_merchant_and_partner_title ?>">
                    </div>
                </div>

                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.5s" class="about-client_right">
                    <div class="client-right_top">
                        <div class="client-right_client">
                            <span><?= $page_merchant_and_partner_mc_title ?></span>
                        </div>
                        <div class="client-list">
                            <?php for ($i = 1; $i <= 9; $i++) {
                                echo ("<div class='client-item'>
                                <img src='" . $page_merchant_and_partner_mc_logos['logo_url_' . $i] . "' alt='logo'>
                            </div>");
                            } ?>
                        </div>
                    </div>

                    <div class="client-right_bottom">
                        <div class="client-right_partner">
                            <span><?= $page_merchant_and_partner_partner_title ?></span>
                        </div>
                        <div class="partner-list">
                            <?php for ($i = 1; $i <= 6; $i++) {
                                echo ("<div class='client-item'>
                                <img src='" . $page_merchant_and_partner_partner_logos['logo_url_' . $i] . "' alt='logo'>
                            </div>");
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- close about client -->

    <!-- about team -->
    <section class="about-team">
        <div id="particles-js2">
        </div>
        <div class="about-team_bgtop">
            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/bg-team-top.png" alt="">
        </div>
        <div class="about-team_bgstart">
            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/bg-team-start.png" alt="">
        </div>

        <div class="about-team_container">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
                <div class="about-title">
                    <div class="about-title_img">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                    </div>
                    <h2 class="about-title_text"><?= $page_myspa_team_title ?></h2>
                </div>
            </div>

            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.3s" class="team-founder_slide">
                <ul class="team-founder_list">
                    <?php for ($i = 0; $i <= 2; $i++) {
                    ?>
                    <li class='carousel-cell'>
                        <a target='_blank' href='<?= base_url(); ?>ve-chung-toi-founder?id=<?=$i?>'
                            class='team-founder_item'>
                            <div class='founder-item_img'>
                                <img src="<?= ($i == 0) ? $page_myspa_team_bod_team['avatar_url'] : $page_myspa_team_bod_team['avatar_url_' . $i] ?>"
                                    alt=''>
                            </div>
                            <div class='founder-item_cnt'>
                                <p class='founder-item-text'>
                                    <?= ($i == 0) ? $page_myspa_team_bod_team['gender'] : $page_myspa_team_bod_team['gender_' . $i] ?>
                                </p>
                                <p class='founder-item-name'>
                                    <?= ($i == 0) ? $page_myspa_team_bod_team['full_name'] : $page_myspa_team_bod_team['full_name_' . $i] ?>
                                </p class='founder-item-position'>
                                <p class='founder-item-position'>
                                    <?= ($i == 0) ? $page_myspa_team_bod_team['position'] : $page_myspa_team_bod_team['position_' . $i] ?>
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <ul data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="team-lead_list">
                <?php for ($i = 0; $i <= 3; $i++) { ?>
                <li class="team-lead_item">
                    <div class="team-lead_img">
                        <img src="<?= ($i == 0) ? $page_myspa_team_core_team['avatar_url'] : $page_myspa_team_core_team['avatar_url_' . $i] ?>"
                            alt="">
                    </div>
                    <div class="team-lead_content">
                        <p class="team-lead_name">
                            <?= ($i == 0) ? $page_myspa_team_core_team['full_name'] : $page_myspa_team_core_team['full_name_' . $i] ?>
                        </p>
                        <p class="team-lead_position">
                            <?= ($i == 0) ? $page_myspa_team_core_team['position'] : $page_myspa_team_core_team['position_' . $i] ?>
                        </p>
                    </div>
                </li>
                <?php } ?>
            </ul>

            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="team-lead_bottom">
                <img src="<?= base_url(); ?>assets/frontend/images/about_v2/dots.svg" alt="">
                <p class="lead-bottom_title"><?= $page_vc_and_investor_title ?></p>
                <img src="<?= base_url(); ?>assets/frontend/images/about_v2/next100.png" alt="">
                <p class="lead-bottom_text"><?= $page_vc_and_investor_inverstor_name ?></p>
                <p><?= $page_vc_and_investor_inverstor_subtitle ?></p>
            </div>

        </div>
    </section>
    <!-- close about team -->

    <!-- about software -->
    <section class="about-software">
        <div class="about-software_container">
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-title">
                <div class="about-title_img">
                    <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                </div>
                <h2 class="about-title_text"><?= $page_achievement_section_title ?><p
                        style="color:#7161ba; display:inline-block">My<span style="color: #7fc128">spa</span></p>
                </h2>
            </div>
            <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-software_total-wrap">
                <div class="solftware-total_img">
                    <img src="<?= base_url(); ?>assets/frontend/images/about_v2/about-software-img.png" alt="">
                </div>
                <div class="software-total_list">
                    <?php for ($i = 1; $i <= 3; $i++) {
                    ?>
                    <div class="software-totle_item">
                        <div class="total-item_img">
                            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/unicon.png" alt="">
                        </div>
                        <div class="total-item_quantity">
                            <span><?= $page_achievement_section_counting['number_' . $i] ?></span>
                            <img src="<?= base_url(); ?>assets/frontend/images/about_v2/+.svg" alt="">
                        </div>
                        <div class="total-item_desc">
                            <span>
                                <?= $page_achievement_section_counting['content_number_' . $i] ?>
                            </span>
                        </div>

                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-sortware_gallery">
            <div class="sortware-gallery_left">
                <div class="gallery-left_title">
                    <div class="title-myspa">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                        <p>My<span>spa</span></p>
                    </div>
                    <h2 class="gallery-left_text">
                        <p><?= $page_active_section_title ?></p>
                    </h2>
                </div>

                <div class="gallery-left_select">
                    <div data-tab="0" class="left-select_item select-active">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/line-gallery.png" alt="">
                        <p><?= $page_active_section_coOperating_title ?></p>
                    </div>
                    <div data-tab="1" class="left-select_item">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/line-gallery.png" alt="">
                        <p><?= $page_active_section_event_and_workshop_title ?></p>
                    </div>
                    <div data-tab="2" class="left-select_item">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/line-gallery.png" alt="">
                        <p><?= $page_active_section_favourite_events_title ?></p>
                    </div>

                </div>
            </div>
            <div class="sortware-gallery_right">
                <div class="carousel-software carousel-main" data-flickity>
                    <div class="carousel-cell w-100">
                        <div class="caption1" style="display:none">
                            <h4><?= $page_active_section_coOperating_title ?></h4>
                        </div>
                        <div class="caption2" style="display:none">
                            <h4><?= $page_active_section_event_and_workshop_title ?></h4>
                        </div>
                        <div class="caption3" style="display:none">
                            <h4><?= $page_active_section_favourite_events_title ?></h4>
                        </div>
                        <div id="lightgallery" class="gallery-right_list">

                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <a data-sub-html=".caption1" class="gallery-right_item"
                                href="<?= $page_active_section_coOperating['image_url_' . $i] ?>">
                                <img class="img-thumbnail"
                                    src="<?= $page_active_section_coOperating['image_url_' . $i] ?>" alt="">
                            </a>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="carousel-cell w-100">
                        <div id="lightgallery2" class="gallery-right_list">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <a data-sub-html=".caption2" class="gallery-right_item"
                                href="<?= $page_active_section_event_and_workshop['image_url_' . $i] ?>">
                                <img class="img-thumbnail"
                                    src="<?= $page_active_section_event_and_workshop['image_url_' . $i] ?>" alt="">
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="carousel-cell w-100">
                        <div id="lightgallery3" class="gallery-right_list">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <a data-sub-html=".caption3" class="gallery-right_item"
                                href="<?= $page_active_section_favourite_events['image_url_' . $i] ?>">
                                <img class="img-thumbnail"
                                    src="<?= $page_active_section_favourite_events['image_url_' . $i] ?>" alt="">
                            </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </section>
    <!-- close about software -->

    <!-- about join -->
    <section class="about-join">
        <div class="about-join_overlay">
            <div class="about-join_container">
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s" class="about-join_left">
                    <div class="join-left_title">
                        <img src="<?= base_url(); ?>assets/frontend/images/about_v2/-.svg" alt="">
                        <h2 class="join-left_text"><?= $page_join_with_us_title ?></h2>
                        <div class="join-left_desc">
                            <?= $page_join_with_us_description ?>
                        </div>
                    </div>
                </div>
                <div data-scroll-reveal="enter bottom move 60px over 0.9s after 0.5s" class="about-join_right">
                    <h3><?= $page_join_with_us_form_tiitle ?></h3>
                    <?= form_open(base_url() . 'Frontend/investment', ["class" => "jojn-right_form"]); ?>
                    <div class="join-wrap_input">
                        <input required placeholder="Quỹ đầu tư" type="text" name="fund" id="fund">
                        <span class="error-text">error</span>
                    </div>
                    <div class="join-wrap_input">
                        <input name="nationality" id="nationality" placeholder="Quốc tịch (nếu có)" type="text">
                        <span class="error-text">error</span>
                    </div>
                    <div class="join-wrap_input">
                        <input name="address" id="address" required placeholder="Địa chỉ" type="text">
                        <span class="error-text">error</span>
                    </div>
                    <div class="join-wrap_input">
                        <input name="email" id="email" required placeholder="Email" type="text">
                        <span class="error-text">error</span>
                    </div>
                    <div class="join-wrap_input">
                        <input name="telephone" id="telephone" required placeholder="Điện thoại" type="text">
                        <span class="error-text">error</span>
                    </div>
                    <input type="hidden" id="g-recaptcha-response" name="g_recaptcha_response" />
                    <input type="hidden" id="action" name="action" />
                    <button data-toggle="modal" data-target="#exampleModalLong" class="join-btn_submit"
                        type="button">Gửi</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>

    </section>
    <!-- close about join -->

    <!-- modal success -->
    <div id="modal-success_join" class="modal fade" tabindex="-1" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-join_content">
                <div class="modal-join_header">
                    <div class="modal-join_title">
                        <h3>Thông báo</h3>
                    </div>
                </div>
                <div class="modal-join_body">
                    <p>Đăng ký thành công</p>
                </div>
                <div class="modal-join_btn">
                    <button data-dismiss="modal" type='button'>Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- close modal success -->

</div>
<!-- close body -->

<!-- footer -->
<?= $this->footer_frontend(); ?>
<!-- close footer -->
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/header-anime.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/particles.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/particles-stats.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/lightgallery-all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollReveal.js"></script>
<script type="text/javascript"
    src="<?= base_url(); ?>assets/frontend/js/about-v2.js?v=19<?= $this->config->item('version'); ?>"></script>
<script  type="text/javascript">
    const RECAPTCHA_V3_SITE_KEY = '<?= env('RECAPTCHA_V3_SITE_KEY'); ?>';
</script>