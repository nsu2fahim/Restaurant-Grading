$(document).ready(function(){
    $('button#searchresbtn').click(function(){
        var restaurant_area_name = $('input#area_name').val();
        var restaurant_type = $('select.type').val();
        
        // $.post('php/searchRestaurant.php')
        return false;
    })
});