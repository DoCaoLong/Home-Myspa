<!-- Header -->
<?php $this->load->view('frontend/partial/nav_bar'); ?>
<!-- Close Header -->
<div class="event-viet-korea">
    <img class="form-event_img-mb" alt="" src="<?php echo base_url(); ?>assets/frontend/images/popup/logo-myspa.png">
    <div oncLick="openPopup()" class="form-event-submit top">
        <button type="button">
            Đăng ký ngay
        </button>
    </div>
    <div class="form-event_wrap">
        <div class="form-event_box">
            <img class="form-event_img" alt=""
                src="<?php echo base_url(); ?>assets/frontend/images/popup/logo-myspa.png">
            <div class="form-event_header">
                <p class="form-event_title">
                    Đăng ký tham gia
                </p>
            </div>
            <p class="form-event_text">
                Thông tin liên hệ
            </p>
            <form class="form-event">
                <div class="input-wrap">
                    <input required id="pop_up_name" type="text" placeholder="Họ và tên">
                </div>
                <div class="input-wrap">
                    <input id="pop_up_phone" type="text" placeholder="Số điện thoại">
                </div>
                <div class="input-wrap">
                    <input id="pop_up_business_name" type="text" placeholder="Doanh nghiệp">
                </div>
                <div class="input-wrap">
                    <select id="pop_up_select" class="form-select" aria-label="Default select example">
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
                    <button  type="button" class="form-event_btn submit-form">Đăng ký
                        ngay</button>
                </div>
            </form>
        </div>

    </div>
    <img alt="" class="image-size" src="<?php echo base_url(); ?>assets/frontend/images/event/event-viet-han.jpg"
        alt="DANG-KI-VIET-KOREA">
    <div class="form-event-submit">
        <button onclick="openPopup()" type="button">
            Đăng ký ngay
        </button>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="popup_combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button onclick="closePopup()" type="button" class="close btn-close" data-dismiss="modal"
                aria-label="Close"> <img src="<?php echo base_url(); ?>assets/frontend/images/icon/cancel-icon.svg"
                    alt="icon"></button>
            <div class="modal-body text-center">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <?php $this->CI->load->view('frontend/partial/viet_korea_register'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CLOSE MODAL -->

<!-- footer -->
<?= $this->footer_frontend(); ?>
<!-- close footer -->

<!-- JS -->
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript">
Royal_Preloader.config({
    mode: 'scale_text',
    text: 'm y s p a . v n',
    text_colour: '#FFFFFF',
    background: '#7161BA'
});

const closePopup = () => {
    $('#popup_combo').modal('hide');
}
const openPopup = () => {
    $('#popup_combo').modal('show');
    $('#popup_combo').css('display', 'flex');
}
$(function() {
    // setTimeout(function() {
    //     $('#popup_combo').modal('show');
    //     $('#popup_combo').css('display', 'flex');
    // }, 3000);
    $('#send').on('click', function() {
        $('#popup_combo').remove();
    })
});
</script>