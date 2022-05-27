<?php
include('../connection.php');
session_start();

if (isset($_POST['login'])) {

    $utype = $_POST['usertype'];
    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    
        // If user type is admin
        if ($utype == "Admin") {
    
            $query = "SELECT * FROM adminacc WHERE username = '".$username."' AND password = '".$password."';";
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            $row = mysqli_fetch_array($result);
    
            if($row < 1){
                $message = "Login Failed!";
                header("location: ../index.php?message=". $message);
            }
            else{
                echo('<script>alert("You are logged in!	")</script>');
                $_SESSION['id']=$row['admin_id'];
                header("location: ../admin/adashboard.php");
            }
        }
        // If user type is user
        if ($utype == "Student") {
    
            $query = "SELECT * FROM studacc WHERE username = '".$username."' AND password = '".$password."';";
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            $row = mysqli_fetch_array($result);
    
            if($row < 1){
                $message = "Login Failed!";
                header("location: ../index.php?message=". $message);
            }
            else{
                echo('<script>alert("You are logged in!	")</script>');
                $_SESSION['id']=$row['stud_id'];
                header("location: ../student/profile.php");
            }
        }
    }

?>