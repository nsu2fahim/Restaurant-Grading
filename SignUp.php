<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="assets/stylesheets/SignUp.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
  <script src="assets/js/validations.js" type="text/javascript"></script>
</head>
<body>
    
<?php require('Navbar.php') ?>

<section class="row-alt">
	<div class="lead container">
		<p>
			You need to to create an account to place a reservation in a restaurant.
		</p>
	</div>
</section>

    <!-- Main content -->

    <form name="signup_form">
      
        <h1>Sign Up</h1>
        <div id="loading_spinner" class="spinner" style="display: none;">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
        </div>
        <fieldset>
          
          <label for="name">Name(*):</label>
          <input type="text" id="name" name="user_name" required>
          
          <label for="mail">Email(*):</label>
          <input type="email" id="mail" name="user_email" required>

          <label for="phone">Mobile Number(*):</label>
          <input type="text" id="phone" name="phone_number" required>
          
          <label for="password">Password(*):</label>
          <input type="password" id="password" name="user_password" required>
          
          
          <button type="submit" id="signup">Sign Up</button>
      </form>

    
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="ajax/registerUser.js"></script>



</body>


</html>