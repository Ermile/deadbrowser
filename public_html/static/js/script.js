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

var browser = navigator.sayswho;
var browserName = browser.split(' ')[0];
var browserLogo = "static/images/" + browserName + ".png";

$(document).ready(function() {
	$('.browser-logo').css({
		'background': 'url(' + browserLogo + ') no-repeat'
	});

	$('.browser-version').text('You are using ' + browser);
});