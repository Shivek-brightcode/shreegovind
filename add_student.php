<?php
session_start();
include('dbconnection.php');
if(isset($_POST['submit'])){
	//echo "hii";
	$adm=$_POST['adm'];
	$date=$_POST['a_date'];
	$rollno=$_POST['rollno'];
	$session=$_POST['session']; 
	$file=$_FILES['photo']['name'];
	$path=time().rand(00,99).$file;
	$temp=$_FILES['photo']['tmp_name'];
	$photo='uploads/'.$adm."_".$path;
	
	$class=$_POST['class'];
	$section=$_POST['section'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$father_occup=$_POST['father_occup'];
	$mother=$_POST['mother'];
	$mother_occup=$_POST['mother_occup'];
	$dob=$_POST['dob'];
	$dob=date('Y-m-d',strtotime($dob));
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
	$monthly_fee=$_POST['mamount'];
	$tamount=$_POST['tamount'];
	$schoolname=$_POST['schoolname'];
	$laststudy=$_POST['laststudy'];
	$Promotedclass=$_POST['Promotedclass'];
	$tc=$_POST['tc'];
	$ms=$_POST['ms'];
	$cc=$_POST['cc'];
	$dc=$_POST['dc'];

	//print_r($_POST);
	
	
	$query="INSERT INTO `new_registration`(`admission_no`, `admission_date`, `roll_no`, `session`, `class`, `section`, `name`, `father_name`,`father_occup`, `mother_name`,`mother_occup`, `dob`, `age`, `gender`, `blood_group`, `religion`, `caste`, `adhar_no`, `identification`, `previous_school`, `previous_class`, `promoted`, `transfer_certificate`, `marksheet`, `caste_certificate`, `domecile`, `photo`) 

VALUES ('','$date','$rollno','$session','$class','$section','$name','$father','$father_occup','$mother','$mother_occup','$dob','$age','$gender','$blood','$religion','$caste','$adhar','$id_mark',
			'$schoolname','$laststudy','$Promotedclass','$tc','$ms','$cc','$dc','$photo')";
	$rs=mysqli_query($link,$query);
	
	/************ Address ********/
	
	$address="INSERT INTO `address`(`address_id`, `t_address`, `t_state`, `t_district`, `t_area`, `t_pincode`, `p_address`, `p_state`, `p_district`, `p_area`, `p_pincode`,`admission_no`) 
			VALUES ('','$taddress','$tstate','$tdistrict','$tarea','$tpin','$paddress','$pstate','$pdistrict','$parea','$ppin','$adm')";
		$r=mysqli_query($link,$address);
		
 /************End Address ********/
 /***************contact info*****/
 
 		$contact="INSERT INTO `contact_info`(`cid`, `mob`, `alt_mobile`, `phone`, `email`, `admission_no`) 
			VALUES ('','$mobile','$amobile','$phone','$email','$adm')";
		$r1=mysqli_query($link,$contact); 
		
		/***************End contact info*****/
	
		$fee="INSERT INTO `fee_detail`(`fee_id`, `total`,`m_fee`, `admission_no`) 
			VALUES ('','$tamount','$monthly_fee','$adm')";
		$r2=mysqli_query($link,$fee);
		
		$address="Street:-".$taddress.", State:-".$tstate.", District:-".$tdistrict.", Area:-".$tarea.", pincode:-".$tpin.", mobile:-".$mobile.", email:-".$email;
		
		$payment_updation="INSERT INTO `student_payment_updation`(`id`, `admission_no`, `date`, `months`, `name`, `father_name`, `address`, `class`, `admission_date`, `total_fee`, `payable_amount`, `dues_amount`, `user`) VALUES ('','$adm','','','$name','$father','$address','$class','$date','$tamount','','','')";
		$r3=mysqli_query($link,$payment_updation);
	
	
	
	if($rs>0 && $r>0 && $r1>0 && $r2>0 && $r3>0){
		$msg = "Registration Successful!";
		$_SESSION['success'] = $msg;
		/* echo "<script>alert('Registration Successful!');</script>"; */
		move_uploaded_file($temp,$photo);
		
		
		
		
	
		
		 					$_SESSION["date"]=$date;
							$_SESSION["rollno"]=$rollno;
							$_SESSION["session"]=$session;
							$_SESSION["adm"]=$adm;
							$_SESSION["class"]=$class;
							$_SESSION["section"]=$section;
							$_SESSION["name"]=$name;
							$_SESSION["father"]=$father;
							$_SESSION["father_occup"]=$father_occup;
							$_SESSION["mother"]=$mother;
							$_SESSION["mother_occup"]=$mother_occup;
							$_SESSION["dob"]=$dob;
							$_SESSION["age"]=$age;
							$_SESSION["gender"]=$gender;
							$_SESSION["blood"]=$blood;
							$_SESSION["religion"]=$religion;
							$_SESSION["caste"]=$caste;
							$_SESSION["id_mark"]=$id_mark;
							$_SESSION["adhar_no"]=$adhar;
							$_SESSION["address"]="Street:&nbsp;".$taddress.", State:&nbsp;".$tstate.", District:&nbsp;".$tdistrict.", Area:&nbsp;".$tarea.", Pincode:&nbsp;".$tpin.", Mobile:&nbsp;".$mobile;
							
							$_SESSION["tamount"]=$tamount;
							$_SESSION["schoolname"]=$schoolname;
							$_SESSION["laststudy"]=$laststudy;
							$_SESSION["Promotedclass"]=$Promotedclass;
							$_SESSION["tc"]=$tc;
							$_SESSION["ms"]=$ms;
							$_SESSION["cc"]=$cc;
							$_SESSION["dc"]=$dc;
							$_SESSION["picture"]=$photo;
		
		header("Location:print_admission.php?pagename=print_page");
	   echo "<script>location='print_admission.php?pagename=print_page'</script>";
	}
}
?>