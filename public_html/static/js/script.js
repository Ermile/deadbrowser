var browserDetect = {
	init: function() {
		if (typeof navigator.userAgent === 'undefined') {
			browserDetect.showInfo('navigator.userAgent is not available in your browser.');
		} else if ( $(this).attr('id') === 'navigator-obj' ) {
			browserDetect.navigatorObj();
		} else {
			browserDetect.detectJS();
		}
	},

	navigatorObj: function() {
		browserDetect.showInfo(navigator.userAgent);
	},

	detectJS: function() {
		b = detect.parse(navigator.userAgent);

		if (b.device.type === 'Desktop') {
			browserDetect.showInfo(
				'Your browser is ' + b.browser.name + '</br>' +
				'Your device type is ' + b.device.type + '</br>' +
				'Your operating system is ' + b.os.name + '</br>'
			);
		} else {
			browserDetect.showInfo('Sorry! Your device is not a desktop!');
		}
	},

	showInfo: function(m) {
		$('#message-area').html(m);
	}
}

$(document).ready(function() {
	browserDetect.init();
});