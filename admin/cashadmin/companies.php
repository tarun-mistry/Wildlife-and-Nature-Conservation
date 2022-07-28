<?php require_once '../dbfunction.php';
require_once '../php_validation.php';
require_once '../projectclass.php'; 
ini_set('max_execution_time', '12000');
$qury= new cashfunct();


$cat_select = $qury->selectr($qury->cpn_table."_offer_name",$qury->prefix.$qury->cpn_table," GROUP BY ".$qury->cpn_table."_offer_name ORDER BY ".$qury->cpn_table."_category");

foreach($cat_select as $cat)
{					
$data = array(
$qury->cpn_com_table.'_name' => $cat[$qury->cpn_table."_offer_name"]
);
$ins = $qury->insertr($qury->prefix.$qury->cpn_com_table,$data);
}
if($ins) {echo "done";}
?>