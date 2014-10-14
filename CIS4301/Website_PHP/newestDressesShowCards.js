for (var i = 0; i < 10; i++) {
	var tmpl = document.getElementById('photo-template').content.cloneNode(true);
	$("#content").append(tmpl);
	$(".imgtag").eq(i).text(javascript_imgtag_array[i]);
	$(".time").eq(i).text(javascript_imgtime_array[i]);
	$(".question-mark").eq(i).attr('src', javascript_imgurl_array[i]);
}