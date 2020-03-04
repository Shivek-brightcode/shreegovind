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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

<link href="bootstrap/css/jquery.datepick.css" rel="stylesheet">
<script src="jquery-3.1.0.js"></script>
<script src="bootstrap/js/jquery.plugin.min.js"></script>
<script src="bootstrap/js/jquery.datepick.js"></script>
<script>
	
 function find_total(val)
	   {
	   
	   var admission_form=document.getElementById("admission_form").value;
	   var addmission_charge=document.getElementById("addmission_charge").value;
	   var re_admission_charge=document.getElementById("re_admission_charge").value;
	   var monthly_fee=document.getElementById("monthly_fee").value;
	   var transport_fee=document.getElementById("transport_fee").value;
	   var annual_fund=document.getElementById("annual_fund").value;
	   var tie_belt_diary=document.getElementById("tie_belt_diary").value;
	   var books_cover_copies=document.getElementById("books_cover_copies").value;
	   var fine=document.getElementById("fine").value;
	   var others=document.getElementById("others").value;
	   var discount=document.getElementById("discount").value;
	   
	   if(admission_form=="")
	   var admission_form=0;
	   if(addmission_charge=="")
	   var addmission_charge=0;
	   if(re_admission_charge=="")
	   var re_admission_charge=0;
	   if(monthly_fee=="")
	   var monthly_fee=0;
	   if(transport_fee=="")
	   var transport_fee=0;
	   if(annual_fund=="")
	   var annual_fund=0;
	   if(tie_belt_diary=="")
	   var tie_belt_diary=0;
	  if(books_cover_copies=="")
	   var books_cover_copies=0;
	   if(fine=="")
	   var fine=0;
	   if(others=="")
	   var others=0;
	   if(discount=="")
	   var discount=0;
	   var tot_amount=document.getElementById("t_amount").value;
	   var paid_amt=document.getElementById("paid_amt").value;
	   var tot=document.getElementById("tot").value;
	   
	   var fin=parseInt(admission_form)+parseInt(addmission_charge)+parseInt(re_admission_charge)+parseInt(monthly_fee)+parseInt(transport_fee)+parseInt(annual_fund)+parseInt(tie_belt_diary)+parseInt(books_cover_copies)+parseInt(fine)+parseInt(others)-+parseInt(discount);
	   document.getElementById("tot").value=fin;
	   document.getElementById("payable").value=fin;
	   document.getElementById("dues_amt").value=(tot_amount-paid_amt)-fin;
		
	   }	
	
	function printDiv() 
{
 window.print() ;
}

 $(document).ready(function() {
    $("#submit").click(function(event) {
        if( !confirm('Are you sure that you want to submit the payment') ){
            event.preventDefault();
        } 

    });
});

//$(function() {
	//$('#from').datepick({dateFormat: 'yyyy-MM-dd'});
	//$('#to').datepick({dateFormat: 'yyyy-MM-dd'});
	
	//$('#inlineDatepicker').datepick({onSelect: showDate});
//});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
</head>

<body>

  <?php include "demoheader.php";?>
   <div class="container">
  
    <div class="row">
     	<div class="container-fluid">
         <div class="col-md-12">
    	 <div class="row" id="remove_msg" style="height: 20px;">
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
        	<legend style="color:#ec9015;">Student Payments</legend>
            <form action="add_payment.php" method="POST">
            	<div class="row"><!--form row 1-->
                	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    	<br /><br />
                    	<div class="row">
                        	<div class="col-lg-1 col-md-1"></div>
                        	<div class="col-lg-3 col-md-3"><b>Admission No:</b></div>
                        	<div class="col-lg-5 col-md-8"><input type="text" name="adm" id="adm" class="form-control" /*onkeyup="getId(this.value);"*/ required/></div>
                        </div><!--end of left row 1-->
                        <br />
                      <div class="row">
                        	<legend style="color:#8815A5;">Payments</legend>
                            	<div class="row">
                                	<div class="col-lg-1 col-md-1" ><b>Date:</b></div>
                                    <div class="col-lg-4 col-md-4" >
                                    	<input type="date" name="date" id="date" class="form-control" />
                                    	<script>
											Date.prototype.toDateInputValue = (function() {
												var local = new Date(this);
												local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
												return local.toJSON().slice(0,10);
												});
											document.getElementById('date').value = new Date().toDateInputValue();
										</script>
                                    </div>
                                    <div class="col-lg-4 col-md-3" ><b>Enter No of Months:</b></div>
                                    <div class="col-lg-3 col-md-2" >
                                    	<input type="text" name="month" id="month" class="form-control" />
                                    	
                                    </div>
                                </div>
                                <div class="row">
                                <br />
                                    <div class="col-lg-2 col-md-1" ><b>From:</b></div>
                                    <div class="col-lg-4 col-md-2" >
                                    	<input type="date" name="from" id="from" class="form-control" onchange="calTo(this.value);" required/>
                                    </div>
                                      <div class="col-lg-2 col-md-1" ><b>To:</b></div>
                                    <div class="col-lg-4 col-md-2" >
                                    	<input type="date" name="to" id="to" class="form-control" required/>
                                    </div>
                               </div>
                               <div class="row">
                               <br />
                               		<div class="col-md-5"></div>
                                    <div class="col-lg-3 col-md-2" ><b>Payment Mode:</b></div>
                                    <div class="col-lg-4 col-md-3" >
                                    	<select name="pay_mode" id="pay_mode" class="form-control" required>
										
                                            <option value="0">--Select--</option>
                                            <option value="cash">CASH</option>
                                            <option value="cheque">CHEQUE</option>
                                            <option value="online">ONLINE</option>
                                            
                                    </select>
                                    </div>
                                </div><br />
                       <div id="pays">
                 

<table class="table-hover table-striped table-bordered table-condensed" style="width:100%"><!--beginning of table-->
	
    <tr>
		<td width="80"><b>Serial no</b></td><td><b>Payment</b></td><td><b>Payment Rs</b></td>
	</tr>
    <tr>
		<td width="80">04</td><td>Monthly Fee</td><td><input type="text" name="monthly_fee" id="monthly_fee" autocomplete="off" onKeyUp="find_total()" value=""  required/></td>
	</tr>
	<tr>
		<td width="80">01</td><td>Admission Form</td><td><input type="text" name="admission_form" id="admission_form" autocomplete="off"  onKeyUp="find_total()" /></td>
	</tr>
	<tr>
		<td width="80">02</td><td>Admission Charge</td><td><input type="text" name="addmission_charge" id="addmission_charge" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
    <tr>
		<td width="80">03</td><td>Re-Admission Charge</td><td><input type="text" name="re_admission_charge" id="re_admission_charge" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>	
	<tr>
		<td width="80">05</td><td>Transport Fee</td><td><input type="text" name="transport_fee" id="transport_fee" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
	<tr>
		<td width="80">06</td><td>Annual Dev. Fund</td><td><input type="text" name="annual_fund" id="annual_fund" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
	<tr>
		<td width="80">07</td><td>Tie, Belt & diary</td><td><input type="text" name="tie_belt_diary" id="tie_belt_diary" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
	<tr>
		<td width="80">08</td><td>Books/Cover/Copies</td><td><input type="text" name="books_cover_copies" id="books_cover_copies" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
    <tr>
		<td width="80">09</td><td>Fine</td><td><input type="text" name="fine" id="fine" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
	<tr>
		<td width="80">10</td><td>Others</td><td><input type="text" name="others" id="others" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
	
	<tr>
		<td width="80">11</td><td>Discount</td><td><input type="text" name="discount" id="discount" value="" autocomplete="off" onKeyUp="find_total()" /></td>
	</tr>
   	<tr>
	<td width="400" colspan="2"><b>Total</b></td><td><input type="text" name="total" width="80" id="tot" value="" autocomplete="off" readonly="readonly" required></td>
	</tr>
</table><!--end of table-->
                                
             </div> <!--end of table div-->  
             <br /><br /><br />
                 	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>UserName:</b></div>
                                <div class="col-lg-4 col-md-4"><input type="text" name="user" id="user" value="<?php echo $user; ?>" class="form-control" readonly="readonly" /></div>
                            </div><br />
                        </div><!--end of left row 1-->
                        <br />
                       
                    </div><!--end of left section-->
                    <div class="col-lg-1 col-md-1"></div>
                	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    	<br /><br /><br /><br /><br /><br />
                    	<div class="row">
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Name:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="name" id="name" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Father's Name:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="father" id="father" value="" class="form-control" readonly="readonly" /></div>
                            </div><br />
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Address:</b></div>
                                <div class="col-lg-9 col-md-9">
                                	<textarea name="address" id="address" rows="5" class="form-control" readonly="readonly" style="resize:none"/></textarea>
                                </div>
                            </div>
                        </div><!--end of right row 1-->
                        <hr />
                        <div class="row">
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Class:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="cls" id="cls" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                            <div class="row">
                                <div class="col-lg-3 col-md-3"><b>Admission Date:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="date" name="a_date" id="a_date" class="form-control" value="" readonly="readonly"/></div>
                            </div><br />
                        </div><!--end of right row 2-->
                        <hr />
						<div class="row">
                        	<div class="row">
                             <div class="col-lg-3 col-md-3"><b>Monthly Fee:</b></div>
                             <div class="col-lg-9 col-md-9"><input type="text" name="m_fee" id="m_fee" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        </div>
                        <div class="row">
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Total Fee:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="t_amount" id="t_amount" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        </div><!--end of right row 3-->
                        <div class="row">
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Paid Amount:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="paid_amt" id="paid_amt" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        </div><!--end of right row 3-->
                        <div class="row">
                        <div class="row">
                        <div class="col-lg-3 col-md-3"><b>Payable Amount:</b></div>
                         <div class="col-lg-9 col-md-9"><input type="text" name="payable" id="payable" value="" class="form-control" readonly="readonly" /></div>
                          </div><br />
                        </div><!--end of right row 3-->  
                          <div class="row">
                        	<div class="row">
                                <div class="col-lg-3 col-md-3"><b>Dues Amount:</b></div>
                                <div class="col-lg-9 col-md-9"><input type="text" name="dues_amt" id="dues_amt" value="" class="form-control" readonly="readonly"/></div>
                            </div><br />
                        </div><!--end of right row 3-->
                    </div><!--end of right section-->
                </div><!--end of form row 1-->
                <br /><br />
                <div class="row"><!--form row 2-->
                	<div class="col-lg-4 col-md-4"></div>
                	<div class="col-lg-2 col-md-2"><input type="submit" name="submit" id="submit" value="Make Payment" class="btn btn-success" /></div>
                    <!--  <div class="col-lg-1 col-md-1">
                    	<button class="btn btn-danger" id="print" type="button" onclick="printDiv()">Print</button>
                    </div> -->
                	<div class="col-lg-2 col-md-2"><input type="reset" name="reset" value="Cancel" class="btn btn-warning" /></div>
                	<div class="col-lg-3 col-md-3"></div>
                </div><!--end of form row 2-->
                <br /><br /><hr />
            </form><!--end of form-->
     	</div><!-- end of container-fluid -->
   	</div><!-- end of row -->
  </div><!-- end of container -->
  
  <!-----------import data---------------->

   <script type="text/javascript" language="javascript"> 
  $('document').ready(function () {
    $('#adm').keyup(function () {
	  id=$(this).val();
		//alert(id);
        $.ajax({
            type: 'POST',
            url: 'student_pay_json.php',
            data: {
                id: $(this).val()
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
                //console.log(data);
                
				var cls = data['class']; 
                var name = data['name']; 
				var a_date = data['admission_date']; 
				var father = data['father_name']; 
				var t_address = data['t_address']; 
				var t_state = data['t_state']; 
				var t_district = data['t_district']; 
				var t_area = data['t_area']; 
				var t_pincode = data['t_pincode'];
				var m_fee = data['m_fee'];
				var total = data['total'];
				var amount_paid = data['amount_paid'];
				var remaining_amount = data['remaining_amount'];
				var paid_amt = data['payable_amount'];
				//alert(name);
				var addr="Address:"+t_address+",State: "+t_state+",District: "+t_district+",Area: "+t_area+",Pincode: "+t_pincode;
                $('#cls').val(cls);
                $('#name').val(name);
				$('#a_date').val(a_date);
				$('#father').val(father);
				$('textarea#address').val(addr);
				$('#m_fee').val(m_fee);
				$('#total').val(total);
				$('#t_amount').val(total);
				$('#paid').val(amount_paid);
				$('#remaining').val(remaining_amount);
				$('#paid_amt').val(paid_amt);
				
            }
        });
    });  
});  

  $(function () {
    $('#adm').keyup(function () {
	  id=$(this).val();
		//alert(id);
        $.ajax({
            type: 'POST',
            url: 'student_payable_json.php',
            data: {
                id: $(this).val()
            },
            dataType: 'json',
            success: function (data) //on recieve of reply
            {
				var paid_amt = data['payable_amount'];
				
				$('#paid_amt').val(paid_amt);
				//console.log(data);
                
            }
        });
    });  
});  

 function calTo(data)
 {
	 var from=data;
	 var month=$("#month").val();
	var to = new Date(from);
		var nMonth=to.getMonth() +( parseInt(month)-1);
		var nYear = to.getFullYear();
		//alert(y);
		//alert(mont);
		var days=DaysOfMonth(nYear,nMonth);
		//alert(days);
		to.setDate(days);
		//alert(d)
		to.setMonth(nMonth);
		to=to.toISOString().slice(0,10);
		
		$('#to').val(to)
 }
 
 function DaysOfMonth(nYear,nMonth) {
        switch (nMonth) {
            case 0:     // January
                return 31; break;
            case 1:     // February
                if ((nYear % 4) == 0) {
                    return 29;
                }
                else {
                    return 28;
                };
                break;
            case 2:     // March
                return 31; break;
            case 3:     // April
                return 30; break;
            case 4:     // May
                return 31; break;
            case 5:     // June
                return 30; break;
            case 6:     // July
                return 31; break;
            case 7:     // August
                return 31; break;
            case 8:     // September
                return 30; break;
            case 9:     // October
                return 31; break;
            case 10:     // November
                return 30; break;
            case 11:     // December
                return 31; break;
        }
    }
 
</script> 
 <script>
  setTimeout(function(){$("#remove_msg").hide();},2000);	
 </script> 
  
 
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--  <script src="bootstrap/js/jquery.js" type="text/javascript"></script> 
  <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script> -->
    	
</body>
</html>
