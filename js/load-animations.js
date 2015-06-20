(function($) {
    $(function() {
        //$('.content, .sidebar').css('opacity', 1);
        setTimeout(function() {
            $('.sidebar').addClass('animated fadeInLeft');
            $('.content').addClass('animated fadeInUp');
        }, 400);

        $('.background.default').css('opacity', 0).waitForImages(true).done(function() {
            $(this).addClass('transition500').css('opacity', 1);
        });

        $(window).on('beforeunload', function() {
            $('.sidebar').addClass('animated-out fadeOutLeft');
            $('.content').addClass('animated-out fadeOutDown');
        })
    });
})(jQuery);
