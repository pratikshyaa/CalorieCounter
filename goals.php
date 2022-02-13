<?php
// ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1); Error checking
require_once 'dbp_connect.php';
require_once 'forms/update_forms.php';
$uid=$_SESSION['uid'];
//current weight
$str="SELECT * from weight WHERE uid='$uid' ORDER BY date DESC LIMIT 1;"; 
$res= $db->query($str);
// current goal weight
$str1="SELECT * from goal WHERE uid='$uid' ORDER BY date DESC LIMIT 1;"; 
$res1= $db->query($str1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Goals</title>
    <!-- font -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap"
    />
    <link rel="stylesheet" href="style.css" />
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
          <li><a href="http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/settings.php">Settings</a></li>
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

    <section class="progressbar">
      <h2>Progress</h2>
      <div class="chart">
        <canvas id="myChart"></canvas>
      </div>
      
    </section>
    <section class="goals">
       <!-- need to display data from database here, for now sample data is used -->
      <h2>Goals</h2>
      <h3><?php
       if($res !=FALSE){
       $row = $res->fetch(0);
       $wgt= $row['weight'];
       echo "Current Weight: ".$wgt." pounds";
       }
       else{
       echo "You have not entered your weight yet.";
       }
       ?></h3>
       <form action="goals.php" method="POST">
       <input type="number" id="weight" name="weight"> 
      <input type="submit" name="weightbtn" value="Add new weight">
       </form>
      <h3>
      
      <?php 
      if($res1 != FALSE){
      $row1 = $res1->fetch(0);
      $gwgt= $row1['weight'];
      $bmr=$row1['bmr'];
      echo "Current Goal Weight: ".$gwgt." pounds";
      }
      else {
      echo "You have not entered your goal weight yet."; 
      }
        ?></h3>
       <form action="goals.php" method="POST">
       <input type = "number" id="gweight" name="gweight"> 
      <input type="submit" name="goalbtn" value="Add new goal weight">
      </form>
      <br />
      <br />
      <h3><?php 
      if($res1 != FALSE){
      echo "Daily calories needed to reach the goal: ".$bmr." calories";
      }
      else
      {
      echo "Enter your goal weight to view the calories you need to reach your goal.";
      }
    ?>
    </h3>
    </section>
<!--
//code to make the chart dynamic: ongoing work 
// <?php
// $str7="SELECT * from weight where uid= '$uid';"; 
//$query = $db->query($str7);
//foreach($query as $data)
// {
//$date[]=$data['date'];
//$weight[]=$data['weight'];
//}
//?>
-->
    <!-- script for chart.js -->
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"
          integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer">
        </script>
        <!-- <script src="/chart.js"></script> -->

        <script>
          const ctx = document.getElementById("myChart").getContext("2d");

          let delayed;  // for animation in graph

          // Gradient Fill
          let gradient = ctx.createLinearGradient(0,0,0,400);
          gradient.addColorStop(0, "rgba(58,123,213,1");
          gradient.addColorStop(1, "rgba(0,210,255,0.3)");


          const labels = [
            "2020-01-06",
            "2020-03-02",
            "2020-05-11",
            "2020-06-14",
            "2020-06-23",
            "2020-09-01",
            "2020-11-05",
            "2021-01-22",
            "2020-02-19",
            "2020-04-12",
          ];

          const data = {
            labels,
            datasets: [
              {
                data: [100, 106, 108, 110, 115, 115, 117, 118, 120, 123],
                label: "Weight Progress",
                fill: true,
                backgroundColor: gradient,
                borderColor: "#8b8eb2",
                pointBackgroundColor: "#40446e"
              },
            ],
          };

          const config = {
            type: "line",
            data: data,
            options: {
              radius: 5,
              hitRadius: 30,
              responsive: true,
              animation: {
                onComplete: () => {
                  delayed = true;
                },
                delay: (context) => {
                  let delay = 0;
                  if(context.type === 'data' && context.mode === 'default' && !delayed) {
                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                  } 
                  return delay;
                },
              },
              scales: {
                y: {
                  ticks: {
                    callback: function (value){
                      return  value + " pounds";
                    }
                  }
                }
              }
            },
          };

          const myChart = new Chart(ctx, config);

        </script>
        <!-- footer  -->
    <footer>
      <div class="footer-content">
        <h3>Calorie Counter</h3>
        <p>
         <P>Calorie Counter is a tool that allows you to track the amount of calories and other macronutrients you eat.  Calorie Counter also allows you to input activities you perform and will calculate how many calories you burn while doing them.  Set goals to help motivate yourself and track your progress towards your new goals using Calorie Counter.</P>
        </p>
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