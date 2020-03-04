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
 ?>
 
 <?php


if(isset($_POST['submit'])){
	$_SESSION["adm"]=$_POST['adm'];
	$_SESSION["date"]=$_POST['date'];
	$_SESSION["name"]=$_POST['name'];
	$_SESSION["dob"]=$_POST['dob'];
	$_SESSION["father"]=$_POST['father'];
	$session=$_POST['session'];
	$explode=explode('-',$session);
	$_SESSION["from"]=$explode[0];
	$_SESSION["to"]=$explode[1];
	$_SESSION["class"]=$_POST['class'];
	$_SESSION["pclass"]=$_POST['pclass'];
	 if($_POST['cname']=='school_leaving') 
	 {                 
	echo "<script>window.location='print_slc_certificate.php';</script>";
	 }
}

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
<script>

 $(document).ready(function() {
    $("#submit").click(function(event) {
        if( !confirm('Are you sure  want to take certificate!!') ){
            event.preventDefault();
        } 

    });
});


</script>
</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
    <div class="row">
     	<div class="container-fluid">
        	<legend style="color:#ec9015;">Issue Certificate</legend>
            <form action="" method="POST">
            			
                    	<div class="row">
                        	<div class="col-lg-1 col-md-1"></div>
                        	<div class="col-lg-2 col-md-2"><b>Admission No:</b></div>
                        	<div class="col-lg-3 col-md-3"><input type="text" name="adm" id="adm" class="form-control" onkeyup="getId(this.value);" /></div>
                        </div><!--end of left row 1-->
                        <br />
                      <div class="row">
                        	<legend style="color:#8815A5;">Student Details</legend>
                             <div class="row">
                                <div class="col-md-2"><b>Date:</b></div>
                                <div class="col-md-2"><input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" /></div>
                            </div><br />
                			<div class="row">
                                <div class="col-md-2"><b>Name:</b></div>
                                <div class="col-md-3"><input type="text" name="name" id="name" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Date Of Birth:</b></div>
                                <div class="col-md-3"><input type="date" name="dob" id="dob" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        	<div class="row">
                                <div class="col-md-2"><b>Father's Name:</b></div>
                                <div class="col-md-3"><input type="text" name="father" id="father" value="" class="form-control" readonly="readonly" /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Session:</b></div>
                                <div class="col-md-3"><input type="text" name="session" id="session" value="" class="form-control" readonly="readonly" /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Class:</b></div>
                                <div class="col-md-3"><input type="text" name="class" id="class" value="" class="form-control" readonly="readonly" /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Promoted Class:</b></div>
                                <div class="col-md-3"><input type="text" name="pclass" id="pclass" value="" class="form-control" /></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-2"><b>Certificate Type:</b></div>
                                <div class="col-md-3">
                                    <select class="form-control" name="cname" id="cname">
                                    	<option value="0">--Select One--</option>
                                        <option value="school_leaving">School Leaving</option>
                                    </select>
                                </div>
                            </div><br />
                 			
                        </div><!--end of left row 1-->
                  <br />
                <div class="row"><!--form row 2-->
                	<div class="col-md-2"></div>
                	<div class="col-lg-2 col-md-2"><input type="submit" name="submit" id="submit" value="printCertificate" class="btn btn-success" /></div>
                    <!--  <div class="col-lg-1 col-md-1">
                    	<button class="btn btn-danger" id="print" type="button" onclick="printDiv()">Print</button>
                    </div> -->
                	<div class="col-lg-2 col-md-2"><input type="reset" name="reset" value="Cancel" class="btn btn-warning" /></div>
                	<div class="col-lg-3 col-md-3"></div>
                </div><!--end of form row 2-->
                <br /><br /><hr />
            </form><!--end of form-->
     	</div><!-- end of container-fluid -->
   	</div><!-- end of row -->
  </div><!-- end of container -->
  
  <!-----------import data---------------->
 
      
  
   <script type="text/javascript" language="javascript"> 
  $(function () {
    $('#adm').keyup(function () {
	  id=$(this).val();
		//alert(id);
        $.ajax({
            type: 'POST',
            url: 'certificate_json.php',
            data: {
                id: $(this).val()
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
				
				var cls = data['class']; 
                var name = data['name']; 
				var father = data['father_name']; 
				var session = data['session'];
				var dob = data['dob'];
				//alert(name);
				
                $('#class').val(cls);
                $('#name').val(name);
				$('#father').val(father);
				$('#dob').val(dob);
				$('#session').val(session);
				
            }
        });
    });  
});  

 

</script> 
  
  
 
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> 
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script> -->
    	
</body>
</html>
