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
        <form action="add_promote_student.php" method="post">	
		
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    	<th  style="font-size:18px;background-color:#06296b; color:#E4D6D6;"> Student Name</th>
                    	
                    </thead>
                	<tbody>
					
 <?php
   $count=12;
	$offset=0;
	$page=$_GET['page'];
	$offset=$page*$count;	
 	$sql="SELECT * FROM new_registration WHERE class='$cls' limit $offset, $count";
	$sql1="select count(admission_no) as count from `new_registration` WHERE class='$cls'";
    $rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;	
	if(mysqli_num_rows($rs)>0){
	while($result=mysqli_fetch_array($rs)){
			?>
            <tr>              
                <td ><input type="checkbox" name="name" value="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></td>                                                                 
            </tr>
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
<button type="submit" name="submit" class="btn btn-success">save</button>										
</form>		
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>  	
</body>
</html>
