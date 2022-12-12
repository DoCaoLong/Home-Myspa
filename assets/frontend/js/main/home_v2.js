window.addEventListener("load", () => {
    lazyImages.forEach((lazyImage) => {
        lazyImageObserver.observe(lazyImage);
    });
    fetchNews();
    ecosystemAccordianHandle();
    mobileOnlySlider(".fit-list", false, false, 767);
    handleEcosystemTab();
    setTimeout(activePopup, 1000);
    // Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
    // for desktop only
    if (window.screen.width > 768) {
        popularVidHanle();
    }
    // for mobile, tablet only
    else {
        handleBtnPlay();
    }
    // end
});

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

// slider section banner
$(".feature-slider_list").slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    swipe: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [
        {
            breakpoint: 1023,
            settings: {
                slidesToShow: 5,
            },
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                centerMode: true,
            },
        },
    ],
});
// close slider section banner

// slider section why
$(".why-slider_list").slick({
    dots: true,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    autoplay: false,
    autoplaySpeed: 3000,
    swipe: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    variableWidth: true,
    appendDots: $(".slick-slider-dots"),
    prevArrow: ".prev-arrow",
    nextArrow: ".next-arrow",
    responsive: [
        {
            breakpoint: 767,
            settings: {
                swipe: true,
                arrows: false,
                pauseOnHover: true,
                pauseOnFocus: true,
            },
        },
    ],
});
// close slider section why

// slider fit MB
function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
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
    autoplaySpeed: 3000,
    swipe: false,
});
// close slider author

// org slider
$(".org-slider").slick({
    dots: false,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    infinite: true,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                centerMode: true,
            },
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                centerMode: true,
            },
        },
    ],
});
// close org slider

// active tab section ecosystem
function handleEcosystemTab() {
    const ecosystemTab = document.querySelectorAll(".ecosystem-tab_list");
    const ecosystemTabItem = document.querySelectorAll(".ecosystem-tab_item");
    ecosystemTab.forEach((item) =>
        item.addEventListener("click", (el) => {
            ecosystemTab.forEach((tab) => tab.classList.remove("active"));
            item.classList.add("active");
            const tabItem = el.target.dataset.tab;
            ecosystemTabItem.forEach((item) => {
                item.classList.remove("active");
                if (item.getAttribute("data-tab") === tabItem) {
                    item.classList.add("active");
                }
            });
        })
    );
}
// close active tab section ecosystem

// btn play video
function handleBtnPlay() {
    let video = document.querySelectorAll(".video-box_media");
    let wrapMediaMb = document.querySelectorAll(".wrap-media_mb");
    [...video].forEach((item) => (item.controls = false));
    [...wrapMediaMb].forEach((item) => {
        item.children[0].controls = true;
        item.classList.add("active");
    });
}

// hover active bg section solutions
let solutionsManager = document.querySelector(".solutions-manager");
solutionsManager.addEventListener(
    "mouseenter",
    () =>
        (solutionsManager.parentNode.parentNode.parentNode.previousElementSibling.style.opacity =
            "1")
);
solutionsManager.addEventListener(
    "mouseleave",
    () =>
        (solutionsManager.parentNode.parentNode.parentNode.previousElementSibling.style.opacity =
            "0")
);
// close hover active bg section solutions

// ecosystem accordian
function ecosystemAccordianHandle() {
    const accordionHeading = document.querySelectorAll(".accordion-heading");
    [...accordionHeading].forEach((item) =>
        item.addEventListener("click", (e) => {
            const content = e.target.nextElementSibling;
            content.style.height = `${content.scrollHeight}px`;
            content.classList.toggle("active");
            const icon = e.target.querySelector(".accordion-heading_arrown");

            if (!content.classList.contains("active")) {
                content.style.height = "0px";
                icon.style.transform = "rotate(180deg)";
            } else {
                icon.style.transform = "rotate(0deg)";
                content.style.height = "auto";
            }
        })
    );
}
// close ecosystem accordian

// video
function popularVidHanle() {
    const videoItem = document.querySelectorAll(".video-box_item");
    const videoPlay = document.querySelector(".video-play");
    const videoPlaySource = document.querySelector(".source-vide-home");
    [...videoItem].forEach((item) =>
        item.addEventListener("click", () => {
            let dataImg = item.dataset.img;
            let dataVideo = item.dataset.video;
            if (dataVideo != videoPlay.src) {
                videoPlay.setAttribute("poster", dataImg);
                videoPlay.setAttribute("src", dataVideo);
                videoPlaySource.setAttribute("src", dataVideo);
            }
            videoPlay.paused ? videoPlay.play() : videoPlay.pause();
        })
    );
}
// close video

// news
const readMoreLink = document.querySelector(".read-more-link");
async function fetchNews() {
    const res = await fetch(
        "https://myspa.vn/blog/index.php/wp-json/wp/v2/posts?page=1&per_page=3&categories_exclude=368&order=desc&orderby=date&_fields=title%2Clink%2Cexcerpt%2Cfeatured_media"
    );
    const resNews = await res.json();
    const arr = [];
    arr[0] = await fetch(
        `https://myspa.vn/blog/wp-json/wp/v2/media/${resNews[0]?.featured_media}?_fields=guid`
    )
        .then((res) => res.json())
        .then((res) => res);
    arr[1] = await fetch(
        `https://myspa.vn/blog/wp-json/wp/v2/media/${resNews[1]?.featured_media}?_fields=guid`
    )
        .then((res) => res.json())
        .then((res) => res);
    arr[2] = await fetch(
        `https://myspa.vn/blog/wp-json/wp/v2/media/${resNews[2]?.featured_media}?_fields=guid`
    )
        .then((res) => res.json())
        .then((res) => res);
    let newList = document.querySelector(".news-list");
    let templateNewItem = ``;
    resNews.map((item, index) => {
        templateNewItem += `
        <div>
            <a href="${item?.link}" >
                <div class="news-item cursor-pointer">
                    <div class="news-item_img">
                        <img src="${arr[index]?.guid?.rendered}" alt="blog-image">
                    </div>
                    <div class="news-item_content">
                        <h3 class="news-item_title">
                            ${item?.title?.rendered}
                        </h3>
                        <p class="news-item_desc text-home-normal">
                            ${item?.excerpt.rendered}
                        </p>
                    </div>
                </div>
            </a>
        </div>`;
    });
    if (templateNewItem) newList.innerHTML = templateNewItem;
}
// close news

// popup regis
const popupRegis = document.querySelector(".popup-regis");
const popupRegisMB = document.querySelector(".popup-regis_mb");
// const btnsubmitRes = document.querySelector(".form-regis_btn");

document.body.addEventListener("click", function (event) {
    if (event.target.parentNode.matches(".form-regis_cancel")) {
        if (window.screen.width > 1023) {
            popupRegis.classList.remove("active");
        } else {
            popupRegisMB.classList.remove("active");
        }
        document.body.style.position = "";
    } else if (event.target.matches(".popup-regis")) {
        if (window.screen.width > 1023) {
            popupRegis.classList.remove("active");
        } else {
            popupRegisMB.classList.remove("active");
        }
        document.body.style.position = "";
    }
});

function activePopup() {
    document.body.style.position = "fixed";
    if (window.screen.width > 1023) {
        popupRegis.classList.add("active");
    } else {
        popupRegisMB.classList.add("active");
    }
}

// close popup regis
