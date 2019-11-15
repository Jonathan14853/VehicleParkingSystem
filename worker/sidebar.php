<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
<?php
$user=$_SESSION['login'];
$ret=mysqli_query($con,"select username from worker where username='$user'");
$row=mysqli_fetch_array($ret);
/*$user = $row['user'];*/
/*$first_name = $row['first_name'];*/
/*$slot_name=$row['SlotName'];*/

?>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a class="navbar-brand" href="dashboard.php">STAFF| <?php echo $user; ?></a>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="welcome.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>




 <li class="menu-item-has-children dropdown">
                        <a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Slots</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="add-slots.php">Add Slot</a></li>
                            <li><i class="fa fa-user"></i><a href="manage-newslots.php">Manage New Slots</a>
                            </li>
                            <li><i class="fa fa-user"></i><a href="../manage-oldslots.php">View Old Slots</a>
                            </li>
                          
                        </ul>
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