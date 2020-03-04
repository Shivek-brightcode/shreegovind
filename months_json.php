<?php
session_start();
if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $from=$_POST['from'];
	  $month=$_POST['month'];
	  
  }
  else{
	  header("Location:index.php");
  }
   
include('dbconnection.php');


   $sql="select index1 from `months` where month_name='$from'";
   $result = mysqli_query($link,$sql);
    $array = mysqli_fetch_array($result);
	
 $select=$array['index1'] + $month-1;
	if($select<=12)
	{
	$sql1="select month_name from `months` where index1='$select'";
    $result1 = mysqli_query($link,$sql1);
    $array1 = mysqli_fetch_array($result1);
	}
	else if($select>12)
	{
		$sl=$select-12;
	$sql1="select month_name from `months` where index1='$sl'";
    $result1 = mysqli_query($link,$sql1);
    $array1 = mysqli_fetch_array($result1);		
	}
	 //$res=$array1['month_name'];
 echo json_encode($array1);
	
 //  echo $array['created_on'];
// echo json_encode($merge);
	 
	//"SELECT numcode,phonecode FROM country WHERE name= '".$p."'"
?>