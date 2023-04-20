<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Today</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/Title_Logo.JPG" />
    <link rel="stylesheet" href="../assets/stylesheets/general-styles.css" />
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
    <div class="main-heading-div">
      Crazy about <br>
      Adventures..?? <br>
      <span class="sub-heading-text">Book your Trip Today</span> <br>
      <form><button class="explore-button" formaction="destinations.php">Explore</button></form>
      
    </div>
    <div class="main-image-div">
      <img src="../assets/images/main.jpg" alt="Travel photo" class="main-image" />
    </div>
    <div class="middle-section-div">
      <div class="detail-div">
        <h2>Welcome to Travel Today</h2>
        <p>
          Feeling tired... ?? or are you an Adventure seeker...?? You came to
          the perfect place to have an experience in Adventurous tours in
          worldclass destinations. The <strong>Travel Today</strong> offers
          various day tour packages for cheaper prices for adventure seekers in
          famous adventure destinations around the world. Our packages include
          stay in star category hotels with meals, free tour guides, night camp
          fires with BBQ and DJ parties, etc..
        </p>

        <h2>Client Reviews</h2>
        <div class="client-review-div">
          <img
            src="../assets/images/client_profile_picture.jpg"
            alt="client profile picture - Matt Henry from Newcastle"
            class="client-profile-pic"
          />
          <p class="client-review-text">
            It was a woderful experience I had in Thailand with Travel today.
            The hotel they gave me was excellent and I will never have that kind
            of stay for the price I paid for Travel Today. There were lot of
            adventure rides for the day such as Speed boat ride, Flyboard
            flying, surfing, water skiing, etc.. I highly recommond Travel Today
            for adventude seekers with low budgets..
          </p>
        </div>
        <h4 class="client-name">Matt Henry - Newcastle</h4>

        <div class="client-review-div">
          <img
            src="../assets/images/client_profile_picture_2.jpg"
            alt="client profile picture - Vann Stacy from Bristol"
            class="client-profile-pic"
          />
          <p class="client-review-text">
            I never expected the services and activites offered to me by the
            Travel Today during my jungle adventure ride. The tour guide - Sam,
            was a kind and young telented man who was very helpful for me.
          </p>
        </div>
        <h4 class="client-name">Vann Stacy - Bristol</h4>

        <h2>Packages</h2>
        <div class="packages-div">
          <div class="package-card">
            <div class="package-name-div">
              <h2 class="package-name">Bronze</h2>
            </div>
            <p>Starting from</p>
            <h1 class="package-card-price">&#163;30</h1>
            <p>
              - Stay at 3 Star hotels <br>
              <br>
              - Delicious breakfast <br>
              <br>
              - Free Night camp fire with DJ music
            </p>
            <div class="package-button-div">
              <button class="package-select-button">Explore</button>
            </div>
          </div>

          <div class="package-card">
            <div class="package-name-div">
              <h2 class="package-name">Silver</h2>
            </div>
            <p>Starting from</p>
            <h1 class="package-card-price">&#163;45</h1>
            <p>
              - Stay at 4 Star hotels <br>
              <br>
              - Delicious meals for all day <br>
              <br>
              - Free Night camp fire with DJ music
            </p>
            <div class="package-button-div">
              <button class="package-select-button">Explore</button>
            </div>
          </div>

          <div class="package-card">
            <div class="package-name-div">
              <h2 class="package-name">Gold</h2>
            </div>
            <p>Starting from</p>
            <h1 class="package-card-price">&#163;55</h1>
            <p>
              - Stay at 5 Star hotels <br>
              <br>
              - Delicious meals for all day <br>
              <br>
              - Free Night camp fire with DJ music
            </p>
            <div class="package-button-div">
              <button class="package-select-button">Explore</button>
            </div>
          </div>
        </div>
      </div>
      <div class="destinations-card-div">
        <div>
          <div class="destination">
            <h3>Beach Adventures</h3>
            <img
              src="../assets/images/Beach_Adventure.jpg"
              alt="Beach adventure ride - Flyboard flying"
              class="destination-picture"
            />
            <p>
              Adventure sports in Beach and Sea.. Flyboard Flying, Water skiing,
              Surfing, Water jet rides, Speed boat rides, White water rafting,
              Canyoning and many more....
            </p>
          </div>
          <div class="destination-price-div">
            <div>STARTS FROM <br><strong>&#163;65</strong></div>

            <button class="details-button">View Deals</button>
          </div>
        </div>
        <div>
          <div class="destination">
            <h3>Jungle Adventures</h3>
            <img
              src="../assets/images/Jungle_Adventure.jpg"
              alt="Jungle adventure ride - Cycling"
              class="destination-picture"
            />
            <p>
              Mountain hiking, Waterfall hiking, Jungle cycling, River rafting
              and many more...
            </p>
          </div>
          <div class="destination-price-div">
            <div>STARTS FROM <br><strong>&#163;30</strong></div>

            <button class="details-button">View Deals</button>
          </div>
        </div>
        <div>
          <div class="destination">
            <h3>Theme park Adventures</h3>
            <img
              src="../assets/images/Theme_park.jpg"
              alt="Beach adventure ride - Flyboard flying"
              class="destination-picture"
            />
            <p>
              Adventure rides in world's best Theme parks.. Rollercoaster rides,
              Bungi jumps, Water rides, Sky Diving and many more...
            </p>
          </div>
          <div class="destination-price-div">
            <div>STARTS FROM <br><strong>&#163;15</strong></div>

            <button class="details-button">View Deals</button>
          </div>
        </div>
      </div>
    </div>
    <?php
        echo loadFooter();
    ?>
  </body>
</html>
