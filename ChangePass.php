<!DOCTYPE>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="assets/stylesheets/SignUp.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
	<script src="assets/js/validations.js" type="text/javascript"></script>
</head>
<body>
    <?php require('Navbar.php') ?>

    <form name="change_password_form">
        <h1>Change Password</h1>
        <div id="loading_spinner" class="spinner" style="display: none;">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
    	</div>
        <label for="cur_password">Current Password</label>
        <input type="password" id="cur_password" placeholder="*******" name="cur_password" required>

        <label for="new_password">New Password</label>
        <input type="password" id="new_password" placeholder="*******" name="new_password" required>

        <button id="changepass" type="submit">Change Password</button>
    </form>
	     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ajax/changePassword.js"></script>

</body>


</html>