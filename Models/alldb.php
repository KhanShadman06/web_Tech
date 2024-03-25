<?php

include('db.php');


function reg($name, $email, $password)
{
    $conn = getconn();
    $query = "INSERT INTO doctorreg (name, email, password) VALUES ('$name', '$email', '$password')";
    $res = mysqli_query($conn, $query);

    if ($res) {
        return true;
    } else {
        return false;
    }
}

function processLogin($email, $password)
{
    $conn = getconn();
    $query = "SELECT * FROM doctorreg WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if ($password === $row["password"]) {
                return "success";
            } else {
                return "wrong_password";
            }
        } else {
            return "user_not_found";
        }
    } else {
        return "database_error";
    }
}

function processAppointment($patient_id, $appointment_date, $appointment_time)
{
    $conn = getconn();
    
     $check_query = "SELECT * FROM patient WHERE id = '$patient_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $query = "INSERT INTO appointments (p_id, appointment_date, appointment_time) 
                    VALUES ('$patient_id', '$appointment_date', '$appointment_time')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            return "success";
        } else {
            return "error_scheduling_appointment";
        }
    } else {
        return "patient_not_found";
    }
}

function deleteAppointment($conn, $appointment_id)
{
    $query = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
    $result = mysqli_query($conn, $query);

    
    return $result;
}



function getAvailableAppointments()
{
    $conn = getconn();
    $query = "SELECT appointment_id, appointment_date, appointment_time FROM appointments";
    $result = mysqli_query($conn, $query);

    $appointments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    mysqli_close($conn);

    return $appointments;
}
function updateStatus($conn, $email, $status)
{
    $query = "UPDATE doctorreg SET status = '$status' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    return $result;
}
function searchPatientById($patient_id)
{
    $conn = getconn();
    $result = array();

    $query = "SELECT * FROM patient WHERE id = '$patient_id'";
    $query_run = mysqli_query($conn, $query);

    if (!$query_run) {
        echo "Error: " . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $result[] = $row;
        }
    }

    mysqli_close($conn);

    return $result;
}
function submitRequest($requestType, $reason)
{
    $conn = getconn();
    
    if (!empty($requestType) && !empty($reason)) {
        $query = "INSERT INTO requests (request_type, reason) VALUES ('$requestType', '$reason')";

        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }
    } else {
        mysqli_close($conn);
        return false;
    }
}

function uploadPrescription($prescriptionFile)
{
    $uploadDir = "C:/xampp/htdocs/Hospitalmanagement/images";  

    $uploadFile = $uploadDir . basename($prescriptionFile['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    
    if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        return "Sorry, only PDF, JPG, JPEG, and PNG files are allowed.";
    }

   
    if (file_exists($uploadFile)) {
        return "Sorry, the file already exists!";
    }

    
    if (move_uploaded_file($prescriptionFile['tmp_name'], $uploadFile)) {
        return "success";
    } else {
        return "Sorry, there was an error uploading your file!";
    }
}


function updateProfile($oldEmail, $name, $email, $password)
{
    $conn = getconn();

    $query = "UPDATE doctorreg SET name = '$name', email = '$email', password = '$password' WHERE email = '$oldEmail'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $affected_rows = mysqli_affected_rows($conn);
        mysqli_close($conn);

        if ($affected_rows > 0) {
            return true; 
        } else {
            return "No rows affected"; 
        }
    } else {
        $error_message = mysqli_error($conn);
        mysqli_close($conn);
        return "Error updating profile: $error_message";
    }
}

function getDoctorByEmail($email)
{
    $conn = getconn();

    $query = "SELECT * FROM doctorreg WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $doctorData = mysqli_fetch_assoc($result);
        mysqli_close($conn);

        return $doctorData;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return null;
    }
}

?>


