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
  $select="select admission_no from new_registration order by admission_no desc limit 1 ";
  $rs=mysqli_query($link,$select);
  $array=mysqli_fetch_array($rs);
	$admission_no=$array['admission_no']+1;	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Registration || Shree Govind </title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
 --><script src="jquery-3.1.0.js"></script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
 
    <!-- <script type = "text/javascript">
        $(document).ready(function () 
{
          
     $('#birth').datepicker
    ({
        //dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:2150',
        maxDate: new Date(),
        inline: true,

             onSelect: function() {
               var birthDay = document.getElementById("birth").value;
                var DOB = new Date(birthDay);
                var today = new Date();
                var age = today.getTime() - DOB.getTime();
                var fage = Math.floor(age / (1000 * 60 * 60 * 24 * 365.25));
                    $('#age').val(fage);
                    //alert(today.getTime());
                //alert(DOB);
                //alert(age);console.log(fage);
                

                //document.getElementById('patientAge').value = age;
            }
     });  

});
    </script> -->
    <script type = "text/javascript">
        $(document).ready(function (){

    function getAge(dateString) {
                var now = new Date();
                var today = new Date(now.getYear(),now.getMonth(),now.getDate());

                var yearNow = now.getYear();
                var monthNow = now.getMonth();
                var dateNow = now.getDate();

                var dob = new Date(dateString.substring(6,10),dateString.substring(3,5)-1,dateString.substring(0,2));
//console.log(dateString);
                var yearDob = dob.getYear();
                var monthDob = dob.getMonth();
                var dateDob = dob.getDate();
                var age = {};
                var ageString = "";
                var yearString = "";
                var monthString = "";
                var dayString = "";


                yearAge = yearNow - yearDob;

                if (monthNow >= monthDob)
                    var monthAge = monthNow - monthDob;
                else {
                    yearAge--;
                    var monthAge = 12 + monthNow -monthDob;
                }

                if (dateNow >= dateDob)
                    var dateAge = dateNow - dateDob;
                else {
                    monthAge--;
                    var dateAge = 31 + dateNow - dateDob;

                    if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                    }
                }

                age = {
                    years: yearAge,
                    months: monthAge,
                    days: dateAge
                    };

                if ( age.years > 1 ) yearString = " years";
                else yearString = " year";
                if ( age.months> 1 ) monthString = " months";
                else monthString = " month";
                if ( age.days > 1 ) dayString = " days";
                else dayString = " day";


                if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
                    ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
                else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
                    ageString = "Only " + age.days + dayString + " old!";
                else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
                    ageString = age.years + yearString + " old. Happy Birthday!!";
                else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
                    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
                else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
                    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
                else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
                    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
                else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
                    ageString = age.months + monthString + " old.";
                else ageString = "Oops! Could not calculate age!";

                return ageString;
            }     
      
        $('#birth').change(function(){
            var dob = $(this).val();
            var newDate = formatDate(dob);
            var letage = getAge(newDate);
            $('#age').val(letage); 
        })

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month, year].join('/');
    }
});
</script>
<script>
$(function() {
	//$('#dob').datepick({dateFormat: 'yyyy-mm-dd'});
	
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}

function readURL(input) {
    var fuData = document.getElementById('choose_photo_btn');
    var FileUploadPath = fuData.value;


    if (FileUploadPath == '') {
        alert("Please upload an image");
    } else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
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
        }else {
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
        }
    }
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
      
            	<legend style=" color:#A65E5F;">Registration form</legend>
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-5"><b>Import Data By Enquiry Id:</b></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                	<input type="text" name="e_id" id="e_id" class="form-control" />
                                </div>
                                <br /><br /><br />
     	<div class="container-fluid">

        	<form action="add_student.php" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b> Enter Admission No:</b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    	<input type="text" name="adm" id="adm" class="form-control" value="<?php echo $admission_no; ?>" />
                                        
                                    </div>
                                </div><br />
           
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Admission Date:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="date" name="a_date" id="a_date" class="form-control" />
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
                                	<div class="col-lg-5 col-md-5" ><b>Roll No: <span class="text-danger">*</span> </b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="text" name="rollno" id="rollno" class="form-control" required=""/>
                                        
                                    </div>
                                </div><br />
                                
                                <div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Session: <span class="text-danger">*</span> </b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="session" class="form-control" required="">
										
                                             <option value="">--Select--</option>
                                            <option value="2012-2013">2012-2013</option>
                                            <option value="2013-2014">2013-2014</option>
                                            <option value="2014-2015">2014-2015</option>
                                            <option value="2015-2016">2015-2016</option>
                                            <option value="2016-2017">2016-2017</option>
                                            <option value="2017-2018">2017-2018</option>
                                            <option value="2018-2019">2018-2019</option>
                                            <option value="2019-2020">2019-2020</option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2023-2024">2023-2024</option>
                                            <option value="2024-2025">2024-2025</option>
                                            <option value="2025-2026">2025-2026</option>
                                            <option value="2026-2027">2026-2027</option>
                                            <option value="2027-2028">2027-2028</option>
                                            <option value="2028-2029">2028-2029</option>
                                            <option value="2029-2030">2029-2030</option>
                                    </select>
                                    </div>
                                </div><br />
                                
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Class: <span class="text-danger">*</span></b> </div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="class" class="form-control" required="">
										
                                        <option value="">--Select--</option>
                                        <option value="LKG">L KG</option>
                                        <option value="UKG">U KG</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                       
                                    </select>
                                    </div>
                                </div><br />
                                
                                <div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Section: <span class="text-danger">*</span> </b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="section" class="form-control" required="">
										
                                             <option value="">--Select--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                    
                                      </select>
                                    </div>
                                </div><br />
                                
                            </div><!--end of date section-->
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"></div>
                        	<div class="col-lg-4 col-md-4 col-sm-9 col-xs-9">
                            	<img id="blah" style="height:135px; width:120px;" />
                    			<input type="file" name="photo" id="choose_photo_btn" onchange="readURL(this);" required/>
                            </div><!--end of image section-->
                            <br /><br />
                            <div id="photo_size" align="center">Photo Size must be  Max 50Kb.</div>
                        </div><!--end of row 1-->
                        <br />
                        <div class="row">
                        	<legend style=" color:#A65E5F;">Student Details</legend>
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Student's Name: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-2 col-md-2">
                                	<select name="sprefix" id="sprefix" class="form-control">
                                    	<option value="">Select</option>
                                    	<!-- <option value="mr">Mr.</option> -->
                                    	<option value="master">Master</option>
                                    	<option value="miss">Miss</option>
                                    </select>
                                </div>
                                <div class="col-lg-7 col-md-7"><input type="text" name="name" id="name" class="form-control" value="" /></div>
                            </div><!--end of name row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Father's Name: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-2 col-md-2">
                                	<select name="sprefix" id="sprefix" class="form-control">
                                    	<option value="">Select</option>
                                    	<option value="Mr">Mr.</option>
                                    	<option value="Late.">Late</option>
                                    	
                                    </select>
                                </div>
                    <div class="col-lg-7 col-md-7">
                      <input type="text" name="father" id="father" class="form-control" value="" required="">
                    </div>
                            </div><!--end of father row--><br />
                            	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Father's Occupation:  </b></div>
           <div class="col-lg-5 col-md-5"><input type="text" name="father_occup" id="father_occup" class="form-control" value="" /></div>
                            </div><!--end of father occupation row--><br />
                            <div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Mother's Name: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-2 col-md-2">
                                	<select name="sprefix" id="sprefix" class="form-control">
                                    	<option value="0">Select</option>
                                    
                                    	<option value="Mrs">Mrs</option>
                                      <option value="Late.">Late</option>

                                    </select>
                                </div>
                  <div class="col-lg-7 col-md-7"><input type="text" name="mother" id="mother" class="form-control" value="" required=""></div>
                            </div><!--end of mother row--><br />
                            	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Mother's Occupation:</b></div>
                  <div class="col-lg-5 col-md-5"><input type="text" name="mother_occup" id="mother_occup" class="form-control" value="" /></div>
                            </div><!--end of father occupation row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Date of Birth: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <!-- <input type="text" name="dob" id="birth" class="form-control" value="" required/> -->
                                    <input type="date" name="dob" id="birth" class="form-control" value="" max="<?php echo date('Y-m-d');?>" required/>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Age:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<input type="text" name="age" id="age" class="form-control" readonly="readonly" />
                                </div>
                            </div><!--end of dob row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Gender: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="gender" class="form-control" required>
                                   
                                    	<option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                   
                                    </select>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Blood Group:</b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="blood" class="form-control">
                                    	<option value="">Select</option>
                                    	<option value="A+">A+</option>
                                    	<option value="B+">B+</option>
                                    	<option value="AB+">AB+</option>
                                    	<option value="O+">O+</option>
                                    	<option value="A-">A-</option>
                                    	<option value="B-">B-</option>
                                    	<option value="Ab-">AB-</option>
                                    	<option value="O-">O-</option>
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            
                            <div class="row">
                            	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><b>Religion: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                	<select name="religion" class="form-control" required="">
                                   
                                    	<option value="">Select</option>
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
                            	<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><b>Caste: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                	<select name="caste" class="form-control" required="">
                                    	<option value="">Select</option>
                                    	<option value="general">GENERAL</option>
                                    	<option value="obc">OBC</option>
                                    	<option value="st">ST</option>
                                    	<option value="sc">SC</option>
                                    	
                                    </select>
                                </div>
                            </div><!--end of gender row--><br />
                            <div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Adhar No.: <span class="text-danger">*</span> </b></div>
                                <div class="col-lg-4 col-md-2"><input type="text" name="adhar" id="adhar" maxlength="12" class="form-control" required="" /></div>
                            </div><!--end of Adhar No row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Identification Mark:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="id_mark" id="id_mark" class="form-control" /></div>
                            </div><!--end of identification row--><br />
                        </div><!--end of row 2-->
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#address" style=" color:#A65E5F;">Address</a></li>
                          <li><a data-toggle="tab" href="#fee" style=" color:#A65E5F;">Fee</a></li>
                        </ul>
                        
                        <div class="tab-content">
                          <div id="address" class="tab-pane fade in active">
                            <br />
                            <ul class="nav nav-pills">
                              <li class="active"><a data-toggle="pill" href="#taddress">Temporary Address</a></li>
                              <li><a data-toggle="pill" href="#paddress">Permanent Address</a></li>
                              <li><a data-toggle="pill" href="#cinfo">Contact Info</a></li>
                              <!-- <li><a data-toggle="pill" href="#">Local Address</a></li> -->
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
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="tarea" id="tarea" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="tpin" id="tpin" class="form-control" value="834003" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="tdistrict" id="tdistrict" class="form-control" value="Ranchi" />
                                        </div>
                                    </div><!-- end of taddress row 4-->

                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        <input type="text" name="tstate" id="tstate" class="form-control" value="Jharkhand" />
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
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="parea" id="parea" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                     <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="ppin" id="ppin" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                          <input type="text" name="pdistrict" id="pdistrict" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 4-->
                                    <br/>

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>State:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pstate" id="pstate" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 5-->
                                    <br/>
                                    
                                   
                                </div><!-- end of paddress-->                               
                                <div id="cinfo" class="tab-pane fade"><br />
                                    <h4>&nbsp;Enter Contact Information</h4><br />
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Mobile: <span class="text-danger">*</span> </b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="mobile" id="mobile" class="form-control"  maxlength="10"/>
                                        </div>
                                    </div><!-- end of taddress row 1-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Alternate Mobile:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="amobile" id="amobile" class="form-control" maxlength="10"  />
                                        </div>
                                    </div><!-- end of taddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Phone:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="phone" id="phone" class="form-control"  />
                                        </div>
                                    </div><!-- end of taddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>E-Mail:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="email" id="email" class="form-control"  />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                </div><!-- end of cinfo-->
								<!-- <div  class="tab-pane fade"><br />
                                 <h4>&nbsp;Enter Local Address Information</h4><br/>
                                   <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Mobile:<span class="text-danger">*</span> </b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="mobile" id="mobile" class="form-control" value="" maxlength="10" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Alternate Mobile:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="amobile" id="amobile" class="form-control" maxlength="10" value="" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Phone:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="phone" id="phone" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>E-Mail:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="email" id="email" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <br/>
                                </div>							 -->
                            </div>
                          </div><!--end of address tab-->						  						  						  						  						  						  						  
                          <div id="fee" class="tab-pane fade"><br/>
                          		<div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Annual Fee:</b></div>
                                    <div class="col-md-7"><input type="text" name="tamount" id="annual_fee" class="form-control" placeholder='Enter Total Fee' required/></div>
                                </div><!--end of row 1-->
								                <br/> 
                                <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Exam Fee:</b></div>
                                    <div class="col-md-7"><input type="text" name="eamount" id="eamount" class="form-control"   /></div>
                                </div>
                                <br/>
                                <div class="row">
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Monthly Fee:</b></div>
                                    <div class="col-md-7"><input type="text" name="mamount" id="mamount" class="form-control"   /></div>
                                </div>
                                <div class='row' style='margin-top:15px'>
                                <p style='text-transform:700;font-weight:700;color:darkred;text-align:center'>Annual Fee (Including Exam-Fee & Monthly-Fee)</p>
                                </div>
                          </div><!--end of fee tab-->
                        </div><!--end of nav tab-->
                    </div><!-- end of right section -->
                </div><!-- end of form row 1 -->
                <div class="row"><!--form row 2-->
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<legend style=" color:#A65E5F;">Details of Previous Study</legend>
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Name of the School:</b></div>
                                <div class="col-lg-6 col-md-8">
                               <input type="text" name="schoolname" id="schoolname" class="form-control" value="Sri Govind Middle & High School" />
                                </div>
                            </div><!--end of school name--><br />
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Last Class Attended/Is Studying:</b></div>
                                 <div class="col-lg-6 col-md-8">
                                  <!-- <input type="text" name="laststudy" id="laststudy" class="form-control" value="" />
 -->
                                  <select name="laststudy" class="form-control" id="laststudy">
                                        <option value="">--Select--</option>
                                        <option value="none">none</option>
                                        <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>                                       
                                    </select>
                                </div>	
                            </div><!--end of education--><br />
                            
                             <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Promoted To Class:</b></div>
                                 <div class="col-lg-6 col-md-8">
                                  <!-- <input type="text" name="Promotedclass" id="Promotedclass" class="form-control" value="" /> -->
                                  <select name="Promotedclass" class="form-control" id="Promotedclass">
                                        <option value="">--Select--</option>
                                        <option value="none">none</option>
                                        <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>                                       
                                    </select>
                                </div>	
                            </div><!--end of Promote--><br />
                            
                            	<div class="col-lg-12 col-md-12"><input type="checkbox" name="declaration" id="declaration" value=""  />&nbsp;&nbsp;I declare that the information given by me in the application is true, best of my knowledge.</div>
                            
                        </div>
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br /><br />
                    	<div class="row">
                        	<div class="row">
                            	<legend style=" color:#A65E5F;">Certificate Submitted</legend>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="tc" value="yes" />&nbsp;Transfer Certificate</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="ms" value="yes" />&nbsp;Marksheet</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="cc" value="yes" />&nbsp;Caste Certificate</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="dc" value="yes" />&nbsp;Domecile</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="ac" value="yes" />&nbsp;Aadhaar</div>
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
           <!--         <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<button class="btn btn-danger" style="margin-top:5px;margin-bottom:5px;" type="button" onclick="myFunction()">Print</button>
                    </div>   -->
                </div><!-- end of form row 4 -->
                <br /><br /><hr />
                      

            </form><!-- end of form -->

            <!-- <form action="insert.php" method="post">
              
             
                      <input type="submit" name="add" value="Submit" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />

            </form>  -->
        </div><!-- end of container-fluid -->
   	 </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script>
function myFunction() {
    window.print();
}
$(document).ready(function() {
    $("#submit").click(function(event) {
      // alert("yes");
        /*if( !confirm('Are you sure that you want to submit the form') ){
            event.preventDefault();
        } */

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
  <!-----------import data---------------->
  
   <script type="text/javascript" language="javascript"> 
  $(function () {
    $('#e_id').keyup(function () {
	  id=$(this).val();
		//alert(id);
        $.ajax({
            type: 'POST',
            url: 'admission_json.php',
            data: {
                id: $(this).val()
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
                var name = data['name']; 
				var dob = data['dob']; 
				var taddress = data['t_address']; 
				var tstate = data['t_state']; 				
				var tdistrict = data['t_district']; 
				var tarea = data['t_area']; 
				var tpin = data['t_pincode']; 
				var mobile = data['mobile']; 
				var amobile = data['alt_mobile'];
				var phone = data['phone'];
				var email = data['email'];
				//alert(name);
                $('#name').val(name);
                $('#dob').val(dob);
				$('textarea#taddress').val(taddress);
				$('#tstate').val(tstate);				
				$('#tdistrict').val(tdistrict);
				$('#tarea').val(tarea);
				$('#tpin').val(tpin);
				$('#mobile').val(mobile);
				$('#amobile').val(amobile);
				$('#phone').val(phone);
				$('#email').val(email);
            }
        });
    });  
});  
</script>  


<!--<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> -->
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>   	
</body>
</html>
