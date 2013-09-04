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
			dialog.html(data);
			// display modal
			dialog.modal({
				show: 'true'
			});
		});
	});

	// listing row select
	$('.select-box').change(function() {
		var val = $(this).is(':checked');
		if (val == true) {
			$(this).parents('tr').addClass('success');
		} else {
			$(this).parents('tr').removeClass('success');
		}
	});

	// add material
	$('#material-add').click(function() {
		// grab elements
		var form = $('#form-add-material');
		var dialog = $('#dialog-publication');
		var print = $('.select-box');

		// prepare post data
		var data = new Array();
		print.each(function() {
			if ($(this).is(':checked') == true) {
				data.push($(this).attr('value'));
			}
		});

		// if none selected, abort
		if (data.length == 0) {
			return;
		}

		// submit data
		$.post(form.attr('action'), {
			data: JSON.stringify(data)
		}).done(function(data) {
			//set content
			dialog.html(data);
			// display modal
			dialog.modal({
				show: 'true'
			});
		});
	});
});