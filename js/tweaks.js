$ = jQuery; // Needed by materialize

(function($) {
    $(function() {
        $('#cff .cff-item:contains("updated their cover photo")').remove();
        $('.menu li').addClass('waves-effect');

        $('p:empty').remove();
        $('h1:empty').remove();
        if(!$.trim($('.content').html())) $('.content').remove();

        $('h1').each(function(){
            var me = $(this);
            me.html( me.text().replace(/(^\w+)/,'<em>$1</em>') );
        });

        $('.gallery').slick({
            dots: true,
            infinite: false,
            autoplay: true,
            easing: 'swing',
            pauseOnDotsHover: true,
            cssEase: 'ease-out',
            slidesToShow: 1
        });
    });
})(jQuery);