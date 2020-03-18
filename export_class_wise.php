<?php
error_reporting(1);

//$link=mysqli_connect("localhost","root","","sms");
$class=$_GET['class'];
include "dbconnection.php";
//$query="SELECT * from new_registration where class='$class'";
$query="SELECT t1.admission_no, t1.admission_date, t1.roll_no, t1.NAME, t1.father_name, t1.mother_name, t1.class, t1.section, t1.SESSION, t1.dob, t1.gender, t2.t_address, t3.mob FROM new_registration as t1 JOIN address as t2 On t1.admission_no=t2.admission_no JOIN contact_info as t3 On t1.admission_no=t3.admission_no WHERE t1.class = '$class'";
$result=@mysqli_query($link,$query) or die("Couldn't execute query");  


$filename="ClassWise Student Report";
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
//$fieldinfo=mysqli_fetch_fields($result);
$ownname = array('Admission No','Admission Date','Roll No','Name','Father Name','Mother Name','Class','section','Session','Date Of Birth','Gender','Address','Mobile No');
  foreach ($ownname as $val)
    {
       printf($val . "\t");
               
    }
	//printf("Total Class" . "\t");
	//printf("Class Attend" . "\t");
//for ($i = 0; $i < mysqli_num_fields($result); $i++) {
//echo mysqli_fetch_fields($result,$i) . "\t";
//}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   


?>