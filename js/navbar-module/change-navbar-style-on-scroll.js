// Functions to change the style of the header once past the first module

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
};