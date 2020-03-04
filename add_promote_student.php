<?php
include('dbconnection.php');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	//print_r($_POST['name']);die;
	$sql="INSERT INTO `promoted_class`(`name`) VALUES ('$name')";	
	$res=mysqli_query($link,$sql);	
	if($res)
	{
		echo "<script>alert('Promoted!');</script>";
		echo "<script>location='search_class_wise.php?pagename=search-class-wise';</script>";
	}
}
?>