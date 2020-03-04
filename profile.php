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
  ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <legend style=" color:#e46809;">User Profile</legend>
               
        	<form action="#" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<div class="row">
                        	
                           
                            
                            	<div class="row">
                                	<div class="col-lg-3 col-md-3" ><b>UserName:</b></div>
                                    <div class="col-lg-6 col-md-6" >
                                    	<input type="text" name="username" id="username" readonly="readonly" class="form-control" value="<?php echo $user; ?>"/>
                                        
                                    </div>
                                </div><br />
                                	<div class="row">
                                	<div class="col-lg-3 col-md-3" ><b>Old Password:</b></div>
                                    <div class="col-lg-6 col-md-6" >
                                    	<input type="text" name="oldpass" id="oldpass" class="form-control" value=""/>
                                        
                                    </div>
                                </div><br />
                           		<div class="row">
                                	<div class="col-lg-3 col-md-3" ><b>New Password:</b></div>
                                    <div class="col-lg-6 col-md-6" >
                                    	<input type="text" name="newpass" id="newpass" class="form-control" value=""/>
                                        
                                    </div>
                                </div><br /><br />
                           <div align="right" class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                    	      <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                           </div>
                 
              </div>
        </div>
        </div>
         </form>
       </div><!-- end of col-md-12 -->
   </div><!-- end of row -->
  </div><!-- end of container -->
 
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
 <?php
if(isset($_POST['submit']))
{
	include "dbconnection.php";
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	$username=$_POST['username'];
	$sql="SELECT password FROM `admin_login` where role='$role' and username='$username'";
	 $result=mysqli_fetch_array(mysqli_query($link,$sql));
	// echo $result['password'];
	if($result['password']==$oldpass)
	{
		$query="UPDATE `admin_login` SET `password`='$newpass' WHERE username='$username' and role='$role'";
		$rs=mysqli_query($link,$query);
		if($rs)
		{
			echo "<script>alert('your password successfully changed!');</script>";
		}
	}
	else{echo "<script>alert('you are entering wrong old password!');</script>";}
	
}

?>