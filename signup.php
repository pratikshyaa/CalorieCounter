<?php

//ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1); error checking
require 'dbp_connect.php';
require 'forms/register_form.php';
require 'forms/login_form.php';

?>


<html>
<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" /> 

</head>

<body>
<header id="pageHeader">
      <!-- nav bar -->
      <nav id="mainNav">
        <!-- logo -->
        <div class="logo">
          <h4>Calorie Counter</h4>
        </div>
        <!-- nav list -->
        <ul class="nav-links">
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/landingPage.php">Home</a></li>
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/food.php">Food</a></li>
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/activities.php">Activities</a></li>
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/goals.php">Goals</a></li>
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/settings.php">Settings</a></li
          <li>
          <div id="siteAds">
          
            <?php
          
           
            print "<FORM method='POST' action='signup.php'>\n";
            // show login form for testing if user is not logged in
            if (!isset($_SESSION['uid'])) {
                $menu = 'login'; 
                print "<INPUT type='hidden' name='op' value='login' />\n";
                print "<INPUT type='submit' value='Login' />\n";
            }
            // show logout button if user is logged in
            else {
            $menu = 'logout';
                print "<INPUT type='hidden' name='op' value='logout' />\n";
                print "<INPUT type='submit' value='logout' />\n";
                

            }
            print "</FORM>\n";
            ?>
            </div>
          </li>

        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </header>
    
  
    <!-- login form  -->
    <form action="signup.php" method="POST">
        <input type="email" name="log_email" placeholder="Email Address" value="<?php
                                                                                if (isset($_SESSION['log_email'])) {
                                                                                    echo $_SESSION['log_email'];
                                                                                }
                                                                                ?>" required>
        <br>
        <input type="password" name="log_password" placeholder="Password">
        <br>
        <input type="submit" name="login_button" value="Login">

        <?php
        if (in_array("Email or password was incorrect<br>", $error_array)){ echo "Email or password was incorrect<br>";} // checks if the error message is in the array
        ?>

    </form>

    <!-- signup form -->
    <form action="signup.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                                                                            if (isset($_SESSION['reg_fname'])) {
                                                                                echo $_SESSION['reg_fname'];
                                                                            }
                                                                            ?>" required>
        <br>
        <?php if (in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) {
            echo "Your first name must be between 2 and 25 characters<br>";
        }
        ?>




        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                                                                            if (isset($_SESSION['reg_lname'])) {
                                                                                echo $_SESSION['reg_lname'];
                                                                            }
                                                                            ?>" required>
        <br>
        <?php if (in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) {
            echo "Your last name must be between 2 and 25 characters<br>";
        }
        ?>

        <input type="email" name="reg_email" placeholder="Email" value="<?php
                                                                        if (isset($_SESSION['reg_email'])) {
                                                                            echo $_SESSION['reg_email'];
                                                                        }
                                                                        ?>" required>
        <br>

        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                                                                                    if (isset($_SESSION['reg_email2'])) {
                                                                                        echo $_SESSION['reg_email2'];
                                                                                    }
                                                                                    ?>" required>
        <br>
        <?php if (in_array("Email already in use<br>", $error_array)) {
            echo "Email already in use<br>";
        } else if (in_array("Invalid email format<br>", $error_array)) {
            echo "Invalid email format<br>";
        } else if (in_array("Emails don't match<br>", $error_array)) {
            echo "Emails don't match<br>";
        }
        ?>


        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <?php if (in_array("Your passwords do not match<br>", $error_array)) {
            echo "Your passwords do not match<br>";
        } else if (in_array("Your password can only contain english characters or numbers<br>", $error_array)) {
            echo "Your password can only contain english characters or numbers<br>";
        } else if (in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) {
            echo "Your password must be betwen 5 and 30 characters<br>";
        }
        ?>
        
         <input type="date" name="reg_dob" placeholder="Birth date" required>
        <br>
        <input type="number" name="reg_height" placeholder="Enter Height in inches" required>
        <br>

        <input type="submit" name="register_button" value="Register">
        <br>

        <?php if (in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>", $error_array)) {
            echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>";
        }
        ?>

    </form>

  <!-- footer  -->
    <footer>
      <div class="footer-content">
        <h3>Calorie Counter</h3>
        <p>
          <P>Calorie Counter is a tool that allows you to track the amount of calories and other macronutrients you eat.  Calorie Counter also allows you to input activities you perform and will calculate how many calories you burn while doing them.  Set goals to help motivate yourself and track your progress towards your new goals using Calorie Counter.</P>
        </p>
      </div>
      <div class="footer-bottom">
        <p>
          copyright &copy;2021 Calorie Counter. designed by
          <span>Drew, Saul, and Pratikshya</span>
        </p>
      </div>
    </footer>

    <script src="app.js"></script>
</body>

</html>