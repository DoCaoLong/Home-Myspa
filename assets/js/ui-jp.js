+function($) {

    $(function() {

        $("[ui-jq]").each(function() {
            var self = $(this);
            var options = eval('[' + self.attr('ui-options') + ']');

            if ($.isPlainObject(options[0])) {
                options[0] = $.extend({}, options[0]);
            }

            uiLoad.load(jp_config[self.attr('ui-jq')]).then(function() {
                self[self.attr('ui-jq')].apply(self, options);
            });
        });
        $('.numbersOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        $('#modal_alert button').click(function() {
            $('#modal_alert').fadeOut(300);
        });
    });
}(jQuery);

function render_ui(element) {
    var self = $('#' + element);
    var options = eval('[' + self.attr('ui-options') + ']');

    if ($.isPlainObject(options[0])) {
        options[0] = $.extend({}, options[0]);
    }

    uiLoad.load(jp_config[self.attr('ui-jq')]).then(function() {
        self[self.attr('ui-jq')].apply(self, options);
    });
}
function render_ui_flex(element) {
    var self = $('.' + element);
    var options = eval('[' + self.attr('ui-options') + ']');

    if ($.isPlainObject(options[0])) {
        options[0] = $.extend({}, options[0]);
    }

    uiLoad.load(jp_config[self.attr('ui-jq')]).then(function() {
        self[self.attr('ui-jq')].apply(self, options);
    });
}