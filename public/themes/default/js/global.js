function notify(message, type, y_offset = 20)
{
	$.growl({
		message: message,
		url: ''
	}, {
		element: 'body',
		type: type,
		allow_dismiss: true,
		offset: {
			x: 20,
			y: y_offset,
		},
		spacing: 10,
		z_index: 1031,
		delay: 2500,
		timer: 1000,
		url_target: '_blank',
		mouse_over: false,
		animate: {
			enter: 'animated bounceInRight',
			exit: 'animated bounceOutRight'
		},
		icon_type: 'class',
		template: '<div data-growl="container" class="alert" role="alert">' +
						'<button type="button" class="close" data-growl="dismiss">' +
							'<span aria-hidden="true">&times;</span>' +
							'<span class="sr-only">Close</span>' +
						'</button>' +
						'<span data-growl="message"></span>' +
						'<a href="#" data-growl="url"></a>' +
					'</div>'
	});
}

$(function() {
	// Show Template::message() as Notification
	$('.notification').each(function(i) {
		if (typeof notification_y_offset != 'undefined')
			notify($(this).html(), $(this).data('notification-type') ? $(this).data('notification-type') : 'info', notification_y_offset);
		else 
			notify($(this).html(), $(this).data('notification-type') ? $(this).data('notification-type') : 'info');
	});

	// Focus mode for Chosen
	$('.chosen').chosen().each(function(idx) {
		var element_id = $(this).attr('id') + '_chosen';
		$('div#' + element_id + ' input').focus(function () {
			$('div#' + element_id).parent().addClass('fg-toggled');
		});
		$('div#' + element_id + ' input').blur(function () {
			$('div#' + element_id).parent().removeClass('fg-toggled');
		});
	});
});

// Store & set theme color by localstorage
// Check browser support
if (typeof(Storage) !== "undefined") {
	if (localStorage.getItem("theme_color")) {
		// Set theme color
		if (document.querySelectorAll('[data-ma-theme]').length > 0) document.querySelectorAll('[data-ma-theme]')[0].setAttribute("data-ma-theme", localStorage.getItem("theme_color"));
	} else {
		// Set default theme to blue
		localStorage.setItem("theme_color", "blue");
	}
}