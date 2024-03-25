<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign in</title>

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
           h1{
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #e6e6fa;
            border: 2px solid black;
            width: 500px;
            padding: 20px;
        }

        #email,
        #password {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 50px;
        }

        label {
            font-weight: bold;
            font-size: 20px;
        }

        #signin {
            background-color: blueviolet;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        #signin:hover {
            opacity: 0.8;
        }
    </style>
</head>


<body>

   

    <form class="" action="../Controllers/check.php" method="post">
         <h1>
            <?php
            if (isset($_SESSION['status'])) 
            {
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            }
            ?>
        </h1>
        <p><h2>Doctor sign in</h2></p>


        <label for="">Email</label><br>
        <input id="email" type="email" name="email" value="" placeholder="Enter your Email"><br><br>

        <label for="">password</label><br>
        <input id="password" type="password" name="password" value="" placeholder="Enter your password"><br><br>
        <input id="signin" type="submit" name="submit" value="Sign in">

        <p>Not a user?<a href="../views/register.php"><b>Register here</b></a></p>
    </form>

    </body>
    </html>
