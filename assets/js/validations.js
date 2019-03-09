function validateSignupForm(){
    var lenPassword = document.signup_form.password.value.length;
    var MobileNumber = document.signup_form.phone_number.value;
    if(lenPassword < 7){
        alert("Password Length cannot be less than 7")
        return false
    }

    if(MobileNumber.length < 11){
        alert("Enter a valid mobile number")
        return false
    }

    if(isNaN(MobileNumber)){
        alert("Mobile Number can only contain numbers")
        return false
    }
}

function validateLandingPage(){
    areas = ['Gulshan', 'Banani', 'Dhanmondi', 'Bashundhara', 'Old Dhaka']
    var str = document.landing_form.area_name.value;
    for(i = 0; i < areas.length; i++){
        if (str.match(/gu.*/)) {
            // do something
        }
    }
    return false
}

function validateLoginForm(){

}

function validateReservationForm(){
    var dt_time = document.booking_form.reserve_time.value;
    var no_of_persons = document.booking_form.no_of_persons.value;

    if(dt_time == "" || dt_time == null){
        alert("Please Enter a date.")
        return false;
    }

    var todays_date = new Date()
    var booking_date = new Date(dt_time)

    if(booking_date < todays_date){
        alert("Booking Date and Time should be greater than current date and time.")
        return false;
    }

    if(isNaN(no_of_persons)){
        alert("Number of Persons should be a number")
        return false;
    }
}


function validateEditProfile(){
    var MobileNumber = document.edit_profile_form.phone_number.value;
    if(MobileNumber.length < 11){
        alert("Enter a valid mobile number")
        return false
    }

    if(isNaN(MobileNumber)){
        alert("Mobile Number can only contain numbers")
        return false
    }
}



function validateChangePassword(){
    var cur_password = document.change_password_form.cur_password.value;
    var new_password = document.change_password_form.new_password.value;

    if(new_password.length < 7){
        alert("Password Length cannot be less than 7")
        return false
    }

    if(cur_password.length < 7){
        alert("Password Length cannot be less than 7")
        return false
    }
    
}