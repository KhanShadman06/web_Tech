<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

$conn = getconn();

if (isset($_POST['deleteapp'])) {
    $appointment_id = isset($_POST['appointment_id']) ? $_POST['appointment_id'] : null;

    
    $result = deleteAppointment($conn, $appointment_id);

    if ($result) {
        $affected_rows = mysqli_affected_rows($conn);

        if ($affected_rows > 0) {
            echo "<script> alert('Appointment Deleted Successfully!'); window.location.href = '../views/Home.php';</script>";
        } else {
            echo "<script> alert('No appointment found with ID: $appointment_id'); window.location.href = '../views/deleteappointment.php';</script>";
        }
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
