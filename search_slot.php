<?php
	session_start();

	//include 'dbconnection.php';


	if (strlen($_SESSION['id'] == 0)) {
		header('location:logout.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Parking Slot Search</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

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
                        <h1>Search Parking Slot</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="search_slot.php">Dashboard</a></li>
                            <li><a href="search_slot.php">Search parking Slots</a></li>
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
                                <strong class="card-title">Search Slots</strong>
                            </div>

<form name="search" method="post" style="padding-top: 20px" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                   
                                   
                                       <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Search by Street Id</strong></label>
                                                        <div class="col-6">
                                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                                        </div>
                                                    </div> 

                                                   <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="search" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Search
                                                        </button></p>
                                                        
                                                    </div>
                                                    </div> 
                                    
       </form>


<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 


                                                       <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>#</th>
                  <?php
                  function queryAll($sql)
                   {
                        $con=getCon();
                        $result=mysqli_fetch_all(runQuery($con, $sql),MYSQLI_ASSOC);
                        mysqli_close($con);
                        return $result;
                   }
                  function getParkingSlot()
                  {
                        $sql='SELECT a.id AS slot_id,a.slot_name,a.street_id,b.street_name,b.town_id,c.town_name,a.created_by AS worker_id,CONCAT(d.first_name," ",d.last_name) AS worker_name 
                    FROM parking_slot a LEFT JOIN street b ON a.street_id=b.id
                    LEFT JOIN town c ON b.town_id=c.id 
                    LEFT JOIN worker d ON a.created_by=d.id WHERE a.is_deleted=0';
                        return  queryAll($sql);
                  }
                  $data = getParkingSlot();
                    foreach ($data[0] as $key => $value) {
                    {
                        $sql='SELECT a.id AS slot_id,a.slot_name,a.street_id,b.street_name,b.town_id,c.town_name,a.created_by AS worker_id,CONCAT(d.first_name," ",d.last_name) AS worker_name 
                    FROM parking_slot a LEFT JOIN street b ON a.street_id=b.id
                    LEFT JOIN town c ON b.town_id=c.id 
                    LEFT JOIN worker d ON a.created_by=d.id WHERE a.is_deleted=0';
                        return  queryAll($sql);
                    }

                    foreach ($data[0] as $key => $value) {
//                       ?><th><?= $key; ?></th><?php
                    }
                  ?>
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"SELECT * FROM parking_slot WHERE street_id = '$street_id'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
$row=mysqli_fetch_array($ret);
foreach  ($data as $row) {
} {
    ?>
            
                <tr>
                  <td><?= $cnt;?></td>
                  
                  <?php
                    foreach ($data as $value) {
                        ?><td><?=$value;?></td><?php
                    }
                  
                  ?>
                  <td><a href="view-slot-detail.php?upid=<?php echo $row['id'];?>">View Details</a></td>
                </tr>
                 <?php 
$cnt=$cnt+1;
}   ?>
                <?php else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
   <?php include 'bottom-link.php'; ?>

</body>
</html>