<?php
require_once 'dbp_connect.php';
$_SESSION['menu'] = 'home';
if (isset($_GET['menu'])) {
    $_SESSION['menu'] = $_GET['menu'];
}
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calorie Counter</title>
    <!-- font -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap"
    />
    <!-- style -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />

  </head>

  <body>
    <header id="pageHeader">
      <!-- nav bar -->
      <nav id="mainNav">
        <!-- logo -->
        <div class="logo">
          <h4>CALORIE COUNTER</h4>
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
    
    <div id="mainArticle">

        
<!-- welcome -->
<div class="welcomeback" style="visibility:visible;">
              <h1><?php 
              if(isset($_SESSION['log_email']))
              $uid=
              $strr="SELECT * from user where uid= '$uid'"
              
              ?>
               </h1>
            </div>
            <div class="progresscontainer"  style="visibility:visible;">
              <h3 class = "progresstext">  Your progress so far </h3>
              <br>
              <div class="progress">
                <!-- insert data from database here instead of 40% -->
                <div class="progress__fill" style="width: 40%;"></div> 
                <span class="progress__text">40%</span>
              </div>
            </div>
            
            <div class="remainingcal" style="visibility:visible;">
            <p> Your remaining calories:  200 cal   </p>
            </div>
            
<!-- cards -->
            <ul class="cards"  style="visibility:visible;">
  <li>
    <a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/food.php" class="card">
      <img src="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/images/count.jpg" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
       
          <div class="card__header-text">
            <h3 class="card__title">Count Your Calories</h3>            
          </div>
        </div>
        <p class="card__description">Add food and drinks you had throughout the day to count your calories gained </p>
      </div>
    </a>      
  </li>
  <li>
    <a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/activities.php" class="card">
      <img src="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/images/exercise.jpg" class="card__image" alt="" />
      <div class="card__overlay">        
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
          <div class="card__header-text">
            <h3 class="card__title">Enter your exercises</h3>
          </div>
        </div>
        <p class="card__description">Add your exercises to track your calories lost throughout the day.</p>
      </div>
    </a>
  </li>
  <li>
    <a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/goals.php" class="card">
      <img src="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/images/progressbar.jpg" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <div class="card__header-text">
            <h3 class="card__title">Track your progress</h3>           
          </div>
        </div>
        <p class="card__description">Save the history of food logins and track your weight gain/loss.</p>
      </div>
    </a>
  </li>
  <li>
    <a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/goals.php" class="card">
      <img src="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/images/goal.jpg" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
          <div class="card__header-text">
            <h3 class="card__title">Achieve your fitness goal</h3>
          </div>          
        </div>
        <p class="card__description">Add your fitness goal and set your desired macros division per day to achieve that goal.</p>
      </div>
    </a>
  </li>    
</ul>


      </div>

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
