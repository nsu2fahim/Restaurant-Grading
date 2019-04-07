$(document).ready(function(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var res_link = url.searchParams.get("res_link");
    const Data = {
        res_link: res_link
    }

    $('#loading_spinner').css("display", "block");
    $.get("php/api/menu.php", Data, function(data){
        var res = JSON.parse(data);
        if(res.length == 0){
            $('.row').append('<p class="galleryImageCenter">No Results Founds.</p>')
        }
        else{
            for(var i = 0; i < res.length; i++){
                $('.row').append('<a target="_blank" href="'+res[i]+'" class="image-popup fh5co-board-img"><img class="galleryImageCenter" src="'+res[i]+'" alt="No image" width="400"></a><br>')
                $('.row').append('<hr>')
            }
        }
        $('#loading_spinner').css("display", "none"); 
    });
});