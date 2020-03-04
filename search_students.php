
 <?php
 error_reporting(0);
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	   $search=$_REQUEST["q"];

  }
  else{
	   header("Location:index.php");
	   echo "<script>location='index.php'</script>";
	 
  }
       ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

</head>

<body>

  <?php //include "demoheader.php";?>
   <div class="container">

     <div class="row">
     
     	<div class="container-fluid">
        	<div class="table-responsive">
            	<table class="table table-condensed table-hover table-striped table-bordered">
                	<thead>
                    	<th colspan="11" style="font-size:18px; background-color:#06296b; color:#E4D6D6;"> Student Details</th>
                    	
                    </thead>
                	<thead>
                    	
                    	<th style="text-align:center">Adm. No.</th>
                    	<th style="text-align:center">Name</th>
                    	<th  style="text-align:center">Father</th>
                    	<th style="text-align:center">Adm. Date</th>
                    	<th style="text-align:center">Roll No</th>
                    	<th style="text-align:center">Section</th>
                    	<th  style="text-align:center">Class</th>
                    	<th style="text-align:center">DOB</th>
                    	<th style="text-align:center">Action</th>
                        
                    </thead>
 <?php  
       include "dbconnection.php"; 
	   if(!isset($_GET['page']) && $_GET['page']=='')
	   {
		   $page=1;
	   }else{
		   $page=$_GET['page'];
		   
	   }
	   $count=12;
	   $offset=($page-1)*$count; 
       $ddata="SELECT * FROM new_registration WHERE name LIKE '%".$search."%' OR admission_no LIKE '%".$search."%' limit $offset,$count"; 
	   $sql="SELECT count(admission_no) as count FROM new_registration WHERE name LIKE '%".$search."%' OR admission_no LIKE '%".$search."%'";
	   $query=mysqli_query($link,$sql);
	   $data=mysqli_fetch_array($query);
	   $rownum=$data['count'];
	   $result=mysqli_query($link,$ddata);
	   $row=mysqli_num_rows($result);
	   $pages=$rownum/$count;
	   if($row>0)
	   {
	   while($results = mysqli_fetch_assoc($result))
	   {  
	 
	   ?>
      <tr>
                
                <td style="text-align:center"><?php echo $results['admission_no']; ?></td>
                <td style="text-align:center"><?php echo $results['name']; ?></td>
                <td style="text-align:center"><?php echo $results['father_name']; ?></td>
                <td style="text-align:center"><?php echo $results['admission_date']; ?></td>
                <td style="text-align:center"><?php echo $results['roll_no']; ?></td>
                <td style="text-align:center"><?php echo $results['section']; ?></td>
                <td style="text-align:center"><?php echo $results['class']; ?></td>
                <td style="text-align:center"><?php echo $results['dob']; ?></td>
                 <td style="text-align:center">
                 <?php if($role=='admin'){ ?>
                  <a href='view_student.php?student_id=<?php echo $results[admission_no]; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_student.php?student_id=<?php echo $results[admission_no]; ?>'><span class="fa fa-edit"></span> </a>&nbsp;&nbsp;
  
				  <a href='delete_student.php?student_id=<?php echo $results[addmission_no]; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-trash"></span></a>
                   <?php } else if($role=='user'){ ?> 
                    <a href='view_student.php?student_id=<?php echo $results[admission_no]; ?>' onclick='document.getElementById('form').submit(); return false;'><span class="fa fa-street-view"></span></a>&nbsp;&nbsp;
				  <a href='edit_student.php?student_id=<?php echo $results[admission_no]; ?>'><span class="fa fa-edit"></span> </a>
  <?php } ?>            
                 </td>
                
            </tr>
                  <?php
                
   } //while closed. 
   if(ceil($pages)>1)
   {  
   		
      ?>
     <tr>
         <td colspan="10">
          <center>
         <ul class="pagination"> 
         <?php 
		 if($page>1)
		 {
		 ?> 
	   <li><a href ="search_session_wise.php?q=<?php echo $search;?>&page=<?php echo $page-1;?>">Prev</a></li>
       <?php 
		 }
		
			 for($i=1;$i<=ceil($pages);$i++)
			 {
				 if($i==$page)
				 {
					 ?>
                    <li class="active"><a href ="search_session_wise.php?q=<?php echo $search;?>&page=<?php echo $i;?>"><?php echo $i; ?></a></li> 
                     
                 <?php
				 }
				 else{
				?>
                   <li><a href ="search_session_wise.php?q=<?php echo $search;?>&page=<?php echo $i;?>"><?php echo $i; ?></a></li>    
            <?php
				 }
			 }
		if($page<ceil($pages))
		 {
	   ?>
       <li><a href ="search_session_wise.php?q=<?php echo $search;?>&page=<?php echo $page+1; ?>">Next</a></li>
       <?php 
		 }
	   ?>
 <?php 
	} 
	?>
  </ul></center></td></tr>
<?php
} 
else { 
echo "<tr><td colspan='10'>Recoard not found !!!!</td></tr>";
}
?>
 </table><!-- end of table -->
            </div><!-- end of table div -->
        </div><!-- end of container-fluid -->
     </div><!-- end of row -->
  </div><!-- end of container -->
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
