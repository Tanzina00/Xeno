<?php 
  session_start();
    
  if(!isset($_SESSION))
  {
    header('location:index.php');
    exit;
  }
  
?>
<?php

$con = mysqli_connect('localhost','root','','xeno');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"driver_info");
$sql="SELECT * FROM driver_info WHERE status = 0 ";
$result = mysqli_query($con,$sql);

echo "<table class=\"tables\">";
while($row = mysqli_fetch_array($result)) {

    
    echo "<tr><td>Driver name: </td><td>" . $row['name'] . "</td></tr>";
    echo "<tr><td>License number: </td><td>" . $row['license_no'] . "</td></tr>";
    echo "<tr><td>Phone number: </td><td>" . $row['phone'] . "</td></tr>";
    echo "<tr><td>Area In: </td><td>" . $row['area'] . "</td></tr>";
    
}
echo "</table>";
?>

