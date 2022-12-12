
$(window).bind('scroll', function () {
    if ($(window).scrollTop() < 60) {
        console.log("------------- < 100");
        $('.menu-bottom').removeClass('menu-down');
    }
    if ($(window).scrollTop() >= $('body').offset().top + $('body').outerHeight() - window.innerHeight) {

        if ($('.menu-bottom').hasClass('menu-down')) { $('.menu-bottom').removeClass('menu-down') }
    }
    else if ($(window).scrollTop() < $('body').offset().top + $('body').outerHeight() - window.innerHeight && $(window).scrollTop() >= 60) {
        $('.menu-bottom').addClass('menu-down')
    }
});
