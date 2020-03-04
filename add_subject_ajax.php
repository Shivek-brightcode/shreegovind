<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
		$cls=$_GET['cls'];     
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
  //var_dump($cls);
	include "dbconnection.php";   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Result</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
</head>
<body>
  <?php //if($_GET['page']!=''){include "demoheader.php";}?>
   <div class="container">
     <div class="row">
     	<div class="container-fluid">
        <form action="class_wise_add.php" method="post">			
		</div>
		</form>
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    <th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;">Add Subject Details</th>                    	
                    </thead>
				<?php 
				$sql2 = "SELECT * FROM class_subject WHERE class='$cls'";
				$query=mysqli_query($link,$sql2);
				$subject = mysqli_fetch_all($query);	
				//print_r($subject);
				$rowcount2 = count($subject);
				//echo $rowcount2;
				?>
                	<thead>                    	                    	
                    	<th style="text-align:center">Roll NO</th>
                    	<th  style="text-align:center">Name</th> 
						<?php for($j=0;$j<$rowcount2;$j++){?>
							<th><?php echo $subject[$j]['2'];?></th>
						<?php }?>                  	
                    	<th style="text-align:center">Add Marks</th>                      
                    </thead>
 <?php
   $count=12;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;	
 	$sql="SELECT name,roll_no,admission_no FROM new_registration WHERE class='$cls' limit $offset, $count";
	$sql1="select count(admission_no) as count from `new_registration` WHERE class='$cls'";
	$sql2 = "SELECT * FROM class_subject WHERE class='$cls'";
	
    $rs=mysqli_query($link,$sql);	
	$rowcount=mysqli_query($link,$sql1);

	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;	
	if(mysqli_num_rows($rs)>0){
	while($result=mysqli_fetch_array($rs)){
			?>
            <tr>               
				<td style="text-align:center"><?php echo $result['roll_no']; ?></td>
                <td style="text-align:center"><?php echo $result['name']; ?></td>
				<?php 
				$sql3 = "SELECT * FROM student_result WHERE class='$cls' AND roll_no='$result[roll_no]'";
				//echo $sql3;
				$query3 = mysqli_query($link,$sql3);				
				$marks = mysqli_fetch_assoc($query3);
				//print_r($marks);				
				for($j=0;$j<$rowcount2;$j++){
					
					?>
					<td><?php echo $marks['subject_marks'];?></td>
				<?php }?>
				<td style="text-align:center">
                <a href="add_subject.php?student_id=<?php echo $result['admission_no'];?>" class="on-default edit-row"><i class="fa fa-plus"></i></a>             
                 
                 <!-- <?php if($role=='admin'){ ?>
                  <a href='view_student.php?student_id=<?php echo $result['admission_no']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_student.php?student_id=<?php echo $result['admission_no']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-edit"></span> </a>&nbsp;&nbsp;
  
				  <a href='delete_student.php?student_id=<?php echo $result['admission_no']; ?>' ><span class="fa fa-trash"></a>
                   <?php } else if($role=='user') { ?> 
                   
                   <a href='view_student.php?student_id=<?php echo $result['admission_no']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_student.php?student_id=<?php echo $result['admission_no']; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-edit"></span>  </a>
                   <?php } ?>           
                 </td> -->
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
                                  
										<li><a href ="search_class_wise.php?cls=<?php echo $cls;?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="search_class_wise.php?cls=<?php echo $cls;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="search_class_wise.php?cls=<?php echo $cls;?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="search_class_wise.php?cls=<?php echo $cls;?>&page=<?php echo $page;?>">next</a></li>
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
