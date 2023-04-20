<?php
function sanitizeInput($conn, $input) {
    $data1 = trim($input);
    $data2 = htmlspecialchars($data1);
    $sanInput = mysqli_real_escape_string($conn, $data2);
    return $sanInput;
  
  }

function matchEmail($conn, $email){    
    $querySQL = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_prepare($conn, $querySQL);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $queryresult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($queryresult);

    if($userRow['email'] == $email){
        return true;
    } else {
        return false;
    }

}

function signupUser($conn, $firstName, $lastName, $contactNumber, $email, $hashPassword){
    $querySQL = "INSERT INTO users (firstName, lastName, contactNumber, email, passwordHash) VALUES (?,?,?,?,?);";
    $stmt = mysqli_prepare($conn, $querySQL);
    mysqli_stmt_bind_param($stmt, "ssiss", $firstName, $lastName, $contactNumber, $email, $hashPassword);
    mysqli_stmt_execute($stmt);
}

function getUserName($conn, $email){
    $querySQL = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_prepare($conn, $querySQL);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $queryresult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($queryresult);
    $name = $userRow['firstName'];

    return $name;
}

function getExcursions($conn){    
    $sql = "SELECT excursion_name, excursionID FROM excursions;";
    $result = mysqli_query($conn, $sql);
    $excursions = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $excursions[] = $row;
        }
    }
    return $excursions;
}

function getPrice($conn, $excursion){
    $sql = "SELECT price_per_person FROM excursions WHERE excursionID = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $excursion);
    mysqli_stmt_execute($stmt);

    $queryresult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($queryresult);
    $price = $userRow['price_per_person'];

    return $price;   
}

function saveBooking($conn, $email, $destination, $dateIN, $dateOUT, $travellers, $cost){
    $querySQL = "INSERT INTO bookings (cus_email, destination, dateIN, dateOUT, travellers, cost) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_prepare($conn, $querySQL);
    mysqli_stmt_bind_param($stmt, "ssssii", $email, $destination, $dateIN, $dateOUT, $travellers, $cost);
    mysqli_stmt_execute($stmt);
}

function getExcursion($conn, $excursionID){    
    $sql = "SELECT excursion_name FROM excursions WHERE excursionID = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $excursionID);
    mysqli_stmt_execute($stmt);

    $queryresult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($queryresult);
    $excursion = $userRow['excursion_name'];

    return $excursion;
    
}

function getExcursionDetails($conn, $excursionID){    
    $sql = "SELECT * FROM excursions WHERE excursionID = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $excursionID);
    mysqli_stmt_execute($stmt);

    $queryresult = mysqli_stmt_get_result($stmt);
    $userRow = mysqli_fetch_assoc($queryresult);

    return $userRow;
}

function getBookings($conn, $email){
    $sql = "SELECT * FROM bookings WHERE cus_email = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if(empty($result)){
        return;
    }
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $bookings[] = $row;
        }
        return $bookings;
    }  
}

function getExcursionsAll($conn){    
    $sql = "SELECT * FROM excursions;";
    $result = mysqli_query($conn, $sql);
    $excursions = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $excursions[] = $row;
        }
    }
    return $excursions;
}

function getDates($conn, $destID){
    $destination = getExcursion($conn, $destID);
    $sql = "SELECT * FROM bookings WHERE destination = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $destination);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $dates[] = $row;
        }
    }
     
    return $dates;
}