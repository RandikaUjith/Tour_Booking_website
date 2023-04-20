<?php
ini_set("session.save_path", "/home/unn_w22037955/sessionData");

if(isset($_POST["submit"])){
    include_once "dbconn.php";
    $conn = getConnection();
    include "functions.php";

    $firstName = sanitizeInput($conn, $_POST["firstName"]);
    $lastName = sanitizeInput($conn, $_POST["lastName"]);
    $contactNumber = sanitizeInput($conn, $_POST["contactNumber"]);
    $email = sanitizeInput($conn, $_POST["email"]);
    $password = sanitizeInput($conn, $_POST["password"]);
    $repassword = sanitizeInput($conn, $_POST["repeatPassword"]);

    if(empty($firstName) || empty($lastName) || empty($contactNumber) || empty($email) || empty($password) || empty($repassword)){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if($password !== $repassword){
        header("location: ../signup.php?error=pwdmissmatch");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(strlen((string)$contactNumber) !== 11){
        header("location: ../signup.php?error=invalidcontact");
        exit();
    }

    if(matchEmail($conn, $email)){
        mysqli_close($conn);
        header("location: ../signup.php?error=emailexist");
        exit();
    }

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    signupUser($conn, $firstName, $lastName, $contactNumber, $email, $hashPassword);
    ini_set("session.save_path", "/home/unn_w22037955/sessionData");
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["isLogin"] = true;

    header("location: ../booking.php?signupSuccess");
    mysqli_close($conn);
    exit();

} else {
    header("location: ../signup.php");
    exit();
}