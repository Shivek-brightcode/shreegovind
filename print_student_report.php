<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
    $user=$_SESSION['user'];
	 $admission_no=$_GET['admission_no'];
	  
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
<title>Student Details</title>
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
               
               <th  style="text-align:center;"><font size="+1">Adm No.</font></th>
               <th  style="text-align:center;"><font size="+1">Adm Date</font></th>
               <th  style="text-align:center;"><font size="+1">Name</font></th>
               <th  style="text-align:center;"><font size="+1">Father</font></th>
                <th  style="text-align:center;"><font size="+1">Mother</font></th>
                <th  style="text-align:center;"><font size="+1">Session</font></th>
                <th  style="text-align:center;"><font size="+1">Roll No</font></th>
               <th  style="text-align:center;"><font size="+1">Class</font></th>
               <th  style="text-align:center;"><font size="+1">Section</font></th>
               <th  style="text-align:center"><font size="+1">DOB</font></th>
               <th  style="text-align:center"><font size="+1">Gender</font></th>
               <th  style="text-align:center"><font size="+1">Blood Group</font></th>
               <th  style="text-align:center"><font size="+1">Religion</font></th>
              <th  style="text-align:center"><font size="+1">Caste</font></th>
             
             </thead>
             <?php 
			 include "dbconnection.php";
			
			 $sql2="select * from `new_registration` where admission_no=$admission_no";
			       $ex=mysqli_query($link,$sql2);
				 
				  while($resultset=mysqli_fetch_array($ex)){
  			  ?>
             <tr style="text-align:start;" valign="middle">
               <td style="text-align:center;"><?php echo $resultset['admission_no'];?></td>
               <td style="text-align:center"><?php echo $resultset['admission_date'];?></td>
               <td style="text-align:center"><?php echo $resultset['name'];?></td>
               <td style="text-align:center"><?php echo $resultset['father_name'];?></td>
                <td style="text-align:center"><?php echo $resultset['mother_name'];?></td>
                 <td style="text-align:center"><?php echo $resultset['session'];?></td>
                  <td style="text-align:center"><?php echo $resultset['roll_no'];?></td>
               <td style="text-align:center"><?php echo $resultset['class'];?></td>
                <td style="text-align:center"><?php echo $resultset['section'];?></td>
               <td style="text-align:center"><?php echo $resultset['dob'];?></td>
               <td style="text-align:center"><?php echo $resultset['gender'];?></td>
               <td style="text-align:center"><?php echo $resultset['blood_group'];?></td>
               <td style="text-align:center"><?php echo $resultset['religion'];?></td>
              <td style="text-align:center"><?php echo $resultset['caste'];?></td>
           
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
		 window.location="student_list_report.php?pagename=student-report";
	 }
	 else{
		 window.location="student_list_report.php?pagename=student-report";
	 }
 }
</script>
</body>
</html>