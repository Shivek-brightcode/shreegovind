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


    $sql="select employee_type,name,joining_date,designation,company_pf,pf_acc_no,income_tax_no,mobile,basic_salary,hra,t_district from staff_info where employee_id='$id'";
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