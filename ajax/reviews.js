$(document).ready(function(){
    
    var url_string = window.location.href;
    var url = new URL(url_string);
    var res_link = url.searchParams.get("res_link");
    
    const Data = {
        res_link: res_link
    }

    $('#loading_spinner').css("display", "block");

    $.get("php/api/review.php", Data, function(data){
        var res = JSON.parse(data);
        if(res.status == "error"){
            $('.row').append('<p class="galleryImageCenter">No Reviews Founds.</p>')
        }
        else{
            var items = res.data.items;
            var table = '<table><thead><tr><th scope="row">Reviews</th><td class="schedule-offset" colspan="2">Please check all the reviews of your desired restaurant </td></tr></thead><tbody>'
            var rows = '';
            for(var i = 0; i < items.length; i++){
                var comment = items[i].comment;
                var user = items[i].user.name;
                rows += '<tr><th scope="row"><time datetime="">'+user+'</time></th><td class="schedule-offset" colspan="2">'+comment+'</td></tr>'
            }
            rows += '</tbody></table>';
            table += rows;
            $('.row').append(table)
        }
        $('#loading_spinner').css("display", "none"); 
    });

});