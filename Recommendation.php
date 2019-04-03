<!DOCTYPE html>
<html>
<head>
	<title>Recommended Restaurants</title>
	<link rel="stylesheet" href="assets/stylesheets/Reviewpage.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php require('Navbar.php') ?>
	<?php require('php/searchRestaurant.php') ?>
	
	<section class="row-alt">
		<?php 
			if(mysqli_num_rows($results) > 0){
				while($row = mysqli_fetch_array($results)){
					echo "<div class='card'>";
						echo '<a href=""><img src="'.$row['thumbnail'].'" alt="Restaurant img" style="width:100%"></a>';
						echo '<div class="card-container">';
								echo '<h4><b>'.$row['name'].'</b></h4>';
								echo '<p>'.$row['address'].'</p>';
								if($row['number'] > 0) echo '<p>'.$row['number'].'</p>';
								echo '<p>'.$row['rating'].'</p>';
								echo '<a href="Menu.html" class="card-link">Menu</a>';
								echo '<a href="Reviewpage.html" class="card-link">Reviews</a>';
								if (isset($_SESSION['user_id'])){
									echo '
									<form action="Booking.php" method="get">
										<input type="hidden" name="res_id" value="'.$row['id'].'">
										<input type="submit" value="Reserve Now!">
									</form>
									';
								}
								else{
									echo '<a href="Login.php" class="card-link">Login to Reserve</a>';
								}
								
						echo '</div>
								</div><br>';
				}
			}
			else{
				echo "No results Found!";
			}
		?>
	</section>
</body>
</html>