<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

if (!isset($_SESSION["login"])) {
    header("Location: LoginPage.php");
    exit();
}

if (isset($_POST['deleteapp'])) {
    $appointment_id = isset($_POST['appointment_id']) ? $_POST['appointment_id'] : null;

    
    $query = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
    $result = mysqli_query($conn, $query);

   
    if ($result) {
        $affected_rows = mysqli_affected_rows($conn);

        if ($affected_rows > 0) {
            echo "<script> alert('Appointment Deleted Successfully!'); window.location.href = 'Home.php';</script>";
        } else {
         
            echo "<script> alert('No appointment found with ID: $appointment_id'); window.location.href = 'deleteappointment.php';</script>";
        }
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
