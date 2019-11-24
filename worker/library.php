<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
