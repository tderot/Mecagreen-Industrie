var blinkText = document.getElementsByClassName("blinking");

function blink() {
	TweenLite.to(blinkText, 0.3, {
		autoAlpha: 0,
		delay: 0.3,
		onComplete: function() {
			TweenLite.to(blinkText, 0.3, {
				autoAlpha: 1,
				delay: 0.3,
				onComplete: blink
			});
		}
	});
}
blink();
