$(document).ready(function() {

	var tabRect = $('.rectangle');
	
	var photoBorder = $('.template-border');
	var photoBorderPosition = photoBorder.position();
	
	tabRect.css('height', (photoBorder.height() * 0.1) + 'px');
	tabRect.css('width', photoBorder.width() - (photoBorder.width() * 0.1) + 'px');
	
	// same position as top of border
	tabRect.css('top', parseFloat(photoBorder.css('margin-top')) + (photoBorder.width() * 0.1) + 'px');
	// fix margin-top to work with triangle
	//tabRect.css('margin-top', photoBorder.height() * 0.1 + 'px');
	
	var tabRectWidth = tabRect.width();
	var tabRectHeight = tabRect.height();
	var tabRectPosition = tabRect.position();
	var tabRectColor = tabRect.css('background-color');
	
	$(".tab-text").css('line-height', tabRectHeight + 'px');
	$(".tab-text").css('font-size', (tabRectHeight / 3) + 'px');
	
	$(".triangle").css('border-top', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle").css('border-left', (tabRectHeight / 2) + 'px solid ' + tabRectColor);
	$(".triangle").css('border-bottom', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle").css('left', tabRectPosition.left + tabRectWidth + 'px');
	$(".triangle").css('top', tabRectPosition.top + 'px');
	
	$(".triangle-border").css('border-top', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle-border").css('border-left', (tabRectHeight / 2) + 'px solid #888');
	$(".triangle-border").css('border-bottom', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle-border").css('left', (tabRectPosition.left + tabRectWidth + 1) + 'px');
	$(".triangle-border").css('top', (tabRectPosition.top + 1) + 'px');
	
	$(".tab-text").css('margin-right', ($('.template-border').width() * 0.08) + 'px');
	
	// make dynamic margin-top
	$(".prices-tab").css('margin-top', $(".rectangle").height() + 5 + 'px');
	$(".rate-tab").css('margin-top', $(".rectangle").height() * 2 + 10 + 'px');

});

$(window).resize(function() {
	
	var tabRect = $('.rectangle');
	
	var photoBorder = $('.template-border');
	var photoBorderPosition = photoBorder.position();
	
	tabRect.css('height', (photoBorder.height() * 0.1) + 'px');
	tabRect.css('width', photoBorder.width() - (photoBorder.width() * 0.1) + 'px');
	
	// same position as top of border
	tabRect.css('top', parseFloat(photoBorder.css('margin-top')) + (photoBorder.width() * 0.1) + 'px');
	// fix margin-top to work with triangle
	//tabRect.css('margin-top', photoBorder.height() * 0.1 + 'px');
	
	var tabRectWidth = tabRect.width();
	var tabRectHeight = tabRect.height();
	var tabRectPosition = tabRect.position();
	var tabRectColor = tabRect.css('background-color');
	
	$(".tab-text").css('line-height', tabRectHeight + 'px');
	$(".tab-text").css('font-size', (tabRectHeight / 3) + 'px');
	
	$(".triangle").css('border-top', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle").css('border-left', (tabRectHeight / 2) + 'px solid ' + tabRectColor);
	$(".triangle").css('border-bottom', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle").css('left', tabRectPosition.left + tabRectWidth + 'px');
	$(".triangle").css('top', tabRectPosition.top + 'px');
	
	$(".triangle-border").css('border-top', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle-border").css('border-left', (tabRectHeight / 2) + 'px solid #888');
	$(".triangle-border").css('border-bottom', (tabRectHeight / 2) + 'px solid transparent');
	$(".triangle-border").css('left', (tabRectPosition.left + tabRectWidth + 1) + 'px');
	$(".triangle-border").css('top', (tabRectPosition.top + 1) + 'px');
	
	$(".tab-text").css('margin-right', ($('.template-border').width() * 0.08) + 'px');

});