<?php

if(isset($_POST['username'])){
    //grabbing the data
	$username		= htmlspecialchars(trim($_POST['username']));
	$password	= htmlspecialchars(trim($_POST['password']));


// instantiate LoginContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classses.php";
    $signup = new SignupContr($username,$password,$passwordrepeat,$email);

// running error handlers and user signup
    $signup->signupUser();

// going back to front page
}
