<?php
if(isset($_POST['sub-signup'])){
	include 'dbconn.php';
	include 'functions.php';
	
	
	$uid = sanitize($_POST['uname']);
	$firstname=sanitize($_POST['fname']);
	$lastname=sanitize($_POST['lname']);
	$dob=sanitize($_POST['birthday']);
	$c_address1=sanitize($_POST['address1']);
	$c_address2=sanitize($_POST['address2']);
	$c_pscode=sanitize($_POST['postcode']);
	$passwd=sanitize($_POST['password']);
	$cpasswd=sanitize($_POST['cpassword']);
	
		

	
	if(empty($uid)||empty($firstname)||empty($lastname)||empty($dob)||empty($c_address1)||empty($c_pscode)||empty($passwd)||empty($cpasswd)){
		header('location:signup.php?error=emptyfields&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
		header('location:signup.php?error=invaliduname&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$firstname)||strlen($firstname)<3){
		header('location:signup.php?error=invalidname&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$lastname)||strlen($lastname)<3){
		header('location:signup.php?error=invalidname&fname="'.$firstname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$c_address1)){
		header('location:signup.php?error=addressORpostcode&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address2="'.$c_address2.'"');
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$c_address2)){
		header('location:signup.php?error=addressORpostcode&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"');
		exit();
	}else if(!preg_match("/^[a-zA-Z0-9]*$/",$c_pscode)){
		header('location:signup.php?error=addressORpostcode&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
		
	else if (unameexists($conn,$uid)){
		header("Location: signup.php?error=usernameexists");
		exit();
	}
	else if($passwd!=$cpasswd){
		header('location:signup.php?error=passwordDoesntMatch&fname="'.$firstname.'"&lname="'.$lastname.'"&birthday="'.$dob.'"&address1="'.$c_address1.'"&address2="'.$c_address2.'"');
		exit();
	}
	createuser($conn,$uid,$firstname,$lastname,$dob,$c_address1,$c_address2,$c_pscode,$passwd,$cpasswd);
	echo'you are signed up';
}
	else{
		header("Location:signup.php");
		exit();
	}
	header("Location:index.php");
		exit();

		
	