var home_url = 'http://localhost:8888/Restaurant-Grading';
$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        if(rr.status == false){
            $(location).attr('href', home_url);
        }
        else{

            $('button#changepass').click(function(){
                var cur_pass = $('input#cur_password').val();
                var new_pass = $('input#new_password').val();

                if(new_pass.length < 7){
                    // alert("Password Length cannot be less than 7")
                    $('.messages').html('<div class="panel-error">'+'Password Length cannot be less than 7'+'</div>');
                    return false
                }

                const Data = {
                    cur_pass: cur_pass,
                    new_pass: new_pass
                };
                
                $('#loading_spinner').css("display", "block");

                $.post('php/changePassword.php', Data, function(res){
                    var result = JSON.parse(res);
                    // alert(result.message) //will show a panel for all alerts
                    $('.messages').html('<div class="panel-default">'+result.message+'</div>');
                    $('#loading_spinner').css("display", "none");
                });

                return false;
            });

        }
    });
});