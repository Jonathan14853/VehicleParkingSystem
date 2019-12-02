<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
<?php

$user=$_SESSION['login'];

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
<li class="active">
                        <a href="search_town.php"> <i class="menu-icon fa fa-search"></i>Search Town </a>
                    </li>

<li class="active">
                        <a href="search_street.php"> <i class="menu-icon fa fa-search"></i>Search Street </a>
                    </li>

<li class="active">
    <a href="manage-search.php?title=slot"> <i class="menu-icon fa fa-search"></i>Search Slot </a>
                    </li>



 <li class="menu-item-has-children dropdown">
                        <a href="add-slots.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-car"></i>Parking Slots</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="manager.php?title=slot">View Slots</a>
                            </li>
                          
                        </ul>
                    </li>
 </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-car"></i>Parking</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-car"></i><a href="park.php">Park</a></li>
                           
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-usd"></i>Payment</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-usd"></i><a href="make-payment.php">make Payment</a></li>
                            <li><i class="menu-icon fa fa-usd"></i><a href="manager.php?title=payment">Payment</a></li>
                           
                        </ul>
                    </li>
  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a href="bwdates-report-ds.php">Between Dates Report</a></li>
                           
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </aside>