// Help page - Telling the browser what to do when page is loaded, when page is scrolled and when browser is resized

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
};