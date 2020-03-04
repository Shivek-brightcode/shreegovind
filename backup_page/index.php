<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>School</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script>

	function getDetails(data){
		var mobile=data;
		//alert(mobile)
		if(mobile.length>10){
			alert("Enter Valid Number!!");
			$("#mobile_no").val("");
			$("#mobile_no").focus();
		}
		
		$.ajax({
            type: 'GET',
            url: 'getMobile.php',
            data: {
                mobile: mobile
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
				var id=data['id'];
				//alert(id)
				if(id=='0'){
					$("#mob").hide();
					$("#form").show();
					$("#mobile").val(mobile);
				}
				else{
					var msg="username: admin and password: admin!!";
					window.location="index1.php?msg="+msg;
				}
            }
        });		
	}

</script>


</head>

<body>
	<div class="container">
   		<div class="row">
        	<div class="container-fluid">
            	<br /><br />
            	<div class="row" id="mob">
                	<div class="col-lg-4 col-md-4"></div>
                	<div class="col-lg-4 col-md-4">
                    	<div class="panel panel-success">
                        	<div class="panel-heading text-center"><h3>Enter Mobile No.</h3></div>
                            <div class="panel-body">
                            	<div class="input-group">
                                    <span class="input-group-addon">+91</span>
                                    <input type="text" id="mobile_no" class="form-control" onkeyup="getDetails(this.value)" />
                                </div>
                            </div>
                        </div>
                    </div>
                	<div class="col-lg-4 col-md-4"></div>
                </div><!--end of mobile-->
                <div class="row" id="form" style="display:none"> 
                	<div class="col-lg-3 col-md-3"></div>
                	<div class="col-lg-6 col-md-6">
                    	<div class="panel panel-success">
                        	<div class="panel-heading text-center"><h3>Enter Details</h3></div>
                            <div class="panel-body">
                                <form method="post" class="bs-example bs-example-form" role="form" action="addclient.php">
                                    <div class="input-group" style="width:120%">
                                        <span class="input-group-addon" style="width:20%">Name: </span>
                                        <input type="text" name="name" id="name" class="form-control" style="width:80%" required="required" />
                                    </div>
                                    <br />
                                    <div class="input-group" style="width:120%">
                                        <span class="input-group-addon" style="width:12%">Mobile:</span>
                                        <span class="input-group-addon" style="width:8%">+91</span>
                                        <input type="text" name="mobile" id="mobile" class="form-control"  style="width:80%"/>
                                    </div>
                                    <br />
                                    <div class="input-group" style="width:120%">
                                        <span class="input-group-addon" style="width:20%">Shop Name:</span>
                                        <input type="text" name="shop" id="shop" class="form-control"  style="width:80%" required="required"/>
                                    </div>
                                    <br />
                                    <div class="input-group" style="width:120%">
                                        <span class="input-group-addon" style="width:20%">Place:</span>
                                        <input type="text" name="place" id="place" class="form-control" style="width:80%" required="required" />
                                    </div>
                                    <br />
                                    <div class="input-group" style="width:120%">
                                        <span class="input-group-addon" style="width:20%">Email:</span>
                                        <input type="email" name="email" id="email" class="form-control" style="width:80%" />
                                    </div>
                                    <br />
                                    <div>
                                       <center><input type="submit" name="save" value="Save" class="btn btn-success" /></center>
                                    </div>
                                    <br />
                                </form>
                            </div>
                        </div>
                    </div>
                	<div class="col-lg-3 col-md-3"></div>
                </div><!--end of form div-->
            </div>
        </div>
   	</div><!-- end of container -->
  
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    	
</body>
</html>
