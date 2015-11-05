<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php 
	
	if($_SESSION["username"] == "") {
		redirect_to("index.php");
	}


	$user_id = $_SESSION["user_id"];

	if( !isset($_SESSION["post_id"]) || ($_SESSION["post_id"] === 0)) {
		$_SESSION["post_id"] = $_GET["id"];
	}



	$query = "SELECT * FROM entries WHERE id={$_GET["id"]} ";
	$result = mysqli_query($connection, $query);
	$data = mysqli_fetch_assoc($result);

	if($data["user_id"] != $_SESSION["user_id"] ) {
		redirect_to("home.php");
	}
 


	$query1 = "DELETE FROM entries ";
	$query1 .= "where id={$_SESSION["post_id"]} ";


	$result1 = mysqli_query($connection, $query1);


	if($result1) {
		$_SESSION["message"] = "Entry Deleted.";
		$_SESSION["post_id"] = 0;
		redirect_to("home.php");
	}  

	$_SESSION["message"] = "Deletion Failed.";
	redirect_to("home.php");
	
?>