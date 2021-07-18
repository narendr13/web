<?php
include 'header.php';
include 'dbconn.php';
include 'functions.php';

session_start();

if(array_key_exists('userid', $_SESSION )){
    $userName = $_SESSION['userid'];
}
else {
        header('Location: index.php?error=notloggedin');
}

?>
<?php
	if(isset($_GET['error'])){
		if($_GET['error']=="duplicatebooking"){
			echo '<p class="error">You have booked this activity already!...</p>';
		}
		else{
			echo '<p class="msgs">Your booked activities are!...</p>';
	}
}
			
getinfo($conn,$userName);


?>