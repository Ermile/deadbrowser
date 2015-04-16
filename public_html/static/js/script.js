var OSName = "Unknown OS";
if (navigator.appVersion.indexOf("Win")!=-1) OSName = "Windows";
if (navigator.appVersion.indexOf("Mac")!=-1) OSName = "MacOS";
if (navigator.appVersion.indexOf("X11")!=-1) OSName = "UNIX";
if (navigator.appVersion.indexOf("Linux")!=-1) OSName ="Linux";

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

var b     	 = navigator.sayswho;
var bName 	 = b.split(' ')[0];
var bVersion = b.split(' ')[1];

var br = ['IE', 'Firefox', 'Chrome', 'Opera', 'Safari'];

function setIcon(browser) {
	for (a in br) {
		if (browser == br[a]) {
			$('.icon').addClass(browser);
		}
	}
}

$(document).ready(function() {
	if (typeof navigator.userAgent === 'undefined') {
		$('.query').html('navigator.userAgent is not available in your browser.');
	} else {
		$('.query').html("You're using " + b + " on " + OSName + ".");
	}

	setIcon(bName);

	$('.browser.' + bName).parents('li').remove();
});