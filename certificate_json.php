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


    $sql="select name,class,session,father_name,dob from new_registration where admission_no='$id'";
   $result = mysqli_query($link,$sql);
    $array = mysqli_fetch_array($result);
	
 echo json_encode($array);
	
 
?>