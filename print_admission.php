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
	<title>Sri Govind Middle & High School || Print Registration</title>
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
		
		<form name="print_admission_form" method="post" action="">
	
    	 <table width="810" frame="box" align="center">
					<tr>
					    <td> 
                            <P style="font-size:36px; color:#7A6E7D; text-align:center; font:bold"> Sri Govind Middle & High School </P>
			             </td>
                       
					</tr>
					
		
	</table>
	<table width="800"frame="box" align="center">
       <tr>
            	<td width="600">
                
         <table width="600"  cellpadding="4" cellspacing="4">
	<tr>
		<td width="80"><b>Serial no</b></td><td><b>Field Name</b></td><td><b>Details</b></td>
   </tr>
	
	<tr>
<td width="80"><?php echo $count=0; $count=$count+1; ?></td><td>Admission No</td><td><?php echo $_SESSION["adm"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Admission Date</td><td><?php echo date('d-m-Y',strtotime($_SESSION["date"])); ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Roll No</td><td><?php echo $_SESSION["rollno"]; ?></td>
	</tr>
    
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Session</td><td><?php echo $_SESSION["session"]; ?></td>
	</tr>
   
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Class</td><td><?php echo $_SESSION["class"]; ?></td>
	</tr>
    
	
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Section</td><td><?php   echo $_SESSION["section"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Name</td><td><?php   echo $_SESSION["name"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Father Name</td><td><?php   echo $_SESSION["father"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Father Occupation</td><td><?php   echo $_SESSION["father_occup"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Mothre Name</td><td><?php   echo $_SESSION["mother"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Mother Occupation</td><td><?php   echo $_SESSION["mother_occup"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Date Of birth</td><td><?php  echo date('d-m-Y',strtotime($_SESSION["dob"])); ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Age</td><td><?php   echo $_SESSION["age"]; ?></td>
	</tr>
    
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Gender</td><td><?php   echo $_SESSION["gender"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Blood Group</td><td><?php   echo $_SESSION["blood"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Religion</td><td><?php   echo $_SESSION["religion"]; ?></td>
	</tr>
	<tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Caste</td><td><?php   echo $_SESSION["caste"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Identification</td><td><?php   echo $_SESSION["id_mark"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Adhar No</td><td><?php   echo $_SESSION["adhar_no"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Name Of School</td><td><?php   echo $_SESSION["schoolname"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Previous Class </td><td><?php   echo $_SESSION["laststudy"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Promotted Class</td><td><?php   echo $_SESSION["Promotedclass"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Address</td><td><?php   echo $_SESSION["address"]; ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>transfer Certificate</td><td><?php if($_SESSION["tc"]=='yes'){echo $_SESSION["tc"];}else{echo "No";} ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Marksheet</td><td><?php   if($_SESSION["ms"]=='yes'){echo $_SESSION["ms"];}else{echo "No";} ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Caste Certificate</td><td><?php if($_SESSION["cc"]=='yes'){echo $_SESSION["cc"];}else{echo "No";} ?></td>
	</tr>
    <tr>
		<td width="80"><?php echo $count; $count=$count+1; ?></td><td>Domecile</td><td><?php if($_SESSION["dc"]=='yes'){echo $_SESSION["dc"];}else{echo "No";} ?></td>
	</tr>
   
   <tr>
	<td  colspan="2"><b>Course Fee</b></td><td><p style="margin:0px; font-weight:bold;"><?php echo number_format($_SESSION['tamount'],2); echo "&nbsp;("; echo convert_number_to_words($_SESSION['tamount']); echo "  only)"; ?></p></td>
	</tr>
	</table>
   </td>
   			<td width="200" style="padding:0">
                
                	<table width="200" cellpadding="-100" cellspacing="0" style="margin-top:-350px;">
                    	<tr>
                            <td height="200"><img width="120" height="150" src="<?php echo $_SESSION['picture']; ?>"></td>
                        </tr>
                    	<tr>
                        	<td></td>
                        </tr>
                    </table>
                
                </td>
     </tr>
     </table> 
    </form>
    <br><br><br><br>
    <hr style="border:1px dotted #999; width:100%;">
  
 
	
    <p align="center"><a href="admission.php?pagename=Registration" style="text-decoration:none;"><input type="button" style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></p>
</body>
</html>