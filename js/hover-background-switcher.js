(function($) {
	var body = $('body');

	$('.sidebar .menu a[data-background-image]').each(function(i, element) {
		var id = element.id? element.id : 'id'+ Math.random().toString(36).substr(2, 9);
		var bg = $('<div data-for-id="'+id+'">');
		var bgimage = $(this).data('background-image');

		bg.addClass('background');
		bg.css('background-image', bgimage);
		$(element).attr('id', id);
		body.append(bg);
	});

	$(document).on('mouseenter', '.sidebar .menu a[data-background-image]', function(e) {
		var a = $(e.target);
		var id = e.target.id;
		var bg = $('.background[data-for-id="'+id+'"]');

		bg.animate({opacity: 1}, {queue: false, duration: 200});
		a.one('mouseleave', function() {
			bg.animate({opacity: 0}, {queue: false, duration: 200});
		});
	});
}(jQuery));