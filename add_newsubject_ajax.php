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
                    <th colspan="11" style="font-size:18px;background-color:#06296b; color:#E4D6D6;">Added Subjects</th>                    	
                    </thead>
                	<thead>                    	                    	
                    	<th style="text-align:center">Serial NO</th>
                    	<th  style="text-align:center">Class Name</th>                   	
                    	<th style="text-align:center">Subject Name</th>                      
                    </thead>
 <?php
   $count=15;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;	
 	$sql="SELECT * FROM class_subject WHERE class='$cls' limit $offset, $count";	
    $rs=mysqli_query($link,$sql);	
	$pages=$rownum/$count;	
	if(mysqli_num_rows($rs)>0){
        $i = 0;
	while($result=mysqli_fetch_array($rs)){ $i++;
			?>
            <tr>               
                 <td style="text-align:center"><?php echo $i; ?></td>
                <td style="text-align:center"><?php echo "<span style='text-transform:uppercase;font-weight:700;color:red'>".$result['class']."</span>"; ?></td>
				<td style="text-align:center"><?php echo "<span style='text-transform:uppercase;font-weight:700;color:green'>".$result['subject_name']."</span>";?></td>
                
            </tr>
    <?php }}?>
</table>
            </div><!-- end of table div -->
        </div><!-- end of container-fluid -->
     </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
