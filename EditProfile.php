<?php
session_start();
include "dbconnect.php";

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");





if(isset($_POST['submit']))
{
   
        $username = $_SESSION['user'];     
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $phonenum = $_POST['phoneNum'];
        $email = $_POST['email'];
        $nickname = $_POST['nickname'];

        
          $query ="UPDATE users SET Fullname = '$fullname',address = '$address',phoneNum = '$phonenum', email = '$email', nickName = '$nickname' WHERE UserName = '$username'";
          $result=mysqli_query($con,$query);
          header("Location: profile.php?Message=" . "Successfully update!!");
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
      <div class="container-fluid" style="background-color:white">
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
        
            echo' <li> <a href="profile.php" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>; 
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
               
   $username = $_SESSION['user'];
        $query = "SELECT * from users where UserName ='$username'";
        $result = mysqli_query($con,$query);
        if($result)
          $row = mysqli_fetch_assoc($result);
?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>    
  <br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-xs-12 col-sm-9">
    <form class="form-horizontal" action="EditProfile.php" method="POST">
        

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">User info</h4>
        </div>
        <div class="panel-body">
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Nick Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nickname" value="<?=$row['nickName']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" value="<?=$row['Fullname']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" value="<?=$row['address']?>">
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contact info</h4>
        </div>
        <div class="panel-body">
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Mobile number</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" name="phoneNum" value="<?=$row['phoneNum']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail address</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" value="<?=$row['email']?>">
            </div>
          </div>
        </div>
      </div>
       <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <a href="profile.php"><button type="button" class="btn btn-default">Cancel</button></a>
            </div>
          </div>
      
    </form>
  </div>
</div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>	