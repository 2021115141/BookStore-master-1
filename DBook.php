<?php
session_start();
if(!isset($_SESSION['admin']))
       header("location: index.php?Message=Login Admin To Continue");
?>

<?php
include "dbconnect.php";

    $PID=$_GET['ID'];
  $query = "DELETE FROM products WHERE PID='$PID'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($result)
        {
             header("Location: Aindex.php?Message=Successfully Delete Books");
        }
        else
          header("Location: Aindex.php?login=" . "Not Successfully Logged In");
   

    

?>