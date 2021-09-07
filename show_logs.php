<?php
session_start();
  $db = mysqli_connect('localhost', 'root', '', 'apt_db');

  if (isset($_GET['del'])) {
      $id = $_GET['del'];
      $del_query = "DELETE FROM apt_logs WHERE CDT = '$id'";
      mysqli_query($db, $del_query);
      $_SESSION['message'] = "Details Dropped!"; 
      header('location: show_logs.php');
    } 
  

  $show = "CALL `getLogDetails`();";
  $results = mysqli_query($db,$show);
?>


<!DOCTYPE html>
<html>  
<head>  
  <title>Logs</title> 
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

</script>

    <body>  

<button type="submit" onclick="home()">Home</button>

<button type="submit" onclick="back()">Back</button>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>


    <h1>Apartments Logs</h1><br />  
    

    <table>  
     <thead>
      <tr>
       <th>Sl No</th>>
       <th>Apartment ID</th>
       <th>Building ID</th>
       <th>Number Of Rooms</th>
       <th>Price</th>
       <th>Apartment For</th>
       <th>Deleted on</th>
       <th>Action</th>
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
      <td><?php echo $row['CDT']; ?></td>
      <td>
        <a href="show_logs.php?del=<?php echo $row['CDT']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
     </tbody>
    </table> 
</body>  
</html>  
  
