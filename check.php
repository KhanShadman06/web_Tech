    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hospitalmanagement");

    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        header("Location: LoginPage.php");
        exit();
    }

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM doctorreg WHERE email = '$email'";
    $store = mysqli_query($conn, $query);

    if ($store) {
        $row = mysqli_fetch_assoc($store);

        if ($row) {
            if ($pass === $row["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["email"] = $row["email"];
                header("Location: Home.php");
                exit();
            } else {
                $_SESSION['status'] = 'Wrong Password';
                header("Location: LoginPage.php");
                exit();
            }
        } else {
            $_SESSION['status'] = 'User Not Found';
            header("Location: LoginPage.php");
            exit();
        }
    } else {
        $_SESSION['status'] = 'Error in database query';
        header("Location: LoginPage.php");
        exit();
    }
    ?>
