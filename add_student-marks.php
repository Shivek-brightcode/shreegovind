<?php
//error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	   //$cls=$_GET['cls'];
  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";	 
  }
  include('dbconnection.php');
  //$std_id=$_REQUEST["student_id"];
 ?>
 <?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$roll_no=$_POST['roll_no'];	
	$sci=$_POST['sci'];
	$s_sci=$_POST['s_sci'];
	$math=$_POST['math'];
	$hindi=$_POST['hindi'];
	$english=$_POST['english'];
	$sql="INSERT INTO `student_result`(`name`,`roll_no`,`sci`,`s_sci`,`math`,`hindi`,`english`) VALUES ('$name','$roll_no','$sci','$s_sci','$math','$hindi','$english')";		
	$res=mysqli_query($link,$sql);
	print_r($res);die;
	if($res)
	{
		echo "<script>alert('Marks Sucessfully Added!');</script>";
		echo "<script>location='class_wise_result.php?pagename=result-report';</script>";
	}
}	 
?>
<?php
$id=$_GET['student_id'];
$select="select roll_no,name,admission_no from new_registration where admission_no='$id'";
$datas=mysqli_query($link,$select); $result=mysqli_fetch_array($datas);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
</head>
<body>
  <?php include "demoheader.php";?>
   <div class="container">
    <div class="row">
     	<div class="container-fluid">       	
            <form action="add_subject.php?pagename=add_subject" method="POST">
            			
                    	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b></b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    <input type="hidden" name="adm" id="adm" class="form-control" value="<?php echo $result['admission_no']; ?>" />                                       
                                    </div>
                                </div><br />
                      <div class="row">
                        	<legend style="color:#8815A5;">Add Student Marks </legend>
                             <div class="row">
                                <div class="col-md-2"><b>Roll No:</b></div>
                                <div class="col-md-3"><input type="text" name="roll_no" id="roll_no" value="<?php echo $result['roll_no']; ?>" class="form-control" /></div>
                            </div><br />
                			<div class="row">
                                <div class="col-md-2"><b>Name:</b></div>
                                <div class="col-md-3"><input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" class="form-control" /></div>
                            </div><br />
                            <div class="row">
							<label for="BrandPartner">Enter Subject Marks:-<span style="color:#FF0000"></span></label>
							<br>
                                <div class="col-md-2"><b>Science:</b></div>
                                <div class="col-md-3"><input type="text" name="sci" id="sci" value="" class="form-control" /></div>
                            </div><br />
                        	<div class="row">
                                <div class="col-md-2"><b>Social Science:</b></div>
                                <div class="col-md-3"><input type="text" name="s_sci" id="s_sci" value="" class="form-control" /></div>
                            </div><br />
							<div class="row">
                                <div class="col-md-2"><b>Math:</b></div>
                                <div class="col-md-3"><input type="text" name="math" id="math" value="" class="form-control" /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Hindi:</b></div>
                                <div class="col-md-3"><input type="text" name="hindi" id="hindi" value="" class="form-control"  /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>english:</b></div>
                                <div class="col-md-3"><input type="text" name="english" id="english" value="" class="form-control"  /></div>
                            </div><br />
                           <br />
                           <br />
                 			
                        </div><!--end of left row 1-->
						
                  <br />
                <div class="row"><!--form row 2-->
                	<div class="col-md-2"></div>
                	<div class="col-lg-2 col-md-2"><input type="submit" name="submit" id="submit" value="submit" class="btn btn-success" /></div>
                    <!--  <div class="col-lg-1 col-md-1">
                    	<button class="btn btn-danger" id="print" type="button" onclick="printDiv()">Print</button>
                    </div> -->
                	
                	<div class="col-lg-3 col-md-3"></div>
                </div><!--end of form row 2-->
                <br /><br /><hr />
            </form><!--end of form-->
     	</div><!-- end of container-fluid -->
   	</div><!-- end of row -->
  </div><!-- end of container -->
  
  <!-----------import data---------------->
 
      
  
   
 
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> 
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script> -->
    	
</body>
</html>
