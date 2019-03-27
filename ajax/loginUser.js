$(document).ready(function(){
    $('button#login').click(function(){
        var email = $('input#mail').val();
        var password = $('input#password').val();
        var Data = {
            email: email,
            password: password
        };
        $.post("php/Login.php", Data, function(data){
            // var result = JSON.parse(data);
            console.log(data)
            // alert(result.message) //will show a panel for all alerts
            $('#loading_spinner').css("display", "none");
        })
        return false;
    });
});