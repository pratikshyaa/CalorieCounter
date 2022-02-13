<?php
//ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1);
$calories = ""; 
$currwgt = ""; 
$goalwgt = ""; 
$date="";
$uid="";
$height=""; 
$age=""; 
 
if (isset($_POST['weightbtn'])) {
    $uid=$_SESSION['uid'];
    $currwgt = $_POST['weight']; 
    $date= date("Y-m-d");
    $str="SELECT * from user WHERE uid='$uid';"; 
    $res= $db->query($str);
    $row = $res->fetch(0); 
    $bdate= $row['bdate']; 
    $height=$row['height']; 
    $age = floor((time() - strtotime($bdate)) / 31556926); // age derived from birthdate 
    $bmr= floor(66 + (6.23 * $currwgt) + (12.7 * $height) - (6.8 * $age)); 
    $str5="INSERT INTO weight(uid, weight, bmr, date) VALUES ('$uid', '$currwgt', '$bmr', '$date');";
    $res5= $db->query($str5);
}

if (isset($_POST['goalbtn'])) {
    $uid=$_SESSION['uid'];
    $goalwgt = $_POST['gweight']; 
    $date= date("Y-m-d");
    $str2="SELECT * from user WHERE uid='$uid';"; 
    $res2= $db->query($str2);
    $row2 = $res2->fetch(0); 
    $bdate= $row2['bdate']; 
    $height=$row2['height']; 
    $age = floor((time() - strtotime($bdate)) / 31556926); // age derived from birthdate 
    $bmr= floor(66 + (6.23 * $goalwgt) + (12.7 * $height) - (6.8 * $age)); 
   $str3="INSERT INTO goal(uid, weight, date, bmr) VALUES ('$uid', '$goalwgt','$date', '$bmr');";
 $res3= $db->query($str3);
}


?>
