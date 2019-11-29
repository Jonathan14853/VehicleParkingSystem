<?php
include 'library.php';
$street = getStreet();
   if(isset($_POST['submit']))
  {
       $id = $_SESSION['id'];
      $town_id=$_POST['town_id'];
      $street_name=$_POST['street_name'];
      $created_by=$_POST['created_by'];
      $is_deleted=$_POST['is_deleted'];
    

      
   $query=mysqli_query($con, "UPDATE  street SET town_id='$town_id',street_name='$street_name',created_by='$created_by',is_deleted='$is_deleted'");
    if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-old-street.php'</script>";
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
    <title>New Streets</title>
    <?php    include 'header-links.php'; ?>
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
                        <h1>View Streets</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="view-street-detail.php">Dashboard</a></li>
                            <li><a href="view-street-detail.php">View Streets</a></li>
                            <li class="active">Streets</li>
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
                            <div class="card-header"><strong>View</strong><small> Streets</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 #$cid=$_GET['upid'];
$ret=mysqli_query($con,"select * from street where town_id='$town_id'");
$cnt=1;
$row=mysqli_fetch_array($ret); 
foreach ($data as $row){
?>                       <table border="1" class="table table-bordered mg-b-0">
   
                                <tr>
                                    <td><?=$cnt;?></td>
                                    <?php
                                                                                                foreach($row as $value) {
                                                                                                    ?><td><?=$value;?></td><?php
                                                                                              }
                                                                                                ?>
                                </tr>
                  
         <?php  
if($row['town_name']=="")
{
  echo "Not Updated Yet";
}


     ;?>
   </td>
  </tr>
</table>
          </div>                           
        </div>
        </table>
<table class="table mb-0">

<?php if($row['town_id']==""){ ?>
<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Town Id :</th>
    <td><input type="text" name="town_id" id="town_id" class="form-control" required="true"></td>
  </tr>

  <tr>
    <th>Street Name :</th>
    <td><input type="text" name="street_name" id="street_name" class="form-control" required="true" ></td>
  </tr>
  <tr>
    <th>Created By :</th>
    <td><input type="text" name="created_by" id="created_by" class="form-control" required="true" ></td>
  </tr>
  <tr>
    <th>Is_Deleted :</th>
    <td><input type="text" name="is_deleted" id="is_deleted" class="form-control" required="true" ></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button></td>
  </tr>
  </form>
<?php } else {
     foreach ($row as $value){
         ?><td><?=$value;?></td><?php
     }
}
    
?>

                                            </div>

                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
<?php include 'bottom-links.php'; ?>
</body>
</html>
<?php } ?>