<?php
    ini_set("session.save_path", "/home/unn_w22037955/sessionData");
    session_start();

    if(!isset($_SESSION['isLogin'])){
        header("location: login.php?error=usernotloggedin");
            exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/images/Title_Logo.JPG" />
    <link rel="stylesheet" href="../assets/stylesheets/general-styles.css" />
    <link rel="stylesheet" href="../assets/stylesheets/booking.css" />
    <title>My Bookings</title>
</head>
<body>
    <?php
        include "page.php";
        if(isset($_SESSION['isLogin'])){
            if($_SESSION['isLogin'] === true){
                echo loadSessionHeader();
            } else {
                echo loadHeader(); 
            }
        } else {
            echo loadHeader();
        }
    ?>
    <div class="main-img-div">
        <img src="../assets/images/booking-beach.png" alt="beach picture" class = "main-img">
    </div>
    <div class="heading-div">
        <?php
        include "includes/functions.php";
        require_once 'includes/dbconn.php';
        $conn = getConnection();
        $name = getUserName($conn, $_SESSION['email']);
        echo "<h1 class = 'heading-text'>$name's</h1>";
        ?>
        <h1 class = "heading-text">Booking information</h1>
    </div>
    <div class="content-div">
        <div class="table-div">
            <table>
                <tr>
                    <th>Desination</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Number of Travellers</th>
                    <th>Total Cost / &#163;</th>
                </tr>
                    <?php                                               
                        $bookings = getBookings($conn, $_SESSION['email']);
                        mysqli_close($conn);
                        if(!empty($bookings)){
                            foreach($bookings as $booking){
                                $dest = $booking['destination'];
                                $dateIN = $booking['dateIN'];
                                $dateOUT = $booking['dateOUT'];
                                $travellers = $booking['travellers'];
                                $cost = $booking['cost'];
                                echo "<tr>";
                                echo "<td>$dest</td>";
                                echo "<td>$dateIN</td>";
                                echo "<td>$dateOUT</td>";
                                echo "<td>$travellers</td>";
                                echo "<td>$cost</td>";
                                echo "</tr>";
                            }
                        }
                        
                    ?>
            </table>
        </div>   
    </div>
    <?php
        echo loadFooter();
    ?>
</body>
</html>