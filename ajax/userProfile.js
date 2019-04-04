var home_url = 'http://localhost:8888/Restaurant-Grading';
$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        if(rr.status == false){
            $(location).attr('href', home_url);
        }
        else{
            $('#loading_spinner').css("display", "block");

            $.get("php/showUserProfile.php", function(res){
                var result = JSON.parse(res);
                $('input#name').val(result.full_name);
                $('input#mail').val(result.email);
                $('input#phone').val(result.phone);
                $('#loading_spinner').css("display", "none");
            });

            $('button#changepass').click(function(){
                // console.log(home_url + '/ChangePass.php')
                $(location).attr('href', home_url + '/ChangePass.php');
            });

            $('button#editactivate').click(function(){
                $("input").prop('disabled', false);
                alert('Profile is now editable.');
                $('button#editactivate').css("display","none");
                $('button#editprofile').css("display","block");
                return false;
            });

            $('button#editprofile').click(function(){
                var name = $('input#name').val();
                var email = $('input#mail').val();
                var phone = $('input#phone').val();

                if(phone.length < 11){
                    alert("Enter a valid mobile number")
                    return false
                }
            
                if(isNaN(phone)){
                    alert("Mobile Number can only contain numbers")
                    return false
                }

                const Data = {
                    name: name,
                    email: email,
                    phone: phone
                };
                $('#loading_spinner').css("display", "block");
                $.post('php/editUserProfile.php', Data, function(res){
                    var result = JSON.parse(res);
                    $("input").prop('disabled', true);
                    $('button#editactivate').css("display","block");
                    $('button#editprofile').css("display","none");
                    alert(result.message) //will show a panel for all alerts
                    $('#loading_spinner').css("display", "none");
                });

                return false;
            });
        }
    });
});