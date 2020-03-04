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
  include('dbconnection.php');
  $employee_id=$_REQUEST['employee_id'];
  $select="select * from staff_info where employee_id='$employee_id'";
  $rs=mysqli_query($link,$select);
  $result=mysqli_fetch_array($rs);
	
	
 ?>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(135);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Staff</title>

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
      
            	<legend style=" color:#e46809;">Staff Information</legend>
               
     	<div class="container-fluid">
        	<form action="update_staff.php" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                    	<div class="row">
                        	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                           
                            
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Employee Id:</b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    	<input type="text" name="eid" id="eid" class="form-control" value="<?php echo $employee_id; ?>"/>
                                        
                                    </div>
                                </div><br />
           
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Joining Date:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="date" name="j_date" id="j_date" value="<?php echo $result['joining_date']; ?>" class="form-control" />
                                    	<script>
											Date.prototype.toDateInputValue = (function() {
												var local = new Date(this);
												local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
												return local.toJSON().slice(0,10);
												});
											document.getElementById('a_date').value = new Date().toDateInputValue();
										</script>
                                    </div>
                                </div><br />
                                
                               	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Employee Type:</b></div>
           <div class="col-lg-7 col-md-7"><input type="text" name="etype" id="etype" class="form-control" value="<?php echo $result['employee_type']; ?>" /></div>
                            </div><!--end of etype row-->
                                
                            </div><!--end of date section-->
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"></div>
                        	<div class="col-lg-4 col-md-4 col-sm-9 col-xs-9">
                            	<img id="blah" style="height:135px; width:120px;" src="<?php echo $result['photo']; ?>" />
                    			<input type="file" name="photo" id="choose_photo_btn" value="" onChange="readURL(this);" />
                            </div><!--end of image section-->
                        </div><!--end of row 1-->
                        <br />
                        <div class="row">
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Employee Name:</b></div>
                               
                                <div class="col-lg-7 col-md-7"><input type="text" name="name" id="name" class="form-control" value="<?php echo $result['name']; ?>" /></div>
                            </div><!--end of name row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Father's Name:</b></div>
                                
                  <div class="col-lg-7 col-md-7"><input type="text" name="father" id="father" class="form-control" value="<?php echo $result['father']; ?>" /></div>
                            </div><!--end of father row--><br />
                            	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Designation:</b></div>
           <div class="col-lg-5 col-md-5"><input type="text" name="desig" id="desig" class="form-control" value="<?php echo $result['designation']; ?>" /></div>
                            </div><!--end of designation row--><br />
                          
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Date of Birth:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<input type="date" name="dob" id="dob" class="form-control" value="<?php echo $result['dob']; ?>"/>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Age:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<input type="text" name="age" id="age" value="<?php echo $result['age']; ?>" class="form-control" />
                                </div>
                            </div><!--end of dob row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Gender:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="gender" class="form-control">
                                   <?php $gen=array("male","Female"); 
										 $len=count($gen);
										 $i=0;
										 while($i!=$len){
										 if($gen[$i]==$result['gender']){
										 ?>
                                         	<option value="<?php echo $gen[$i]; ?>" selected="selected"><?php  echo $gen[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $gen[$i]; ?>"><?php echo $gen[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                    </select>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Blood Group:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="blood" class="form-control">
                                     <?php $blood=array("A+","B+","AB+","O+","A-","B-","AB-","O-"); 
										 $len=count($blood);
										 $i=0;
										 while($i!=$len){
										 if($sec[$i]==$result['blood_group']){
										 ?>
                                         	<option value="<?php echo $blood[$i]; ?>" selected="selected"><?php  echo $blood[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $blood[$i]; ?>"><?php echo $blood[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            
                            <div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Religion:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="religion" class="form-control">
                                     <?php $religion=array("hindu","muslim","islam","Budhist","islam","Christianity","Sikhism","Jainism","Zoroastrianism","Judaism"); 
										 $len=count($religion);
										 $i=0;
										 while($i!=$len){
										 if($religion[$i]==$result['religion']){
										 ?>
                                         	<option value="<?php echo $religion[$i]; ?>" selected="selected"><?php  echo $religion[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $religion[$i]; ?>"><?php echo $religion[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                    </select>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Caste:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="caste" class="form-control">
                                     <?php $cat=array("general","obc","st","sc"); 
										 $len=count($cat);
										 $i=0;
										 while($i!=$len){
										 if($cat[$i]==$result['caste']){
										 ?>
                                         	<option value="<?php echo $cat[$i]; ?>" selected="selected"><?php  echo $cat[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $cat[$i]; ?>"><?php echo $cat[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                    	
                                    	
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Identification Mark:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="id_mark" value="<?php echo $result['identification']; ?>" id="id_mark" class="form-control" /></div>
                            </div><!--end of identification row--><br />
                        </div><!--end of row 2-->
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#address" style=" color:#e46809;">Address</a></li>
                          <li><a data-toggle="tab" href="#salary" style=" color:#e46809;">Salary</a></li>
                        </ul>
                        
                        <div class="tab-content">
                          <div id="address" class="tab-pane fade in active">
                            <br />
                            <ul class="nav nav-pills">
                              <li class="active"><a data-toggle="pill" href="#taddress">Temporary Address</a></li>
                              <li><a data-toggle="pill" href="#paddress">Permanent Address</a></li>
                              <li><a data-toggle="pill" href="#cinfo">Contact Info</a></li>
                            </ul>
                          
                            <div class="tab-content">
                               <div id="taddress" class="tab-pane fade in active"><br />
                                    <h4>&nbsp;Enter Temporary Address</h4><br />
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Address:</b></div>
                                        <div class="col-md-9">
                                        	<textarea name="taddress" rows="4" id="taddress" class="form-control" style="resize:vertical"/><?php echo $result['t_address']; ?></textarea>
                                        </div>
                                    </div><!-- end of taddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        <input type="text" name="tstate" id="tstate" class="form-control" value="<?php echo $result['t_state']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tdistrict" id="tdistrict" class="form-control" value="<?php echo $result['t_district']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tarea" id="tarea" class="form-control" value="<?php echo $result['t_area']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tpin" id="tpin" class="form-control" value="<?php echo $result['t_pin']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 5-->
                                    <br/>
                                </div><!-- end of taddress-->
                              
                                <div id="paddress" class="tab-pane fade "><br />
                                    <h4>&nbsp;Enter Permanent Address</h4>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-1"><input type="checkbox" class="form-check-input" id="check" value="off"></div>
                                        <div class="col-md-10">Same As Permanent Address</div>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Address:</b></div>
                                        <div class="col-md-9">
                                        	<textarea name="paddress" id="paddress" rows="4" class="form-control" style="resize:vertical"/><?php echo $result['p_address']; ?></textarea>
                                        </div>
                                    </div><!-- end of paddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pstate" id="pstate" class="form-control" value="<?php echo $result['p_state']; ?>" />
                                        </div>
                                    </div><!-- end of paddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pdistrict" id="pdistrict" class="form-control" value="<?php echo $result['p_district']; ?>" />
                                        </div>
                                    </div><!-- end of paddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="parea" id="parea" class="form-control" value="<?php echo $result['p_area']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="ppin" id="ppin" class="form-control" value="<?php echo $result['p_pin']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 5-->
                                    <br/>
                                </div><!-- end of paddress-->
                                
                                <div id="cinfo" class="tab-pane fade"><br />
                                    <h4>&nbsp;Enter Contact Information</h4><br />
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Mobile:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $result['mobile']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Alternate Mobile:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="amobile" id="amobile" class="form-control" value="<?php echo $result['alt_mobile']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Phone:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $result['phone']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>E-Mail:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="email" id="email" class="form-control" value="<?php echo $result['email']; ?>" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                </div><!-- end of cinfo-->
                            </div>
                          </div><!--end of address tab-->
                          <div id="salary" class="tab-pane fade"><br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Basic Salary:</b></div>
                                    <div class="col-md-7"><input type="text" name="bsalary" id="bsalary" value="<?php echo $result['basic_salary']; ?>" class="form-control" /></div>
                                </div><!--end of row 1-->
                                <br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>PF:</b></div>
                                    <div class="col-md-7"><input type="text" name="pf" id="pf" value="<?php echo $result['pf']; ?>" class="form-control" /></div>
                                </div><!--end of row 2-->
                                <br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>HRA:</b></div>
                                    <div class="col-md-7"><input type="text" name="hra" id="hra" value="<?php echo $result['hra']; ?>" class="form-control"/></div>
                                </div><!--end of row 3-->
                                <br/>
                          		
                          </div><!--end of fee tab-->
                        </div><!--end of nav tab-->
                    </div><!-- end of right section -->
                </div><!-- end of form row 1 -->
                <div class="row"><!--form row 2-->
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<legend style=" color:#e46809;">Details of Previous Work</legend>
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Name of the Organization/School:</b></div>
                                <div class="col-lg-6 col-md-8">
                               <input type="text" name="schoolname" id="schoolname" class="form-control" value="<?php echo $result['school_name']; ?>" />
                                </div>
                            </div><!--end of school name--><br />
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Duration:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="duration" id="duration" class="form-control" value="<?php echo $result['duration']; ?>" /></div>	
                            </div><!--end of education--><br />
                            
                            	<div class="col-lg-12 col-md-12" style="color:#A75859;"><input type="checkbox" name="declaration" id="declaration" value="" required="required"/>&nbsp;&nbsp;I declare that the information given by me in the application is true, best of my knowledge.</div>
                            
                        </div>
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br /><br />
                    	<div class="row">
                        	<div class="row">
                            	<legend style=" color:#A65E5F;"></legend>
                                <div class="col-lg-4 col-md-2"><b>Company PF No:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="pf_no" id="pf_no" class="form-control" value="<?php echo $result['company_pf']; ?>" /></div>
                                 <br /><br />
                                 <div class="col-lg-4 col-md-2"><b>PF Account No:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="pfa_no" id="pfa_no" class="form-control" value="<?php echo $result['pf_acc_no']; ?>" /></div>	
                                 <br /><br />
                                 <div class="col-lg-4 col-md-2"><b>Income Tax No:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="it_no" id="it_no" class="form-control" value="<?php echo $result['income_tax_no']; ?>" /></div>	
                            </div><!--end of date row--><br />
                        	
                        </div>
                    </div><!-- end of right section -->
                </div><!-- end of form row 2 -->
                
                <div class="row"><!-- form row 4 -->
                	<br /><br />
                <!--    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2"></div>
                  
                    <div class="col-lg-2 col-md-2 col-sm-7 col-xs-7">
                    	<a href="import.php?pagename=admission" class="btn btn-warning" type="button" style="margin-top:5px;margin-bottom:5px;">Import From Enquiry</a>
                    </div>   -->
                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2"><br /></div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<input type="submit" name="submit" value="Update" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<button class="btn btn-danger" style="margin-top:5px;margin-bottom:5px;" type="button" onClick="myFunction()">Print</button>
                    </div>
                </div><!-- end of form row 4 -->
                <br /><br /><hr />
            </form><!-- end of form -->
        </div><!-- end of container-fluid -->
   	 </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script>
function myFunction() {
    window.print();
}
$(document).ready(function() {
    $("#submit").click(function(event) {
        if( !confirm('Are you sure that you want to Update the form') ){
            event.preventDefault();
        } 

    });
});
      
</script>
  
  
  <script>
  
  $(function () { 
    $('#check').change(function () {
		var check=$("#check").val();
		var address=$("textarea#taddress").val();
		var state=$("#tstate").val();
		var district=$("#tdistrict").val();
		var area=$("#tarea").val();
		var pin=$("#tpin").val();
		
		if(check=='off'){
			$("textarea#paddress").val(address);
			$("textarea#paddress").prop("readonly", true);
			$("#pstate").val(state);
			$("#pstate").prop("readonly", true);
			$("#pdistrict").val(district);
			$("#pdistrict").prop("readonly", true);
			$("#parea").val(area);
			$("#parea").prop("readonly", true);
			$("#ppin").val(pin);
			$("#ppin").prop("readonly", true);
			$("#check").val("on");
		}
		else{
			$("textarea#paddress").val("");
			$("textarea#paddress").prop("readonly", false);
			$("#pstate").val("");
			$("#pstate").prop("readonly", false);
			$("#pdistrict").val("");
			$("#pdistrict").prop("readonly", false);
			$("#parea").val("");
			$("#parea").prop("readonly", false);
			$("#ppin").val("");
			$("#ppin").prop("readonly", false);
			$("#check").val("off");
		}
		
		//alert(check)
	});
  });
  </script>
 

<!--  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> -->
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
 