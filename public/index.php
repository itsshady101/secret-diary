<?php require_once("../includes/sessions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to simple diary!</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
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
		<div class="jumbotron">
			<div class="overlay"></div>

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 content center">
						<h1>What's Your Story?</h1>
						<p class="muted">A story starts with a diary start your story.</p>
						<button class="btn btn-primary btn-lg margin-right" data-toggle="modal" data-target="#login">Log In</button>
						<button class="btn btn-default btn-lg" data-toggle="modal" data-target="#signup">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Login MODAL -->

	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Login</h3>
				</div>

				<div class="modal-body">
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username.">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Your Password.">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-success" value="Login">
							<a href="#" class="btn btn-default">Forget Password</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- SIGN-UP MODAL -->
	<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Sign Up</h3>
				</div>

				<div class="modal-body">
					<form action="signup.php" method="post">
						<div class="form-group">
							<label for="nickName">Nick Name:</label>
							<input type="text" class="form-control" id="nickName"  name="nickname" placeholder="Enter your Nick Name.">
						</div>

						<div class="form-group">
							<label for="username">Username:</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Enter a Username Name.">
						</div>

						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Choose a Password.">
						</div>

						<div class="form-group">
							<label for="question">Security Question</label>
							<input type="text" class="form-control" id="question" name="question" placeholder="Enter your secret Question.">
						</div>

						<div class="form-group">
							<label for="answer">Answer:</label>
							<input type="text" class="form-control" id="answer" name="answer" placeholder="Enter security question's answer.">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-success" name="submit" value="Sign up">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/app.js"></script>

</body>
</html>