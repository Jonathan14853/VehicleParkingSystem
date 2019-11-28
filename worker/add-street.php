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
    

    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



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
                                       /*while($row=  mysqli_fetch_assoc($town_res))
                                       {
                                           ?><option value="<?=$row['id'];?>" ><?=$row['town_name'];?></option><?php
                                       }*/
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


                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
</body>
</html>