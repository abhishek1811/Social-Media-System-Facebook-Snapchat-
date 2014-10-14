// handles hover over photo to show tabs
$(document).on({
	mouseenter: function() {
	//$('.rectangle').css('width', $('#photo-overlay').width() + ($('#photo-overlay').width() * 0.08) + 'px');
		$('.rectangle.comments-tab').stop().animate({
				width: $('#photo-overlay').width() + ($('#photo-overlay').width() * 0.08) + 'px'
		}, 200);
		$('.triangle.comments-tab').stop().animate({
				'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
		}, 200);
		$('.triangle-border.comments-tab').stop().animate({
				'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
		}, 200);
			setTimeout(function() {
				$('.rectangle.prices-tab').stop().animate({
					width: $('#photo-overlay').width() + ($('#photo-overlay').width() * 0.08) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
			}, 100);
			setTimeout(function() {
				$('.rectangle.rate-tab').stop().animate({
					width: $('#photo-overlay').width() + ($('#photo-overlay').width() * 0.08) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
			}, 200);
		// comments tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.comments-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.comments-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.comments-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
				$('.triangle-border.comments-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.comments-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.comments-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('#photo-overlay').width() - ($('#photo-overlay').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.comments-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.comments-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.comments-tab');
		// prices tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.prices-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.prices-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.prices-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.prices-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('#photo-overlay').width() - ($('#photo-overlay').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.prices-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.prices-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.prices-tab');
		
		// rate tab
		$(document).on({
			mouseenter: function() {
				$('.rectangle.rate-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.5) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.rate-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
				'margin-left': parseFloat($('.triangle.rate-tab').css('margin-left')) + ($('#photo-overlay').width() * 0.5) - 1 + 'px'
				}, 200);
			},
			mouseleave: function() {
				$('.rectangle.rate-tab').stop().animate({
					'margin-left': 0 + 'px',
					//width: $('#photo-overlay').width() - ($('#photo-overlay').width() * 0.1) + 'px'
				}, 200);
				$('.triangle.rate-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 200);
				$('.triangle-border.rate-tab').stop().animate({
					'margin-left': ($('#photo-overlay').width() * 0.08) + ($('#photo-overlay').width() * 0.1) - 1 + 'px'
				}, 0);
			}
		}, '.rectangle.rate-tab');
		
	},
	mouseleave: function() {
	//$('.rectangle').css('width', $('#photo-overlay').width() - ($('#photo-overlay').width() * 0.1) + 'px');
		$('.rectangle').stop().animate({
			'margin-left': 0 + 'px',
			width: $('#photo-overlay').width() - ($('#photo-overlay').width() * 0.1) + 'px'
		}, 200);
		$('.triangle').stop().animate({
			'margin-left': 0 + 'px'
		}, 200);
		$('.triangle-border').stop().animate({
			'margin-left': 0 + 'px'
		}, 0);
	}
}, '#photo-overlay');