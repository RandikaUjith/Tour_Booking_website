<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Destination Details</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/Title_Logo.JPG" />
    <link rel="stylesheet" href="../assets/stylesheets/general-styles.css" />
  </head>
  <body>
    <?php
      include "page.php";
      include "includes/functions.php";
      ini_set("session.save_path", "/home/unn_w22037955/sessionData");
      session_start();
      
        if(isset($_SESSION['isLogin'])){
            if($_SESSION['isLogin'] === true){
                echo loadSessionHeader();
            } else {
                echo loadHeader(); 
            }
        } else {
            echo loadHeader();
        }

        $excursionID = $_POST['id'];
        require_once 'includes/dbconn.php';
        $conn = getConnection();
        $excursion = getExcursionDetails($conn, $excursionID);

        $title = $excursion['excursion_name'];
        $description1 = $excursion['description'];
        $img_url = $excursion['img_url'];
        $description2 = $excursion['description2'];
        $location_img_url = $excursion['map_img_url'];
        $location_img_alt = $excursion['map_img_alt'];

        echo detailCard($title, $description1, $img_url, $description2, $location_img_url, $location_img_alt);
        
        echo loadFooter();
        mysqli_close($conn);
    ?>
  </body>
</html>
