<?php

session_start();

 $conn = new mysqli('localhost','root','');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn,"apt_db");
        $x=$_POST['apt_id'];
        $sql = "SELECT * FROM apartment WHERE Apt_ID='$x'";
        $result = $conn->query($sql);

        $y=$_POST['b_id'];
        $sql2 = "SELECT * FROM building WHERE Build_ID='$y'";
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0)
            {
                $message="Apartment ID ALREADY IN USE";
                echo"<script > { alert('$message');} window.location.replace('ins_apt.html');</script>";
            }

        elseif($result2->num_rows < 1)
            {
                $message="Oops, Please Enter Existing Building ID";
                echo"<script > { alert('$message');} window.location.replace('ins_apt.html');</script>";
            }        
        
        else
            {
                $sql="INSERT INTO apartment (Apt_ID,Build_ID,Price,No_of_Rooms,Apt_For) VALUES 
                        ('$_POST[apt_id]','$_POST[b_id]','$_POST[price]','$_POST[no_of_rooms]','$_POST[apt_for]')";
     
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