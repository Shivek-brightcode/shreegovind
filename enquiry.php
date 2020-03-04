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
  $select="select e_id from enquiry_details order by e_id desc limit 1 ";
  $rs=mysqli_query($link,$select);
  $array=mysqli_fetch_array($rs);
	$eid=$array['e_id']+1;
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enquiry Form</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
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
   <div class="container">
     <div class="row">
       <div class="container-fluid">
       	<form action="add_enquiry.php" method="post">
        	<br />
        	<div class="row">
            	<div class="col-md-1"><b>Enquiry ID:</b></div>
            	<div class="col-md-2"><input type="text" name="e_id" class="form-control" value="<?php echo $eid; ?>" readonly="readonly" /></div>
            	<div class="col-md-1"><b>Date:</b></div>
            	<div class="col-md-2"><input type="date" name="e_date" id="e_date" class="form-control" readonly="readonly" />
                	<script>
						Date.prototype.toDateInputValue = (function() {
							var local = new Date(this);
							local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
							return local.toJSON().slice(0,10);
							});
						document.getElementById('e_date').value = new Date().toDateInputValue();
					</script>
                </div>
                <div class="col-md-6"></div>
            </div><!-- end of form row 1-->
            <br />
       		<div class="row">
            	<div class="col-md-6 col-xs-12 col-sm-12 col-lg-6" >
                	<div class="row">
                        <legend style=" color:#A65E5F;">New Student Details</legend>
                        <br/>
                        <div class="row">
                            <div class="col-md-3"><b>Student's Name:</b></div>
                            <div class="col-md-9"><input type="text" name="name" class="form-control" ></div>
                        </div><!--end of first row-->
                        <br/>
                        <div class="row">
                            <div class="col-md-2"><b>Gender:</b></div>
                            <div class="col-md-2"><input type="radio" name="gender" value="male" class="form-check-input"> &nbsp;Male</div>
                            <div class="col-md-2"><input type="radio" name="gender" value="female" class="form-check-input"> &nbsp;Female</div>
                            <div class="col-md-2"><b>Date of Birth:</b></div>
                            <div class="col-md-4"><input type="text" name="dob" id="dob" class="form-control" ></div>
                        </div><!--end of second row-->
                    </div><!--end of left column row 1-->
                    <br />
                    <div class="row">
                    	<legend style=" color:#A65E5F;">Enquiry Details</legend>
                        <br />
                        	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Interested for Class:</b></div>
                                    <div class="col-lg-3 col-md-3" >
                                    	<select name="course" class="form-control">
										
                                             <option value="0">--Select--</option>
                                            <option value="L KG">L KG</option>
                                            <option value="U KG">U KG</option>
                                            <option value="Nursery">Nursery</option>
                                            <option value="First">First</option>
                                           <option value="Second">Second</option>
                                           <option value="Third">Third</option>
                                           <option value="forth">forth</option>
                                           <option value="Fifth">Fifth</option>
                                           <option value="Sixth">Sixth</option>
                                           <option value="Seventh">Seventh</option>
                                           <option value="Eighth">Eighth</option>
                                           <option value="Ninth">Ninth</option>
                                           <option value="Tenth">Tenth</option>
                                           <option value="11th">11th</option>
                                           <option value="12th">12th</option>
                                       
                                    </select>
                                    </div>
                                </div><!--end of first row-->
                        <br/>
                        <div class="row">
                            <div class="col-md-5"><b>Expected Date of Admission:</b></div>
                            <div class="col-md-7"><input type="date" name="a_date" class="form-control" ></div>
                        </div><!--end of secont row-->
                        <br/>
                        <div class="row">
                            <div class="col-md-5"><b>Expected Time:</b></div>
                            <div class="col-md-7"><input type="time" name="e_time" class="form-control" ></div>
                        </div><!--end of third row-->
                        <br/>
                        <div class="row">
                            <div class="col-md-5"><b>Remarks:</b></div>
                            <div class="col-md-7"><textarea name="remarks" rows="4" class="form-control" style="resize:vertical;"></textarea></div>
                        </div><!--end of fourth row-->
                        <br/>
                    </div><!--end of left column row 2-->
                </div><!--end of left column-->
                <div class="col-md-1 col-lg-1"></div>
            	<div class="col-md-5 col-xs-12 col-sm-12 col-lg-5" >
                  <legend style=" color:#A65E5F;">Address &amp; Contact</legend>
                  <br />
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#taddress">Temporary Address</a></li>
                    <li><a data-toggle="tab" href="#paddress">Permanent Address</a></li>
                    <li><a data-toggle="tab" href="#cinfo">Contact Info</a></li>
                  </ul>
                
                  <div class="tab-content">
                    
                    <div id="taddress" class="tab-pane fade in active"><br />
                        <h4>&nbsp;Enter Temporary Address</h4><br />
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Address:</b></div>
                            <div class="col-md-9"><textarea name="taddress" rows="4" id="taddress" class="form-control" style="resize:vertical"/></textarea></div>
                        </div><!-- end of taddress row 1-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>State:</b></div>
                            <div class="col-md-9"><input type="text" name="tstate" id="tstate" class="form-control"/></div>
                        </div><!-- end of taddress row 2-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>District:</b></div>
                            <div class="col-md-9"><input type="text" name="tdistrict" id="tdistrict" class="form-control"/></div>
                        </div><!-- end of taddress row 3-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Area:</b></div>
                            <div class="col-md-9"><input type="text" name="tarea" id="tarea" class="form-control"/></div>
                        </div><!-- end of taddress row 4-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Pincode:</b></div>
                            <div class="col-md-9"><input type="text" name="tpin" id="tpin" class="form-control"/></div>
                        </div><!-- end of taddress row 5-->
                        <br/>
                    </div><!-- end of taddress-->
                    
                    <div id="paddress" class="tab-pane fade "><br />
                        <h4>&nbsp;Enter Permanent Address</h4>
                        <div class="row">
                        	<div class="col-md-1"></div>
                        	<div class="col-md-1"><input type="checkbox" name="check" id="check" class="form-check-input" value="off"></div>
                            <div class="col-md-10">Same As Permanent Address</div>
                        </div><br />
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Address:</b></div>
                            <div class="col-md-9"><textarea name="paddress" id="paddress" rows="4" class="form-control" style="resize:vertical"/></textarea></div>
                        </div><!-- end of paddress row 1-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>State:</b></div>
                            <div class="col-md-9"><input type="text" name="pstate" id="pstate" class="form-control"/></div>
                        </div><!-- end of paddress row 2-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>District:</b></div>
                            <div class="col-md-9"><input type="text" name="pdistrict" id="pdistrict" class="form-control"/></div>
                        </div><!-- end of paddress row 3-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Area:</b></div>
                            <div class="col-md-9"><input type="text" name="parea" id="parea" class="form-control"/></div>
                        </div><!-- end of taddress row 4-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Pincode:</b></div>
                            <div class="col-md-9"><input type="text" name="ppin" id="ppin" class="form-control"/></div>
                        </div><!-- end of taddress row 5-->
                        <br/>
                    </div><!-- end of paddress-->
                    
                    <div id="cinfo" class="tab-pane fade"><br />
                        <h4>&nbsp;Enter Contact Information</h4><br />
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Mobile:</b></div>
                            <div class="col-md-9"><input type="text" name="mobile" id="mobile" class="form-control"/></div>
                        </div><!-- end of taddress row 1-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Alternate Mobile:</b></div>
                            <div class="col-md-9"><input type="text" name="amobile" id="amobile" class="form-control"/></div>
                        </div><!-- end of taddress row 2-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>Phone:</b></div>
                            <div class="col-md-9"><input type="text" name="phone" id="phone" class="form-control"/></div>
                        </div><!-- end of taddress row 3-->
                        <br/>
                    	<div class="row">
                            <div class="col-md-1"></div>
                        	<div class="col-md-2"><b>E-Mail:</b></div>
                            <div class="col-md-9"><input type="text" name="email" id="email" class="form-control"/></div>
                        </div><!-- end of taddress row 4-->
                        <br/>
                    </div><!-- end of cinfo-->
                  </div><!-- end of tab-content-->
                 </div><!--end of right column-->
            </div><!-- end of form row 2-->
            <br/>
            <div class="row">
            	<div class="col-md-6">
                    <div class="row">
                        <legend style=" color:#A65E5F;">Reference</legend>
                        <div class="col-md-1"></div>
                        <div class="col-md-3"><b>Reference Media</b></div>
                        <div class="col-md-7">
                            <select name="reference" class="form-control">
                                <option value="0">--Select--</option>
                                <option value="emedia">Electronic Media</option>
                                <option value="newspaper">Newspaper Article</option>
                                <option value="friends">Friends/Relatives</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    
                </div>
                <div class="col-md-6"></div>
            </div><!-- end of form row 3-->
            <br />
            <div class="row">
            	<br />
            	<div class="col-md-4 col-lg-5 col-xs-2 col-sm-3"></div>
            	<div class="col-md-2 col-lg-1 col-xs-4 col-sm-3"><input type="submit" name="save" value="Save" id="save" class="btn btn-success" /></div>
            	<div class="col-md-2 col-lg-1 col-xs-4 col-sm-3"><input type="reset" name="reset" value="Reset" class="btn btn-danger" /></div>
            	<div class="col-md-4 col-lg-5 col-xs-2 col-sm-3"></div>
            </div><!-- end of form row 4-->
            <br /><br /><hr />
        </form><!-- end of form -->
       </div><!-- end of container-fluid -->
   </div><!-- end of row -->
  </div><!-- end of container -->
  <script>
  
  $(document).ready(function() {
    $("#save").click(function(event) {
        if( !confirm('Are you sure that you want to save the form') ){
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
  <!--<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
 <!-- <script src="bootstrap/js/jquery.js" type="text/javascript"></script> -->
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>

</body>
</html>
