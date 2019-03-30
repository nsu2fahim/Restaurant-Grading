var home_url = 'http://localhost:8888/Restaurant-Grading';
$(document).ready(function(){
    $('#logoutbtn').click(function(){
        $.get("php/logout.php", function(res){
            $(location).attr('href', home_url);
        });
    });
});