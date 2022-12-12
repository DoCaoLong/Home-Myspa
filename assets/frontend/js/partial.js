$(function () {
    // change icon
    function scrollFunction() {
        if (
            document.body.scrollTop > 50 ||
            document.documentElement.scrollTop > 50
        ) {
            $("#menu-wrap").addClass("minimize");
        } else {
            $("#menu-wrap").removeClass("minimize");
        }
    }
    $(document).on("scroll", scrollFunction);
    $(".menu-mobile").on("click", function () {
        $(this).toggleClass("active");
    });
    if ($(window).width() <= 991.98) {
        $(".menu>ul>li").on("click", function () {
            $(this).toggleClass("active");
            // $(this)[0].lastElementChild.classList.toggle('active');
        });
    }
    const initShapeLoop = function (pos) {
        pos = pos || 0;
        anime.remove(DOM.shapeEl);
        anime({
            targets: DOM.shapeEl,
            easing: "linear",
            d: [
                { value: shapes[pos].pathAlt, duration: 3500 },
                { value: shapes[pos].path, duration: 3500 },
            ],
            loop: true,
            fill: {
                value: shapes[pos].fill.color,
                duration: shapes[pos].fill.duration,
                easing: shapes[pos].fill.easing,
            },
            direction: "alternate",
        });
    };

    const initShapeEl = function () {
        anime.remove(DOM.svg);
        anime({
            targets: DOM.svg,
            duration: 1,
            easing: "linear",
            scaleX: shapes[0].scaleX,
            scaleY: shapes[0].scaleY,
            translateX: shapes[0].tx + "px",
            translateY: shapes[0].ty + "px",
            rotate: shapes[0].rotate + "deg",
        });

        initShapeLoop();
    };
});
