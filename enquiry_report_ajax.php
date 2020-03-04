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
                                   <th style="text-align:center">Enquiry Id</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Gender</th>
                                   <th style="text-align:center">DOB</th>
                                   <th style="text-align:center">Admission Date</th>
                                    <th style="text-align:center">Time</th>
                                    <th style="text-align:center">Reference</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include "dbconnection.php";
    $count=10;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `enquiry_details` where (date BETWEEN '$from' AND '$to') order by date desc  limit $offset, $count";
	$sql1="select count(e_id) as count from `enquiry_details` where (date BETWEEN '$from' AND '$to') order by date desc ";
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                   <td align="center"><?php echo $result['e_id']; ?></td>
                                   <td align="center"><?php echo $result['date']; ?></td>
                                   <td align="center"><?php echo $result['name']; ?> </td>
                                   <td align="center"><?php echo $result['gender']; ?> </td>
                                   <td align="center"><?php echo $result['dob']; ?></td>
                                   <td align="center"><?php echo $result['Admission_date']; ?></td>
                                   <td align="center"><?php echo $result['time']; ?></td>
                                    <td align="center"><?php echo $result['refrence']; ?></td>
                                   <td align="center"><a href="print_enquiry_report.php?page=report&e_id=<?php echo $result['e_id'];?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
								?>
                         
                             <?php if(ceil($pages)>1){
							 ?>
                             <tr>
                              <td colspan="9">
                             <center>
                             <ul class="pagination">
                               <?php 
							     if($page>1){
									   ?>
                                  
										<li><a href ="enquiry_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="enquiry_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="enquiry_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="enquiry_report.php?to=<?php echo $to;?>&from=<?php echo $from;?>&page=<?php echo $page;?>">next</a></li>
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