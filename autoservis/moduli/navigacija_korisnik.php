<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}?>







<div id='navigacija'>
<script type="text/javascript">
   document.getElementById('logout').innerHTML = "<form action='moduli/odjava.php' method='post'><input type='submit' value='Odjavi se'></form>";
</script>
	<ul>
		<li><a href="./index.php?stranica=lista_vozila_korinik">Lista vozila</a></li>
		<li><a href="./index.php?stranica=prva&greske=">Dodaj vozila</a></li>
		<li><a href="./index.php?stranica=lista_servisa_korisnik">Lista servisa</a></li>
	
		

	</ul>
</div>