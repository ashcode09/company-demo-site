// Find initial height of video container on home page

var initialHeightOfVideoContainer = findOrigHeightOfVideoContainer('video');

// Telling the browser what to do when page is loaded, when page is scrolled and when browser is resized

$(window).on("load", function() {
	if (home === true) {
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
	if (help === true) {
		openCategory($(btnForCurrentCategory)[0], 0);
	};
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
