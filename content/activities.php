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

<?php
	if(isset($_GET['book'])){
		$i=$_GET['book'];
		echo '<form class="login" method="post" action="activities.php">';
		echo '<h2>'.activityinfo($conn,$i,1).'</h2>';
		echo '<p>'.activityinfo($conn,$i,3).'</p>';
		echo '<p>'.activityinfo($conn,$i,4).'</p>';
		echo '<label for="numtickets">Number of tickets:</label>';
		echo '<input type="number" id="quantity" name="numtickets" min="1" max="10" value="1" required>';
		echo '<label for="bookingdate">Dateofbooking:</label>';
		echo '<input type="date" id="bookingdate" name="bookingdate" required>';
		echo '<button class="credbutton" type="submit" value="'.$i.'" name="act-book">Book</button>';
		echo '</form>';
    	exit();
	}
	if(isset($_POST['act-book'])){
		$numticket=sanitize($_POST['numtickets']);
		$bookdate=$_POST['bookingdate'];
		$bookid=$_POST['act-book'];
		if(empty($bookdate)){
			header('Location:booking.php?error=invaldate');
			exit();
		}
		$custid=retcustomerid($conn,$userName);
		insert_ticketsanddate($conn,$numticket,$bookdate,$custid,$bookid);
		echo 'Booking success';
		header('Location:bookedactivities.php');
		exit();
	}
?>
<div class="grid">
<?php

$sql="SELECT MAX(activityID) FROM activities";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maxID=implode($row);
 
for($i=1;$i<=$maxID;$i++){
	echo '<div class="wrapper">';
	echo '<form action="activities.php" method="get">';
	echo '<h2>'.activityinfo($conn,$i,1).'</h2>';
	echo '<h3>'.activityinfo($conn,$i,3).'</h3>';
	echo '<p>'.activityinfo($conn,$i,2).'</p>';
	echo '<p>'.activityinfo($conn,$i,4).'</p>';
	echo '<button class="bookedbutton" type="Submit" name="book" value="'.$i.'">Book</button>';
	echo '</form>';
	echo '</div>';
}
?>
</div>
