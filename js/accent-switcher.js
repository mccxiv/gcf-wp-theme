(function($) {
    $(function() {
        var sidebar = $('.sidebar');
        var highlighter = $('.background-highlighter');
        var borderColorTargets = $('.content, .content h1');
        var colorTargets;
        var lis = $('.menu li');

        setTimeout(function() {
            colorTargets = $('.content h1 em');
        }, 0);

        $.cssHooks['filter'] = {
            set: function(elem, value) {
                elem.style['-webkit-filter'] = value;
                elem.style['filter'] = value;
            }
        };

        lis.on('mouseenter', function() {
            var index = lis.index(this);
            highlighter.css('top', (index * 41) + 'px');
            setHue(index);
            $(this).one('mouseleave', function() {
                highlighter.css('top', '-41px');
                setHue();
            });
        });

        setHue();

        /**
         * Changes the accent (based on hue shift), depending on the current menu item's index
         * @param [index] - Position in the menu, absence uses current page
         */
        function setHue(index) {
            var currentMenuItem = $('.menu .current-menu-item');
            if (!index && index !== 0) index = currentMenuItem.length? lis.index(currentMenuItem) : 0;
            var hslInitialDegrees = 209;
            var degreeShift = (index*40);
            var hsl = 'hsl(' + (hslInitialDegrees + degreeShift) + ', 26%, 53%)';
            sidebar.css('filter', 'hue-rotate(' + degreeShift + 'deg)');
            borderColorTargets.css('border-color', hsl);
            setTimeout(function() {colorTargets.css('color', hsl)}, 1);
        }
    });
}(jQuery));