<?php
	session_start();

	include 'dbconnection.php';


	if (strlen($_SESSION['id'] == 0)) {
		header('location:logout.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Parking Slot Search</title>
        <?php        include 'header-links.php'; ?>

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
                            <li><a href="search_street.php">Dashboard</a></li>
                            <li><a href="search_street.php">Search Streets</a></li>
                            <li class="active">Streets</li>
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
                                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Search  street</strong></label>
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
                  <th>town_id</th>
                  <th>street_name</th>
                  <th>created_by</th>
                  <th>is_deleted</th>  
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$ret=mysqli_query($con,"select * from street ");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    ?>
              
                <tr>
                  <td><?= $cnt;?></td>
            
                  <?php 
                                                foreach ($row as $key=> $value) {
                                                    ?><td><?=$value;?></td><?php
                                                }
                                                ?>
                  
                  <td><a href="view-street-detail.php?upid=<?php echo $row['id'];?>">View Details</a></td>
                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include 'bottom-link.php'; ?>

</body>
</html>
<?php/* } */ ?>
