//handle currency
function currency_formatter() {
    switch (CURRENT_CURRENCY) {
        case 'USD':
            CURRENCY_SYMBOL = '$';
            BASE_CURRENCY_SYMBOL = CURRENCY_SYMBOL;
            $('.fcurrency,.fcurrency-tooltip').each(function(index,el) {
                el = $(el);
                let fcurrency = parseFloat(el.attr('data-cval'));
                fcurrency = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(fcurrency);
                el.hasClass('fcurrency') ? el.text(fcurrency) : el.attr('data-original-title',fcurrency);
            });
            break;

        case 'JPY':
            CURRENCY_SYMBOL = '¥';
            BASE_CURRENCY_SYMBOL = CURRENCY_SYMBOL;
            $('.fcurrency,.fcurrency-tooltip').each(function(index,el) {
                el = $(el);
                console.log("TCL: functioncurrency_formatter -> el", el)
                let fcurrency = parseFloat(el.attr('data-cval'));
                fcurrency = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'JPY' }).format(fcurrency);
                el.hasClass('fcurrency') ? el.text(fcurrency) : el.attr('data-original-title',fcurrency);
            });
            break;
    
        default:
            break;
    }
}