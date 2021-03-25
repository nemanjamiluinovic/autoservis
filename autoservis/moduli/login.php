<?php
session_start();
include('header.php')
?>



<div id="forma">
	<form method='post' action='provera.php' >
		<input type='text' placeholder='korisničko ime' name='username' required size='50'><br>
		<input type='password' placeholder='lozinka' name='password' required size='50'><br>
		<input type='submit' value="Uloguj se"  >
	</form>
</div>
<?php
include('footer.php');