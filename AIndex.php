<?php
session_start();
if(!isset($_SESSION['admin']))
       header("location: index.php?Message=Login admin To Continue");

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Online Bookstore</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
        <?php
        
           echo' <li> <a href="#" class="btn btn-lg"> Hello ADMIN</a></li>
                    
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
               
          
        ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  

  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard Admin<small> Data Overview</small></h1>
        <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
        <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      Use this boxes to see list of users and adding a books...
    </div>
    </div>
</div>
<?php
include "dbconnect.php";

$query="select * from users";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
?>
<div class="row">
  <a href="user.php">
    <div class="col-md-3">
        <div class="panel panel-default ">
            <div class="panel-body panel-tw panel-content">
                <div class="col-xs-5">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-5 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                    <p class="alerts-heading tex"><?=mysqli_num_rows($result) ?></p>
                    <p class="alerts-text tex">User</p>
                </div>
            </div>
        </div>
    </div>
  </a>
    <?php 
$pd="select * from products";
$rpd=mysqli_query($con,$pd) or die(mysqli_error($con));
    
    ?>
    <a href="books.php">
    <div class="col-md-3">
        <div class="panel panel-default ">
            <div class="panel-body panel-fb panel-content">
                <div class="col-xs-5">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-5 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                    <p class="alerts-heading tex "><?=mysqli_num_rows($rpd) ?></p>
                    <p class="alerts-text tex">Books</p>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="ABook.php">
    <div class="col-md-3">
        <div class="panel panel-primary ">
            <div class="panel-body panel-in panel-content">
                <div class="col-xs-5">
                    <i class="fa fa-plus-square-o fa-5x"></i>
                </div>
                <div class="col-xs-5 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                    <p class="alerts-heading tex "></p>
                    <p class="alerts-text tex">Adds Books</p>
                </div>
            </div>
        </div>
    </div>
    </a>
    <a href="BBook.php">
    <div class="col-md-3">
        <div class="panel panel-primary ">
            <div class="panel-body panel-tw panel-content">
                <div class="col-xs-5">
                    <i class="fa fa-bullhorn fa-5x"></i>
                </div>
                <div class="col-xs-5 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                    <p class="alerts-heading tex "></p>
                    <p class="alerts-text tex">Bought Products</p>
                </div>
            </div>
        </div>
    </div>
    </a>

</div>
</div>

<?php include("footer.php")?>

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Ask query</button>
  <!-- Modal -->
  <div class="modal fade" id="query" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ask your query here</h4>
          </div>
          <div class="modal-body">           
                    <form method="post" action="query.php" class="form" role="form">
                        <div class="form-group">
                             <label class="sr-only" for="name">Name</label>
                             <input type="text" class="form-control"  placeholder="Your Name" name="sender" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="email">Email</label>
                             <input type="email" class="form-control" placeholder="abc@gmail.com" name="senderEmail" required>
                        </div>
                        <div class="form-group">
                             <label class="sr-only" for="query">Message</label>
                             <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Your Query" required></textarea>
                        </div>
                        <div class="form-group">
                              <button type="submit" name="submit" value="query" class="btn btn-block">
                                                              Send Query
                               </button>
                        </div>
                    </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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