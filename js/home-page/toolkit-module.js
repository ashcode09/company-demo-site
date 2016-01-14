// Functions to show and hide the Intro Toolkit boxes on hover

var showHoverBox = function(element) {
	$(element).find('.hover-boxes').fadeIn();
	$(element).find('.hover-boxes > *').stop().animate({
		'top': '0px',
		'opacity': 1
	}, hoverAnimateSpeed);
};

var hideHoverBox = function(element) {
	$(element).find('.hover-boxes > *').stop().animate({
		'top': '100%',
		'opacity': 0
	}, hoverAnimateSpeed, function() {
		$(element).find('.hover-boxes').fadeOut();
	});
};

// Stop Toolkit module covering the intro/landing page module by giving it a margin-top on load (as landing page/intro is a fixed element)

var adjustTopOfToolkitModule = function() {
	var heightOfViewport = window.innerHeight;
	adjustOffsetTopOfModule('toolkit', heightOfViewport)
};

// vertically centre align the logos in the toolkit module

var verticallyCentreAlignImagesInToolkit = function() {
	var heightOfToolLogoBox = $('.tool-logos').height();
	var eachImage = $('.tool-logos > .image');
	for (var i=0; i<eachImage.length; i++) {
		var heightOfImage = $(eachImage[i]).height();
		$(eachImage[i]).css('top', (heightOfToolLogoBox - heightOfImage)/2 + 'px' );
	};
};