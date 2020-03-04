<html>
<head> 
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
    	window.onload=function(){
			$('#module').val("");
		}
    </script>
</head>
<title>Select User</title>
<body>
 <noscript>
   Please enable javascript of your browser
 </noscript>


 <div class="container">
 <div class="row">
	    <div class="col-md-3"></div>
		<div class="col-md-6">
		   <div class="panel panel-default ">
		     <div class="panel-heading"><h3 class="text-danger"> Select Login Type</h3></div><!-- end of heading-->
		     <div class="panel-body">
		     	<div class="row">
		     	   <div class="col-md-4"><b>Select One</b></div>
		     	   <div class="col-md-5">
		     	   	
		     	   	<select class="form-control" id="module">
		     	   		 <option value="">---Select One--</option>
		     			 <option value="superuser">Admin</option>
		     			 <option value="user">Users</option>
		     		</select>
		     	   </div>
		     		
		     	</div><!-- end of row for module-->
		     </div><!-- end of panel-body-->
		   </div><!--  end of panel-->
		</div>
	    <div class="col-md-3"></div>
	</div>
 </div><!-- container closed -->
 
   <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
     <script type="text/javascript">
    	$("#module").change(function(){
             var location=$("#module").val();
            // alert(location);
            if(location=="superuser"){
            	window.location="admin_login.php";
            }
			else if(location=="user"){
            	window.location="user_login.php";
            }
    	});
    </script>
    
</body>

</html>