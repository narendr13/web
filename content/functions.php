<?php
function unameexists($conn,$uid){
	$sql="SELECT * FROM customers where username=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt,"s",$uid);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if(mysqli_num_rows($result)>0){
		return true;
	}
	else{
		return false;
	}
	mysqli_stmt_close($stmt);
}

function createuser($conn,$uid,$firstname,$lastname,$dob,$c_address1,$c_address2,$c_pscode,$passwd,$cpasswd){
	$sql="INSERT INTO customers(username,password_hash,customer_forename,customer_surname,customer_postcode,customer_address1,customer_address2,date_of_birth) values (?,?,?,?,?,?,?,?)";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../signup.php?error=stmtfailed");
		exit();
	}
	$hashpwd=SHA1($passwd);
	mysqli_stmt_bind_param($stmt,"ssssssss",$uid,$hashpwd,$firstname,$lastname,$c_pscode,$c_address1,$c_address2,$dob);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}


function userlogin($conn,$uid,$paswd){
	$usernameexists=unameexists($conn,$uid);
	if($usernameexists==false){
		header("Location: index.php?error=incorrectUserid");
		exit();
	}
	$hashedpasswd=SHA1($paswd);
	$sql="SELECT password_hash FROM customers WHERE username=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt,"s",$uid);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	while($row=mysqli_fetch_assoc($result)){
		$password_h = $row['password_hash'];
	}
	if($password_h !== $hashedpasswd){
		header("Location: index.php?error=incorrectPassword");
		exit();
	}
	else{
		echo 'naren';
		session_start();
		$_SESSION['userid']=$uid;
		header("Location:home.php");
		exit();
		}
}

function activityinfo($conn,$i,$j){
	$sql='SELECT * FROM activities WHERE activityID="'.$i.'"';
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$actname=$row['activity_name'];
	$actdescrip=$row['description'];
	$actprice=$row['price'];
	$actlocation=$row['location'];
	
	if($j==1){
		return $actname;
	}
	if($j==2){
		return $actdescrip;
	}
	if($j==3){
		return $actprice;
	}
	if($j==4){
		return $actlocation;
	}
}

function insert_ticketsanddate($conn,$numticket,$bookdate,$custid,$bookid){
	$sql='INSERT INTO booked_activities(activityID,customerID,number_of_tickets,date_of_activity) values ('.$bookid.','.$custid.','.$numticket.',"'.$bookdate.'")';
	$result=mysqli_query($conn, $sql);
	if($result==false){
		header('Location:bookedactivities.php?error=duplicatebooking');
		exit();
	}
	 
}

function retcustomerid($conn,$userName){
	$sql='SELECT customerID FROM customers WHERE username="'.$userName.'"';
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$customerid=$row['customerID'];
	}
	return $customerid;
}	
function booked_act($conn,$userName){
	$sql='SELECT activityID FROM booked_activities WHERE customerID="'.retcustomerid($conn,$userName).'"';
	$result = mysqli_query($conn, $sql);
	$actarr = array();
	while($row=mysqli_fetch_assoc($result)){
		array_push($actarr,$row['activityID']);
	}
	return $actarr;
}

function activity_info($conn,$v,$userName){
	$sql='SELECT date_of_activity,number_of_tickets FROM booked_activities WHERE activityID="'.$v.'" and customerID="'.retcustomerid($conn,$userName).'"';
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		echo '<tr><td>';
		echo '<a href="activities.php">'.$v.'</a>';
		echo '</td><td>';
		echo '<p> '.$date=$row['date_of_activity'].'</p>';
		echo '</td><td>';
		echo '<p>'.$numtick=$row['number_of_tickets'].'</p>';
		echo '</tr></td>';
		
		
	}	
}
function getinfo($conn,$userName){
	
	echo '<table class="login">';
	echo '<tr><th>activityID</th><th>date</th><th>tickets</th></tr>';
	foreach(booked_act($conn,$userName) as $value => $v){
		activity_info($conn,$v,$userName);
	}
	echo '</table>';
	
	
}
function sanitize($x){
	$san=filter_var($x,FILTER_SANITIZE_STRING);
	$sanitized=filter_var($san,FILTER_SANITIZE_SPECIAL_CHARS);
	return $sanitized;
}

function searchresult($conn,$searchword){
	$sql='SELECT * FROM activities WHERE activity_name LIKE "'.$searchword.'" OR description LIKE "'.$searchword.'" OR location LIKE "'.$searchword.'"';
	$res=mysqli_query($conn,$sql);
	$result=mysqli_num_rows($res);
	
	if($result>0){
		while($row=mysqli_fetch_assoc($res)){
			echo '<h2>'.$row['activity_name'].'</h2>';
			echo '<p>'.$row['description'].'</h2>';
			echo '<p>'.$row['location'].'</h2>';
			
		}
	}
	else{
		echo 'no results matching '.$searchword.'';
	}
}
	
?>
