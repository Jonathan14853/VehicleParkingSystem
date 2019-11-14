<?php
session_start();
/*
$_SESSION['login']=="";

session_unset();
$_SESSION['action1']="You have logged out successfully..!";
?>
<script language="javascript">
document.location="index.php";
</script>
*/
session_unset();
session_destroy();
header('location:index.php');

?>

