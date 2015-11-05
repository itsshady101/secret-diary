<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/sessions.php"); ?>

<?php 
	
	if($_SESSION["username"] == "") {
		redirect_to("index.php");
	}


	$username = $_SESSION["username"];
	$nickname = $_SESSION["nickname"];
	$user_id = $_SESSION["user_id"];

 
	if(isset($_POST["submit"])) {
		$new_nickname = $_POST["nickname"];
		$new_password = password_hash($_POST["password"], PASSWORD_BCRYPT);

		$query1 = "UPDATE users SET nickname='{$new_nickname}' ,hashed_password='{$new_password}' ";
		$query1 .= "where id={$user_id} ";


		$result1 = mysqli_query($connection, $query1);


		if($result1) {
			$_SESSION["message"] = "Information Updated Sucessfully.Please Login Again.";
			$_SESSION["username"] = "";
			$_SESSION["nickname"] = "";
			$_SESSION["user_id"] = 0;
			redirect_to("index.php");
		}  

		$_SESSION["message"] = "Updation Failed.";
		redirect_to("home.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nickname ?>'s awesome story.</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href='https://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
	
	<header>
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-md-12 center">
						<h3 class="inline"><?php echo ucfirst($nickname);?>'s Awesome Story Beginning.</h3>
						<a href="write.php"><span class="pull-right icon glyphicon glyphicon-pencil"></span></a>
						<a href="logout.php"><span class="pull-left icon glyphicon glyphicon-off"></span></a>
					</div> 
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="margin-top-x">
						<form action="edit_profile.php" method="post">
							<div class="form-group">
								<label for="nickname">Nickname:</label>
								<input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $nickname; ?>">
							</div>

							<div class="form-group">
								<label for="username">Username:</label>
								<p class="" id="username"><?php echo ucfirst($username);?></p>
							</div>
							
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" id="password" placeholder="Enter new Password" name="password"></input>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="submit" value="Save Changes" content="Submit">
								<a href="home.php" class="btn btn-default">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/app.js"></script>

	<?php require_once("../includes/db_close.php"); ?>

</body>
</html>