<?php
session_start();
error_reporting(0);
include('library.php');
$sql='SELECT a.id AS town_id,a.town_name,a.created_by AS worker_id,CONCAT(b.first_name," ",b.last_name) AS worker_name,a.created_date,
(CASE WHEN a.is_deleted=0 THEN "Active" WHEN a.is_deleted=1 THEN "Inactive" END) AS town_status FROM town a
LEFT JOIN worker b ON a.created_by=b.id';
$towns=  queryAll($sql);
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
        <?php include_once('../header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Towns</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="manage-town.php">Dashboard</a></li>
                            <li><a href="manage-town.php">New Towns</a></li>
                            <li class="active"> Towns</li>
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
                                <strong class="card-title">New Towns</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                <th>town_id</th>
                  <th>town_name</th>
                  <th>worker_id</th> 
                  <th>worker_name</th>
                 <th>created_date</th>
                 <th>town_status</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
foreach ($towns as $row) {

?>
                <tr>
             <td><?php  echo $row['town_id'];?></td>
             <td><?php  echo $row['town_name'];?></td>
                  <td><?php  echo $row['worker_id'];?></td>
                  <td><?php  echo $row['worker_name'];?></td>
                  <td><?php  echo $row['created_date'];?></td>
                  <td><?php  echo $row['town_status'];?></td>


                 
                  <td ><a href="view-town-detail.php?upid=<?php echo $row['cnt'];?>">Update</a>
                </tr>
                <?php 
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