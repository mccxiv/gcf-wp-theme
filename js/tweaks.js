$ = jQuery; // Needed by materialize

(function($) {
    $(function() {
        $('#cff .cff-item:contains("updated their cover photo")').remove();
        $('.menu li').addClass('waves-effect');
        console.log('Tweaks');
    });
})(jQuery);