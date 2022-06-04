<?php
session_start();
include '../connection.php';

if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('../index.php');
	exit();
}

$query = "SELECT * FROM studacc	 WHERE stud_id='".$_SESSION['id']."'";
$result = mysqli_query($conn,$query)or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Information</title>

	<link href="../css/animate.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body data-spy="scroll" class="adashboard">
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="navbarResponsive">
		<a class="navbar-brand" href="../index.php"><img src="../images/smis_logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbarcontent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link profile"  style="color: #000; background-color: #aaa;"> Welcome:
						<?php
						echo " ".$row['fname']; 
						$id=$row['stud_id'];
						?>
					</a>
				</li>
				<li class="nav-item">
					<div class="dropdown">
						<a class="dropdown-toggle btn btn-dark" type="button" data-toggle="dropdown">What to do?</a>
						<ul class="dropdown-menu">
							<li class="nav-item">
								<a rel="tooltip" class="nav-link" title="Edit" id="<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal">
									Update Profile
								</a>
							</li>
							<li class="nav-item"> <a class="nav-link" class="logout btn btn-dark" href="../functions/logout.php">Logout</a> </li>
						</ul>
					</div>
				</li>

			</ul>
		</div>
	</nav>
<!-- Update HTML -->
	<div id="edit<?php echo $id; ?>" class="modal hide fade modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="sedit-modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<h4>Update Student Information</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form role="form" action="" method="post" class="update-form">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="uname">Username:&nbsp;</label>
									<input type="hidden" id="sid" name="sid" value="<?php echo $row['stud_id']; ?>" class="form-control" required>
									<input type="text" name="uname" id="uname" class="form-control form-control-sm" value="<?php echo $row['username']; ?>" style="width: 100%" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="pass">Password:&nbsp;</label>
									<input type="text" name="pass" id="pass" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['password']; ?>" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="fname">First Name:&nbsp;</label>
									<input type="text" name="fname" id="fname" class="form-control form-control-sm" value="<?php echo $row['fname']; ?>" style="width: 100%" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="mname">Middle Name:&nbsp;</label>
									<input type="text" name="mname" id="mname" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['mname']; ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lname">Last Name:&nbsp;</label>
									<input type="text" name="lname" id="lname" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['lname']; ?>" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label for="address">Address:&nbsp;</label>
									<input type="text" name="address" id="address" class="form-control form-control-sm" value="<?php echo $row['address']; ?>" style="width: 100%" required>
</div>
								<div class="form-group">
									<label for="zip">Zip Code:&nbsp;</label>
									<input type="text" name="zip" id="zip" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['zip']; ?>" required>
								</div>
							</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="email">E-mail Address:&nbsp;</label>
									<input type="text" name="email" id="email" class="form-control form-control-sm" value="<?php echo $row['email']; ?>" style="width: 100%" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="contact">Contact Number:&nbsp;</label>
									<input type="text" name="contact" id="contact" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['contact']; ?>" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="age">Age:&nbsp;</label>
									<input type="text" name="age" id="age" class="form-control form-control-sm" style="width: 100%" value="<?php echo $row['age']; ?>" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="sex">Sex:&nbsp;</label>
									<select name="sex" id="sex" class="form-control form-control-sm" style="width: 100%" required>
										<option value="Male" <?php if($row['sex'] == "Male"){ echo "selected"; } ?> >Male</option>
										<option value="Female" <?php if($row['sex'] == "Female"){ echo "selected"; } ?> >Female</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-8"></div>
							<div class="form-group col-md-2">
								<input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
							</div>
							<div class="form-group col-md-2">
								<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
// Update Query 
	if (isset($_POST['update'])) {

		$user_id=$_POST['sid'];
		$username = $_POST['uname'];
		$password = $_POST['pass'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$zip = $_POST['zip'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];

		$query="UPDATE studacc SET username='$username', password='$password', fname='$fname', mname='$mname', lname='$lname', address='$address', zip='$zip', contact='$contact', email='$email', age='$age', sex='$sex' WHERE stud_id='$user_id' ";


		mysqli_query($conn,$query) or die(mysqli_error($conn));

		?>

		<script>
			window.alert('Updated successfully!');
			window.location="profile.php";
		</script>

		<?php
	}

	?>


<!-- Display information HTML -->
	<div class="container student">
		<div class="stud-header">
			<h1>Your Information</h1>
		</div>
		<div class="stud-body">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="username">Username: </label>
					<input type="hidden" name="sid" id="sid" value="<?= $row['stud_id'] ?>">
					<input type="text" name="uname" id="uname" class="form-control form-control-sm" value="<?= $row['username']; ?>" required readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="password">Password: </label>
					<input type="password" name="pass" id="pass" class="form-control form-control-sm" value="<?= $row['password']; ?>" required readonly>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="fname">First Name: </label>
					<input type="text" name="fname" id="fname" class="form-control form-control-sm" value="<?= $row['fname']; ?>" required readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="mname">Middle Name: </label>
					<input type="text" name="mname" id="mname" class="form-control form-control-sm" value="<?= $row['mname']; ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="lname">Last Name: </label>
					<input type="text" name="lname" id="lname" class="form-control form-control-sm" value="<?= $row['lname']; ?>" required readonly>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-9">
					<label for="address">Address: </label>
					<input type="text" name="address" id="address" class="form-control form-control-sm" value="<?= $row['address']; ?>" required readonly>
			</div>
			<div class="row">
				<div class="form-group col-md-8">
					<label for="email">E-mail Address: </label>
					<input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= $row['email']; ?>" required readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="contact">Contact Number: </label>
					<input type="text" name="contact" id="contact" class="form-control form-control-sm" value="<?= $row['contact']; ?>" required readonly>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="age">Age: </label>
					<input type="text" name="age" id="age" class="form-control form-control-sm" value="<?= $row['age']; ?>" required readonly>
				</div>
				<div class="form-group col-md-3">
					<label for="sex">Sex: </label>
					<input type="text" name="sex" id="sex" class="form-control form-control-sm" value="<?= $row['sex']; ?>" required readonly>
				</div>
			</div>
			<hr>
		</div>
	</div>


	<!-- Javascript Files --> 
	<script src="../js/jquery-3.3.1.min.js"></script> 
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	<script src="../js/main.js"></script> 

</body>
</html>