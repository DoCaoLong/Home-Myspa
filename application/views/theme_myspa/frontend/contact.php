<script>
gtag('event', 'page_view', {
    'send_to': 'AW-939421348',
    'dynx_itemid': '005',
    'dynx_pagetype': 'contact',
    'user_id': '153935109'
});
</script>
<!-- MENU
================================================== -->
<?php echo $this_controller->nav_bar_frontend(); ?>



<!-- Primary Page Layout
================================================== -->


<div class="section-block padding-top-page">
    <div class="container page-title">
        <div class="twelve columns">
            <!-- <div class="text-up">hỗ trợ</div> -->
            <h3>Giải đáp thắc mắc</h3>
            <p>Hãy để lại lời nhắn, chúng tôi sẽ phản hồi lại cho bạn sớm nhất có thể. Hoặc gọi vào số hotline: <a
                    href="tel:0343131003">034 3131 003</a>, chúng tôi rất vui được giải đáp mọi thắc mắc của bạn.</p>
        </div>
    </div>
</div>
<div class="section-block padding-top-small padding-bottom">
    <div class="container form-contact">
        <div name="" id="ajax-form">
            <div class="three columns">
                <input name="name" id="name" type="text" placeholder="Họ Tên " />
            </div>
            <div class="three columns">
                <input name="email" id="email" type="text" placeholder="Email " />
            </div>
            <div class="three columns">
                <input name="phone" id="phone" type="text" placeholder="Phone* " />
            </div>
            <div class="clear"></div>
            <div class="nine columns remove-top">
                <textarea name="message" id="message" placeholder="Lời nhắn"></textarea>
            </div>
            <div class="clear"></div>
            <div class="six columns remove-top">
                <div id="button-con"><button
                        class="send_message button-effect button--moema button--text-thick button--text-upper button--size-s">Gởi</button>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="section-block" data-scroll-reveal="enter bottom move 60px over 0.9s after 0.1s">
    <div id="cd-google-map">
        <div id="google-container"></div>
        <div id="cd-zoom-in"></div>
        <div id="cd-zoom-out"></div>
        <div class="company-info text-left">
            <h6 class="text-white">CÔNG TY CỔ PHẦN MYSPA</h6>
            <p>&nbsp;</p>
            <a href="tel:0343131003">
                <p><i class="icon icon-call-end"></i>&nbsp;&nbsp;034 3131 003</p>
            </a>
            <a href="mailto:sales@myspa.vn">
                <p><i class="icon icon-envelope"></i>&nbsp;&nbsp; sales@myspa.vn</p>
            </a>
            <a href="mailto:support@myspa.vn">
                <p><i class="icon icon-envelope"></i>&nbsp;&nbsp; support@myspa.vn</p>
            </a>
            <p>&nbsp;</p>
            <p><i class="glyphicon glyphicon-map-marker"></i> Office: Lầu 2,
                117 - 119 Trần Nguyên Đán, Phường 3, Bình Thạnh, Thành phố Hồ Chí Minh</p>

        </div>

        <iframe style="position: absolute;inset: 0"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.190538040723!2d106.69237779999999!3d10.7967141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529fceff2aaf3%3A0x7e28a5ed03b202f3!2zMTE3IFRy4bqnbiBOZ3V5w6puIMSQw6FuLCBQaMaw4budbmcgMywgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1668591536491!5m2!1svi!2s"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?php echo $this->footer_frontend(); ?>
<!-- JAVASCRIPT
================================================== -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/retina.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/header-anime.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/tipper.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/letters.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrolltoid.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scrollReveal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.chaffle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/owlCarousel.js"></script>
<script type="text/javascript"
    src="<?php echo base_url(); ?>assets/frontend/js/contact.js?v=<?php echo $this->config->item('version'); ?>">
</script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfxBgfHh5HeBw2kVRcpgxgG4lswl50jTg"></script> -->

<!-- Custom JavaScript
================================================== -->
<script type="text/javascript"
    src="<?php echo base_url(); ?>assets/frontend/js/custom-contact.js?v=<?php echo $this->config->item('version'); ?>">
</script>

<!-- End Document
================================================== -->

<script type="text/javascript">
$(function() {
    $('.send_message').click(function() {
        contact();
    });
});

function contact() {
    if ($.trim($('#phone').val()) == '') {
        $('#phone').focus();
        return false;
    } else {
        $('.send_message').attr('disabled', 'disabled');
        $('.send_message').empty().append('Đang gởi...');
        $.ajax({
            url: "<?php echo base_url() ?>Frontend/add_contact",
            type: "post",
            dataType: 'json',
            data: {
                ct_name: $('#name').val(),
                ct_mobile: $('#phone').val(),
                ct_email: $('#email').val(),
                ct_message: $('#message').val(),
                ct_type: 'contact'
            },
            success: function(data) {
                $('.send_message').removeAttr('disabled');
                $('.send_message').empty().append('Gởi');
                if (typeof(data) == 'object') {
                    if (data.status == 'ok') {
                        $('.form-contact').empty().append(
                            '<br><h2 class="text-purple text-center">Thank you <i class="icon icon-check text-lg"></i></h2><br><p class="text-center">' +
                            data.message + '<br><br></p>');
                    } else {
                        $('.form-contact').empty().append(
                            '<br><h2 class="text-danger text-center">Thất bại <i class="icon icon-ban text-lg"></i></h2><br><p class="text-center">' +
                            data.message + '<br><br></p>');
                    }
                }
            }
        });
    }
    return false;
}
</script>