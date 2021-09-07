<?php

session_start();

 $conn = new mysqli('localhost','root','');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_select_db($conn,"apt_db");
        $x=$_POST['lease_id'];
        $sql = "SELECT * FROM lease WHERE Lease_ID ='$x'";
        $result = $conn->query($sql);

        $y=$_POST['apt_id'];
        $sql2 = "SELECT * FROM apartment WHERE Apt_ID ='$y'";
        $result2 = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM apartment WHERE Apt_ID ='$y' AND Apt_For = 'Lease'";
        $result3 = $conn->query($sql3);

        if ($result->num_rows > 0)
            {
                $message="LEASE ID ALREADY IN USE";
                echo"<script > { alert('$message');} window.location.replace('ins_lease.html');</script>";
            }

        elseif($result2->num_rows < 1)
            {
                $message="Oops, Please Enter Existing APARTMENT ID";
                echo"<script > { alert('$message');} window.location.replace('ins_lease.html');</script>";
            }        
        elseif($result3->num_rows < 1)
            {
                $message="Oops, APARTMENT is not for Lease ";
                echo"<script > { alert('$message');} window.location.replace('ins_lease.html');</script>";
            }        
        else
            {
                $sql="INSERT INTO lease (Lease_ID,Apt_ID,Deposit,Start_Date,End_Date) VALUES 
                        ('$_POST[lease_id]','$_POST[apt_id]','$_POST[deposit]','$_POST[start_date]','$_POST[end_date]')";
     
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