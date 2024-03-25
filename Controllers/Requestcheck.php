<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

if (isset($_POST['submit'])) {
    $requestType = isset($_POST['request_type']) ? $_POST['request_type'] : '';
    $reason = isset($_POST['reason']) ? $_POST['reason'] : '';

    $result = submitRequest($requestType, $reason);

    if ($result) {
        echo "<script>alert('Request Submitted Successfully'); window.location.href = '../Views/Home.php';</script>";
    } else {
        echo "<script>alert('Error submitting request'); window.location.href = '../Views/Request.php';</script>";
    }
}
?>
