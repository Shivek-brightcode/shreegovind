<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $from=$_GET['from'];
	  $to=$_GET['to'];
	  $page=$_GET['page'];
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
                                   <th style="text-align:center">User</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Months</th>
                                   <th style="text-align:center">Monthly Fee</th>
                                   <th style="text-align:center">Fine</th>
                                   <th style="text-align:center">Total Fee</th>
                                   <th style="text-align:center">Amnt Paid</th>
                                   <th style="text-align:center">Dues</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=8;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payments` where (date BETWEEN '$from' AND '$to') order by date desc  limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payments` where (date BETWEEN '$from' AND '$to') order by date desc ";
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
                                   <td align="center"><?php echo $result['user']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?></td>
                                   <td align="center"><?php echo $result['date_from']." to ".$result['date_to']; ?></td>
                                   <td align="center"><?php echo $result['monthly_fee']; ?></td>
                                   <td align="center"><?php echo $result['fine']; ?></td>
                                   <td align="center"><?php echo $result['total_fee']; ?></td>
                                   <td align="center"><?php echo $result['payable_amount']; ?></td>
                                    <td align="center"><?php echo $result['dues_amount']; ?></td>
                                   <td align="center"><a href="print_fee_report.php?page=fee-report&admission_no=<?php echo $result['admission_no'];?>&id=<?php echo $result['id'] ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                            
                             <?php if(ceil($pages)>1){
							 ?>
                             <tr>
                              <td colspan="17">
                             <center>
                             <ul class="pagination">
                               <?php 
							     if($page>1){
									   ?>
                                  
										<li><a href ="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="fee_detail_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $page;?>">next</a></li>
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