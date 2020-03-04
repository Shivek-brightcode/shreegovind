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
<?php 

if($fee_dtails=='adm_form'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Admission Form</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['adm_form']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
							    $page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_form) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr align="right">
                                 		
                                  		<th colspan="5" style="text-align:center">Total Form Fee Collected</th>
                                        
                                        <td align="center"><?php echo "₹ ".$query['adm_form']; ?></td>
                                        <td align="center"></td>	
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
}

?> 
<!-----------form fee row end-------> 

<!-----------start admission charge-------> 
<?php 

if($fee_dtails=='adm_charge'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Admission Charge</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['adm_charge']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(adm_charge) as adm_form  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr align="right">
                                 		
                                  		<th colspan="5" style="text-align:center">Total Admission Charge Collected</th>
                                        
                                        <td align="center"><?php echo $query['adm_form']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------Admission charge row end-------> 
<!-----------monthly fee row start-------> 
<?php 

if($fee_dtails=='monthly_fee'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Monthly Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['monthly_fee']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(monthly_fee) as monthly_fee  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Monthly fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['monthly_fee']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------monthly fee row end-------> 
<!-----------transport fee row start-------> 
<?php 

if($fee_dtails=='trans_fee'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Transport Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['transport_fee']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(transport_fee) as transport_fee  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Transport fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['transport_fee']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------transport fee row end-------> 
<!-----------Annual fee row start-------> 
<?php 

if($fee_dtails=='annual_fee'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Annual Dev. Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['annual_dev']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(annual_dev) as annual_dev  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Annual Dev. fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['annual_dev']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------annual dev. fee row end-------> 
<!-----------Tie Belt Diary fee row start-------> 
<?php 

if($fee_dtails=='tie_belt_diary'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Tie Belt Diary Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['tie_belt_diary']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(tie_belt_diary) as tie_belt_diary  from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Tie-Belt-Diary fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['tie_belt_diary']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------Tie Belt Diary fee row end-------> 
<!----------- book copy cover fee row start-------> 
<?php 

if($fee_dtails=='book_cover_copies'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Book Copy Cover Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['book_cover_copies']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(book_cover_copies) as book_cover_copies   from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Tie-Belt-Diary fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['book_cover_copies']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------book copy cover fee row end-------> 
<!----------- fine fee row start-------> 
<?php 

if($fee_dtails=='fine_fee'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Fine Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['fine']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(fine) as fine   from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Fine Collected</th>
                                        
                                        <td align="center"><?php echo $query['fine']; ?></td>
                                        <td align="center"></td>	
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
}

?>  
<!-----------Fine fee row end-------> 
<!----------- other fee row start-------> 
<?php 

if($fee_dtails=='other_fee'){
?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Others Fee</th>
                                  <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";

    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to')";
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
                                   
                                    <td align="center"><?php echo $result['other']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                             <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(other) as other   from `student_payments` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="5" style="text-align:center">Total Others fee Collected</th>
                                        
                                        <td align="center"><?php echo $query['other']; ?></td>
                                        <td align="center"></td>	
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
}
?>

<!-----------other fee row end-------> 