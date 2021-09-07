<?php

session_start();


$choice = "";

$ins_build = $_POST['building'];

$ins_apt = $_POST['apt'];

$ins_owner = $_POST['owner'];

$ins_lease = $_POST['lease'];

$ins_rent = $_POST['rent'];

if(isset($_POST['building']))
{
 	global $choice; 
 	$choice = "building";
}

if(isset($_POST['apt']))
{
	global $choice; 
	$choice = "apt";
}

if(isset($_POST['owner']))
{
	global $choice;
	$choice = "owner";
}

if(isset($_POST['lease']))
{
	global $choice; 
	$choice = "lease";
}

if(isset($_POST['rent']))
{
	global $choice; 
	$choice = "rent";
}

switch($choice)
{
	case "building" :	 header("location:ins_building.html");
				   			break;
	case "apt": 		 header("Location:ins_apt.html");
				   			break;
	case "owner":   	 header("location:ins_owner.html");		   
				   			break;
	case "lease": 		 header("location:ins_lease.html");			   
				   			break;
	case "rent": 		 header("location:ins_rent.html");			   
				   			break;			   
	default : echo "Oops! No Such Table Exists";
}



?>