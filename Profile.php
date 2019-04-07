<!DOCTYPE>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile</title>
	<link rel="stylesheet" href="assets/stylesheets/SignUp.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
</head>
<body>
    <?php require('Navbar.php') ?>



    <!-- Main content -->
    
    <form id="profile_form">
      
        <h1>My Profile</h1>
        
        <div id="loading_spinner" class="spinner" style="display: none;">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
        </div>
        <div class="messages"></div>
        
        <label for="name">Name:</label>
        <input type="text" id="name" value="" disabled>
        
        <label for="email">Email</label>
        <input type="text" id="mail" value="" disabled>
        
        <label for="password">Phone Number</label>
        <input type="text" id="phone" value="" disabled>
        
        <button id="editactivate" type="button">Edit Profile</button>
        <button id="editprofile" type="submit" style="display: none;">Save Changes</button>

        <button id="changepass" type="button">Change Password</button>
    </form>

	  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="ajax/userProfile.js"></script>
      
       




</body>


</html>