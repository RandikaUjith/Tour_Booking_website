<?php
ini_set("session.save_path", "/home/unn_w22037955/sessionData");
session_start();

if(isset($_POST['login-submit'])) {
    include_once "dbconn.php";
    $conn = getConnection();
    include "functions.php";

    $email = sanitizeInput($conn, $_POST['email']);
    $password = sanitizeInput($conn, $_POST['password']);

    if(empty($email)){
        header("location: ../login.php?error=emptyemail");
        exit();
    }

    if(empty($password)){
        header("location: ../login.php?error=emptypassword");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../login.php?error=incorrectemail");
        exit();
    }

    $qrySQL = "SELECT * FROM users WHERE email=?;";
    $stmt = mysqli_prepare($conn, $qrySQL);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    $qryResult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($qryResult);
    mysqli_close($conn);

    if(isset($userRow)){
        $pwdMatch = password_verify($password, $userRow['passwordHash']);
        if($pwdMatch == true){            
            $_SESSION["email"] = $userRow['email'];
            $_SESSION["isLogin"] = true;
            //echo $_SESSION["isLogin"];
            header("Location: ../booking.php?loginsuccess");
        } else {
            header("location: ../login.php?error=incorrectpassword");
            exit();
        }
    } else {
        header("location: ../login.php?error=incorrectemail");
        exit();
    }
}




