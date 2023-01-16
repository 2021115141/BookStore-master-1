<?php
session_start();
if(!isset($_SESSION['admin']))
       header("location: index.php?Message=Login Admin To Continue");

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/my.css" type="text/css">

<body>
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
            <a class="navbar-brand" href="Aindex.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php
        
           echo' <li> <a href="AIndex.php" class="btn btn-lg"> Hello ADMIN</a></li>
                    
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
               
          
        ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id="top" >
      
<?php
include "dbconnect.php";

$query="select * from products"  ;
$result=mysqli_query($con,$query) or die(mysqli_error($con));;

    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;"> found  '. mysqli_num_rows($result) .' records </h4>
           </div>
        </div>';
        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/" .$row['PID'].".jpg";
            $description="UBook.php?ID=".$row["PID"];
            if($i % 3 == 0)  $offset= 0;
            else  $offset= 1; 
            if($i%3==0)
              echo '<div class="row">';?>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
                  <div id="<?=$row['PID']?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Update / Delete Form</h4>
                                 <h4 class="modal-title text-center"><?=$row["Title"]?> </h4>
                            </div>
                            <div class="modal-body">
                                          <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                              
                                              <div class="form-group">
                                                  <a href="UBook.php?ID=<?=$row['PID']?>">
                                                  <button type="button" onclick="if(confirm('Are you sure you want to update?'))return true; return false" class="btn btn-block">
                                                      Update
                                                  </button>
                                                </a>  

                                              </div>
                                              <div class="form-group">
                                                  <a  href="DBook.php?ID=<?=$row['PID']?>" >
                                                  <button type="button" onclick="if(confirm('Are you sure you want to delete?'))return true; return false" class="btn btn-block">
                                                      Delete
                                                 </button> 
                                                  </a>
                                                  
                                              </div>


                                          </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                  </div>

                  <?php
            
            echo'             
                <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-'.$offset.' col-lg-3 text-center w3-card-8 w3-dark-grey">
                    <div class="book-block">
                        <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#'.$row['PID'].'">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        </button>
                        <hr>
                         ' . $row["Title"] . '<br>
                        RM ' . $row["Price"] .'  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> RM' .$row["MRP"] .' </span>
                        <span class="label label-warning">'. $row["Discount"] .'%</span>
                    </div>
                </div>
                
                ';
            $i++;
            if($i%3==0)
            echo '</div>';
            }
        }
    echo '</div>';
?>


</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</html>		


</script>