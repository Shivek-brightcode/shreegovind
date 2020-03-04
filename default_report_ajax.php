<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $status=$_GET['status'];
	   
	  
  } 
  else{
    header("Location:index.php");
  }

?>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Adm Date</th>
                                   <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Address</th>
                                   <th style="text-align:center">Total Fee</th>
                                   <th style="text-align:center">Amount Paid</th>
                                   <th style="text-align:center">Dues</th>
                               
                                    <th style="text-align:center">Status</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=6;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	if($status=='paid')
	{
		$sql="select * from `student_payment_updation` where dues_amount='0'  limit $offset, $count";
		$sql1="select count(admission_no) as count from `student_payment_updation` where dues_amount='0'";
		
	}
	
	else if($status=='unpaid')
	{
		$sql="select * from `student_payment_updation` where dues_amount>0 or payable_amount=''  limit $offset, $count";
		$sql1="select count(admission_no) as count from `student_payment_updation` where dues_amount>0 or payable_amount=''";
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
                                   <td align="center"><?php echo $result['admission_date']; ?></td>
                                   <td align="center"><?php echo $result['name']; ?> </td>
                                   <td align="center"><?php echo $result['father_name']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?></td>
                                   
                                   <td align="center"><?php echo $result['address']; ?></td>
                                    <td align="center"><?php echo $result['total_fee']; ?></td>
                                    <td align="center"><?php echo $result['payable_amount']; ?></td>
                                    <td align="center"><?php echo $result['dues_amount']; ?></td>
                                     <td align="center"><?php if($status=='paid'){echo $status;}else if($status=='unpaid'){echo $status;} ?></td>
                                   <td align="center"><a href="print_default_report.php?page=default-report&status=<?php echo $status;?>&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
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
                                  
										<li><a href ="default_list_report.php?status=<?php echo $status;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="default_list_report.php?status=<?php echo $status;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="default_list_report.php?status=<?php echo $status;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="default_list_report.php?status=<?php echo $status;?>&page=<?php echo $page;?>">next</a></li>
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