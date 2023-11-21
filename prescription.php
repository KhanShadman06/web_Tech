<?php
session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: LoginPage.php");
        exit();
    }
?>
<!DOCTYPE html>
<head>
    <title>Prescription Upload</title>

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

        .container {
            border: 2px solid black;
            width: 500px;
            padding: 20px;
            background-color: #e6e6fa;
            border-radius: 10px;
        }

        form {
            text-align: center;
        }

        label {
            font-weight: bold;
            font-size: 20px;
        }

        input[type="file"] {
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
    <div class="container">

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="prescription">Select Prescription:</label>
            <input type="file" name="prescription" id="prescription" required accept=".pdf, .jpg, .jpeg, .png">

            <br><br>

            <input type="submit" name="submit" value="Upload Prescription">
        </form>
    </div>
</body>
</html>
