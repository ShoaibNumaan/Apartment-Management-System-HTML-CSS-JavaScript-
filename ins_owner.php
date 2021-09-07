<?php

session_start();

 $conn = new mysqli('localhost','root','');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn,"apt_db");
        $x=$_POST['o_id'];
        $sql = "SELECT * FROM owner WHERE O_ID ='$x'";
        $result = $conn->query($sql);

        $y=$_POST['apt_id'];
        $sql2 = "SELECT * FROM apartment WHERE Apt_ID ='$y'";
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0)
            {
                $message="OWNER ID ALREADY IN USE";
                echo"<script > { alert('$message');} window.location.replace('ins_owner.html');</script>";
            }

        elseif($result2->num_rows < 1)
            {
                $message="Oops, Please Enter Existing APARTMENT ID";
                echo"<script > { alert('$message');} window.location.replace('ins_owner.html');</script>";
            }        
        
        else
            {
                $sql="INSERT INTO owner (O_ID,Apt_ID,O_Name,DOB,Gender,Occupation,Phone) VALUES 
                        ('$_POST[o_id]','$_POST[apt_id]','$_POST[o_name]','$_POST[dob]','$_POST[gender]','$_POST[ocp]','$_POST[phone]')";
     
                if ($conn->query($sql) === TRUE) {
                        $msg="Details Uploaded Successfully";
                        echo"<script type='text/javascript'> { alert('$msg');} window.location.replace('Insert.html');</script>";
	               }
                else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                mysqli_close($conn);

            }


?>