<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:../views/LoginPage.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(../images/banner.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 1;
            
        }

         input[type="button"] 
         {
            padding: 10px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: centre;
        }

        .content {
            text-align: centre;
            padding: 20px;
            background-color: #e6e6fa; 
            border-radius: 10px;
            margin: 50px auto;
            width: 50%; 
        }

        .content form {
            margin-top: 20px;
            text-align: left;
        }

        .content form label {
            display: block;
            margin-bottom: 8px;
            color: #DB4437;
        }

        .content form input[type="text"],
        .content form input[type="date"],
        .content form input[type="time"],
        .content form textarea 
        {
            width: 100%;
            padding: 10px;
            border: 1px solid #006400; 
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box; 
        }

        .content form input[type="submit"] {
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="content">
        <h2>Schedule an Appointment</h2>
        <form action="../controllers/processAppointment.php" method="POST">
            <label>Patient ID:</label>
            <input type="text" name="p_id" required><br>

            <label>Date:</label>
            <input type="date" name="appointment_date" required><br>

            <label>Time:</label>
            <input type="time" name="appointment_time" required><br>

            <input type="submit" name="schedule_appointment" value="Schedule Appointment">
        </form>
        <br>
        <input type="button" value="Go Back" onclick="window.location.href='Home.php'">
    </div>
</body>

</html>
