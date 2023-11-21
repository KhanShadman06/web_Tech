<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

if (!isset($_SESSION["login"])) {
    header("Location: LoginPage.php");
    exit();
}

if (isset($_POST['submit'])) {
    $requestType = $_POST['request_type'];
    $reason =  $_POST['reason'];

    
    if (!empty($requestType) && !empty($reason)) {
        $query = "INSERT INTO requests (request_type, reason) VALUES ('$requestType', '$reason')";

        if (mysqli_query($conn, $query)) {
              echo "<script>alert('Request Submitted Successfully');window.location.href = 'Home.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Both request type and reason are required.');window.location.href = 'Request.php';</script>";
    }
}
?>
