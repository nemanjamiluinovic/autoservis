<?php
session_start();



	require_once 'dbConfig.php';
	$db=new Dbcon();
	$conn=$db->connection();
if($_POST){
	extract($_POST);
	$greske = array();
   $provera="select *  from vozilo;";
   $rezultat=$db->fetchData($provera);
 

	if (empty($POST['sasija']) && !preg_match("/^[A-Z0-9]{17}$/", $_POST['sasija'])) $greske[] = "Nepravilno unet broj sasije."; 
	if (empty($POST['registracija']) && !preg_match("/^[A-Z]{2}-[0-9][0-9]{2,4}-[A-Z]{2}$/", $_POST['registracija'])) $greske[] = "Nepravilno unet registarski broj."; 
	

	if (empty($POST['motor']) && !preg_match("/^[A-Z0-9-]+$/", $_POST['motor']) ) $greske[] = "Neispravan broj motora";
	if (empty($POST['boja']) && !preg_match("/^[A-Za-z0-9]+$/", $_POST['boja']) ) $greske[] = "Neispravan uneta boja";
	
	 foreach($rezultat as $v){
		if($v['broj_sasije']===$_POST['sasija']){
			$greske[] = "Ovaj broj sasije vec postoji";
			
		}
		if($v['registracija']===$_POST['registracija']){
			$greske[] = "Ovaj registracioni broj vec postoji";
			
		}
		if($v['broj_motora']===$_POST['motor']){
			$greske[] = "Ovaj broj motora  vec postoji";
			
		}
	}


	
	$greske = implode("<br>", $greske);
	

	
}

if(!empty($greske)){
header("Location: http://localhost/nesto/index.php?stranica=prva&greske=$greske");
}
else{
$POST['sasija']=strtoupper($POST['sasija']);
$POST['registracija']=strtoupper($POST['registracija']);
$POST['motor']=strtoupper($POST['motor']);
	
$upit = "INSERT INTO vozilo (model_id,vrsta_goriva,tip_menjaca,registracija,broj_sasije,broj_motora,boja,godina_proizvodnje,user_id) VALUES ('$_POST[model]','$_POST[gorivo]','$_POST[menjac]','$_POST[registracija]','$_POST[sasija]','$_POST[motor]','$_POST[boja]','$_POST[godina]','$_SESSION[user_id]');";

$conn->query($upit);




header("Location: http://localhost/nesto/index.php?stranica=lista_vozila_korinik");

}


	
    

	




?>