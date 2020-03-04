<?php
session_start();
if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $id=$_POST['id'];
	  
  }
  else{
	  header("Location:index.php");
  }
   
include('dbconnection.php');


  $sql="select payable_amount from student_payment_updation where admission_no='$id'";
  $result = mysqli_query($link,$sql);
  $array = mysqli_fetch_array($result);
 
 echo json_encode($array);
 
?>