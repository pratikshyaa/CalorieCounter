<?php 
if(!isset($_SESSION))
{
session_start();
}
if(isset($_POST['login_button'])) {
	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email
	$_SESSION['log_email'] = $email; //Store email into session variable 
	$password = md5($_POST['log_password']); //Get password
  $str="SELECT * FROM user WHERE email='$email' AND password='$password';";
	$res = $db->query($str);
 if($res!=FALSE){
	$nrows = $res->rowCount();
 }
    // if login match return 1 row
	if($nrows ==1) {
		$row = $res->fetch(0);
		$uid = $row['uid']; //set session username
  $_SESSION['uid'] = $uid;
  header("Location: http://www.cs.gettysburg.edu/~praspr01/CalorieCounter/landingPage.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}
}
?>

