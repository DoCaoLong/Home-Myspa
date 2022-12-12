window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    waitForElm('#histats_counter').then((item) => {
        item.remove();
    });
    waitForElm('#sovrn_beacon').then((item) => {
        item.remove();
    });
    setTimeout(function() {
        document.querySelectorAll('img,iframe').forEach(function(item) {
            if (item.src.includes('simpli.fi') || item.src.includes('ap.lijit') || item.src.includes('i.liadm')) {
                item.remove();
            }
        })
    }, 9000);
})

function waitForElm(selector) {
    return new Promise(resolve => {
        if (document.querySelector(selector)) {
            return resolve(document.querySelector(selector));
        }
        const observer = new MutationObserver(mutations => {
            if (document.querySelector(selector)) {
                resolve(document.querySelector(selector));
                observer.disconnect();
            }
        });
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
}