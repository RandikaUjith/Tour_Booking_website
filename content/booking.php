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
    <title>Booking</title>
</head>
<body>
    <?php
        include "page.php";
        include "includes/bookingProcess.php";
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
        echo "<h1 class = 'heading-text'>Hi $name</h1>";
        ?>
        <h1 class = "heading-text">Book Your Adventure Here !!</h1>
    </div>
    <div class="content-div">
        <form action="includes/bookingProcess.php" method = "post">
            <div class="select-div">
                <div class = "input-sub-div">
                    <label>Select your Adventure</label>
                    <select name="adventures" id="adventures">
                        <option value="null">Select</option>
                        <?php
                        $destinations = getExcursions($conn);
                            foreach($destinations as $dest){
                                $val = $dest['excursionID'];
                                $text = $dest['excursion_name'];
                                echo "<option value = $val>$text</option>;";
                            }
                        ?>
                    </select>
                </div>
                <div class = "input-sub-div">
                <label>Check-in Date</label>
                    <input type="date" class = "date-input" name = "dateIn">
                    <label>Check-out Date</label>
                    <input type="date" class = "date-input" name = "dateOut">
                </div>
                <div class = "input-sub-div">
                    <label>Number of Travellers</label>
                    <input type="number" class = "number-input" name = "number">
                </div>
            </div>
            <div class = "cost-div" id = "bottom">
                <button type="submit" class = "pay-button" name = "submit">Check Availability</button>
                <div class="cost-detail-div">
                    <div>Cost per Day per Traveller</div>
                    <div>=</div>
                    <div>
                        <?php
                        if(isset($_SESSION['price'])){
                            echo "&#163;",$_SESSION['price'];
                        } else {
                            echo "$0";
                        }                    
                        ?>
                    </div>
                    <div>Cost per Day</div>
                    <div>=</div>
                    <div>
                        <?php
                        if(isset($_SESSION['price'])){
                            echo "&#163;",$_SESSION['price']*$_SESSION['number'];
                        } else {
                            echo "$0";
                        }                    
                        ?>
                    </div>
                    <div><strong>Total Cost</strong></div>
                    <div>=</div>
                    <div><strong>
                        <?php
                        if(isset($_SESSION['price'])){
                            echo "&#163;",$_SESSION['price']*$_SESSION['number']*$_SESSION['days'];
                        } else {
                            echo "$0";
                        }                    
                        ?>
                        </strong>
                    </div>
                </div>
                <button class = "pay-button" name = "confirm" type = "submit">Confirm Booking</button>    
            </div>
            
        </form>
        <div class = "booking-msg-div">
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "bookingempty"){
                    echo "<p class = 'error-msg'>Enter details and calculate your cost before confirm Booking !!</p>";
                } else if($_GET["error"] == "emptyfields"){
                    echo "<p class = 'error-msg'>All fields need to be filled !!</p>";
                } else if($_GET["error"] == "dateunavailable"){
                    $dest = getExcursion($conn, $_SESSION['destination']);
                    $dIn = $_SESSION['udateIn'];
                    $dOut = $_SESSION['udateOut'];
                    echo "<p class = 'error-msg'><strong>$dest</strong> is already booked from <strong>$dIn</strong> to <strong>$dOut</strong> !!</p>";
                    echo "<p class = 'error-msg'>Please select different dates..</p>";
                } else if($_GET["error"] == "nottoday"){
                    echo "<p class = 'error-msg'>Invalid <strong>Check-in Date</strong> !!</p>";
                    echo "<p class = 'error-msg'>Please insert a valid date for <strong>Check-in Date</strong></p>";
                } else if($_GET["error"] == "invalidcheckout"){
                    echo "<p class = 'error-msg'>Invalid <strong>Check-out Date</strong> !!</p>";
                    echo "<p class = 'error-msg'>Please insert a valid date for <strong>Check-out Date</strong></p>";
                }
            }
            if(isset($_GET["bookingconfirmed"])){
                echo "<h2 class = 'booking-msg'>Congratulations.. Your Booking is Confirmed !!</h2>";
                echo "<p>Click 'My Bookings' at the Top to see your bookings</p>";
            }
        ?> 
        </div>       
    </div>
    <?php
        echo loadFooter();
    ?>
</body>
</html>