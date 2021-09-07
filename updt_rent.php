<?php 
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'apt_db');

  // initialize variables
  $rent_id = "";
  $apt_id = "";
  $rent_fee = "";
  $late_fee = "";
  $due_date = "";
  $edit_state=false;



  if (isset($_POST['update'])) {
    $rent_id = mysqli_real_escape_string($db, $_POST['rent_id']);
    $apt_id = mysqli_real_escape_string($db, $_POST['apt_id']);
    $rent_fee = mysqli_real_escape_string($db, $_POST['rent_fee']);
    $late_fee = mysqli_real_escape_string($db, $_POST['late_fee']);
    $due_date= mysqli_real_escape_string($db, $_POST['due_date']);
    $updt_query = "UPDATE rent SET Apt_ID = '$apt_id' , Rent_Fee = '$rent_fee' , Late_Fee = '$late_fee' , Due_Date = '$due_date' WHERE Rent_ID = '$rent_id'";
    mysqli_query($db, $updt_query);
    $_SESSION['message'] = "Details Updated!"; 
    header('location: show_rent.php');
    }

  if (isset($_GET['del'])) {
      $rent_id = $_GET['del'];
      $del_query = "DELETE FROM rent WHERE Rent_ID = '$rent_id'";
      mysqli_query($db, $del_query);
      $_SESSION['message'] = "Details Dropped!"; 
      header('location: show_rent.php');
    } 
  

  $show = "SELECT * FROM rent";
  $results = mysqli_query($db,$show);


?>  