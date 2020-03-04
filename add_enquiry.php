<?php
session_start();
include('dbconnection.php');
if(isset($_POST['save'])){
	$date=$_POST['e_date'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$course=$_POST['course'];
	$a_date=$_POST['a_date'];
	$e_time=$_POST['e_time'];
	$remarks=$_POST['remarks'];
	$taddress=$_POST['taddress'];
	$tstate=$_POST['tstate'];
	$tdistrict=$_POST['tdistrict'];
	$tarea=$_POST['tarea'];
	$tpin=$_POST['tpin'];
	$check=$_POST['check'];
	if($check=='on'){ $check=1;} else{$check=0;}
	$paddress=$_POST['paddress'];
	$pstate=$_POST['pstate'];
	$pdistrict=$_POST['pdistrict'];
	$parea=$_POST['parea'];
	$ppin=$_POST['ppin'];
	$mobile=$_POST['mobile'];
	$amobile=$_POST['amobile'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$reference=$_POST['reference'];
	
	
	
	$query="INSERT INTO enquiry_details(`e_id`, `date`, `name`, `gender`, `dob`, `class`, `Admission_date`, `time`, `remarks`,`refrence`, `t_address`, `t_state`,`t_district`, `t_area`, `t_pincode`, `add_check`, `p_address`, `p_state`, `p_district`, `p_area`, `p_pincode`, `mobile`, `alt_mobile`, `phone`, `email`) 
	VALUES ('','$date','$name','$gender','$dob','$course','$a_date','$e_time','$remarks','$reference','$taddress','$tstate','$tdistrict','$tarea','$tpin',
	'$check','$paddress','$pstate','$pdistrict','$parea','$ppin','$mobile','$amobile','$phone','$email')";
	
	
	
	
	$rs=mysqli_query($link,$query);
	
	if($rs){
		header("Location:enquiry.php?pagename=enquiry");
	   echo "<script>location='enquiry.php?pagename=enquiry'</script>";
	}
}
?>