<?php
$greska=0;
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();

$provera="select naziv from model;";
$rezultat=$db->fetchData($provera);
if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['model'])){
 foreach($rezultat as $v){
	 
		if($v['naziv']===$_POST['model']){
			$greska=1;
			
			
		}
}}else{$greska=1;}

if($greska!=1){
$model=strtolower( $_POST[model]);
$upit = "INSERT INTO model (proizvodjac_id,naziv) VALUES ('$_POST[proizvodjac]','$model');";
$conn->query($upit);}



header("Location: ../index.php?stranica=lista_modela");


?>