<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}
?>





<h1> Dodavanje korisnika </h1> <br> <br>
<h3>
<div class='unos'>
<form action='moduli/k_korisnik.php' method='post'> 
Unesite ime i prezime korisnika:<br><input type='text' name='vlasnik'size=50 required><br> <br>
Unesite kontakt korisnika:<br><input type='text' name='kontakt'size=50 required> <span> Format: 06X/XXX-XXX </span> <br> <br>
Username korisnika:<br>
<input type='text' name='username' size=50 required><br><br>
Kreirajte loziku korisnika: <br>
<input type='password' name='password' size=50 required><br><br>
Ponovite loziku korisnika: <br>
<input type='password' name='password_1' size=50 required><br><br>
<input type='submit' value='Kreiraj'>
</h3>
</form>
<div id='greske'>
<?php echo $_GET['greske'];?>
</div>

</div>
