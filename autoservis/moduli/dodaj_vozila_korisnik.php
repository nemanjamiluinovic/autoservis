
<h1> Dodavanje vozila </h1> <br> <br>

<h3>
<form  method='post' action='k_vozilo'> 

Odaberite proizvodjaca:

<select name='proizvodjac' id='proizvodjac' onChange='proizvodjacValue(this.value)'>
<?php
session_start();
$upit = "SELECT * FROM proizvodjac";
$servername = "localhost";
$username = "root";
$password = "";
$dbname='autoservis';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("$upit");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
        
   
	?>		
		<option  value='<?php echo$v['proizvodjac_id']?>'> <?php echo$v['naziv']?> </option>

		
		
<?php   
 }}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }	
	
$conn = null;?>	
</select> <br>		




Odaberite model:

<select name='model' id='model'>
<?php
$upit = "SELECT
model.naziv
FROM
model
WHERE
model.proizvodjac_id = echo $izbor;
";
$servername = "localhost";
$username = "root";
$password = "";
$dbname='autoservis';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("$upit");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
        
   
	?>		
		<option  value='<?php echo$v['model_id']?>'> <?php echo$v['naziv']?> </option>

		
		
<?php   
 }}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }	
	
$conn = null;?>	
</select> <br>	



Odaberite vrstu goriva:
<select name="gorivo">
<option value='elektricni'> elektricni </option>
<option value='tng'> tng </option>
<option value='dizel'> dizel </option>
<option value='benzin'> benzin </option>
</select> <br>
Odaberite vrstu menjaca:
<select name="menjac">
<option value='manuelni'> manuelni </option>
<option value='automatski'> automatski </option>

</select> <br>

Unesite broj sasije:<input type='text' name='sasija'> <br>
Unesite registarsku oznaku:<input type='text' name='registracija'> <br>
Unesite broj motora:<input type='text' name='motor'><br>
Unesite boju:<input type='text' name='boja'> <br> 
Unesite godinu proizvodnje:<input type='number' name='godina'> <br>

<input type='submit' value='Dodavanje'>

</form></h3>