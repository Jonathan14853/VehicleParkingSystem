<?php
include('customer-library.php');
$title=$_GET['title'];
switch ($title) {
    case 'town':
        $data= getTown();
        break;
    case 'street':
        $data= getStreet();
        break;
    case 'slot':
        $data= getParkingSlot();
        break;
    case 'payment':
        $data = getPayment();
    default:
        $title="street";
        $data= getStreet();
        break;
}
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$title;?></title>
<?php include 'header-links.php'; ?>
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
                        <h1><?=$title;?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#"><?=$title;?></a></li>
                            <li class="active"> <?=$title;?></li>
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
                                <strong class="card-title"><?=$title;?></strong>
                            </div>
                            <div class="card-body">
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <?php
            foreach ($data[0] as $key => $value) {
                ?><th><?= $key; ?></th><?php
                }
                ?>
            <th>Action</th>
        </tr>
    </thead>
    <?php
    $cnt = 1;
    foreach ($data as $row) {
        
    } {
        ?>
        <tr>
            <td><?= $cnt; ?></td>
            <?php
            foreach ($row as $value) {
                ?><td><?= $value; ?></td><?php
            }
            ?>
            <td ><a href="view-<?=$title;?>-detail.php?upid=<?=$row['id']; ?>">view</a>
        </tr>
        <?php
        $cnt = $cnt + 1;
    }
    ?>
</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->
<php include 'bottom-link.php';?>
</body>
</html>
