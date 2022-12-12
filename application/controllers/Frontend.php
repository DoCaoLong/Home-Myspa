<?php

class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('mcontact', 'mnotification', 'mnotification_user', 'muser_group', 'muser'));
        $this->load->helper(array('lib_helper', 'form'));
        $this->load->event('SendContactSlack');
        $this->load->event('SendInvestmentSlack');
        $this->load->event('Send30Year');
        $this->load->database();
    }

    //     public function eventVietKorea()
    // {
    //     $data['title'] = 'Sự kiện ngành làm đẹp lớn nhất “Việt Nam Korea Beauty 2022';
    //     $data['page_id'] = 'eventVietKorea';
    //     $data['register_type'] = '';
    //     $data['og_image'] = null;
    //     $data['meta_keywords'] = 'Sự kiện ngành làm đẹp Việt Hàn Korea 2022, Sự kiện ngành làm đẹp lớn nhất 2022';
    //     $data['meta_description'] = 'Sự kiện làm đẹp danh giá đẳng cấp nhất 2022 được tổ chức tại Việt Nam nhằm kỷ niệm 30 năm ngoại giao Việt - Hàn';
    //     $data['link'] = [
    //         'assets/frontend/css/event-viet-korea.css',
    //     ];
    //     $this->load->template_frontend('eventVietKorea', $data);
    // }

        public function index()
    {

        $data['count_register'] = $this->mcontact->count_register();
        $data['title'] = 'Myspa - Giải pháp số hóa Spa, Salon tóc, Tiệm Nails, Clinic, Thẩm mỹ viện';
        $data['page_id'] = 'home';
        $data['layout'] = true;
        $data['meta_keywords'] = 'myspa, myspa vn, my spa, phần mềm myspa';
        $data['meta_description'] = 'Myspa.vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['og_image'] = "assets/frontend/images/main/homepage/og-image/og-image.jpg";
        $data['register_type'] = '';
                $this->load->template_frontend('home', $data);
    }
    public function about()
    {
        $data['title'] = 'Về Myspa ';
        $data['page_id'] = 'about';
        $data['register_type'] = '';
        $data['og_image'] = null;
        $data['meta_keywords'] = 'Myspa vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['meta_description'] = 'Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.';
        $data['pageID'] = 13; //fetch page content from wordpress
        $data['link'] = [
            'assets/frontend/css/main/about_v2.css',
            'assets/frontend/css/flickity.css',
        ];
        $this->load->template_frontend('about_v2', $data);
    }

    public function recruit()
    {
        $data['title'] = 'Tuyển dụng - Số hóa khởi tạo thành công';
        $data['page_id'] = 'recruit';
        $data['register_type'] = '';
        $data['og_image'] = null;
        $data['meta_keywords'] = 'Myspa vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['meta_description'] = 'Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.';
        $data['pageID'] = 16701; //fetch page content from wordpress
        $data['link'] = [
            'assets/frontend/css/flickity.css',
            'assets/frontend/css/main/recruit.css'
        ];
        $this->load->template_frontend('recruit', $data);
    }

    public function job()
    {
        $data['title'] = 'Việc làm - Số hóa khởi tạo thành công';
        $data['page_id'] = 'job';
        $data['register_type'] = '';
        $data['og_image'] = null;
        $data['meta_keywords'] = 'Myspa vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['meta_description'] = 'Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.';
        $data['link'] = [
            'assets/frontend/css/main/job.css',
        ];
        $this->load->template_frontend('job', $data);
    }

    public function job_detail($id)
    {
        $data['title'] = 'Chi tiết việc làm - Số hóa khởi tạo thành công';
        $data['page_id'] = 'job_detail';
        $data['register_type'] = '';
        $data['og_image'] = null;
        $data['meta_keywords'] = 'Myspa vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['meta_description'] = 'Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.';
        $data['postID'] = $id;
        $data['link'] = [
            'assets/frontend/css/main/job-detail.css',
        ];
        $this->load->template_frontend('job-detail', $data);
    }

    public function about_we()
    {
        $data['title'] = 'Về chúng tôi - Số hóa khởi tạo thành công';
        $data['page_id'] = 'about_we';
        $data['register_type'] = '';
        $data['og_image'] = null;
        $data['meta_keywords'] = 'Myspa vn Công ty hàng đầu về giải pháp quản lý, CSKH, app thương hiệu chuyên nghiệp cho 5000+ đơn vị spa, salon, nails, TMV trên toàn quốc';
        $data['meta_description'] = 'Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.';
        $data['link'] = [
            'assets/frontend/css/flickity.css',
            'assets/frontend/css/main/about-we.css'
        ];
        $this->load->template_frontend('about_we', $data);
    }

    public function software()
    {
        $data['title'] = 'Phần mềm quản lý Spa, Salon, Thẩm Mỹ Viện, Clinic chuyên nghiệp số 1 Việt Nam | MYSPA';
        $data['page_id'] = 'software';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('software', $data);
    }

    public function product()
    {
        $data['title'] = 'Sản phẩm phần cứng cung cấp bởi MYSPA';
        $data['page_id'] = 'product';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('product', $data);
    }

    public function blog()
    {
        $data['title'] = 'Cập nhật tin tức, ý kiến chuyên gia hay câu chuyện kinh doanh thực tế từ các chủ doanh nghiệp Spa, Salon, Thẩm mỹ viện, Clinic, Nail, Phòng xăm | MYSPA';
        $data['page_id'] = 'blog';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('blog', $data);
    }
    public function pricing()
    {
        $data['title'] = 'Bảng giá sử dụng phần mềm quản lý bán hàng MYSPA';
        $data['page_id'] = 'pricing';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('pricing', $data);
    }
    public function lienhe()
    {
        $data['title'] = 'Thông tin liên hệ, hỗ trợ giải đáp mọi thắc mắc của Quý khách hàng';
        $data['page_id'] = 'contact';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('contact', $data);
    }

    public function term_condition()
    {
        $data['title'] = 'Điều khoản sử dụng phần mềm MYSPA';
        $data['page_id'] = 'term_condition';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('term_condition', $data);
    }

    public function guide()
    {
        $data['title'] = 'Hướng dẫn sử dụng phần mềm MYSPA';
        $data['page_id'] = 'guide';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('guide', $data);
    }

    public function thankyou()
    {
        $data['title'] = 'Thank you for register!';
        $data['page_id'] = 'thankyou';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('thankyou', $data);
    }

    public function sale_ad() // page sale advertising 15/10/2019
    {
        $data['title'] = 'Ưu đãi lớn nhất trong năm';
        $data['page_id'] = 'sale';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('sale', $data);
    }

    public function sale() // page sale advertising 25/05/2021
    {
        $data['count_register'] = $this->mcontact->count_register();
        $data['title'] = 'Chương trình trợ giá lớn nhất trong năm';
        $data['page_id'] = 'software';
        $data['register_type'] = '';
        $data['meta_keywords'] = 'giải pháp số hóa spa, giải pháp số hóa salon tóc, giải pháp số hóa ngành làm đẹp, số hóa ngành làm đẹp, giải pháp số hóa tiệm nails';
        $data['meta_description'] = null;
        $data['og_image'] = null;
        $this->load->template_frontend('sale93', $data);
    }

    public function get_count_register()
    {
        $data['count_register'] = $this->mcontact->count_register();
        // echo json_encode($data);
        // return $data;
    }
    // ==============================================//
    /* ==============  Reboot all page ==============*/

    public function index_demo()
    {
        $data['count_register'] = $this->mcontact->count_register();
        $data['title'] = 'Phần mềm quản lý Spa, Salon, Thẩm Mỹ Viện, Clinic chuyên nghiệp số 1 Việt Nam | MYSPA';
        $data['page_id'] = 'home_demo';
        $data['meta_keywords'] = 'giải pháp số hóa spa, giải pháp số hóa salon tóc, giải pháp số hóa ngành làm đẹp, số hóa ngành làm đẹp, giải pháp số hóa tiệm nails.';
        $data['meta_description'] = "Giải pháp số hóa Spa, Salon tóc, Tiệm nails, Clinic, Thẩm mỹ viện giúp vận hành trở nên đơn giản và chuyển mình lên kinh doanh online nhờ chuyển đổi số từ myspa. Hơn +5000 doanh nghiệp đã tin và sử dụng.";
        $data['register_type'] = '';
        $data['demo'] = true;
        $data['og_image'] = null;
        $this->load->template_frontend('home_demo', $data);
    }

    public function about_demo()
    {
        $data['count_register'] = $this->mcontact->count_register();
        $data['title'] = 'Về Myspa - Số hóa khởi tạo thành công';
        $data['page_id'] = 'about_demo';
        $data['meta_keywords'] = 'về myspa, myspa, giới thiệu về myspa, giới thiệu myspa phần mềm myspa, phần mềm quản lý myspa';
        $data['meta_description'] = "Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.";
        $data['register_type'] = '';
        $data['demo'] = true;
        $data['og_image'] = null;
        $this->load->template_frontend('about_demo', $data);
    }

    public function pricing_demo()
    {
        $data['count_register'] = $this->mcontact->count_register();
        $data['title'] = 'Về Myspa - Số hóa khởi tạo thành công';
        $data['page_id'] = 'price_demo';
        $data['meta_keywords'] = 'về myspa, myspa, giới thiệu về myspa, giới thiệu myspa phần mềm myspa, phần mềm quản lý myspa';
        $data['meta_description'] = "Giới thiệu về phần mềm quản lý myspa dành riêng cho salon, clinic, thẩm mỹ viện. Quản lý hiệu quả, chuyên nghiệp. Hơn 5000+ doanh nghiệp tin dùng và sử dụng.";
        $data['register_type'] = '';
        $data['demo'] = true;
        $data['og_image'] = null;
        $this->load->template_frontend('price_demo', $data);
    }
    public function brand_app_pricing()
    {
        $data['title'] = 'Bảng giá sử dụng phần mềm quản lý bán hàng MYSPA';
        $data['page_id'] = 'brand_app_pricing';
        $data['register_type'] = '';
        $data['meta_keywords'] = null;
        $data['meta_description'] = null;
        $data['is_momo'] = true;
        $data['og_image'] = null;
        $this->load->template_frontend('brand_app_pricing', $data);
    }
    /* ==============  End ==========================*/
    // Momo register
    public function momo_register()
    {
        $data['title'] = 'Bán hàng online trên app Momo - Tiếp cận hơn 25 triệu người dùng';
        $data['count_register'] = $this->mcontact->count_register();
        $data['page_id'] = 'momo_register';
        $data['meta_keywords'] = "Bán hàng online,Bán hàng online trên app Momo,Momo";
        $data['meta_description'] = 'Myspa ra mắt tính năng tích hợp đặt lịch hẹn và thanh toán qua ví điện tử Momo, hỗ trợ chủ doanh nghiệp chuyển mình lên kinh doanh online, đáp ứng xu hướng tiêu dùng mới của khách hàng sau dịch.';
        $data['register_type'] = 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO';
        $data['og_image'] = "assets/frontend/images/Thumbnails_landingpage_momo.jpg";
        $this->load->template_frontend('beautyx_register_page', $data);
    }
    public function marketing_register()
    {
        $data['title'] = 'Miễn phí bán hàng đa kênh trên Momo - Tiếp cận hơn 25 triệu người dùng';
        $data['count_register'] = $this->mcontact->count_register();
        $data['page_id'] = 'marketing_register';
        $data['meta_keywords'] = "Bán hàng online,Bán hàng online trên app Momo,Momo";
        $data['meta_description'] = 'Myspa ra mắt tính năng tích hợp đặt lịch hẹn và thanh toán qua ví điện tử Momo, tặng quay dựng, đăng bài truyền thông trên Facebook, Tiktok Myspa...cho doanh nghiệp tại TPHCM (Khi đã liên kết bán hàng trên Momo)';
        $data['register_type'] = 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO + QUAY DỰNG';
        $data['og_image'] = "assets/frontend/images/pop_up/momo_marketing_register.png";
        $this->load->template_frontend('marketing_register', $data);
    }
    // ============================================== //
    // Check in register
    public function checkin_register()
    {
        $data['title'] = 'MYSPA CHECK IN Check-in lịch hẹn';
        $data['count_register'] = $this->mcontact->count_register();
        $data['page_id'] = 'checkin_register';
        $data['meta_keywords'] = null;
        $data['meta_description'] = 'Myspa ra mắt MYSPA CHECK IN, Check-in lịch hẹn, Giúp khách hàng check-in nhanh chóng khi đến Spa, Salon, Nail, TMV. Tiết kiệm thời gian cho nhân viên chăm sóc khách hàng.';
        $data['register_type'] = 'ĐĂNG KÝ SỬ DỤNG MYSPA CHECK IN';
        $data['og_image'] = "assets/frontend/images/check-in.png";
        $this->load->template_frontend('checkin_register', $data);
    }
    // ============================================== //
    /* ==============  Landing page ============== */
    public function landing_myspa_redirect()
    {
        // redirect('phan-mem-quan-ly-spa#phan-mem');
        redirect('phan-mem-quan-ly-spa');
    }
    public function landing_myspa_redirect_phong_kham()
    {
        redirect('phan-mem-quan-ly-phong-kham');
    }
    public function landing_clinic_redirect()
    {
        redirect('phan-mem-quan-ly-phong-kham-tham-my-vien');
    }
    // public function landing_myspa()
    // {
    //     $data = array('title' => 'Phần mềm quản lý SPA Online số 1 hiện nay | Myspa');
    //     $data['count_register'] = $this->mcontact->count_register();
    //     $data['meta_keywords'] = 'phần mềm quản lý spa, phan mem quan ly spa, phần mềm spa, phần mềm quản lý spa online, phần mềm quản lý spa myspa.vn, phần mềm chăm sóc khách hàng spa, phần mềm tính tiền spa.';
    //     $data['meta_description'] = 'Phần mềm quản lý spa online hiệu quả Myspa.vn được 5000+ spa nổi tiếng tin dùng. Giải quyết vấn đề quản lý thu chi, lương thưởng, lịch hẹn, kho bãi,..';
    //     $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/phan-mem-quan-ly-spa/og-image.jpg";
    //     $data['page_id'] = 'landing_page_spa';
    //     $data['register_type'] = 'ĐĂNG KÝ PHẦN MỀM QUẢN LÝ SPA';
    //     $data['pageID'] = 16087; //fetch page content from wordpress
    //     $data['link'] = [
    //         'assets/frontend/css/landing_page/myspa.css',
    //         'assets/frontend/css/owl.carousel.min.css',
    //         'assets/fonts/quicksan/stylesheet.css',
    //         'bower_components/simple-line-icons/css/simple-line-icons.min.css'
    //     ];
    //     $this->load->template_frontend('landing_page/myspa', $data);
    // }
      public function landing_myspa()
    {
        $data = array('title' => 'Phần mềm quản lý SPA Online số 1 hiện nay | Myspa');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'phần mềm quản lý spa, phan mem quan ly spa, phần mềm spa, phần mềm quản lý spa online, phần mềm quản lý spa myspa.vn, phần mềm chăm sóc khách hàng spa, phần mềm tính tiền spa.';
        $data['meta_description'] = 'Phần mềm quản lý spa online hiệu quả Myspa.vn được 5000+ spa nổi tiếng tin dùng. Giải quyết vấn đề quản lý thu chi, lương thưởng, lịch hẹn, kho bãi,..';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/phan-mem-quan-ly-spa/og-image.jpg";
        $data['page_id'] = 'landing_page_spa';
        $data['register_type'] = 'ĐĂNG KÝ PHẦN MỀM QUẢN LÝ SPA';
        $data['pageID'] = 16087; //fetch page content from wordpress
        $data['link'] = [
            'assets/frontend/css/landing_page/myspa.css',
            'assets/frontend/css/owl.carousel.min.css',
            'assets/fonts/quicksan/stylesheet.css',
            'bower_components/simple-line-icons/css/simple-line-icons.min.css'
        ];
        $this->load->template_frontend('landing_page/myspa', $data);
    }
    public function landing_clinic()
    {
        $data = array('title' => 'Phần mềm quản lý phòng khám chuyên nghiệp số 1- Myspa');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'phần mềm quản lý phòng khám,phần mềm phòng khám,phần mềm quản lý phòng khám nha khoa,phần mềm quản lý phòng khám răng hàm mặt,phần mềm quản lý phòng khám thú y,giá phần mềm quản lý phòng khám,phần mềm quản lý chuỗi phòng khám nha khoa,phần mềm quản lý phòng khám mắt,phần mềm quản lý phòng khám sản phụ khoa,phần mềm quản lý phòng khám tư nhân,phần mềm quản lý phòng khám đa khoa,phần mềm quản lý phòng khám đông y,phần mềm quản lý phòng khám da liễu,phần mềm quản lý phòng khám tai mũi họng,phần mềm quản lý phòng khám nhỏ';
        $data['meta_description'] = '5000+ phòng khám nổi tiếng đang sử dụng phần mềm quản lý phòng khám chuyên nghiệp Myspa, tích hợp đa tính năng giúp chủ phòng khám tối ưu chi phí vận hành.';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/phan-mem-quan-ly-TMV-Clinic/og-image.jpg";
        $data['page_id'] = 'landing_page_clinic';
        $data['register_type'] = 'ĐĂNG KÝ PHẦN MỀM QUẢN LÝ THẨM MỸ VIỆN';
        $this->load->template_frontend('landing_page/clinic', $data);
    }
    public function landing_salon()
    {
        $data = array('title' => 'Phần mềm quản lý Salon Tóc chuyên nghiệp 2022 | Myspa');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'Phần mềm quản lý salon tóc, phan mem quan ly salon toc, phần mềm tính tiền tiệm tóc, phần mềm quản lý tiệm tóc, phần mềm quản lý salon tóc myspa.vn, phần mềm cho salon tóc.';
        $data['meta_description'] = 'Phần mềm quản lý salon tóc online Myspa được 5000+ đơn vị lớn nhỏ tin dùng. Tối ưu các vấn đề về lương, quản lý thu chi, lịch hẹn, khách hàng, kho bãi,... ';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/phan-mem-quan-ly-salon/og-image.jpg";
        $data['page_id'] = 'landing_page_salon';
        $data['register_type'] = 'ĐĂNG KÝ PHẦN MỀM QUẢN LÝ SALON TÓC';
        $this->load->template_frontend('landing_page/salon', $data);
    }
    public function landing_nail()
    {
        $data = array('title' => 'Phần mềm quản lý tiệm Nails online hiệu quả 2022 | Myspa');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'phần mềm quản lý tiệm nails, phan mem quan ly tiem nails, phần mềm quản lý nail, phần mềm quản lý cửa hàng nails, phần mềm tính tiền tiệm nail.';
        $data['meta_description'] = 'Phần mềm quản lý tiệm nails online chuyên nghiệp Myspa - Giúp tối ưu vận hành, tích hợp đa tính năng, lịch hẹn, hoa hồng, lương nhân viên, kho bãi....';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/phan-mem-quan-ly-tiem-nails/og-image.jpg";
        $data['page_id'] = 'landing_page_nail';
        $data['register_type'] = 'ĐĂNG KÝ PHẦN MỀM QUẢN LÝ TIỆM NAIL';
        $this->load->template_frontend('landing_page/nail', $data);
    }
    public function landing_app_design()
    {

        $data = array('title' => 'Dịch vụ thiết kế app chuyên nghiệp Spa, TMV, Salon | Myspa');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'thiết kế app, thiết kế app mobile, dịch vụ thiết kế app, thiết kế app thương hiệu, thiết kế app theo yêu cầu, thiết kế app spa, thiết kế app thẩm mỹ viện';
        $data['meta_description'] = 'Myspa.vn - Đơn vị cung cấp dịch vụ thiết kế app mobile thương hiệu chuyên nghiệp theo yêu cầu dành cho spa, salon, nails,.. với giá rẻ nhất hiện nay.';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/og-image.jpg";
        $data['page_id'] = 'landing_page_app_design';
        $data['register_type'] = 'ĐĂNG KÝ THIẾT KẾ PHẦN MỀM';
        $this->load->template_frontend('landing_page/app_design', $data);
    }
    public function landing_beauty_ecosystem()
    {

        $data = array('title' => 'MYSPA | Nền tảng kinh doanh ngành làm đẹp online cho spa, salon, clinic..');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'Nền tảng kinh doanh ngành làm đẹp, nền tảng kinh doanh cho spa, salon, clinic, kinh doanh ngành làm đẹp online.';
        $data['meta_description'] = 'Chỉ 01 ngày | Spa, Salon, Clinic kinh doanh online không cần sở hữu app hay web thương hiệu với nền tảng kinh doanh ngành làm đẹp online chuyên nghiệp myspa.';
        $data['og_image'] = "assets/frontend/images/Image-landing-page-tong-hop/og-url/";
        $data['page_id'] = 'landing_page_beauty_ecosystem';
        $data['register_type'] = 'ĐĂNG KÍ PHẦN MỀM QUẢN LÝ';
        $this->load->template_frontend('landing_page/beauty_ecosystem', $data);
    }
    public function landing_momo_connection()
    {

        $data = array('title' => 'MYSPA | Mở gian hàng trên BeautyX cho spa, salon, clinic..');
        $data['count_register'] = $this->mcontact->count_register();
        $data['meta_keywords'] = 'Momo, bán hàng trên momo, momo, clinic, kinh doanh ngành làm đẹp online., liên kết ví momo';
        $data['meta_description'] = 'Myspa ra mắt tính năng tích hợp đặt lịch hẹn và thanh toán qua ví điện tử Momo, hỗ trợ chủ doanh nghiệp chuyển mình lên kinh doanh online, đáp ứng xu hướng tiêu dùng mới của khách hàng sau dịch.';
        $data['og_image'] = "assets/frontend/images/Thumbnails_landingpage_momo.jpg";
        $data['page_id'] = 'landing_momo_connection';
        $data['register_type'] = 'ĐĂNG KÝ LIÊN KẾT VÍ MOMO';
        $data['link'] = [
            'assets/frontend/css/landing_page/myspa.css',
            'assets/frontend/css/owl.carousel.min.css',
            'assets/fonts/quicksan/stylesheet.css',
            'bower_components/simple-line-icons/css/simple-line-icons.min.css',
            'assets/frontend/css/main/momo_connection.css'
        ];
        $this->load->template_frontend('landing_page/momo_connection', $data);
    }
    /* ======================  End ======================*/

    public function get_data()
    {
        $status =  (object) array('success' => 'success', 'fail' => 'failed');
        try {
            $parts = parse_url($this->input->server('REQUEST_URI'));
            parse_str($parts['query'], $query);
            // dd($query);
            $res = fetch($query['uri'], [], ['Content-Type:application/json'], 'GET');

            if ($res) {
                $arr = array('res' => strval($res), 'status' => $status['success']);
                echo json_encode($arr);
            } else {
                $arr = array('res' => null, 'status' => $status['fail']);
                echo json_encode($arr);
            }
        } catch (Exception $err) {
            // echo json_encode(
            $arr = array('res' => strval($err), 'status' => $status['fail']);
            echo json_encode($arr);
            // echo $arr;
        }
    }
    // Add Contact
    public function add_contact()
    {
        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $ct_type = cleanupentries($this->input->post('ct_type'));
        $ct_name = cleanupentries($this->input->post('ct_name'));
        $ct_mobile = cleanupentries($this->input->post('ct_mobile'));
        $ct_email = cleanupentries($this->input->post('ct_email'));
        $ct_message = cleanupentries($this->input->post('ct_message'));

        //check spam
        $content_check = $ct_type . $ct_name . $ct_mobile . $ct_email . $ct_message;
        if (!$this->check_nospam($from_ip, $content_check)) return;
        //end check

        $create_date = date('Y-m-d H:i:s');

        $data['name']       = $ct_name;
        $data['mobile']     = $ct_mobile;
        $data['email']      = $ct_email;
        $data['message']    = $ct_message;
        $data['readed']     = 0;
        $data['type']       = $ct_type;
        $data['created_date']  = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);

        if (is_numeric($reference_id) && $reference_id >= 0) {
            $message = 'Cám ơn bạn, chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần';

            //Notification
            $notification = array(
                'title'         => $ct_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            //$this->mnotification->add_data($notification);

            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }

            //end insert notification


            //EMAIL
            $title = $ct_name . ' đã liên hệ Myspa.vn';
            $email_content      = $ct_name . ' đã liên hệ.<br>Email: ' . $ct_email . '<br>Số điện thoại: ' . $ct_mobile . '<br>Nội dung: ' . $ct_message . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            $list = array('contact@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                sendMail($list, $title, $email_content);
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }

            if ($ct_email != '') {
                $list = array($ct_email);
                try {
                    //Send email to customer
                    $title_customer = 'Cảm ơn ' . $ct_name . ' đã để lại lời nhắn';
                    $email_customer = 'Dear ' . $ct_name . '.<br><br>Cảm ơn ' . $ct_name . ' đã để lại lời nhắn. Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.<br><br>Trân trọng,<br>MYSPA.VN TEAM';
                    sendMail($list, $title_customer, $email_customer);
                } catch (Exception $e) {
                    $message = 'Cannot send email to customer';
                    //return false;
                }
            }
            //END EMAIL

            $status = 'ok';

            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {
                slack($email_content, "thongbaoquantrong");
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }

        echo json_encode($arr = array('message' => $message, 'status' => $status));
    }
    // Close Contact

    // REGISTER
    public function register()
    {

        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];


        $reg_name = cleanupentries($this->input->post('reg_name'));
        $reg_phone = cleanupentries($this->input->post('reg_phone'));
        $reg_business_name = cleanupentries($this->input->post('reg_business_name'));
        $reg_business_add = cleanupentries($this->input->post('reg_business_add'));
        $reg_email = cleanupentries($this->input->post('reg_email'));

        $reg_discount_code = cleanupentries($this->input->post('reg_discount_code'));
        $reg_branch_amount = cleanupentries($this->input->post('reg_branch_amount'));

        //$reg_pass = cleanupentries($this->input->post('reg_pass'));
        $reg_type = cleanupentries($this->input->post('reg_type'));
        $reg_referral = cleanupentries($this->input->post('reg_referral'));

        switch ($reg_type) {
            case 'Gói 99k':
                $reg_type = TYPE_SALON;
                $reg_software = 'Gói 99k';
                break;
            case 'Gói Cơ Bản Tháng':
                $reg_type = TYPE_SOFTWARE;
                $reg_software = 'Gói Cơ Bản Tháng';
                break;
            case 'Gói Chuyên Nghiệp Tháng':
                $reg_type = TYPE_SOFTWARE;
                $reg_software = 'Gói Chuyên Nghiệp Tháng';
                break;
            case 'Gói Cao Cấp Tháng':
                $reg_type = TYPE_SOFTWARE;
                $reg_software = 'Gói Cao Cấp Tháng';
                break;
            default:
                break;
        }
        //check spam
        // $content_check = $reg_name.$reg_phone.$reg_business_name.$reg_business_add.$reg_email.$reg_type;
        //if (!$this->check_nospam($from_ip,$content_check)) return;
        //end check

        $reg_message = 'Business name: ' . $reg_business_name . '<br>Business address: ' . $reg_business_add . '<br>Type: ' . $reg_type . '<br>Referral: ' . $reg_referral;
        // $reg_message_2 =  "Business name: ".$reg_business_name."\nBusiness address: ".$reg_business_add."\nType: ".$reg_type."\nReferral: ".$reg_referral;

        $create_date = date('Y-m-d H:i:s');
        $data['name']       = $reg_name;
        $data['mobile']     = $reg_phone;
        $data['email']      = $reg_email;
        $data['message']    = isset($reg_software) ? $reg_software : '';
        $data['readed']     = 0;
        $data['type']       = 'Register';
        $data['referral']       = $reg_referral;
        $data['business_name']     = $reg_business_name;
        $data['business_address']  = $reg_business_add;
        $data['business_plan']  = $reg_type;
        $data['discount_code']     = $reg_discount_code;
        $data['branch_quantity']     = $reg_branch_amount;
        $data['created_date']   = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);

        // check captcha
        if (!$this->checkCaptcha()) {
            return;
        }
        function check_null($data)
        {
            // if ($data['name'] && $data['mobile'] &&  $data['email']&& $data['business_name'] && $data['created_date'] &&  $data['from_ip'] ){
            if ($data['mobile']) {
                return true;
            } else {
                return false;
            }
        }
        if (is_numeric($reference_id) && $reference_id >= 0 && check_null($data)) {
            //Notification
            $notification = array(
                'title'         => $reg_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            //$this->mnotification->add_data($notification);

            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }

            //end insert notification


            //EMAIL
            $title = $reg_name . ' đã đăng kí tạo tài khoản';
            $email_content      = $reg_name . ' đã đăng kí tạo tài khoản.<br>Email: ' . $reg_email . '<br>Số điện thoại: ' . $reg_phone . '<br>Nội dung: ' . $reg_message . '<br> Dịch vụ:' . $reg_type . '<br>Mã Giảm Giá: ' . $reg_discount_code . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            $slack_msg = $reg_name." đã đăng kí tạo tài khoản.\nEmail: ".$reg_email."\nSố điện thoại: ".$reg_phone."\nNội dung: "."\nFrom IP: ".$from_ip."\nBrowser: ".$from_browser."\n\n";


            $list = array('contact@myspa.vn');
            // $list = array('khai@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                    'list' => $list, 'title' => $title, 'content' => $email_content
                ])));
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }

            if ($reg_email != '') {
                $list = array($reg_email);
                try {
                    //Send email to customer
                    $title_customer = 'Cảm ơn ' . $reg_name . ' đã đăng kí tạo tài khoản';
                    $email_customer = 'Dear ' . $reg_name . '.<br><br>Cảm ơn ' . $reg_name . ' đã đăng kí tạo tài khoản. Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.<br><br>Trân trọng,<br>MYSPA.VN TEAM';
                    run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                        'list' => $list, 'title' => $title_customer, 'content' => $email_customer
                    ])));
                } catch (Exception $e) {
                    $message = 'Cannot send email to customer';
                    //return false;
                }
            }
            //END EMAIL

            $status = 'ok';
                // $slack_channel = "bear-thug-life";
                // slack($slack_msg."\nTeam Sales vui lòng liên hệ trước "." (trong giờ hành chính) và note [".$reg_phone."-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!",$slack_channel);
            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {

                // $now = date('Y-m-d H:i:s');
                // $start_tmp = new DateTime($now);

                // date_sub($start_tmp, date_interval_create_from_date_string('-7 minutes'));
                // $end = date_format($start_tmp, 'H:i:s m/d/Y');
                // $slack_channel = "bear-thug-life";


                // slack($slack_msg."\nTeam Sales vui lòng liên hệ trước "." (trong giờ hành chính) và note [".$reg_phone."-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!",$slack_channel);

                Events::trigger('SendContactSlack::sendSlack', [
                    'contact_id' => $reference_id,

                ]);
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }

        echo json_encode(['message' => $message, 'status' => $status]);
        return;
    }
    public function contact_momo()
    {
        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $reg_name = cleanupentries($this->input->post('reg_name'));
        $reg_phone = cleanupentries($this->input->post('reg_phone'));
        $reg_description = cleanupentries($this->input->post('reg_description'));
        $reg_email = cleanupentries($this->input->post('reg_email'));
        $reg_type = cleanupentries($this->input->post('reg_type'));
        $create_date = date('Y-m-d H:i:s');

        $reg_message = 'User name: ' . $reg_name . '<br>User message: ' . $reg_description . '<br>Type: ' . $reg_type;
        $reg_message_2 =  "User name: " . $reg_name . "\User message: " . $reg_description . "\nType: " . $reg_type;

        $data['name']       = $reg_name;
        $data['mobile']     = $reg_phone;
        $data['email']      = $reg_email;
        $data['type']       = 'Contact';
        $data['message']    = $reg_description;
        $data['created_date']   = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);
        if (is_numeric($reference_id) && $reference_id >= 0) {
            //Notification
            $notification = array(
                'title'         => $reg_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }
            //end insert notification

            // check captcha
            $reg_captcha = $this->input->post('reg_captcha');
            $reg_action = $this->input->post('reg_action');
            $validate_captcha = validate_captcha($reg_captcha, $reg_action);
            if (!$validate_captcha) {
                slack('Url: ' . base_url() . ' | Content: Captcha không hợp lệ', "warning");
                echo json_encode(['message' => 'Captcha không hợp lệ', 'status' => 'fail']);
                return;
            }
            //EMAIL
            $title = $reg_name . ' đã phản hồi trải nghiệm sử dụng mini app Myspa';
            $email_content      = $reg_name . ' đã phản hồi trải nghiệm sử dụng mini app Myspa.<br>Email: ' . $reg_email . '<br>Số điện thoại: ' . $reg_phone . '<br>Nội dung: ' . $reg_message . '<br> Dịch vụ:' . $reg_type . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            $slack_msg = $reg_name . " đã phản hồi trải nghiệm sử dụng mini app Myspa.\nEmail: " . $reg_email . "\nSố điện thoại: " . $reg_phone . "\nNội dung: " . $reg_message_2 . "\nFrom IP: " . $from_ip . "\nBrowser: " . $from_browser . "\n\n";


            $list = array('contact@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                    'list' => $list, 'title' => $title, 'content' => $email_content
                ])));
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }
            //END EMAIL
            $status = 'success';

            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {

                $now = date('Y-m-d H:i:s');
                $start_tmp = new DateTime($now);

                date_sub($start_tmp, date_interval_create_from_date_string('-7 minutes'));
                $end = date_format($start_tmp, 'H:i:s m/d/Y');

                slack($slack_msg . "\nTeam hỗ trợ khách hàng vui lòng liên hệ trước " . $end . " (trong giờ hành chính) và note [" . $reg_phone . "-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!", "dangky_momo");
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }
        echo json_encode($arr = array('message' => $message, 'status' => $status));
    }
    public function register_momo() // register seller in beautyX
    {

        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $reg_name = cleanupentries($this->input->post('reg_name'));
        $reg_phone = cleanupentries($this->input->post('reg_phone'));
        $reg_business_name = cleanupentries($this->input->post('reg_business_name'));
        $reg_business_add = cleanupentries($this->input->post('reg_business_add'));
        $reg_email = cleanupentries($this->input->post('reg_email'));

        $reg_branch_amount = cleanupentries($this->input->post('reg_branch_amount'));

        // bank information
        $reg_account_owner = cleanupentries($this->input->post('reg_account_owner'));
        $reg_account_number = cleanupentries($this->input->post('reg_account_number'));
        $reg_bank_name = cleanupentries($this->input->post('reg_bank_name'));
        //$reg_pass = cleanupentries($this->input->post('reg_pass'));
        // $reg_type = cleanupentries($this->input->post('reg_type'));
        $reg_type = TYPE_BEAUTYX;
        $reg_title = 'bán hàng trên sàn TMĐT';
        $reg_referral = cleanupentries($this->input->post('reg_referral'));
        //check spam
        // $content_check = $reg_name.$reg_phone.$reg_business_name.$reg_business_add.$reg_email.$reg_type;
        //if (!$this->check_nospam($from_ip,$content_check)) return;
        //end check

        $reg_message = 'Business name: ' . $reg_business_name . '<br>Business address: ' . $reg_business_add . '<br>Type: ' . $reg_type . '<br>Referral: ' . $reg_referral;
        // $reg_message_2 =  "Business name: ".$reg_business_name."\nBusiness address: ".$reg_business_add."\nType: ".$reg_type."\nReferral: ".$reg_referral;
        $store_mesage = '*Tên chủ thẻ:* ' . $reg_account_owner . '. *Số tài khoản:* ' . $reg_bank_name . '. *Tên ngân hàng:* ' . $reg_account_number;

        $create_date = date('Y-m-d H:i:s');
        $data['name']       = $reg_name;
        $data['mobile']     = $reg_phone;
        $data['email']      = $reg_email;
        $data['message']    = $store_mesage;
        $data['readed']     = 0;
        $data['type']       = 'Register';
        $data['referral']       = $reg_referral;
        $data['business_name']     = $reg_business_name;
        $data['business_address']  = $reg_business_add;
        $data['business_plan']     = $reg_type;
        $data['branch_quantity']     = $reg_branch_amount;
        $data['created_date']   = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);
        // check captcha
        if (!$this->checkCaptcha()) {
            return;
        }
        if (is_numeric($reference_id)) {

            //Notification
            $notification = array(
                'title'         => $reg_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            //$this->mnotification->add_data($notification);

            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }

            //end insert notification

            //EMAIL
            $title = $reg_name . ' đã đăng kí tạo ' . $reg_title;
            $email_content = $reg_name . ' đã đăng kí tạo ' . $reg_title . '<br>Email: ' . $reg_email . '<br>Số điện thoại: ' . $reg_phone . '<br>Tên chủ thẻ: ' . $reg_account_owner . '<br>Số tài khoản: ' . $reg_bank_name . '<br>Tên ngân hàng: ' . $reg_account_number . '<br>Nội dung: ' . $reg_message . '<br> Dịch vụ:' . $reg_type . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            $slack_msg = $reg_name.' đã đăng kí tạo '.$reg_title.'<br>Email: '.$reg_email.'<br>Số điện thoại: '.$reg_phone.'<br>Tên chủ thẻ: '.$reg_account_owner.'<br>Số tài khoản: '.$reg_bank_name.'<br>Tên ngân hàng: '.$reg_account_number."\nNội dung: ".$reg_message_2."\nFrom IP: ".$from_ip."\nBrowser: ".$from_browser."\n\n";


            $list = array('contact@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                    'list' => $list, 'title' => $title, 'content' => $email_content
                ])));
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }
            //END EMAIL
            if ($reg_email != '') {
                $list = array($reg_email);
                try {
                    //Send email to customer
                    $title_customer = 'Cảm ơn ' . $reg_name . ' đã đăng kí tạo ' . $reg_title;
                    $email_customer = 'Dear ' . $reg_name . '.<br><br>Cảm ơn ' . $reg_name . ' đã đăng kí tạo ' . $reg_title . '. Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.<br><br>Trân trọng,<br>MYSPA.VN TEAM';
                    run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                        'list' => $list, 'title' => $title_customer, 'content' => $email_customer
                    ])));
                } catch (Exception $e) {
                    $message = 'Cannot send email to customer';
                    //return false;
                }
            }
            //END EMAIL
            $status = 'ok';

            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {

                $now = date('Y-m-d H:i:s');
                $start_tmp = new DateTime($now);

                date_sub($start_tmp, date_interval_create_from_date_string('-7 minutes'));
                $end = date_format($start_tmp, 'H:i:s m/d/Y');

                // push noti to slack by codeigniter 
                // slack($slack_msg."\nTeam Sales vui lòng liên hệ trước ".$end." (trong giờ hành chính) và note [".$reg_phone."-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!","test");

                // push noti to slack by api
                Events::trigger('SendContactSlack::sendSlack', [
                    'contact_id' => $reference_id
                ]);
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }

        echo json_encode($arr = array('message' => $message, 'status' => $status));
    }
    public function register_branch_app()
    {

        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];


        $reg_name = cleanupentries($this->input->post('reg_name'));
        $reg_phone = cleanupentries($this->input->post('reg_phone'));
        $reg_business_name = cleanupentries($this->input->post('reg_business_name'));
        $reg_business_add = cleanupentries($this->input->post('reg_business_add'));
        $reg_email = cleanupentries($this->input->post('reg_email'));

        $reg_discount_code = cleanupentries($this->input->post('reg_discount_code'));
        $reg_branch_amount = cleanupentries($this->input->post('reg_branch_amount'));

        //$reg_pass = cleanupentries($this->input->post('reg_pass'));
        // $reg_type = cleanupentries($this->input->post('reg_type'));
        $reg_type = TYPE_MOBA;
        $reg_referral = cleanupentries($this->input->post('reg_referral'));
        //check spam
        // $content_check = $reg_name.$reg_phone.$reg_business_name.$reg_business_add.$reg_email.$reg_type;
        //if (!$this->check_nospam($from_ip,$content_check)) return;
        //end check

        $reg_message = 'Business name: ' . $reg_business_name . '<br>Business address: ' . $reg_business_add . '<br>Type: ' . $reg_type . '<br>Referral: ' . $reg_referral;
        // $reg_message_2 =  "Business name: ".$reg_business_name."\nBusiness address: ".$reg_business_add."\nType: ".$reg_type."\nReferral: ".$reg_referral;

        $create_date = date('Y-m-d H:i:s');
        $data['name']       = $reg_name;
        $data['mobile']     = $reg_phone;
        $data['email']      = $reg_email;
        $data['message']    = '';
        $data['readed']     = 0;
        $data['type']       = 'Register';
        $data['referral']       = $reg_referral;
        $data['business_name']     = $reg_business_name;
        $data['business_address']  = $reg_business_add;
        $data['business_plan']     = $reg_type;
        $data['discount_code']     = $reg_discount_code;
        $data['branch_quantity']     = $reg_branch_amount;
        $data['created_date']   = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);
        // check captcha
        if (!$this->checkCaptcha()) {
            return;
        }
        if (is_numeric($reference_id) && $reference_id >= 0) {

            //Notification
            $notification = array(
                'title'         => $reg_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            //$this->mnotification->add_data($notification);

            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }

            //end insert notification


            //EMAIL
            $title = $reg_name . ' đã đăng kí tạo app thương hiệu với Myspa';
            $email_content      = $reg_name . ' đã đăng kí tạo app thương hiệu với Myspa.<br>Email: ' . $reg_email . '<br>Số điện thoại: ' . $reg_phone . '<br>Nội dung: ' . $reg_message . '<br> Dịch vụ:' . $reg_type . '<br>Mã Giảm Giá: ' . $reg_discount_code . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            $slack_msg = $reg_name." đã đăng kí tạo app thương hiệu với Myspa.\nEmail: ".$reg_email."\nSố điện thoại: ".$reg_phone."\nNội dung: ".$reg_message_2."\nFrom IP: ".$from_ip."\nBrowser: ".$from_browser."\n\n";


            $list = array('contact@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                    'list' => $list, 'title' => $title, 'content' => $email_content
                ])));
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }

            if ($reg_email != '') {
                $list = array($reg_email);
                try {
                    //Send email to customer
                    $title_customer = 'Cảm ơn ' . $reg_name . ' đã đăng kí tạo app thương hiệu với Myspa';
                    $email_customer = 'Dear ' . $reg_name . '.<br><br>Cảm ơn ' . $reg_name . ' đã đăng kí tạo app thương hiệu với Myspa. Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.<br><br>Trân trọng,<br>MYSPA.VN TEAM';
                    run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                        'list' => $list, 'title' => $title_customer, 'content' => $email_customer
                    ])));
                } catch (Exception $e) {
                    $message = 'Cannot send email to customer';
                    //return false;
                }
            }
            //END EMAIL

            $status = 'ok';

            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {

                // $now = date('Y-m-d H:i:s');
                // $start_tmp = new DateTime($now);
                // date_sub($start_tmp, date_interval_create_from_date_string('-7 minutes'));
                // $end = date_format($start_tmp, 'H:i:s m/d/Y');

                // slack($slack_msg."\nTeam Sales vui lòng liên hệ trước ".$end." (trong giờ hành chính) và note [".$reg_phone."-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!","dangky_brandapp");

                Events::trigger('SendContactSlack::sendSlack', [
                    'contact_id' => $reference_id
                ]);
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }

        echo json_encode($arr = array('message' => $message, 'status' => $status));
    }
    public function register_beautyx()
    {
        $from_ip        = getClientIP();
        $from_browser   = $_SERVER['HTTP_USER_AGENT'];

        $reg_name = cleanupentries($this->input->post('reg_name'));
        $reg_phone = cleanupentries($this->input->post('reg_phone'));
        $reg_business_name = cleanupentries($this->input->post('reg_business_name'));
        $reg_business_add = cleanupentries($this->input->post('reg_business_add'));
        $reg_email = cleanupentries($this->input->post('reg_email'));
        $reg_branch_amount = cleanupentries($this->input->post('reg_branch_amount'));


        $reg_type = TYPE_BEAUTYX;

        $reg_message = 'Business name: ' . $reg_business_name . '<br>Business address: ' . $reg_business_add . '<br>Type: ' . $reg_type;
        // $reg_message_2 =  "Business name: ".$reg_business_name."\nBusiness address: ".$reg_business_add."\nType: ".$reg_type."\nReferral: ";

        $create_date = date('Y-m-d H:i:s');
        $data['name']       = $reg_name;
        $data['mobile']     = $reg_phone;
        $data['email']      = $reg_email;
        $data['message']    = '';
        $data['readed']     = 0;
        $data['type']       = 'Register';
        $data['referral']       = null;
        $data['business_name']     = $reg_business_name;
        $data['business_address']  = $reg_business_add;
        $data['business_plan']     = $reg_type;
        $data['discount_code']     = null;
        $data['branch_quantity']     = $reg_branch_amount;
        $data['created_date']   = $create_date;
        $data['from_ip']        = $from_ip;
        $data['from_browser']   = $from_browser;

        $reference_id = $this->mcontact->add_data($data);
        // check captcha
        if (!$this->checkCaptcha()) {
            return;
        }
        if (is_numeric($reference_id) && $reference_id >= 0) {

            //Notification
            $notification = array(
                'title'         => $reg_name . ' đã liên hệ ',
                'date_time'     => $create_date,
                'link'          => LINK_CONTACT_MANAGEMENT,
                'type'          => NOTIFICATION_TYPE_CONTACT,
                'branch_id'     => 0
            );
            //$this->mnotification->add_data($notification);

            $role_receive = array(1, 2);
            if ($this->mnotification->send_notification_for_role($role_receive, $notification)) {
                runSocket2('fire_notification', 'notification has been sent');
            }

            //end insert notification


            //EMAIL
            $title = $reg_name . ' đã đăng kí nhận thông tin của beauty X với Myspa';
            $email_content      = $reg_name . ' đã đăng kí nhận thông tin của beauty X với Myspa.<br>Email: ' . $reg_email . '<br>Số điện thoại: ' . $reg_phone . '<br>Nội dung: ' . $reg_message . '<br> Dịch vụ:' . $reg_type . '<br>From IP: ' . $from_ip . '<br>Browser: ' . $from_browser . '<br><br>Thông tin chi tiết vui lòng check tại <a href="' . base_url() . 'ManageContact/contact_list" target="_blank">ĐÂY</a>';

            // $slack_msg = $reg_name." đã đăng kí nhận thông tin của beauty X với Myspa.\nEmail: ".$reg_email."\nSố điện thoại: ".$reg_phone."\nNội dung: ".$reg_message_2."\nFrom IP: ".$from_ip."\nBrowser: ".$from_browser."\n\n";


            $list = array('contact@myspa.vn');

            $message = 'Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.';
            try {
                run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                    'list' => $list, 'title' => $title, 'content' => $email_content
                ])));
            } catch (Exception $e) {
                $message = 'Cannot send email';
                //return false;
            }

            if ($reg_email != '') {
                $list = array($reg_email);
                try {
                    //Send email to customer
                    $title_customer = 'Cảm ơn ' . $reg_name . ' đã đăng kí nhận thông tin của beauty X với Myspa';
                    $email_customer = 'Dear ' . $reg_name . '.<br><br>Cảm ơn ' . $reg_name . ' đã đăng kí nhận thông tin của beauty X với Myspa. Chúng tôi sẽ liên hệ lại sớm nhất trong vòng 1 ngày làm việc từ thứ hai đến chủ nhật hàng tuần.<br><br>Trân trọng,<br>MYSPA.VN TEAM';
                    run_background_process("php index.php Frontend/sendMailAsync " . url_base64_encode(json_encode([
                        'list' => $list, 'title' => $title_customer, 'content' => $email_customer
                    ])));
                } catch (Exception $e) {
                    $message = 'Cannot send email to customer';
                    //return false;
                }
            }
            //END EMAIL

            $status = 'ok';

            if ($this->config->item('slack_noti') != null && $this->config->item('slack_noti') == TRUE) {

                // $now = date('Y-m-d H:i:s');
                // $start_tmp = new DateTime($now);
                // date_sub($start_tmp, date_interval_create_from_date_string('-7 minutes'));
                // $end = date_format($start_tmp, 'H:i:s m/d/Y');

                // slack($slack_msg."\nTeam Sales vui lòng liên hệ trước ".$end." (trong giờ hành chính) và note [".$reg_phone."-DONE] tại đây khi đã xử lý xong. Cảm ơn Team!","beautyx");

                Events::trigger('SendContactSlack::sendSlack', [
                    'contact_id' => $reference_id
                ]);
            }
        } else {
            $message = 'Xảy ra lỗi, vui lòng sử dụng tính năng chat hoặc gọi số hotline: ' . HOTLINE;
            $status = 'fail';
        }

        echo json_encode($arr = array('message' => $message, 'status' => $status));
    }
    // CLOSE REGISTER
    
    private function check_nospam($ip, $content_check)
    {

        $spam_arr = array('..', './', '\.', '*', 'etc', 'passwd', '/', '%', 'win.ini', 'proc', 'version', 'windows', 'boot', '.ini', 'system32', 'gethostbyname', 'perl -e', 'echo', 'write', 'response');

        foreach ($spam_arr as $spam) {
            if (strpos($content_check, $spam) !== FALSE) {
                slack('Spam ip: ' . $ip . '| Content: ' . $content_check, "warning");
                return false;
            }
        }

        $count_ip = $this->mcontact->count_same_ip_register($ip);

        if ($count_ip >= 5) {
            slack('Spam ip: ' . $ip . '|count:' . $count_ip, "warning");
            return false;
        } else {
            return true;
        }
    }
    public function sendMailAsync($encodeData)
    {
        $decodeData = url_base64_decode($encodeData);
        $decodeData = json_decode($decodeData, true);
        sendMail($decodeData['list'], $decodeData['title'], $decodeData['content']);
    }
    public function checkCaptcha()
    {
        // check captcha
        $reg_captcha = $this->input->post('reg_captcha');
        $reg_action = $this->input->post('reg_action');
        $validate_captcha = validate_captcha($reg_captcha, $reg_action);
        if (!$validate_captcha) {
            slack('Url: ' . base_url() . ' | Content: Captcha không hợp lệ', "warning");
            echo json_encode(['message' => 'Captcha không hợp lệ', 'status' => 'fail']);
            return $validate_captcha;
        }
        return $validate_captcha;
    }
    public function shitAsync($encodeData)
    {
        $decodeData = url_base64_decode($encodeData);
        $decodeData = json_decode($decodeData, true);
        $resp = fetch($decodeData['url'], (isset($decodeData['data']) ? json_encode($decodeData['data']) : []), (isset($decodeData['header']) ? $decodeData['header'] : []));
    }
    public function investment()
    {
        // check captcha
        if (!$this->checkCaptcha()) {
            return;
        }

        $from_ip  = getClientIP();
        $reg_name = cleanupentries($this->input->post('fund'));
        $from_browser       = $_SERVER['HTTP_USER_AGENT'];
        $reg_type           = 'INVESTMENT_FUNDS';
        $data['name']       =  $reg_name;
        $data['mobile']     = cleanupentries($this->input->post('telephone'));
        $data['email']      = cleanupentries($this->input->post('email'));
        $data['message']    = cleanupentries($this->input->post('nationality'));
        $data['readed']     = 0;
        $data['type']       =   $reg_type;
        $data['referral']   = '';
        $data['business_name']  = cleanupentries($this->input->post('fund'));
        $data['business_address']  = cleanupentries($this->input->post('address'));
        $data['business_plan']  =  $reg_type ;
        $data['discount_code']   = '';
        $data['branch_quantity'] = '';
        $data['created_date']    = date('Y-m-d H:i:s');
        $data['from_ip']         = $from_ip;
        $data['from_browser']    = $from_browser;
        $reference_id = $this->mcontact->add_data($data);

        if (is_numeric($reference_id) && $reference_id >= 0) {
            Events::trigger('SendInvestmentSlack::sendSlack', [
                        'contact_id' => $reference_id,
                    ]);
            $status = 'ok';
        }
        else{
            $status = 'fail';
        }

        echo json_encode( array( 'status' => $status));
    }
    public function recruitment()
    {
        $from_ip  = getClientIP();
        $reg_name = cleanupentries($this->input->post('investment'));
        $from_browser       = $_SERVER['HTTP_USER_AGENT'];
        $reg_business_add   = cleanupentries($this->input->post('address'));
        $reg_type           = 'INVESTMENT_FUNDS';
        $reg_message        = 'Business name: ' . $reg_name . '<br>Business address: ' . $reg_business_add . '<br>Type: ' . $reg_type;
        $data['name']       =  cleanupentries($this->input->post('name'));
        $data['mobile']     = cleanupentries($this->input->post('phone'));
        $data['email']      = cleanupentries($this->input->post('email'));
        $data['file']      = cleanupentries($this->input->post('file'));
        $data['birthday']      = cleanupentries($this->input->post('birthday'));
        $data['yourself']      = cleanupentries($this->input->post('yourself'));
        $data['message']    = $reg_message;
        $data['readed']     = 0;
        $data['type']       =   $reg_type;
        $data['referral']   = '';
        $data['business_name']  = cleanupentries($this->input->post('investment'));
        $data['business_address']  = cleanupentries($this->input->post('address'));
        $data['business_plan']  = cleanupentries($this->input->post('nationality'));
        $data['discount_code']   = '';
        $data['branch_quantity'] = '';
        $data['created_date']    = date('Y-m-d H:i:s');
        $data['from_ip']         = $from_ip;
        $data['from_browser']    = $from_browser;
        $reference_id = $this->mcontact->add_data($data);
        var_dump(json_encode($data));
    }
       public function send30year()
    {
        $from_ip  = getClientIP();
        $reg_name = cleanupentries($this->input->post('reg_name'));
        $from_browser       = $_SERVER['HTTP_USER_AGENT'];
        $reg_type           = 'EVENT';
        $reg_message        =  cleanupentries($this->input->post('reg_message'));
        $data['name']       =  $reg_name;
        $data['mobile']     = cleanupentries($this->input->post('reg_phone'));
        $data['message']    = $reg_message;
        $data['readed']     = 0;
        $data['type']       = $reg_type;
        $data['referral']   = '';
        $data['business_name']  = cleanupentries($this->input->post('reg_business_name'));
        $data['business_plan']  =  $reg_type ;
        $data['created_date']    = date('Y-m-d H:i:s');
        $data['from_ip']         = $from_ip;
        $data['from_browser']    = $from_browser;
        $reference_id = $this->mcontact->add_data($data);
        Events::trigger('Send30Year::sendSlack', [
            'contact_id' => $reference_id,
        ]);
        echo json_encode(['status' => 'ok']);
    }
}