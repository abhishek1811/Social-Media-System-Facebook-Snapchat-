for (var i = 0; i < 10; i++) {
	var tmpl = document.getElementById('photo-template').content.cloneNode(true);
	$("#content").append(tmpl);
	$(".name").eq(i).text(javascript_sname_array[i]);
	$(".date").eq(i).text(javascript_imgtag_array[i]);
	$(".avg").eq(i).attr('data-rateit-value', javascript_avgrating_array[i]);
	$(".description").eq(i).text('$'+javascript_price_array[i]);
	$(".other").eq(i).text(javascript_time_array[i]);
	$(".other1").eq(i).text(javascript_imgdesc_array[i]);
	$(".other2").eq(i).text(javascript_country_array[i]);
	$(".question-mark").eq(i).attr('src', javascript_imgurl_array[i]);
}