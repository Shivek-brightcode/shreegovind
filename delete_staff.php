<?php
error_reporting(0);
session_start();
if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
      
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
$employee_id=$_GET['employee_id'];
include('dbconnection.php');
//var_dump($adm);die;
$query="delete from `staff_info` where employee_id='$employee_id'";
$result=mysqli_query($link,$query);
if($result){
		echo "<script>alert('data deleted successfully');</script>";
		header("Location:staff-details.php?pagename=staff-details");
	   echo "<script>location='staff-details.php?pagename=staff-details'</script>";
}
?>