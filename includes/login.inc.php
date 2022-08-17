<?php

if(isset($_POST['username'])){
    //grabbing the data
	$username		= htmlspecialchars(trim($_POST['username']));
	$password	= htmlspecialchars(trim($_POST['password']));


// instantiate LoginContr Class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new loginContr($username,$password);

// running error handlers and user login
    $login->loginUser();

// going back to front page
}
