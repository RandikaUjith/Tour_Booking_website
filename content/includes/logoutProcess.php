<?php
    ini_set("session.save_path", "/home/unn_w22037955/sessionData");
    session_start();
    $_SESSION["email"] = "";
    $_SESSION["isLogin"] = false;
    session_destroy();
    header("Location: ../index.php");
    exit();
?>