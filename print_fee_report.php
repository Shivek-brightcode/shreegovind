<?php
error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
    $user=$_SESSION['user'];
	  $admission_no=$_GET['admission_no'];
	  $pre=$_GET['page']; 
	  $from=$_GET['from'];
	  $to=$_GET['to'];
	  $id=$_GET['id'];
  }
  else{
	  header("Location:index.php");
  }
  
//include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery-3.1.0.js"></script>
<title>Fee Details</title>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin:0;  /* this affects the margin in the printer settings */
}
@media print{
	#buttons{
			display:none;
		}
	#invoice{
    width: 720px;
   
    margin-top:-170px;
    margin-right: 40px;
  }
	}
</style>
</head>

<body>
    <div class="container">
     <div class="row">
       <div class="col-md-12">
			<center>
				<strong><font size="+2">Sri Govind Middle & High School </font></strong><br />
				
				
			</center>
       </div><!-- col-md-12 closed -->
     </div><!-- End of row-->
 
     <div class="row">
      <div class="col-md-1"></div>
       <div class="col-md-12">
          <center> <table border="1" width="100%" height="100px">
             <thead>
              
               <th  style="text-align:center;"><font size="+1">Adm No.</font></th>
               <th  style="text-align:center;"><font size="+1">Name</font></th>
               <th  style="text-align:center;"><font size="+1">Father Name</font></th>
               <th  style="text-align:center;"><font size="+1">Class</font></th>
               <th  style="text-align:center;"><font size="+1">User</font></th>
               <th  style="text-align:center"><font size="+1">Date</font></th>
               <th  style="text-align:center"><font size="+1">Months</font></th>
               <th  style="text-align:center"><font size="+1">Adm frm</font></th>
               <th  style="text-align:center"><font size="+1">Adm charge</font></th>
              <th  style="text-align:center"><font size="+1">Monthly Fee</font></th>
              <th  style="text-align:center"><font size="+1">Transport fee</font></th>
              <th  style="text-align:center"><font size="+1">Annual Dev.</font></th>
             <th  style="text-align:center"><font size="+1">Tie-Belt-Diary</font></th>
             <th  style="text-align:center"><font size="+1">Book-Cover-Copies</font></th>
             <th  style="text-align:center"><font size="+1">Fine</font></th>
            <th  style="text-align:center"><font size="+1">Others</font></th>
             <th  style="text-align:center"><font size="+1">Discount</font></th>
             <th  style="text-align:center"><font size="+1">Total Fee</font></th>
             <th  style="text-align:center"><font size="+1">Amount Paid</font></th>
             <th  style="text-align:center"><font size="+1">Dues</font></th>
             <th  style="text-align:center"><font size="+1">Pay Mode</font></th>
             
             </thead>
             <?php 
			 include "dbconnection.php";
			 $sql2="select * from `student_payments` where admission_no='$admission_no' and id='$id'";
			       $ex=mysqli_query($link,$sql2);
				  
				  while($resultset=mysqli_fetch_array($ex)){
  			  ?>
             <tr style="text-align:start;" valign="middle">
              
               <td style="text-align:center;"><?php echo $resultset['admission_no'];?></td>
               <td style="text-align:center"><?php echo $resultset['name'];?></td>
               <td style="text-align:center"><?php echo $resultset['father_name'];?></td>
               <td style="text-align:center"><?php echo $resultset['class'];?></td>
               <td style="text-align:center"><?php echo $resultset['user'];?></td>
               <td style="text-align:center"><?php echo $resultset['date'];?></td>
               <td style="text-align:center"><?php echo $resultset['date_from']." to ".$resultset['date_to'];?></td>
               <td style="text-align:center"><?php echo $resultset['adm_form'];?></td>
               <td style="text-align:center"><?php echo $resultset['adm_charge'];?></td>
               <td style="text-align:center"><?php echo $resultset['monthly_fee'];?></td>
               <td style="text-align:center"><?php echo $resultset['transport_fee'];?></td>
               <td style="text-align:center"><?php echo $resultset['annual_dev'];?></td>
               <td style="text-align:center"><?php echo $resultset['tie_belt_diary'];?></td>
               <td style="text-align:center"><?php echo $resultset['book_cover_copies'];?></td>
               <td style="text-align:center"><?php echo $resultset['fine'];?></td>
               <td style="text-align:center"><?php echo $resultset['other'];?></td>
               <td style="text-align:center"><?php echo $resultset['discount'];?></td>
               <td style="text-align:center"><?php echo "₹ ".$resultset['total_fee'];?></td>
                <td style="text-align:center"><?php echo "₹ ".$resultset['payable_amount'];?></td>
               <td style="text-align:center"><?php echo "₹ ".$resultset['dues_amount'];?></td>
                <td style="text-align:center"><?php echo $resultset['pay_mode'];?></td>
             </tr>
                <?php 
				 }
				 
				?>
          
          
           </table></center>
       </div><!-- col-md-12 closed -->

      <div class="col-md-1"></div>
     </div>
     <br /><div id="buttons">
     <center>
      <button type="button" class="btn btn-danger" onclick="window.print();" >Print</button>
     <button type="button" onclick="closeThis('<?php echo $pre; ?>');" class="btn btn-default">Close</button>
     </center></div>
   </div><!-- coantainer closed-->
<script>
  var a=$("#content").val();
 // alert(a);
 
 function closeThis(data){
	 page=data;
	 if(page==""){
		 window.location="fee_detail_report.php?pagename=report";
	 }
	 else{
		 window.location="fee_detail_report.php?pagename=report&from=<?php echo $from; ?>&to=<?php echo $to; ?>";
	 }
 }
</script>
</body>
</html>