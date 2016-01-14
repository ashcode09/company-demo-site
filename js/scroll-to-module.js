// Function for clicking on a side bar element or the landing page scroll down element to animate scroll to a target module

var goHere = function(idOfModule, animationLength) {
	var topOfTargetModule;
	if ((idOfModule == idOfLandingPageDiv) || (idOfModule === 'topOfPage')) {
		topOfTargetModule = 0;
	} else {
		topOfTargetModule = findOffsetTopOfModule(idOfModule);
		animationLength = animationLength || 1000;
		findOffsetTopOfModule(idOfModule);
		topOfTargetModule = topOfTargetModule - heightOfSmallerHeader + 1;
	};
	$('html, body').animate({
	  scrollTop: topOfTargetModule
	}, animationLength);
};