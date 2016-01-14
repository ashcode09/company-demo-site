// Attempting to parallax scroll the background image of the #toolkit module

var giveBgImageDownwardsParallaxEffect = function(classOfElementToParallax) {
	if (window.innerWidth > mobileBreakpoint) {
		var parallaxBgImg = $("." + classOfElementToParallax);
	  var speed = 1.5;
	  var parallaxElements = [].slice.call(parallaxBgImg);
	  parallaxElements.forEach(function(element,i){
	    var windowYOffset = window.pageYOffset;
			var elementYOffset = element.offsetTop + 150;
			var elementBackgrounPos = "50% " + ((windowYOffset - elementYOffset) * speed) + "px";
	    element.style.backgroundPosition = elementBackgrounPos;
	  });
	};
};