<?php
session_start();
error_reporting(0);
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
    $result=mysqli_fetch_all(mysqli_query($con, $sql),MYSQLI_ASSOC);
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
function getTown()
{
    $sql='SELECT a.id AS town_id,a.town_name,a.created_by AS worker_id,CONCAT(b.first_name," ",b.last_name) AS worker_name,a.created_date,
(CASE WHEN a.is_deleted=0 THEN "Active" WHEN a.is_deleted=1 THEN "Inactive" END) AS town_status FROM town a
LEFT JOIN worker b ON a.created_by=b.id';
        return  queryAll($sql);
}
