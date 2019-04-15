var home_url = 'http://localhost:8888/Restaurant-Grading';

function validate_Email(sender_email) {
    var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (expression.test(sender_email)) {
        return true;
    }
    else {
        return false;
    }
}

$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        // console.log(rr);
        if(rr.status == true){
            $(location).attr('href', home_url);
        }
    });
    $('button#signup').click(function(){
        var name = $('input#name').val();
        var email = $('input#mail').val();
        var phone = $('input#phone').val();
        var password = $('input#password').val();

        if(name.length == 0){
            $('.messages').html('<div class="panel-error">'+'Name cannot be empty'+'</div>');
            return false
        }

        if(email.length == 0){
            $('.messages').html('<div class="panel-error">'+'Email cannot be empty'+'</div>');
            return false
        }
        if(validate_Email(email) == false){
            $('.messages').html('<div class="panel-error">'+'Please enter a valid email'+'</div>');
            return false
        }

        if(password.length < 7){
            // alert("Password Length cannot be less than 7")

            $('.messages').html('<div class="panel-error">'+'Password Length cannot be less than 7'+'</div>');
            return false
        }
    
        if(phone.length < 11){
            // alert("Enter a valid mobile number")
            $('.messages').html('<div class="panel-error">'+'Enter a valid mobile number'+'</div>');
            return false
        }
    
        if(isNaN(phone)){
            // alert("Mobile Number can only contain numbers")

            $('.messages').html('<div class="panel-error">'+'Mobile Number can only contain numbers'+'</div>');
            return false
        }

        const Data = {
            name: name,
            email: email,
            phone: phone,
            password: password
        };

        $('#loading_spinner').css("display", "block");

        $.post("php/Register.php", Data, function(data){
            var result = JSON.parse(data);
            // alert(result.message) //will show a panel for all alerts
            if(result.status == 'success'){
                $(location).attr('href', home_url);
                $('.messages').html('<div class="panel-success">'+result.message+'</div>');
            }
            else{
                // console.log(result.message)
                $('.messages').html('<div class="panel-error">'+result.message+'</div>');
            }
            // $('form#signup_form')[0].reset()
            
            $('#loading_spinner').css("display", "none");
        });


        return false;
    })
})