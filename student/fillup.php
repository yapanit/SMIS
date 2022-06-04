<?php
session_start();

include '../connection.php';

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
	header('../index.php');
	exit();
}

$query = "SELECT * FROM studacc	 WHERE stud_id='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

?>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fillup Form</title>

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
					<a class="nav-link profile" style="color: #000; background-color: #aaa;"> Welcome:
						<?php
						echo " " . $row['fname'];
						$id = $row['stud_id'];
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
					<h4>Fill up Information</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form role="form" action="" method="post" class="update-form">
						<hr>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="fname">First Name:&nbsp;</label>
									<input type="text" name="fname" id="fname" class="form-control form-control-sm" value="" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="mname">Middle Name:&nbsp;</label>
									<input type="text" name="mname" id="mname" class="form-control form-control-sm" style="width: 100%" value="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lname">Last Name:&nbsp;</label>
									<input type="text" name="lname" id="lname" class="form-control form-control-sm" style="width: 100%" value="" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label for="studnum">Student Number:&nbsp;</label>
									<input type="text" name="studnum" id="studnum" class="form-control form-control-sm" style="width: 100%" value="" required>
								</div>
								<div class="form-group">
									<label for="course">Course:&nbsp;</label>
									<input type="selec" name="course" id="course" class="form-control form-control-sm" value="" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="college">College:&nbsp;</label>
									<input type="text" name="college" id="college" class="form-control form-control-sm" value="" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="unit">Unit:&nbsp;</label>
									<input type="text" name="unit" id="unit" class="form-control form-control-sm" style="width: 100%" value="" required>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="gpa">GPA:&nbsp;</label>
									<input type="text" name="gpa" id="gpa" class="form-control form-control-sm" style="width: 100%" value="" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="email">Cvsu Email:&nbsp;</label>
									<input type="text" name="email" id="email" class="form-control form-control-sm" value="" required>
								</div>
							</div>
						</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Type of Scholar:&nbsp;</label>

							<label for="academic">Academic</label>
							<input type="radio" name="stype" id="academic" class="form-control form-control-sm" value="Academic" required>

							<label for="talent">Talent</label>
							<input type="radio" name="stype" id="talent" class="form-control form-control-sm" value="Talent" required>
						</div>
					</div>
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


	<!-- Javascript Files -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap-4.3.1.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>
<?php
// Update Query 
if (isset($_POST['update'])) {

	$user_id = $_POST['sid'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$course = $_POST['course'];
	$address = $_POST['address'];
	$studnum = $_POST['studnum'];
	$college = $_POST['college'];
	$unt = $_POST['unit'];
	$gpa = $_POST['gpa'];
	$email = $_POST['email'];
	$stype = $_POST['stype'];

	$query = "UPDATE studacc SET username='$username', password='$password', fname='$fname', mname='$mname', lname='$lname', studnum='$studnum', course='$course', college='$college', unit='$unit', gpa='$gpa', email='$email',  WHERE stud_id='$user_id' ";


	mysqli_query($conn, $query) or die(mysqli_error($conn));

?>

	<script>
		window.alert('Submit successfully!');
		window.location = "profile.php";
	</script>

<?php
}

?>