<?php
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Sri Govind Middle & High School </title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
     <div class="row">
       <div class="col-md-12">
          <center>
			<img src="images/logo.jpeg" alt="" class="img-responsive" width="100" >
            <h1 class="text-success">Sri Govind Middle & High School </h1>
                <h4 > Hatia, Ranchi-834003</h4>
                <h4 > Phone No.: +91 - 9931122334 </h4>
                <h4 > Email: sghshatia@gmail.com</h4>
            <br/>
            <a href="https://www.brightcodess.com" target="_blank"><h3 class="text-danger " style="text-decoration:none; ">Powered By @Brightcode Software Services Pvt Ltd</h3></a>
          </center>
       </div><!-- end of col-md-12 -->
   </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
