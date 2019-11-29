<?php
session_start();
error_reporting(0);
include('../dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['id']==0)) {
  header('location:../logout.php');
  } else{


  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Worker Reports</title>
    <?php include 'header-links.php'; ?>
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
                        <h1>Between Dates Reports</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="welcome.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Between Dates Reports</a></li>
                            <li class="active">Reports</li>
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
                            <div class="card-header"><strong>Between Dates</strong><small> Reports</small></div>
                            <form name="bwdatesreport"  action="bwdates-reports-details.php" method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">From Date</label><input type="date" name="fromdate" id="fromdate" class="form-control" required="true"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">To Date</label><input type="date" name="todate"  class="form-control" required="true"></div>
                                        
                                                    </div>
                                                   
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <?php include 'bottom-links.php';?>
</body>
</html>
<?php }  ?>