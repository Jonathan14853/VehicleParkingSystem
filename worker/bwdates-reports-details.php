<?php
include 'library.php';
function getReport() {
    $sql = 'SELECT a.id as town_id,a.town_name,b.street_id,b.town_id,b.street_name,c.slot_id,c.street_id,c.slot_name,a.created_by AS worker_id,CONCAT(d.first_name," ",d.last_name) AS worker_name
            FROM town a LEFT JOIN street b ON a.street_id=bid
            LEFT JOIN slot c ON b.slot_id=c.id
            LEFT JOIN worker d ON a.created_by=d.id WHERE is_deleted=0';
      return queryAll($sql);
}
$report = getReport();
 ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>Reports</title>
    <?php include 'header-links.php'; ?>
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
                        <h1>View Slots</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Between Dates Reports</a></li>
                            <li class="active">Slots</li>
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
                                <strong class="card-title">View Slots</strong>
                            </div>
                            <div class="card-body">
<h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>StreetID</th>
            
                  <th>SlotName</th>
                      <th>Status</th>    
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"select * from parking_slot");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['StreetID'];?></td>
                  <td><?php  echo $row['SlotName'];?></td>
                  <td><a href="view-slot-detail.php?upid=<?php echo $row['ID'];?>">View Details</a></td>
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

