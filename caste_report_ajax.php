<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $caste=$_GET['caste'];
	  
  } 
  else{
    header("Location:index.php");
  }

?>
<form action="#" method="" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<a href="export_caste_report.php?caste=<?php echo $caste; ?>" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export MySQL Data to CSV/Excel File</a>
				</div>
			</div>
		</form>
<table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Adm Date</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Roll NO</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Section</th>
                                   <th style="text-align:center">Father</th>
                                   <th style="text-align:center">Mother</th>
                                   <th style="text-align:center">DOB</th>
                                   <th style="text-align:center">Age</th>
                                   <th style="text-align:center">Gender</th>
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
	
	$sql="select * from `new_registration` where caste='$caste'  limit $offset, $count";
	$sql1="select count(admission_no) as count from `new_registration` where caste='$caste'";
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
                                   <td align="center"><?php echo $result['roll_no']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?></td>
                                   <td align="center"><?php echo $result['section']; ?></td>
                                   <td align="center"><?php echo $result['father_name']; ?></td>
                                   <td align="center"><?php echo $result['mother_name']; ?></td>
                                   <td align="center"><?php echo $result['dob']; ?></td>
                                   <td align="center"><?php echo $result['age']; ?></td>
                                    <td align="center"><?php echo $result['gender']; ?></td>
                                   <td align="center"><a href="print_caste_report.php?page=caste-report&admission_no=<?php echo $result['admission_no'];?>&caste=<?php echo $caste; ?>"><span class="fa fa-print"></span></a></td
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
                                  
										<li><a href ="caste_wise_report.php?caste=<?php echo $caste;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="caste_wise_report.php?caste=<?php echo $caste;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="caste_wise_report.php?caste=<?php echo $caste;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="caste_wise_report.php?caste=<?php echo $caste;?>&page=<?php echo $page;?>">next</a></li>
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