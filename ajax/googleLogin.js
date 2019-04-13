function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();


    if(profile){
        // console.log(profile.getName(), profile.getEmail());
        $('#loading_spinner').css("display", "block");
        $.post("php/googleLogin.php", {email: profile.getEmail()}, function(data){
            var result = JSON.parse(data);

            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                // console.log('User signed out.');
            });
            
            if(result.status == 'success'){
                window.history.back();
            }
            else{
                $('.messages').html('<div class="panel-error">'+result.message+'</div>');
            }
            $('#loading_spinner').css("display", "none");
        });
    }

    //sign out
    

}