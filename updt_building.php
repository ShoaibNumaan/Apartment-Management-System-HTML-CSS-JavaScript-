<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'apt_db');

	// initialize variables
	$build_id = "";
	$build_name = "";
	$no_of_apts = "";
	$edit_state=false;

	
	if (isset($_POST['update'])) {
	$build_id = mysqli_real_escape_string($db,$_POST['b_id']);
	$build_name = mysqli_real_escape_string($db,$_POST['b_name']);
	$no_of_apts = mysqli_real_escape_string($db,$_POST['no_of_apts']);
	$updt_query = "UPDATE building SET Build_Name = '$build_name' , No_of_Apts = '$no_of_apts' WHERE Build_ID = '$build_id'";
	mysqli_query($db, $updt_query);
	$_SESSION['message'] = "Details Updated!"; 
	header('location: show_building.php');
}

if (isset($_GET['del'])) {
  $build_id = $_GET['del'];
  $del_query = "DELETE FROM building WHERE Build_ID = '$build_id'";
  mysqli_query($db, $del_query);
  $_SESSION['message'] = "Details Dropped!"; 
  header('location: show_building.php');
}
	$show = "SELECT * FROM building";
	$results = mysqli_query($db,$show);


?>	