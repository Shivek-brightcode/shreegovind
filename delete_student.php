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
$adm=$_GET['student_id'];
include('dbconnection.php');
//var_dump($adm);die;
$query="delete from new_registration where admission_no='$adm'";
$result=mysqli_query($link,$query);
$query1="delete from address where admission_no='$adm'";
$result1=mysqli_query($link,$query1);
$query2="delete from fee_detail where admission_no='$adm'";
$result2=mysqli_query($link,$query2);
$query3="delete from contact_info where admission_no='$adm'";
$result3=mysqli_query($link,$query3);
if($result){
		echo "<script>alert('data deleted successfully');</script>";
		header("Location:search_session_wise.php?pagename=search");
	   echo "<script>location='search_session_wise.php?pagename=search'</script>";
}
?>