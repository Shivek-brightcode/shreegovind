<?php
session_start();
include('dbconnection.php');


if(isset($_POST['submit'])){
	
	//echo '<pre>'; print_r($_POST); echo '</pre>';die;
	$date=$_POST['a_date'];
	$rollno=$_POST['rollno'];
	$session=$_POST['session']; 
	$file=$_FILES['photo']['name'];
	$path=time().rand(00,99).$file;
	$temp=$_FILES['photo']['tmp_name'];
	$photo='uploads/'.$path;
	$adm=$_POST['adm'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$father_occup=$_POST['father_occup'];
	$mother=$_POST['mother'];
	$mother_occup=$_POST['mother_occup'];
	$dob=$_POST['dob'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$blood=$_POST['blood'];
	$religion=$_POST['religion'];
	$caste=$_POST['caste'];
	$id_mark=$_POST['id_mark'];
	$adhar=$_POST['adhar'];
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
	$tamount=$_POST['tamount'];
	$monthlyfees=$_POST['m_fee'];
	//$advance=$_POST['advance'];
	//$ramount=$_POST['ramount'];
	
	$schoolname=$_POST['schoolname'];
	$laststudy=$_POST['laststudy'];
	$Promotedclass=$_POST['Promotedclass'];
	$tc=$_POST['tc'];
	$ms=$_POST['ms'];
	$cc=$_POST['cc'];
	$dc=$_POST['dc'];
	$address="Street:-".$taddress.", State:-".$tstate.", District:-;".$tdistrict.", Area:-".$tarea.", Pincode:-".$tpin.", Mobile:-".$mobile;
	
	$checkcls="select class from new_registration where admission_no='$adm'";
	$cls=mysqli_query($link,$checkcls);
	$fetchcls=mysqli_fetch_array($cls);
	
	//var_dump($address);die;
	$query="update `new_registration` set roll_no='$rollno',session='$session'"; 
	if($fetchcls['class']!=$class){
		$delpayrecord="delete from student_payments where admission_no='$adm'";
		$delrec=mysqli_query($link,$delpayrecord);
		$query.=", class='$class'";
		}
	$query.=" ,section='$section',name='$name',father_name='$father',father_occup='$father_occup',mother_name='$mother',mother_occup='$mother_occup',dob='$dob',age='$age',gender='$gender',blood_group='$blood',religion='$religion',	caste='$caste',	identification='$id_mark',adhar_no='$adhar',previous_school='$schoolname',previous_class='$laststudy',promoted='$Promotedclass',	transfer_certificate='$tc',	marksheet='$ms',caste_certificate='$cc',domecile='$dc'";
	if($file!=''){$query.=",photo='$photo'";}
	$query.=" where admission_no='$adm'";
	$rs=mysqli_query($link,$query);
	
	$std_fee_updation="UPDATE `student_payment_updation` SET `date`='',`months`='',`name`='$name',`father_name`='$father',`address`='$address',`class`='$class',`total_fee`='$tamount',`payable_amount`='',`dues_amount`='',`user`='' WHERE admission_no='$adm'";
	$r3=mysqli_query($link,$std_fee_updation);
		
	$address="UPDATE `address` SET `t_address`='$taddress',`t_state`='$tstate',`t_district`='$tdistrict',`t_area`='$tarea',`t_pincode`='$tpin',`p_address`='$paddress',`p_state`='$pstate',`p_district`='$pdistrict',`p_area`='$parea',`p_pincode`='$ppin' WHERE admission_no='$adm'";
	$r=mysqli_query($link,$address);
		
	$contact="update `contact_info` set mob='$mobile',	alt_mobile='$amobile',phone='$phone',email='$email' where admission_no='$adm'";
	$r1=mysqli_query($link,$contact);
	
	
	$fee="update `fee_detail` set total='$tamount',m_fee='$monthlyfees' where admission_no='$adm'";
	$r2=mysqli_query($link,$fee);
	
	if($rs>0 && $r3>0 && $r>0 && $r1>0 && $r2>0){
	
		/*$std_payment="update `student_payments` set address='$address' where admission_no='$adm'";
		$r4=mysqli_query($link,$std_payment);
		/*echo "<script>alert('data updated successfully');</script>";*/
		$msg="Data updated successfully!";
		$_SESSION['success']=$msg;
		move_uploaded_file($temp,$photo);
		header("Location:search_session_wise.php?pagename=search");
	   echo "<script>location='search_session_wise.php?pagename=search'</script>";
	}
	else{
		$msg="Data not updated!";
		$_SESSION['err']=$msg;
		header("Location:search_session_wise.php?pagename=search");
	    echo "<script>location='search_session_wise.php?pagename=search'</script>";
	}
}

?>