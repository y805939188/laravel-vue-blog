// 控制main标签和滚轮的比例
(function() {
	var num = 3;
	var main = document.getElementsByTagName('main')[0];
	var mainH = main.offsetHeight;
	var wrapper = document.getElementById('wrapper');
	var myName = document.getElementsByClassName('trigger-headline--hidden')[0];
	wrapper.style.top = mainH + 30 + 'px';
	window.addEventListener('scroll',function(){
		var scrollH = document.documentElement.scrollTop || document.body.scrollTop;
		if(scrollH > mainH * 0.6) {
			myName.style.opacity = 0;
		}else {
			myName.style.opacity = 1;
		}
		if(!(scrollH >= mainH)) {
			main.style.top = -(scrollH / num) + 'px';
		}
	})
}())