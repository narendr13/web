
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
<form method="post" action="search.php">
	<input  type="text" name="stext" placeholder="Search here">
	<button class="bsearch" type="submit" name="search-submit" placeholder="Search">Search</button>
</form>
<?php
if(isset($_POST['search-submit'])){
	$searchword=sanitize($_POST['stext']);
	
	searchresult($conn,$searchword);
}
?>

</body>
</html>
