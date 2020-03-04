<?php
session_start();
 include "dbconnection.php"; 
if(isset($_POST['submit']))
{
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $flag=false;
 $sql="select * from admin_login where username='$user' and password='$pass'";
		 $rs=mysqli_query($link,$sql);
		   while($result=mysqli_fetch_array($rs)){
			   			
			            $flag=true;
					    $_SESSION['user']=$user;
						$_SESSION['role']=$result['role'];
				} 
		    if($flag===true){
				echo "<script>location='home.php?pagename=home'</script>";
				header("Location:home.php");
				//exit();
				//echo "user:".$_SESSION['user'];
			}
	       else if($flag==false){
			  
			  ?>
			     <script>
				 alert('Invalid Usename And Password!!');
			     document.getElementById("logstatus").innerHTML="<center>Wrong username or password!!</center>";
			   </script>
			  <?php
		   }	  
}
?>
<html>
<head> 
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<title>Login</title>
<body>
 <noscript>
   Please enable javascript of your browser
 </noscript>
 <div class="container">
  
   <div class="row">
 
  <div class="col-md-4" >
  </div>
    <div class="col-md-4" id="login">
	   <div class="panel panel-success">
		     <div class="panel-heading"><h4> LOGIN</h4>	  </div>
			     <div class="panel-body">
	    <form action="" method="post" class="bs-example bs-example-form" role="form">
		<div class="input-group">
		   <span class="input-group-addon"><i class="fa fa-user"></i></span>
		   <input type="text" name="username" placeholder="username" class="form-control">
         </div><!-- input group closed-->
         <br>
            <div class="input-group">
		   <span class="input-group-addon"><i class="fa fa-lock"></i></span>
		   <input type="password" name="password" placeholder="password" class="form-control">
            </div> 
            
            <br>
            <div class="input-group center-block">
			   <input type="submit" name="submit" class="btn  btn-primary  center-block"  value="Login" style="width:100%">
			 </div>
	   <div id="logstatus" style="visibility:none;" class="text-danger">
	      
	   </div>
		
		</form>
		</div>
		</div>
	
	 </div>
	 
	<div class="col md-4"></div>
	</div><!-- row closed -->
 </div><!-- container closed -->
 
   <script src="../bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    
</body>

</html>