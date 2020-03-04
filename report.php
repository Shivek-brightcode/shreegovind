<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $pg=$_GET['page'];
  } 
  else{
    header("Location:index.php");
  }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>

window.onload=function(){
	var from='<?php echo $_GET['from']; ?>';
	var to='<?php echo $_GET['to']; ?>';
	var page='<?php echo $_GET['page']; ?>';
	if(to!="" && from!=""){
		$("#d_to").val(to);
		$("#d_from").val(from);
	}
	var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("searched_value_as_report").innerHTML = xhttp.responseText;
			  }
	 		};
		xhttp.open("GET", "exp_report_ajax.php?from="+from+"&to="+to+"&page="+page, true);
	 	xhttp.send();
	
}


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
       <div class="row">
	    <div class="col-md-2 col-md-pull-1" style="margin-top:30px;">
          <br />
         <a href="report.php?pagename=report" class="btn btn-info" style="width:130px;">View Expenditure</a><br /><br />
         <a class="btn btn-danger" href="fee_detail_report.php?pagename=fee-report" style="width:130px;">View Fee Details</a><br /><br />
         <a class="btn btn-info" href="caste_wise_report.php?pagename=caste-wise-report" style="width:130px;">Caste Wise</a><br /><br />
         <a class="btn btn-warning" href="default_list_report.php?pagename=default-list-report" style="width:130px;">Default List</a><br /><br />
         <a class="btn btn-primary " href="profit_loss_report.php?pagename=profit-loss-report" style="width:130px;">Profit / Loss</a><br /><br />
         <a class="btn btn-info" href="salary_exp_report.php?pagename=salary-exp-report" style="width:130px; text-align:center">SalaryExpenditure</a><br /><br />
         <a class="btn btn-warning" href="student_list_report.php?pagename=student-list-report" style="width:130px;">Student Lists</a><br /><br />
         <a class="btn btn-danger" href="enquiry_report.php?pagename=enquiry-report" style="width:130px;">Enquiry Report</a><br /><br />
         <a class="btn btn-info" href="class_wise_add.php?pagename=add_subjects" style="width:130px;">Add Subject</a><br /><br/>
         <!--<a class="btn btn-primary" href="search_class_wise_result.php?pagename=search_result" style="width:130px;">View Marks</a><br /><br/>-->
		
		</div><!-- col-md-2 closed-->
     
	    <div class="col-md-9 col-md-pull-1">
        
    <div class="row">
     <div class="col-md-12">
     	<div class="row">
        	<div class="col-md-4"></div><!-- col-md-4 closed -->
        	 <div class="col-md-4">
                 <h3 class="text-center">Expenditure  Report</h3>
                 <hr class="style13"/><br />
             </div>
             <div class="col-md-4" style="margin-top:40px">
             
             </div><!-- col-md-4 closed -->
        </div>
           <div class="row">
             
               <div class="col-md-9">
               <div class="row">
               		<div class="col-md-4">
                    	<input type="text" name="d_from" id="d_from" placeholder="From" class="form-control" />
                    </div><!-- col-md-4 closed -->
					<div class="col-md-1"><b style="font-size:20px;">To</b></div>
               		<div class="col-md-4">
                    	<input type="text" name="d_to" id="d_to" placeholder="To" class="form-control" />
                    </div><!-- col-md-4 closed -->
               		<div class="col-md-2">
                    	<div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success fa fa-search " onclick="getRep();" >Search</button>
                            </div>
                        </div>
                    </div>
               		
               </div><!--end of date row-->
            	 </div><!-- col-md-4 closed --> 
               </div><!-- row closed for panel heading-->
        
           
         
        <br />
          <div id="searched_value_as_report">
          <?php  //include_once "exp_report_ajax.php";?>
          
          </div>
        
    </div><!--end of column for report -->
    </div><!-- end of row for report -->
    
   </div><!-- end of column for main content --> 
  </div><!-- end of row for main content --> 
 </div><!-- end of container --> 

<script>
 
  
  function getRep(){
	  var from=$("#d_from").val();
	  var to=$("#d_to").val();
	$("#search_value").val("");
	  //alert(to);alert(from);
	  if(to==""){
		alert("Select date range!!"); 
		$("#d_to").focus();
	  }
		  var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("searched_value_as_report").innerHTML = xhttp.responseText;
			  }
	 		};
		xhttp.open("GET", "exp_report_ajax.php?from="+from+"&to="+to, true);
	 	xhttp.send();

	  
  }
 </script>
 <!--<script src="bootstrap/js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
