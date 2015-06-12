(function($) {
	var accents = ['accent-1', 'accent-2', 'accent-3', 'accent-4', 'accent-5', 'accent-6', 'accent-7'];
	var accentsString = accents.join(' ');

	var html = $('html');
	var pageAccent = findCurrentAccent();

	$(document).on('mouseenter', '[data-accent]', function() {
		var dis = $(this);
		var className = dis.data('accent');

		// remove all
		cleanUp();

		// add the correct one
		html.addClass(className);

		dis.one('mouseleave', function() {
			// replace with original
			html.removeClass(className);
			html.addClass(pageAccent);
		});
	});

	$(document).on('click', 'a[data-accent]', function() {
		var dis = $(this);
		var className = dis.data('accent');

		pageAccent = className;

		cleanUp();
		html.addClass(className);
	});

	function cleanUp() {
		html.removeClass(accentsString);
	}

	function findCurrentAccent() {
		var found = false;
		accents.forEach(function(accent) {
			if (html.hasClass(accent)) found = accent;
		});
		return found;
	}
}(jQuery));