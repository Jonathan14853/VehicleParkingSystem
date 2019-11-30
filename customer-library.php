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
/*function getTown()
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
}*/
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
function insertPayment() {
    $con = getCon();
$sql = "INSERT INTO payment(amount,transaction_number,refence_code,created_by) VALUES('$amount','$transaction_number','$reference_code')";
    $result = runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function getPayment() {
    $sql = 'SELECT a.id AS payment_id,a.reference_code,a.transaction_number,a.amount,b.street_id,b.slot_name,c.town_id,c.street_name,d.town_name,
            a.created_by AS customer_id,CONCAT(e.first_name," ",e.last_name) AS customer_name
            FROM payment a LEFT JOIN town b ON a.reference_code=b.id
            LEFT JOIN street c ON b.street_id=c.id
           LEFT JOIN slot d ON c.town_id = d.id 
            LEFT JOIN customer ON a.created_by=e.id WHERE a.is_deleted = 0';
}