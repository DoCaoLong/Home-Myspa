<?php
$meta['title'] = isset($title) ? $title : 'Myspa - Giải pháp số hóa Spa, Salon tóc, Tiệm Nails, Clinic, Thẩm mỹ viện';
$meta['description'] = isset($meta_description) ? $meta_description : 'Phần mềm quản lý Spa, Thẩm mỹ viện, Salon chuyên nghiệp với tính năng quản lý thông tin khách hàng, crm, chăm sóc khách hàng, quản lý spa online nhiều chi nhánh, quản lý thu chi… giúp chủ spa đột phá doanh thu.';
$meta['keywords'] = isset($meta_keywords) ? $meta_keywords : 'phần mềm quản lý spa, phan mem quan ly spa, phần mềm quản lý salon, phần mềm spa, phần mềm quản lý spa online, phần mềm quản lý spa chuyên nghiệp, phần mềm quản lý Thẫm Mỹ Viện, phần mềm quản lý Clinic, phần mềm quản lý thu chi spa, myspa';
$meta['og:image'] = isset($og_image) ? $og_image : base_url() . 'assets/frontend/images/phanmem-myspa.jpg';
if (isset($pageID)) {
    $res = fetch('https://myspa.vn/blog/index.php/wp-json/wp/v2/pages/' . $pageID . '/?_fields=acf%2Cyoast_head%2Cyoast_head_json', [], ['Content-Type:application/json'], 'GET');
    if (isset($res['yoast_head_json'])) {
        $_SESSION['page_content'] = $res['acf'];
        if (isset($res['yoast_head_json']['title'])) $meta['title'] = $res['yoast_head_json']['title'];
        if (isset($res['yoast_head_json']['description'])) $meta['description'] = $res['yoast_head_json']['description'];
        if (isset($res['yoast_head_json']['og_image'])) $meta['og:image'] = $res['yoast_head_json']['og_image'];
    }
}
if (isset($postID)) {
    $res = fetch('https://myspa.vn/blog/index.php/wp-json/wp/v2/posts/' . $postID . '/?_fields=acf%2Cyoast_head%2Cyoast_head_json', [], ['Content-Type:application/json'], 'GET');
    if (isset($res['yoast_head_json'])) {
        $_SESSION['post_content'] = $res['acf'];
    }
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="vi"> <![endif]-->
<!--[if gt IE 8]>
<!-->
<html class="no-js" lang="vi">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="mgFoeZ3m3TAfmJGt5WkXhf2Cw3wdLacwleWR0bs6H6g" />
    <meta name="description" content="<?= $meta['description']; ?>">
    <meta name="keywords" content="<?= $meta['keywords']; ?>" />
    <link rel="canonical" href="<?= $actual_link; ?>">
    <title><?= $meta['title']; ?></title>
    <meta name="author" content="MYSPA JSC">
    <meta property="og:title" content="<?= $meta['title']; ?>">
    <meta property="og:site_name" content="Myspa">
    <meta property="og:url" content="https://myspa.vn/">
    <meta property="og:description" content="<?= $meta['description']; ?>">
    <meta property="og:image" content="<?= base_url(); ?><?= $meta['og:image']; ?>">
    <meta property="og:image:secure_url" content="<?= base_url(); ?><?= $meta['og:image']; ?>" />
    <meta property="og:type" content=website>
    <meta property="og:image:width" content="1052" />
    <meta property="og:image:height" content="550" />
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="facebook-domain-verification" content="uzxkoruy86h6bt8p356plepohjefi4" />
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/frontend/images/favicon.png">
    <script defer type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    function loadScript({
        src,
        isAsync
    }) {
        // console.log('load',{src,isAsync});
        let script = document.createElement('script');
        script.src = src;
        script.async = isAsync;
        document.body.append(script);
    }
    </script>
    <!-- Google Tag Manager -->
    <script defer>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P3KD9F3');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Facebook Pixel Code -->
    <script defer>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '375252989917051');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=375252989917051&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- CSS
  ================================================== -->
    <!-- Latest compiled and minified CSS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery-2.1.1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,900"
        crossorigin="anonymous" />
    <!-- css for landing page  --> <?php
    if (isset($link)) {
        foreach ($link as $i) {
    ?>
    <link rel="preload" href="<?= base_url(); ?><?= $i; ?>?v=19<?= $this->config->item('version'); ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?= base_url(); ?><?= $i; ?>?v=19<?= $this->config->item('version'); ?>"
            type="text/css">
    </noscript> <?php
        }
    } ?>
    <!-- end css for landing page  --> <?php if ($page_id == 'brand_app_pricing') { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/frontend/css/layout.css?v=19<?php echo $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/quicksan/stylesheet.css" type="text/css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/price_app.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/landing-myspa.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php }
        
    if ($page_id == 'home_v2')  { ?>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/quicksan/stylesheet.css" type="text/css" />
    <?php } else { ?> <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/lazy-load.js">
    </script>
    <!-- Check for momo Layout -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/index.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php if (isset($demo)) { ?>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/owl.carousel_v2.4.min.css" type="text/css" />
    <?php } ?> <?php if ($page_id == 'home_demo') { ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/home.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php } ?> <?php if ($page_id == 'about') { ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/about.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php } ?> <?php if ($page_id == 'about_we') { ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/about-we.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php } ?> <?php if ($page_id == 'pricing') { ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/main/price.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php } ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/base.min.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/skeleton.min.css" type="text/css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/layout.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/custom.css?v=1<?= $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/landing-myspa.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/ionicons.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/retina.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/owl.carousel_v2.4.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/quicksan/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.8.3/dist/css/lightgallery.min.css"
        type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>bower_components/simple-line-icons/css/simple-line-icons.min.css"
        type="text/css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&subset=latin-ext"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,900"
        crossorigin="anonymous" /> <?php if ($page_id == 'landing_page_beauty_ecosystem') { ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/beauty-platform.css?v=19<?= $this->config->item('version'); ?>"
        type="text/css" /> <?php } ?>
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/frontend/css/colors/color-purple.css?v=19<?= $this->config->item('version'); ?>" />
    <?php } ?>
    <link rel="preload"
        href="<?= base_url(); ?>assets/frontend/css/main/partial.css?v=19<?= $this->config->item('version'); ?>"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="<?= base_url(); ?>assets/frontend/css/main/partial.css?v=19<?= $this->config->item('version'); ?>"
            type="text/css">
    </noscript>
    <link rel="preload"
        href="<?= base_url(); ?>assets/frontend/css/pop-up.css?v=19<?= $this->config->item('version'); ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="<?= base_url(); ?>assets/frontend/css/pop-up.css?v=19<?= $this->config->item('version'); ?>"
            type="text/css">
    </noscript>
    <!-- <script src="https://www.google.com/recaptcha/api.js?render=<?= env('RECAPTCHA_V3_SITE_KEY'); ?>"></script> -->
</head>

<body class="royal_preloader">
    <div id="royal_preloader"></div>