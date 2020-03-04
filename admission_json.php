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
   $sql="select name,dob,t_address,t_state,t_district,t_area,t_pincode,mobile,alt_mobile,phone,email from enquiry_details where e_id='$id'";
   $result = mysqli_query($link,$sql);
    $array = mysqli_fetch_array($result);
	
	  /*foreach($array as $index=> $val){
	   echo $index."=".$val;
	   echo "<br>";  
	  }*/
   echo json_encode($array);
 //  echo $array['created_on'];
	//"SELECT numcode,phonecode FROM country WHERE name= '".$p."'"
?>