<?php

session_start();
error_reporting(-1);
if(strlen($_SESSION['id'] == 0)) {
    header("location:logout.php");
}
function getCon() {
    return mysqli_connect('localhost', 'root', '', 'vehicleparkingsystem');
}
function getParkingSlot()
{
    $sql='SELECT a.id AS slot_id,a.slot_name,a.street_id,b.street_name,b.town_id,c.town_name,a.created_by AS customer_id,CONCAT(d.first_name," ",d.last_name) AS worker_name 
FROM parking_slot a LEFT JOIN street b ON a.street_id=b.id
LEFT JOIN town c ON b.town_id=c.id 
LEFT JOIN customer d ON a.created_by=d.id WHERE a.is_deleted=0';
    return  queryAll($sql);
}
function insertPayment($transaction_number,$amount,$id) {
    $con = getCon();
$sql = "INSERT INTO payment(transaction_number,amount,created_by) VALUES('$transaction_number','$amount',$id)";
    $result = runQuery($con, $sql);
    mysqli_close($con);
    return $result;
}
function getPayment() {
    $sql = 'SELECT a.id,a.username,a.first_name,a.last_name,b.reference_code,b.transaction_number,b.amount,a.created_by 
            FROM customer a LEFT JOIN payment b ON a.id=b.reference_code WHERE a.is_deleted=0';
}
function queryAll() {
    $con = getCon();
    $result = mysqli_fetch_all(runQuery($con, $sql),MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

function runQuery($con,$sql)
{
    return mysqli_query($con, $sql);
}
