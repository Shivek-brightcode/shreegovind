<?php
$link = mysqli_connect("db5000036165.hosting-data.io", "dbu70693", "Mcps@123#", "dbs31180");
if($link){}
else{
	die("Server Error");
	echo"<script> alert('Change Password!!');</script>";
}

class notowords{
		private $ones=array("","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten",
						"Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen",
						"Eighteen","Nineteen");
		private $tens=array(2=>"Twenty",3=>"Thirty",4=>"Forty",5=>"Fifty",6=>"Sixty",7=>"Seventy",
						8=>"Eighty",9=>"Ninety");
		private $words="";
		private $toreturn="";
		private $inwords="";
		private $inhundred="";
		function get_hundred($number){
	
			$rem=$number%100;
			$value=$number/100;
			if($number>=100){
				if($value<10){
					$this->inhundred.= " ".$this->ones[$value]." Hundred";
				}
				
			}
			if($rem!=0 && $rem<20){
				$this->inhundred.= " ".$this->ones[$rem];
			}
			if($rem==20)
			{
				$this->inhundred.= " ".$this->tens[2];
			}
			if($rem!=0 && $rem>20){
				$rem2=$rem%10;
				$value2=$rem/10;
				$return =" ".$this->tens[$value2];
				if($rem2!=0){
					$return.=" ".$this->ones[$rem2];
				}
				$this->inhundred.= $return;
			}
			return $this->inhundred;
		}
		function get_thousand($number){
			$rem=$number%1000;
			$value=$number/1000;
			if($number>=1000){
				if($value<20){
					$this->inwords= " ".$this->ones[$value]." Thousand";
				}
				elseif($value>=20 && $value<100){
					$rem2=$value%10;
					$value2=$value/10;
					$return = $this->tens[$value2];
					if($rem2!=0){
						$return.=" ".$this->ones[$rem2]." Thousand";
					}
					else{
						$return.=" Thousand";
					}
					$this->inwords= $return;
				}
			}
			else{
				$this->inwords='';
			}
			return $this->inwords;
		}
		function get_lakhs($number){
			$rem=$number%100000;
			$value=$number/100000;
			if($number>=100000){
				if($value<20){
					$this->inwords= " ".$this->ones[$value]." Lakh";
				}
				elseif($value>=20 && $value<100){
					$rem2=$value%10;
					$value2=$value/10;
					$return = $this->tens[$value2];
					if($rem2!=0){
						$return.=" ".$this->ones[$rem2]." Lakh";
					}
					else{
						$return.=" Lakh";
					}
					$this->inwords= $return;
				}
			}
			else{
				$this->inwords='';
			}
			return $this->inwords;
		}
		function get_crore($number){
			$rem=$number%10000000;
			$value=$number/10000000;
			if($number>=10000000){
				if($value<20){
					$this->inwords= " ".$this->ones[$value]." Crore";
				}
				elseif($value>=20 && $value<100){
					$rem2=$value%10;
					$value2=$value/10;
					$return = $this->tens[$value2];
					if($rem2!=0){
						$return.=" ".$this->ones[$rem2]." Crore";
					}
					else{
						$return.=" Crore";
					}
					$this->inwords= $return;
				}
			}
			return $this->inwords;
		}
	
		function to_words($number){
			if($number<1000000000){
				$this->words.= $this->get_crore($number)." ".$this->get_lakhs($number%10000000)." ";
				$this->words.= $this->get_thousand($number%100000)." ".$this->get_hundred($number%1000);
			}
			$this->toreturn=$this->words;
			$this->words=""; $this->inwords="";$this->inhundred="";
			return $this->toreturn;
		}
	}
?>