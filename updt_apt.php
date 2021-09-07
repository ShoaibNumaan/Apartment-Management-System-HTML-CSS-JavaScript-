<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'apt_db');

	// initialize variables
	$apt_id = "";
	$build_id = "";
	$no_of_rooms = "";
	$price = "";
	$apt_for = "";
	$edit_state=false;

	if (isset($_POST['update'])) {
		$apt_id = mysqli_real_escape_string($db, $_POST['apt_id']);
		$build_id = mysqli_real_escape_string($db, $_POST['build_id']);
		$no_of_rooms = mysqli_real_escape_string($db, $_POST['no_of_rooms']);
		$price = mysqli_real_escape_string($db, $_POST['price']);
		$apt_for = mysqli_real_escape_string($db, $_POST['apt_for']);
	$updt_query = "UPDATE apartment SET Build_ID = '$build_id' , No_of_Rooms = '$no_of_rooms' , Price = '$price' , Apt_For = '$apt_for' WHERE Apt_ID = '$apt_id'";
	mysqli_query($db, $updt_query);
	$_SESSION['message'] = "Details Updated!"; 
	header('location: show_apt.php');
}

if (isset($_GET['del'])) {
  $apt_id = $_GET['del'];
  $del_query = "DELETE FROM apartment WHERE Apt_ID = '$apt_id'";
  mysqli_query($db, $del_query);
  $_SESSION['message'] = "Details Dropped!"; 
  header('location: show_apt.php');
}
	$show = "SELECT * FROM apartment";
	$results = mysqli_query($db,$show);


?>	