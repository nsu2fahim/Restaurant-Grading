var home_url = 'http://localhost:8888/Restaurant-Grading';
$(document).ready(function(){
    $.get("php/loggedin.php", function(res){
        var rr = JSON.parse(res);
        if(rr.status == false){
            $(location).attr('href', home_url);
        }
        else{
            $('#spinner').css("display", "block");
            $.get("php/bookingHistory.php", function(res){
                var result = JSON.parse(res);
                var tableHtml = "<table><tr><th>Booking ID</th><th>Restaurant name</th><th>Date / Time</th><th>Address</th><th>Reserved Seats</th><th>Status</th></tr>";
                
                if(result.length == 0){
                    $('#table').html('<p>No search results found</p>');
                }
                else{
                    
                    var row = '';

                    for(var i = 0; i < result.length; i++){
                        var data = result[i];
                        row += '<tr>';
                        row += ('<td>' + data['id'] + '</td>');
                        row += ('<td>' + data['name'] + '</td>');
                        row += ('<td>' + data['date_time'] + '</td>');
                        row += ('<td>' + data['address'] + '</td>');
                        row += ('<td>' + data['no_of_guests'] + '</td>');

                        var todays_date = new Date()
                        var booking_date = new Date(data['date_time'])
                        console.log(todays_date, booking_date, booking_date < todays_date)
                    
                        if(booking_date < todays_date){
                            row += ('<td style="color: red;">' + 'Expired' + '</td>');
                        }
                        else{
                            row += ('<td style="color: green;">' + 'Active' + '</td>');
                        }
                        
                        row += '</tr>'
                    }
                    
                    tableHtml += row;
                    tableHtml += '</table>';
                    $('#table').html(tableHtml);


                }


            });


        }
    });
});