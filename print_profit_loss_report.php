<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
    $user=$_SESSION['user'];
	 $employee_id=$_GET['employee_id'];
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
<title>Print Profit/Loss Report</title>
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
				<strong><font size="+2">School Management System</font></strong><br />
				
				
			</center>
       </div><!-- col-md-12 closed -->
     </div><!-- End of row-->
 
     <div class="row">
      <div class="col-md-1"></div>
       <div class="col-md-14">
          <center> <table border="1" width="100%" height="100px">
             <thead bgcolor="#D6C9C9">
               <th  style="text-align:center"><font size="+1">S.No.</font></th>
               <th  style="text-align:center;"><font size="+1">Total Income</font></th>
               <th  style="text-align:center;"><font size="+1">Total Expenses</font></th>
               <th  style="text-align:center;"><font size="+1">Total Profit</font></th>
               <th  style="text-align:center;"><font size="+1">Total Loss</font></th>
             
             </thead>
             <?php 
			 include "dbconnection.php"; ?>
			
			
             <tr style="text-align:start;" valign="middle">
               <td style="text-align:center"><?php echo ++$i;?></td>
                <td style="text-align:center;"><?php echo $_SESSION['income'];?></td>
                 <td style="text-align:center;"><?php echo $_SESSION['expenses'];?></td>
               <td style="text-align:center;"><?php echo $_SESSION['profit'];?></td>
               <td style="text-align:center"><?php echo $_SESSION['loss'];?></td>
              
             </tr>
              
          
          
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
		 window.location="profit_loss_report.php?pagename=profit-loss-report";
	 }
	 else{
		 window.location="profit_loss_report.php?pagename=profit-loss-report";
	 }
 }
</script>
</body>
</html>