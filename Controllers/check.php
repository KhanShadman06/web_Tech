 <?php
    session_start();
   require_once('../Models/alldb.php');

    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        header("Location:../views/LoginPage.php");
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $login_status = processLogin($email, $password);

    if ($login_status === "success") {
        $_SESSION["login"] = true;
        $_SESSION["email"] = $email;
        header("Location: ../views/Home.php");
        exit();
    } 
    elseif ($login_status === "wrong_password") {
        $_SESSION['status'] = 'Wrong Password';
    } 
    elseif ($login_status === "user_not_found") {
        $_SESSION['status'] = 'User Not Found';
    } 
    else {
        $_SESSION['status'] = 'Error in database query';
    }

    header("Location: ../views/LoginPage.php");
    exit();
}

  
?>
