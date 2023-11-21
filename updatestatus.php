<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

if (!isset($_SESSION["login"])) {
    header("Location: LoginPage.php");
    exit();
}

if (isset($_POST['updatestatus'])) {
    $status = $_POST['status'];
    $email = $_SESSION["email"];

    
    $query = "UPDATE doctorreg SET status = '$status' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
         echo "<script> alert('Status Updated Successfully!'); window.location.href = 'Home.php';</script>";
    } else {
         echo "<script> alert('Error'); window.location.href = 'Status.php';</script>";
    }

    mysqli_close($conn);
}
?>
