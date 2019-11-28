<?php

session_start();

error_reporting(0);

if(strlen($_SESSION['id'] == 0)) {
    header("location:logout.php");
}
function getCon() {
    return mysqli_connect('localhist', 'root', '', 'vehicleparkingsystem');
}
function queryAll() {
    $con = getCon();
    $result = mysqli_fetch_all(runQuery($con, $sql),MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}
function getTown()
{
    $sql='SELECT a.id AS town_id,a.town_name,a.created_by AS cutomer_id,CONCAT(b.first_name," ",b.last_name) AS customer_name,a.created_date,
(CASE WHEN a.is_deleted=0 THEN "Active" WHEN a.is_deleted=1 THEN "Inactive" END) AS town_status FROM town a
LEFT JOIN customer b ON a.created_by=b.id';
    
        return  queryAll($sql);
}
function getStreet()
{
    $sql='SELECT a.id AS street_id,a.town_id,b.town_name,a.street_name,CONCAT(c.first_name," ",c.last_name) AS customer_name,a.created_date
        FROM street a LEFT JOIN town b ON a.town_id=b.id 
        LEFT JOIN customer c ON a.created_by=c.id WHERE a.is_deleted=0';
        return  queryAll($sql);
}
function runQuery($con,$sql)
{
    return mysqli_query($con, $sql);
}
function getParkingSlot()
{
    $sql='SELECT a.id AS slot_id,a.slot_name,a.street_id,b.street_name,b.town_id,c.town_name,a.created_by AS customer_id,CONCAT(d.first_name," ",d.last_name) AS worker_name 
FROM parking_slot a LEFT JOIN street b ON a.street_id=b.id
LEFT JOIN town c ON b.town_id=c.id 
LEFT JOIN customer d ON a.created_by=d.id WHERE a.is_deleted=0';
    return  queryAll($sql);
}