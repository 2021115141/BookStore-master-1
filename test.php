<?php
session_start();
if(!isset($_SESSION['admin']))
       header("location: index.php?Message=Login Admin To Continue");
?>

<?php
include "dbconnect.php";
if(isset($_POST["submit"]))
{

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

if(file_exists($target_file)) {
    chmod($_FILES["fileToUpload"]["name"],0755); //Change the file permissions if allowed
    unlink($_FILES["fileToUpload"]["name"]); //remove the file
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("location: test.php?Message=Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $PID = $_GET['ID'];
    $title = $_POST['Title'];
    $querys ="UPDATE products SET Title = '$title'  WHERE PID = '$PID'";
    $results=mysqli_query($con,$querys);
    header("location: test.php?Message=congrats, done uploading your file.");
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    header("location: test.php?Message=Sorry, there was an error uploading your file.");
  }
}
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
            <a class="navbar-brand" href="index.php" style="padding: 1px;"><img class="img-responsive" alt="Brand" src="img/logo.png"  style="width: 147px;margin: 0px;"></a>
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

$PID=$_GET['ID'];
$query = "SELECT Author FROM products";
$result=mysqli_query($con,$query) or die(mysqli_error($con));;
$row = mysqli_fetch_all($result);
print_r($row);
    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;">Update Record of '. $row['Title'] .' </h4>
           </div>
        </div>';
        if(mysqli_num_rows($result) > 0) 
        {   
            ?>
            
                <div class="tab-pane" id="edit">
                    <form action="test.php?ID=<?=$PID?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Title</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="Title" value="<?=$row['Title']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Author</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?=$row['Author']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Price (RM)</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?=$row['Price']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Available</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?=$row['Available']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change Picture</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="file" accept="image/*" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <a href="AIndex.php"><input type="button" class="btn btn-secondary" value="Cancel"></a>
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            
                <?php
        }
    echo '</div>';
?>


</body>
</html>		