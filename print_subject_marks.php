<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
    $user=$_SESSION['user'];
	 $admission_no=$_GET['admission_no'];
	  $status=$_GET['status']; 
	  $pre=$_GET['page']; 
  }
  else{
	  header("Location:index.php");
  } 
include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery-3.1.0.js"></script>
<title>Default list</title>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin:0;  /* this affects the margin in the printer settings */
}
@media print{
	#buttons{
			display:none;
		}
	#invoice{
    width: 720px;
   
    margin-top:-170px;
    margin-right: 40px;
  }
	}
</style>
</head>

<body>
    <div class="container">
     <div class="row">
       <div class="col-md-12">
			<center>
				<strong><font size="+2"> Mother's Convent Play School </font></strong><br />
				
				
			</center>
       </div><!-- col-md-12 closed -->
     </div><!-- End of row-->
 
     <div class="row">
      <div class="col-md-1"></div>
       <div class="col-md-14">
          <center> <table border="1" width="100%" height="100px">
             <thead bgcolor="#D6C9C9">
			           <th  style="text-align:center">SI No</th>
                       <th  style="text-align:center">Roll No</th>
						<th style="text-align:center">Name</th>
                    	<th style="text-align:center">Science</th>
                    	<th style="text-align:center">Social Science</th>
                    	<th style="text-align:center">Math</th>
                    	<th  style="text-align:center">Hindi</th>
                    	<th style="text-align:center">English</th>
             </thead>
             <?php 
			 include "dbconnection.php";			
			 $sql2="select * from `student_result`";
			 $ex=mysqli_query($link,$sql2);
			 $i=0;
			 while($resultset=mysqli_fetch_array($ex)){
  			  ?>
              <tr style="text-align:start;" valign="middle">
               <td style="text-align:center"><?php echo ++$i;?></td>
              <td style="text-align:center"><?php echo $resultset['roll_no']; ?></td>
                <td style="text-align:center"><?php echo $resultset['name']; ?></td>
               <td style="text-align:center"><?php echo $resultset['sci']; ?></td>
                <td style="text-align:center"><?php echo $resultset['s_sci']; ?></td>               
                <td style="text-align:center"><?php echo $resultset['math']; ?></td>
                <td style="text-align:center"><?php echo $resultset['hindi']; ?></td>
                <td style="text-align:center"><?php echo $resultset['english']; ?></td>
           
             </tr>
                <?php 
				 }
				 
				?>
          
          
           </table></center>
       </div><!-- col-md-12 closed -->

      <div class="col-md-1"></div>
     </div>
     <br /><div id="buttons">
     <center>
      <button type="button" class="btn btn-danger" onclick="window.print();" >Print</button>
     <button type="button" onclick="closeThis('<?php echo $pre; ?>');" class="btn btn-default">Close</button>
     </center></div>
   </div><!-- coantainer closed-->
<script>
  var a=$("#content").val();
 // alert(a);
 
 function closeThis(data){
	 page=data;
	 if(page==""){
		 window.location="search_class_wise_result.php?pagename=search_result";
	 }
	 else{
		 window.location="search_class_wise_result.php?pagename=search_result";
	 }
 }
</script>
</body>
</html>