<?php
   
session_start();
require_once('../Models/alldb.php');

if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["Cpassword"];

    if (empty($name) || empty($email) || empty($password) || empty($cpassword)) {
        echo "<script> alert('Fill All The Fields');window.location.href = '../views/register.php'</script>";
    } elseif ($password !== $cpassword) {
        echo "<script> alert('Password doesent match');window.location.href = '../views/register.php'</script>";
    } else {
        $status = reg($name, $email, $password);

        if ($status) {
            echo "<script> alert('Registration complete !');window.location.href = '../views/LoginPage.php'</script>";
          //  header('Location:../views/LoginPage.php');
            exit();
        } else {
            echo "<script> alert('Error');</script>";
        }
    }
}
?>





		



			
		
	
