<?php

define('IS_IN_SCRIPT',1);

session_start();

if(!$_SESSION['ulogovan']){
	header('location:moduli/login.php');
}

include('moduli/header.php');

$stranica = $_GET['stranica'] ?? '';


if ($_SESSION['admin'] == 1){

include('moduli/navigacija.php');


switch ($stranica) {
	case '' :
		include('moduli/pocetna.php');
		break;
		case 'pretraga' :
		include('moduli/pretraga.php');
		break;
	case 'lista_korisnika' :
		include('moduli/lista_korisnika.php');
		break;
	
	case 'lista_proizvodjaca' :
		include('moduli/lista_proizvodjaca.php');
		break;
	
	case 'dodaj_proizvodjaca' :
		include('moduli/dodaj_proizvodjaca.php');
		break;
	case 'lista_modela' :
		include('moduli/lista_modela.php');
		break;
	
	case 'dodaj_model' :
		include('moduli/dodaj_model.php');
		break;
	case 'lista_usluga' :
		include('moduli/lista_usluga.php');
		break;
	
	case 'dodaj_uslugu' :
		include('moduli/dodaj_uslugu.php');
		break;
	case 'dodaj_korisnika' :
		include('moduli/dodaj_korisnika.php');
		break;
	case 'lista_vozila' :
		include('moduli/lista_vozila.php');
		break;
	
	case 'prva' :
		include('moduli/prva.php');
		break;
	case 'izvestaji' :
		include('moduli/izvestaji.php');
		break;
	case 'model_servis' :
		include('moduli/model_servis.php');
		break;
	case 'model_servis_api' :
		include('moduli/model_servis_api.php');
		break;
		case 'mesecno_usluge' :
		include('moduli/mesecno_usluge.php');
		break;
		case 'mesecno_usluge_api' :
		include('moduli/mesecno_usluge_api.php');
		break;
		case 'kvarovi' :
		include('moduli/kvarovi.php');
		break;
		case 'zarada' :
		include('moduli/zarada.php');
		break;
	default :
		echo 'Greška 404! Nemam takvu stranicu.';
		break;
}
}elseif($_SESSION['ulogovan'] == 1 && $_SESSION['admin'] == 0){
		include('moduli/navigacija_korisnik.php');
		switch ($stranica) {
	case '' :
		include('moduli/lista_vozila_korinik.php');
		break;
	case 'lista_vozila_korinik' :
		include('moduli/lista_vozila_korinik.php');
		break;
	
	
	case 'lista_servisa_korisnik' :
		include('moduli/lista_servisa_korisnik.php');
		break;
	case 'prva' :
		include('moduli/prva.php');
		break;
	case 'dodaj_servis_korisnik':
		include('moduli/dodaj_servis_korisnik.php');
		break;
		
	default :
		echo 'Greška 404! Nemam takvu stranicu.';
		break;
}
}



include('moduli/footer.php');




?>