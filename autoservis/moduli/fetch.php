<?php
session_start();
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();


 $upit ="select end_at 
from servis
where end_at is not null order by end_at asc;";
$result=$db->fetchData($upit);
$niz_meseci=[];
foreach($result as $v){
$niz= explode('-', $v['end_at'], 3);
array_push($niz_meseci,$niz[1]);}
$niz_meseci=array_unique($niz_meseci);
sort($niz_meseci);


foreach($niz_meseci as $m){

$upit1 ="select sum(cena) as profit
from  servis 
inner join servis_usluga on servis_usluga.servis_id=servis.servis_id
inner join usluga on usluga.usluga_id=servis_usluga.usluga_id 
where end_at is not null and end_at like '".$_POST['year']."-".$m."%';";

$result1=$db->fetchData($upit1);

foreach($result1 as $v){
	$output[] = array(
   'month'   => $m,
   'profit'  => floatval($v["profit"])
  );

  
}}

$_SESSION['niz']=$output;
echo json_encode($output);









?>