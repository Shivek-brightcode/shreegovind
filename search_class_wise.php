<?php
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	   if(isset($_GET['page']))$pg=$_GET['page'];
		
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
<title>View Session Wise</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script>
function getClass(data){
		//alert('hello');
		var cls=data;
		//alert(cls);
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			 document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			}
		  };
		  xhttp.open("GET", "search_class_ajax.php?cls="+cls, true);
		  xhttp.send();
	}
</script>
<script>
window.onload=function(){
	
	var cls='<?php echo $_GET['cls']; ?>';
	var page='<?php echo $pg; ?>';
	if(cls!=""){
		$("#select_class").val(cls);
		var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			  }
	 		};
		xhttp.open("GET", "search_class_ajax.php?page="+page+"&cls="+cls, true);
	 	xhttp.send();
		
	}
}
</script>
<script>
function getpromoteClass(data1){
		//alert('hello');
		var cls=data1;
		//alert(cls);
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			 document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			}
		  };
		  xhttp.open("GET", "search_promoteclass_ajax.php?cls="+cls, true);
		  xhttp.send();
	}
</script>
</head>

<body>
  <?php include "demoheader.php";?>
   <div class="container">
   <div class="row">
   <form method="post">
            	<div class="col-lg-2 col-md-2"></div>
            	<div class="col-lg-2 col-md-2"><b>Class:</b></div>
            	<div class="col-lg-2 col-md-2">
                <?php include "dbconnection.php"; 
					$class="select DISTINCT class from new_registration order by DESC class";
					$rs=mysqli_query($link,$class);
				?>
                	<select name="session" id="select_class" class="form-control" onchange="getClass(this.value);">
                    	<option value="0" selected="selected">--Select--</option>
                        <!-- <?php //while($result=mysqli_fetch_assoc($rs)) {?>
                        <option value="<?php //echo $result['class']; ?>"><?php //echo $result['class']; ?></option>
						<?php //} ?> -->
						<option value="LKG">LKG</option>
						<option value="UKG">UKG</option>
						<option value="Nursery">Nursery</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
                    </select>
                </div>
            	<div class="col-lg-3 col-md-3"></div>
				<div class="col-md-3">
						<label for="BrandPartner">Promote Class</label>
						<select name="state" id="state" class="form-control" onchange="getpromoteClass(this.value);">
							<option value="">--Select--</option>
							<option value="LKG">LKG</option>
							<option value="UKG">UKG</option>
							<option value="Nursery">Nursery</option>
							<option value="First">First</option>
							<option value="Second">Second</option>
							<option value="Third">Third</option>
							<option value="forth">forth</option>
							<option value="Fifth">Fifth</option>
							<option value="Sixth">Sixth</option>
							<option value="Seventh">Seventh</option>
							<option value="Eighth">Eighth</option>
							<option value="Ninth">Ninth</option>
							<option value="Tenth">Tenth</option>
							<option value="11th">11th</option>
							<option value="12th">12th</option>    
						</select>
				</div>   
            </div><!--end of row 2-->
            <br />
            <br />
    </form>
   
  </div><!-- end of container -->
   
  	<div id="ShowSelectedValueDiv">
			<center><img src="images/std_rec.jpg" width="350" height="348" ></center>
	</div>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>

    	
</body>
</html>
