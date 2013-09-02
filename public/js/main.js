$(function() {
	// document ready

	// edit link in publications listing
	$('table#publications a').click(function(event) {
		// prevent lin form opening
		event.preventDefault();

		// grab url
		var url=$(this).attr('href');

		// get url content
		var dialog = $('#dialog-publication');
		$.get(url, function(data) {
			//set content
			dialog.html(data)
			// display modal
			dialog.modal({
				show: 'true'
			});
		});
	});

	$('.select').click(function() {
		var parent = $(this).parent();
		var input = parent.find('input[type=checkbox]');
		var status = input.is(':checked');
		
		parent.toggleClass('success');
		input.attr('checked', !status);
	});
});