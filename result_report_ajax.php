<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
		$cls=$_GET['cls'];
         $id=$_GET['id'];
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
<title>View Session Wise</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

</head>

<body>

  <?php //if($_GET['page']!=''){include "demoheader.php";}?>
   <div class="container">

     <div class="row">
   
     	<div class="container-fluid">
        <form action="class_wise_result.php" method="post">
 			
		</form>
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    	<th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;"> Student Marks Details</th>
                    	
                    </thead>
                	<thead>
                    	<th style="text-align:center">Roll No</th>
                    	<th  style="text-align:center">Name</th>
                    	<th style="text-align:center">Science</th>
                    	<th style="text-align:center">Social Science</th>
                    	<th style="text-align:center">Math</th>
                    	<th  style="text-align:center">Hindi</th>
                    	<th style="text-align:center">English</th>  
						<th style="text-align:center">Action</th>
                    </thead>
  <?php
   $count=12;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;	
 	$sql="SELECT name,roll_no,admission_no FROM new_registration  ";
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
	//if(isset($_POST['physics'])){		
 	$sql2="SELECT sci,s_sci,math,hindi,english FROM `student_result` INNER JOIN new_registration ON student_result.id = new_registration.admission_no where new_registration.admission_no=$a_id";	
	//$sql2="SELECT physics,chemistry,math,hindi,english FROM `student_result`";
	//print_r($sql2);die;
    $rs1=mysqli_query($link,$sql2);			
	$result1=mysqli_fetch_array($rs1);	
		//echo"<pre>";
	//print_r($result1);
	//}
			?>	
              <td style="text-align:center"><?php 
			  if(isset($result1['sci']))
			  {echo $result1['sci'];}
				  else{ echo '-';} ?></td>			
                <!--<td style="text-align:center"><?php echo $result1['physics']; ?></td>-->
                <td style="text-align:center"><?php 
			  if(isset($result1['s_sci']))
			  {echo $result1['s_sci'];}
				  else{ echo '-';} ?></td>	
                <td style="text-align:center"><?php 
			  if(isset($result1['math']))
			  {echo $result1['math'];}
				  else{ echo '-';} ?></td>
                <td style="text-align:center"><?php 
			  if(isset($result1['hindi']))
			  {echo $result1['hindi'];}
				  else{ echo '-';} ?></td>
               <td style="text-align:center"><?php 
			  if(isset($result1['english']))
			  {echo $result1['english'];}
				  else{ echo '-';} ?></td>          
                <td style="text-align:center">
                <a href="add_student-marks.php?student_id=<?php echo $result['admission_no'];?>" class="on-default edit-row"><i class="fa fa-plus"></i></a>
				<a href="view_result.php?student_id=<?php echo $result1['id'];?>" class="on-default edit-row"><i class="fa fa-print"></i>
               </a>
               <!--<a href="room_delete.php?student_id=<?php echo $r_id; ?>" onClick="return confirm('Are you sure?')" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>-->            
                 </td>
                 </tr>               
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
