<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php 
	

	if(!isset($_POST["submit"])) {
		redirect_to("home.php");
	}

	$username = $_SESSION["username"];
	$nickname = $_SESSION["nickname"];
	$user_id = $_SESSION["user_id"];

	$title = $_POST["title"];
	$content = $_POST["content"];

	$query = "INSERT INTO entries(";
	$query .= "content,date, time, user_id, title) ";
	$query .= "VALUES('{$content}', CURDATE(), CURTIME(), {$user_id}, '{$title}'";
	$query .= ")" ;

	$result = mysqli_query($connection, $query);

	if(!$result) {
		$_SESSION["message"] = "Can't Process Query.";
		redirect_to("home.php");
	}

	$_SESSION["message"] = "New Diary Entry Created." ;
	redirect_to("home.php");
?>