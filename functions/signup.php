<?php
session_start(); 
include("../connection.php"); 

$errors = array();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(preg_match("/\S+/", $_POST['uname']) === 0){
			$errors['uname'] = "* Username is required.";
		}	

		if(preg_match("/.{8,}/", $_POST['pass']) === 0){
			$errors['pass'] = "* Password Must Contain at least 8 Characters.";
		}

		if(preg_match("/\S+/", $_POST['fname']) === 0){
			$errors['fname'] = "* First Name is required.";
		}

		if(preg_match("/\S+/", $_POST['lname']) === 0){
			$errors['lname'] = "* Last Name is required.";
		}

		if(empty($_POST['address'])){
			$errors['address'] = "* Address is required.";
		}

		if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
			$errors['email'] = "* Not a valid e-mail address.";
		}

		if(empty($_POST['contact'])){
			$errors['contact'] = "* Contact number is required.";
		}

		if(empty($_POST['age'])){
			$errors['age'] = "* Age is required.";
		}

		if(empty($_POST['sex'])){
			$errors['sex'] = "* Sex is required.";
		}

		if(count($errors) === 0){
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$age = $_POST['age'];
			$sex = $_POST['sex'];

			$search_uname = mysqli_query($conn,"SELECT * FROM studacc WHERE username = '$uname'") or die(mysqli_error($conn));
			$num_row1 = mysqli_num_rows($search_uname);
			
			$search_email = mysqli_query($conn,"SELECT * FROM studacc WHERE email = '$email'") or die(mysqli_error($conn));
			$num_row2 = mysqli_num_rows($search_email);

			if($num_row1 >= 1){
				$errors['uname'] = "Username is unavailable.";
			} else if($num_row2 >= 1){
				$errors['email'] = "Email address is unavailable.";
			} else{
				$sql = "INSERT INTO studacc(username,password,fname,mname,lname,address,contact,email,sex,age) VALUES ('$uname','$pass','$fname','$mname','$lname','$address','$contact','$email','$sex','$age')";

				$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				?>
				<script type="text/javascript">
					alert('You are Successfully Registered Thank You');
					window.location="../signup.php";
				</script>

				<?php
			}
		}

	}

?>

<html>
<head>
	<title>Register</title>

	<!-- Imported files -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/animate.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="navbarResponsive">
		<a class="navbar-brand" href="../index.php"><img src="../images/smis_logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbarcontent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"> <a class="nav-link" href="../index.php">Go to Login</a></li>
			</ul>
		</div>
	</nav>

	<!-- Main Body -->
	<div class="container">
		<div class="jumbotron regform">
			<form role="form" name="regForm" method="post" action="functions/signup.php">
				<div class="form-header">
					<h1>Registration Form</h1>
					<hr>
				</div>
				<div class="title">
					<h3>Personal Information</h3>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="username">Username: </label>
						<input type="text" name="uname" id="uname" class="form-control form-control-sm" required>
						<?php if(isset($errors['uname'])){echo "<h6 class='error'>" .$errors['uname']. "</h6>"; } ?>
					</div>
					<div class="form-group col-md-4">
						<label for="password">Password: </label>
						<input type="password" name="pass" id="pass" class="form-control form-control-sm" required>
						<?php if(isset($errors['pass'])){echo "<h6 class='error'>" .$errors['pass']. "</h6>"; } ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="fname">First Name: </label>
						<input type="text" name="fname" id="fname" class="form-control form-control-sm" required>
						<?php if(isset($errors['fname'])){echo "<h6 class='error'>" .$errors['fname']. "</h6>"; } ?>
					</div>
					<div class="form-group col-md-4">
						<label for="mname">Middle Name: </label>
						<input type="text" name="mname" id="mname" class="form-control form-control-sm">
					</div>
					<div class="form-group col-md-4">
						<label for="lname">Last Name: </label>
						<input type="text" name="lname" id="lname" class="form-control form-control-sm" required> 
						<?php if(isset($errors['lname'])){echo "<h6 class='error'>" .$errors['lname']. "</h6>"; } ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-9">
						<label for="address">Address: </label>
						<input type="text" name="address" id="address" class="form-control form-control-sm" required>
						<?php if(isset($errors['address'])){echo "<h6 class='error'>" .$errors['address']. "</h6>"; } ?>
					</div>
					<div class="row">
					<div class="form-group col-md-8">
						<label for="email">E-mail Address: </label>
						<input type="email" name="email" id="email" class="form-control form-control-sm" required>
						<?php if(isset($errors['email'])){echo "<h6 class='error'>" .$errors['email']. "</h6>"; } ?>
					</div>
					<div class="form-group col-md-4">
						<label for="contact">Contact Number: </label>
						<input type="text" name="contact" id="contact" class="form-control form-control-sm" required>
						<?php if(isset($errors['contact'])){echo "<h6 class='error'>" .$errors['contact']. "</h6>"; } ?>
					</div>
				</div>
				<div class="form-group col-md-3">
						<label for="age">Age: </label>
						<input type="text" name="age" id="age" class="form-control form-control-sm" required>
						<?php if(isset($errors['age'])){echo "<h6 class='error'>" .$errors['age']. "</h6>"; } ?>
					</div>
					<div class="form-group col-md-3">
						<label for="sex">Sex: </label>
						<select name="sex" id="sex" class="form-control form-control-sm" required>
							<option value="">-please select sex-</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<?php if(isset($errors['sex'])){echo "<h6 class='error'>" .$errors['sex']. "</h6>"; } ?>
					</div>
					<div class="row">
					<div class="form-group col-md-8"></div>
					<div class="form-group col-md-2">
							<input type="submit" name="register" id="register" value="Register" class="btn btn-success form-control">
					</div>
					<div class="form-group col-md-2">
							<input type="reset" name="reset" id="reset" value="Reset" class="btn btn-danger form-control">
					</div>
				</div>
			</form>
		</div>
	</div>


	<!-- Javascript Files --> 
	<script src="js/jquery-3.3.1.min.js"></script> 
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>