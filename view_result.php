<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	   $id=$_GET['id'];
		
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
  //var_dump($session);
	include "dbconnection.php";
	$std_id=$_REQUEST["student_id"];
	?>
<!DOCTYPE html>
<html>
<head>
	<title>view-result</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

    <script>
	function myFunction() {
   // window.print();
   var divToPrint=document.getElementById('contains');
//var divToPrint=divToPrint1.concat(divToPrint2);
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
    newWin.close();
}
	</script>
</head>
<body>
<?php include "demoheader.php";?>		
<div class="container" id="contains">
<?php

$id=$_GET['student_id'];
$select="select * from student_result where id='$id'";
$datas=mysqli_query($link,$select);
$result=mysqli_fetch_array($datas);
?>
            <center>
            <div style="border:1px solid #181212; width:800px; margin-left:20px">
            <h4 style="margin:20px; text-align:center">School Management System</h4>
			
            
            <table width="700" cellpadding="0" cellspacing="0"  style="margin-left:20px;background-color:#F8F8F8;padding:20px;">
            <tr>
            	<td width="350">
                
                	<table width="350"  cellpadding="4" cellspacing="4">
                    <tr>
                      <td colspan="2"><h4>Student Result Information</h4></td>
                    </tr>
				<tr>
					<td>Roll No</td><td><?php echo "&nbsp;"."$result[roll_no]"; ?> </td>
			    </tr>												
				<tr>
					<td>Student Name</td><td> <?php echo "&nbsp;"."$result[name]"; ?></td>
				</tr>               								
				<tr>
					<td colspan="2"><h4>Subject Marks</h4></td>
				</tr>
				<tr>
					<td>Physics</td><td><?php echo "&nbsp;"."$result[physics]"; ?> </td>
				</tr>
                <tr>
					<td>Chemistry</td><td><?php echo "&nbsp;"."$result[chemistry]"; ?> </td>
				</tr>
                <tr>
					<td>Math</td><td><?php echo "&nbsp;"."$result[math]"; ?> </td>
				</tr>
                <tr>
					<td>Hindi</td><td><?php echo "&nbsp;"."$result[hindi]"; ?> </td>
				</tr>
                
                <tr>
					<td>English</td><td><?php  echo "&nbsp;"."$result[english]"; ?> </td>
				</tr>
               
              
			</table>
                
                </td>               
            </tr>
            </table>
	
    </div>
     </center>
			</div>
            <div class="row">
             <div class="col-lg-5">
            </div>
            <div class="col-lg-1">
                    <div class="2"> <input type="image" src="images/print.png" onClick="myFunction()"></div>
            </div>
            
            <div class="col-lg-1"> 
            <div class="col-lg-3"><a href="search_session_wise.php" style="text-decoration:none;"><input type="button"  style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></div>
            </div>
            </div>
           
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
</body>
</html>