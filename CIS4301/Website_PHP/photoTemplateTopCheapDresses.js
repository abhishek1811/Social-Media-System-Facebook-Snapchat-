$(document).ready(function() {
	var tBorder = $('.template-border');
	var bWidth = tBorder.width();
	
	var tPhotoHolder = $('.image-holder');
	
	tBorder.css('height', 1.5*bWidth);
	tPhotoHolder.css('height', bWidth);
	
	var holderHeight = tPhotoHolder.height();
	
	tPhotoHolder.css('line-height', holderHeight + "px");
	
	var q = $('.question-mark');
	q.css('font-size', (holderHeight * 0.5) + "px");

	var whitespaceHeight = tBorder.height() - holderHeight;
	$('.smalltext').css('font-size', (whitespaceHeight * 0.10) + 'px');
	$('.name').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.date').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.avgrate').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.other').css('font-size', (whitespaceHeight * 0.09) + 'px');
	$('.desc').css('font-size', (whitespaceHeight * 0.09) + 'px');
	$('.imgtag').css('font-size', (whitespaceHeight * 0.13) + 'px');
	$('.time').css('font-size', (whitespaceHeight * 0.09) + 'px');
});

$(window).resize(function() {
    var tBorder = $('.template-border');
	var bWidth = tBorder.width();
	
	var tPhotoHolder = $('.image-holder');
	
	tBorder.css('height', 1.5*bWidth);
	tPhotoHolder.css('height', bWidth);
	
	var holderHeight = tPhotoHolder.height();
	
	tPhotoHolder.css('line-height', holderHeight + "px");
	
	var q = $('.question-mark');
	q.css('font-size', (holderHeight * 0.5) + "px");

	var whitespaceHeight = tBorder.height() - holderHeight;
	$('.smalltext').css('font-size', (whitespaceHeight * 0.15) + 'px');
	$('.name').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.date').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.avgrate').css('font-size', (whitespaceHeight * 0.12) + 'px');
	$('.other').css('font-size', (whitespaceHeight * 0.09) + 'px');
	$('.desc').css('font-size', (whitespaceHeight * 0.09) + 'px');
	
	// if window width <= 500px show horizontal scroll, else move to left and hide scroll
	if ($('#body').width() <= 500) {
		$('#body').css('overflow-x', 'scroll');
	} else {
		$('#body').scrollLeft(-10);
		$('#body').css('overflow-x', 'hidden');
	}
	
});