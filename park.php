<?php
	session_start();

	include 'dbconnection.php';

	$user = $_SESSION['login'];
	$ret=mysqli_query($con,"select  username from customer where username='$user'");
	$row=mysqli_fetch_array($ret);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Parking</title>
	
	<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
	<?php
	include_once('customer_sidebar.php');
	?>

	<div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Parking</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="park.php">Dashboard</a></li>
                            <li><a href="park.php">Parking</a></li>
                            <li class="active">Park</li>
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
                                <strong class="card-title">New Parking Session</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                <th>id</th>                          
                  <th>plate_number</th>
                  <th>state</th> 
                  <th>created_by</th>
                  <th>is_deleted</th>
                 <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"select * from parking_session ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
             <td><?php  echo $row['plate_number'];?></td>
                  <td><?php  echo $row['state'];?></td>
                  <td><?php  echo $row['created_by'];?></td>
                  <td><?php  echo $row['is_deleted'];?></td>
                 
                  <td ><a href="view-park-detail.php?upid=<?php echo $row['id'];?>">Update</a>
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