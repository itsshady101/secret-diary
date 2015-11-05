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

	if( !isset($_SESSION["post_id"]) || ($_SESSION["post_id"] === 0)) {
		$_SESSION["post_id"] = $_GET["id"];
	}


	if(!isset($_POST["submit"])) {

		$query = "SELECT * FROM entries WHERE id={$_GET["id"]} ";
		$result = mysqli_query($connection, $query);
		$data = mysqli_fetch_assoc($result);

		if($data["user_id"] != $_SESSION["user_id"] ) {
			redirect_to("home.php");
		} 

	}
 
	if(isset($_POST["submit"])) {
		$title = $_POST["title"];
		$content = $_POST["content"];

		echo $_SESSION["post_id"];

		$query1 = "UPDATE entries SET title='{$title}' ,content='{$content}' ";
		$query1 .= "where id={$_SESSION["post_id"]} ";


		$result1 = mysqli_query($connection, $query1);


		if($result1) {
			$_SESSION["message"] = "Updated Sucessfully.";
			$_SESSION["post_id"] = 0;
			redirect_to("home.php");
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
						<form action="edit.php" method="post">
							<div class="form-group">
								<label for="title">Title:</label>
								<input type="text" class="form-control" id="title" name="title" value="<?php echo $data["title"]; ?>">
							</div>
							<div class="form-group">
								<label for="content">Diary Entry:</label>
								<textarea name="content" id="content" class="form-control" cols="30" rows="10"><?php echo $data["content"]; ?></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="submit" value="Edit" content="Submit">
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