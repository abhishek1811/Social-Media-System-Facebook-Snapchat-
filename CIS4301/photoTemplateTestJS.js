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
	
	--> if window width <= 500px show horizontal scroll, else move to left and hide scroll <--
	if ($('#body').width() <= 500) {
		$('#body').css('overflow-x', 'scroll');
	} else {
		$('#body').scrollLeft(-10);
		$('#body').css('overflow-x', 'hidden');
	}
	
});

// handles hover over photo to show tabs
$(document).on({
	mouseenter: function() {
	//$('.rectangle').css('width', $('.template-border').width() + ($('.template-border').width() * 0.08) + 'px');
		$('.rectangle.comments-tab').stop().animate({
				width: $('.template-border').width() + ($('.template-border').width() * 0.08) + 'px'
		}, 200);
		$('.triangle.comments-tab').stop().animate({
				'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
		}, 200);
		$('.triangle-border.comments-tab').stop().animate({
				'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
		}, 200);
			setTimeout(function() {
				$('.rectangle.prices-tab').stop().animate({
					width: $('.template-border').width() + ($('.template-border').width() * 0.08) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
			}, 100);
			setTimeout(function() {
				$('.rectangle.rate-tab').stop().animate({
					width: $('.template-border').width() + ($('.template-border').width() * 0.08) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
			}, 200);
		// comments tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.comments-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.comments-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.comments-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle-border.comments-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.comments-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.comments-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('.template-border').width() - ($('.template-border').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.comments-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.comments-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.comments-tab');
		// prices tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.prices-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.prices-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.prices-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.prices-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('.template-border').width() - ($('.template-border').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.prices-tab');
		
		// rate tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.rate-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.rate-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.rate-tab').css('margin-left')) + ($('.template-border').width() * 0.5) + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.rate-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('.template-border').width() - ($('.template-border').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
					'margin-left': ($('.template-border').width() * 0.08) + ($('.template-border').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.rate-tab');
		
	},
	mouseleave: function() {
	//$('.rectangle').css('width', $('.template-border').width() - ($('.template-border').width() * 0.1) + 'px');
		$('.rectangle').stop().animate({
			'margin-left': 0 + 'px',
			width: $('.template-border').width() - ($('.template-border').width() * 0.1) + 'px'
		}, 200);
		$('.triangle').stop().animate({
			'margin-left': 0 + 'px'
		}, 200);
		$('.triangle-border').stop().animate({
			'margin-left': 0 + 'px'
		}, 0);
	}
}, '.template-border');