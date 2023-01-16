<?php
session_start();
include "dbconnect.php";

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if(!isset($_SESSION['user']) && !isset($_SESSION['admin']))
       header("location: index.php?Message=Please Login To Continue");
?>



<!DOCTYPE html>
<html lang="en">
<head>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    margin-top: 20px;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
      .modal-header {background:#D67B22;color:#fff;font-weight:800;}
      .modal-body{font-weight:800;}
      .modal-body ul{list-style:none;}
      .modal .btn {background:#D67B22;color:#fff;}
      .modal a{color:#D67B22;}
      .modal-backdrop {position:inherit !important;}
       #login_button,#register_button{background:none;color:#D67B22!important;}       
       #query_button {position:fixed;right:0px;bottom:0px;padding:10px 80px;
                      background-color:#D67B22;color:#fff;border-color:#f05f40;border-radius:2px;}
  	@media(max-width:767px){
        #query_button {padding: 5px 20px;}
  	}
    </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container-fluid" style="background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
        <?php
        
            if( isset($_SESSION['admin'])){
           echo' <li> <a href="AIndex.php" class="btn btn-lg"> Hello ADMIN</a></li>
                    
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
            }elseif (isset($_SESSION['user'])) {
            echo' <li> <a href="profile.php" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>;
                    <li> <a href="BBook.php" class="btn btn-lg"> My Purchase History </a> </li>;  
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
        }
               
          
?>
<?php
      $receiptid = $_GET['ID'];
      
      $query = "SELECT * from receipt where id ='$receiptid'";
      $result = mysqli_query($con,$query);
      $row = mysqli_fetch_assoc($result);
?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>    
  <br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?=$row['fullname']?></strong>
                        <br>
                        <?=$row['address']?>
                        <br>
                        <?=($row['city']." , ".$row['zipcode']." , ".$row['state'])?>
                        <br>
                        <abbr title="Phone">P:</abbr> <?=$row['phoneNum']?>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>PENERBIT PRESS</em>
                    </p>
                    <p>
                        <em>Penerbit UiTM Kompleks Usahawan
                        Universiti Teknologi MARA 40450
                        <br> Shah Alam Selangor Darul Ehsan</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    
                    <h1>Receipt #<?=$row['id']?></h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity (PCS)</th>
                            <th class="text-center">Price (RM)</th>
                            <th class="text-center">Total (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                    $query="SELECT PID,Title,Author,Edition,Quantity,Price FROM boughtcart INNER JOIN products ON boughtcart.Product=products.PID 
                        WHERE boughtcart.receiptid='$receiptid'";
            $result2=mysqli_query($con,$query); 
                $total=0;
                if(mysqli_num_rows($result)>0)
                {    
                     while($row2 = mysqli_fetch_assoc($result2))
                     {       $path = "img/books/".$row2['PID'].".jpg";
                             $Stotal = $row2['Quantity'] * $row2['Price'];
                        
                        ?>
                        <tr>
                            <td class="col-md-9"><em><?=$row2['Title']?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"> <?=$row2['Quantity']?> </td>
                            <td class="col-md-1 text-center"><?=$row2['Price']?></td>
                            <td class="col-md-1 text-center"><?=$row2['Price']*$row2['Quantity']?></td>
                        </tr>
                        <?php 
                        $total += $Stotal;
                        }
                }
                        ?>
                        
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Shipping: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong><?=$total?></strong>
                            </p>
                            <p>
                                <strong>8</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center"><h4><strong><?=$row['total']?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <h1 style="text-align:center;">
                        Thank you for your order.
                    </h1>
                    
                </div>
            </div>
        </div>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>	