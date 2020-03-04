<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  
  } 
  else{
    header("Location:index.php");
  }

?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Admission No</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Admission Date</th>
                                   <th style="text-align:center">Paid Amount</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=10;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `student_payment_updation` limit $offset, $count";
	$sql1="select count(admission_no) as count from `student_payment_updation`";
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
                                   <td align="center"><?php echo $result['name']; ?></td>
                                   <td align="center"><?php echo $result['father_name']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?> </td>
                                   <td align="center"><?php echo $result['admission_date']; ?></td>
                                  
                                   <td align="center"><?php echo $result['payable_amount']; ?></td>
                                   
            <td align="center"><a href="print_income_report.php?page=report&payable_amount=<?php echo $result['payable_amount'];?>&admission_no=<?php echo $result['admission_no'];?>&date=<?php echo $result['date'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                                <?php
								$sql="select sum(payable_amount) as payamount from `student_payment_updation`";
								$rs=mysqli_fetch_array(mysqli_query($link,$sql));
								 ?>
                                <tr>
                              <td colspan="8">
                            	<h4 align="center" class="text-danger">Total Income: <?php echo "₹ ".$rs['payamount']; ?></h4>
                              </td>
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
                                  
										<li><a href ="profit_loss_report.php?page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="profit_loss_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="profit_loss_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="profit_loss_report.php?page=<?php echo $page;?>">next</a></li>
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