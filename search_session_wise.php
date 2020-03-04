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


window.onload=function(){
	var session='<?php echo $_GET['session']; ?>';
	var q='<?php echo $_GET['q']; ?>';
	var page='<?php echo $pg; ?>';
	if(session!=""){
		$("#select_session").val(session);
		var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			  }
	 		};
		xhttp.open("GET", "search_session_ajax.php?page="+page+"&session="+session, true);
	 	xhttp.send();
		
	}
	if(q!=""){
		$("#search").val(q);
		var xhttp = new XMLHttpRequest();
 	      xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			  }
	 		};
		xhttp.open("GET", "search_students.php?page="+page+"&q="+q, true);
	 	xhttp.send();
		
	}
}

</script>
<script>

function getSession(data){
		//alert('hello');
		var session=data;
		//alert(session);
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			 document.getElementById("ShowSelectedValueDiv").innerHTML = xhttp.responseText;
			}
		  };
		  xhttp.open("GET", "search_session_ajax.php?session="+session, true);
		  xhttp.send();
	}
</script>
<script>
function showCustomer(str)
{
	var xmlhttp;    
	if (str!="")
	 {
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("ShowSelectedValueDiv").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","search_students.php?q="+str,true);
	xmlhttp.send();
	 }
	 else{
		 document.getElementById("ShowSelectedValueDiv").innerHTML='';
	 }
}
	</script>

</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
     <div class="row">
      <div class="col-md-12">
     <div class="row" style="height: 20px;">
						<?php if(isset($_SESSION['success'])){
                            ?>
                          <div class="col-md-12 text-center text-success">
                               <i class="fa fa-check "></i><?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                               
                            </div>
                            <?php
                          }
                          else if(isset($_SESSION['err'])){
                              ?>
                                 <div class="col-md-12 text-danger text-center">
                                     <i class="fa fa-times"></i><?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
                                    
                                  </div>
                              <?php 
                          }
                        ?>
      
    	</div><!-- end of row for message--> 
 		</div><!-- end of row for message -->
     </div>
   <div class="row">
   <br /><br />
   <form method="post">
            	<div class="col-lg-2 col-md-2"></div>
            	<div class="col-lg-2 col-md-2"><b>Session:</b></div>
            	<div class="col-lg-2 col-md-2">
                <?php include "dbconnection.php"; 
					$session="select DISTINCT session from new_registration order by session asc";
					$rs=mysqli_query($link,$session);
				?>
                	<select name="session" id="select_session" class="form-control" onchange="getSession(this.value);">
                    	<option value="0" selected="selected">--Select--</option>
                        <?php while($result=mysqli_fetch_assoc($rs)) {?>
                        <option value="<?php echo $result['session']; ?>"><?php echo $result['session']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            	
            	<div class="col-lg-3 col-md-3"></div>
            </div><!--end of row 1-->
            <br />
             
              <div class="row">
          
            	<div class="col-lg-2 col-md-2"></div>
            	<div class="col-lg-2 col-md-2"><b>Search By Name:</b></div>
            	<div class="col-lg-2 col-md-2">
               <input type="text" name="search" id="search"  placeholder="Search Here" value="" class="form-control" onKeyUp="showCustomer(this.value)" />
                </div>
            	
            	<div class="col-lg-3 col-md-3"></div>
            </div><!--end of row 3-->
            <br />
            <br />
            
    </form>
   
  </div><!-- end of container -->
   
  <div id="ShowSelectedValueDiv">
			<center><img src="images/std_rec.jpg" width="350" height="348" ></center>
			</div>


    
   
<!--  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script> 
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script> 

 
</body>
</html>
