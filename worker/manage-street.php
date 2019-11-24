<?php
session_start();
error_reporting(0);
include('../dbconnection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
   


  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>Streets</title>
   

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
                        <h1>New Streets</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="manage-street.php">Dashboard</a></li>
                            <li><a href="manage-street.php">New Streets</a></li>
                            <li class="active"> Streets</li>
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
                                <strong class="card-title">New Streets</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                    <th>#</th>
                    <th>street_id</th>
                     <th>town_id</th>
                  <th>town_name</th>
                  <th>street_name</th>
                  <th>worker_name</th>
                  <th>created_date</th> 
                 <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
                                    $sql='SELECT a.id AS street_id,a.town_id,b.town_name,a.street_name,CONCAT(c.first_name," ",c.last_name) AS worker_name,a.created_date
FROM street a LEFT JOIN town b ON a.town_id=b.id 
LEFT JOIN worker c ON a.created_by=c.id WHERE a.is_deleted=0';
$ret=mysqli_query($con,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?=$cnt;?></td>
             <td><?=$row['street_id'];?></td>
             <td><?=$row['town_id'];?></td>
             <td><?=$row['town_name'];?></td>
             <td><?=$row['street_name'];?></td>
             <td><?=$row['worker_name'];?></td>
             <td><?=$row['created_date'];?></td>
                  <td ><a href="view-street-detail.php?upid=<?php echo $row['id'];?>">Update</a>
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


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
<?php }  ?>