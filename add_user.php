<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	 
  } 
  else{
    header("Location:index.php");
  }
  include "dbconnection.php";
$sql="select id from users order by id desc";
$query=mysqli_fetch_array(mysqli_query($link,$sql));
$id=$query['id']+1;
?>
<?php
if(isset($_POST['submit']))
{
	$date=$_POST['date'];
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$role=$_POST['role'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pub=0;
	$sql="INSERT INTO `users`(`id`, `username`, `password`, `role`, `name`, `mobile`, `email`, `date`, `published`) VALUES ('','$username','$password','$role','$name','$mobile','$email','$date','$pub')";
	$res=mysqli_query($link,$sql);
	if($res)
	{
		echo "<script>alert('Successfully Added!');</script>";
		echo "<script>location='user.php';</script>";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User</title>

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
           <li><a href="add_user.php" class="btn btn-danger">Add Users</a></li>
           </ul>
         
      </div><!-- end of sidebar-->
      <div class="col-md-10">
       
    <div class="row">
        <div class="col-md-9">
      <div class="panel panel-default">
                   <div class="panel-heading"><h3 class="text-danger"><i class="fa fa-key"></i> Register User</h3></div>
                   <div class="panel-body">
                      <form method="post" action="add_user.php">
                      <div class="row">
                            <div class="col-md-2"><label>Date:</label></div>
                            <div class="col-md-4"><input type="date" name="date" class="form-control" required></div>
                       </div>
                       <div class="row">
                        <br>
                            <div class="col-md-2"><label>User Id:</label></div>
                            <div class="col-md-4"><input type="text" name="id" value="<?php echo $id; ?>" class="form-control" required></div>
                        </div>
                         
                          <div class="row">
                           <br>
                            <div class="col-md-2"><label>Name:</label></div>
                            <div class="col-md-4"><input type="text" name="name" class="form-control" required></div>
                          </div>
                        
                       
                         <div class="row">
                         <br>
                            <div class="col-md-2"><label>Mobile:</label></div>
                            <div class="col-md-4"><input type="text" name="mobile" class="form-control" required></div>
                            
                         </div><!-- end of row for Phone -->
                         <div class="row">
                         <br>
                           
                            <div class="col-md-2"><label>Email:</label></div>
                            <div class="col-md-4"><input type="email" name="email" class="form-control" required></div>
                         </div><!-- end of row for Email&category -->
                    
                       <div class="row">
                       <br />
                            <div class="col-md-2"><label>Role:</label></div>
                            <div class="col-md-4"><select name="role" class="form-control">
                                <option value="0">--Select One--</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select></div>
                         </div><!-- end of row for Branch & role-->
                        
                        <div class="row">
                         <br>
                            <div class="col-md-2"><label>Username:</label></div>
                            <div class="col-md-4"><input type="text" name="username" class="form-control" required></div>
                         </div>
                         <div class="row">
                         <br />
                            <div class="col-md-2"><label>Password:</label></div>
                            <div class="col-md-4"><input type="text" name="password" class="form-control" required></div>
                         </div><!-- end of row for username & password -->
                       
                         <div class="row">
                         <br>
                            
                            <div class="col-md-12"><input type="submit" name="submit" class="btn btn-default center-block" value="Add" style="width:100px;" required></div>
                         </div><!-- end of row for Manager -->

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
