<?php

$greska=0;
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$provera="select naziv from proizvodjac;";
$rezultat=$db->fetchData($provera);
if(preg_match('/^[a-zA-Z]+$/',$_POST['proizvodjac'])){
 foreach($rezultat as $v){
	 
		if($v['naziv']===$_POST['proizvodjac']){
			$greska=1;
			
			
		}
}}else{$greska=1;}
	
if($greska!=1){
$proizvodjac=strtolower( $_POST[proizvodjac]);
$upit = "INSERT INTO proizvodjac (naziv) VALUES ('$proizvodjac');";
$conn->query($upit);}






#header("Location: http://localhost/nesto/index.php?stranica=lista_proizvodjaca");
header("Location: ../index.php?stranica=lista_proizvodjaca");


?>