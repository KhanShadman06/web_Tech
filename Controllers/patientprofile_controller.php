<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

if (isset($_POST['Search'])) {
    $patient_id = isset($_POST['id']) ? $_POST['id'] : '';
    $patientData = searchPatientById($patient_id);
}

include('../Views/patientprofile.php');
?>
