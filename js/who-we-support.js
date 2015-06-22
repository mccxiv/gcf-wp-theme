(function($) {
    var buttons = $('.project-area-button');
    var COLORS = {
        'health': 'hsl(303, 40%, 95%)',
        'education': 'hsl(56, 40%, 94%)',
        'environment': 'hsl(229, 40%, 95%)',
        'local-economic-development': 'hsl(0, 40%, 95%)'
    };

    buttons.each(function() {
        var area = $(this).data('area');
        $(this).css('background-color', COLORS[area]);
    });

    $('.project-area-tag').each(function() {
        $(this).css('background-color', COLORS[$(this).data('area')]);
    });

    buttons.on('click', function() {
        var button = $(this);
        var area = button.data('area');
        var projects = $('.project');

        if (button.hasClass('reset-button')) {
            $('.project-list').css('background-color', 'transparent');
            $('.project-area-button').removeClass('selected');
            button.hide('fast');
            projects.show('fast');
        }

        else {
            $('.reset-button').show('fast').css('display', 'table');
            $('.project-list').css('background-color', COLORS[area]);
            $('.project-area-button').removeClass('selected');
            button.addClass('selected');
            projects.hide('fast').each(function() {
                var project = $(this);
                project.find('.project-area-tag').each(function() {
                    if ($(this).data('area') === area) {
                        project.show('fast');
                    }
                });
            });
        }
    });

})(jQuery);