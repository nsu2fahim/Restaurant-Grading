
<!DOCTYPE>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reservation</title>
	<link rel="stylesheet" href="assets/stylesheets/SignUp.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
  <script src="assets/js/validations.js" type="text/javascript"></script>
</head>
<body>
  <?php require('Navbar.php') ?>
  <?php require('php/bookRestaurant.php') ?>

  <section class="row-alt">
    <div class="lead container">
      <p>
        Fill up the form to make a reservation.
      </p>
    </div>
  </section>

    <!-- Main content -->

  <form id="booking_form">
    <h1>Reservation Form</h1>
    <div id="loading_spinner" class="spinner" style="display: none;">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
    <div class="messages"></div>
    <p>Booking Restaurant: <strong><?php echo $restaurant_name ?></strong>.</p>
    <input type="hidden" id="res_id" value="<?php echo $_GET['res_id'] ?>" >
    <label for="date&time">Date & Time</label>
    <input type="datetime-local" id="mail" name="reserve_time">
    <label for="personcount">No. of Persons</label>
    <input type="text" id="persons" name="no_of_persons" required>
    <button type="submit" id="reserve_restaurant">Reserve</button>
  </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ajax/BookingRestaurant.js"></script>
    
  </section>




</body>
</html>