<?php
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/my.css" type="text/css">
<link rel="stylesheet" href="css/table.css" type="text/css">

<body>
<style>

        #books .row{margin-top:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}
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
            <?php if( isset($_SESSION['admin'])){?>
            <a class="navbar-brand" href="Aindex.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
            <?php }elseif(isset($_SESSION['user'])){?>
            <a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
        <?php }?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php
        if( isset($_SESSION['admin'])){
           echo' <li> <a href="AIndex.php" class="btn btn-lg"> Hello ADMIN</a></li>
                    
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
            }
        elseif (isset($_SESSION['user'])) {
            echo' <li> <a href="profile.php" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>;
                    <li> <a href="BBook.php" class="btn btn-lg"> My Purchase History </a> </li>;  
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
        }
          
        ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id="top" >
        
 <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zipcode</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
<?php
include "dbconnect.php";
$keyword='';
if (isset($_SESSION['admin'])) {
    $query="select * from receipt";
}
elseif (isset($_SESSION['user'])) {
    $customer = $_SESSION['user'];
    $query="select * from receipt WHERE Customer = '$customer'";
}

$result=mysqli_query($con,$query) or die(mysqli_error($con));

    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;"> found  '. mysqli_num_rows($result) .' records of Bought Products </h4>
           </div>
        </div>';

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
              ?>
           
                        <tbody>
                            <tr>
                                <td><?=$row["fullname"]?></td>
                                <td><?=$row["address"]?></td>
                                <td><?=$row["city"]?></td>
                                <td><?=$row["state"]?></td>
                                <td><?=$row["zipcode"]?></td>
                                <td><?=$row["phoneNum"]?></td>
                                <td><?=$row["email"]?></td>
                                <td><?=$row["total"]?></td>
                                <td><a href="receipt.php?ID=<?=$row['id']?>"><button type="button">VIEW RECEIPT</button></a></td>
                            </tr>                       
            <?php
            }

        }

    echo '</div>';
?>
</tbody>
                    </table>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<?php include("footer.php")?>





</body>
</html>		