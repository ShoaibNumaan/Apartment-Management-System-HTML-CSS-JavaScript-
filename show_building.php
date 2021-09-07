<?php
include('updt_building.php');


if (isset($_GET['edit'])) {
    $build_id = $_GET['edit'];
    $edit_state = true;
    $sql = "SELECT * FROM building WHERE Build_ID = '$build_id' ";
    $rec = mysqli_query($db, $sql);   
      $record = mysqli_fetch_array($rec);
//      $build_id = $record['Build_ID'];
      $build_name = $record['Build_Name'];
      $no_of_apts = $record['No_of_Apts'];
    }
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Show Building</title> 
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

     function add()
    {
      window.location.replace('ins_building.html');
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


    <h1>Building Details</h1><br />  
    

    <table>  
     <thead>
      <tr>
       <th>Sl No</th>>
       <th>Building ID</th>
       <th>Building Name</th>
       <th>Number Of Apartments</th>
       <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
     <?php $count = 1; ?>
     <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['Build_ID']; ?></td>
      <td><?php echo $row['Build_Name']; ?></td>
      <td><?php echo $row['No_of_Apts']; ?></td>
      <td>
        <a href="show_building.php?edit=<?php echo $row['Build_ID']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="updt_building.php?del=<?php echo $row['Build_ID']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 


<?php if ($edit_state == true): ?>
   <form action="updt_building.php" method="post">
    <div class="input-group"> 
    <input type="hidden" name="b_id" value="<?php echo $build_id; ?>">
    </div>
    <div class="input-group">
    <label>Building Name</label>
    <input type="text" name="b_name" value="<?php echo $build_name; ?>">
    </div>
    

    <div class="input-group">
    <label>Number Of Apartments</label>
    <input type="text" name="no_of_apts" value="<?php echo $no_of_apts; ?>">
    </div>
    

    <div class="input-group">
    <button class="btn" type="submit" name="update" >Update</button>
    </div>
<?php endif ?>
</form>
</body>  
</html>  
  
