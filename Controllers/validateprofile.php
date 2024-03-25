<?php
session_start();
require_once('../Models/alldb.php');

if (!isset($_SESSION["login"])) {
    header("Location:../views/LoginPage.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($name) && !empty($email)) {
        $usermail = $_SESSION['email'];
        $result = updateProfile($usermail, $name, $email, $password);
    }

    if ($result === true) {
        echo "<script> alert('Profile Updated Successfully!'); window.location.href = '../views/Home.php';</script>";
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
    } else {
        echo "Error updating profile: $result";
    }
}
?>
