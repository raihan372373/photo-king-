<?php
include('db/db.php');
include('functions.php');
if(isset($_SESSION['email']))
{
    echo "<script> window.location = 'index.php';</script>";
}
if (!isset($_POST['Submit'])) {
    include('theme/Become_A_Photographer.php');
}
else {
    $address =  $_POST['Address'];
    $name =  $_POST['Name'];
    $email =  $_POST['Email'];
    $price =  $_POST['package'];
    $pass =  $_POST['Password'];
    $phone =  $_POST['Telephone'];
    $type =  $_POST['photographer-type'];


    $bytes = random_bytes(16);
    $random_string = bin2hex($bytes);

    $img = $random_string.$_FILES['profile']['name'];
    $temp_name = $_FILES['profile']['tmp_name'];

    $location = 'upload/';

    if(move_uploaded_file($temp_name, $location.$img)){
        echo 'File uploaded successfully<br>';
    }

    photographer_signup($name, $email, $address, $phone, $type, $pass, $img,$price);
    echo '<a href="index.php">click here</a>to continue.';
    
}
?>