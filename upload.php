<?php
session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: LoginPage.php");
        exit();
    }
?>
if (isset($_POST['submit'])) 
{
    $upload = "C:\xampp\htdocs\Hospitalmanagement\images";
    $uploadFile = $_FILES['prescription']['name'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

   
    if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Sorry, only PDF, JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    
    if (file_exists($uploadFile)) {
        echo "<script> alert('Sorry, the file already exists!'); window.location.href = 'prescription.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script> alert('Sorry, your file was not uploaded!'); window.location.href = 'prescription.php';</script>";
    } 
    else 
    {

        if (move_uploaded_file($_FILES['prescription']['tmp_name'], $uploadFile)) {
             echo "<script> alert('The file has been uploaded successfully!'); window.location.href = 'Home.php';</script>";
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file!'); window.location.href = 'prescription.php';</script>";

        }
    }
}
?>
