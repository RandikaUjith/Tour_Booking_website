<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credits</title>
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
    ?>
    <div class = "report">
        <h2>Credits</h2>

        <div class = "credit-block-div">
            <div class="credit-img-div">
                <img src="../assets/images/Beach_Adventure.jpg" alt="Beach Adventure" class = "credit-img">
                https://www.klook.com/th/activity/10230-flyboarding-experience-goa/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Beach_Adventure_2.jpg" alt="Beach Adventure" class = "credit-img">
                https://cottagelife.com/outdoors/8-amazing-places-to-surf-in-canada/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Beach_Adventure_3.jpg" alt="Beach Adventure" class = "credit-img">
                https://www.beaches.co.uk/activities/watersports/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/booking-beach.jpg" alt="Beach" class = "credit-img">
                https://www.amazon.co.uk/Photography-Backdrops-Background-Birthday-Supplies/dp/B087CQ5Y9B
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/client_profile_picture.jpg" alt="Client profile picture" class = "credit-img">
                https://www.elitesingles.co.uk/discover-elitesingles/features/picture-protection
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/client_profile_picture_2.jpg" alt="Client profile picture" class = "credit-img">
                https://www.kcm.org/real-help/spiritual-growth/learn/you-are-joint-heir-jesus-christ?language_content_entity=en-US
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Jungle_Adventure.jpg" alt="Jungle adventure" class = "credit-img">
                https://www.ivivu.com/blog/2017/01/jungle-biking-thach-thuc-giua-rung-sau/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Jungle_Adventure_2.jpg" alt="Jungle adventure" class = "credit-img">
                https://canadainvasives.ca/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/kalpitiya_beach.jpg" alt="Kalpitiya beach" class = "credit-img">
                https://www.srilankatravelandtourism.com/places-sri-lanka/kalpitiya/kalpitiya.php
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/krabi_jungle.jpg" alt="Krabi jungle" class = "credit-img">
                https://kindertravelguide.com/travel-directory/elephants-chiang-mai/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Leisure_world.jpg" alt="Leisure world" class = "credit-img">
                http://leisureworld.lk/Family_Rides/Log_Flume~10
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/main.jpg" alt="Jet ski riding" class = "credit-img">
                http://www.wallpapers4u.org/motorcycle-water-man/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Meemure_jungle.jpg" alt="Meemure jungle" class = "credit-img">
                https://www.attractionsinsrilanka.com/travel-directory/narangamuwa-lakegala-mountain/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/nilaweli_beach.jpg" alt="Nilaweli beach" class = "credit-img">
                https://mahaweli.lk/nilaveli-beach-trincomalee/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Pattaya_beach.jpg" alt="Pattaya beach" class = "credit-img">
                https://www.traveloka.com/en-th/activities/thailand/product/name-2001109311352
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Phuket_beach.jpg" alt="Phuket beach" class = "credit-img">
                https://en.wikipedia.org/wiki/Ao_Phang_Nga_National_Park#/media/File:Isla_Tapu,_Phuket,_Tailandia,_2013-08-20,_DD_36.JPG
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/rollercoaster.jpg" alt="Rollercoaster" class = "credit-img">
                https://adventureisland.co.uk/rides/barnstormer/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/search.svg" alt="search icon" class = "credit-img">
                https://www.seekpng.com/ipng/u2e6q8y3e6w7r5y3_search-button-icon-transparent-circle/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Siam_Amazing_Park.jpg" alt="Siam Amazing park" class = "credit-img">
                https://www.klook.com/en-GB/activity/1058-siam-park-city-bangkok/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/singapore.jpg" alt="Singapore" class = "credit-img">
                http://www.thetraveller.sg/sands-expo-and-convention-center/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/sinharaja_jungle.png" alt="Sinharaja jungle" class = "credit-img">
                https://www.klook.com/en-GB/activity/9247-sinharaja-rainforest-day-trek-colombo/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Thailand.jpg" alt="Thailand" class = "credit-img">
                https://blog.chartmetric.com/music-trigger-cities-focus-on-southeast-asia-part-2/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/Theme park.jpg" alt="Theme park photo" class = "credit-img">
                https://tourscanner.com/blog/best-theme-parks-in-the-world/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/universal-studios-singapore.jpg" alt="Universal studios" class = "credit-img">
                https://www.kesari.in/Tailor-Made/ASIA/SINGAPORE/SINGAPORE-WITH-SENTOSA-ISLAND/4696
            </div><div class="credit-img-div">
                <img src="../assets/images/weligama_beach.jpg" alt="Weligama beach" class = "credit-img">
                https://traveltriangle.com/blog/places-to-visit-in-weligama/
            </div>
            <div class="credit-img-div">
                <img src="../assets/images/wild_wild_wet.jpg" alt="Wild wild wet water park" class = "credit-img">
                https://www.myguidesingapore.com/experiences/singapore-wild-wild-wet-waterpark-admission-ticket
            </div>  
            Note: All the "Map" images are taken from google Maps          

        </div>        
    </div>       

    <?php    
        echo loadFooter();
    ?>
  </body>
</html>
