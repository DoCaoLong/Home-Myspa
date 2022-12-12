// active menu
let menuMb = document.querySelector(".menu-mobile");
menuMb.addEventListener("click", function () {
    this.classList.toggle("active");
});
// close active menu

// active menu lv2 mobile
let subMenu = document.querySelectorAll(".sub-menu");
let activeMenuMB = "active";
[...subMenu].forEach((item) => {
    item.addEventListener("click", (e) => {
        if (!e.target.parentNode.classList.contains(activeMenuMB)) {
            [...subMenu].forEach((item) => {
                item.classList.remove(activeMenuMB);
            });
        }
        if (e.target.parentNode.classList.contains(activeMenuMB)) {
            item.classList.remove(activeMenuMB);
        } else {
            item.classList.add(activeMenuMB);
        }
    });
});
// close active menu lv2 mobile
