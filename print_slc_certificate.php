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
<?php

function convert_number_to_words($total) {

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

    return $string;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Mother's Convent Play School | Print </title>
	<link rel="stylesheet" href="css/css.css" />
 
</head>
<body onLoad="window.print();">
		
		<form name="certificate">
	 <table width="800" align="center" border="0">
     	<tr >
        	<td align="center" valign="middle"><font size="+3" face="Gotham, Helvetica Neue, Helvetica, Arial, sans-serif"> Mother's Convent Play School </font></td>
        </tr>
        <tr>
            <td align="center" ><font size="+1" face="Gotham, Helvetica Neue, Helvetica, Arial, sans-serif"> Nairyal Tar, Lar Town, Deoria, Uttar Pradesh-274502 </font></td>
        </tr>
        <tr>
            <td align="center" ><font size="+1" face="Gotham, Helvetica Neue, Helvetica, Arial, sans-serif"> Phone No.: +91 - 7408680584, +91 - 7905886703 </font></td>
         </tr>
         <tr>
            <td align="center" ><font size="+1" face="Gotham, Helvetica Neue, Helvetica, Arial, sans-serif"> Email: nishamcps@gmail.com </font></td>
        </tr>
        <tr height="80">
        	<td align="center" valign="middle"><font size="+2" face="Gotham, Helvetica Neue, Helvetica, Arial, sans-serif">School Leaving Certificate</font></td>
        </tr>
		<tr>
        	<td align="center">
                <table width="800" cellpadding="10" cellspacing="10">
                    <tr>
                        <td style="font-size:16px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height:30px;">
						   <p style="text-align:justify; font-style:italic;"> This is to Certify that <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['name']; ?> </span> Son/Daughter of <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"> <?php echo $_SESSION['father']; ?></span> has been
							a pupil of this school from <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['from']; ?></span> To <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['to']; ?></span>
                            
							and was Studying in Class <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['class']; ?></span> at the time of
                            
							Withdrawal.
                            
							His/Her Date of birth according to the school record is <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['dob']; ?></span>
					
							All school dues have been satisfactorily settled.
					
							<span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['name']; ?></span> has been promoted to class <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['pclass']."."; ?></span>
					
							Rgistration No. <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['adm']; ?></span></p>
                    	</td>
                  	</tr>
               	  </table>
           	   </td>
           </tr>
                     <tr>
						<td>
                        <table width="800" cellpadding="10" cellspacing="10">
                            <tr>
                                <td width="600" style="font-size:16px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height:30px;">Date: <span style="font-size:16px; font-weight:bold; text-transform:capitalize;"><?php echo $_SESSION['date']; ?></span></td><td width="200">____________________________</td>
                             </tr>
                         </table>   
                       </td> 
                       </tr>    
					
                     <tr>
							<td align="right" valign="middle"  style="font-size:16px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height:30px; padding-right:100px;">Principal</td>
                            
					</tr>
					
	</table>
	
   
       
       <p align="center"><a href="certificate.php" style="text-decoration:none;"><input type="button"  style="background:url(images/back.png); width:100px; height:40px; border:none; cursor:pointer;"></a></p>
</form>

</body>
</html>