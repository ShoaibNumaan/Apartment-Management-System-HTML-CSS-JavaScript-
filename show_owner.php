<?php
include('updt_owner.php');


if (isset($_GET['edit'])) {
    $owner_id = $_GET['edit'];
    $edit_state = true;
    $sql = "SELECT * FROM owner WHERE O_ID = '$owner_id' ";
    
    $rec = mysqli_query($db, $sql);   
      
    $record = mysqli_fetch_array($rec);
//      $owner_id = $record['O_ID'];
      $apt_id = $record['Apt_ID'];
      $owner_name = $record['O_Name'];
      $gender = $record['Gender'];
      $dob = $record['DOB'];
      $occupation = $record['Occupation'];
      $phone = $record['Phone'];
    }
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Show Owners</title> 
<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>  

<script>
    
    function home()
    {
      window.location.replace('Menu.html');
    }

    function add()
    {
      window.location.replace('ins_owner.html');
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


    <h1>Apartments Details</h1><br />  
    

    <table>  
     <thead>
      <tr>
       <th>Sl No</th>>
       <th>Owner ID</th>
       <th>Apartment ID</th>
       <th>Owner Name</th>
       <th>DOB</th>
       <th>Gender</th>
       <th>Occupation</th>
       <th>Phone</th>
       <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php $count = 1; ?>
     <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['O_ID']; ?></td>
      <td><?php echo $row['Apt_ID']; ?></td>
      <td><?php echo $row['O_Name']; ?></td>
      <td><?php echo $row['DOB']; ?></td>
      <td><?php echo $row['Gender']; ?></td>
      <td><?php echo $row['Occupation']; ?></td>
      <td><?php echo $row['Phone']; ?></td>
      <td>
        <a href="show_owner.php?edit=<?php echo $row['O_ID']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="updt_owner.php?del=<?php echo $row['O_ID']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 


<?php if ($edit_state == true): ?>
   <form action="updt_owner.php" method="post">
    
    <div class="input-group"> 
    <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>">
    </div>

    <div class="input-group">
    <label>Apartment ID</label>
    <input type="text" name="apt_id" value="<?php echo $apt_id; ?>">
    </div>
    
    <div class="input-group">
    <label>Owner Name</label>
    <input type="text" name="owner_name" value="<?php echo $owner_name; ?>">
    </div>
    
    <div class="input-group">
    <label>Date of birth</label>
    <input type="date" name="dob" value="<?php echo $dob; ?>">
    </div>

    <div class="input-group">
    <label>Gender</label>
    <input type="text" name="gender" value="<?php echo $gender; ?>">
    </div>
    
    <div class="input-group">
    <label>Occupation</label>
    <input type="text" name="occupation" value="<?php echo $occupation; ?>">
    </div>
    
    <div class="input-group">
    <label>Phone</label>
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    </div>

    <div class="input-group">
    <button class="btn" type="submit" name="update" >Update</button>
    </div>

<?php endif ?>
</form>
</body>  
</html>  
  
