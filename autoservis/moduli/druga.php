<?php
require_once 'C:\XAMPP\htdocs\nesto\moduli\dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();

if(!empty($_POST['proizvodjac_id'])){
	$query="SELECT * FROM model where proizvodjac_id=".$_POST['proizvodjac_id'].";";
	$results=$db->fetchData($query);
	
	?>
	<option value="" disabled='' selected=''>Odaberite model</option>
<?php 
	foreach($results as $model){ ?>
	<option value="<?php echo $model['model_id'];?>"> <?php echo $model['naziv']?></option>
		


<?php
}	
}
?>