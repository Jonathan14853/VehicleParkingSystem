<?php session_start();
require_once('../dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$user_name=$_POST['user_name'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$enc_password=$_POST['password'];
	//$hash = password_hash($enc_password,PASSWORD_DEFAULT);
	$hash = md5($enc_password);
	$msg=mysqli_query($con,"INSERT INTO worker(username,first_name,last_name,password) VALUES('$user_name','$first_name','$last_name','$hash')");
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
//$hash = password_hash($dec_password,PASSWORD_DEFAULT);
$hash = md5($dec_password);
$user=$_POST['user'];
$ret= mysqli_query($con,"SELECT * FROM worker WHERE username='$user' and password='$hash'");
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

$row1=mysqli_query($con,"select user_name,password from workers where username='$user_name'");
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

?>
<!DOCTYPE html>
<html>
<head>
<title>System</title>
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="../js/jquery.min.js"></script>
<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
		<h1>Worker Registration and Login</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p>User Name </p>
								<input type="text" class="text" value="" name="user_name"  >
								<p>First Name </p>
								<input type="text" class="text" value=""  name="first_name" required >
								<p>Last Name </p>
								<input type="text" class="text" value="" name="last_name"  required >
								
								<p>Password </p>
								<input type="password" value="" name="password" required>
								<div class="sign-up">
									<input type="reset" value="Reset">
									<input type="submit" name="signup"  value="Sign Up" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="user" value="" placeholder="Enter your registered username"  ><!--a href="#" class=" icon username"></a-->

								<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="LOG IN" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="fusername" value="" placeholder="Enter your registered username" required  ><a href="#" class=" icon username"></a>
									
										<div class="submit three">
											<input type="submit" name="send" onClick="myFunction()" value="Send username" >
										</div>
									</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>

</body>
</html>