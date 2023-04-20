<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/images/Title_Logo.JPG" />
    <link rel="stylesheet" href="../assets/stylesheets/general-styles.css" />
    <link rel="stylesheet" href="../assets/stylesheets/login.css" />
    <title>SignUp</title>
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
    <div class = "login-div"> 
        <div class="login-form-div">
            <form action="includes/signupProcess.php" method = "post">
                <h2 class="heading">SIGNUP</h2>                
                <input type="text" class="login-input" placeholder = "First Name" name = "firstName">
                <input type="text" class="login-input" placeholder = "Last Name" name = "lastName">
                <input type="number" class="login-input" placeholder = "Contact Number" name = "contactNumber">                
                <input type="text" class="login-input" placeholder = "E-mail" name = "email">                
                <input type="password" class="login-input" placeholder = "Password" name = "password">
                <input type="password" class="login-input" placeholder = "Re-enter Password" name = "repeatPassword">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p>All fields need to be filled !!</p>";
                        } else if($_GET["error"] == "pwdmissmatch"){
                            echo "<p>'Re-enter Password' dosen't match !!</p>";
                        } else if($_GET["error"] == "invalidemail"){
                            echo "<p>Enter a valid e-mail address !!</p>";
                        } else if($_GET["error"] == "invalidcontact"){
                            echo "<p>Enter a valid Contact number !!</p>";
                        } else if($_GET["error"] == "emailexist"){
                            echo "<p>The e-mail is already taken.. Use a different e-mail !!</p>";
                        }
                    }
                ?>
                <input type="submit" class="login-button" value = "SignUp" name = "submit">
                <a href="#" class = "forget-password">Forget Password ??</a> <br>
                <label for="" class = "or-text">OR</label>
                <button class = "signup-button" formaction="login.php">Login</button>
            </form>
        </div>         
    </div>
    

    <?php
        echo loadFooter();
    ?>
    
</body>
</html>