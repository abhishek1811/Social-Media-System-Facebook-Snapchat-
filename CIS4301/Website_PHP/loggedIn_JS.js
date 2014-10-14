$(document).ready(function(){
	
	setTimeout(function() {
	  	$('#siteName').hover(function() {
	  		$('#left-dropdown-wrapper').stop().animate({"margin-top":"-15px"}, 200);
		},function() {
	   		$('#left-dropdown-wrapper').stop().animate({"margin-top":"-322px"}, 200);
		});

		$('#left-dropdown-wrapper').hover(function() {
	  		$('#left-dropdown-wrapper').stop().animate({"margin-top":"-15px"}, 200);
		},function() {
	   		$('#left-dropdown-wrapper').stop().animate({"margin-top":"-322px"}, 200);
		});
	}, 200);

	$('#right-dropdown-wrapper').css('left', $(window).width() - ($(window).width()*0.2) + 'px');

	setTimeout(function() {
	  	$('#user').hover(function() {
	  		$('#right-dropdown-wrapper').stop().animate({"margin-top":"-15px"}, 200);
		},function() {
	   		$('#right-dropdown-wrapper').stop().animate({"margin-top":"-322px"}, 200);
		});

		$('#right-dropdown-wrapper').hover(function() {
	  		$('#right-dropdown-wrapper').stop().animate({"margin-top":"-15px"}, 200);
		},function() {
	   		$('#right-dropdown-wrapper').stop().animate({"margin-top":"-322px"}, 200);
		});
	}, 200);

	$('#friend-requests').on('click', function() {
		window.location.href = "request.php";
	});

});