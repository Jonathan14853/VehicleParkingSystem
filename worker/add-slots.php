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
 $street_id=$_POST['street_id'];
$slot_name=$_POST['slot_name'];
$status=$_POST['status'];
$street_id=mt_rand(1000, 9999);

 $query=mysqli_query($con,"INSERT INTO parking_slot(street_id,slot_name,status) VALUES('$street_id','$slot_name','$status'");

    if ($query) {
echo '<script>alert("Slot Detail has been added.")</script>';
echo "<script>window.location.href ='add-slots.php'</script>";

  }
  else
    {
 echo '<script>alert("Something Went Wrong. Please try again.")</script>';       
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Parking Slot Details</title>
    

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
        <?php include_once('../header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Slot Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="add-slots.php">Dashboard</a></li>
                            <li><a href="add-slots.php">Slot Detail</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header"><strong>Slot</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Street ID</label>
                                        <input type="text" name="street_id" value="" class="form-control" id="street_id" required="true">
                                </div>
                                                                          
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Slot Name</label>
                                                <textarea type="text" name="uadd" value="" id="uadd" class="form-control" required="true"></textarea>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col-12">

                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="city" class=" form-control-label">Status</label>
                                                            <input type="text" name="status" id="status" value="" class="form-control" required="true">
                                                    </div>
                                                    </div>
                                                    
                                <?php
                                /* $query=mysqli_query($con,"select * from  tblcomputers");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ComputerName'];?>"><?php echo $row['ComputerName'];?></option>
                  <?php } */
                  ?>  
                                                    </select></div>
                                                    </div>
                                                    </div>
                                                
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button></p>
                                                        
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