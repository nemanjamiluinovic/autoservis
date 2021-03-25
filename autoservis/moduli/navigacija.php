<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}?>
<div id='navigacija' ">
<script type="text/javascript">
   document.getElementById('logout').innerHTML = "<form action='moduli/odjava.php' method='post'><input type='submit' value='Odjavi se'></form>";
</script>
	<h3><ul>
		<li><a href="./">Početna</a></li>
		<li><a href="./index.php?stranica=pretraga">Pretraga</a></li>
		<li><a href="./index.php?stranica=lista_korisnika">Lista korisnika</a></li>
		
		<li><a href="./index.php?stranica=dodaj_korisnika&greske=">Dodaj korisnika</a></li>
		<li><a href="./index.php?stranica=lista_proizvodjaca">Lista proizvodjača</a></li>
		
		<li><a href="./index.php?stranica=dodaj_proizvodjaca">Dodaj proizvodjača</a></li>
		<li><a href="./index.php?stranica=lista_modela">Lista modela</a></li>
		
		<li><a href="./index.php?stranica=dodaj_model">Dodaj model</a></li>
		<li><a href="./index.php?stranica=lista_usluga">Lista usluga</a></li>

		<li><a href="./index.php?stranica=dodaj_uslugu">Dodaj uslugu</a></li> 
		<li><a href="./index.php?stranica=lista_vozila">Lista vozila</a></li>
		<li><a href="./index.php?stranica=izvestaji">Izveštaji</a></li>
		
	</ul></h3>
</div>