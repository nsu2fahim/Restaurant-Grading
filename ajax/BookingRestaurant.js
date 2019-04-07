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

        if(date_time == "" || date_time == null){
            // alert("Please Enter a date.")
            $('.messages').html('<div class="panel-error">'+'Please Enter a date'+'</div>');
            return false;
        }
    
        var todays_date = new Date()
        var booking_date = new Date(date_time)
    
        if(booking_date < todays_date){
            // alert("Booking Date and Time should be greater than current date and time.")
            $('.messages').html('<div class="panel-error">'+'Booking Date and Time should be greater than current date and time'+'</div>');
            return false;
        }
    
        if(isNaN(person_count)){
            // alert("Number of Persons should be a number")
            $('.messages').html('<div class="panel-error">'+'Persons should be a number'+'</div>');
            
            return false;
        }
        const Data = {
            restaurant_id: res_id,
            booking_date_time: date_time,
            person_count: person_count
        }

        $('#loading_spinner').css("display", "block");
        $.post("php/processBooking.php", Data, function(data){
            var result = JSON.parse(data);
            // console.log(data)
            // alert(result.message) //will show a panel for all alerts
            $('.messages').html('<div class="panel-default">'+result.message+'</div>');
            $('#loading_spinner').css("display", "none");
            $('form#booking_form')[0].reset()
        });

        return false;
    });

});