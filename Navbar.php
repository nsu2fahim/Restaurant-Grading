<?php session_start(); ?>
<header class="primary-header container group">	
	<h1 class="logo">
        <a href="/Restaurant-Grading"> Restaurant <br> Grading </a>
    </h1>
    <h3 class="tagline">Welcome to the land of foodies . . . </h3>
	<nav class="nav primary-nav">
	    <ul>
            <li><a href="/Restaurant-Grading">Home</a></li>
            <?php
                if(!isset($_SESSION['name'])){
                    echo "<li><a href='SignUp.php'>SignUp</a></li>
                    <li><a href='Login.php'>Login</a></li>";
                }
            ?>
            <li>
                <a href="">
                    <?php
                        if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        }
                    ?>
                </a>
            </li>
            <?php 
                if(isset($_SESSION['name'])){
                    echo "<li>
                    <a href='' id='logoutbtn'>Logout</a>
                    </li>";
                }
            ?>
		</ul>
	</nav>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax/logoutUser.js"></script>