for (var i = 0; i < 10; i++) {
	var tmpl = document.getElementById('photo-template').content.cloneNode(true);
	$("#content").append(tmpl);
	$(".name").eq(i).text(javascript_email_array[i]);
	$(".name").eq(i).attr('href', 'profile.php?user=' + javascript_email_array[i]);
	$(".avg").eq(i).attr('data-rateit-value', javascript_avg_array[i]);
	$(".question-mark").eq(i).attr('src', javascript_imgurl_array[i]);
}