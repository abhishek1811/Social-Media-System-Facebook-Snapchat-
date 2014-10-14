
for (var i = 0; i < javascript_imgid_array.length; i++) {
	var tmpl = document.getElementById('photo-template').content.cloneNode(true);
	$("#content").append(tmpl);
	$(".name").eq(i).text(javascript_emailid_array[i]);
	$(".name").eq(i).attr('href', 'profile.php?user=' + javascript_emailid_array[i]);
	$(".question-mark").eq(i).attr('src', javascript_imgurl_array[i]);

	$(".yourrating").eq(i).attr('data-rateit-value', javascript_yourrate_array[i]);
	if ($(".yourrating").eq(i).attr('data-rateit-value') == 0) {
		$(".question-mark").eq(i).css('visibility', 'hidden');
	} else {
		$(".question-mark").eq(i).css('visibility', 'visible');
	}

	$('.imgtag').eq(i).text(javascript_imgtag_array[i]);
	$('.imgdesc').eq(i).text(javascript_imgdesc_array[i]);
	$('.imgcountry').eq(i).text(javascript_imgcountry_array[i]);
	$('.imgstore').eq(i).text(javascript_imgstore_array[i]);
	$(".avgrating").eq(i).attr('data-rateit-value', javascript_imgavgrate_array[i]);
	$('.imgdatetime').eq(i).text(javascript_imgdatetime_array[i]);
	$('.imgprice').eq(i).text('$ ' + javascript_imgprice_array[i]);

	$(".other").eq(i).text(javascript_imgid_array[i]);
	$(".other").css('visibility', 'hidden');
	$('.imgtag').css('visibility', 'hidden');
	$('.imgdesc').css('visibility', 'hidden');
	$('.imgcountry').css('visibility', 'hidden');
	$('.imgstore').css('visibility', 'hidden');
	$('.imgdatetime').css('visibility', 'hidden');
	$('.imgprice').css('visibility', 'hidden');
}