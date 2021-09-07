<?php

session_start();

 $conn = new mysqli('localhost','root','');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn,"apt_db");
        $x=$_POST['b_id'];
        $sql = "SELECT * FROM building WHERE Build_ID='$x'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            
            $message="Building ID ALREADY IN USE";
            echo"<script > { alert('$message');} window.location.replace('ins_building.html');</script>";

        }
    
        else {
                $sql="INSERT INTO building (Build_Name,Build_ID,No_of_Apts) VALUES ('$_POST[b_name]','$_POST[b_id]','$_POST[no_of_apts]')";
     
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