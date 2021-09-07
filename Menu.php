<?php

session_start();


$choice = "";

$insert = $_POST['insert'];

$show = $_POST['show'];



if(isset($_POST['insert']))
{
 	global $choice; 
 	$choice = "insert";
}


if(isset($_POST['show']))
{
	global $choice;
	$choice = "Show";
}


switch($choice)
{
	case "insert": header("location:Insert.html");
				   break;
	
				   break;
	case "Show"	 : header("location:Show.html");		   
				   break;
				   
				   break;
	default : echo "Oops! Invalid Choice. Please Enter A Valid Choice";
}



?>