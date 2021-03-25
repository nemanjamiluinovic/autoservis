<?php


	require_once 'dbConfig.php';
	$db=new Dbcon();
	$conn=$db->connection();
if($_POST){
	extract($_POST);
	$greske = array();
   $provera="select username from user;";
   $rezultat=$db->fetchData($provera);
 

	if (empty($POST['vlasnik']) && !preg_match("/^[A-Z][a-z]+(\s[A-Z][a-z]+)+$/", $_POST['vlasnik'])) $greske[] = "Nedostaje ime i prezime korisnika ili ga niste uneli pravilno."; 

	if (empty($POST['kontakt']) && !preg_match("/^06[1-6]\/[0-9]{3}\-[0-9]{3,4}$/", $_POST['kontakt']) ) $greske[] = "Nedostaje broj telefona ili nije unet u formatu 06X/XXX-XXX.";
	 foreach($rezultat as $v){
		if($v['username']===$_POST['username']){
			$greske[] = "Ovaj username je vec iskoriscen";
			
		}
	}
	if(empty($_POST['password'])){
		$greske[] = "Morate uneti password.";
	}
	if($_POST['password']!=$_POST['password_1']){
		$greske[] = "Niste dobro ponovili password.";
	}

	
	$greske = implode("<br>", $greske);
	


	
}
if(!empty($greske)){
header("Location: http://localhost/nesto/index.php?stranica=dodaj_korisnika&greske=$greske");
}

else if(empty($greske)){
	$h_pass=password_hash ( $_POST[password],PASSWORD_DEFAULT);
	$user = $_POST[username];
	
	$upit = "INSERT INTO user (ime_prezime,telefon,username,pass_hash,is_active) VALUES ('$_POST[vlasnik]','$_POST[kontakt]','$user', '$h_pass',1);";

$conn->query($upit);



header("Location: ../index.php?stranica=lista_korisnika");

}

?>