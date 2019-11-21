<?php
session_start();
error_reporting(0);
include('../dbconnection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $id=$_SESSION['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact = $_POST['contact'];
  
     $query=mysqli_query($con, "update profile set name='$name', email ='$email', $contact= '$contact' where id='$id'");
    if ($query) {
    $msg="Worker profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Worker Profile</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Staff Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="worker-profile.php">Staff Profile</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Staff</strong><small> Profile</small></div>
                            <form name="profile" method="post" action="">
                                <p style="font-size:16px; color:red" align="center">
                                    <?php if($msg){
                                        echo $msg;
                                      }  
                                    ?> 
                                </p>
                            <div class="card-body card-block">
 <?php
$id=$_SESSION['id'];
$ret=mysqli_query($con,"select * from profile where id='$id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Name</label>
                                        <input type="text" name="name" value="<?php  echo $row['name'];?>" class="form-control" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">email</label>
                                    <input type="text" name="email" value="<?php  echo $row['email'];?>" class="form-control" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Contact Number</label>
                                    <input type="text" name="contact" value="<?php  echo $row['contact'];?>"  class="form-control" maxlength='10' required='true'>
                                </div>
                                <div class="row form-group">
                                                <div class="col-12">
                                                     <div class="card-footer">
                                                       <p style="text-align: center;">
                                                            <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                                <i class="fa fa-dot-circle-o"></i> Update
                                                            </button>
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
</body>
</html>
<?php }  ?>