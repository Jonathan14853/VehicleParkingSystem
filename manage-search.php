<?php

include 'customer-library.php';

$title = $_GET['title'];

switch ($title) {
    case 'town':
        $data = getTown();
        break;
    case 'street';
        $data = getStreet();
        break;
    case 'slot';
        $data = getSlot();
        break;
    default :
        $title = "town";
        $data = getTown();
}
?>
<<html>
    <head>
        <title><?= $title; ?></title>
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
                        <h1>Search <?=$title;?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#"><?=$title?></a></li>
                            <li class="active"><?=$title?></li>
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
                                <strong class="card-title">Search <?=$title;?></strong>
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
                                                <?php
                                                                                                                                    foreach ($data[0] as $key => $value) {
                                                                                                                                        ?><th><?=$key; ?></th><?php

                                                                                                                                      }
                                                                                                                                ?>
                                                 <th>Action</th>
                                             </tr>
                                        </tr>
                                        </thead>
                                    <?php

$cnt=1;
$ret=mysqli_query($con,$sql);
$row=mysqli_fetch_array($ret);
foreach ($data as $row){
} {
    ?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <?php foreach ($row as $value) {
                                               ?><td><?=$value;?></td><?php
                                                }
                                                ?>
                  <td><a href="view-<?=$title;?>-detail.php?upid=<?php echo $row[$title.'_id'];?>">View Details</a></td>
                </tr>
                 <?php 
$cnt=$cnt+1;
 }  ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php  }?>

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
