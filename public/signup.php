<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php
	
	if(!isset($_POST["submit"])) {
		redirect_to("index.html");
	}

	$nickname = $_POST["nickname"];
	$username = $_POST["username"];

	$query = "SELECT * from users where username = '{$username}' limit 1";
	$result = mysqli_query($connection, $query);

	if($result) {
		$_SESSION["message"] = "Username not available.";
		redirect_to("index.php");
	}

	$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
	$question = $_POST["question"];
	$answer = password_hash($_POST["answer"], PASSWORD_BCRYPT);

	$query = "INSERT INTO users(";
	$query .= "nickname, username, hashed_password, secret_question, secret_answer";
	$query .= ") VALUES(";
	$query .= "'{$nickname}', '{$username}', '{$password}', '{$question}', '{$answer}' ";
	$query .= ")";
	
	$result = mysqli_query($connection, $query);

	if(!$result) {
		$_SESSION["message"] = "Account can't be created.";
		redirect_to("index.php");
	}

	$_SESSION["message"] = "Account Created. Please Login.";
	redirect_to("index.php");
	
?>

<?php require_once("../includes/db_close.php"); ?>