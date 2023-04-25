<?php
//database connect
function getConnection() {
    define('DB_NAME', 'unn_w22037955');
    define('DB_USER', 'unn_w22037955');
    define('DB_PASSWORD','********');
    define('DB_HOST', 'localhost');
    $conn = mysqli_connect(DB_HOST, DB_USER,
        DB_PASSWORD, DB_NAME) or
    die("Can not connect to DB");

    return $conn;
}

?>