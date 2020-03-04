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
   $std_id=$_REQUEST["student_id"];
   
 $data="SELECT t1.admission_date,t1.roll_no,t1.session,t1.class,t1.section,t1.name,t1.father_name,t1.father_occup,t1.mother_name,t1.mother_occup,t1.dob,t1.age,t1.gender,t1.blood_group,t1.religion,t1.caste,t1.adhar_no,t1.identification,t1.previous_school,t1.previous_class,t1.promoted,t1.transfer_certificate,t1.marksheet,t1.caste_certificate,t1.domecile,t1.photo,t2.mob,t2.alt_mobile,t2.phone,t2.email,t3.t_address,t3.t_state,t3.t_district,t3.t_area,t3.t_pincode,t3.p_address,t3.p_state,t3.p_district,t3.p_area,t3.p_pincode,t4.total  FROM new_registration t1,contact_info t2,address t3,fee_detail t4  WHERE t1.admission_no=t2.admission_no and  t1.admission_no=t3.admission_no and t1.admission_no=t3.admission_no and t1.admission_no=t4.admission_no and t1.admission_no='$std_id'";
			
			  $datas=mysqli_query($link,$data);
			  $result=mysqli_fetch_array($datas);
 //echo '<pre>';print_r($result);echo '</pre>';			 
	
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditForm</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="jquery-3.1.0.js"></script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
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

</head>

<body>

  <?php include "demoheader.php";?>
 
  
   <div class="container" style=" color:#3D7580;">
     <div class="row">
     <div class="col-md-12">
     <div class="row"  id="remove_msg" style="height: 20px;">
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
        
            	<legend style=" color:#A65E5F;">Edit Students</legend>
                <br /><br />
     	<div class="container-fluid">
        	<form action="update_student.php" method="post" enctype="multipart/form-data"><!-- form beginning -->
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                           
                            
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Admission No:</b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    	<input type="text" name="adm" id="adm" class="form-control" value="<?php echo $std_id; ?>" readonly="readonly"/>
                                        
                                    </div>
                                </div><br />
           
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Admission Date:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="date" name="a_date" id="a_date" value="<?php echo date('Y-m-d',strtotime($result['admission_date'])); ?>" class="form-control" readonly="readonly" />
                                    </div>
                                </div><br />
                                
                                <div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Roll No:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="text" name="rollno" id="rollno" value="<?php echo $result['roll_no']; ?>" class="form-control"/>
                                        
                                    </div>
                                </div><br />
                                
                                <div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Session:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="session" class="form-control">
										<?php $ses=array("2012-2013","2013-2014","2014-2015","2015-2016","2016-2017","2017-2018","2018-2019","2019-2020","2020-2021","2021-2022","2022-2023","2023-2024","2024-2025","2025-2026","2026-2027","2027-2028","2028-2029","2029-2030"); 
										 $len=count($ses);
										 $i=0;
										 while($i!=$len){
										 if($ses[$i]==$result['session']){
										 ?>
                                         	<option value="<?php echo $ses[$i]; ?>" selected="selected"><?php  echo $ses[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $ses[$i]; ?>"><?php echo $ses[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                             
                                    </select>
                                    </div>
                                </div><br />
                                
                            	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Class:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="class" class="form-control">
					<?php $cls=array("LKG","UKG","Nursery","First","Second","Third","forth","Fifth","Sixth","Seventh","Eighth","Ninth","Tenth","11th","12th"); 
										 $len=count($cls);
										 $i=0;
										 while($i!=$len){
										 if($cls[$i]==$result['class']){
										 ?>
                                         	<option value="<?php echo $cls[$i]; ?>" selected="selected"><?php  echo $cls[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $cls[$i]; ?>"><?php echo $cls[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                      
                                       
                                    </select>
                                    </div>
                                </div><br />
                                
                                <div class="row">
                               
                                	<div class="col-lg-5 col-md-5" ><b>Section:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="section" class="form-control">
										 <?php $sec=array("A","B","C","D","E","F","G"); 
										 $len=count($sec);
										 $i=0;
										 while($i!=$len){
										 if($sec[$i]==$result['section']){
										 ?>
                                         	<option value="<?php echo $sec[$i]; ?>" selected="selected"><?php  echo $sec[$i]; ?></option>
                                            <?php } else{?>
                                             <option value="<?php echo $sec[$i]; ?>"><?php echo $sec[$i]; ?></option>
                                            
                                    <?php  }$i++; } ?>
                                      </select>
                                    </div>
                                </div><br />
                                
                            </div><!--end of date section-->
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"></div>
                        	<div class="col-lg-4 col-md-4 col-sm-9 col-xs-9">
                            	<img id="blah" style="height:135px; width:120px;" src="<?php echo $result['photo']; ?>" />
                    	<input type="file" name="photo" id="choose_photo_btn" value="<?php echo $result['photo']; ?>" onchange="readURL(this);" />
                            </div><!--end of image section-->
                        </div><!--end of row 1-->
                        <br />
                        <div class="row">
                        	<legend style=" color:#A65E5F;">Student Details</legend>
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Student's Name:</b></div>
                               
              <div class="col-lg-7 col-md-7"><input type="text" name="name" id="name" class="form-control" value="<?php echo $result['name']; ?>" /></div>
                            </div><!--end of name row--><br />
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Father's Name:</b></div>
                                
                  <div class="col-lg-7 col-md-7"><input type="text" name="father" id="father" value="<?php echo $result['father_name']; ?>" class="form-control" value="" /></div>
                            </div><!--end of father row--><br />
                            	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Occupation:</b></div>
           <div class="col-lg-7 col-md-7"><input type="text" name="father_occup" value="<?php echo $result['father_occup']; ?>" id="father_occup" class="form-control" value="" /></div>
                            </div><!--end of father occupation row--><br />
                            <div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Mother's Name:</b></div>
                               
                  <div class="col-lg-7 col-md-7"><input type="text" name="mother" id="mother" value="<?php echo $result['mother_name']; ?>" class="form-control" value="" /></div>
                            </div><!--end of mother row--><br />
                            	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Occupation:</b></div>
                  <div class="col-lg-7 col-md-7"><input type="text" name="mother_occup" value="<?php echo $result['mother_occup']; ?>" id="mother_occup" class="form-control" value="" /></div>
                            </div><!--end of father occupation row--><br />
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
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><?php //print_r($sec);?>
                                	<select name="blood" class="form-control">
                                     <?php $blood=array("Select Blood Group","A+","B+","AB+","O+","A-","B-","AB-","O-"); 
										 $len=count($blood);
										 $i=0;
										 while($i!=$len){
										 if($blood[$i]==$result['blood_group']){
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
                            	<div class="col-lg-3 col-md-3"><b>Adhar No.:</b></div>
                                <div class="col-lg-4 col-md-2"><input type="text" name="adhar" id="adhar" value="<?php echo $result['adhar_no']; ?>" maxlength="12" class="form-control" /></div>
                            </div><!--end of Adhar No row--><br />
                            
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>Identification Mark:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="id_mark" id="id_mark" value="<?php echo $result['identification']; ?>" class="form-control" /></div>
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
                                        	<input type="text" name="tpin" id="tpin" class="form-control" value="<?php echo $result['t_pincode']; ?>" />
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
                                        	<input type="text" name="pstate" id="pstate" value="<?php echo $result['p_state']; ?>" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 2-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>District:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="pdistrict" id="pdistrict" value="<?php echo $result['p_district']; ?>" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of paddress row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Area:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="parea" id="parea" value="<?php echo $result['p_area']; ?>" class="form-control" value="" />
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2"><b>Pincode:</b></div>
                                        <div class="col-md-9">
                                        	<input type="text" name="ppin" id="ppin" value="<?php echo $result['p_pincode']; ?>" class="form-control" value="" />
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
                                        	<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $result['mob']; ?>" />
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
                          <div id="fee" class="tab-pane fade"><br/>
                          		<div class="row">
                                <?php if($role=='admin'){ ?>
                          			<div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Total Fee:</b></div>
                                    <div class="col-md-7"><input type="text" name="tamount" id="tamount" value="<?php echo $result['total']; ?>" class="form-control" onkeyup="getAmount(this.value);" /></div>
                                    <?php } else if($role=='user'){ ?>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4"><b>Total Fee:</b></div>
                                    <div class="col-md-7"><input type="text" name="tamount" readonly="readonly" id="tamount" value="<?php echo $result['total']; ?>" class="form-control"/></div>
                                    <?php } ?>
                                </div><!--end of row 1-->
                                <br/>
                          		
                            
                          		
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
                               <input type="text" name="schoolname" id="schoolname" value="<?php echo $result['previous_school']; ?>" class="form-control" value="" />
                                </div>
                            </div><!--end of school name--><br />
                            <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Last Class Attended/Is Studying:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="laststudy" value="<?php echo $result['previous_class']; ?>" id="laststudy" class="form-control" value="" /></div>	
                            </div><!--end of education--><br />
                            
                             <div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Promoted To Class:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="Promotedclass" id="Promotedclass" value="<?php echo $result['promoted']; ?>" class="form-control" value="" /></div>	
                            </div><!--end of Promote--><br />
                            
                            	<div class="col-lg-12 col-md-12"><input type="checkbox" name="declaration" id="declaration" value="" required="required"/>&nbsp;&nbsp;I declare that the information given by me in the application is true, best of my knowledge.</div>
                            
                        </div>
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br /><br />
                    	<div class="row">
                        	<div class="row">
                            	<legend style=" color:#A65E5F;">Certificate Submitted</legend>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="tc" value="yes" <?php echo ($result['transfer_certificate']=='yes' ? 'checked' : '');?> />&nbsp;Transfer Certificate</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="ms" value="yes" <?php echo ($result['marksheet']=='yes' ? 'checked' : '');?>  />&nbsp;Marksheet</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="cc" value="yes" <?php echo ($result['caste_certificate']=='yes' ? 'checked' : '');?>  />&nbsp;Caste Certificate</div>
                                <div class="col-lg-7 col-md-7"><input type="checkbox" name="dc" value="yes" <?php echo ($result['domecile']=='yes' ? 'checked' : '');?>  />&nbsp;Domecile</div>
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
                    <div class="col-lg-5 col-md-6 col-sm-2 col-xs-2"><br /></div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<input type="submit" name="submit" value="Update" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                    </div>
                   <!-- <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<button class="btn btn-danger" style="margin-top:5px;margin-bottom:5px;" type="button" onclick="myFunction()">Print</button>
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
        if( !confirm('Are you sure that you want to update the form') ){
            event.preventDefault();
        } 

    });
});
 setTimeout(function(){$("#remove_msg").hide();},10000);	
      
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
  <script>
 
  </script>
 
  
<!--  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> -->
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
