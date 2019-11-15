<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
<?php

$user=$_SESSION['login'];
$ret=mysqli_query($con,"select  username from customer where username='$user'");
$row=mysqli_fetch_array($ret);
/*
$user_name=$row['user_name'];
*/
?>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a class="navbar-brand" href="welcome.php">CUSTOMER | <?php echo $user; ?></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href=""> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>




 <li class="menu-item-has-children dropdown">
                        <a href="add-slots.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Parking Slots</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!--<li><i class="fa fa-user"></i><a href="add-slots.php">Add Slots</a></li>
                            <li><i class="fa fa-user"></i><a href="manage-newusers.php">Manage New Slots</a>
                            </li>-->
                            <li><i class="fa fa-user"></i><a href="manage-oldslots.php">View Old Slots</a>
                            </li>
                          
                        </ul>
                    </li>
                    
    
<li class="active">
                        <a href="search_slot.php"> <i class="menu-icon fa fa-search"></i>Search </a>
                    </li>
  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a href="bwdates-report-ds.php">Between Dates Report</a></li>
                           
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>