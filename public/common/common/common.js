function ajaxData(c_url, data) {
    let url = c_url;
    $.post(url,data,function (data) {
        if (data.code == 1) {
            $("#ajax_success").show();
            setInterval(function(){
                location.reload();
            },300)
        } else {
            $("#ajax_error").show();
            setInterval(function(){
                location.reload();
            },300)
        }
    })
}