<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}
   $conn = getconn();

if (isset($_POST['updatestatus'])) {
    $status = $_POST['status'];
    $email = $_SESSION["email"];

    $result = updateStatus($conn, $email, $status);

    if ($result) {
         echo "<script> alert('Status Updated Successfully!'); window.location.href = '../views/Home.php';</script>";
    } else {
         echo "<script> alert('Error'); window.location.href = '../views/Status.php';</script>";
    }
    mysqli_close($conn);
}
?>
