<?php
include('updt_rent.php');


if (isset($_GET['edit'])) {
    $rent_id = $_GET['edit'];
    $edit_state = true;
    $sql = "SELECT * FROM rent WHERE Rent_ID = '$rent_id' ";
    
    $rec = mysqli_query($db, $sql);   
      
    $record = mysqli_fetch_array($rec);
//      $rent_id = $record['Rent_ID'];
      $apt_id = $record['Apt_ID'];
      $rent_fee = $record['Rent_Fee'];
      $late_fee = $record['Late_Fee'];
      $due_date = $record['Due_Date'];
    }
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Show Rent</title> 
<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>  

<script>
    
    function home()
    {
      window.location.replace('Menu.html');
    }

    function add()
    {
      window.location.replace('ins_rent.html');
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


    <h1>Rent Details</h1><br />  
    

    <table>  
     <thead>
      <tr>
       <th>Sl No</th>
       <th>Rent ID</th>
       <th>Apartment ID</th>
       <th>Rent Fee</th>
       <th>Late Fee</th>
       <th>Due Date</th>
       <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php $count = 1; ?>
     <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['Rent_ID']; ?></td>
      <td><?php echo $row['Apt_ID']; ?></td>
      <td><?php echo $row['Rent_Fee']; ?></td>
      <td><?php echo $row['Late_Fee']; ?></td>
      <td><?php echo $row['Due_Date']; ?></td>
      <td>
        <a href="show_rent.php?edit=<?php echo $row['Rent_ID']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="updt_rent.php?del=<?php echo $row['Rent_ID']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 


<?php if ($edit_state == true): ?>
   <form action="updt_rent.php" method="post">
    
    <div class="input-group"> 
    <input type="hidden" name="rent_id" value="<?php echo $rent_id; ?>">
    </div>

    <div class="input-group">
    <label>Apartment ID</label>
    <input type="text" name="apt_id" value="<?php echo $apt_id; ?>">
    </div>
    
    <div class="input-group">
    <label>Rent Fee</label>
    <input type="text" name="rent_fee" value="<?php echo $rent_fee; ?>">
    </div>
    
    <div class="input-group">
    <label>Late Fee</label>
    <input type="text" name="late_fee" value="<?php echo $late_fee; ?>">
    </div>
    
    <div class="input-group">
    <label>Due Date</label>
    <input type="date" name="due_date" value="<?php echo $due_date; ?>">
    </div>
    
    
    <div class="input-group">
    <button class="btn" type="submit" name="update" >Update</button>
    </div>

<?php endif ?>
</form>
</body>  
</html>  
  
