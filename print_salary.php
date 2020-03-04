<?php
session_start();
include('dbconnection.php');
function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return ucwords($string);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Mother's Convent Play School | Print </title>
	<link rel="stylesheet" href="css/css.css" />
   <style>
   td{
   font-size:12px;
   }
   .p1{
   font-family:Arial, Helvetica, sans-serif;
   font-size:12px;
   margin-left:10px;
   margin-top:0px;
   margin-bottom:0px;
   font-weight:bold;
   }
   </style>
	
</head>
<body onLoad="window.print()">
		
		<form name="monthly" method="post" action="">
	
    	 <table width="800" frame="box" align="center">
					<tr>
					    <td colspan="2"> 
                                                <P style="font-size:36px; color:#7A6E7D; text-align:center; font:bold">Mother's Convent Play School </P>
			             </td>
                       
					</tr>
					
					
			<tr>
					<td ><b>Employee Name:</b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["name"]; ?></label> &nbsp;&nbsp;&nbsp;&nbsp;<b>Employee Id</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["eid"]; ?></td><td align="right"><b>Date:</b> <?php echo $_SESSION["p_date"];  ?></td>
			</tr>
						<tr>
					<td ><b>Mobile: &nbsp;&nbsp;</b><?php echo $_SESSION["mobile"];
					?>
                  &nbsp;&nbsp;<b>Company PF: &nbsp;</b><?php echo $_SESSION["pf_no"];
					?>
                   &nbsp;&nbsp;<b>PF Account: &nbsp;</b><?php echo $_SESSION["pfa_no"];
					?>
                    &nbsp;&nbsp;<b>Income Tax: &nbsp;</b><?php echo $_SESSION["it_no"];
					?>
                    </td>
					<td align="right"><b>Designation: </b>  <label style="text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION["desig"]; ?></label></td>
			</tr>
	</table>
	<table width="800"frame="box" align="center">
	<tr>
		<td width="80"><b>Serial no</b></td><td><b>Particulars</b></td><td><b>Amount Rs</b></td>
	
	<tr>
		<td width="80"><?php echo $count=0; $count=$count+1; ?></td><td>Basic Salary</td><td><?php echo $_SESSION["bsalary"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>HRA</td><td><?php echo $_SESSION["hra"]; ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Medical Allowance</td><td><?php echo $_SESSION["mallowance"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Conv. Allowance</td><td><?php echo $_SESSION["callowance"]; ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Special Allowance</td><td><?php echo $_SESSION["sallowance"]; ?></td>
	</tr>
    
	
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Total Deduction</td><td><?php   echo $_SESSION["tot_deduct"]; ?></td>
	</tr>
    
	
   <tr>
	<td  colspan="2"><b>Net Payment</b></td><td><p style="margin:0px; font-weight:bold;"><?php echo number_format($_SESSION['net_pay'],2); echo "&nbsp;("; echo convert_number_to_words($_SESSION['net_pay']); echo "  only)"; ?></p></td>
	</tr>
 
    
	</table>
       
    </form>
    <br><br><br><br>
    <hr style="border:1px dotted #999; width:100%;">
    <br><br><br><br>
 
	
    <p align="center"><a href="staff-salary.php" style="text-decoration:none;"><input type="button" style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></p>
</body>
</html>