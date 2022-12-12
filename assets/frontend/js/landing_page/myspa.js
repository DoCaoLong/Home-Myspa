$(function(){

    



    
    $('.Manage-customer').click(function(){
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-customer > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer.svg`);
        $('.Controlling-economic > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg`);
        $('.Manage-employee > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg`);
        $('.Manage-warehouse > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg`);

        $('.Controlling-economic,.Manage-employee,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-2,#tabcontent-3,#tabcontent-4').fadeOut(0);
    });
    $('.Controlling-economic').click(function(){
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Controlling-economic > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg`);
        $('.Controlling-economic > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic.svg`);
        $('.Manage-employee > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg`);
        $('.Manage-warehouse > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg`);

        $('.Manage-customer,.Manage-employee,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-3,#tabcontent-4').fadeOut(0);
    });
    $('.Manage-employee').click(function(){
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-employee > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg`);
        $('.Controlling-economic > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg`);
        $('.Manage-employee > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee.svg`);
        $('.Manage-warehouse > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse-white.svg`);

        $('.Controlling-economic,.Manage-customer,.Manage-warehouse').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-2,#tabcontent-4').fadeOut(0);
    });
    $('.Manage-warehouse').click(function(){
        $(this).addClass('active');
        thisdata = $(this).attr('data-href');
        $('.Manage-warehouse > img').fadeIn(1000);
        $('.Manage-customer > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-customer-white.svg`);
        $('.Controlling-economic > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Controlling-economic-white.svg`);
        $('.Manage-employee > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-employee-white.svg`);
        $('.Manage-warehouse > img').attr('src',`${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Manage-warehouse.svg`).fadeIn(10000);

        $('.Controlling-economic,.Manage-employee,.Manage-customer').removeClass('active');
        $(thisdata).fadeIn(1000);
        $('#tabcontent-1,#tabcontent-2,#tabcontent-3').fadeOut(0);
    });


    var hash = location.hash;
    switch(hash){
        case '#quan-ly-cham-cong-myspa':
            $('#quan-ly-cham-cong').trigger('click');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#phan-mem-quan-ly-spa").offset().top
            }, 2000);
        break;
        case '#quan-ly-luong-nhan-vien-spa':
            $('#quan-ly-cham-cong').trigger('click');
            $('#quan-ly-luong-nhan-vien-spa').trigger('click');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#phan-mem-quan-ly-spa").offset().top
            }, 2000);       
        break;
        case '#quan-ly-quan-he-khach-hang-crm':
            $('.Manage-customer').trigger('click');
            $('#quan-ly-thong-tin-khach-hang-crm').trigger('click');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#phan-mem-quan-ly-spa").offset().top
            }, 2000); 
        break;
        case '#phan-mem':
            $('.Manage-customer').trigger('click');
            $('#quan-ly-thong-tin-khach-hang-crm').trigger('click');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#phan-mem-quan-ly-spa").offset().top
            }, 2000); 
        break;
        case '#dang-ky':
            $('#send').trigger('click');
        break;
    }
    //custom function section for mobile version
    $( "#func .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            parent.parent().css('background', '#EEEDF2');
            parent.parent().css('border-radius', '8px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $( this ).children().last().html('Thu gọn');
        }
        $( "#func .panel-default" ).each(function(){

            var child_status = $(this).children().last().children().first().attr('aria-expanded');
            // console.log($(this).children().last());
            if( child_status == "true" ){
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '0px');
                $(this).children().last().children().first().children().last().html('Xem chi tiết');
            }
        })
    });
    //custom function section for mobile version
    $( "#manage_func .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        console.log($(this));
        var parent = $( this ).parent();
        // var parentId = parent.attr('id');
        // console.log(parent.offset().top);
        // $([document.documentElement, document.body]).animate({
        //     scrollTop: $('#manageFunc_fourth').offset().top
        // }, 2000);
        // console.log($('#manageFunc_fourth').offset().top);
        if(a == "false"){
            // console.log(a);
            $( this ).children().last().html('Thu gọn');
        }
        $( "#manage_func .panel-default" ).each(function(){

            var child_status = $(this).children().last().children().first().attr('aria-expanded');
            // console.log($(this).children().last());
            if( child_status == "true" ){
                $(this).children().last().children().first().children().last().html('Xem thêm');
            }
        })
    });

     //custom function remote section for mobile version
    $( "#func_remote .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $( this ).children().last().html('Thu gọn');
        }
        $( "#func_remote .panel-default" ).each(function(){

            var child_status = $(this).children().last().children().first().attr('aria-expanded');
            // console.log($(this).children().last());
            if( child_status == "true" ){
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '0px');
                $(this).children().last().children().first().children().last().html('Xem chi tiết');
            }
        })
    });
    //custom function higher control section for mobile version
    $( "#func_higher_control .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $( this ).children().last().html('Thu gọn');
        }
        $( "#func_higher_control .panel-default" ).each(function(){

            var child_status = $(this).children().last().children().first().attr('aria-expanded');
            // console.log($(this).children().last());
            if( child_status == "true" ){
                $(this).css('background', '#F5F5F7');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '16px');
                $(this).children().last().children().first().children().last().html('Xem chi tiết');
            }
        })
    });
    //custom function higher control section for mobile version
    $( "#section_why .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            parent.parent().css('background', '#F5F5F7');
            parent.parent().css('border-radius', '16px');
            parent.parent().css('border', '0px');
            // console.log(a);
            $( this ).children().last().html('Thu gọn');
        }
        $( "#section_why .panel-default" ).each(function(){

            var child_status = $(this).children().last().children().first().attr('aria-expanded');
            // console.log($(this).children().last());
            if( child_status == "true" ){
                $(this).css('background', 'transparent');
                $(this).css('border-bottom', '0px');
                $(this).css('border-radius', '16px');
                $(this).children().last().children().first().children().last().html('Xem chi tiết');
            }
        })
    });
    //custom q and a animate

    $( "#q_aOne .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            if($( window ).width() > 479){
                parent.parent().css('background', '#EEEDF2');
                parent.parent().css('border-radius', '0px');
                parent.parent().css('border', '0px');
            }
            else{
                parent.parent().css('background', '#EEEDF2');
                parent.parent().css('border-radius', '8px');
            }
        }
        $( "#q_aOne .panel-default" ).each(function(){
            var child_status = $(this).children().first().children().first().attr('aria-expanded');
            console.log($(this).children().first().children().first());
            if( child_status == "true" ){
                $(this).css('background', 'transparent');
                if($( window ).width() > 479){
                    $(this).css('border-bottom', '1px solid #E2E1E8');
                    $(this).css('border-radius', '0px');
                }
                else{
                    $(this).css('border-bottom', '0');
                    $(this).css('box-shadow', '2px 4px 16px rgba(113, 100, 184, 0.2)');
                    $(this).css('border-radius', '8px');
                }
            }
        })
    });
    $( "#q_aTwo .panel-default .panel-heading a" ).on( "click", function() {
        var a = $( this ).attr('aria-expanded');
        var parent = $( this ).parent();
        if(a == "false"){
            if($( window ).width() > 479){
                parent.parent().css('background', '#EEEDF2');
                parent.parent().css('border-radius', '0px');
                parent.parent().css('border', '0px');
            }
            else{
                parent.parent().css('background', '#EEEDF2');
                parent.parent().css('border-radius', '8px');
            }
        }
        $( "#q_aTwo .panel-default" ).each(function(){

            var child_status = $(this).children().first().children().first().attr('aria-expanded');
            // console.log($(this).children().first().children().first());
            if( child_status == "true" ){
                $(this).css('background', 'transparent');
                if($( window ).width() > 479){
                    $(this).css('border-bottom', '1px solid #E2E1E8');
                    $(this).css('border-radius', '0px');
                }
                else{
                    $(this).css('border-bottom', '0');
                    $(this).css('box-shadow', '2px 4px 16px rgba(113, 100, 184, 0.2)');
                    $(this).css('border-radius', '8px');
                }
            }
        })
    });
    // counting animate

    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 7000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    /* Separate Carousels */

    var owl_1 = $("#owl-sep-1");
    owl_1.owlCarousel({
        navigation: true,
        navigationText: [`<img src='${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Left Arrow.png' alt='icon'>","<img src='${BASE_URL}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Right Arrow.png' alt='icon'>`],
        rewindNav: true,
        scrollPerPage:false,
        dots:false,
        pagination : false,
        transitionStyle : "fade",
        slideSpeed : 500,
        paginationSpeed : 500,
        singleItem:true,
        autoPlay: false,
        autoHeight:true,
    });

    var owl_2 = $("#mobile-marketing-section");
    owl_2.owlCarousel({
        navigation: false,
        rewindNav: true,
        scrollPerPage:false,
        dots:true,
        pagination : true,
        // transitionStyle : "fade",
        slideSpeed : 500,
        paginationSpeed : 500,
        singleItem:true,
        autoPlay: false,
        autoHeight:true,
    });

});