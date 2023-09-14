<?php
    session_start();
    require "config/config.php";

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * from admin WHERE username = '$user'");

    $num_row = mysqli_num_rows($result);

    $data = mysqli_fetch_assoc($result);
    
    if ($num_row > 0){

        $passCheck = password_verify($pass, $data["password"]);

        if ($passCheck) {

            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $user;

            header('Location:index.php');

        }else{

            header('Location:login.php?status=failed');

        }

    } else {

        header('Location:login.php?status=failed');

    }
?>