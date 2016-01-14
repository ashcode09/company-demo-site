// Function to set the height of a module

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
};