// Mobile and navigation bar breakpoints

var navbarBreakpoint = 1282;
var mobileBreakpoint = 767;

// ID of landing/intro module on home page

var idOfLandingPageDiv = "intro";

// Height of navbar header

var heightOfSmallerHeader = $('#navbarHeader').outerHeight() - 20;

// Colour variabless for sidebar buttons

var activeBtnColour = '#5D9BD2';
var colourWhenOnLightBg = '#959595';
var colourWhenOnDarkBg = '#ffffff';

// Hover animation speed variable

var hoverAnimateSpeed = 100;

// Number of the current testimonial quote showing

var currentQuoteShowing = 1;

// ----// Help page - Telling the browser what to do when page is loaded, when page is scrolled and when browser is resized

var openCategory = function(element, animationLength) {
	var elementToExpand = $(element).parent().siblings('.accordion-body');
	$('.accordion-body').not(elementToExpand).animate({
		'height': '0px',
		'opacity': 0
	}, animationLength);
	$('.accordion-body').children('.accordion-inner').hide();
	$(elementToExpand).children('.accordion-inner').show();
	var heightOfElement = elementToExpand.children('.accordion-inner').height();
	$(elementToExpand).animate({
		'height': heightOfElement + 'px',
		'opacity': 1
	}, animationLength);
};// ----// Functions to change the style of the header once past the first module

var toggleHeaderStyle = function() {
	var eachModuleId = findIdOfEachChildInBody();
	var offsetOfEachModule = findOffsetTopOfEachModule(eachModuleId);
	var eachSideBarBtnId = findIdOfEachSideBarBtn();
	var eachModuleBtn = linkEachBtnToModule(eachSideBarBtnId, eachModuleId);
	var whereAmINow = whichModuleAmILookingAtNow(eachModuleId, offsetOfEachModule, eachModuleBtn);
	if (whereAmINow === idOfLandingPageDiv) {
		$('#navbarHeader').removeClass('navbar-scrolled-down');
		$('.showOnLightBg').hide();
		$('.showOnDarkBg').show();
	} else {
		$('#navbarHeader').addClass('navbar-scrolled-down');
		$('.showOnLightBg').show();
		$('.showOnDarkBg').hide();
	};
};// ----// Get the collapsed navbar to appear from the right side of the screen

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
};// ----// Animate features images when scrolled into view

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
};// ----// Function to set the height of intro/landing module

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
};// ----// Function for showing the side bar labels when button is hovered over

var showLabel = function(element) {
	$(element).siblings(".label").children().css('display', 'inline-block')
};

var hideLabel = function(element) {
	$(element).siblings(".label").children().css('display', 'none')
};

var verticallyCentreAlignSideBarToEachModule = function() {
	var eachModuleId = findIdOfEachChildInBody();
	var offsetOfEachModule = findOffsetTopOfEachModule(eachModuleId);
	var eachSideBarBtnId = findIdOfEachSideBarBtn();
	var eachModuleBtn = linkEachBtnToModule(eachSideBarBtnId, eachModuleId);
	var whereAmINow = whichModuleAmILookingAtNow(eachModuleId, offsetOfEachModule, eachModuleBtn);
	var canWeSeeModule = checkIfModuleIsInView(whereAmINow, 'wholeOfModule');
	if (canWeSeeModule === true) {
		var heightOfModuleWereIn = $('#' + whereAmINow).outerHeight();
		var whereModuleIsFromTop = findOffsetTopOfModule(whereAmINow) - $(window).scrollTop();
		var heightOfSideBar = $('#sidebar').height();
		var sideBarDistanceFromTop = (heightOfModuleWereIn - heightOfSideBar) / 2;
		var distanceExcHeaderHeight = whereModuleIsFromTop + sideBarDistanceFromTop;
		if (whereAmINow === eachModuleId[0]) {
			distanceExcHeaderHeight = sideBarDistanceFromTop;
		};	
		var distanceInPx = distanceExcHeaderHeight + 'px';
		$('#sidebar').animate({
			'top': distanceInPx
		}, 500);
	};
	changeStyleOfSideBar();
};

var verticallyCentreAlignSideBarToViewport = function() {
	var heightOfViewport = window.innerHeight;
	var heightOfSideBar = $('#sidebar').height();
	var sideBarDistanceFromTop = (heightOfViewport - heightOfSideBar) / 2;
	$('#sidebar').css('top', sideBarDistanceFromTop);
};

// Attempting to get the side bar buttons to change colour depending on what section they're sat in... Wish me luck

var changeStyleOfSideBar = function() {
	var eachModuleId = findIdOfEachChildInBody();
	var eachSideBarBtnId = findIdOfEachSideBarBtn();
	var offsetOfEachModule = findOffsetTopOfEachModule(eachModuleId);
	var sideBarBtnsOffsetTop = findOffsetTopOfEachSideBarBtn(eachSideBarBtnId);
	var eachModuleBtn = linkEachBtnToModule(eachSideBarBtnId, eachModuleId);
	var whereEachSideBarIsRightNow = findOutModuleEachSideBarBtnIsIn(eachModuleId, eachSideBarBtnId, sideBarBtnsOffsetTop, offsetOfEachModule);
	var whereAmINow = whichModuleAmILookingAtNow(eachModuleId, offsetOfEachModule, eachModuleBtn);
	var whichButtonIsActive = eachModuleBtn[whereAmINow];
	changeColOfSideBarBtn(eachSideBarBtnId, whereEachSideBarIsRightNow, whichButtonIsActive);
	adjustColOfActiveSideBarBtn(whichButtonIsActive, activeBtnColour);
	landingPageDisappearWhenNotInView(whereAmINow);
};

var changeColOfSideBarBtn = function(eachSideBarBtnId, whereEachSideBarIsRightNow) {
	var modulesWithLightBackgrounds = ['toolkit', 'bundles', 'features'];
	var modulesWithDarkBackgrounds = [idOfLandingPageDiv, 'video', 'planhq', 'bcsg'];
	for (var j=0; j<eachSideBarBtnId.length; j++) {
		changeBgColOfOneElementReModuleBgCol(modulesWithLightBackgrounds, whereEachSideBarIsRightNow, eachSideBarBtnId[j], colourWhenOnLightBg);
		changeBgColOfOneElementReModuleBgCol(modulesWithDarkBackgrounds, whereEachSideBarIsRightNow, eachSideBarBtnId[j], colourWhenOnDarkBg);
	};
};

var changeBgColOfOneElementReModuleBgCol = function(moduleGroupToCheckAgainst, whereEachSideBarIsRightNow, targetElementId, colourToChangeTo) {
	if (moduleGroupToCheckAgainst.indexOf(whereEachSideBarIsRightNow[targetElementId]) !== -1) {
		$('#' + targetElementId).css('background-color', colourToChangeTo);
	};
};

var adjustColOfActiveSideBarBtn = function(whichButtonIsActive, activeBtnColour) {
	$('#' + whichButtonIsActive).css('background-color', activeBtnColour);
};

var findOutModuleEachSideBarBtnIsIn = function(eachModuleId, eachSideBarBtnId, sideBarBtnsOffsetTop, offsetOfEachModule) {
	var whereEachSideBarIsRightNow = {};
	for (var i=0; i<eachModuleId.length; i++) {
		for (var j=0; j<eachSideBarBtnId.length; j++) {
			if (sideBarBtnsOffsetTop[eachSideBarBtnId[j]] > offsetOfEachModule[eachModuleId[i]]) {
				whereEachSideBarIsRightNow[eachSideBarBtnId[j]] = eachModuleId[i];
			};
		};
	};
	return whereEachSideBarIsRightNow;
};

var linkEachBtnToModule = function(eachSideBarBtnId, eachModuleId) {
	var eachModuleBtn = {};
	for (var k=0; k<eachSideBarBtnId.length; k++) {
		eachModuleBtn[eachModuleId[k]] = eachSideBarBtnId[k];
	};
	return eachModuleBtn;
};

var findOffsetTopOfEachSideBarBtn = function(eachSideBarBtnId) {
	var sideBarBtnsOffsetTop = {};
	for (var i=0; i<eachSideBarBtnId.length; i++) {
		var eachId = eachSideBarBtnId[i];
		sideBarBtnsOffsetTop[eachId] = findOffsetTopOfModule(eachId);
	};
	return sideBarBtnsOffsetTop;
};

var findIdOfEachSideBarBtn = function() {
	var eachSideBarBtnId = [];
	var eachSideBarBtn = $('.sidebar-buttons');
	for (var i=0; i<eachSideBarBtn.length; i++) {
		eachSideBarBtnId.push(eachSideBarBtn[i].id);
	};
	return eachSideBarBtnId;
};

var findIdOfEachChildInBody = function() {
	var eachModuleId = [];
	var childrenNotToBeIncluded = ["", "meta", "sidebar", "navbarHeader", "footer"]
	var allModules = $('body').children();
	for (var eachModule=0; eachModule<allModules.length; eachModule++) {
		if (childrenNotToBeIncluded.indexOf(allModules[eachModule].id) === -1) {
			eachModuleId.push(allModules[eachModule].id);
		};
	};
	return eachModuleId;
};

var findOffsetTopOfEachModule = function(eachModuleId) {
	var offsetOfEachModule = {};
	for (var i=0; i<eachModuleId.length; i++) {
		var eachId = eachModuleId[i];
		var offsetTopOfModule = findOffsetTopOfModule(eachId);
		offsetOfEachModule[eachId] = offsetTopOfModule;
	};
	return offsetOfEachModule;
};

// Generate side bar buttons according to the modules on the page

var generateSideBarButtons = function() {
	var eachModuleId = findIdOfEachChildInBody();
	var sidebarButtons = "";
	for (var i=0; i<eachModuleId.length; i++) {
		sidebarButtons += "<tr><td class='label'><div class='label-arrows text-uppercase'>" + eachModuleId[i] + "</div></td><td class='button' onmouseenter='showLabel(this)' onmouseleave='hideLabel(this)'><div id='button" + i + "' onclick=\"goHere('" + eachModuleId[i] + "')\" class='sidebar-buttons'></div></td></tr>";
	};
	document.getElementById('sidebarTableBody').innerHTML = sidebarButtons;
};
// ----// Functions to show and hide the Intro Toolkit boxes on hover

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
};// ----// Video Player - getting the video to play & expand, and pause & get smaller when play/pause images clicked

var findOrigHeightOfVideoContainer = function(idOfVideoContainingDiv) {
	var initialHeightOfVideoContainer = $('#' + idOfVideoContainingDiv).height();
	return initialHeightOfVideoContainer;
};

var togglePlay = function() {
	var heightOfVideo = $('#actualVideo').height();
	var animationLength = 1000;
	if (document.getElementById('actualVideo').paused) {
		document.getElementById('actualVideo').play();
		$('#playButton').hide();
		$('#pauseButton').show();
		$('#video').animate({
			height: heightOfVideo
		}, animationLength);
		verticallyAlignVidBtns(heightOfVideo, animationLength);
	} else {
		$('#pauseButton').hide();
		$('#playButton').show();
		if (window.innerWidth > navbarBreakpoint) {
			$('#video').animate({
				height: initialHeightOfVideoContainer
			}, animationLength);
		verticallyAlignVidBtns(initialHeightOfVideoContainer, animationLength);
		} else {
			$('#video').css('height', heightOfVideo);
			verticallyAlignVidBtns(heightOfVideo, animationLength);
		};
		document.getElementById('actualVideo').pause();
	};
};

// Get video container to contain the video whenever resized!!!!!

var vidContainerToContainVideo = function() {
	var animationLength = 100;
	var heightOfVideo = $('#actualVideo').height();
	var currentContainerHeight = findOrigHeightOfVideoContainer('video');
	if (window.innerWidth < navbarBreakpoint) {
		$('#video').css('height', heightOfVideo);
		var heightOfVidBtns = $('.play-pause-btns').height();
		$('.play-pause-btns').css('top', ((heightOfVideo - heightOfVidBtns)/2) + 'px');
	} else {

	};
};

// vertically centre align the play and pause buttons according to changing div height

var verticallyAlignVidBtns = function(currentHeightOfVideo, animationLength) {
	var heightOfVidBtns = $('.play-pause-btns').height();
	$('.play-pause-btns').animate({
		'top': ((currentHeightOfVideo - heightOfVidBtns)/2) + 'px'
	}, animationLength);
};

// Getting play button to appear when video paused, getting pause button to appear when video playing and hovered over

$('#video').on("mouseenter", function() {
	if (document.getElementById('actualVideo').paused == false) {
		$('#pauseButton').stop().show();
		verticallyAlignVidBtns($('#actualVideo').height(), 1000);
	};
}).on("mouseleave", function() {
		$('#pauseButton').stop().hide();
});// ----// testimonials - getting them to appear when button clicked on

var switchTo = function(idOfQuote, element) {
	var allQuoteIds = [];
	$('.quote-box').each(function() { allQuoteIds.push(this.id); });
	var quoteClickedOn = allQuoteIds.indexOf(idOfQuote) + 1;
	if (quoteClickedOn > currentQuoteShowing) {
		$('#' + allQuoteIds[currentQuoteShowing-1]).animate({
			'left': '-100%'
		}, 300, function() {
			$('.quote-box').hide();
			$('#' + idOfQuote).show();
			$('#' + idOfQuote).css('left', '100%');
			$('#' + idOfQuote).animate({
				'left': 0
			}, 100);
		});
	};
	if (quoteClickedOn < currentQuoteShowing) {
		$('#' + allQuoteIds[currentQuoteShowing-1]).animate({
			'left': '100%'
		}, 300, function() {
			$('.quote-box').hide();
			$('#' + idOfQuote).show();
			$('#' + idOfQuote).css('left', '-100%');
			$('#' + idOfQuote).animate({
				'left': 0
			}, 100);
		});
	};
	$('.buttons').removeClass('active');
	$(element).addClass('active');
	currentQuoteShowing = quoteClickedOn;
};

// Function that enables us to swipe the quotes left and right

if (document.getElementById('allQuotes') !== null) {
	var myElement = $('#allQuotes')[0]
	var hammertime = new Hammer(myElement);

	hammertime.on("swipeleft", function(ev) {
		findQuoteBtnToClick('left');
	});

	hammertime.on("swiperight", function(ev) {
		findQuoteBtnToClick('right');
	});

	var findQuoteBtnToClick = function(swipeLeftOrRight) {
		var allQuoteButtons = $('#allQuoteButtons').children();
		var buttonCurrentlyActive = $('#allQuoteButtons > .active');
		var allQuoteBtnIds = [];
		for (var i=0; i<allQuoteButtons.length; i++) {
			allQuoteBtnIds.push($(allQuoteButtons[i])[0].id)
		};
		var indexOfQuoteBtn = allQuoteBtnIds.indexOf($(buttonCurrentlyActive)[0].id);
		var buttonToClick;
		if (swipeLeftOrRight === 'left') {
			buttonToClick = indexOfQuoteBtn + 1;
		}
		if (swipeLeftOrRight === 'right') {
			buttonToClick = indexOfQuoteBtn - 1;
		}
		$(allQuoteButtons[buttonToClick]).click();
	};
};// ----// Function to set the height of a module

var adjustHeightOfElementToFillPage = function(idOrClassOfElementToAdjust) {
	var heightOfViewport = window.innerHeight;
	var landingPagePaddingTop = parseInt($(idOrClassOfElementToAdjust).css('padding-top').replace("px", ""));
	$(idOrClassOfElementToAdjust).height(heightOfViewport - landingPagePaddingTop);
};

var findOffsetTopOfModule = function(idOfModule) {
	return $('#' + idOfModule).offset().top;
};

// Horizontally align absolute element hhh

var horizontallyCentreAlignAbsoluteEl = function(idOfElementToAlign) {
	var widthOfWindow = window.innerWidth;
	var widthOfElement = $('#' + idOfElementToAlign).width();
	$('#' + idOfElementToAlign).css('right', (widthOfWindow - widthOfElement)/2 + 'px');
};

// Figure out which module we are currently looking at

var whichModuleAmILookingAtNow = function(eachModuleId, offsetOfEachModule, eachModuleBtn) {
	var whereAmINow;
	for (var i=0; i<eachModuleId.length; i++) {
		var moduleWeCanSeeOnScreen = $(window).scrollTop() + heightOfSmallerHeader;
		if(moduleWeCanSeeOnScreen >= offsetOfEachModule[eachModuleId[i]]) {
			whereAmINow = eachModuleId[i];
		};
	};
	if ($(window).scrollTop() + window.innerHeight === $(document).height()) {
		whereAmINow = eachModuleId[eachModuleId.length-1];
	};
	return whereAmINow;
};

// find height of an element

var findHeightOfElement = function(element) {
	return $(element).height();
};

// Adjust the position of a module

var adjustOffsetTopOfModule = function(idOfElementToAdjust, amountToAdjustBy) {
	var eachModuleId = findIdOfEachChildInBody();
	if (eachModuleId.indexOf(idOfElementToAdjust) !== -1) {
		$('#' + idOfElementToAdjust).css('margin-top', amountToAdjustBy + 'px');
	};
};

// Check if a module is in view

var checkIfModuleIsInView = function(idOfModule, amountOfModuleNeededToBeInView) {
	var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + window.innerHeight;
  var elementTop = findOffsetTopOfModule(idOfModule);
  var elementTopHalf;
  if (amountOfModuleNeededToBeInView === 'halfOfModule') {
	  elementTopHalf = elementTop + $('#' + idOfModule).height()/2;
	} else {
		elementTopHalf = elementTop + $('#' + idOfModule).height();
	};
  var whenContainerElementInView = (elementTopHalf <= docViewBottom) && (elementTop >= docViewTop);
  if ($('#' + idOfModule).height() > $(window).height()) {
  	whenContainerElementInView = true;
  };
  return whenContainerElementInView;
};

// Detecting whether user is scrolling or not

var userIsScrolling = false;

var checkIfUserIsScrolling = function(userIsScrolling) {
	clearTimeout( $.data( this, "scrollCheck" ) );
	$.data( this, "scrollCheck", setTimeout(function() {
		verticallyCentreAlignSideBarToViewport();
	}, 100) );
};// ----// Attempting to parallax scroll the background image of the #toolkit module

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
};// ----// Function for clicking on a side bar element or the landing page scroll down element to animate scroll to a target module

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
};// ----// Find initial height of video container on home page

var initialHeightOfVideoContainer = findOrigHeightOfVideoContainer('video');

// Telling the browser what to do when page is loaded, when page is scrolled and when browser is resized

$(window).on("load", function() {
	if (document.getElementById('sidebarTableBody') != null) {
		generateSideBarButtons();
	};
	adjustHeightOfLandingPage(idOfLandingPageDiv);
	adjustTopOfToolkitModule();
	verticallyCentreAlignSideBarToViewport();
	changeStyleOfSideBar();
	animateElementOnLoop('scrollDownImg', 0, 500, moveElementUpAndDown);
	hideHoverBox(document);
	verticallyAlignVidBtns(initialHeightOfVideoContainer, 0);
	animateOneByOneWhenInView('features', 'feature-boxes');
	verticallyCentreAlignImagesInToolkit();
	toggleHeaderStyle();
	$('.quote-box').hide();
	$('#allQuotes').children('.quote-box').first().show();
	$('#allQuoteButtons').children().first().addClass('active');
	enableSwipingForCollapsedNav();
	// if (help === true) {
	// 	openCategory($(btnForCurrentCategory)[0], 0);
	// };
}).scroll(function() {
	clearAnimationQueue('#sidebar');
	checkIfUserIsScrolling(userIsScrolling)
	stopScrollDownImgAnimation('#scrollDownImg');
	toggleHeaderStyle();
	changeStyleOfSideBar();
	animateOneByOneWhenInView('features', 'feature-boxes');
	giveBgImageDownwardsParallaxEffect("bg-img-parallax");
}).on('resize', function(){
	clearAnimationQueue('#sidebar');
	toggleHeaderStyle();
	horizontallyCentreAlignAbsoluteEl('scrollDownImg');
	adjustHeightOfLandingPage(idOfLandingPageDiv);
	adjustTopOfToolkitModule();
	verticallyCentreAlignSideBarToViewport();
	adjustHeightOfElementToFillPage('#navBarCollapse');
	closeNavBarIfInDeskTopView('#navBarCollapse', 'opened');
	vidContainerToContainVideo();
	changeStyleOfSideBar();
});
