// testimonials - getting them to appear when button clicked on

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
};