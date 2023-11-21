<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

if (!isset($_SESSION["login"])) {
    header("Location: LoginPage.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($name) && !empty($email)) {
        $usermail = $_SESSION['email'];
        $result = mysqli_query($conn, "UPDATE `doctorreg` SET `name`='$name', `email`='$email', `password`='$password' WHERE `email`='$usermail'");
    }

    if ($result) {
        echo "<script> alert('Profile Updated Successfully!'); window.location.href = 'Home.php';</script>";
           $_SESSION["name"] = $name;
           $_SESSION["email"] = $email;
           $_SESSION["password"] = $password;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>
