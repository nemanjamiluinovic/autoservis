


<h1> Odabir servisne usluge </h1> <br> <br>
<form action='moduli/k_servis.php' method='post'> 
<h3>
Odaberite uslugu:<br>


<?php

require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "INSERT INTO servis (vozilo_id,user_id) VALUES ('$_GET[del_id]','$_SESSION[user_id]');";
$conn->query($upit);

$upit = "SELECT MAX(servis_id) as servis_id FROM servis;";
$result=$db->fetchData($upit);
    foreach($result as $v) {
		$servis = $v['servis_id'];
		echo "<input type='hidden' name='servis' value='$servis'>";
	}
$upit = "SELECT * FROM usluga";
$result=$db->fetchData($upit);



?> <select name='usluga' width=40>';<?php
   
    foreach($result as $v) {
        
   
	?>		
		<option  value='<?php echo$v['usluga_id']?>'> <?php echo$v['naziv']?> </option>

		
		
	<?php }?>

</select> <br><br>		
		
		<input type='submit' value='Kreiraj'>
		</h3>
		</form>
