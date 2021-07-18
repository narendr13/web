<?php
include 'dbconn.php';
?>
 <html>
<head>
<title>Tourist Information</title>
<link rel="stylesheet" href="\assets\css\stylesheet.css">
<h1>KAKINADA-Tourist Information</h1>

</head>

<body>

<?php
	echo '<div class="error">';
	if(isset($_GET['error'])){
		if($_GET['error']=="emptyfields"){
			echo '<p>Please fill all the required fields</p>';
		}
		elseif($_GET['error']=="incorrectUserid"){
			echo '<p>Please enter correct UserID!...</p>';
		}
		elseif($_GET['error']=="incorrectPassword"){
			echo '<p>Username and Password does not match</p>';
		}
		elseif($_GET['error']=="notloggedin"){
			echo '<p>Please login before accesing the site</p>';
		}
}
	

	echo '</div>';
?>

<div>
	<form class="login" method="post" action="logincheck.php">
		<h2>Welcome Please login...</h2>
		<label for="uname"></label><br>
		<input type="text" placeholder ="Enter username..."id = "uname" name="uname"><br>
		<label for="password"></label><br>
		<input type="password" placeholder="Password"id = "password" name="password"><br><br>
		<button class="credbutton"type="Submit" name="sub-login">login</button>
		<hr>
		<p>New user?</p><b><button class="credbutton"><a href="/content/signup.php">Signup</a></button>
	</form>
</div>

  

</body>
</html>