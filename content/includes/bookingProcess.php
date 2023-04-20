<?php 

    if(isset($_POST['submit'])){
        if(empty($_POST['adventures']) || empty($_POST['dateIn']) || empty($_POST['dateOut']) || empty($_POST['number'])){
            header("location: ../booking.php?error=emptyfields#bottom");
            exit();
        }

        if($_POST['dateIn'] <= date('Y-m-d')){
            header("location: ../booking.php?error=nottoday#bottom");
            exit();
        }

        if($_POST['dateIn'] > $_POST['dateOut']){
            header("location: ../booking.php?error=invalidcheckout#bottom");
            exit();
        }

        require_once 'functions.php';
        require_once 'dbconn.php';
        $conn = getConnection();
        
        $excursionID = sanitizeInput($conn, $_POST['adventures']);
        $dateIn = sanitizeInput($conn, date_create($_POST['dateIn']));
        $dateOut = sanitizeInput($conn, date_create($_POST['dateOut']));
        $numOfTravellers = sanitizeInput($conn, $_POST['number']);
        $days = date_diff($dateOut, $dateIn);
        
        ini_set("session.save_path", "/home/unn_w22037955/sessionData");
        session_start();

        $_SESSION['destination'] = $excursionID;
        $_SESSION['number'] = $numOfTravellers;
        $_SESSION['dateIn'] = $dateIn;
        $_SESSION['dateOut'] = $dateOut;
        $_SESSION['days'] = $days->format("%d");

        $dates = getDates($conn, $excursionID);
        foreach($dates as $date){
            for($i = $dateIn; $i <= $dateOut; $i->modify('+1 day')){
                if($i->format('Y-m-d') >= $date['dateIN'] && $i->format('Y-m-d') <= $date['dateOUT']){
                    $_SESSION['udateIn'] = $date['dateIN'];
                    $_SESSION['udateOut'] = $date['dateOUT'];
                    header("location: ../booking.php?error=dateunavailable#bottom");
                    exit(); 
                }
            }
        }
        $_SESSION['price'] = getPrice($conn, $excursionID);
        mysqli_close($conn);
        header("location: ../booking.php?success#bottom");
        exit();
    }

    if(isset($_POST['confirm'])){
        ini_set("session.save_path", "/home/unn_w22037955/sessionData");
        session_start();        
        include_once "functions.php";
        require_once 'dbconn.php';
        $conn = getConnection();

        if(isset($_SESSION['price'])){
            $email = $_SESSION['email'];
            $destination = getExcursion($conn, $_SESSION['destination']);
            $dateIN = $_SESSION['dateIn']->format('Y-m-d');
            $dateOUT = $_SESSION['dateOut']->format('Y-m-d');
            $travellers = $_SESSION['number'];
            $cost = $_SESSION['price']*$travellers*$_SESSION['days'];

            saveBooking($conn, $email, $destination, $dateIN, $dateOUT, $travellers, $cost);
            unset($_SESSION['price']);
            mysqli_close($conn);

            header("location: ../booking.php?bookingconfirmed#bottom");
            exit();  
        } else{
            mysqli_close($conn);
            header("location: ../booking.php?error=bookingempty#bottom");
            exit();
        }
    }

    

    

    