    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

    if (!isset($_SESSION['login'])) {
        header("Location: LoginPage.php");
        exit();
    }

    if (isset($_POST['schedule_appointment'])) {
        $patient_id = $_POST['p_id'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

   
        $check_query = "SELECT * FROM patient WHERE id = '$patient_id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
        
            $query = "INSERT INTO appointments (p_id, appointment_date, appointment_time) 
                        VALUES ('$patient_id', '$appointment_date', '$appointment_time')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script> alert('Appointment Sheduled Successfully!'); window.location.href = 'Home.php';</script>";
            } else {
                echo "<script>alert('Error scheduling appointment');</script>";
            }
        } else {
        
            echo "<script> alert('Patient ID Not Found'); window.location.href = 'appoinment.php';</script>";
            }
        }
        
       
    ?>
