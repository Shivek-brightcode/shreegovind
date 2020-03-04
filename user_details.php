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
  }
  include "dbconnection.php";
$sql="select * from users where id='$id'";
$userdata=mysqli_fetch_array(mysqli_query($link,$sql));

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View User</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>



$(function() {
	$('#d_from').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#d_to').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
    

    <!-- Custom Fonts -->
    
    <style>
	hr.style13 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
	
}
.errspan {
    float: left;
    margin-right: 6px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
	font-size:20px;
	padding-left:10px;
}

	</style>
</head>

<body>
<?php include "demoheader.php";?>
   <div class="container">
      <div class="row" style="margin-top: 50px;">
      <div class="col-md-2" style="vertical-align: text-bottom;padding-top: 100px;">
         
            <ul type="none">
           <li><a href="" class="btn btn-danger">Add Users</a></li>
           </ul>
         
      </div><!-- end of sidebar-->
      <div class="col-md-10">
       
    <div class="row">
        <div class="col-md-9">
      <div class="panel panel-default">
                   <div class="panel-heading"><h3 class="text-danger"><i class="fa fa-key"></i> View User</h3></div>
                   <div class="panel-body">
                      <form method="post" action="">
                      <div class="row">
                            <div class="col-md-2"><label>Date:</label></div>
                            <div class="col-md-4"><?php echo $userdata['date'];  ?></div>
                       </div>
                       <div class="row">
                        <br>
                            <div class="col-md-2"><label>User Id:</label></div>
                            <div class="col-md-4"><?php echo $userdata['id'];  ?></div>
                        </div>
                         
                          <div class="row">
                           <br>
                            <div class="col-md-2"><label>Name:</label></div>
                            <div class="col-md-4"><?php echo $userdata['name'];  ?></div>
                          </div>
                        
                       
                         <div class="row">
                         <br>
                            <div class="col-md-2"><label>Mobile:</label></div>
                            <div class="col-md-4"><?php echo $userdata['mobile'];  ?></div>
                            
                         </div><!-- end of row for Phone -->
                         <div class="row">
                         <br>
                           
                            <div class="col-md-2"><label>Email:</label></div>
                            <div class="col-md-4"><?php echo $userdata['email'];  ?></div>
                         </div><!-- end of row for Email&category -->
             
                        <div class="row">
                         <br>
                            <div class="col-md-2"><label>Username:</label></div>
                            <div class="col-md-4"><?php echo $userdata['username'];  ?></div>
                         </div>
                       
                      </form>
                   </div><!-- end of panel-body -->
               </div><!-- end of panel -->
        </div>
    </div><!-- end of row for branch list -->
      </div><!-- end of body content -->
      <div class="col-md-2"></div>
   </div><!-- end of row-->
    
 </div><!-- end of container --> 


 <!--<script src="bootstrap/js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
