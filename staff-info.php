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
  $select="select employee_id from staff_info order by employee_id desc limit 1 ";
  $rs=mysqli_query($link,$select);
  $array=mysqli_fetch_array($rs);
	$employee_id=$array['employee_id']+1;
	
 ?>
<script>
function readURL(input) {
            var fuData = document.getElementById('choose_photo_btn');
var FileUploadPath = fuData.value;


if (FileUploadPath == '') {
    alert("Please upload an image");

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



    if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;

                if(size > 50000){
                    alert("Maximum file size exceeds");
                    return;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result)
						.width(120)
						.height(135);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

    } 


else {
        alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
    }
}
        }

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Registration</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="jquery-3.1.0.js"></script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>
$(function() {
	$('#dob').datepick({dateFormat: 'yyyy-mm-dd'});
	
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

</head>

<body>

  <?php include "demoheader.php";?>
  
   <div class="container" style=" color:#3D7580;">
     <div class="row">
      	  <div class="col-md-12">
    	 <div class="row" id="remove_msg" style="height: 20px;">
						<?php if(isset($_SESSION['success'])){
                            ?>
                          <div class="col-md-12 text-center text-success">
                               <i class="fa fa-check "></i><?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                               
                            </div>
                            <?php
                          }
                          else if(isset($_SESSION['err'])){
                              ?>
                                 <div class="col-md-12 text-danger text-center">
                                     <i class="fa fa-times"></i><?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
                                    
                                  </div>
                              <?php 
                          }
                        ?>
      
    	</div><!-- end of row for message--> 
 		</div><!-- end of row for message -->
            	<legend style=" color:#e46809;">Staff Information</legend>
               
     	<div class="container-fluid">
        	<form action="add_staff.php" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                           
                            
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Employee Id:</b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    	<input type="text" name="tid" id="tid" class="form-control" value="<?php echo $employee_id; ?>"/>
                                        
                                    </div>
                                </div><br />
           
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Joining Date:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="date" name="j_date" id="j_date" class="form-control" />
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
           <div class="col-lg-7 col-md-7"><input type="text" name="etype" id="etype" class="form-control" value="" /></div>
                            </div><!--end of etype row-->
                                
                            </div><!--end of date section-->
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"></div>
                        	<div class="col-lg-4 col-md-4 col-sm-9 col-xs-9">
                            	<img id="blah" style="height:135px; width:120px;" />
                    			<input type="file" name="file" id="choose_photo_btn" onChange="readURL(this);" />
                            </div><!--end of image section-->
                    
                        </div><!--end of row 1-->
                        <br />
                        <div class="row">
                        	<div class="row">
                            	<div class="col-lg-3 col-md-2"><b>Employee Name:</b></div>
                               
                                <div class="col-lg-7 col-md-7"><input type="text" name="name" id="name" class="form-control" value="" /></div>
                            </div><!--end of name row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Father's Name:</b></div>
                                
                  <div class="col-lg-7 col-md-7"><input type="text" name="father" id="father" class="form-control" value="" /></div>
                            </div><!--end of father row--><br />
                            	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Designation:</b></div>
           <div class="col-lg-5 col-md-5"><input type="text" name="desig" id="desig" class="form-control" value="" /></div>
                            </div><!--end of designation row--><br />
                          
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Date of Birth:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<input type="text" name="dob" id="dob" class="form-control" value=""/>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Age:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<input type="text" name="age" id="age" class="form-control" />
                                </div>
                            </div><!--end of dob row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Gender:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="gender" class="form-control">
                                   
                                    	<option value="0">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                   
                                    </select>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Blood Group:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="blood" class="form-control">
                                    	<option value="0">Select</option>
                                    	<option value="A+">A+</option>
                                    	<option value="B+">B+</option>
                                    	<option value="AB+">AB+</option>
                                    	<option value="O+">O+</option>
                                    	<option value="A-">A-</option>
                                    	<option value="B-">B-</option>
                                    	<option value="AB-">AB-</option>
                                    	<option value="O-">O-</option>
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            
                            <div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Religion:</b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="religion" class="form-control">
                                   
                                    	<option value="0">Select</option>
                                        <option value="hindu">Hinduism</option>
                                         <option value="muslim">Muslim</option>
                                         <option value="Budhist">Budhist</option>
                                        <option value="islam">Islam</option>
                                   		<option value="Christianity">Christianity</option>
                                    	<option value="Sikhism">Sikhism</option>
                                        <option value="Jainism">Jainism</option>
                                        <option value="Zoroastrianism">Zoroastrianism</option>
                                   		<option value="Judaism">Judaism</option>
                                    </select>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Caste:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="caste" class="form-control">
                                    	<option value="0">Select</option>
                                    	<option value="general">GENERAL</option>
                                    	<option value="obc">OBC</option>
                                    	<option value="st">ST</option>
                                    	<option value="sc">SC</option>
                                    	
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Identification Mark:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="id_mark" id="id_mark" class="form-control" /></div>
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
                                        	<textarea name="taddress" rows="4" id="taddress" class="form-control" style="resize:vertical"/></textarea>
                                        </div>
                                    </div><!-- end of taddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        <input type="text" name="tstate" id="tstate" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tdistrict" id="tdistrict" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tarea" id="tarea" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="tpin" id="tpin" class="form-control" value="" />
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
                                        	<textarea name="paddress" id="paddress" rows="4" class="form-control" style="resize:vertical"/></textarea>
                                        </div>
                                    </div><!-- end of paddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pstate" id="pstate" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pdistrict" id="pdistrict" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="parea" id="parea" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="ppin" id="ppin" class="form-control" value="" />
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
                                        	<input type="text" name="mobile" id="mobile" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Alternate Mobile:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="amobile" id="amobile" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Phone:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="phone" id="phone" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>E-Mail:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="email" id="email" class="form-control" value="" />
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
                                    <div class="col-md-7"><input type="text" name="bsalary" id="bsalary" class="form-control" /></div>
                                </div><!--end of row 1-->
                                <br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>PF:</b></div>
                                    <div class="col-md-7"><input type="text" name="pf" id="pf" class="form-control" /></div>
                                </div><!--end of row 2-->
                                <br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>HRA:</b></div>
                                    <div class="col-md-7"><input type="text" name="hra" id="hra" class="form-control"/></div>
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
                               <input type="text" name="schoolname" id="schoolname" class="form-control" value="" />
                                </div>
                            </div><!--end of school name--><br />
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Duration:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="duration" id="duration" class="form-control" value="" /></div>	
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
                                 <div class="col-lg-4 col-md-5"><input type="text" name="pf_no" id="pf_no" class="form-control" value="" /></div>
                                 <br /><br />
                                 <div class="col-lg-4 col-md-2"><b>PF Account No:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="pfa_no" id="pfa_no" class="form-control" value="" /></div>	
                                 <br /><br />
                                 <div class="col-lg-4 col-md-2"><b>Income Tax No:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="it_no" id="it_no" class="form-control" value="" /></div>	
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
                    <div class="col-lg-5 col-md-4 col-sm-2 col-xs-2"><br /></div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                    </div>
              <!--      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<button class="btn btn-danger" style="margin-top:5px;margin-bottom:5px;" type="button" onClick="myFunction()">Print</button>
                    </div> -->
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
        if( !confirm('Are you sure that you want to submit the form') ){
            event.preventDefault();
        } 

    });
});
  setTimeout(function(){$("#remove_msg").hide();},5000);     
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
 