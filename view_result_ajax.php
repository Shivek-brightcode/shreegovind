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
        <form action="search_class_wise_result.php" method="post"> 			
		
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    	<th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;"> Student Result Details</th>
                    	
                    </thead>
                	<thead>                    	                    	
                    	
                    	<th  style="text-align:center">Roll No</th>
						<th style="text-align:center">Name</th>
                    	<th style="text-align:center">Science</th>
                    	<th style="text-align:center">Social Science</th>
                    	<th style="text-align:center">Math</th>
                    	<th  style="text-align:center">Hindi</th>
                    	<th style="text-align:center">English</th>                      
                    </thead>
 <?php
   $count=12;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;	
 	//$sql="SELECT name,roll_no FROM new_registration WHERE class='$cls' limit $offset, $count";
 	 $sql="SELECT name,roll_no FROM new_registration WHERE class='$cls' limit $offset, $count";
	$sql1="select count(admission_no) as count from `new_registration` WHERE class='$cls'";
    $rs=mysqli_query($link,$sql);	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;	
	if(mysqli_num_rows($rs)>0){
	while($result=mysqli_fetch_array($rs)){
		$a_id=$result['admission_no'];
			?>
            <tr>               
                 <td style="text-align:center"><?php echo $result['roll_no']; ?></td>
                <td style="text-align:center"><?php echo $result['name']; ?></td>
	<?php		
 	//$sql2="SELECT sci,s_sci,math,hindi,english FROM `student_result` INNER JOIN new_registration ON student_result.roll_no = new_registration.admission_no where new_registration.admission_no=$a_id";	
	 $sql2="SELECT sci,s_sci,math,hindi,english FROM `student_result`";
	//print_r($sql2);die;
      $rs1=mysqli_query($link,$sql2);			
	  $result1=mysqli_fetch_array($rs1);	
		//echo"<pre>";
	//print_r($result1);
	//}
			?>								
                <td style="text-align:center"><?php echo $result1['sci']; ?></td>
                <td style="text-align:center"><?php echo $result1['s_sci']; ?></td>               
                <td style="text-align:center"><?php echo $result1['math']; ?></td>
                <td style="text-align:center"><?php echo $result1['hindi']; ?></td>
                <td style="text-align:center"><?php echo $result1['english']; ?></td>                                                             
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
  </tbody>
 </table>
 <center><a href="print_subject_marks.php" class="buttonsub">print</a></center>									
</form>	
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
