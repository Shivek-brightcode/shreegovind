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
	$employee_id = $_POST['eid'];
	$p_date = $_POST['p_date'];
	$months = $_POST['months'];
	$etype = $_POST['etype'];
	$mobile = $_POST['mobile'];
	$doj = $_POST['doj'];
	$name = $_POST['name'];
	$desig = $_POST['desig'];
	$location = $_POST['location'];
	$bsalary = $_POST['bsalary'];
	$wday = $_POST['wday'];
	$hday = $_POST['hday'];
	$hra = $_POST['hra'];
	$mallowance = $_POST['mallowance'];
	$callowance = $_POST['callowance'];
	$sallowance = $_POST['sallowance'];
	$pf_no = $_POST['pf_no'];
	$pfa_no = $_POST['pfa_no'];
	$it_no = $_POST['it_no'];
	$tot_deduct = $_POST['tot_deduct'];
	$net_pay = $_POST['net_pay'];
	/*---------Session Content----------*/
	$_SESSION['eid'] = $employee_id;
	$_SESSION['p_date'] = $p_date;
	$_SESSION['months'] = $months;
	$_SESSION['etype'] = $etype;
	$_SESSION['mobile'] = $mobile;
	$_SESSION['doj'] = $doj;
	$_SESSION['name'] = $name;
	$_SESSION['desig'] = $desig;
	$_SESSION['location'] = $location;
	$_SESSION['bsalary'] = $bsalary;
	$_SESSION['wday'] = $wday;
	$_SESSION['hday'] = $hday;
	$_SESSION['hra'] = $hra;
	$_SESSION['mallowance'] = $mallowance;
	$_SESSION['callowance'] = $callowance;
	$_SESSION['sallowance'] = $sallowance;
	$_SESSION['pf_no'] = $pf_no;
	$_SESSION['pfa_no'] = $pfa_no;
	$_SESSION['it_no'] = $it_no;
	$_SESSION['tot_deduct'] = $tot_deduct;
	$_SESSION['net_pay'] = $net_pay;
	
	/* end content*/
	$explodeyear=explode('-',$p_date);
	$sql="SELECT year(date) as year,month(date) as months FROM `staff_payment` WHERE employee_id='$employee_id' and month(date)='$explodeyear[1]' and year(date)='$explodeyear[0]' order by date desc";
	$rs=mysqli_query($link,$sql);
	$row=mysqli_num_rows($rs);
	
	 while($res=mysqli_fetch_array($rs))
	 {
		$yr[]=$res[0]; 
		$mont[]=$res[1];
	 }
		
	
	$cnt=count($yr);
	
	 if($row=='0')
	 {
	$query="INSERT INTO `staff_payment`(`id`, `employee_id`, `date`,`months`, `employee_type`, `mobile`, `doj`, `name`, `designation`, `location`, `company_pf_no`, `pf_acc_no`, `income_tax_no`, `basic_salary`, `working_day`, `holiday`, `hra`, `medical-allowance`, `con_allowance`, `special_allowance`, `tot_deduction`, `net_payment`) VALUES ('','$employee_id','$p_date','$months','$etype','$mobile','$doj','$name','$desig','$location','$bsalary','$wday','$hday','$hra','$mallowance','$callowance','$sallowance',
	'$pf_no','$pfa_no','$it_no','$tot_deduct','$net_pay')";
	$result=mysqli_query($link,$query);
	if($result)
	{
		echo "<script>alert('Payment Successful!!!');</script>";
		echo "<script>window.location='print_salary.php';</script>";
		/*header("Location:staff-salary.php?pagename=staff-payment");
	   echo "<script>location='staff-salary.php?pagename=staff-payment'</script>";*/
	}
} 
	
else if($row>0)
 {
	  $flag=false;
	   for($i=0;$i<$cnt;$i++)
	   {
		if($mont[$i]!=$explodeyear[1] && $yr[$i]==$explodeyear[0])
		{
		
		$query="INSERT INTO `staff_payment`(`id`, `employee_id`, `date`,`months`, `employee_type`, `mobile`, `doj`, `name`, `designation`, `location`, `company_pf_no`, `pf_acc_no`, `income_tax_no`, `basic_salary`, `working_day`, `holiday`, `hra`, `medical-allowance`, `con_allowance`, `special_allowance`, `tot_deduction`, `net_payment`) VALUES ('','$employee_id','$p_date','$months','$etype','$mobile','$doj','$name','$desig','$location','$bsalary','$wday','$hday','$hra','$mallowance','$callowance','$sallowance',
	'$pf_no','$pfa_no','$it_no','$tot_deduct','$net_pay')";
	$result=mysqli_query($link,$query);
	if($result)
	{
		echo "<script> alert('Payment Successful!!!'); </script>";
		echo "<script>window.location='print_salary.php';</script>";
		
	}
	
	 }
	 $flag=true;
 }
if($flag==true){echo "<script>alert('You have already paid for this months!!');</script>";};
 } 
 
  
 
}
 
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
		
		function getWorking(data){
			var wday=data;
			if(isNaN(wday)){
				
				$("#wday").val("");
				
			}
			else {
				$("#wday").val(wday);
	
			}
		}
		
		function totalDeduction(data){
			var hday=data;
			var wday=$("#wday").val();
			var bsalary=$("#bsalary").val();
			//alert(bsalary);
			if(bsalary==""){
				alert('First Enter Basic Salary!!');
				$("#bsalary").focus();
			}
			if(wday==""){
				alert('First Enter working day!!');
				$("#wday").focus();
			}
		
			else{
				if(isNaN(wday)){
					$("#wday").val("");
					$("#hday").val("");
				}
				else{
					//var day=wday-hday;
					var cal=bsalary/wday;
					var tot_deduction=hday*cal;
					$("#tot_deduct").val(tot_deduction);
				}
			}
		}
	
	function Mallowance(data){
			var mallowance=data;
			var bsalary=$("#bsalary").val();
			var hra=$("#hra").val();
			
				if(isNaN(mallowance)){
					$("#mallowance").val("");
				}
				else{
					var tot=parseInt(bsalary)+parseInt(hra)+parseInt(mallowance);
					$("#net_pay").val(tot);
				}
			
		}
		function Callowance(data){
			var callowance=data;
			var bsalary=$("#bsalary").val();
			var hra=$("#hra").val();
			var mallowance=$("#mallowance").val();
				if(isNaN(callowance)){
					$("#callowance").val("");
				}
				else{
					var tot=parseInt(bsalary)+parseInt(hra)+parseInt(mallowance)+parseInt(callowance);
					$("#net_pay").val(tot);
				}
			
		}		
	function Sallowance(data){
			var sallowance=data;
			var bsalary=$("#bsalary").val();
			var hra=$("#hra").val();
			var mallowance=$("#mallowance").val();
			var callowance=$("#callowance").val();
			
				if(isNaN(sallowance)){
					$("#sallowance").val("");
				}
				else{
					var tot=parseInt(bsalary)+parseInt(hra)+parseInt(mallowance)+parseInt(callowance)+parseInt(sallowance);
					$("#net_pay").val(tot);
				}
			
		}		
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Salary</title>

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
      
            	<legend style=" color:#e46809;">Staff Salary</legend>
               
     	<div class="container-fluid">
        	<form action="" method="post" enctype="multipart/form-data"><!-- form beginning -->
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
                                	<div class="col-lg-5 col-md-5" ><b>Date:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<input type="date" name="p_date" id="p_date" class="form-control" />
                                    	<script>
											Date.prototype.toDateInputValue = (function() {
												var local = new Date(this);
												local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
												return local.toJSON().slice(0,10);
												});
											document.getElementById('p_date').value = new Date().toDateInputValue();
										</script>
                                    </div>
                                </div><br />
                           		 	 	<div class="row">
                                	<div class="col-lg-5 col-md-5" ><b>Months:</b></div>
                                    <div class="col-lg-7 col-md-7" >
                                    	<select name="months" id="months" class="form-control">
										
                                             <option value="0">--Select--</option>
                                            <option value="jan">Jan</option>
                                            <option value="feb">Feb</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                           <option value="may">May</option>
                                           <option value="june">June</option>
                                           <option value="july">July</option>
                                           <option value="august">August</option>
                                           <option value="sept">Sept</option>
                                           <option value="oct">Oct</option>
                                           <option value="nov">Nov</option>
                                           <option value="dec">Dec</option>
                                          
                                    </select>
                                    </div>
                                </div><br />
                               	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Employee Type:</b></div>
           <div class="col-lg-7 col-md-7"><input type="text" name="etype" id="etype" class="form-control" value="<?php echo $employee_type; ?>" /></div>
                            </div><!--end of etype row--><br />
                              	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Mobile:</b></div>
           <div class="col-lg-7 col-md-7"><input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $mobile; ?>" /></div>
                            </div><!--end of etype row--><br />
                              	<div class="row">
                            	<div class="col-lg-5 col-md-5"><b>Date of Joining:</b></div>
           <div class="col-lg-7 col-md-7"><input type="text" name="doj" id="doj" class="form-control" value="<?php echo $joining_date; ?>" /></div>
                            </div><!--end of joining row-->
                                
                            </div><!--end of date section-->
                            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"></div>
                        	
                        </div><!--end of row 1-->
                        <br />
                        <div class="row">
                        	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>&nbsp;&nbsp;Employee Name:</b></div>
                               
                                <div class="col-lg-5 col-md-5"><input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" /></div>
                            </div><!--end of name row--><br />
                        	
                            	<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>&nbsp;&nbsp;Designation:</b></div>
           <div class="col-lg-5 col-md-5"><input type="text" name="desig" id="desig" class="form-control" value="<?php echo $designation; ?>" /></div>
                            </div><!--end of designation row--><br />
               
                       		<div class="row">
                            	<div class="col-lg-3 col-md-3"><b>&nbsp;&nbsp;Location:</b></div>
           <div class="col-lg-5 col-md-5"><input type="text" name="location" id="location" class="form-control" value="<?php echo $t_district; ?>" /></div>
                            </div><!--end of designation row--><br />
                        	
                        </div><!--end of row 2-->
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#salary" style="color:#36EF1A;">Salary</a></li>
                       
                        </ul>
                        
                        <div class="tab-content">
                          <div id="salary" class="tab-pane fade in active">
                            <br />
                            <ul class="nav nav-pills">
                              <li class="active"><a data-toggle="pill" href="#earning">Earning</a></li>
                            </ul>
                          
                            <div class="tab-content">
                               <div id="earning" class="tab-pane fade in active"><br />
                                 
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>Basic Salary:</b></div>
                                        <div class="col-md-4">
                                        <input type="text" name="bsalary" id="bsalary" class="form-control" value="<?php echo $basic_salary; ?>" />
                                        </div>
                                    </div><!-- end of basic salary row 2-->
                                    <br/>
                              		  <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>Working Days:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="wday" id="wday" class="form-control" value="" onKeyUp="getWorking(this.value);" />
                                        </div>
                                    </div><!-- end of working day row 2-->
                                    <br/>
                                     <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>Holidays:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="hday" id="hday" class="form-control" value="" onKeyUp="totalDeduction(this.value);" />
                                        </div>
                                    </div><!-- end of holidays row 3-->
                                    <br/>
                                  
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>HRA:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="hra" id="hra" class="form-control" value="<?php echo $hra; ?>" />
                                        </div>
                                    </div><!-- end of hra row 3-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>Medical Allowance:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="mallowance" id="mallowance" class="form-control" value="" onKeyUp="Mallowance(this.value);"/>
                                        </div>
                                    </div><!-- end of taddress row 4-->
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>conv. Allowance:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="callowance" id="callowance" class="form-control" value="" onKeyUp="Callowance(this.value);" />
                                        </div>
                                    </div><!-- end of taddress row 5-->
                                    <br/>
                                        <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"><b>Special Allowance:</b></div>
                                        <div class="col-md-4">
                                        	<input type="text" name="sallowance" id="sallowance" class="form-control" value="" onKeyUp="Sallowance(this.value);" />
                                        </div>
                                    </div><!-- end of special row 5-->
                                    <br/>
                                </div><!-- end of earning-->
                   
                       
                            </div>
                          </div>
                         
                        </div><!--end of nav tab-->
                    </div><!-- end of right section -->
                </div><!-- end of form row 1 -->
                <div class="row"><!--form row 2-->
                	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    	<div class="row">
                        	<legend style=" color:#e46809;"></legend>
                           
                              <div class="row">
                            	 <div class="col-lg-5 col-md-5"><b>Company PF No:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="pf_no" id="pf_no" class="form-control" value="<?php echo $company_pf; ?>" /></div>
                            </div><!--end of total deduction--><br />
                            <div class="row">
                            	 <div class="col-lg-5 col-md-5"><b>PF Account No:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="pfa_no" id="pfa_no" class="form-control" value="<?php echo $pf_acc_no; ?>" /></div>	
                            </div><!--end of net payment--><br />
                             <div class="row">
                            	  <div class="col-lg-5 col-md-5"><b>Income Tax No:</b></div>
                                 <div class="col-lg-6 col-md-8"><input type="text" name="it_no" id="it_no" class="form-control" value="<?php echo $income_tax_no; ?>" /></div>	
                            </div><!--end of total deduction--><br />
                            
                        </div>
                    </div><!-- end of left section -->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br /><br />
                    	<div class="row">
                        	<div class="row">
                            	<legend style=" color:#A65E5F;"></legend>
                                <div class="col-lg-4 col-md-2"><b>Total Deduction:</b></div>
                                <div class="col-lg-4 col-md-5">
                               <input type="text" name="tot_deduct" id="tot_deduct" class="form-control" value="" readonly/>
                               </div>
                                 <br /><br />
                                 <div class="col-lg-4 col-md-2"><b>Net Payment:</b></div>
                                 <div class="col-lg-4 col-md-5"><input type="text" name="net_pay" id="net_pay" class="form-control" value="<?php echo $net_pay; ?>" readonly /></div>	
                               
                               
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
                    <div class="col-lg-5 col-md-5 col-sm-3 col-xs-2"><br /></div>
                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success" style="margin-top:5px;margin-bottom:5px;" />
                        
                    </div>
          <!--        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                    	<button class="btn btn-danger" style="margin-top:5px;margin-bottom:5px;" type="button" name="print" onClick="myFunction()">Print</button>
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
        if( !confirm('Are you sure that you want to submit the payment') ){
            event.preventDefault();
        } 

    });
});
      
</script>
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
 