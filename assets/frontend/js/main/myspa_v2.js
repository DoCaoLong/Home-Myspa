window.addEventListener("load", () => {
    lazyImages.forEach((lazyImage) => {
        lazyImageObserver.observe(lazyImage);
    });
    if (window.screen.width > 768) {
    } else {
    }
});

// slider author
$(".author-slider_list").slick({
    dots: false,
    arrows: true,
    nextArrow: ".author-slider-next",
    prevArrow: ".author-slider-prev",
    infinite: true,
    autoplay: true,
    fade: true,
    cssEase: "linear",
    autoplaySpeed: 5000,
    swipe: false,
});
// close slider author

// load img
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
// close load img

// active tab section best
const bestTab = document.querySelectorAll(".best-tab_list");
const bestTabItem = document.querySelectorAll(".best-tab_item");
let activeBest = "active";

bestTab.forEach((item) =>
    item.addEventListener("click", (el) => {
        bestTab.forEach((tab) => tab.classList.remove(activeBest));
        item.classList.add(activeBest);
        const tabItem = el.target.dataset.tab;
        bestTabItem.forEach((item) => {
            item.classList.remove(activeBest);
            if (item.getAttribute("data-tab") === tabItem) {
                item.classList.add(activeBest);
            }
        });
    })
);
// close active tab section best

// accordions quality
let qualityItem = document.querySelectorAll(".accordion-item");
let activeQuality = "active";
[...qualityItem].forEach((item) => {
    item.addEventListener("click", (e) => {
        [...qualityItem].forEach((el) => {
            el.classList.remove(activeQuality);
        });
        e.target.parentNode.classList.add(activeQuality);
    });
});
// close accordions quality

// accordions questions
let accordionsItem = document.querySelectorAll(".questions-left_item");
let activeQuestions = "active";
[...accordionsItem].forEach((item) => {
    item.addEventListener("click", (e) => {
        if (!e.target.classList.contains(activeQuestions)) {
            [...accordionsItem].forEach((el) => {
                el.classList.remove(activeQuestions);
            });
        }
        if (e.target.classList.contains(activeQuestions)) {
            e.target.classList.remove(activeQuestions);
        } else {
            e.target.classList.add(activeQuestions);
        }
    });
});
// close accordions questions

// feature
let featureItem = document.querySelectorAll(".feature-left_item");
let activeFeatureItem = "active";
featureItem.forEach((item) =>
    item.addEventListener("click", (e) => {
        if (!e.target.classList.contains(activeFeatureItem)) {
            [...featureItem].forEach((el) => {
                el.classList.remove(activeFeatureItem);
            });
        }
        if (e.target.classList.contains(activeFeatureItem)) {
            e.target.classList.remove(activeFeatureItem);
        } else {
            e.target.classList.add(activeFeatureItem);
        }
    })
);
// close feature

// best
let bestItemHead = document.querySelectorAll(".item-mb_head");
let bestItemActive = "active";
bestItemHead.forEach((item) => {
    item.addEventListener("click", (e) => {
        if (
            !e.target.closest(".tab-mb_item").classList.contains(bestItemActive)
        ) {
            bestItemHead.forEach((el) => {
                el.closest(".tab-mb_item").classList.remove(bestItemActive);
            });
        }
        if (
            e.target.closest(".tab-mb_item").classList.contains(bestItemActive)
        ) {
            e.target.closest(".tab-mb_item").classList.remove(bestItemActive);
        } else {
            e.target.closest(".tab-mb_item").classList.add(bestItemActive);
        }
    });
});
let bestBtnSeemore = document.querySelectorAll(".best-btn_seemore");
bestBtnSeemore.forEach((item) =>
    item.addEventListener("click", (e) => {
        e.target.parentNode.previousElementSibling.classList.toggle("active");
    })
);
// close best

// effective
let effectiveItem = document.querySelectorAll(".effective-item");
effectiveItem.forEach((item) => {
    item.addEventListener("click", (e) => {
        if (!e.target.closest(".effective-item").classList.contains("active")) {
            [...effectiveItem].forEach((el) => {
                el.closest(".effective-item").classList.remove("active");
            });
        }
        if (e.target.closest(".effective-item").classList.contains("active")) {
            e.target.closest(".effective-item").classList.remove("active");
        } else {
            e.target.closest(".effective-item").classList.add("active");
        }
    });
});
// close effecttive

// slider section maketing
// slider fit MB
mobileOnlySlider(".marketing-wrap", true, false, 767);
function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
        // autoplay: true,
        autoplaySpeed: 3000,
        mobileFirst: true,
        dots: $dots,
        arrows: $arrows,
        responsive: [
            {
                breakpoint: $breakpoint,
                settings: "unslick",
            },
        ],
    };
    slider.slick(settings);
    $(window).on("resize", function () {
        if ($(window).width() > $breakpoint) {
            return;
        }
        if (!slider.hasClass("slick-initialized")) {
            return slider.slick(settings);
        }
    });
}
// close slider fit MB
// close slider section maketing
let itemWhy = document.querySelectorAll(".why-left_item");
itemWhy.forEach((item) =>
    item.addEventListener("click", () => {
        itemWhy.forEach((item) => {
            item.classList.remove("active");
        });
        item.classList.add("active");
    })
);
