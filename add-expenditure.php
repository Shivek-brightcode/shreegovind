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
 include('dbconnection.php');
 if(isset($_POST['save'])){
	 
	 $date=$_POST['exp_date'];
	 $pname=$_POST['pname'];
	$bill=$_POST['bill_no'];
	$particular=$_POST['particular'];
	$amt=$_POST['amount'];
	
	
	$query="INSERT INTO `add_expenditure`(`exp_id`, `date`, `person`, `billno`, `particular`, `amount`, `user`) VALUES ('','$date','$pname','$bill','$particular','$amt','$user')";
   $result=mysqli_query($link,$query);
   if($result){
	   echo "<script>alert('Saved Successfully');</script>";
	    header("Location:add-expenditure.php?page-name=add-expenditure");
	   echo "<script>location='add-expenditure.php?page-name=add-expenditure'</script>";
   }
 }
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Expenditure</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />


</head>

<body bgcolor="#d09f9f;">

  <?php include "demoheader.php";?>
   <div class="container" style="position:relative;">
     <div><div class="row">
     	<legend>Add Expenditure</legend>
       	<div class="container-fluid">
	<form action="" method="post">            	
                <div class="row">
            	<div class="col-md-1"><b>Date:</b></div>
            	<div class="col-md-2"><input type="date" name="exp_date" id="exp_date" class="form-control" />
                <!--	<script>
						Date.prototype.toDateInputValue = (function() {
							var local = new Date(this);
							local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
							return local.toJSON().slice(0,10);
							});
						document.getElementById('exp_date').value = new Date().toDateInputValue();
					</script> -->
                </div>
                </div>
                
                <br />
                 <div class="row">
            	<div class="col-md-1 col-lg-1 col-sm-1"><b>Person Name:</b></div>
            	<div class="col-md-2 col-sm-1"><input type="text" name="pname" id="pname" class="form-control" /></div>
                	
                </div> 
                <br />
                 <div class="row">
            	<div class="col-md-1 col-lg-1 col-sm-1"><b>Bill No:</b></div>
            	<div class="col-md-2 col-sm-1"><input type="text" name="bill_no" id="bill_no" class="form-control" /></div>
                	
                </div>  
                       <br /> 
                         <div class="row">
          
                      <div class="col-md-1 col-lg-1 col-sm-1"><b>Particulars:</b></div>
                      <div class="col-md-2"><textarea name="particular" id="particular" rows="2" class="form-control" style="resize:vertical"/></textarea></div>
                        </div><!-- end of paddress row 1-->
                        <br/>
                         <div class="row">
            	<div class="col-md-1 col-lg-1 col-sm-1"><b>Amount:</b></div>
            	<div class="col-md-2 col-sm-1"><input type="text" name="amount" id="amount" class="form-control" /></div>
                	
                </div> 
                <br />
                  <div>
            	<div class="col-md-2 col-sm-2" style="text-align:center;"><input type="image" src="images/save.png"  name="save" id="save" value="Save" /></div>
                	
                </div>   
                        <div class="col-md-6"></div>
          </form>
     </div><!-- end of row --></div>
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
   
   
    <?php 
 
 ?> 	
</body>
</html>
