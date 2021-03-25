<?php

require_once 'dbConfig.php';
$db=new Dbcon();
$query="SELECT * FROM proizvodjac";
$results=$db->fetchData($query);

?>
<h1> Dodavanje vozila </h1> <br> <br>

<h3>
<div class='unos'>
<form method='POST' action='moduli/k_vozilo.php'> 

Odaberite proizvodjaca:<br>

<select name='proizvodjac' id='proizvodjac' onChange='proizvodjacValue(this.value)' >
	
		<option  value="" disabled='' selected=''> Odaberite proizvodjaca</option>
		<?php foreach($results as $proizvodjac){ ?>
	<option value="<?php echo $proizvodjac['proizvodjac_id'];?>"> <?php echo $proizvodjac['naziv']?></option>
	<?php
	
}

?>

		
		
</select> <br>		




Odaberite model:<br>

<select name='model' id='model' >

		<option  value=''> Odaberite model </option>
		

		
	
</select> <br>	

<?php if (file_exists('./js/' . $_GET['stranica']. '.js')): ?>
<script>
<?php echo file_get_contents('./js/' . $_GET['stranica'] . '.js'); ?>
</script>  
<?php endif; ?>


Odaberite vrstu goriva:<br>
<select name="gorivo">
<option value='elektricni'> Elektricni </option>
<option value='tng'> Benzin+Tng  </option>
<option value='dizel'> Dizel </option>
<option value='benzin'> Benzin </option>
</select> <br>
Odaberite vrstu menjaca:<br>
<select name="menjac">
<option value='manuelni'> Manuelni </option>
<option value='automatski'> Automatski </option>

</select> <br>

Unesite broj sasije:<br><input type='text' name='sasija' size=50 required> <br>
Unesite registarsku oznaku:<br><input type='text' name='registracija' size=50 required> <br>
Unesite broj motora:<br><input type='text' name='motor' size=50 required><br>
Unesite boju:<br><input type='text' name='boja' size=50 required> <br> 
Unesite godinu proizvodnje:<br><input type='number' name='godina' size=50 min=1970 max=<?php echo date('Y');?> required> <br>
<input type='submit' value='Dodavanje'>

</form></h3>
<div id='greske'>
<?php echo $_GET['greske'];?>
</div>
</div>
