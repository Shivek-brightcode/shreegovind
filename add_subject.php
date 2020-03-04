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
 if(isset($_POST['submit']))
 {
     //print_r($_POST);
	$roll_no=$_POST['roll_no'];
	$class=$_POST['class'];
	$name= $_POST['name'];
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $marks = $_POST['marks'];	
    $query = "SELECT * from `student_result` WHERE `roll_no`='$roll_no' AND `class`='$class'";
    $result = mysqli_query($link,$query);
    foreach($subject_id as $key=>$value){      
        
        if(mysqli_num_rows($result) == '0'){
            //insert
        $query1="INSERT INTO `student_result`(`roll_no`, `name`,`class`,`subject_id`,`subject_name`,`subject_marks`) VALUES ('$roll_no','$name','$class','$value','$subject_name[$key]','$marks[$key]')";
        
        $result1=mysqli_query($link,$query1);
        }else{
            //update
            $query2 = "UPDATE `student_result` SET `subject_id`='$value',`subject_name`='$subject_name[$key]',`subject_marks`='$marks[$key]' WHERE `roll_no`='$roll_no' AND `class`='$class'";
            //echo $query2;die;
            $result2 = mysqli_query($link,$query2);
        }
    }	
	if($result)
	{
		echo "<script>alert('Marks Added Successfully!!!');</script>";
		echo "<script>window.location='class_wise_add.php?pagename=add_subjects';</script>";		
	}
} 
	
 ?>
<?php
$id=$_GET['student_id'];
$select="SELECT roll_no,name,admission_no,class from new_registration where admission_no='$id'";

$datas=mysqli_query($link,$select);
$result=mysqli_fetch_array($datas);

$sql1 = "SELECT id,subject_name from class_subject where class='$result[class]'";
$query = mysqli_query($link,$sql1);
$subjects = mysqli_fetch_all($query);
//print_r($subjects);
$sub_count = count($subjects);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Marks to Subject</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="jquery-3.1.0.js"></script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>

<body>

  <?php include "demoheader.php";?>
  
   <div class="container" style=" color:#3D7580;">
     <div class="row">
      
            	<legend style=" color:#e46809;">Add Subject Details</legend>
               
     	<div class="container-fluid">
        	<form action="" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b></b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    <input type="hidden" name="adm" id="adm" class="form-control" value="<?php echo $result['admission_no']; ?>" />                                       
                                    <input type="hidden" name="class" id="class" class="form-control" value="<?php echo $result['class']; ?>" />                                       
                                    </div>
                                </div><br />
                      <div class="row">
                        	
                             <div class="row">
                                <div class="col-md-2"><b>Roll No:</b></div>
                                <div class="col-md-4"><input type="text" name="roll_no" id="roll_no" value="<?php echo $result['roll_no']; ?>" class="form-control" /></div>
                            </div><br />
                			<div class="row">
                                <div class="col-md-2"><b>Name:</b></div>
                                <div class="col-md-4"><input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" class="form-control" /></div>
                            </div><br />
                            <div class="row">
							<label for="BrandPartner">Enter Subject Marks:-<span style="color:#FF0000"></span></label>
    <?php 
                        if(isset($subjects)){
                            if(is_array($subjects)){
                                for($j=0;$j<$sub_count;$j++){?>
                                    <div class="row">
                                    <div class="col-md-2"><b><?php echo $subjects[$j][1];?>:</b></div>
                                    <div class="col-md-4">
                                        <input type="hidden" name="subject_id[]" id="" value="<?php echo $subjects[$j][0];?>" class="form-control" />
                                        <input type="hidden" name="subject_name[]" id="" value="<?php echo $subjects[$j][1];?>" class="form-control"/>
                                        <input type="text" name="marks[]" id="" value="" class="form-control" />
                                    </div>
                                </div><br /> 
                    <?php            }
                            }
                        }
    ?>
                           <br />
                           <br />                    
                    <div class="col-lg-5 col-md-5 col-sm-3 col-xs-2"><br /></div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                        
                    
  <!--<script>
function myFunction() {
    window.print();
}
$(document).ready(function() {
    $("#submit").click(function(event) {
        if( !confirm('add Marks Successfully') ){
            event.preventDefault();
        } 

    });
});
      
</script>-->
  <!-----------import data---------------->
  
   <script type="text/javascript" language="javascript"> 
  $(function () {
    $('#eid').keyup(function () {
	  id=$(this).val();
		//alert(id);
        $.ajax({
            type: 'POST',
            url: 'salary_json.php',
            data: {
                id: $(this).val()
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
				var etype = data['employee_type']; 
                var name = data['name']; 
				
				var mobile = data['mobile']; 
				var doj = data['joining_date']; 
				
				var desig = data['designation']; 
				var location = data['t_district']; 
				var bsalary = data['basic_salary']; 
				var hra = data['hra']; 
				var net_pay= parseInt(bsalary) + parseInt(hra);
				var pf_no = data['company_pf'];
				var pfa_no = data['pf_acc_no'];
				var it_no = data['income_tax_no'];
				//alert(name);
                $('#etype').val(etype);
                $('#name').val(name);
				$('#mobile').val(mobile);
				$('#doj').val(doj);
				
				$('#desig').val(desig);
				$('#location').val(location);
				$('#bsalary').val(bsalary);
				$('#hra').val(hra);
				$('#pf_no').val(pf_no);
				$('#pfa_no').val(pfa_no);
				$('#it_no').val(it_no);
				$('#net_pay').val(net_pay);
            }
        });
    });  
});  

</script> 
  
  
 

<!--  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> -->
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
 