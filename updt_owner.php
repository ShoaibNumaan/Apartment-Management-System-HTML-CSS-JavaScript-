<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'apt_db');

	// initialize variables
	$owner_id = "";
	$apt_id = "";
	$owner_name = "";
	$gender = "";
	$occupation = "";
	$phone = "";
	$edit_state=false;



	if (isset($_POST['update'])) {
		$owner_id = mysqli_real_escape_string($db, $_POST['owner_id']);
		$apt_id = mysqli_real_escape_string($db, $_POST['apt_id']);
		$owner_name = mysqli_real_escape_string($db, $_POST['owner_name']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$occupation = mysqli_real_escape_string($db, $_POST['occupation']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$updt_query = "UPDATE owner SET Apt_ID = '$apt_id' , O_Name = '$owner_name' ,
		DOB = '$dob', Gender = '$gender' , Occupation = '$occupation' , Phone = '$phone' WHERE O_ID = '$owner_id'";
		mysqli_query($db, $updt_query);
		$_SESSION['message'] = "Owner Updated!"; 
		header('location: show_owner.php');
		}

	if (isset($_GET['del'])) {
  		$owner_id = $_GET['del'];
  		$del_query = "DELETE FROM owner WHERE O_ID = '$owner_id'";
  		mysqli_query($db, $del_query);
  		$_SESSION['message'] = "Owner Dropped!"; 
  		header('location: show_owner.php');
		}	
	

	$show = "SELECT * FROM owner";
	$results = mysqli_query($db,$show);


?>	