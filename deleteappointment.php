<?php
session_start();

if (!isset($_SESSION["login"])) 
  {
    header("Location: LoginPage.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete Appointment</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(images/banner.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            border: 2px solid black;
            width: 500px;
            padding: 20px;
            background-color: #e6e6fa;
            border-radius: 10px;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: red; 
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <form action="deleteapp.php" method="post">
        <h2>Delete Appointment</h2>
        <label for="appointment_id">Select Appointment:</label>
        <select name="appointment_id" required>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

           
            $query = "SELECT appointment_id, appointment_date, appointment_time FROM appointments";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['appointment_id']}'>{$row['appointment_date']} {$row['appointment_time']}</option>";
            }
            mysqli_close($conn);
            ?>
        </select>

        <input type="submit" name="deleteapp" value="Delete Appointment">
    </form>
</body>

</html>
