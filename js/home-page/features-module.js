// Animate features images when scrolled into view

var animateOneByOneWhenInView = function(idOfContainerElement, classOfElementsToAnimate) {
	var eachModuleId = findIdOfEachChildInBody();
	if ((window.innerWidth > navbarBreakpoint) && (eachModuleId.indexOf(idOfContainerElement) !== -1)) {
	  var whenHalfContainerElementInView = checkIfModuleIsInView(idOfContainerElement, 'halfOfModule');
	  var eachFeature = $('.' + classOfElementsToAnimate);
	  if (whenHalfContainerElementInView) {
			var initialDelay = 0;
			var delayBetween = 300;
			eachFeature.each(function() {
				$(this).delay(initialDelay).animate({
				 	'opacity': 1,
					'top': '-20px'
				}, delayBetween);
				initialDelay += delayBetween;
			});
	  };
	} else {
		$('.' + classOfElementsToAnimate).css('opacity', 1);
	};
};