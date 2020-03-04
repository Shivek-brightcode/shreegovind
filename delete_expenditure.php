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
$exp_id=$_GET['exp_id'];
include('dbconnection.php');
//var_dump($adm);die;
$query="delete from add_expenditure where exp_id='$exp_id'";
$result=mysqli_query($link,$query);

if($result){
		echo "<script>alert('data deleted successfully');</script>";
		header("Location:view-expenditure.php?pagename=view-exp");
	   echo "<script>location='view-expenditure.php?pagename=view-exp'</script>";
}
?>