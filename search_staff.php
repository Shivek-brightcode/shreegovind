
 <?php
 error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
	
       ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search</title>

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
                    	<th colspan="11" style="font-size:18px; background-color:#231717;">Staff Details</th>
                    	
                    </thead>
                	<thead class="bg-warning">
                    	
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
  include "dbconnection.php";
  $search=$_GET['q'];
  if(!isset($_GET['page']) && $_GET['page']=='')
  {
	  $page=1;
  }else{
 $page=$_GET['page']; 
  }
 $count=10;
 $offset= ($page-1) * $count; 
 $ddata="SELECT * FROM `staff_info` WHERE name LIKE '%".$search."%' OR employee_id LIKE '%".$search."%' limit $offset,$count"; 
 $ddata1="SELECT count(employee_id) as count FROM `staff_info` WHERE name LIKE '%".$search."%' OR employee_id LIKE '%".$search."%'"; 
 
	 $data=mysqli_query($link,$ddata1);
	 $rs=mysqli_fetch_array($data);
 	  $numrows=$rs['count'];
	   $result=mysqli_query($link,$ddata);
	  $pages=$numrows/$count;
	while( $results =  mysqli_fetch_array($result))
   {  
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
                 <?php if($role=='admin'){ ?>
                  <a href='view_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-edit"></span> </a>&nbsp;&nbsp;
  
				  <a href='delete_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-trash"></a>
                   <?php } else if($role=='user'){ ?> 
                    <a href='view_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_staff.php?employee_id=<?php echo $results['employee_id']; ?>'><span class="fa fa-edit"></span></a>
  <?php } ?>            
                 </td>
                
            </tr>
                  <?php
								}//while closed
								
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
                                  
										<li><a href ="staff-details.php?page=<?php echo $page-1;?>&q=<?php echo $search;?>">Previous</a></li>
                                 
									   <?php
									   }//if closed
								for($i=1;$i<=ceil($pages);$i++){
									if($i==$page){
								   ?>
									   <li class="active"><a href="staff-details.php?page=<?php echo $i ?>&q=<?php echo $search;?>"><?php echo $i;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="staff-details.php?page=<?php echo $i ?>&q=<?php echo $search;?>"><?php echo $i;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="staff-details.php?page=<?php echo $page+1;?>&q=<?php echo $search;?>">Next</a></li>
										   <?php 
										   
											}
							   
							   ?>
                               </ul>
                               </center>
                               </td>
                             </tr>
                             <?php
				}
					?>
 </table><!-- end of table -->
            </div><!-- end of table div -->
        </div><!-- end of container-fluid -->
     </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
