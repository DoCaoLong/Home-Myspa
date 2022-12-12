// MAP
// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: 10.79938535229273, lng: 106.68535610761758 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 18,
        center: uluru,
    });
    // The marker, positioned at Uluru 
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
// close map

// slider
// $('.cards').owlCarousel({
//     loop: false,
//     nav: false,
//     margin: 20,
//     dots: false,
//     responsive: {
//         0: {
//             items: 1.5
//         },
//         600: {
//             items: 2.5
//         },
//         1000: {
//             items: 5
//         }
//     }
// })
// close slider

