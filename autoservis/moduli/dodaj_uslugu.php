<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}?>








<h1> Dodavanje usluga </h1> <br> <br>
<form action='moduli/k_usluga.php' method='post'> 
<h3>Unesite naziv usluge:<br>
<input type='text' name='usluga' size=50 required><br><br>
Unesite cenu usluge:<br>
<input type='text' name='cena' size=50 required><br><br>
Unesite opis usluge:<br>
<textarea name='opis'  rows="4" cols="50" required>
</textarea><br>


<input type='submit' value='Kreiraj'>
</h3>
</form>


<?php



?>