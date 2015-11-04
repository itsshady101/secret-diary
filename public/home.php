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



	$query = "SELECT * from entries WHERE user_id = {$user_id}";
	$result = mysqli_query($connection, $query);

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
						<a href="write.php"><span class="pull-right icon glyphicon glyphicon-pencil"></span>  </a>

						<a href="edit_profile.php"><span class="pull-right icon glyphicon glyphicon-user margin-right-x"></span></a>

						<a href="logout.php"><span class="pull-left icon glyphicon glyphicon-off"></span></a>
					</div> 
				</div>
			</div>
		</nav>
	</header>

	<?php if(isset($_SESSION["message"]) && $_SESSION["message"] != "") { ?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 center message">
					<div class="alert alert-success alert-dismissible" role="alert">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  						<?php echo $_SESSION["message"]; ?>
  						<?php $_SESSION["message"] = ""; ?>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
	
	<section>
		<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 mr-top card">
						<h4 class="center">Yo it's mah story journey continues...!!!!</h4>

						<p class="align-left info"><u>Date: 24th January, 2016</u> <span class="pull-right"><u>Time: 22:10</u></span></p>

						<p>Dear Diary,</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi deleniti fugiat, commodi eum, repellat, dolorum numquam impedit voluptatem qui, amet illum officiis! Reiciendis mollitia nesciunt aperiam, esse tempora vel assumenda? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit obcaecati ratione quidem iure sapiente, omnis delectus. Saepe suscipit, a aperiam maiores nostrum libero iste temporibus. Fugiat a quibusdam necessitatibus obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas saepe iste velit pariatur, architecto exercitationem, facilis distinctio amet repellendus neque dicta accusantium ipsum cupiditate similique aut dolorum, voluptatum! Quasi, magni.</p>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi deleniti fugiat, commodi eum, repellat, dolorum numquam impedit voluptatem qui, amet illum officiis! Reiciendis mollitia nesciunt aperiam, esse tempora vel assumenda? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit obcaecati ratione quidem iure sapiente, omnis delectus. Saepe suscipit, a aperiam maiores nostrum libero iste temporibus. Fugiat a quibusdam necessitatibus obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas saepe iste velit pariatur, architecto exercitationem, facilis distinctio amet repellendus neque dicta accusantium ipsum cupiditate similique aut dolorum, voluptatum! Quasi, magni.</p>
				
						<p class="links mr-top"><b><a href="#"><span class="glyphicon glyphicon-text-size"></span> Edit</a>	<a href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a></b></p>
					</div>
				</div>
			</div>		
	</section>
	
	<?php while( $data = mysqli_fetch_assoc($result) ) {  ?>
	<section>
		<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 mr-top card">
						<h4 class="center"><?php echo $data["title"]; ?></h4>

						<p class="align-left info"><u>Date: <?php echo $data["date"]; ?></u> <span class="pull-right"><u>Time: <?php echo $data["time"]; ?></u></span></p>

						<p>Dear Diary,</b><?php echo $data["content"];?></p>
						
						<p class="links mr-top"><b><a href="edit.php?id=<?php echo $data["id"]; ?> "><span class="glyphicon glyphicon-text-size"></span> Edit</a>	<a href="delete.php?id=<?php echo $data["id"]; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a></b></p>
					
	
					</div>
				</div>
			</div>	
	</section>
	<?php } ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/app.js"></script>

	<?php require_once("../includes/db_close.php"); ?>

</body>
</html>