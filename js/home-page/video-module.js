// Video Player - getting the video to play & expand, and pause & get smaller when play/pause images clicked

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
});