<?php
 if(isset($_POST['sub-login'])){
	include 'dbconn.php';
	include 'functions.php';
	
	
	$uid = sanitize($_POST['uname']);
	$paswd=sanitize($_POST['password']);
	
	if(empty($uid)||empty($paswd)){
		header('location: index.php?error=emptyfields');
		exit();
	}
	userlogin($conn,$uid,$paswd);
	echo 'you are logged in';
 }
 else{
	 header("Locatin: index.php");
	 exit();
 }
 
 


	