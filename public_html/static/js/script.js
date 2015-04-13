navigator.sayswho = (function() {
	var ua = navigator.userAgent, tem;
	var M  = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	
	if (/trident/i.test(M[1])) {
		tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
		return 'IE '+(tem[1] || '');
	}

	if (M[1] === 'Chrome') {
		tem = ua.match(/\bOPR\/(\d+)/);
		if (tem != null) return 'Opera ' + tem[1];
	}

	M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
	if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
	return M.join(' ');
})();

var browser     = navigator.sayswho;
var browserName = browser.split(' ')[0];
var browserVersion = browser.split(' ')[1];
var browserLogo = "static/images/" + browserName + ".png";

$(document).ready(function() {
	$('.browser-logo').css({
		'background': 'url(' + browserLogo + ') no-repeat'
	});

	$('.browser-version span').text( $('.'+browserName.toLowerCase()).text() + ' ' + browserVersion );
	$('.'+browserName.toLowerCase()).addClass('hide');
	

	
});


// var browserDetect = {
// 	init: function() {
// 		if (typeof navigator.userAgent === 'undefined') {
// 			browserDetect.showInfo('navigator.userAgent is not available in your browser.');
// 		} else if ( $(this).attr('id') === 'navigator-obj' ) {
// 			browserDetect.navigatorObj();
// 		} else {
// 			browserDetect.detectJS();
// 		}
// 	},

// 	navigatorObj: function() {
// 		browserDetect.showInfo(navigator.userAgent);
// 	},

// 	detectJS: function() {
// 		b = detect.parse(navigator.userAgent);

// 		if (b.device.type === 'Desktop') {
// 			browserDetect.showInfo(
// 				'Your browser is ' + b.browser.name + '</br>' +
// 				'Your device type is ' + b.device.type + '</br>' +
// 				'Your operating system is ' + b.os.name + '</br>'
// 			);
// 		} else {
// 			browserDetect.showInfo('Sorry! Come back later!');
// 		}
// 	},

// 	showInfo: function(m) {
// 		$('#message-area').html(m);
// 	}
// }

// $(document).ready(function() {
// 	browserDetect.init();
// });