<?php 
session_start();

$con = mysqli_connect("localhost", "root", "");
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
 $password = "";
if(isset($_POST['username'])){
    $password = $_POST['password'];
 }


 mysqli_select_db($con,"apt_db");

 // Query the database for user
 $result = mysqli_query($con,"select * from login where UserName = '$username' and Password = '$password'")
  or die('Failed to query database'.mysqli_error());
 $row = mysqli_fetch_array($result);
 if ( $row['UserName'] == $username && $row['Password'] == $password ) 
 {
 	$_SESSION['uname'] = $username;
  	 $message="Login Succesfull. Welcome ".$_SESSION['uname']."";
                echo"<script > { alert('$message');} window.location.replace('Menu.html');</script>";
 } 
 else 
 {
     $message="Credentials mismatch please try again";
                echo"<script > { alert('$message');} window.location.replace('login.html');</script>";
}

?>