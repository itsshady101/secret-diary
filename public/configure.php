<?php require_once("../includes/db_connect.php"); ?>
<?php
	$success = TRUE;

	$query  = "CREATE TABLE users(";
	$query .= "id int(11) NOT NULL AUTO_INCREMENT,";
	$query .= "nickname VARCHAR(256) NOT NULL,";
	$query .= "username VARCHAR(256) NOT NULL,";
	$query .= "hashed_password VARCHAR(256) NOT NULL,";
	$query .= "secret_question text NOT NULL,";
	$query .= "secret_answer VARCHAR(256) NOT NULL,";
	$query .= "PRIMARY KEY(id)";
	$query .= ")";

	$result = mysqli_query($connection, $query);

	if(!$result) {
		$success = FALSE;
	}

	$query  = "CREATE TABLE entries(";
	$query .= "id int(11) NOT NULL AUTO_INCREMENT,";
	$query .= "text text NOT NULL,";
	$query .= "date date NOT NULL,";
	$query .= "time time NOT NULL,";
	$query .= "user_id int(11) NOT NULL,";
	$query .= "title VARCHAR(256) NOT NULL,";
	$query .= "PRIMARY KEY(id)";
	$query .= ")";

	$result = mysqli_query($connection, $query);

	if(!$result) {
		$success = FALSE;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configure</title>
</head>
<body>
	<?php if($success) { ?>
		<p>Success all done!</p>
	<?php } else { ?>
		<p>Something wrong happended</p>
		<ul>
			<li>Make sure there is a database named diary.</li>
			<li>Make sure there is no tables in that DB named users and entries.</li>
		</ul>
	<?php } ?>

	<?php require_once("../includes/db_close.php"); ?>
</body>
</html>