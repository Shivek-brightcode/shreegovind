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
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Employee Id</th>
                                   <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Employee Type</th>
                                   <th style="text-align:center">Net payment</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `staff_payment` limit $offset, $count";
	$sql1="select count(admission_no) as count from `staff_payment`";
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                    <td align="center"><?php echo $result['date']; ?></td>
                                   
                                   <td align="center"><?php echo $result['employee_id']; ?></td>
                                   <td align="center"><?php echo $result['name']; ?></td>
                                   <td align="center"><?php echo $result['employee_type']; ?></td>
                                   <td align="center"><?php echo $result['net_payment']; ?></td>
                                </tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                                <?php
								$sql="select sum(net_payment) as payment from `staff_payment`";
								$rs=mysqli_fetch_array(mysqli_query($link,$sql));
								 ?>
                                <tr>
                              <td colspan="7">
                            	<h4 align="center" class="text-danger">Total Salary Expenditure: <?php echo "₹ ".$rs['payment']; ?></h4>
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
                                  
										<li><a href ="salary_expense_report.php?page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="salary_expense_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="salary_expense_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="salary_expense_report.php?page=<?php echo $page;?>">next</a></li>
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