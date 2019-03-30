var home_url = 'http://localhost:8888/Restaurant-Grading';

$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        // console.log(rr);
        if(rr.status == true){
            $(location).attr('href', home_url);
        }
    });
    $('button#login').click(function(){
        var email = $('input#mail').val();
        var password = $('input#password').val();
        var Data = {
            email: email,
            password: password
        };

        $.post("php/Login.php", Data, function(data){
            var result = JSON.parse(data);
            // console.log(data)
            if(result.status == 'success'){
                $(location).attr('href', home_url);
            }
            else{
                alert(result.message)
            }
            $('#loading_spinner').css("display", "none");
        });
        return false;
    });
});