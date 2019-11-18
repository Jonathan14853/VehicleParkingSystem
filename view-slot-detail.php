<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    #$cid=$_GET['upid'];
      $street_id=$_POST['street_id'];
      $slot_name=$_POST['slot_name'];
      $status=$_POST['status'];
      $fees=$_POST['fees'];
    
   $query=mysqli_query($con, "update  parking_slot set Remark='$street_id',Status='$status',Fees='$fees' where ID='$cid'");
    if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-olduser.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
} 

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
                        <h1>View Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="view-slot-detail.php">Dashboard</a></li>
                            <li><a href="view-slot-detail.php">View Slots</a></li>
                            <li class="active">Slots</li>
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
                            <div class="card-header"><strong>View</strong><small> Slots</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 #$cid=$_GET['upid'];
$ret=mysqli_query($con,"select * from parking_slot where street_id='$street_id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>StreetID</th>
                                   <td><?php  echo $row['StreetID'];?></td>
                                   </tr>                             
<tr>
                                <th>SlotName</th>
                                   <td><?php  echo $row['SlotName'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>Status</th>
                                   <td><?php  echo $row['Status'];?></td>
                                   </tr>
                                   
                  
           
                     <tr>
       <th>In Time</th>
       <td><?php  echo $row['InTime'];?></td>
</tr>



    <tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}
if($row['Status']=="Out")
{
  echo "Check Out";
}

     ;?></td>
  </tr>
</table>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                </table>
<table class="table mb-0">

<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
<th>StreetID </th>
<td>
  <input type="text" name="street_id" id="street_id" class="form-control wd-450" >
</td>
</tr>

<tr>
<th>SlotName </th>
<td>
  <input type="text" name="slot_name" id="slot_name" class="form-control wd-450" >
</td></tr>

<tr>
<th>Fees </th>
<td>
  <input type="text" name="fees" id="fees" class="form-control wd-450" >
</td></tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Out">Check Out</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button></td>
  </tr>
  </form>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
   <tr>
    <th>Out Time</th>
    <td><?php echo $row['OutTime']; ?></td>
  </tr>

  
 <tr>
    <th>Fees</th>
    <td><?php echo $row['Fees']; ?></td>
  </tr>

<tr>
<th>Updation Date</th>
<td><?php echo $row['UpdationDate']; ?>  </td></tr>
<?php } ?>
</table>


  

  

<?php } ?>

                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>
