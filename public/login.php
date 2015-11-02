<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php
	
	if(!isset($_POST["submit"])) {
		redirect_to("index.html");
	}

	$username = $_POST["username"];
	$password = $_POST["password"];

	$query = "SELECT * from users where username = '{$username}'";
	
	$result = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($result);

	if(!$user) {
		$_SESSION["message"] = "Username/Password Doesn't Match" ;
		redirect_to("index.php");
	} 

	if(password_verify($password,$user["hashed_password"])) {

		$_SESSION["username"] = $user["username"];
		$_SESSION["nickname"] = $user["nickname"];
		$_SESSION["user_id"] = $user["id"];

		redirect_to("home.php");

	} else {
		$_SESSION["message"] = "Username/Password Doesn't Match" ;
		redirect_to("index.php");
	}
?>


<?php require_once("../includes/db_close.php"); ?>