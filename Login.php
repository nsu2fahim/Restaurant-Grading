<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="assets/stylesheets/SignUp.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
</head>
<body>

<?php require('Navbar.php') ?>

<section class="row-alt">
	<div class="lead container">
		<p>
			You need to to login to place a reservation in a restaurant or use our site.
		</p>
	</div>
</section>

    <!-- Main content -->

    <form>
      
        <h1>Login</h1>
        <div id="loading_spinner" class="spinner" style="display: none;">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <fieldset>
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="user_email" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="user_password" required>
          
          <button id="login" type="submit">Login</button>
      </form>

    
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="ajax/loginUser.js"></script>


</body>


</html>