<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
   


  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>CCMS New Users</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('customer_sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Slots</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="welcome.php">Dashboard</a></li>
                            <li><a href="#">New Slots</a></li>
                            <li class="active">New Slots</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">New Slots</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>ID</th>                              
                  <th>StreetID</th>
                  <th>SlotName</th> 
                  <th>Status</th>
                  <th>Created_By</th>
                  <th>Is_Deleted</th>
                 <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"select *from parking_slot ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>

             <td><?php  echo $row['street_id'];?></td>
                  <td><?php  echo $row['slot_name'];?></td>
                  <td><?php  echo $row['status'];?></td>
                  <td><?php  echo $row['created_by'];?></td>
                  <td><?php  echo $row['is_deleted'];?></td>
                 
                  <td ><a href="view-slot-detail.php?upid=<?php echo $row['ID'];?>">View</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php }  ?>