<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/stylesheets/general-styles.css" />
    <title>Destinations</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/Title_Logo.JPG" />
  </head>
  <body>
    <?php
        include "page.php";
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
    ?>
    <div class="destination-search-bar-section">
      <input
        type="text"
        placeholder="Search Destinations here.."
        class="destination-search-box"
      />
      <button class="destination-search-button">
        <img src="../assets/images/search.svg" alt="Search button" class="search-icon" />
      </button>
    </div>
    <div class="middle-content-div">
      <div class="destination-card-div">
        <?php
          include_once "includes/functions.php";
          require_once 'includes/dbconn.php';
          $conn = getConnection();

          $destCard = getExcursionsAll($conn);
          mysqli_close($conn);
            foreach($destCard as $dest){
              $imgSrc = $dest['img_url'];
              $imgAlt = $dest['excursion_name'];
              $title = $dest['excursion_name'];
              $advNo = $dest['no_of_adv'];
              $rating = $dest['rating'];
              $reviews = $dest['no_of_reviews'];
              $price = $dest['price_per_person'];
              $excursionID = $dest['excursionID'];
              echo destinationCard($imgSrc, $imgAlt, $title, $advNo, $rating, $reviews, $price, $excursionID);
            }
        ?>            
      </div>
      <div class="photo-gallery-div">
        <h3 class="gallery-text">From our Gallery</h3>
        <div class="gallery-photo">
          <img
            src="../assets/images/Beach_Adventure.jpg"
            alt="Beach adventure"
            class="photo"
          />
        </div>
        <div class="gallery-photo">
          <img
            src="../assets/images/Beach_Adventure_2.jpg"
            alt="Beach adventure"
            class="photo"
          />
        </div>
        <div class="gallery-photo">
          <img
            src="../assets/images/Jungle_Adventure.jpg"
            alt="Jungle adventure"
            class="photo"
          />
        </div>
        <div class="gallery-photo">
          <img
            src="../assets/images/Beach_Adventure_3.jpg"
            alt="Beach adventure"
            class="photo"
          />
        </div>
        <div class="gallery-photo">
          <img
            src="../assets/images/Jungle_Adventure_2.jpg"
            alt="Jungle adventure"
            class="photo"
          />
        </div>
        <div class="gallery-photo">
          <img
            src="../assets/images/rollercoaster.jpg"
            alt="Rollercoaster"
            class="photo"
          />
        </div>
      </div>
    </div>
    <?php
        echo loadFooter();
    ?>
  </body>
</html>
