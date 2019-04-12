<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurant Grading</title>
	<link rel="stylesheet" href="assets/stylesheets/LandingPage.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
	<script src="assets/js/validations.js" type="text/javascript"></script>
</head>

<body>
		
	<?php require('Navbar.php') ?>

	<section class="hero container">
		<h2>HUNGRY?</h2>
		<p>Order Online From Your Favourite Nearby Restaurants.You Can Find Any Type of Food With Just One Click</p>
	</section>

	<section class="row">
		<div class="grid">
	
		<form align="center" name="landing_form" action="Recommendation.php" method="get">
			<fieldset class="register-group">
				
				<label>
					Location (Currently Available Areas: Gulshan, Banani, Dhanmondi, Bashundhara, Uttara, Mirpur)
					<input type="text" id="area_name" name="area_name" placeholder="Enter area name e.g. Gulshan" required>
				</label>
				
				<label>
					Type
					<select name="type" class="type" id="quantity" required>
						<option value="Thai" selected="">Thai</option>
						<option value="Chinese">Chinese</option>
						<option value="Bengali">Bengali</option>
						<option value="Fast Food">Fast Food</option>
						<option value="Mexican">Mexican</option>
						<option value="Indian">Indian</option>
						<option value="Others">Others</option>
					</select>
				</label>
				
			</fieldset>

			<button class="btn btn-default" type="submit" id="searchresbtn">Search</button>
		</form>

	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
