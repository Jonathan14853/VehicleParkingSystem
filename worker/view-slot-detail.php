<?php
include 'library.php';
$slot = getParkingSlot();
   if(isset($_POST['submit']))
  {
    
      $street_id=$_POST['street_id'];
      $slot_name = $_POST['slot_name'];
      $created_by=$_POST['created_by'];
    
   $result = selectSlot();
    if ($result) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-old-town.php'</script>";
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
    
    <title>Streets</title>
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
                        <h1>View Towns</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="view-town-detail.php">Dashboard</a></li>
                            <li><a href="view-town-detail.php">View Towns</a></li>
                            <li class="active">Towns</li>
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
                            <div class="card-header"><strong>View</strong><small> Towns</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> 
                                  <?php 
                                    if($msg){
                                      echo $msg;
                                    }  
                                  ?> 
                                </p>
                            <div class="card-body card-block">
 <?php
$cnt=1;
foreach ($data as $row){

?>                       <table border="1" class="table table-bordered mg-b-0">
   
    <tr>
        <td><?=$cnt;?></td>
        <?php foreach ($row as $value) {
            ?><td><?=$value;?></td><?php
                    }
                    ?>
    </tr>

<?php  
if($row['created_by']=="")
{
  echo "Not Updated Yet";
}

     ;?></td>
  </tr>
</table>
                                <?php $cnt = $cnt + 1; ?>
                                                    </div>
                                                    
<table class="table mb-0">

<?php if($row['town_name']==""){ ?>
<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
<th>Town Name </th>
<td>
  <input type="text" name="town_name" id="town_name" class="form-control wd-450" >
</td>
</tr>

<tr>
<th>Created By </th>
<td>
  <input type="text" name="created_by" id="created_by" class="form-control wd-450" >
</td>
</tr>


  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i> Update</button>
    </td>
  </tr>
  </form>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>TownName</th>
    <td><?php echo $row['TownName']; ?></td>
  </tr>

<?php } ?>
</table>

<?php } ?>

                                            </div>

                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
<?php include 'bottom-links.php';?>
</body>
</html>
