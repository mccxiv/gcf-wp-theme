$ = jQuery; // Needed by materialize

(function($) {
    $(function() {
        $('#cff .cff-item:contains("updated their cover photo")').remove();
        $('.menu li').addClass('waves-effect');

        $('.menu li:first-child a').on('click', function(e) {
            alert('Homepage not implemented yet');
            e.preventDefault();
        });

        $('p:empty').remove();
    });
})(jQuery);