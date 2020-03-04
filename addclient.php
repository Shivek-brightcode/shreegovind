<?php
include('dbconnection.php');
if(isset($_POST['save'])){
	
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$shop=$_POST['shop'];
	$place=$_POST['place'];
	$email=$_POST['email'];
	
	$query="insert into clients (id,name,mobile,shop,place,email,added_on) values ('','$name','$mobile','$shop','$place','$email',CURRENT_TIMESTAMP)";
	$rq=mysqli_query($link,$query);
	if($rq){
		$name=@trim(stripslashes($name)); 
		$mobile=@trim(stripslashes($mobile)); 
		$shop=@trim(stripslashes($shop)); 
		$place=@trim(stripslashes($place));  
		
		$body='Name : '.ucfirst($name)."\n\n". 'Mobile : '.$mobile."\n\n" .'Shop : '.ucfirst($shop)."\n\n" .'Place : '.ucfirst($place)."\n\n";
		
		$headers = "Reply-To: atal.prateek@rsgss.com\r\n";
		$headers .= "Return-Path: atal.prateek@rsgss.com\r\n";
		if($email!=""){
			$email=@trim(stripslashes($email)); 
			$from="From: $email\r\n";
			$headers=$from.$headers;
			$body.='Email : '.$email;
		}
		
		
		
		$email_to="softwarersg@gmail.com";
		
		
		$subject="School Software";
		
		
		$send=@mail($email_to, $subject, $body, $headers);
		
		if($send){
			//echo $body;
			$msg="Username:admin and Password:admin !!";
			header("location:index1.php?msg=$msg");
		}
		
	}
	
}
?>