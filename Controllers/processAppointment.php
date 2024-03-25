<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION['login'])) {
    header("Location: ../views/LoginPage.php");
    exit();
}

if (isset($_POST['schedule_appointment'])) {
    $patient_id = $_POST['p_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    
    $result = processAppointment($patient_id, $appointment_date, $appointment_time);
    
    if ($result === "success") {
        echo "<script> alert('Appointment Scheduled Successfully!'); window.location.href = '../views/Home.php';</script>";
    } elseif ($result === "error") {
        echo "<script>alert('Error scheduling appointment');</script>";
    } elseif ($result === "patient_not_found") {
        echo "<script> alert('Patient ID Not Found'); window.location.href = '../views/appointment.php';</script>";
    }
}
?>
