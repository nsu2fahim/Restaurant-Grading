<!DOCTYPE html>
<html>
<head>
	<title>Recommended Restaurants</title>
	<link rel="stylesheet" href="assets/stylesheets/Reviewpage.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<style>
		.swiper-container {
    		width: 1000px;
    		height: 400px;
		}
	</style>
</head>
<body>
	<?php require('Navbar.php') ?>
	<?php require('php/searchRestaurant.php') ?>
	
	
	<section class="row-alt">
		<!-- Slider main container -->
		
			<!-- Additional required wrapper -->
			
				<!-- Slides -->
				<?php
				if(mysqli_num_rows($results) > 0){
					echo('<div class="swiper-container"><div class="swiper-wrapper">');
					while($row = mysqli_fetch_array($results)){
							echo "<div class='swiper-slide'><div class='card'>";
							echo '<a href=""><img src="'.$row['thumbnail'].'" alt="Restaurant img" style="width:100%"></a>';
							echo '<div class="card-container">';
									echo '<h4><b>'.$row['name'].'</b></h4>';
									echo '<p>'.$row['address'].'</p>';
									if($row['number'] > 0) echo '<p>'.$row['number'].'</p>';
									echo '<p>Rating: '.$row['rating'].'/5.0</p>';
									echo '<a target="_blank" href="Menu.php?res_link='.$row['link'].'" class="card-link">Menu</a>';
									echo '<a target="_blank" href="Reviews.php?res_link='.$row['link'].'" class="card-link">Reviews</a>';

									if (isset($_SESSION['user_id'])){
										echo '<a href="Booking.php?res_id='.$row['id'].'" class="card-link">Reserve Now!</a>';
									}
									else{
										echo '<a href="Login.php" class="card-link">Login to Reserve</a>';
									}

									echo '<a href="" class="card-link open-modal" id="'.$row['address'].'">Show on Map</a>';

							echo '</div>
									</div></div>';
					}
					echo('</div>
					<br>
									<!-- If we need pagination -->
									<div class="swiper-pagination"></div>
						
									<!-- If we need navigation buttons -->
									<div class="swiper-button-prev"></div>
									<div class="swiper-button-next"></div>
								</div>');
				}
				else{
					echo "<p>No results Found!</p>";
				}
				?>
				<div class="modal">
					<p>Address: </p>
					<p id="address"></p>
					<div id="map" style="width: 350px; height: 350px;"></div>
				</div>
				
			
	</section>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-uiIccbVakz6Rh42nmNIlJKEGOGZNNqE&callback="></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	
	<script>
		$(document).ready(function(){
			var mySwiper = new Swiper ('.swiper-container', {
				// Optional parameters
				direction: 'horizontal',
				loop: true,

				// If we need pagination
				pagination: {
					el: '.swiper-pagination',
				},

				// Navigation arrows
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				autoplay: {
					delay: 2000,
				},

			});
			

			$('.open-modal').click(function(event) {
				event.preventDefault();
				this.blur(); // Manually remove focus from clicked link.
				var id = $(this).attr('id');
				// console.log(id)
				
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 14,
					center: {lat: 23.817041, lng: 90.425445}
				});

				var geocoder = new google.maps.Geocoder();

				geocoder.geocode({'address': id}, function(results, status) {
					if (status === 'OK') {
						map.setCenter(results[0].geometry.location);
						var marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location
						});
					} else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});
				

				$('.modal').modal();
				$('#address').text(id);
			});
		});
	</script>

</body>
</html>