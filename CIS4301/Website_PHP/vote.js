//we bind only to the rateit controls within the products div
$('#ratenow-cont .rateit').bind('rated reset', function (e) {
    var ri = $(this);

    //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
    var value = ri.rateit('value') * 2;
    //set productid to imgid
    var productID = ri.attr('data-productid'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()

    //disable voting?
    ri.rateit('readonly', true);

    $.ajax({
        url: 'voted.php', //your server side script
        data: { id: productID, value: value }, //our data
        type: 'POST'
        /*
        success: function (data) {
            $('#response').append('<li>' + data + '</li>');

        },
        error: function (jxhr, msg, err) {
            $('#response').append('<li style="color:red">' + msg + '</li>');
        }
        */
    });
});