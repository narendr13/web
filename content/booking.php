<?php
include 'dbconn.php';
include 'functions.php';
include 'header.php';

session_start();

if(array_key_exists('userid', $_SESSION )){
    $userName = $_SESSION['userid'];
}
else {
        header('Location: index.php?error=notloggedin');
}

?>

<form class="login">
	<?php
	if(isset($_GET['error'])){
		if($_GET['error']=="invaldate"){
			echo '<p>Please select activity date!...</p>';
		}
	}
	if(isset($_GET['book'])){
		$i=$_GET['book'];
		echo activityinfo($conn,$i,1);
		echo activityinfo($conn,$i,3);
		echo activityinfo($conn,$i,2);
		echo activityinfo($conn,$i,4);
	}
	
?>

 
 </form>

