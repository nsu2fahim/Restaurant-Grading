$(document).ready(function(){
    $('button#signup').click(function(){
        var name = $('input#name').val();
        var email = $('input#mail').val();
        var phone = $('input#phone').val();
        var password = $('input#password').val();

        if(password.length < 7){
            alert("Password Length cannot be less than 7")
            return false
        }
    
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
            phone: phone,
            password: password
        };

        $('#loading_spinner').css("display", "block");

        $.post("php/Register.php", Data, function(data){
            var result = JSON.parse(data);
            alert(result.message) //will show a panel for all alerts
            $('#loading_spinner').css("display", "none");
        });


        return false;
    })
})