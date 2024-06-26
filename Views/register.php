


<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
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

        form 
        {
            background-color: #e6e6fa;
            border: 2px solid black;
            width: 500px;
            padding: 20px;
        }

        #name, #email, #password, #Cpassword {
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

        #signup {
            background-color: blueviolet;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        #signup:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <form class="" action="../Controllers/regcheck.php" method="post">
        <label for="name">Name</label><br>
        <input id="name" type="text" name="name" value="" placeholder="Enter your name"><br><br>

        <label for="email">Email</label><br>
        <input id="email" type="email" name="email" value="" placeholder="Enter your Email"><br><br>

        <label for="password">Password</label><br>
        <input id="password" type="password" name="password" value="" placeholder="Set your password"><br><br>

        <label for="Cpassword">Confirm Password</label><br>
        <input id="Cpassword" type="password" name="Cpassword" value="" placeholder="Set your password"><br><br>

        <input id="signup" type="submit" name="signup" value="Signup">  <br>
        <p>Already a user?<a href="../views/LoginPage.php"><b>Sign in</b></a></p>
    </form>
</body>
</html>
