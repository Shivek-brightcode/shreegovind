<?php 
session_start();
include "dbconnection.php";
$id=$_GET['id'];
$sql="DELETE FROM `users` WHERE id='$id'";
$rs=mysqli_query($link,$sql);
if($rs)
{
	echo "<script>alert('Users Deleted Successfully!');</script>";
	echo "<script>location='user.php';</script>";
}
?>