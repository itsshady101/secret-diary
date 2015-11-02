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
						<h3 class="inline"><?php echo $nickname;?>'s Awesome Story Beginning.</h3>
						<a href="#"><span class="pull-right icon glyphicon glyphicon-cog"></span></a>
						<a href="logout.php"><span class="pull-left icon glyphicon glyphicon-menu-hamburger"></span></a>
					</div> 
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 mr-top card">
						<h4 class="center">Yo it's mah story journey continues...!!!!</h4>

						<p class="align-left info"><u>Date: 24th January, 2016</u> <span class="pull-right"><u>Time: 22:10</u></span></p>

						<p>Dear Diary,</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi deleniti fugiat, commodi eum, repellat, dolorum numquam impedit voluptatem qui, amet illum officiis! Reiciendis mollitia nesciunt aperiam, esse tempora vel assumenda? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit obcaecati ratione quidem iure sapiente, omnis delectus. Saepe suscipit, a aperiam maiores nostrum libero iste temporibus. Fugiat a quibusdam necessitatibus obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas saepe iste velit pariatur, architecto exercitationem, facilis distinctio amet repellendus neque dicta accusantium ipsum cupiditate similique aut dolorum, voluptatum! Quasi, magni.</p>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi deleniti fugiat, commodi eum, repellat, dolorum numquam impedit voluptatem qui, amet illum officiis! Reiciendis mollitia nesciunt aperiam, esse tempora vel assumenda? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit obcaecati ratione quidem iure sapiente, omnis delectus. Saepe suscipit, a aperiam maiores nostrum libero iste temporibus. Fugiat a quibusdam necessitatibus obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas saepe iste velit pariatur, architecto exercitationem, facilis distinctio amet repellendus neque dicta accusantium ipsum cupiditate similique aut dolorum, voluptatum! Quasi, magni.</p>
				
	
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