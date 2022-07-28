<?php
class validation {
var $success_msg = [];
var $error_msg = []; 	

function get ()
{
return $this->error_msg;	
}

function get_succ ()
{
	return $this->success_msg;
}
// this function is used to remove tags	
function strip_tag($var)
{
$ra = strip_tags($var);
return $ra;	
}

function check_textarea($var)
{
	$var = htmlspecialchars_decode($var);
	$var = addslashes($var);
	return $var;
	
}

// this function is used to count the word
function word_count($var)
{
	$ra = str_word_count($var);
	return $ra;
}

// this function is to make html entity to plain text
function htmlentity($var)
{
$ra = htmlentities($var);	
return $ra;	
} 

// check the string length;
function length($var,$min='',$max='')
{

	try{
		 $len = strlen($var);
		if(($len < $min) || ($len > $max))
		{
			throw new Exception(" length between '$min' between '$max'");
		}
		return $var;
	}
	catch(Exception $e)
{
array_push($this->error_msg,$e->getMessage());
return false;
}
}


// validation for name
function check_name($var)
{
$ra = $this->strip_tag($var);
try{
	if(!preg_match("/^[a-zA-Z\s]+$/",$ra))
{
	throw new Exception("Only albhabet & space allow");
}
return $ra;
}
catch(Exception $e)
{
	array_push($this->error_msg, $e->getMessage());
	return false;

}	
}

// validation for email
 function check_email($email)
 {
	 $ra = $this->strip_tag($email);
	try{
		if (!filter_var($ra, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("Invalid Email Name"); 
		}
		return $ra;
	}
	catch(Exception $e)
	{
		array_push($this->error_msg,$e->getMessage());
		return false;
	}
 }
 
 // validation for website/domain
 function check_domain($domain)
 {
	 $ra = $this->strip_tag($domain);
	 try{
		 if(!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $ra))
		 {
			 throw new Exception("Invalid domain Name");
		 }
		 return $ra;
	 }
	 catch(Exception $e)
	 {
		 return $e->getMessage();
	 }
 }
 
 // validation for numeric value
 function check_numeric($number)
 {
	 $number = $this->strip_tag($number);
	 try{
		if(!preg_match("/^[0-9]+$/",$number))
		{
			throw new Exception("Invalid Number Format");
		}
		return $number;
	 }
	 catch(Exception $e)
	 {
		 array_push($this->error_msg,$e->getMessage());
		return false;
	 }	 
}

// validation for float/decimal value
	function check_float($float)
	{
		$float = $this->strip_tag($float);
		try{
			if(!is_float($float))
			{
				throw new Exception("Value Must be float");
			}
			return $float;
		}
		catch(Exception $e)
		{
			return $e->getMessage();
		}
	}
	
// validation for alphanumic value	
function check_alphanum($num)
{
	$ra = $this->strip_tag($num);
	try{
		if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $ra))
		{
			throw new Exception("Value Must Be Alphanumric");
		}
		return $ra;
	}
	catch(Exception $e)
	{
		array_push($this->error_msg,$e->getMessage());
			return false;
	}
}

// validation for empty field
function check_required($var)
{
	$ra = $this->strip_tag($var);
	try{
		if($var=='')
		{
			throw new Exception("value not null");
		}
		return $ra;
	}
	catch(Exception $e)
	{
		array_push($this->error_msg,$e->getMessage());
		return false;
	}
}

// function compare
function compares($str1, $str2, $msg='string does not match')
{
	 $str1 = $this->strip_tag($str1);
	$str2 = $this->strip_tag($str2);

try {

	if($str1 !=  $str2)
	{
		throw new Exception($msg);
	}
	return 1;
}
	catch(Exception $e)
	{
		//echo $e->getMessage();
		
		array_push($this->error_msg,$e->getMessage());
		return 1;
	}
}

//
function wrap_string($str,$limit=75)
{
	 $str = wordwrap($str,$limit,"<br>\n",TRUE);
	return $str;
}

}


?>