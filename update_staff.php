<?php
session_start();
include('dbconnection.php');
if(isset($_POST['submit'])){
	$employee_id=$_POST['eid'];
	$j_date=$_POST['j_date'];
	$etype=$_POST['etype'];
	$file=$_FILES['photo']['name'];
	$path=time().rand(00,99).$file;
	$temp=$_FILES['photo']['tmp_name'];
	$photo='staff/'.$path;
	$name=$_POST['name'];
	$father=$_POST['father'];
	$desig=$_POST['desig'];
	$dob=$_POST['dob'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$blood=$_POST['blood'];
	$religion=$_POST['religion'];
	$caste=$_POST['caste'];
	$id_mark=$_POST['id_mark'];
	$taddress=$_POST['taddress'];
	$tstate=$_POST['tstate'];
	$tdistrict=$_POST['tdistrict'];
	$tarea=$_POST['tarea'];
	$tpin=$_POST['tpin'];
	$paddress=$_POST['paddress'];
	$pstate=$_POST['pstate'];
	$pdistrict=$_POST['pdistrict'];
	$parea=$_POST['parea'];
	$ppin=$_POST['ppin'];
	$mobile=$_POST['mobile'];
	$amobile=$_POST['amobile'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$bsalary=$_POST['bsalary'];
	$pf=$_POST['pf'];
	$hra=$_POST['hra'];
	$schoolname=$_POST['schoolname'];
	$duration=$_POST['duration'];
	$pfno=$_POST['pf_no'];
	$pfa=$_POST['pfa_no'];
	$it_no=$_POST['it_no'];
	
$query="UPDATE `staff_info` SET `joining_date`='$j_date',`employee_type`='$etype' , `name`='$name', `father`='$father', `designation`='$desig', `dob`='$dob', `age`='$age', `gender`='$gender', `blood_group`='$blood', `religion`='$religion', `caste`='$caste', `identification`='$id_mark', `school_name`='$schoolname', `duration`='$duration', `company_pf`='$pfno', `pf_acc_no`='$pfa', `income_tax_no`='$it_no'";
if($file!=''){$query.=", `photo`='$photo'";}
$query.=", `t_address`='$taddress', `t_state`='$tstate', `t_district`='$tdistrict', `t_area`='$tarea', `t_pin`='$tpin', `p_address`='$paddress', `p_state`='$pstate', `p_district`='$pdistrict', `p_area`='$parea', `p_pin`='$ppin', `mobile`='$mobile', `alt_mobile`='$amobile', `email`='$email', `basic_salary`='$bsalary', `pf`='$pf', `hra`='$hra'";
$query.=" where employee_id='$employee_id'";

$result=mysqli_query($link,$query);	
if($result){
}
	$msg = "data successfully Updated.";
	$_SESSION['success']=$msg;
	move_uploaded_file($temp,$photo);
	header("Location:staff-details.php?pagename=staff-details");
	echo "<script>location='staff-details.php?pagename=staff-details'</script>";

	//move_uploaded_files($temp,$photo);
}else{
		$msg = "data not Updated!.";
		$_SESSION['err']=$msg;
		header("Location:staff-details.php?pagename=staff-details");
	   echo "<script>location='staff-details.php?pagename=staff-details'</script>";

}
	

?>
 


