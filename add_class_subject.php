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
if(isset($_POST['save']))
{
   $class= html_entity_decode(trim($_POST['class']));
   $subject_name= html_entity_decode(trim($_POST['subject_name']));
   
   $query="INSERT INTO `class_subject`(`class`, `subject_name`) VALUES ('$class','$subject_name')";
   $result=mysqli_query($link,$query);
   if($result)
   {
       echo "<script>alert('Subject Added Successfully!!!');</script>";
       echo "<script>window.location='class_wise_add.php?pagename=add_subjects';</script>";		
   }
} 
   

?>