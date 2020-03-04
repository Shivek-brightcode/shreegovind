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
   $sql="select name,father_name,class,admission_date from new_registration where admission_no='$id'";
   $result = mysqli_query($link,$sql);
    $array = mysqli_fetch_array($result);
	$sql1="select t_address,t_state,t_district,t_area,t_pincode from address where admission_no='$id'";
   $result1 = mysqli_query($link,$sql1);
   $rs=mysqli_fetch_array($result1);
  	$merge1=array_merge($array,$rs);    
   $sql2="select m_fee,total from fee_detail where admission_no='$id'";
   $result2 = mysqli_query($link,$sql2);
    $rs1=mysqli_fetch_array($result2);
   $merge=array_merge($merge1,$rs1);	
   //print_r($merge);		 	
   echo json_encode($merge);	
 //  echo $array['created_on'];
// echo json_encode($merge);	 
//"SELECT numcode,phonecode FROM country WHERE name= '".$p."'"
?>