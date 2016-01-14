// Function for showing the side bar labels when button is hovered over

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
