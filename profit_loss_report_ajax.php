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
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Total Income</th>
                                    <th style="text-align:center">Salary Expenses</th>
                                    <th style="text-align:center">Daily Expenses</th>
                                    <th style="text-align:center">Total Expenses</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
                                 
<?php 
include_once "dbconnection.php";
    
	
	$sql="select sum(net_payment) as net_payment  from `staff_payment` where (date BETWEEN '$from' AND '$to')";
	$rs=mysqli_fetch_array(mysqli_query($link,$sql));
	
	$sql1="select sum(amount) as amount  from `add_expenditure` where (date BETWEEN '$from' AND '$to')";
	$rs1=mysqli_fetch_array(mysqli_query($link,$sql1));
	$cal=$rs['net_payment'] + $rs1['amount'];
	
	$sql2="select sum(payable_amount) as payable_amount  from `student_payment_updation` where (date BETWEEN '$from' AND '$to')";
	$result=mysqli_fetch_array(mysqli_query($link,$sql2));
	$profit=$result['payable_amount'] - $cal;
	$_SESSION['income']=$result['payable_amount'];
	$_SESSION['expenses']=$cal;

?>
                 <tr>
                      <td align="center"><?php echo "₹ ".$result['payable_amount']; ?></td>  
                      <td align="center"><?php echo "₹ ".$rs['net_payment']; ?></td> 
                       <td align="center"><?php echo "₹ ".$rs1['amount']; ?></td>
                       <td align="center"><?php echo "₹ ".$cal; ?></td>          	
                              
                     <td align="center"><a href="print_profit_loss_report.php?pagename=profit-loss"><span class="fa fa-print"></span></a></td>
                     
                </tr>
                                
                  <tr>
                  <td align="center" colspan="5">
				  <h4 align="center" class="text-danger">Total Profit:&nbsp;
				  <?php if($profit<'0'){echo "₹ "."0"; $_SESSION['profit']='0';}else{ echo "₹ ".$profit;$_SESSION['profit']=$profit;} echo "<br><br>";?>
                  </h4>
                  <h4 align="center" class="text-danger">Total Loss:&nbsp;
                  <?php if($profit>'0'){echo "₹ "."0";$_SESSION['loss']='0';} else{ echo "₹ ".$profit;$_SESSION['loss']=$profit; }?>
                  </h4>
                  </td>
                  </tr>              
                              
                             </table>

