<?php
include 'library.php';
$town= getTown();
if(isset($_POST["submit"]))
{
    $id=$_SESSION['id'];
    $town_id = $_POST['town_id'];
    $street_name = $_POST["street_name"];
    $result = insertStreet($town_id,$street_name,$id);
    
    if($result)
    {
        echo "<script>alert('Street Detail has been added')</script>";
    }
    else 
    {
        echo "<script>alert('Something went wrong.Please try again!')</script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Town Details</title>
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
                        <h1>Street Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="add-street.php">Dashboard</a></li>
                            <li><a href="add-street.php">Street Detail</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header"><strong>Street</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Town ID</label>
                                    <select name="town_id" class="form-control">
                                       <?php
                                       foreach ($town as $value)
                                       {
                                           ?><option value="<?=$value['town_id']?>"><?=$value['town_name'];?></option>
                                       <?php
                                       }
                                       ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Street Name</label>
                                    <input type="text" name="street_name" value="" class="form-control" id="street_name" required="true">
                                </div>
                                                    
                                <?php

                                ?>  
                                                    </select></div>
                                                    </div>
                                                    </div>
                                                
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->

                                <?php include 'bottom-links.php'; ?>
</body>
</html>