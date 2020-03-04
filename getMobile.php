<?php
include('dbconnection.php');
$mobile=$_GET['mobile'];

$query="select * from clients where mobile='$mobile'";
$rq=mysqli_query($link,$query);
$result=mysqli_fetch_array($rq);
if(mysqli_num_rows($rq)>0){
	echo json_encode($result);
}
else{
	if(strlen($mobile)=='10'){
		$result1=array("id"=>"0","name"=>"0");
		echo json_encode($result1);
	}
}

?>