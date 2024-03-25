<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <style>
   body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url(../images/banner.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
}

.menu {
    padding: 20px;
    border-top: 60px solid #87CEEB; 
    border-left: 60px solid #87CEEB; 
    height: 100vh;
    box-sizing: border-box;
}

h2, h3 ,h4{
    margin-top: 20px;
    font-weight: bold;
    color: #DB4437;
}

h2 {
    float: left;
    margin-right: 20px;
}

h3 {
    float: right;
    margin-right: 20px;
}

h4 {
    float: right;
    margin-right: 20px;
}


ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

ul li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #4285f4;
}

a:hover {
    color: #DB4437;
}

.links {
    padding: 20px 0;
}

.footer {
    position: fixed;
    bottom: 0;
    right: 0;
    padding: 20px;
    text-align: right;
}

.menu li a {
    display: block;
    padding: 10px;
    margin: 10px;
    background-color: #e6e6fa;
    color: #000; 
    border: 1px solid #87CEEB; 
    border-radius: 5px;
}


    </style>

<body>

    <h2><a href="notifications.php">Notifications</a></h2>
    <h3><a href="../Controllers/logout.php">Logout</a></h3>
    <h4><a href="updateprofile.php">Update Profile</a></h4>

    <div>
        <div class="menu">
            <ul>
                <li><a href="appoinment.php">Set Appointment</a></li>
                <li><a href="deleteappointment.php">Delete Appointment</a></li>
                <li><a href="Status.php">Set Your Status</a></li>
                <li><a href="patientprofile.php">Search Patients</a></li>
                <li><a href="prescription.php">Upload Prescription</a></li>
                <li><a href="Request.php">Request</a></li>
            </ul>
        </div>
        <div class="footer">
            <div>
                <h4>Emergency</h4>
                <ul>
                    <li><a href="#">Ambulance</a></li>
                    <li><a href="#">Hotline</a></li>
                    <li><a href="#">Location</a></li>
                </ul>
            </div>
        </div>
</body>

</html>
