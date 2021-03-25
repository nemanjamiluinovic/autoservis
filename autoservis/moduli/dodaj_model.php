<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}?>


<h1> Dodavanje modela </h1> <br> <br>
<form action='moduli/k_model.php' method='post'> 
<h3>
Odaberite proizvodjača:<br>

<select name='proizvodjac' width=40>
<?php
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT * FROM proizvodjac";
$result=$db->fetchData($upit);




   
    foreach($result as $v) {
        
   
	?>		
		<option  value='<?php echo$v['proizvodjac_id']?>'> <?php echo$v['naziv']?> </option>

		
		
	<?php }?>

</select> <br><br>		
		Unesite naziv modela:<br>
		<input type='text' name='model' size=50 required><br><br>
		<input type='submit' value='Kreiraj'>
		</h3>
		</form>












