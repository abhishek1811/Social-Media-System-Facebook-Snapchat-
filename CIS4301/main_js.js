$(document).ready(function() {
	$("#register").on("click", function(){
		$('#login-frame-wrapper').css('visibility', 'visible').animate({opacity: 1}, 100);
		$('#close-button').css('visibility', 'visible').animate({opacity: 1}, 100);
		$('#backgroundfade').css('visibility', 'visible').animate({opacity: 0.75}, 100);;
	});
	$("#backgroundfade").on("click", function(){
		$('#login-frame-wrapper').animate({opacity: 0}, 100);
		$('#login-frame-wrapper').css('visibility', 'hidden');

		$('#close-button').animate({opacity: 0}, 100);
		$('#close-button').css('visibility', 'hidden');

		$('#backgroundfade').animate({opacity: 0}, 100);
		$('#backgroundfade').css('visibility', 'hidden');
	});
});