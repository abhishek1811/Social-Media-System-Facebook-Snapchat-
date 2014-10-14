for (var i = 0; i < 10; i++) {
	var tmpl = document.getElementById('photo-template').content.cloneNode(true);
	$("#content").append(tmpl);
	$(".name").eq(i).text(javascript_sname_array[i]);
	$(".name").eq(i).attr('href', 'http://' + javascript_url_array[i]);
	$(".date").eq(i).text('Avg price: $' + javascript_avg_array[i]);
	$(".description").eq(i).text(javascript_shopno_array[i] + ',');
	$(".other").eq(i).text(javascript_street_array[i] + ',');
	$(".other1").eq(i).text(javascript_city_array[i] + ',');
	$(".other2").eq(i).text(javascript_country_array[i]);
	$(".question-mark").eq(i).attr('src', javascript_imgurl_array[i]);
}