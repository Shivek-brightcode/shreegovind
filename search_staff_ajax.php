<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
		$type=$_GET['type'];
     
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
  //var_dump($session);
	include "dbconnection.php";   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff information</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

</head>

<body>

  <?php //include "demoheader.php";?>
   <div class="container">

     <div class="row">
     
     	<div class="container-fluid">
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    	<th colspan="11" style="font-size:18px;background-color:#B8B2B2;"> Staff Details</th>
                    	
                    </thead>
                	<thead>
                    	
                    	<th style="text-align:center">Employee Id</th>
                        <th style="text-align:center">Employee Type</th>
                    	<th style="text-align:center">Name</th>
                    	<th  style="text-align:center">Designation</th>
                    	<th style="text-align:center">Company PF No.</th>
                    	<th style="text-align:center">PF A/C No.</th>
                    	<th style="text-align:center">Income Tax</th>
                    	<th  style="text-align:center">Basic Salary</th>
                    	<th style="text-align:center">PF</th>
                        <th style="text-align:center">HRA</th>
                    	<th style="text-align:center">Action</th>
                        
                    </thead>
 <?php
 	 $count=1;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;
	
 	$sql="SELECT * FROM `staff_info` WHERE employee_type ='$type' limit $offset, $count";
	$sql1="SELECT count(employee_id) as count FROM `staff_info` WHERE employee_type ='$type'";
   	$rs=mysqli_query($link,$sql);
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	if(mysqli_num_rows($rs)>0){
	while($results=mysqli_fetch_array($rs)){
			?>
            <tr>
                
                   
                <td style="text-align:center"><?php echo $results['employee_id']; ?></td>
                 <td style="text-align:center"><?php echo $results['employee_type']; ?></td>
                <td style="text-align:center"><?php echo $results['name']; ?></td>
                <td style="text-align:center"><?php echo $results['designation']; ?></td>
                <td style="text-align:center"><?php echo $results['company_pf']; ?></td>
                <td style="text-align:center"><?php echo $results['pf_acc_no']; ?></td>
                <td style="text-align:center"><?php echo $results['income_tax_no']; ?></td>
                <td style="text-align:center"><?php echo $results['basic_salary']; ?></td>
                <td style="text-align:center"><?php echo $results['pf']; ?></td>
                 <td style="text-align:center"><?php echo $results['hra']; ?></td>
                 <td style="text-align:center">
                <?php if($role=='admin'){      ?> 
                  <a href='view_staff.php?employee_id=<?php echo $results['employee_id']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_staff.php?employee_id=<?php echo $results['employee_id']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-edit"></span> </a>&nbsp;&nbsp;
  
				  <a href='delete_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-trash"></a>
                   <?php } else if($role=='user'){ ?> 
                   <a href='view_staff.php?employee_id=<?php echo $results['employee_id']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_staff.php?employee_id=<?php echo $results['employee_id']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-edit"></span> </a>
  <?php } ?>          
                 </td>
                
            </tr>
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
                                  
										<li><a href ="staff-details.php?page=<?php echo $prev;?>&type=<?php echo $type;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="staff-details.php?page=<?php echo $i ?>&type=<?php echo $type;?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="staff-details.php?page=<?php echo $i ?>&type=<?php echo $type;?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="staff-details.php?page=<?php echo $page;?>&type=<?php echo $type;?>">next</a></li>
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
            </div><!-- end of table div -->
        </div><!-- end of container-fluid -->
     </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
