<?php
session_start();
include "dbconnect.php";

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}

if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $query = "SELECT * from users where UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con,$query)or die(mysql_error());
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             print'
                <script type="text/javascript">alert("successfully logged in!!!");</script>
                  ';
        }
        else
        {    print'
              <script type="text/javascript">alert("Incorrect Username Or Password!!");</script>
                  ';
        }
  }
  else if($_POST['submit']=="Alogin")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        
        if($username=='admin' && $password=='admin')
        {
             
             $_SESSION['admin']='admin';
             print'
                <script type="text/javascript">alert("successfully logged in!!!");</script>
                  ';
            header("Location: AIndex.php");
        }
        else
        {    print'
              <script type="text/javascript">alert("Incorrect Username Or Password!!");</script>
                  ';
        }
  }
  else if($_POST['submit']=="register")
  {
        $username=$_POST['register_username'];
        $password=$_POST['register_password'];
        $query="select * from users where UserName = '$username'";
        $result=mysqli_query($con,$query) or die(mysql_error);
        if(mysqli_num_rows($result)>0)
        {   
               print'
               <script type="text/javascript">alert("username is taken");</script>
                    ';

        }
        else
        {
          $query2 ="INSERT INTO users (UserName,Password)VALUES ('$username','$password')";
          $result=mysqli_query($con,$query2);
          print'
                <script type="text/javascript">
                 alert("Successfully Registered!!!");
                </script>
               ';
        }
  }
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
      <div class="container-fluid" style="background-color: white;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
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
        if(!isset($_SESSION['user']))
          {
            echo'
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#Alogin">
                ADMIN LOGIN</button>
                  <div id="Alogin" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Login Form</h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="username">Username</label>
                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="Alogin" class="btn btn-block">
                                                      Sign in
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
            </li>
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Login</button>
                  <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Login Form</h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="username">Username</label>
                                                  <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="password">Password</label>
                                                  <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Sign in
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
            </li>
            <li>
              <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Sign Up</button>
                <div id="register" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title text-center">Member Registration Form</h4>
                          </div>
                          <div class="modal-body">
                                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Sign Up
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
            </li>';
          } 
        else
          {   echo' <li> <a href="profile.php" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
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
      <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
          </div>
      </div>

      <div class="container-fluid" id="header">
          <div class="row">
              <div class="col-md-3 col-lg-3" id="category">
                  <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
                  <ul>
                      <li> <a href="Product.php?value=Computer%20Science"> Computer Science </a> </li>
                      <li> <a href="Product.php?value=Accounting"> Accounting </a> </li>
                      <li> <a href="Product.php?value=Financial"> Financial </a> </li>
                      <li> <a href="Product.php?value=Business%20And%20Law"> Business And Law </a> </li>
                      <li> <a href="Product.php?value=Matematical"> Mathematical </a> </li>
                      <li> <a href="Product.php?value=Language"> Language </a> </li>
                      <li> <a href="Product.php?value=Religion"> Religion </a> </li>
                      

                  </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                          <li data-target="#myCarousel" data-slide-to="3"></li>
                          
                      </ol>
                      
                        <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img class="img-responsive" src="img/carousel/10.jpeg">
                          </div>

                          <div class="item">
                            <img class="img-responsive "src="img/carousel/11.jpeg">
                          </div>

                          <div class="item">
                            <img class="img-responsive" src="img/carousel/12.jpeg">
                          </div>

                          <div class="item">
                            <img class="img-responsive"src="img/carousel/13.jpg">
                          </div>

                          
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-lg-3" id="offer">
                  <a href="Product.php?value=Language">              <img class="img-responsive center-block" src="img/offers/1.png"></a>
                  <a href="Product.php?value=Health%20and%20Cooking">        <img class="img-responsive center-block" src="img/offers/2.png"></a>
                  <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block" src="img/offers/3.png"></a>
              </div>
          </div>
      </div>
  </div>

  <div class="container-fluid text-center" id="new">
      <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=CS-4">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="book block-center img-responsive" src="img/new/CS-4.jpg">
                  <hr>
                  Big Data Analytic and Evaluation of the Organisational Goals - Penerbit UiTM <br>
                  RM 23  &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 23 </span>
                  <span class="label label-warning">0%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=CS-1">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/CS-1.jpg">
                  <hr>
                  Quantitative Data Analysis in Communication Research 2nd Edition - Penerbit UiTM
  <br>
                  RM 43 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 43 </span>
                  <span class="label label-warning">0%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=MATH-12">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/MATH-12.jpg">
                  <hr>
                  Kalkulus Untuk Pelajar Diploma Sains dan Kejuruteraan - Penerbit UiTM
 <br>
                  RM 45 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 45 </span>
                  <span class="label label-warning">0%</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
           <a href="description.php?ID=REL-1">
              <div class="book-block">
                  <div class="tag">New</div>
                  <div class="tag-side"><img src="img/tag.png"></div>
                  <img class="block-center img-responsive" src="img/new/REL-1.jpg">
                  <hr>
                  Islamic Performing Arts: An Artistic Discourse - Penerbit UiTM
 <br>
                  RM 43 &nbsp
                  <span style="text-decoration:line-through;color:#828282;"> 43 </span>
                  <span class="label label-warning">0%</span>
              </div>
            </a>
          </div>
      </div>
  </div>

  <div class="container-fluid" id="author">
      <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3" style="text-align: center;">
              <a href="Author.php?value=HOE%20FOO%20TERNG"><img class="img-responsive center-block" src="img/popular-author/HOE FOO TERNG.jpeg"></a>HOE FOO TERNG
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3" style="text-align:center;">
              <a href="Author.php?value=TEH%20HONG%20SIOK"><img  class="img-responsive center-block" src="img/popular-author/TEH HONG SIOK.jpg"></a>TEH HONG SIOK
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3" style="text-align:center;">
              <a href="Author.php?value=MOK%20SOON%20SIM"><img width="130px" height="130px" class="img-responsive center-block" src="img/popular-author/MOK SOON SIM.jpg"></a>MOK SOON SIM
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3"style="text-align:center;">
              <a href="Author.php?value=Tang Howe Eng"><img width="120px" height="120px" class="img-responsive center-block" src="img/popular-author/Tang Howe Eng.jpg"></a>Tang Howe Eng
          </div>
      </div>
      <div class="row">
          <div class="col-sm-5 col-md-3 col-lg-3"style="text-align:center;">
              <a href="Author.php?value=Adriana Shamsudin"><img class="img-responsive center-block" src="img/popular-author/Adriana Shamsudin.jpg"></a>Adriana Shamsudin
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3"style="text-align:center;">
              <a href="Author.php?value=NURAISYAH CHUA ABDULLAH"><img class="img-responsive center-block" src="img/popular-author/NURAISYAH CHUA ABDULLAH.jpeg"></a>NURAISYAH CHUA ABDULLAH
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3"style="text-align:center;">
              <a href="Author.php?value=MAHERAN ZAKARIA"><img class="img-responsive center-block" src="img/popular-author/MAHERAN ZAKARIA.jpeg"></a>MAHERAN ZAKARIA
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3" style="text-align:center;">
              <a href="Author.php?value=NORHAZLINA HUSIN"><img width="120px" height="120px" class="img-responsive center-block" src="img/popular-author/NORHAZLINA HUSIN.jpeg"></a>NORHAZLINA HUSIN
          </div>
      </div>
  </div>

<?php include('footer.php') ?>

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