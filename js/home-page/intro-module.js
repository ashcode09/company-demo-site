// Function to set the height of intro/landing module

var adjustHeightOfLandingPage = function(idOfLandingPageDiv) {
	var eachModuleId = findIdOfEachChildInBody();
	if (eachModuleId.indexOf(idOfLandingPageDiv) !== -1) {
  	adjustHeightOfElementToFillPage('#' +idOfLandingPageDiv);
  };
};

// LAnding/intro module to disappear when completely obsured

var landingPageDisappearWhenNotInView = function(idOfModuleWeAreIn) {
	if (idOfModuleWeAreIn === idOfLandingPageDiv) {
		$('#' + idOfLandingPageDiv).show();
	} else {
		$('#' + idOfLandingPageDiv).hide();
	};
};

// Get scroll down image on intro/landing page to animate on screen load - keep animating until scroll happens

var userHasScrolled = false;

var stopScrollDownImgAnimation = function(idOrClassOfAnimatedElement) {
	clearAnimationQueue(idOrClassOfAnimatedElement);
	userHasScrolled = true;
};

var moveElementUpAndDown = function(idOfElementToAnimate, delayBetweenEachAnimation, animationTime) {
	$('#' + idOfElementToAnimate).delay(delayBetweenEachAnimation).animate({
		'position': 'relative',
		'bottom': '70px'
	}, animationTime).delay(delayBetweenEachAnimation).animate({
		'position': 'relative',
		'bottom': '90px'
	}, animationTime);
};

var animateElementOnLoop = function(idOfElementToAnimate, delayBetweenEachAnimation, animationTime, animationFunction) {
	setInterval(function(){
		if (userHasScrolled === false) {
		  animationFunction(idOfElementToAnimate, delayBetweenEachAnimation, animationTime);
		};
	}, animationTime);
};

var clearAnimationQueue = function(element) {
	$(element).clearQueue();
};