function openAboutAsk() {
    document.getElementById("itemNext").classList.toggle("mt-70");
    document
        .querySelector(".ask-body__left-item__child")
        .classList.toggle("ask-body__left-item__child-active");
}
// duyệt tất cả tấm ảnh cần lazy-load
const lazyImages = document.querySelectorAll("[lazy]");

// chờ các tấm ảnh này xuất hiện trên màn hình
const lazyImageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        // tấm ảnh này đã xuất hiện trên màn hình
        if (entry.isIntersecting) {
            const lazyImage = entry.target;
            const src = lazyImage.dataset.src;

            lazyImage.tagName.toLowerCase() === "img"
                ? // <img>: copy  lazy data-src sang src
                  (lazyImage.src = src)
                : // <div>: copy  lazy data-src sang background-image
                  (lazyImage.style.backgroundImage = "url('" + src + "')");

            // copy xong rồi thì bỏ attribute lazy đi
            lazyImage.removeAttribute("lazy");

            // job done, không cần observe nó nữa
            observer.unobserve(lazyImage);
        }
    });
});

// Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
lazyImages.forEach((lazyImage) => {
    lazyImageObserver.observe(lazyImage);
});
//custom q and a animate

$("#q_aOne .panel-default .panel-heading a").on("click", function () {
    var a = $(this).attr("aria-expanded");
    var parent = $(this).parent();
    if (a == "false") {
        parent.parent().css("background", "#EEEDF2");
        parent.parent().css("border-radius", "8px");
        parent.parent().css("border", "0px");
    }
    $("#q_aOne .panel-default").each(function () {
        var child_status = $(this)
            .children()
            .first()
            .children()
            .first()
            .attr("aria-expanded");
        // console.log($(this).children().first().children().first());
        if (child_status == "true") {
            $(this).css("background", "transparent");
            $(this).css("border-bottom", "1px solid #E2E1E8");
            $(this).css("border-radius", "0px");
        }
    });
});
var owl_2 = $("#owl-cus-should-know");
owl_2.owlCarousel({
    nav: true,
    navText: [
        `<img src='${base_url}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Left Arrow.png' alt='icon'>`,
        `<img src='${base_url}assets/frontend/images/Image-landing-page-tong-hop/Icon/Icon/Right Arrow.png' alt='icon'>`,
    ],
    // rewindNav: true,
    // scrollPerPage:true,
    dots: true,
    // // transitionStyle : "fade",
    slideSpeed: 500,
    paginationSpeed: 500,
    center: true,
    items: 1,
    loop: true,
    margin: 10,
    autoHeight: false,
    responsive: {
        480: {
            autoHeight: false,
            items: 1,
        },
        600: {
            autoHeight: true,
            items: 2,
        },
        1200: {
            autoHeight: false,
            items: 2,
        },
    },
});
function getDaysInMonth(year, month) {
    return new Date(year, month, 0).getDate();
}
let date = new Date();
const currentYear = date.getFullYear();
const currentMonth = date.getMonth() + 1;
const lastOfMonth = getDaysInMonth(currentYear, currentMonth);
let expiration_day = document.querySelectorAll(".expiration-day");
expiration_day.forEach(
    (item) => (item.innerText = `${lastOfMonth}/${currentMonth}/${currentYear}`)
);
