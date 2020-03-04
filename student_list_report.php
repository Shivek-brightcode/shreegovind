<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  
  } 
  else{
    header("Location:index.php");
  }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student list Report</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>

window.onload=function(){
	var status='<?php echo $_GET['status']; ?>';
	
	if(status!=""){
		$("#status").val(status);
		
		
	}
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
		</div><!-- col-md-2 closed-->
     
	    <div class="col-md-9 col-md-pull-1">
        
    <div class="row">
     <div class="col-md-12">
     	<div class="row">
        	<div class="col-md-4"></div><!-- col-md-4 closed -->
        	 <div class="col-md-4">
                 <h3 class="text-center">Student list Report</h3>
                 <hr class="style13"/><br />
             </div>
             <div class="col-md-4" style="margin-top:40px">
             
             </div><!-- col-md-4 closed -->
        </div>
          
        
           
         
        <br />
          <div id="searched_value_as_report">
          <?php  //include_once "default_report_ajax.php";?>
          <form action="#" method="" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<a href="export_studentlist_report.php" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export MySQL Data to CSV/Excel File</a>
				</div>
			</div>
		</form>
          <table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Adm No.</th>
                                   <th style="text-align:center">Adm Date</th>
                                   <th style="text-align:center">Roll No</th>
                                   <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Father</th>
                                     <th style="text-align:center">Mother</th>
                                   <th style="text-align:center">Class</th>
                                   <th style="text-align:center">Section</th>
                                   <th style="text-align:center">Session</th>
                                   <th style="text-align:center">DOB</th>
                                   <th style="text-align:center">Gender</th>
                               
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
		
		$sql="select * from `new_registration` limit $offset, $count";
		$sql1="select count(admission_no) as count from `new_registration`";
	
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                    <td align="center"><?php echo $result['admission_no']; ?></td>
                                   <td align="center"><?php echo $result['admission_date']; ?></td>
                                    <td align="center"><?php echo $result['roll_no']; ?> </td>
                                   <td align="center"><?php echo $result['name']; ?> </td>
                                   <td align="center"><?php echo $result['father_name']; ?> </td>
                                   <td align="center"><?php echo $result['mother_name']; ?> </td>
                                   <td align="center"><?php echo $result['class']; ?></td>
                                   
                                   <td align="center"><?php echo $result['section']; ?></td>
                                    <td align="center"><?php echo $result['session']; ?></td>
                                    <td align="center"><?php echo $result['dob']; ?></td>
                                    <td align="center"><?php echo $result['gender']; ?></td>
                                     
                                   <td align="center"><a href="print_student_report.php?page=student-report&admission_no=<?php echo $result['admission_no'];?>"><span class="fa fa-print"></span></a></td
                                ></tr>
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
	
								?>
                            
                             <?php if(ceil($pages)>1){
							 ?>
                             <tr>
                              <td colspan="17">
                             <center>
                             <ul class="pagination">
                               <?php 
							     if($page>1){
									   ?>
                                  
										<li><a href ="student_list_report.php?page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="student_list_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="student_list_report.php?page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="student_list_report.php?page=<?php echo $page;?>">next</a></li>
										   <?php 
										   
											}
							   
							   ?>
                               </ul>
                               </center>
                               </td>
                             </tr>
                             </table>
                             <?php
	}



?>  
          
          </div>
        
    </div><!--end of column for report -->
    </div><!-- end of row for report -->
    
   </div><!-- end of column for main content --> 
  </div><!-- end of row for main content --> 
 </div><!-- end of container --> 

<script>

  function getRep(){
	  var status=$("#status").val();
	 var cls = $("#cls").val();
	$("#search_value").val("");
	 
		  //alert(status);
		  var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("searched_value_as_report").innerHTML = xhttp.responseText;
			  }
	 		};
			if(cls==''){
		xhttp.open("GET", "default_report_ajax.php?status="+status, true);
	 	xhttp.send();
			}
		else if(cls!='')
		{
		xhttp.open("GET", "default_class_report_ajax.php?status="+status+"&cls="+cls, true);
	 	xhttp.send();
		}
	 
	  
  }
 </script>
 <!--<script src="bootstrap/js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
