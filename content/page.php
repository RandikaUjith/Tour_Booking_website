<?php
    function loadHeader(){
      $content = <<<HEADER
        <main>
            <div class="header-div">
                <div class="header-logo-section">
                    <img
                    src="../assets/images/Travel_today_logo.png"
                    alt="Company Logo"
                    class="logo"
                    />
                </div>
                <div class="header-nav-section">
                    <a href="index.php">Home</a>
                    <a href="destinations.php">Destinations</a>
                    <a href="booking.php">Book a Trip</a>
                    <a href="myBookings.php">My Bookings</a>
                </div>
                <div class="search-bar-section">
                    <input
                    type="text"
                    placeholder="Search Destinations / Activities here.."
                    class="search-box"
                    />
                    <button class="search-button">
                    <img
                    src="../assets/images/search.svg"
                    alt="Search button"
                    class="search-icon"
                    />
                    </button>
                </div>
                <div class="header-user-section">
                    <a href='login.php'>Login</a> /
                    <a href='signup.php'>Sign up</a>
                </div>
            </div>
        </main>
HEADER;
        return $content;
    }

    function loadSessionHeader(){
        $content = <<<HEADER
        <main>
            <div class="header-div">
                <div class="header-logo-section">
                    <img
                    src="../assets/images/Travel_today_logo.png"
                    alt="Company Logo"
                    class="logo"
                    />
                </div>
                <div class="header-nav-section">
                    <a href="index.php">Home</a>
                    <a href="destinations.php">Destinations</a>
                    <a href="booking.php">Book a Trip</a>
                    <a href="myBookings.php">My Bookings</a>
                </div>
                <div class="search-bar-section">
                    <input
                    type="text"
                    placeholder="Search Destinations / Activities here.."
                    class="search-box"
                    />
                    <button class="search-button">
                    <img
                    src="../assets/images/search.svg"
                    alt="Search button"
                    class="search-icon"
                    />
                    </button>
                </div>
                <div class="header-user-section">
                    <a href='#'>Profile</a> /
                    <a href='includes/logoutProcess.php'>Logout</a>
                </div>
            </div>
        </main>
HEADER;
        return $content;
    }


    function loadFooter()
    {
        $content_footer = <<<FOOTER
            <footer>
                <div class="footer-div">
                    <h4 class="footer-text">
                        KF 7013 - Website Development and Deployment - Final Assesment <br />
                        Student number: w22037955 <br />
                    </h4>
                    <a href="secReport.php">Website Security Report</a> <br>
                    <a href="creditsPage.php">Credits Page</a>
                </div>
            </footer>
            
FOOTER;
        return $content_footer;
    }



    function destinationCard($imgSrc, $imgAlt, $title, $advNo, $rating, $reviews, $price, $excursionID){
        $content_destinationCard = <<<MAIN
            <div class = 'destination-card'>
                <div class = 'img-text-div'>
                    <img src='$imgSrc' alt='$imgAlt' class='destination-card-image'/>
                    <div class="destination-card-text-div">
                        <h3>$title</h3>
                        <span class='destination-card-text'>$advNo Adventure activities</span>
                        <br />
                        <br />
                        <span class='destination-card-text'>Rating $rating/5 <br/>Reviews($reviews)</span>
                    </div>
                </div>                
                <div class='destination-card-button-div'>
                    <form action='detail.page.php' method = 'post'>
                        <button class='book-now-button' type = 'submit' value = '$excursionID' name = 'id'>Explore</button>
                    </form>
                    <h3>Starting from &#163;$price</h3>                    
                </div>
            </div>
          
MAIN;
        return $content_destinationCard;

    }

    function detailCard($title, $description1, $img_url, $description2, $location_img_url, $location_img_alt){
        $content_detailCard = <<<MAIN
        <div class='main-div'>
            <h1>$title</h1>
            <p>$description1</p>
            <div class = 'decription-div'>
                <div class = 'detail-img-div'>
                    <img src='$img_url' alt='$title' class = 'detail-img'>  
                </div>
                <div>
                    <p class = 'detail-para'>$description2</p>
                </div>
            </div>
            <div class = 'map-img-div'>
                <div>
                    <h2>Why us ??</h2>
                    <p class = 'detail-para'>By booking this wonderful excursion from us, you can make this adventures experience more comfartable with star category hotle stays. We will provide you free delicious meals for your entire stay. Our tour guides will be there for you for any help or assistance required. </br> </br>
                    All adventure activities are included in our packages and all transport arrangements for each adventure will be coordinated and provided by <strong>Travel Today</strong>. </p>
                </div>
                <img src='$location_img_url' alt='$location_img_alt' class = 'map-img'>
            </div>   
        </div>
          
MAIN;
        return $content_detailCard;

    }
    ?>
