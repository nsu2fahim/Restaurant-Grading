<?php
    session_start();
   // if(session_id() == '' || !isset($_SESSION)){session_start();}
    $db = mysqli_connect("localhost","root","","restaurentsgrade");
    // check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if(isset($_POST['signup_btn'])){
        session_start();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if($password == $password2){
            $password = md5($password); // hash password before storing for security purpose
            $sql = "INSERT INTO users(username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are now logged in";
            $_SESSION['username'] = $username;
            //header("location: home.php"); // redirect to home page
        }else{
            $_SESSION['message'] = "The two passwords don't match";
        }
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up || Restaurantgrade</title>
    <link rel="stylesheet" href="assets/stylesheets/SignUp.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400">
</head>
<body>
<header class="primary-header container group">
    <h1 class="logo">
        <a href="LandingPage.html">Restaurant<br>Grading</a>
    </h1>
    <h3 class="tagline">Welcome to the land of foodies . . . </h3>
    <nav class="nav primary-nav">
        <ul>
            <li><a href="LandingPage.html">Home</a></li><!--
     --><li><a href="SignUp.html">SignUp</a></li><!--
     --><li><a href="Login.html">Login</a></li><!--
     --><li><a href="LandingPage.html">Contact Us</a></li>
        </ul>
    </nav>
</header>

<section class="row-alt">
    <div class="lead container">


    </div>
</section>


<form method="post" action="register.php">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="Submit" name="signup_btn" class="Sign Up"></td>
        </tr>
    </table>
    <p>
        Already a member? <a href="Login.php">Log in</a>
    </p>
</form>

<div class="row" style="margin-top:10px;">
    <div class="small-12">

        <footer>
            <p style="text-align:center; font-size:0.8em;">&copy; RestaurantsGrade. All Rights Reserved.</p>
        </footer>

    </div>
</div>


</body>
</html>
