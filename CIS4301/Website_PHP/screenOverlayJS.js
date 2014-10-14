$(document).ready(function() {

	$('#window-overlay').css('height', parseFloat($('#content').css('height')) + 75 + 'px');
	
	//$('#photo-overlay').css('height', );

	$('.template-border').on('click', function() {
		
		$('#window-overlay').css('visibility', 'visible').animate({opacity: 1}, 100);
		var name = $(this).find('.name').text();
		var avgrating = $(this).find('.avgrating').rateit('value');
		var yourrating = $(this).find('.yourrating').rateit('value');
		var ratenow = 0;

		var imgid = $(this).find('.other').text();
		$('#ratenow').attr('data-productid', imgid);

		var imgurl = $(this).find('.question-mark').attr('src');

		var imgtag = $(this).find('.imgtag').text();
		var imgdesc = $(this).find('.imgdesc').text();
		var imgcountry = $(this).find('.imgcountry').text();
		var imgstore = $(this).find('.imgstore').text();
		var imgdatetime = $(this).find('.imgdatetime').text();
		var imgprice = $(this).find('.imgprice').text();

		//get imgid to update rate as soon as click on overlay -- check out further down code
		//var currentCard = $(this)/*.find('.imgid').text()*/;

		$('#bigname').text('by: ' + name);
		$('#bigname').attr('href', 'profile.php?user=' + name);
		$('#avgrating').rateit('value', avgrating);
		$('#yourrating').rateit('value', yourrating);
		$('#ratenow').rateit('value', ratenow);
		$('#photo-overlay-question-mark').attr('src', imgurl);

		$('#big-imgtag').text(imgtag);
		$('#big-imgdesc').text(imgdesc);
		$('#big-imgcountry').text(imgcountry);
		$('#big-imgstore').text('Store: ' + imgstore);
		$('#big-imgdatetime').text(imgdatetime);
		$('#big-imgprice').text(imgprice);

		if (yourrating > 0) {
			//make picture visible
			$('#bigname').css('visibility', 'visible');
			$('#avgrating-cont').css('visibility', 'visible');
			$('#yourrating-cont').css('visibility', 'visible');
			$('#ratenow-cont').css('visibility', 'hidden');
			$('#timer').css('visibility', 'hidden');

			$('#big-imgtag').css('visibility', 'visible');
			$('#big-imgdesc').css('visibility', 'visible');
			$('#big-imgcountry').css('visibility', 'visible');
			$('#big-imgstore').css('visibility', 'visible');
			$('#big-imgdatetime').css('visibility', 'visible');
			$('#big-imgprice').css('visibility', 'visible');
			$('#descrip').css('visibility', 'visible');

			$('#photo-overlay-question-mark').css('visibility', 'visible');
		} else {
			//show picture for 15 secs
			$('#bigname').css('visibility', 'hidden');
			$('#avgrating-cont').css('visibility', 'hidden');
			$('#yourrating-cont').css('visibility', 'hidden');
			$('#ratenow-cont').css('visibility', 'hidden');

			$('#big-imgtag').css('visibility', 'hidden');
			$('#big-imgdesc').css('visibility', 'hidden');
			$('#big-imgcountry').css('visibility', 'hidden');
			$('#big-imgstore').css('visibility', 'hidden');
			$('#big-imgdatetime').css('visibility', 'hidden');
			$('#big-imgprice').css('visibility', 'hidden');
			$('#descrip').css('visibility', 'hidden');

			$('#timer').css('visibility', 'visible');
			$('#photo-overlay-question-mark').css('visibility', 'visible');

			var startTime = 10;
			$('#timer').text(startTime);
			function countdown() {
				if (startTime > 0) {
					$('#timer').text(startTime);
					startTime = startTime - 1;
					setTimeout(countdown, 1000);
				} else {
					$('#timer').css('visibility', 'hidden');
					$('#ratenow-cont').css('visibility', 'visible');
					$('#photo-overlay-question-mark').css('visibility', 'hidden');
					$('#ratenow').rateit('value', 0);
					$('#ratenow').rateit('readonly', false);
					// to auto update as soon as click (like this it updates all cards ** should use imgid to look for card to update in other js file?)
					$('#ratenow').on('click', function() {
						imgid = $('#ratenow').attr('data-productid');
						var temp = $('.template-border').find('p:contains('+imgid+')').parent();
						yourrating = $('#ratenow').rateit('value');
						temp.find('.yourrating').rateit('value', yourrating);
						//temp.find('.avgrating').rateit('value', );
						temp.find('.question-mark').css('visibility', 'visible');

						$('#bigname').css('visibility', 'visible');
						$('#avgrating-cont').css('visibility', 'visible');
						$('#yourrating-cont').css('visibility', 'visible');
						$('#ratenow-cont').css('visibility', 'hidden');
						$('#timer').css('visibility', 'hidden');
						$('#photo-overlay-question-mark').css('visibility', 'visible');

						$('#big-imgtag').css('visibility', 'visible');
						$('#big-imgdesc').css('visibility', 'visible');
						$('#big-imgcountry').css('visibility', 'visible');
						$('#big-imgstore').css('visibility', 'visible');
						$('#big-imgdatetime').css('visibility', 'visible');
						$('#big-imgprice').css('visibility', 'visible');
						$('#descrip').css('visibility', 'visible');

						$('#yourrating').rateit('value', yourrating);
					});
					
				}
			}
			countdown();
		}
	});
	
	$('#window-overlay').on('click', function(e) {
		
		// if statement stops function from firing on child click
		if(e.target !== this) {
			return;
		}
		
		$('#window-overlay').animate({opacity: 0}, 100);
		$('#window-overlay').css('visibility', 'hidden');
		
	});

});

// overlay dynamic card sizes
$(document).ready(function() {
	var tBorder = $('#photo-overlay');
	var bWidth = tBorder.width();
	
	var tPhotoHolder = $('#photo-overlay-holder');
	
	tBorder.css('height', 1.5*bWidth);
	tPhotoHolder.css('height', bWidth);
	
	var holderHeight = tPhotoHolder.height();
	var whitespaceHeight = tBorder.height() - holderHeight;
	
	tPhotoHolder.css('line-height', holderHeight + "px");
	
	var q = $('#photo-overlay-question-mark');
	q.css('font-size', (holderHeight * 0.5) + "px");

	$('.bigtext').css('font-size', (whitespaceHeight * 0.06) + 'px');
	$('#big-imgtag').css('font-size', (whitespaceHeight * 0.08) + 'px');
	$('#bigname').css('font-size', (whitespaceHeight * 0.06) + 'px');
	$('#big-imgdesc').css('font-size', (whitespaceHeight * 0.07) + 'px');
	$('#timer').css('font-size', (whitespaceHeight * 0.25) + 'px');
	$("#avgrating-cont").css('font-size', (whitespaceHeight * 0.08) + 'px');
	$("#yourrating-cont").css('font-size', (whitespaceHeight * 0.08) + 'px');
	$("#ratenow-cont").css('font-size', (whitespaceHeight * 0.08) + 'px');
});

$(window).resize(function() {
    var tBorder = $('#photo-overlay');
	var bWidth = tBorder.width();
	
	var tPhotoHolder = $('#photo-overlay-holder');
	
	tBorder.css('height', 1.5*bWidth);
	tPhotoHolder.css('height', bWidth);
	
	var holderHeight = tPhotoHolder.height();
	var whitespaceHeight = tBorder.height() - holderHeight;
	
	tPhotoHolder.css('line-height', holderHeight + "px");
	
	var q = $('#photo-overlay-question-mark');
	q.css('font-size', (holderHeight * 0.5) + "px");

	$('.bigtext').css('font-size', (whitespaceHeight * 0.15) + 'px');
	$('#bigname').css('font-size', (whitespaceHeight * 0.08) + 'px');
	$('#timer').css('font-size', (whitespaceHeight * 0.25) + 'px');
});