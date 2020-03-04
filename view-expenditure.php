<?php
session_start();
  if(isset($_SESSION['user'])){
	   $role=$_SESSION['role'];
	   $user=$_SESSION['user'];
	
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
<title>Expenditure</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="jquery-3.1.0.js"></script>
<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">

<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>
$(function() {
	$('#from').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#to').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
window.onload=function(){
	var from='<?php echo $_GET['from']; ?>';
	var to='<?php echo $_GET['to']; ?>';
	
	if(from!="" && to!=""){
		$("#from").val(from);
		$("#to").val(to);
		
		
	}
}

</script>
</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
    <div class="row">
     	<div class="container-fluid">
        	<legend>Expenditure Details</legend>
            <form action="" method="get">
                    	
                    	<div class="row">
                        	<div class="col-lg-2 col-md-2"><input type="text" name="from" id="from" value="" placeholder="From" class="form-control"/></div>
                            <div class="col-lg-2 col-md-2"><input type="text" name="to" id="to" value="" placeholder="To" class="form-control"/></div>
                    <div class="col-lg-2 col-md-2"><input type="image" src="images/search.png" name="expenditure" value="Search"></div>
                        </div><!--end of left row 1-->
                        <br />
                    
            </form><!--end of form-->
            <?php if(isset($_GET['expenditure']) || isset($_GET['from'])){ ?>
              <table class="table table-striped table-bordered table-hover">
                            	   <tr>
                                   <th style="text-align:center">Exp. Id</th>
                                   <th style="text-align:center">Date</th>
                                   <th style="text-align:center">Person</th>
                                    <th style="text-align:center">Bill No</th>
                                   <th style="text-align:center">Particular</th>
                                   <th style="text-align:center">Amount</th>
                                  
                                    <th style="text-align:center">Action</th>
                                  </tr>
<?php 
include_once "dbconnection.php";
	$from=$_GET['from'];
	$to=$_GET['to'];
    $count=12;
	$offset=0;
	$page=$_GET['page'];
	
	$offset=$page*$count;
		
		$sql="SELECT * FROM `add_expenditure` WHERE (date BETWEEN '$from' and '$to') and user='$user'  order by date desc limit $offset, $count";
		$sql1="select count(exp_id) as count from `add_expenditure` WHERE (date BETWEEN '$from' and '$to') and user='$user'";
	
	$rs=mysqli_query($link,$sql);
	
	$rowcount=mysqli_query($link,$sql1);
	$data= mysqli_fetch_assoc($rowcount);
	$rownum=$data['count'];
	$pages=$rownum/$count;
	while($result=mysqli_fetch_array($rs)){
								?>
                                <tr>
                                    <td align="center"><?php echo $result['exp_id']; ?></td>
                                   <td align="center"><?php echo $result['date']; ?></td>
                                   <td align="center"><?php echo $result['person']; ?> </td>
                                   <td align="center"><?php echo $result['billno']; ?> </td>
                                   <td align="center"><?php echo $result['particular']; ?></td>
                                   
                                   <td align="center"><?php echo $result['amount']; ?></td>
                                   <?php if($role=='admin'){ ?> 
                                   <td align="center"><a href="delete_expenditure.php?page=delete-exp&exp_id=<?php echo $result['exp_id'];?>"><span class="fa fa-trash"></span></a></td>
                               <?php } else if($role=='user'){ ?>
                                <td align="center"><span class="fa fa-trash"></span></td>
                                <?php } ?>
                                    
                                   </tr>
                               
                                 
                                <?php
								}//while closed
								$page=$page +1;
								$prev= $page-2;
	
								?>
                            
                             <?php if(ceil($pages)>1){
							 ?>
                             <tr>
                              <td colspan="17">
                             <center>
                             <ul class="pagination">
                               <?php 
							     if($page>1){
									   ?>
                                  
										<li><a href ="view-expenditure.php?from=<?php echo $from ?>&to=<?php echo $to ?>&page=<?php echo $prev;?>">prev</a></li>
                                 
									   <?php
									   }//if closed
								for($i=0;$i<ceil($pages);$i++){
									if($i==$page-1){
								   ?>
									   <li class="active"><a href="view-expenditure.php?from=<?php echo $from ?>&to=<?php echo $to ?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
									 else{
								   ?>
									   <li><a href="view-expenditure.php?from=<?php echo $from ?>&to=<?php echo $to ?>&page=<?php echo $i ?>"><?php echo $i+1;?> </a></li>
									 <?php   
									 }
								   }//for closed			 
							       if($page<ceil($pages)){
											?>	
											<li><a href="view-expenditure.php?from=<?php echo $from ?>&to=<?php echo $to ?>&page=<?php echo $page;?>">next</a></li>
										   <?php 
										   
											}
							   
							   ?>
                               </ul>
                               </center>
                               </td>
                             </tr>
                             </table>
                             <?php
	}

			}

?>  
          
     	</div><!-- end of container-fluid -->
   	</div><!-- end of row -->
  </div><!-- end of container -->
  
 
  
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> 
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script> -->
    	
</body>
</html>
