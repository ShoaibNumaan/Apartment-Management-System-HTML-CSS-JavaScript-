<?php

session_start();


$choice = "";

$ins_build = $_POST['building'];

$ins_apt = $_POST['apt'];

$ins_owner = $_POST['owner'];

$ins_lease = $_POST['lease'];

$ins_rent = $_POST['rent'];

$ins_rent = $_POST['logs'];

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

if(isset($_POST['logs']))
{
	global $choice; 
	$choice = "logs";
}

switch($choice)
{
	case "building" :	 header("location:show_building.php");
				   			break;
	case "apt": 		 header("Location:show_apt.php");
				   			break;
	case "owner":   	 header("location:show_owner.php");		   
				   			break;
	case "lease": 		 header("location:show_lease.php");			   
				   			break;
	case "rent": 		 header("location:show_rent.php");			   
				   			break;		
	case "logs": 		 header("location:show_logs.php");			   
				   			break;				   				   
	default : echo "Oops! No Such Table Exists";
}



?>