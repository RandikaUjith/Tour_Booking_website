<?php
    if(isset($_SESSION['isLogin'])){
        header("location: index.php?error=userloggedin");
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
    <link rel="stylesheet" href="../assets/stylesheets/login.css" />
    <title>Login</title>
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
            <form action="includes/loginProcess.php" method="post">
                <h2 class="heading">LOGIN</h2>
                <input type="text" name="email" class="login-input" placeholder = "Email">
                <input type="password" name="password" class="login-input" placeholder = "Password">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyemail"){
                            echo "<p>Enter your E-mail !!</p>";
                        } else if($_GET["error"] == "emptypassword"){
                            echo "<p>'Enter your Password !!</p>";
                        } else if($_GET["error"] == "incorrectpassword"){
                            echo "<p>Incorrect Password. Enter your Password again !!</p>";
                        } else if($_GET["error"] == "incorrectemail"){
                            echo "<p>Incorrect E-mail. Enter your E-mail again !!</p>";
                        } else if($_GET["error"] == "emailexist"){
                            echo "<p>The e-mail is already taken.. Use a different e-mail !!</p>";
                        } else if($_GET["error"] == "usernotloggedin"){
                            echo "<p>User need to Login first !!</p>";
                        }
                    }
                ?>
                <input type="submit" name="login-submit" class="login-button" value = "LogIn">
                <a href="#" class = "forget-password">Forget Password ??</a> <br>
                <label for="" class = "or-text">OR</label>
                <input type="submit" class="signup-button" value = "SignUp" formaction="signup.php">
            </form>
        </div>         
    </div>
    

    <?php
        echo loadFooter();
    ?>
    
</body>
</html>

