$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll > 0) {
			$("header").addClass("sticky");
		} else {
			$("header").removeClass("sticky");
		}
});
