<?php
$greska=0;

require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();


$provera="select naziv from usluga;";
$rezultat=$db->fetchData($provera);
if(preg_match('/^[a-zA-Z0-9\-]+$/',$_POST['usluga'])){
 foreach($rezultat as $v){
	 
		if($v['naziv']===$_POST['usluga']){
			$greska=1;
			
			
		}
}}else{$greska=1;}
if($greska!=1){
$usluga=strtolower( $_POST[usluga]);
$upit = "INSERT INTO usluga (naziv,opis,cena) VALUES ('$usluga','$_POST[opis]','$_POST[cena]');";
$conn->query($upit);}



header("Location: ../index.php?stranica=lista_usluga");


?>