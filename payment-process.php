<?php
session_start();
include "dbconnect.php";

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}
 $customer=$_SESSION['user'];

if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
date_default_timezone_set("Asia/Kuala_Lumpur");

$total = $_POST['total'];
$fullname = $_POST['name'];
$address = $_POST['address'];
$city= $_POST['city'];
$state= $_POST['state'];
$zip_code= $_POST['zip_code'];
$phone_number= $_POST['phone_number'];
$email= $_POST['email'];

$query ="INSERT INTO receipt( fullname, address, city, state, zipcode, phoneNum, email,total, Customer) VALUES ('$fullname','$address','$city','$state','$zip_code','$phone_number','$email','$total','$customer')";
$result=mysqli_query($con,$query);

$lastid = mysqli_insert_id($con);
 
$query4="SELECT * FROM cart WHERE Customer='$customer'";
            
$result4=mysqli_query($con,$query4); 
                $total=0;
                if(mysqli_num_rows($result4)>0)
                {    
                     while($row4 = mysqli_fetch_assoc($result4))
                     {
                        $product = $row4['Product'];
                        $quantity = $row4['Quantity'];
$query5 ="INSERT INTO boughtcart VALUES ('$lastid','$customer','$product','$quantity')";
$result=mysqli_query($con,$query5);
                     }
                 }

$query6="DELETE FROM cart where Customer='$customer'";
$result=mysqli_query($con,$query6);
header("location: receipt.php?ID=$lastid");

?>



