<?php
session_start();
error_reporting(-1);
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  }
function getCon()
{
  return mysqli_connect('localhost','root','','VehicleParkingSystem');  
}
function queryAll($sql)
{
    $con=getCon();
    $result=mysqli_fetch_all(runQuery($con, $sql),MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
function insertStreet($town_id,$street_name,$id) 
{
    $con = getCon();
    $sql = "INSERT INTO street(town_id,street_name,created_by) VALUES($town_id,'$street_name',$id)"; 
    $result = runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function getStreet()
{
    $sql='SELECT a.id AS street_id,a.town_id,b.town_name,a.street_name,CONCAT(c.first_name," ",c.last_name) AS worker_name,a.created_date
        FROM street a LEFT JOIN town b ON a.town_id=b.id 
        LEFT JOIN worker c ON a.created_by=c.id WHERE a.is_deleted=0';
        return  queryAll($sql);
}
function insertTown($town_name,$id) 
{
    $con = getCon();
    $sql = "INSERT INTO town(town_name,created_by) VALUES('$town_name','$id')";
    $result = runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function getTown()
{
    $sql='SELECT a.id AS town_id,a.town_name,a.created_by AS worker_id,CONCAT(b.first_name," ",b.last_name) AS worker_name,a.created_date,
(CASE WHEN a.is_deleted=0 THEN "Active" WHEN a.is_deleted=1 THEN "Inactive" END) AS town_status FROM town a
LEFT JOIN worker b ON a.created_by=b.id';
    
        return  queryAll($sql);
}
function runQuery($con,$sql)
{
    return mysqli_query($con, $sql);
}
function insertSlot($street_id,$slot_name,$worker)
{
    $con=getCon();
    $sql="INSERT INTO parking_slot(street_id,slot_name,created_by) VALUES($street_id,'$slot_name',$worker)";
    $result=runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function selectSlot() {
    $con = getCo();
    $sql = "SELECT * FROM parking_slot WHERE is_deleted=0";
    $result = runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function getParkingSlot()
{
    $sql='SELECT a.id AS slot_id,a.slot_name,a.street_id,b.street_name,b.town_id,c.town_name,a.created_by AS worker_id,CONCAT(d.first_name," ",d.last_name) AS worker_name 
FROM parking_slot a LEFT JOIN street b ON a.street_id=b.id
LEFT JOIN town c ON b.town_id=c.id 
LEFT JOIN worker d ON a.created_by=d.id WHERE a.is_deleted=0';
    return  queryAll($sql);
}
