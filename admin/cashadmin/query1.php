<?php
include '../dbfunction.php';
include '../projectclass.php';

$aq = new cashfunct();
$apr = new project();

if(isset($_REQUEST['vv']))
{
$data = array(
$aq->prd_table.'_cashback' => $_REQUEST['ss']
);
$dd = $aq->update($aq->prefix.$aq->prd_table,$data," WHERE ".$aq->prd_table."_rid='".$_REQUEST['vv']."'");
echo $dd;
}

if(isset($_REQUEST['catv']))
{
$cdata = array(
$aq->cat_table.'_cashback' => $_REQUEST['cats']
);	
$catd = $aq->update($aq->prefix.$aq->cat_table,$cdata," WHERE ".$aq->cat_table."_title LIKE '".$_REQUEST['catv']."'");

$pdata = array(
$aq->prd_table.'_cashback' => $_REQUEST['cats']
);	
$catd = $aq->update($aq->prefix.$aq->prd_table,$pdata," WHERE ".$aq->prd_table."_category LIKE '".$_REQUEST['catv']."'");

echo $catd;
}

if(isset($_REQUEST['dotdv']))
{
	$ddata = array(
$aq->dotd_table.'_cashback' => $_REQUEST['dotds']
);	
$dotdd = $aq->update($aq->prefix.$aq->dotd_table,$ddata," WHERE ".$aq->dotd_table."_id='".$_REQUEST['dotdv']."'");	
echo $dotdd;
}

if(isset($_REQUEST['allv']))
{
	$aldata = array(
$aq->alofr_table.'_cashback' => $_REQUEST['alls']
);	
$dotdd = $aq->update($aq->prefix.$aq->alofr_table,$aldata," WHERE ".$aq->alofr_table."_id='".$_REQUEST['allv']."'");	
echo $dotdd;	
}
?>