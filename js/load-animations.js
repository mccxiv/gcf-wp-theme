(function($) {
    $(function() {
        $('.content, .sidebar').css('opacity', 0);
        setTimeout(function() {
            $('.content').addClass('animated fadeIn');
            $('.sidebar').addClass('animated fadeInLeft');
        }, 400);

        $('.background.default').css('opacity', 0).waitForImages(true).done(function() {
            $(this).addClass('transition250').css('opacity', 1);
        });
    });
})(jQuery);
