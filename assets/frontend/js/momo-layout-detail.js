var service_type_option = $('#service-type');
service_type_option.owlCarousel({
    loop: false,
    margin: 16,
    center: true,
    onDragged: slide_to_service_tag,
    dots: false,
    responsive: {
        0: {
            items: 2.5
        },
        600: {
            items: 2.5
        },
        1000: {
            items: 5
        }
    }
})
function slide_to_service_tag(event) {
    let item = $(".service-section .service-type")[event.item.index];
    var jItem = $(item);
    $([document.documentElement, document.body]).animate({
        scrollTop: jItem.offset().top - 50
    }, 100);
}
