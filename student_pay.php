<?php
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	
	  }
	  include_once('dbconnection.php');
	  $words=new notowords();
?>


<!DOCTYPE html>
<html>
<head>
	<title> Sri Govind Middle & High School | Print </title>
	<link rel="stylesheet" href="css/css.css" />
   <style>
	   @page { 
			size: A4;		   
		}
	   @page:left {  margin: 0.14in }
	   @page:right {  margin: 0.17in }	   
		
   td{
	font-size:15px;
	line-height: 21px;
   }
   .p1{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	margin-left:10px;
	margin-top:0px;
	margin-bottom:0px;
	font-weight:bold;
   }
   </style>
</head>
<body onLoad="window.print()">
		<form name="yearly">
        <?php 
			for($result=1;$result<=1;$result++){
			
		?>
	<table align="center">
		<tr>
			<td>
			<table width="400" frame="box" align="center">		 
				<tr>
					<td colspan="2"> 
						<P style="font-size:20px; color:#7A6E7D; text-align:center; font:bold"> Sri Govind Middle & High School </P>
						<p style="text-align:center; font:bold"> Hatia, Ranchi-834003</p>
						<p style="text-align:center; font:bold">  Phone No.: +91 - 9931122334 </p>
						<!-- <p style="text-align:center; font:bold"> Email: sghshatia@gmail.com</p> -->
					</td>
				</tr>
				<tr>
					<td><b>Name Of Student:</b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["name"]; ?></label></td>
				</tr>
				<tr> 
					<td><b>Admission No.</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["adm"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date:</b> <?php echo date('d/m/Y',strtotime($_SESSION["date"]));  ?></td>
				</tr>
				<tr>
				<td><b>Months: &nbsp;</b><?php $moth = $_SESSION["months"]; $motharray = explode('/',$moth); 
					echo date('F',strtotime($motharray[0])).'/'.date('F',strtotime($motharray[1]));?> &nbsp;&nbsp;<b>Total Fee: &nbsp;</b><?php echo $_SESSION["t_amount"];?></td>
				</tr>
				<tr>	
					<td><b>Payable Amount: &nbsp;</b><?php echo $_SESSION["payable"];?>&nbsp;&nbsp;<b>Pay Mode: &nbsp;</b><?php echo $_SESSION["pay_mode"];?></td>
					<td align="right"><b>Class: </b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["cls"]; ?></label></td>
				</tr>		 		 	
			</table>
			<table width="400" frame="box" align="center">
					<tr>
						<td width="80"><b>Serial no</b></td><td><b>Particulars</b></td><td><b>Amount Rs</b></td>					
					<tr>
						<td width="80"><?php echo $count=1; $count=$count+1; ?></td><td>Admission Form</td><td><?php echo $_SESSION["admission_form"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Addmission Charge</td><td><?php echo $_SESSION["addmission_charge"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Monthly Fee</td><td><?php echo $_SESSION["monthly_fee"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Transport Fee</td><td><?php echo $_SESSION["transport_fee"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Annual Fund</td><td><?php echo $_SESSION["annual_fund"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Tie/Belt/Diary</td><td><?php   echo $_SESSION["tie_belt_diary"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Books/Cover/Copies</td><td><?php echo $_SESSION["books_cover_copies"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Fine</td><td><?php echo $_SESSION["fine"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Others</td><td><?php echo $_SESSION["others"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Discount</td><td><?php echo $_SESSION["discount"]; ?></td>
					</tr>
					<tr>
					<td colspan="2"><b>Total</b>&nbsp;&nbsp;&nbsp;<span style="margin:0px; font-weight:bold;"><?php echo number_format($_SESSION['total'],2); 
						echo "&nbsp;("; echo $words->to_words($_SESSION['total']); echo "  only)"; ?></span></td>
					</tr>
			</table>
			</td>
			<td>
			<table width="400" frame="box" align="center">		 
				<tr>
					<td colspan="2"> 
						<P style="font-size:20px; color:#7A6E7D; text-align:center; font:bold"> Sri Govind Middle & High School </P>
						<p style="text-align:center; font:bold"> Hatia, Ranchi-834003</p>
						<p style="text-align:center; font:bold">  Phone No.: +91 - 9931122334 </p>
						<!-- <p style="text-align:center; font:bold"> Email: sghshatia@gmail.com</p> -->
					</td>
				</tr>
				<tr>
					<td><b>Name Of Student:</b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["name"]; ?></label></td>
				</tr>
				<tr> 
					<td><b>Admission No.</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["adm"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date:</b> <?php echo date('d/m/Y',strtotime($_SESSION["date"]));  ?></td>
				</tr>
				<tr>
					<td><b>Months: &nbsp;</b><?php $moth = $_SESSION["months"]; $motharray = explode('/',$moth); 
					echo date('F',strtotime($motharray[0])).'/'.date('F',strtotime($motharray[1]));?> &nbsp;&nbsp;<b>Total Fee: &nbsp;</b><?php echo $_SESSION["t_amount"];?></td>
				</tr>
				<tr>	
					<td><b>Payable Amount: &nbsp;</b><?php echo $_SESSION["payable"];?>&nbsp;&nbsp;<b>Pay Mode: &nbsp;</b><?php echo $_SESSION["pay_mode"];?></td>
					<td><b>Class: </b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["cls"]; ?></label></td>
				</tr>		 		 	
			</table>
			<table width="400" frame="box" align="center">
					<tr>
						<td width="80"><b>Serial no</b></td><td><b>Particulars</b></td><td><b>Amount Rs</b></td>					
					<tr>
						<td width="80"><?php echo $count=1; $count=$count+1; ?></td><td>Admission Form</td><td><?php echo $_SESSION["admission_form"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Addmission Charge</td><td><?php echo $_SESSION["addmission_charge"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Monthly Fee</td><td><?php echo $_SESSION["monthly_fee"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Transport Fee</td><td><?php echo $_SESSION["transport_fee"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Annual Fund</td><td><?php echo $_SESSION["annual_fund"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Tie/Belt/Diary</td><td><?php   echo $_SESSION["tie_belt_diary"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Books/Cover/Copies</td><td><?php echo $_SESSION["books_cover_copies"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Fine</td><td><?php echo $_SESSION["fine"]; ?></td>
					</tr>					
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Others</td><td><?php echo $_SESSION["others"]; ?></td>
					</tr>				
					<tr>
						<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Discount</td><td><?php echo $_SESSION["discount"]; ?></td>
					</tr>
					<tr>
						<td colspan="2"><b>Total</b>&nbsp;&nbsp;&nbsp;<span style="margin:0px; font-weight:bold;"><?php echo number_format($_SESSION['total'],2); 
						echo "&nbsp;("; echo $words->to_words($_SESSION['total']); echo "  only)"; ?></span></td>
					</tr>
			</table>
			</td>
		</tr>
	</table>
    <div style="border-bottom:1px dotted #000000; height:10px;"></div><br>
    <?php }?>
    

   
   	 <!-- <table width="800" frame="box" align="center">
					<tr>
					      <td colspan="2"> 
                               <P style="font-size:30px; color:#7A6E7D; text-align:center; font:bold">Mother's Convent Playh School </P>
                               <p style="text-align:center; font:bold"> Nairyal Tar, Lar Town, Deoria, Uttar Pradesh-274502</p>
                               <p style="text-align:center; font:bold"> Phone No.: +91 - 7408680584, +91 - 7905886703 </p>
                               <p style="text-align:center; font:bold"> Email: nishamcps@gmail.com</p>
			             </td>
					</tr>
					
			<tr>
					<td ><b>Name Of Student:</b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["name"]; ?></label> &nbsp;&nbsp;&nbsp;&nbsp;<b>Admission No.</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["adm"]; ?></td><td align="right"><b>Date:</b> <?php echo $_SESSION["date"];  ?></td>
			</tr>
						<tr>
					<td ><b>Months: &nbsp;&nbsp;</b><?php echo $_SESSION["months"];
					?>
                  &nbsp;&nbsp;<b>Total Fee: &nbsp;</b><?php echo $_SESSION["t_amount"];
					?>
                   &nbsp;&nbsp;<b>Payable Amount: &nbsp;</b><?php echo $_SESSION["payable"];
					?>
                    &nbsp;&nbsp;<b>Next Dues: &nbsp;</b><?php echo $_SESSION["dues_amt"];
					?>
                     &nbsp;&nbsp;<b>Pay Mode: &nbsp;</b><?php echo $_SESSION["pay_mode"];
					?>
					<td align="right"><b>Class: </b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["cls"]; ?></label></td>
			</tr>
	</table>
	<table width="800"frame="box" align="center">
	<tr>
		<td width="80"><b>Serial no</b></td><td><b>Particulars</b></td><td><b>Amount Rs</b></td>
	
	<tr>
		<td width="80"><?php echo $count=0; $count=$count+1; ?></td><td>Admission Form</td><td><?php echo $_SESSION["admission_form"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Addmission Charge</td><td><?php echo $_SESSION["addmission_charge"]; ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Monthly Fee</td><td><?php echo $_SESSION["monthly_fee"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Transport Fee</td><td><?php echo $_SESSION["transport_fee"]; ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Annual Fund</td><td><?php echo $_SESSION["annual_fund"]; ?></td>
	</tr>
    
	
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Tie/Belt/Diary</td><td><?php   echo $_SESSION["tie_belt_diary"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Books/Cover/Copies</td><td><?php echo $_SESSION["books_cover_copies"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Fine</td><td><?php echo $_SESSION["fine"]; ?></td>
	</tr>
    
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>others</td><td><?php echo $_SESSION["others"]; ?></td>
	</tr>
  
   <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Discount</td><td><?php echo $_SESSION["discount"]; ?></td>
	</tr>
   <tr>
	<td  colspan="2"><b>Total</b></td><td><p style="margin:0px; font-weight:bold;"><?php echo number_format($_SESSION['total'],2); echo "&nbsp;("; echo convert_number_to_words($_SESSION['total']); echo "  only)"; ?></p></td>
	</tr>
 
    
	</table> -->
       
       <p align="center"><a href="student_payment.php" style="text-decoration:none;"><input type="button"  style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></p>
</form>

</body>
</html>