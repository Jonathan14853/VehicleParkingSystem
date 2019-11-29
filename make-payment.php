<?php
include 'customer-library.php';
$payment= getPayment();
if(isset($_POST["submit"]))
{
    $reference_code=$_SESSION['id'];
    //$reference_code = $_POST['reference_code'];
    $amount= $_POST['amount'];
    $transaction_number = $_POST["transaction_number"];
    $result = insertPayment($amount,$transaction_number,$reference_code);
    
    if($result)
    {
        echo "<script>alert('Payment Detail has been added')</script>";
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
    
    <title>Payment Details</title>
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
                        <h1>Payment Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="make-payment.php">Dashboard</a></li>
                            <li><a href="make-payment.php">Payment Detail</a></li>
                            <li class="active">Payment</li>
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
                                    <label for="company" class=" form-control-label">Amount</label>
                                    <input type="text" name="amount" value="" class="form-control" id="transaction_number" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Transaction Number</label>
                                    <input type="text" name="transaction_number" value="" class="form-control" id="transaction_number" required="true">
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
                                                            <i class="fa fa-dot-circle-o"></i>  Pay
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

                                <?php include 'bottom-link.php'; ?>
</body>
</html>