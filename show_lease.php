<?php
include('updt_lease.php');


if (isset($_GET['edit'])) {
    $lease_id = $_GET['edit'];
    $edit_state = true;
    $sql = "SELECT * FROM lease WHERE Lease_ID = '$lease_id' ";
    
    $rec = mysqli_query($db, $sql);   
      
    $record = mysqli_fetch_array($rec);
//      $lease_id = $record['O_ID'];
      $apt_id = $record['Apt_ID'];
      $deposit = $record['Deposit'];
      $start_date = $record['Start_Date'];
      $end_date = $record['End_Date'];
    }
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Show Lease</title> 
<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>  

<script>
    
    function home()
    {
      window.location.replace('Menu.html');
    }

    function add()
    {
      window.location.replace('ins_lease.html');
    }

    function back()
    {
      window.location.replace('Show.html');
    }

</script>

<body>  

<button type="submit" onclick="home()">Home</button>

<button type="submit" onclick="add()">Add</button>

<button type="submit" onclick="back()">Back</button>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>


    <h1>Lease Details</h1><br />  
    

    <table>  
     <thead>
      <tr>
       <th>Sl No</th>
       <th>Lease ID</th>
       <th>Apartment ID</th>
       <th>Deposit</th>
       <th>Start Date</th>
       <th>End DAte</th>
       <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php $count = 1; ?>
     <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['Lease_ID']; ?></td>
      <td><?php echo $row['Apt_ID']; ?></td>
      <td><?php echo $row['Deposit']; ?></td>
      <td><?php echo $row['Start_Date']; ?></td>
      <td><?php echo $row['End_Date']; ?></td>
      <td>
        <a href="show_lease.php?edit=<?php echo $row['Lease_ID']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="updt_lease.php?del=<?php echo $row['Lease_ID']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 


<?php if ($edit_state == true): ?>
   <form action="updt_lease.php" method="post">
    
    <div class="input-group"> 
    <input type="hidden" name="lease_id" value="<?php echo $lease_id; ?>">
    </div>

    <div class="input-group">
    <label>Apartment ID</label>
    <input type="text" name="apt_id" value="<?php echo $apt_id; ?>">
    </div>
    
    <div class="input-group">
    <label>Deposit</label>
    <input type="text" name="deposit" value="<?php echo $deposit; ?>">
    </div>
    
    <div class="input-group">
    <label>Start Date</label>
    <input type="date" name="start_date" value="<?php echo $start_date; ?>">
    </div>
    
    <div class="input-group">
    <label>End Date</label>
    <input type="date" name="end_date" value="<?php echo $end_date; ?>">
    </div>
    
    
    <div class="input-group">
    <button class="btn" type="submit" name="update" >Update</button>
    </div>

<?php endif ?>
</form>
</body>  
</html>  
  
