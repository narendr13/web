<?php
include 'dbconn.php';
?>
<html>
<head>
<title>Tourist Information</title>
<link rel="stylesheet" href="\assets\css\stylesheet.css">
</head>
<body>
<h1>KAKINADA-Tourist Information</h1>
<?php
	if(isset($_GET['error'])){
		if($_GET['error']=="emptyfields"){
			echo '<p class="error">Please fill all the required fields</p>';
		}
		elseif($_GET['error']=="invaliduname"){
			echo '<p class="error">Invalidusername</p>';
		}
		elseif($_GET['error']=="passwordDoesntMatch"){
			echo '<p class="error">passwordDoesntMatch</p>';
		}
		elseif($_GET['error']=="usernameexists"){
			echo '<p class="error">User name not available, choose another one</p>';
		}
		elseif($_GET['error']=="invalidname"){
			echo '<p class="error">Please enter valid Name</p>';
		}
		elseif($_GET['error']=="addressORpostcode"){
			echo '<p class="error">Please enter valid Address</p>';
		}
}
	
	
?>
<div>
	

	<form class="signup" method="post" action='signupcheck.php'>
		<h2>Enter the following details to Signup...</h2>
		<label for="uname">User name:</label><br>
		<input type="text" id = "uname" name="uname" required><br><br>
		<label for="fnane">First name:</label><br>
		<input type="text" id = "fname" name="fname" required><br><br>
		<label for="lname">Last name:</label><br>
		<input type="text" id = "lname" name="lname"><br><br>
		<label for = "birthday">Date of Birth:</label><br>
		<input type="date" id ="birthday" name="birthday" required><br><br>
		<label for="adrs1">Address1:</label><br> 
		<input type="text" id="adrs1" name="address1" required><br><br>
		<label for="adrs2">Address2:</label><br> 
		<input type="text" id="adrs2" name="address2" option><br><br>
		<label for="pscode">Post code:</label><br> 
		<input type="text" id="pscode" name="postcode" required><br><br>
		<label for ="password">Choose password:</label><br>
		<input type="password" id = "password" name="password" required><br><br>
		<label for ="cpassword">Confirm your password:</label><br>
		<input type="password" id ="cpassword" name="cpassword" required><br><br>
		<button class="credbutton"type="Submit" name="sub-signup">Signup</button>
	</form>
</div>
</body>
</html>