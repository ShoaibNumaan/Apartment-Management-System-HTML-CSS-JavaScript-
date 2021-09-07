<?php
include('updt_apt.php');


if (isset($_GET['edit'])) {
    $apt_id = $_GET['edit'];
    $edit_state = true;
    $sql = "SELECT * FROM apartment WHERE Apt_ID = '$apt_id' ";
    
    $rec = mysqli_query($db, $sql);   
      
    $record = mysqli_fetch_array($rec);
//      $apt_id = $record['Apt_ID'];
      $build_id = $record['Build_ID'];
      $no_of_rooms = $record['No_of_Rooms'];
      $price = $record['Price'];
      $apt_for = $record['Apt_For'];
    }
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Show Apartments</title> 
<link rel="stylesheet" type="text/css" href="tablestyle.css">
</head>  

<script>
    
    function home()
    {
      window.location.replace('Menu.html');
    }

    function back()
    {
      window.location.replace('Show.html');
    }

    function sale()
    {
      window.location.replace('apt_on_sale.php');
    }

    function rent()
    {
      window.location.replace('show_rent.php');
    }

    function lease()
    {
      window.location.replace('show_lease.php');
    }

    function add()
    {
      window.location.replace('ins_apt.html');
    }

</script>

    <body>  

<button type="submit" onclick="home()">Home</button>

<button type="submit" onclick="add()">Add</button>

<button type="submit" onclick="sale()">On Sale</button>

<button type="submit" onclick="rent()">On Rent</button>

<button type="submit" onclick="lease()">On Lease</button>

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
       <th>Apartment ID</th>
       <th>Building ID</th>
       <th>Number Of Rooms</th>
       <th>Price</th>
       <th>Apartment For</th>
       <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php $count = 1; ?>
     <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['Apt_ID']; ?></td>
      <td><?php echo $row['Build_ID']; ?></td>
      <td><?php echo $row['No_of_Rooms']; ?></td>
      <td><?php echo $row['Price']; ?></td>
      <td><?php echo $row['Apt_For']; ?></td>
      <td>
        <a href="show_apt.php?edit=<?php echo $row['Apt_ID']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="updt_apt.php?del=<?php echo $row['Apt_ID']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 


<?php if ($edit_state == true): ?>
   <form action="updt_apt.php" method="post">
    
    <div class="input-group"> 
    <input type="hidden" name="apt_id" value="<?php echo $apt_id; ?>">
    </div>

    <div class="input-group">
    <label>Building ID</label>
    <input type="text" name="build_id" value="<?php echo $build_id; ?>">
    </div>
    
    <div class="input-group">
    <label> Number Of Rooms</label>
    <input type="text" name="no_of_rooms" value="<?php echo $no_of_rooms; ?>">
    </div>
    
    <div class="input-group">
    <label>Price</label>
    <input type="text" name="price" value="<?php echo $price; ?>">
    </div>
    
    <div class="input-group">
    <label>Apartment For</label>
    <input type="text" name="apt_for" value="<?php echo $apt_for; ?>">
    </div>
    

    <div class="input-group">
    <button class="btn" type="submit" name="update" >Update</button>
    </div>

<?php endif ?>
</form>
</body>  
</html>  
  
