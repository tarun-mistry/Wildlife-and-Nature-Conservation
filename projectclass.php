<?php
class project{
	
function menu_position($var)
{
	switch($var)
	{
		case 1:
		$label = "<span class='label label-primary'>Top</span>";
		break;
		
		case 2:
		$label = "<span class='label label-info'>Bottom</span>";
		break;
		
		case 3:
		$label = "<span class='label label-teals'>Top & Bottom</span>";
		break;
	}
	return $label;
}

function cat_position($var)
{
	switch($var)
	{
		case 1:
		$label = "<span class='label label-primary'>Top</span>";
		break;
		
		case 2:
		$label = "<span class='label label-info'>Bottom</span>";
		break;
		
		case 3:
		$label = "<span class='label label-teals'>Top & Bottom</span>";
		break;
	}
	return $label;
}

function type($var)
{
	switch($var)
	{
		case 1:
		$label = "<span class='label label-primary'> Parent</span>";
		break;
		
		case 2:
		$label = "<span class='label label-info'>Sub</span>";
		break;
		
		case 3:
		$label = "<span class='label label-teals'>Child</span>";
		break;
	}
	return $label;
}

function status($var)
{
		switch($var)
	{
		case 1:
		$label = "<span class='label label-warning'>Pending</span>";
		break;
		
		case 2:
		$label = "<span class='label label-success'>Solved</span>";
		break;
		
		case 3:
		$label = "<span class='label label-danger'>Cancel</span>";
		break;
	}
	return $label;
}

function string_cut($string="",$limit=50)
{
	
	$string = strip_tags($string);
	if (strlen($string) > $limit) {

    // truncate string
    $stringCut = substr($string, 0, $limit);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
	
		}
		return $string;
}

function generate_id()
{
$arr1 = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$arr2 = array("1","2","3","4","5","6","7","8","9"); 
$arr = array_merge($arr1,$arr2);
shuffle($arr);
$d ='';
$arr = array_slice($arr,0,15);
foreach ($arr as $a)
{
	$d .=	$a; 
}
return $d;
}
 
 function cod($id)
 {
	 if($id==1)
	 {
		return  "Available";
	 }
	 else{
		return "Not Available"; 
	 }
 }
 
 function stock($id)
 {
	 if($id==1)
	 {
		return "<small class='text-highlights text-highlights-green'>inStock</small>"; 
	 }
	 else{
		  return "<small class='text-highlights text-highlights-red '>out-of-stock</small>";
	 }
 }
 
 function fstock($var)
 {
	 if($var == 'LIVE')
	 {
		return "<small class='text-highlights text-highlights-green'>inStock</small>"; 
	 }
	 else{
		 return "<small class='text-highlights text-highlights-red '>out-of-stock</small>";
	 }
 }
 
 function unix_to_time($string)
 {
	$sub =  substr($string,0,10);
	$date = date('d M Y', $sub);
	return $date;
 }
 
 function mean($sum,$count)
 {
	 $mean = $sum/$count;
	 return $mean;
 }
 
 function sub_replace($mean,$offset)
 {
	 $mean = ceil($mean);
	$j = 1;
	$aa = '';
	while($j<strlen($mean))
{
	$aa .= 0;
	$j++;}
							
	$va = substr_replace($mean,$aa,1,strlen($mean));	 
	 return $va;
 }
 
  function percentoff($mrp,$sell,$offer='')
 {
 	if($offer == ''){
	 $ra = $mrp - $sell;
	 if($ra!=0)
	 {
	 $percentoff = ($ra)/$mrp;
	 
	 $percent = $percentoff*100;
	 
	 $percent = round($percent);
	 }
	 else{
		 $percent = 0;
	 }
	 
 }
 else{
$ra = $mrp - $sell;
 if($ra!=0)
	 {
	 $percentoff = ($ra)/$mrp;
	 
	 $percent = $percentoff*100;
	 
	 $percent = round($percent);
	 }
	 else{
		 $percent = 0;
	 }

 }
return $percent;	
}

function date_formate($date)
{
	$newDate = date("d/m/Y", strtotime($date));
	return $newDate;
}
}

?>