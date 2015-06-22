(function($) {
    $(function() {
        var sidebar = $('.sidebar');
        var borderColorTargets = $('.content, .content h1');
        var lis = $('.menu li');

        $.cssHooks['filter'] = {
            set: function(elem, value) {
                elem.style['-webkit-filter'] = value;
                elem.style['filter'] = value;
            }
        };

        lis.on('mouseenter', function() {
            setHue(lis.index(this));
            $(this).one('mouseleave', function() {
                // cannot just pass the function to .one
                // because of parameters
                setHue();
            });
        });

        setHue();

        /**
         * Changes the accent (based on hue shift), depending on the current menu item's index
         * @param [index] - Position in the menu, absence uses current page
         */
        function setHue(index) {
            if (!index && index !== 0) index = lis.index($('.menu .current-menu-item'));
            var hslInitialDegrees = 209;
            var degreeShift = (index*40);
            sidebar.css('filter', 'hue-rotate(' + degreeShift + 'deg)');
            borderColorTargets.css('border-color', 'hsl(' + (hslInitialDegrees + degreeShift) + ', 26%, 53%)');
        }
    });
}(jQuery));