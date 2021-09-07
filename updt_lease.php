<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'apt_db');

	// initialize variables
	$lease_id = "";
	$apt_id = "";
	$deposit = "";
	$start_date = "";
	$end_date = "";
	$edit_state=false;



	if (isset($_POST['update'])) {
		$lease_id = mysqli_real_escape_string($db, $_POST['lease_id']);
		$apt_id = mysqli_real_escape_string($db, $_POST['apt_id']);
		$deposit = mysqli_real_escape_string($db, $_POST['deposit']);
		$start_date = mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date= mysqli_real_escape_string($db, $_POST['end_date']);
		$updt_query = "UPDATE lease SET Apt_ID = '$apt_id' , Deposit = '$deposit' , Start_Date = '$start_date' , End_Date = '$end_date' WHERE Lease_ID = '$lease_id'";
		mysqli_query($db, $updt_query);
		$_SESSION['message'] = "Details Updated!"; 
		header('location: show_lease.php');
		}

	if (isset($_GET['del'])) {
  		$lease_id = $_GET['del'];
  		$del_query = "DELETE FROM lease WHERE Lease_ID = '$lease_id'";
  		mysqli_query($db, $del_query);
  		$_SESSION['message'] = "Details Dropped!"; 
  		header('location: show_lease.php');
		}	
	

	$show = "SELECT * FROM lease";
	$results = mysqli_query($db,$show);


?>	