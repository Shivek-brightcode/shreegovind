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
	<title>view-staff's</title>
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
			  $employee_id=$_REQUEST["employee_id"];
			  $data="SELECT * from `staff_info` where employee_id='$employee_id'";
			  $datas=mysqli_query($link,$data);
			  $result=mysqli_fetch_assoc($datas);
			 
			?>
			<h2 style="margin:20px;">Staff Information</h2>
            <table width="700" border="0" cellpadding="0" cellspacing="0"  style="background-color:#F8F8F8">
            <tr>
            	<td width="350">
			<table width="350" style="padding:20px; margin-left:30px; background-color:#F8F8F8;" cellpadding="2" cellspacing="2">
			<tr>
					<td>Employee Id</td><td><?php echo "&nbsp;"."$result[employee_id]"; ?> </td>
			    </tr>
				<tr>
					<td>Joining Date</td><td><?php echo "&nbsp;"."$result[joining_date]"; ?> </td>
			    </tr>
				<tr>
					<td>Name</td><td> <?php echo "&nbsp;"."$result[name]"; ?> </td>
				</tr>
				<tr>
					<td>Employee Type</td><td> <?php echo "&nbsp;"."$result[employee_type]"; ?> </td>
				</tr>
				<tr>
					<td>Father Name</td><td><?php echo "&nbsp;"."$result[father]"; ?> </td>
			    </tr>
				<tr>
					<td>Designation</td><td> <?php echo "&nbsp;"."$result[designation]"; ?></td>
				</tr>
                <tr>
					<td>Date Of Birth</td><td> <?php echo "&nbsp;"."$result[dob]"; ?></td>
				</tr>
				<tr>
					<td>Age</td><td><?php echo "&nbsp;"."$result[age]"; ?></td>
				</tr>
				<tr>
					<td>Gender</td><td><?php echo "&nbsp;"."$result[gender]"; ?></td>
				</tr>
				
				<tr>
					<td>Blood Group</td><td><?php echo "&nbsp;"."$result[blood_group]"; ?></td>
				</tr>
				<tr>
					<td>Religion</td><td><?php echo "&nbsp;"."$result[religion]"; ?> </td>
				</tr>
                <tr>
					<td>Caste</td><td><?php echo "&nbsp;"."$result[caste]"; ?> </td>
				</tr>
                <tr>
					<td>Basic Salary</td><td><?php echo "&nbsp;"."$result[basic_salary]"; ?> </td>
				</tr>
                <tr>
					<td>PF</td><td><?php echo "&nbsp;"."$result[pf]"; ?> </td>
				</tr>
                <tr>
					<td>HRA</td><td><?php echo "&nbsp;"."$result[hra]"; ?> </td>
				</tr>
                
                <tr>
					<td>Total Salary</td><td><?php echo "Rs.".number_format(($result['basic_salary']+$result['pf']+$result['hra']),2); ?> </td>
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
              <table width="100%" style="margin-left:30px;"><tr><td><label style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px;">Last Work Details</label></td></tr></table>
			</table>
	<table style="padding:20px; margin-left:30px; background-color:#F8F8F8;"  width="700">
    
				<tr>
						<td>Previous School</td><td><?php echo "&nbsp;"."$result[school_name]"; ?></td>
				</tr>
				<tr>
						<td>Duration</td><td><?php echo "&nbsp;"."$result[duration]";  ?></td> 

				</tr>
				
				 
				<table width="100%" style="margin-left:30px;"><tr><td><label style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px;">Current Address</label></td></tr></table>
			</table>
	<table style="padding:20px; margin-left:30px; background-color:#F8F8F8;"  width="700">
				<tr>
						<td >Village:</td><td><?php echo "$result[t_address]"; ?></td>
				</tr>
				<tr>
						<td>State:</td><td><?php echo "$result[t_state]";  ?></td> <td>District:</td><td><?php echo "$result[t_district]"; ?><td>

				</tr>
				
				<tr>
						<td>Area:</td><td><?php echo "$result[t_area]"; ?></td> <td>Pin Code:</td><td><?php echo "$result[t_pin]"; ?></td>
				</tr>
				<tr>
						<td>Contact No: </td><td><?php echo "$result[mobile]"; ?></td><td>Email Id:</td><td><?php echo "$result[email]"; ?></td>
				</tr>
				
	</table>
	
	<table style="margin-left:30px;"><tr><td><label style="font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:14px;">Parmanent Address</label></td></tr></table>
			</table>
	<table style="padding:20px; margin-left:30px; background-color:#F8F8F8;" width="700">
				<tr>
						<td >Village:</td><td><?php echo "$result[p_address]"; ?></td>
				</tr>
				<tr>
						<td>State:</td><td><?php echo "$result[p_state]";  ?></td> <td>District:</td><td><?php echo "$result[p_district]"; ?><td>

				</tr>
				
				<tr>
						<td>Area:</td><td><?php echo "$result[p_area]"; ?></td> <td>Pin Code:</td><td><?php echo "$result[p_pin]"; ?></td>
				</tr>
				<tr>
						<td>Contact No: </td><td><?php echo "$result[mobile]"; ?></td>
				</tr>
                
                 <tr>
                     <td  align="center" colspan="4">
                 
                     <input type="image" src="images/print.png" onClick="myFunction()">&nbsp;&nbsp;
                      <a href="staff-details.php" style="text-decoration:none;"><input type="button"  style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a>
                     </td>
                </tr>
	</table>
			
			</div>
           
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
</body>
</html>