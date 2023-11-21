<?php
    session_start();
  
    if (!isset($_SESSION['login'])) {
        header("Location: LoginPage.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Status</title>
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
            background-color: #e6e6fa;
            border: 2px solid black;
            width: 500px;
            padding: 20px;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 50px;
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
    <form action="updatestatus.php" method="post">
        <h2>Update Status</h2>

        <label for="status">Select Status:</label>
        <select name="status" required>
            <option value="Available">Available</option>
            <option value="Unavailable">Unavailable</option>
            <option value="On Vacation">On Vacation</option>
        </select><br><br>

        <input type="submit" name="updatestatus" value="Update Status">
    </form>
</body>

</html>
