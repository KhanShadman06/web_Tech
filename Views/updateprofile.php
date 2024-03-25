<?php
session_start();

    if (!isset($_SESSION["login"])) {
        header("Location:../views/LoginPage.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Settings and Profile Management</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(../images/banner.jpg);
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
            background-color: #e6e6fa;;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: blueviolet;
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
 

<form action="../Controllers/validateprofile.php" method="post">
    <h2>Update Your Profile</h2>
    <label for="name">Name:</label>
    <input type="text" name="name" value="" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" value="" required><br>

    <input type="submit" name="submit" value="Update">
</form>

</body>

