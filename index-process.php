<?php 
session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$user_name=$_POST['user_name'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$enc_password=$_POST['password'];
	$msg=mysqli_query($con,"insert into customer(username,first_name,last_name,password) values('$user_name','$first_name','$last_name','$enc_password')");
if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$user=$_POST['user'];
$ret= mysqli_query($con,"SELECT * FROM customer WHERE username='$user' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['user'];
$_SESSION['id']=$num['id'];
$_SESSION['first_name']=$num['first_name'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
$fuser_name=$_POST['fuser_name'];

$row1=mysqli_query($con,"select user_name,password from customers where username='$user_name'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$username = $row2['username'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($user_name, $subject, $message, "From: $user_name");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Usename not registered with us');</script>";	
}
}