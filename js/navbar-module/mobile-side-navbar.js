// Get the collapsed navbar to appear from the right side of the screen

var navbarCollapseToggle = function(idOrClassOfElementsToCollapse, cssClassDefiningOpenNavbar) {
	var elementsToCollapse = $(idOrClassOfElementsToCollapse);
	if (elementsToCollapse.hasClass(cssClassDefiningOpenNavbar)) {
		closeNavBarAndPullPageBack(idOrClassOfElementsToCollapse, cssClassDefiningOpenNavbar);
	} else {
		openNavBarAndPushPageOver(idOrClassOfElementsToCollapse, cssClassDefiningOpenNavbar);
	};
};

var closeNavBarAndPullPageBack = function(idOrClassOfElementsToCollapse, cssClassDefiningOpenNavbar) {
	var elementsToCollapse = $(idOrClassOfElementsToCollapse);
	elementsToCollapse.removeClass(cssClassDefiningOpenNavbar);
	setBodyWidthAndScroll('100%', 'scroll', 'relative')
	moveNavBarAndPageOver(0, 200);
};

var openNavBarAndPushPageOver = function(idOrClassOfElementsToCollapse, cssClassDefiningOpenNavbar) {
	var elementsToCollapse = $(idOrClassOfElementsToCollapse);
	elementsToCollapse.addClass(cssClassDefiningOpenNavbar);
	var widthOfNavBar = $('#navBarCollapse').width();
	var widthOfbody = $('body').width();
	setBodyWidthAndScroll(widthOfbody + 'px', 'hidden', 'absolute');
	moveNavBarAndPageOver(widthOfNavBar, 300);
	adjustHeightOfElementToFillPage('#navBarCollapse');
};

var moveNavBarAndPageOver = function(pixelsToMoveBy, animationTime) {
	var elementsToMove = ['body', '#' + idOfLandingPageDiv + ' > .container', '.navbar-left'];
	for (i=0; i<elementsToMove.length; i++) {
		$(elementsToMove[i]).animate({
			'right': pixelsToMoveBy + 'px'
		}, animationTime);
	};
};

var setBodyWidthAndScroll = function(widthOfBodyToBe, hiddenOrScroll, position) {
	$('body').css('width', widthOfBodyToBe);
	$('body').css('overflow-y', hiddenOrScroll);
	$('body').css('position', position);
};

// TRYING TO SWIPE LEFT AND RIGHT FOR NAVBAR COLLAPSE

var enableSwipingForCollapsedNav = function() {
	if (/Mobi/.test(navigator.userAgent)) {
    var myElement = $('body')[0]
		var hammertime = new Hammer(myElement);
		hammertime.on("swipeleft", openNavBar);
		hammertime.on("swiperight", closeNavBar);
	};
};

var closeNavBar = function(event) {
	closeNavBarAndPullPageBack('#navBarCollapse', 'opened');
};

var openNavBar = function(event) {
	var eachModuleId = findIdOfEachChildInBody();
	var offsetOfEachModule = findOffsetTopOfEachModule(eachModuleId);
	var whereAmINow = whichModuleAmILookingAtNow(eachModuleId, offsetOfEachModule);
	if (whereAmINow !== 'testimonials') {
		openNavBarAndPushPageOver('#navBarCollapse', 'opened');
	};
};

// Function to make sure navbar height only changes when we're in mobile view - it should stay the same for larger screens

var closeNavBarIfInDeskTopView = function(idOrClassOfNavBarCollapse, cssClassDefiningOpenNavbar) {
	var elementsToCollapse = $(idOrClassOfNavBarCollapse);
	if (window.innerWidth> navbarBreakpoint) {
		closeNavBarAndPullPageBack(elementsToCollapse, cssClassDefiningOpenNavbar);
		$(idOrClassOfNavBarCollapse).height(20);
	};
};