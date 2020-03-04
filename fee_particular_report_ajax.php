<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $from=$_GET['from'];
	  $to=$_GET['to'];
	  $fee_dtails=$_GET['fee_dtails'];
	  $paymode=$_GET['paymode'];
  } 
  else{
    header("Location:index.php");
  }

?>

<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                  <?php if($fee_dtails=='adm_form'){?> <th style="text-align:center">Admission Form</th><?php } ?>
                                  <?php if($fee_dtails=='adm_charge'){?> <th style="text-align:center">Admission Charge</th><?php } ?>
                                  <?php if($fee_dtails=='monthly_fee'){?> <th style="text-align:center">Monthly Fee</th><?php } ?>
                                  <?php if($fee_dtails=='trans_fee'){?> <th style="text-align:center">Transport Fee</th><?php } ?>
                                  <?php if($fee_dtails=='annual_fee'){?> <th style="text-align:center">Annual Dev. Fee</th><?php } ?>
                                  <?php if($fee_dtails=='tie_belt_diary'){?> <th style="text-align:center">Tie-Belt-Diary Fee</th><?php } ?>
                                  <?php if($fee_dtails=='book_cover_copies'){?> <th style="text-align:center">Book-Cover-Copies Fee</th><?php } ?>
                                  <?php if($fee_dtails=='fine_fee'){?> <th style="text-align:center">Fine Fee</th><?php } ?>
                                  <?php if($fee_dtails=='other_fee'){?> <th style="text-align:center">Others Fee</th><?php } ?>
                                  <?php if($paymode=='cash' || $paymode=='cheque' || $paymode=='online'){ ?>
                                  <th style="text-align:center"> Fee</th>
                                  <?php } ?>
                                   <th style="text-align:center">Pay Mode</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=10;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;
	
	 if($paymode!=''){
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode' limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'";
	}
	else{
		$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	    $sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
	}
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                    <td align="center"><?php echo $result['admission_no']; ?></td>
                                   
                                   <td align="center"><?php echo $result['date']; ?></td>
                                   <td align="center"><?php echo $result['name']; ?> </td>
                                   <td align="center"><?php echo $result['father_name']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?></td>
                                   <?php if($fee_dtails=='adm_form' || $fee_dtails=='adm_charge' || $fee_dtails=='monthly_fee' || $fee_dtails=='trans_fee' ||$fee_dtails=='annual_fee' || $fee_dtails=='tie_belt_diary' || $fee_dtails=='book_cover_copies' || $fee_dtails=='fine_fee' || $fee_dtails=='other_fee'){ ?>
                                    <td align="center">
									<?php 
									if($fee_dtails=='adm_form'){ echo $result['adm_form'];}
									if($fee_dtails=='adm_charge'){echo $result['adm_charge'];}
									if($fee_dtails=='monthly_fee'){echo $result['monthly_fee'];}
									if($fee_dtails=='trans_fee'){echo $result['transport_fee'];}
									if($fee_dtails=='annual_fee'){echo $result['annual_dev'];}
									if($fee_dtails=='tie_belt_diary'){echo $result['tie_belt_diary'];}
									if($fee_dtails=='book_cover_copies'){echo $result['book_cover_copies'];}
									if($fee_dtails=='fine_fee'){echo $result['fine'];}
									if($fee_dtails=='other_fee'){echo $result['other'];}
									 ?>
                                    </td>
                                    <?php } ?>
                                    <?php if($paymode=='cash' || $paymode=='cheque' || $paymode=='online'){ ?>
                                    <td align="center"><?php echo $result['payable_amount']; ?></td>
                                    <?php } ?>
                                    <td align="center"><?php echo $result['pay_mode']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>&id=<?php echo $result['id'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
							    $page=$page +1;
								$prev= $page-2;
								?>
                             <?php
							 if($paymode=='cash'){
							  if($fee_dtails=='adm_form'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_form) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;
							}
						   if($fee_dtails=='adm_charge'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_charge) as adm_charge  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}	    
							if($fee_dtails=='monthly_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(monthly_fee) as monthly_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}        
							if($fee_dtails=='trans_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(transport_fee) as transport_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='annual_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(annual_dev) as annual_dev  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='tie_belt_diary'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(tie_belt_diary) as tie_belt_diary  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='book_cover_copies'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(book_cover_copies) as book_cover_copies  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='fine_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(fine) as fine  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='other_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(other) as other  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}
							  }
							  
							  
							  else if($paymode=='cheque'){
							  if($fee_dtails=='adm_form'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_form) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}
						   if($fee_dtails=='adm_charge'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_charge) as adm_charge  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}	    
							if($fee_dtails=='monthly_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(monthly_fee) as monthly_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}        
							if($fee_dtails=='trans_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(transport_fee) as transport_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='annual_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(annual_dev) as annual_dev  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='tie_belt_diary'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(tie_belt_diary) as tie_belt_diary  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='book_cover_copies'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(book_cover_copies) as book_cover_copies  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='fine_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(fine) as fine  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='other_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(other) as other  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}
							  }
						
						
						else if($paymode=='online'){
							  if($fee_dtails=='adm_form'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_form) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}
						   if($fee_dtails=='adm_charge'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_charge) as adm_charge  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}	    
							if($fee_dtails=='monthly_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(monthly_fee) as monthly_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}        
							if($fee_dtails=='trans_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(transport_fee) as transport_fee  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='annual_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(annual_dev) as annual_dev  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='tie_belt_diary'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(tie_belt_diary) as tie_belt_diary  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='book_cover_copies'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(book_cover_copies) as book_cover_copies  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='fine_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(fine) as fine  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='other_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(other) as other  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}
							  }	
							  
							  
							   else{
							  if($fee_dtails=='adm_form'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_form) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}
						   if($fee_dtails=='adm_charge'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_charge) as adm_charge  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}	    
							if($fee_dtails=='monthly_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(monthly_fee) as monthly_fee  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}        
							if($fee_dtails=='trans_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(transport_fee) as transport_fee  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}		
							if($fee_dtails=='annual_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(annual_dev) as annual_dev  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}		
							if($fee_dtails=='tie_belt_diary'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(tie_belt_diary) as tie_belt_diary  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}		
							if($fee_dtails=='book_cover_copies'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(book_cover_copies) as book_cover_copies  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}		
							if($fee_dtails=='fine_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(fine) as fine  from `student_payments` where (date BETWEEN '$from' AND '$to') and pay_mode='$paymode'")) ;}		
							if($fee_dtails=='other_fee'){
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(other) as other  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;}
							  }  
								?>
                                 <tr align="right">
                                 		<?php if($fee_dtails=='adm_form'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Form Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['adm_form']; ?></td>
                                        <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='adm_charge'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Admission Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['adm_charge']; ?></td>
                                        <td align="center" colspan="3"></td>
                                        
                                        <?php } ?>
                                        <?php if($fee_dtails=='monthly_fee'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Monthly Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['monthly_fee']; ?></td>
                                         <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='trans_fee'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Transport Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['transport_fee']; ?></td>
                                        <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='annual_fee'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Annual Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['annual_dev']; ?></td>
                                         <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='tie_belt_diary'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Tie/Belt/Diary Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['tie_belt_diary']; ?></td>
                                        <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='book_cover_copies'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Book/Cover/Copies Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['book_cover_copies']; ?></td>
                                        <td align="center" colspan="3"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='fine_fee'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Fine Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['fine']; ?></td>
                                        <td align="center" colspan="4"></td>
                                        <?php } ?>
                                        <?php if($fee_dtails=='other_fee'){ ?>
                                  		<th colspan="5" style="text-align:center">Total Other Fee Collected</th>
                                        <td align="center"><?php echo "₹ ".$query['other']; ?></td>
                                         <td align="center" colspan="3"></td>
                                        <?php } ?>
                                  </tr>
                    <?php if(ceil($pages)>1){
							 ?>
                             <tr>
                              <td colspan="17">
                             <center>
                             <ul class="pagination">
                               <?php 
							     if($page>1){
									   ?>
                                  
										<li><a href ="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&fee_dtails=<?php echo $fee_dtails;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&fee_dtails=<?php echo $fee_dtails;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&fee_dtails=<?php echo $fee_dtails;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&fee_dtails=<?php echo $fee_dtails;?>&page=<?php echo $page;?>">next</a></li>
										   <?php 
										   
											}
							   
							   ?>
                               </ul>
                               </center>
                               </td>
                             </tr>
                             </table>
                             <?php
	}

?> 
<!----------- fee row end-------> 


