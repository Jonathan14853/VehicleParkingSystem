<?php 
session_start();
include('dbconnection.php');
if(isset($_POST['login']))
{
	$password=$_POST['password'];
$ret= mysql_query("SELECT * FROM customers WHERE username='".$_POST['user_name']."' and password='$password'");
$num=mysql_fetch_array($ret);
if($num>0)
{
	
	$extra="welcome.php";
$_SESSION['login']=$_POST['user_name'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['action1']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}


?>