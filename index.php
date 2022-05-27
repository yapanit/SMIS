<?php
session_start();
include ('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Scholarship Management Information System</title>

	<!-- Imported files -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<div class=container>
	<div class="row login-form">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="functions/login.php" method="post" role="form" name="loginform" onsubmit="return validateForm()">
					<div class="form-header form-group">
						<h2>Login</h2>
						<?php if(isset($_GET['message'])){ echo "<h6>" .$_GET['message']. "</h6>"; } ?>
					</div>
					<div class="form-group">
						<label for="usertype">User Type:
							<select name="usertype" id="usertype" class="form-control">
								<option value="Admin">Admin</option>
								<option value="Student">Student</option>
							</select>
						</label>
					</div>
					<div class="form-group">
						<label class="control-label" for="uname">Username:</label>
						<input type="text" name="uname" id="uname" placeholder="| Username" class="form-control uname">
					</div>
					<div class="form-group">
						<label class="control-label" for="pwd">Password:</label>
						<input type="password" name="pwd" id="pwd" placeholder="| Password" class="form-control pass">
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary">
						<input type="reset" name="reset" value="Reset" class="btn btn-danger">
					</div>
					<div class="form-footer form-group">
						<a href="functions/signup.php" class="sign-up">Don't have an account? Sign Up here!</a>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

	<script src="js/jquery-3.3.1.min.js"></script> 
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
	<script type="text/javascript">
		function validateForm() {
			var x = document.forms["loginform"]["uname"].value;
			var y = document.forms["loginform"]["pwd"].value;
			if (x=="" || y=="") {
				window.alert("Username and Password is required!");
				return false;
			}
		}

	</script>
</body>
</html>