
// $('.city-list').owlCarousel({
//     loop: false,
//     margin: 20,
//     responsive: {
//         0: {
//             items: 2.5
//         },
//         600: {
//             items: 3
//         },
//         1000: {
//             items: 5
//         }
//     }
// })
// dropdown
const dropdownList = document.querySelectorAll(".dropdown-list")
const dropdownItem = document.querySelectorAll(".dropdown-item") 
const dropdownSelect = document.querySelectorAll(".filter-select")
let activeItem = document.querySelector(".select-item");
dropdownSelect.forEach((i) => {
    let dropList = i.querySelector(".dropdown-list");

    i.addEventListener("click", (e) => {
        console.log(dropList);
        if (dropList.classList.contains('dropdown-active')) {
            turnOffDropdownList();
        } else {
            turnOffDropdownList();
            // console.log("list");
            activeItem = i;
            dropList.classList.toggle("dropdown-active");
            e.preventDefault();
            e.stopPropagation();
        }
    })
})
function turnOffDropdownList() {
    console.log("remove")
    dropdownList.forEach((i) => {
        // console.log(i);
        i.classList.remove('dropdown-active');
    }
    );
}
dropdownItem.forEach((item) => {
    item.addEventListener("click", (e) => {
        // turnOffDropdownList();
        const text = e.target.textContent;
        activeItem.querySelector(".select-item").textContent = text;
    })
})

window.addEventListener("click", (e) => {
    // console.log(e.target);
    dropdownList.forEach((i) => {
        if (!i.contains(e.target) && !e.target.matches(".menu-toggle")) {
            i.classList.remove('dropdown-active');
        }
    });
})
// close dropdown

// open modal search
const inputSearch = document.querySelector(".input-container")
const btnCancer = document.querySelector(".header-cancer")
const modalSearch = document.querySelector(".modal-search")
inputSearch.addEventListener("click", (e) => {
    e.preventDefault()
    modalSearch.classList.add('modalSearch-active')
    const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
    const body = document.body;
    body.style.position = 'fixed';
    body.style.top = `-${scrollY}`;
})
btnCancer.addEventListener("click", (e) => {
    e.preventDefault()
    const body = document.body;
    const scrollY = body.style.top;
    body.style.position = '';
    body.style.top = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);
    modalSearch.classList.remove('modalSearch-active');
})
window.addEventListener('scroll', () => {
    document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
});
// end open modal search

// open popup confirm
const modal_confirm = document.querySelector(".modal-confirm")
const modal_confirm_location = document.querySelector(".modal-confirm.confirm-location")
const confirm_active = document.querySelector(".confirm-active")
const btn_allow = document.querySelector(".btn-allow")
function myFunction() {
    setTimeout(active, 1500);
}
function active() {
    modal_confirm.classList.add("confirm-active")
}
myFunction()
btn_allow.addEventListener("click", (e) => {
    btn_allow.parentElement.parentElement.parentElement.classList.remove("confirm-active")
})
// end close open popup confirm


