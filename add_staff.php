<?php
session_start();
include('dbconnection.php');
if(isset($_POST['submit'])){
	$employee_id=$_POST['eid'];
	$j_date=$_POST['j_date'];
	$etype=$_POST['etype'];
	$file=$_FILES['file']['name'];
	$path=time().rand(00,99).$file;
	$temp=$_FILES['file']['tmp_name'];
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
	
$query="INSERT INTO `staff_info`(`employee_id`, `joining_date`,`employee_type` , `name`, `father`, `designation`, `dob`, `age`, `gender`, `blood_group`, `religion`, `caste`, `identification`, `school_name`, `duration`, `company_pf`, `pf_acc_no`, `income_tax_no`, `photo`, `t_address`, `t_state`, `t_district`, `t_area`, `t_pin`, `p_address`, `p_state`, `p_district`, `p_area`, `p_pin`, `mobile`, `alt_mobile`, `phone`, `email`, `basic_salary`, `pf`, `hra`) VALUES ('','$j_date','$etype','$name','$father','$desig','$dob','$age','$gender','$blood','$religion','$caste','$id_mark','$schoolname','$duration','$pfno','$pfa','$it_no','$photo','$taddress','$tstate','$tdistrict','$tarea','$tpin','$paddress','$pstate','$pdistrict','$parea','$ppin','$mobile','$amobile','$phone','$email','$bsalary','$pf','$hra')";
$result=mysqli_query($link,$query);	
if($result){
}
	$msg = "Staff Added Successfully!";
	$_SESSION['success']=$msg;
	move_uploaded_file($temp,$photo);
	header("Location:staff-info.php?pagename=staff-info");
	   echo "<script>location='staff-info.php?pagename=staff-info'</script>";

	//move_uploaded_files($temp,$photo);
}else{
		$msg = "Data Not added!!";
		$_SESSION['err']=$msg;
		header("Location:staff-info.php?pagename=staff-info");
	   echo "<script>location='staff-info.php?pagename=staff-info'</script>";

}
	

?>
 


