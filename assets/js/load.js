/*function loadScript(src) {
	var script = document.createElement('script');
	script.src = src;
	var myProm = new Promise(function(resolve, reject){
		resolve(document.getElementsByTagName('body')[0].appendChild(script));
	}).catch((error)=>{
		console.log('error:'+error);
		return error;
	});
	return myProm;
}*/
var load = (function() {
	function _load(tag) {
		return function(url) {
			return new Promise(function(resolve, reject) {
				var element = document.createElement(tag);
				var parent = 'body';
				var attr = 'src';
				element.onload = function() {
					resolve(url);
				};
				element.onerror = function() {
					reject(url);
				};
				switch(tag) {
					case 'script':
						element.async = true;
						break;
					case 'link':
						element.type = 'text/css';
						element.rel = 'stylesheet';
						attr = 'href';
						parent = 'head';
						break;
					default:
						element.type = 'img';
						attr = 'src';
						break;
				}
				element[attr] = url;
				document[parent].appendChild(element);
			});
		};
	}
	return {
		css: _load('link'),
		js: _load('script'),
		img: _load('img')
	}
})();