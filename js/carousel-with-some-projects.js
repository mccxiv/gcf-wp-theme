(function() {
    var carousel = $('.carousel-with-some-projects');
    carousel.slick({
        dots: true,
        arrows: true,
        infinite: false,
        autoplay: false,
        autoplaySpeed: 6000,
        easing: 'swing',
        pauseOnDotsHover: true,
        cssEase: 'ease-out',
        slidesToShow: 1
    });

    carousel.find('.text').click(function() {
        window.location.href = $(this).data('href');
    });

})();

