<?php
ob_start();
session_start();
$host="cray.cc.gettysburg.edu"; // vars start w $
$dbase="f21_3"; //database name
$user="praspr01";
$pass="praspr01";

try {
$db=new PDO("mysql:host=$host;dbname=$dbase",$user,$pass); // NO SPACES, ~all variables are global
}
catch(PDOException $e) {
  // . : string concatenation
  // -> insead of . for remote access
  // ' ' + e.getMessage   -- JAVA
  // ' ' . e-> getMessge  -- PHP
  die("ERROR connecting to MySQL server" . $e->getMessage());
}

?>

