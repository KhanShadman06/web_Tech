<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

require_once('../Models/alldb.php');

if (isset($_POST['submit'])) {
    $result = uploadPrescription($_FILES['prescription']);

    if ($result === "success") {
        echo "<script>alert('The file has been uploaded successfully!'); window.location.href = '../views/Home.php';</script>";
    } else {
        echo "<script>alert('$result'); window.location.href = '../views/prescription.php';</script>";
    }
}
?>
