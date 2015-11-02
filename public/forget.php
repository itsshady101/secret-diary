<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php 

	if(isset($_POST["continue"])) {
		$username = $_POST["username"];

		$_SESSION["username"] = $username;

		$query = "SELECT * from users where username = '{$username}'";
	
		$result = mysqli_query($connection, $query);

		$user = mysqli_fetch_assoc($result);

		if(!$user) {
			redirect_to("forget.php");
		}

		$_SESSION["answer"] = $user["secret_answer"];

		$question = $user["secret_question"];
	}

	if(isset($_POST["submit"])) {
		$answer = $_SESSION["answer"];
		$_SESSION["answer"] = "";		

		if( password_verify($answer, $_POST["answer"]) ) {
			$can_change = TRUE;
		}
	}

	if(isset($_POST["change"])) {
		$new_password = password_hash($_POST["password"],PASSWORD_BCRYPT);

		$user = $_SESSION["username"];
		$_SESSION["username"] = "";

		$query = "UPDATE users SET hashed_password = '{$new_password}' where username='{$user}' LIMIT 1";
		$result = mysqli_query($connection, $query);

		if($result) {
			echo "Done" . "<br>" ;
		} else {
			echo "Nope" . "<br>" ;
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forget Password</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
	<header>
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-md-12 center">
						<h3 class="inline">Your Awesome Story Beginning.</h3>
					</div> 
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 margin-top-x">
					
					<?php if(!isset($_POST["continue"])) {  ?>

					<form action="forget.php" method="post">
						<div class="form-group">
							<label for="username">Username: </label>
							<input type="text" id="username" class="form-control" name="username" placeholder="Enter your Usename.">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success" name="continue" value="Forget Password">
							<a href="index.html" class="btn btn-default">Back To Homepage</a>
						</div>
					</form>
					
					<?php } else if(!isset($continue)) {?>

					<form action="forget.php" method="post">
						<div class="form-group">
							<label for="question">Question: </label>
							<p class="form-control-static"><?php echo $question; ?></p>
						</div>

						<div class="form-group">
							<label for="answer">Answer: </label>
							<input type="text" id="answer" class="form-control" name="answer" placeholder="<?php echo $_SESSION["answer"]; ?>">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-success" name="submit" value="Submit">
						</div>
					</form>

					<?php } else if(isset($_POST["submit"])) {?>


					<form action="forget.php" method="post">

						<div class="form-group">
							<label for="password">New Password: </label>
							<input type="password" id="password" class="form-control" name="password" placeholder="Enter the New Password..">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-success" name="change" value="Change Password">
						</div>
					</form>
					
					<?php } ?>

				</div>
			</div>
		</div>
	</section>

</body>
</html>