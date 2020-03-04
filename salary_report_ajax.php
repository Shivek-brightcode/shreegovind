<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $from=$_GET['from'];
	  $to=$_GET['to'];
  } 
  else{
    header("Location:index.php");
  }

?>

<form action="#" method="" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<a href="export_salary_report.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export MySQL Data to CSV/Excel File</a>
				</div>
			</div>
		</form>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                  
                                    <th style="text-align:center">Employee Id</th>
                                     <th style="text-align:center">Date</th>
                                    <th style="text-align:center">Employee Type</th>
                                    <th style="text-align:center">Employee Name</th>
                                    <th style="text-align:center">Designation</th>
                                    <th style="text-align:center">Mobile</th>
                                    <th style="text-align:center">Net Payment</th>
                                  
                                    <th style="text-align:center">Action</th>
                                  </tr>
                                 
<?php 
include_once "dbconnection.php";
    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select employee_id,date,employee_type,name,designation,mobile,net_payment  from `staff_payment` where (date BETWEEN '$from' AND '$to') limit $offset, $count";
	$sql1="select count(employee_id) as count from `staff_payment` where (date BETWEEN '$from' AND '$to') ";
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                    <td align="center"><?php echo $result['employee_id']; ?></td>
                                    <td align="center"><?php echo $result['date']; ?></td>
                                    <td align="center"><?php echo $result['employee_type']; ?></td>
                                    <td align="center"><?php echo $result['name']; ?></td>
                                    <td align="center"><?php echo $result['designation']; ?></td>
                                    <td align="center"><?php echo $result['mobile']; ?></td>
                                    <td align="center"><?php echo $result['net_payment']; ?></td>
                                  
                                  
                                   <td align="center"><a href="print_salary_exp_report.php?page=salary-exp-report&employee_id=<?php echo $result['employee_id'];?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                
                                
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                                <?php 
							$query= mysqli_fetch_array(mysqli_query($link,"select sum(net_payment) as payment  from `staff_payment` where (date BETWEEN '$from' AND '$to')")) ;

								?>
                                 <tr>
                                 		
                                  		<th colspan="6" style="text-align:center; color:#824243; font:bold;">Total Salary Expenditure</th>
                                        
                                        <td align="center" style=" font:bold;"><?php echo "₹ ". $query['payment']; ?></td>
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
                                  
										<li><a href ="salary_exp_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="salary_exp_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="salary_exp_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="salary_exp_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $page;?>">next</a></li>
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
