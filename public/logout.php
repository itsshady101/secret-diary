<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php 

	$_SESSION["username"] = "";
	$_SESSION["nickname"] = "";
	$_SESSION["user_id"] = "";

	$_SESSION["message"] = "Sucessfully Logged out.";
	redirect_to("index.php");

?>