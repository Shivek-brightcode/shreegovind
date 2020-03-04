<?php
error_reporting(0);
session_start();
 if(isset($_SESSION['user'])){
	  $role=$_SESSION['role'];
	  $user=$_SESSION['user'];
	  $pg=$_GET['page'];
  } 
  else{
    header("Location:index.php");
  }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>



$(function() {
	$('#d_from').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#d_to').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
    

    <!-- Custom Fonts -->
    
    <style>
	hr.style13 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
	
}
.errspan {
    float: left;
    margin-right: 6px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
	font-size:20px;
	padding-left:10px;
}

	</style>
</head>

<body>
<?php include "demoheader.php";?>
   <div class="container">
      <div class="row" style="margin-top: 50px;">
      <div class="col-md-2" style="vertical-align: text-bottom;padding-top: 100px;">
         
            <ul type="none">
           <li><a href="add_user.php" class="btn btn-danger">Add Users</a></li>
           </ul>
         
      </div><!-- end of sidebar-->
      <div class="col-md-10">
       
    <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
          <table  class="table table-striped table-hovered">
             <fieldset>
                <thead>
                  <th>Sn.</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Published</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php include "dbconnection.php";
				  		$sql="SELECT * FROM `users`";
						$rs=mysqli_query($link,$sql);
                        while ($value=mysqli_fetch_assoc($rs)) {
                            static $i=1;
                             ?>
                               <tr>
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $value['name'];?></td>
                                 <td><?php echo $value['mobile'];?></td>
                                 <td><?php echo $value['email'];?></td>
                                 <td><?php echo $value['role'];?></td>
                                 <td class="text-center"><?php if(($value['published'])==1){
                                         echo "<i class='fa fa-check text-success'></i>";
                                       }
                                         else{
                                           echo "<i class='fa fa-times text-danger '></i>";
                                         }
                                    ?></td>
                                 <td>
                                  <a href="edit_user.php?id=<?php echo $value['id'] ?>"><i class="fa fa-edit"></i></a>
                                  <?php if($value['role']!='admin'){ ?>
                                  <a href="delete_user.php?id=<?php echo $value['id'] ?>"><i class="fa fa-trash text-danger"></i></a>
                                  <?php } ?>
                                  <a href="#"><i class="fa fa-user text-warning"></i></a>
                                  <a href="user_details.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye text-info"></i></a>
                                </td>
                               </tr>
                             <?php
                             
                             $i++;
                        } 
                  ?>
                  
                </tbody>
             </fieldset>
            
          </table>
          </div>
        </div>
    </div><!-- end of row for branch list -->
      </div><!-- end of body content -->
      <div class="col-md-2"></div>
   </div><!-- end of row-->
    
 </div><!-- end of container --> 


 <!--<script src="bootstrap/js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
