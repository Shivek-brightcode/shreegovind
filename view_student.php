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
  //var_dump($session);
	include "dbconnection.php"; 
	?>
<!DOCTYPE html>
<html>
<head>
	<title>view-students</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

    <script>
	function myFunction() {
   // window.print();
   var divToPrint=document.getElementById('contains');
//var divToPrint=divToPrint1.concat(divToPrint2);
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
    newWin.close();
}
	</script>
</head>
<body>
	 
	 		 <?php include "demoheader.php";?>
			
			
   <div class="container" id="contains">
			<?php
			  $std_id=$_REQUEST["student_id"];
			  $data="SELECT * from new_registration where admission_no='$std_id'";
			  $datas=mysqli_query($link,$data);
			  $result=mysqli_fetch_assoc($datas);
			  $data1="SELECT total from fee_detail where admission_no='$std_id'";
			  $datas1=mysqli_query($link,$data1);
			  $result1=mysqli_fetch_assoc($datas1);
			  $data2="SELECT * from address where admission_no='$std_id'";
			  $datas2=mysqli_query($link,$data2);
			  $info=mysqli_fetch_assoc($datas2);
			   $data3="SELECT * from contact_info where admission_no='$std_id'";
			  $datas3=mysqli_query($link,$data3);
			  $contact=mysqli_fetch_assoc($datas3);
			?>
            <center>
            <div style="border:1px solid #181212; width:800px; margin-left:20px">
            <h4 style="margin:20px; text-align:center">School Management System</h4>
			
            
            <table width="700" cellpadding="0" cellspacing="0"  style="margin-left:20px;background-color:#F8F8F8;padding:20px;">
            <tr>
            	<td width="350">
                
                	<table width="350"  cellpadding="4" cellspacing="4">
                    <tr>
                      <td colspan="2"><h4>Student Information</h4></td>
                    </tr>
			   <tr>
					<td>Admission Date</td><td><?php echo "&nbsp;".date('d-m-Y',strtotime($result['admission_date'])); ?> </td>
			    </tr>
				<tr>
					<td>Roll No</td><td><?php echo "&nbsp;"."$result[roll_no]"; ?> </td>
			    </tr>
				<tr>
					<td>Session</td><td> <?php echo "&nbsp;"."$result[session]"; ?> </td>
				</tr>
				<tr>
					<td>Class</td><td> <?php echo "&nbsp;"."$result[class]"; ?> </td>
				</tr>
				<tr>
					<td>Section</td><td><?php echo "&nbsp;"."$result[section]"; ?> </td>
			    </tr>
				<tr>
					<td>Student Name</td><td> <?php echo "&nbsp;"."$result[name]"; ?></td>
				</tr>
                <tr>
					<td>Father's Name</td><td> <?php echo "&nbsp;"."$result[father_name]"; ?></td>
				</tr>
				<tr>
					<td>Mother's Name</td><td><?php echo "&nbsp;"."$result[mother_name]"; ?></td>
				</tr>
				<tr>
					<td>Date Of Birth</td><td><?php echo "&nbsp;".date('d-m-Y',strtotime($result['dob'])); ?></td>
				</tr>
				
				<tr>
					<td>Gender</td><td><?php echo "&nbsp".strtoupper($result['gender']); ?></td>
				</tr>
				<tr>
					<td>Religion</td><td><?php echo "&nbsp;".strtoupper($result['religion']); ?> </td>
				</tr>
                <tr>
					<td>Age</td><td><?php echo "&nbsp;"."$result[age]"; ?> </td>
				</tr>
                <tr>
					<td>Blood Group</td><td><?php echo "&nbsp;".strtoupper($result['blood_group']); ?> </td>
				</tr>
                <tr>
					<td>Caste</td><td><?php echo "&nbsp;".strtoupper($result['caste']); ?> </td>
				</tr>
                
                <tr>
					<td>Total Course Fee</td><td><?php echo "Rs.".number_format($result1['total'],2); ?> </td>
				</tr>
               
              
			</table>
                
                </td>
                <td width="350" style="padding:0">
                
                	<table width="350" bgcolor="#F8F8F8" cellpadding="-100" cellspacing="0" style="margin-top:-220px; background-color:#F8F8F8">
                    	<tr>
                            <td height="150"><img width="120" height="150" src="<?php echo $result['photo']; ?>"></td>
                        </tr>
                    	<tr>
                        	<td></td>
                        </tr>
                    </table>
                
                </td>
            </tr>
            </table>
	<table style="padding:20px; margin-left:20px; background-color:#F8F8F8;"  width="700">
    			<tr>
                <td colspan="2"><h4>Last Qualification Details</h4></td>
                </tr>	
				<tr>
						<td>Previous School</td><td><?php echo "&nbsp;"."$result[previous_school]"; ?></td>
				</tr>
				<tr>
						<td>Previous Class</td><td><?php echo "&nbsp;"."$result[previous_class]";  ?></td> 

				</tr>
				<tr>
						<td>Promotted Class</td><td><?php echo "&nbsp;"."$result[promoted]"; ?></td>
				</tr>
				 
				
			</table>
	<table style="padding:20px; margin-left:20px; background-color:#F8F8F8;"  width="700">
    			<tr>
                <td colspan="2"><h4>Current Address</h4></td>
                </tr>
				<tr>
						<td >Village:</td><td><?php echo "$info[t_address]"; ?></td>
				</tr>
				<tr>
						<td>State:</td><td><?php echo strtoupper($info['t_state']);  ?></td> <td>District:</td><td><?php echo "$info[t_district]"; ?><td>

				</tr>
				
				<tr>
						<td>Area:</td><td><?php echo "$info[t_area]"; ?></td> <td>Pin Code:</td><td><?php echo "$info[t_pincode]"; ?></td>
				</tr>
				<tr>
						<td>Contact No: </td><td><?php echo "$contact[mob]"; ?></td><td>Email Id:</td><td><?php echo "$contact[email]"; ?></td>
				</tr>
				
	</table>
	<table style="padding:20px; margin-left:20px; background-color:#F8F8F8;" width="700">
    			<tr>
                	<td colspan="2"><h4>Permanent Address</h4></td>
                </tr>
				<tr>
						<td >Village:</td><td><?php echo "$info[p_address]"; ?></td>
				</tr>
				<tr>
						<td>State:</td><td><?php echo "$info[p_state]";  ?></td> <td>District:</td><td><?php echo "$info[p_district]"; ?><td>

				</tr>
				
				<tr>
						<td>Area:</td><td><?php echo "$info[p_area]"; ?></td> <td>Pin Code:</td><td><?php echo "$info[p_pincode]"; ?></td>
				</tr>
				<tr>
						<td>Contact No: </td><td><?php echo "$contact[mob]"; ?></td>
				</tr>
                 
	</table>
   
    </div>
     </center>
			</div>
            <div class="row">
             <div class="col-lg-5">
            </div>
            <div class="col-lg-1">
                    <div class="2"> <input type="image" src="images/print.png" onClick="myFunction()"></div>
            </div>
            
            <div class="col-lg-1"> 
            <div class="col-lg-3"><a href="search_session_wise.php" style="text-decoration:none;"><input type="button"  style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></div>
            </div>
            </div>
           
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
</body>
</html>