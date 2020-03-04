<?php
session_start();
if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
  }
  else{
	  header("Location:index.php");
  }
   
include('dbconnection.php');
?>
<?php

if(isset($_POST['submit'])){
	//echo '<pre>';
	//print_r($_POST);
	$adm=$_POST['adm'];
	$user=$_POST['user'];
	$date=$_POST['date'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$months=$from."/".$to;
	$pay_mode=$_POST['pay_mode'];
	$admission_form=$_POST['admission_form'];
	$addmission_charge=$_POST['addmission_charge'];
	$re_admission_charge=$_POST['re_admission_charge'];
	$monthly_fee=$_POST['monthly_fee'];
	$transport_fee=$_POST['transport_fee'];
	$annual_fund=$_POST['annual_fund'];
	$tie_belt_diary=$_POST['tie_belt_diary'];
	$books_cover_copies=$_POST['books_cover_copies'];
	$fine=$_POST['fine'];
	$others=$_POST['others'];
	$discount=$_POST['discount'];
	$total=$_POST['total'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$address=$_POST['address'];
	$cls=$_POST['cls'];
	$a_date=$_POST['a_date'];
	$t_amount=$_POST['t_amount'];
	$payable=$_POST['payable'];
	$dues_amt=$_POST['dues_amt'];
	
//$tot_paid=$rs['payable_amount'] + $payable; 
$sql="SELECT `dues_amount`,`payable_amount` FROM `student_payment_updation` where admission_no='$adm'";
$rs=mysqli_fetch_assoc(mysqli_query($link,$sql));
//print_r($rs);
$pay_and_dues=$payable+$rs['payable_amount'];
echo $pay_and_dues;
$sql1="select * from student_payments where date_to>'$from' and admission_no='$adm'";
$rst=mysqli_query($link,$sql1);

$numrows=mysqli_num_rows($rst);
//print_r($numrows);
//var_dump($numrows);
if($numrows==0)
{
	if(isset($rs['dues_amount'])){
		if($pay_and_dues<=$t_amount){
			$query="INSERT INTO `student_payments`(`id`, `admission_no`, `date`, `date_from`, `date_to`, `adm_form`, `adm_charge`, `re_adm_charge` , `monthly_fee`, `transport_fee`, `annual_dev`, `tie_belt_diary`, `book_cover_copies`, `fine`, `other`, `discount`, `name`, `father_name`, `address`, `class`, `admission_date`, `total_fee`, `payable_amount`, `dues_amount`,`pay_mode`,`user`) VALUES ('','$adm','$date','$from','$to','$admission_form','$addmission_charge','$re_admission_charge','$monthly_fee','$transport_fee','$annual_fund','$tie_belt_diary','$books_cover_copies','$fine','$others','$discount','$name','$father','$address','$cls','$a_date','$t_amount','$payable','$dues_amt','$pay_mode','$user')";
			//echo $query;die;
			$result=mysqli_query($link,$query);	
			$sql2="UPDATE `student_payment_updation` SET `date`='$date',`months`='$months',`payable_amount`='$pay_and_dues',`dues_amount`='$dues_amt', user='$user' WHERE admission_no='$adm'";
			$query1=mysqli_query($link,$sql2);
		}else{
			$msg="You are entering more than we required!";
			//echo $msg;die;
			 $_SESSION["success"]=$msg;
			 header('location:student_payment.php');
			}
	}else{
			$msg="You have completed your payment thank you!";
			echo $msg;die;
			$_SESSION["success"]=$msg;
		    header('location:student_payment.php');
		}

}
else{
	$msg="You have Already paid in this month Range!!";
	$_SESSION["success"]=$msg;
	 header('location:student_payment.php');
}


if($result){

		                    $_SESSION["adm"]=$adm;
							$_SESSION["date"]=$date;
							$_SESSION["months"]=$months;
							$_SESSION["admission_form"]=$admission_form;
							$_SESSION["addmission_charge"]=$addmission_charge;
							$_SESSION["re_admission_charge"]=$re_admission_charge;
							$_SESSION["monthly_fee"]=$monthly_fee;
							$_SESSION["addmission_charge"]=$addmission_charge;
							$_SESSION["monthly_fee"]=$monthly_fee;
							$_SESSION["transport_fee"]=$transport_fee;
							$_SESSION["annual_fund"]=$annual_fund;
							$_SESSION["tie_belt_diary"]=$tie_belt_diary;
							$_SESSION["books_cover_copies"]=$books_cover_copies;
							$_SESSION["fine"]=$fine;
							$_SESSION["others"]=$others;
							$_SESSION["discount"]=$discount;
							$_SESSION["total"]=$total;
							$_SESSION["name"]=$name;
							$_SESSION["father"]=$father;
							$_SESSION["address"]=$address;
							$_SESSION["pay_mode"]=$pay_mode;
							$_SESSION["cls"]=$cls;
							$_SESSION["a_date"]=$a_date;
							$_SESSION["t_amount"]=$t_amount;
							$_SESSION["payable"]=$payable;
							$_SESSION["dues_amt"]=$dues_amt;
							
	$msg="Payment Successful!";
	$_SESSION['success']=$msg;						
	echo "<script>window.location='student_pay.php';</script>";
	

  }
}
else{
	$msg="Payment Not Done!!";
	$_SESSION['success']=$msg;
	echo "<script>window.location='student_payment.php';</script>";

}
	

?>