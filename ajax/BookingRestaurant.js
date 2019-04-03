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
            alert("Please Enter a date.")
            return false;
        }
    
        var todays_date = new Date()
        var booking_date = new Date(date_time)
    
        if(booking_date < todays_date){
            alert("Booking Date and Time should be greater than current date and time.")
            return false;
        }
    
        if(isNaN(person_count)){
            alert("Number of Persons should be a number")
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
            alert(result.message) //will show a panel for all alerts
            $('#loading_spinner').css("display", "none");
            $('form#booking_form')[0].reset()
        });

        return false;
    });

});