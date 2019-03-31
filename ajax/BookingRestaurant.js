var home_url = 'http://localhost:8888/Restaurant-Grading';
$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        if(rr.status == false){
            $(location).attr('href', home_url);
        }
    });

    $('button#reserve_restaurant').click(function(){
        var res_id = $('input#res_id').val();
        var date_time = $('input#mail').val();
        var person_count = $('input#persons').val();
        console.log(res_id, date_time, person_count);
        return false;
    });

});