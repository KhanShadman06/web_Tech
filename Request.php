<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: LoginPage.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Submit Your Request</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(images/banner.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 1px;
            background-color: #e6e6fa; 
        }
        input[type="button"] 
         {
            padding: 10px;
            background-color: #4285f4;
            color: white;
            border: 1px;
            border-radius: 5px;
            cursor: pointer;
            text-align: centre;
        }

        form {
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #DB4437;
            font-weight: bold;
        }

        select,
        textarea 
        {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #e6e6fa; 
        }


        textarea {
            resize: vertical;
           
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004d00;
        }
    </style>
</head>

<body>
    <form action="Requestcheck.php" method="post">
        <h2>Select your Request</h2>
        <select name="request_type">
            <option value="leave">Request for Leave</option>
            <option value="time_change">Request for Change my Time</option>
            <option value="others">Others</option>
        </select><br><br>

        <textarea name="reason" rows="6" cols="50" placeholder="Give a valid reason for Request"></textarea><br>

        <input type="submit" name="submit" value="Submit">
        <br>
        <br>
        <input type="button" value="Go Back" onclick="window.location.href='Home.php'">
    </form>
     
</body>

</html>

