<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}

$results_per_page = 12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;

$pronadjen = 0;

if (!$_POST){
?>

 

<div id='prikaz'>
<div id='pretraga'>
<h1> Pretraga </h1> 
<form method='post' > 
<h3>Unesite broj šasije: <br>
<input type='text' name='sasija' size=20>
<input type='submit' value='Pretraži'>
</h3>
</form>
</div>

<?php 
}else{
	 
	 require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$br_s = "SELECT vozilo.broj_sasije FROM vozilo";
$upit = "SELECT
COUNT(*) as broj,
proizvodjac.naziv as proizvodjac,
model.naziv as model,
vozilo.registracija,
vozilo.broj_sasije,
vozilo.broj_motora,
vozilo.godina_proizvodnje,
usluga.naziv as usluga,
servis.end_at
FROM proizvodjac
INNER JOIN model ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo on vozilo.model_id = model.model_id
INNER JOIN servis ON servis.vozilo_id = vozilo.vozilo_id
INNER JOIN servis_usluga ON servis_usluga.servis_id = servis.servis_id
INNER JOIN usluga ON servis_usluga.usluga_id = usluga.usluga_id
WHERE vozilo.broj_sasije LIKE "."'".$_POST['sasija']."'".
"LIMIT ".$start_from.",".$results_per_page;

$result=$db->fetchData($br_s);
	foreach($result as $br){
		if($_POST['sasija'] === $br['broj_sasije'] ){
		$pronadjen = 1;
	}}
	if(!$pronadjen == 1){
	echo 'Ne postoji vozilo sa takvim brojem sasije!!!';}
	else{
?>

<div id='tabela'>
<table>
<caption><h2>Podaci o vozilu</h2> </label></caption>
  <tr>
    <th>Proizvodjač</th>
    <th>Model</th>
    <th>Registracija</th>
    <th>Broj sasisije</th>
    <th>Broj motora</th>
    <th>Godina proizvodnje</th>
	<th>Naziv usluge</th>
	<th>Usluga izvrsena</th>
	
	
  </tr>

<?php
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$br_s = "SELECT vozilo.broj_sasije FROM vozilo";
$upit = "SELECT
COUNT(*) as broj,
proizvodjac.naziv as proizvodjac,
model.naziv as model,
vozilo.registracija,
vozilo.broj_sasije,
vozilo.broj_motora,
vozilo.godina_proizvodnje,
usluga.naziv as usluga,
servis.end_at
FROM proizvodjac
INNER JOIN model ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo on vozilo.model_id = model.model_id
INNER JOIN servis ON servis.vozilo_id = vozilo.vozilo_id
INNER JOIN servis_usluga ON servis_usluga.servis_id = servis.servis_id
INNER JOIN usluga ON servis_usluga.usluga_id = usluga.usluga_id
WHERE vozilo.broj_sasije LIKE "."'".$_POST['sasija']."'".
"LIMIT ".$start_from.",".$results_per_page;

$result=$db->fetchData($br_s);
	foreach($result as $br){
		if($_POST['sasija'] === $br['broj_sasije'] ){

$result=$db->fetchData($upit);
	
	foreach($result as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
		
		?>		
		<tr>
			<td><?php echo$v['proizvodjac']?></td>
			<td><?php echo$v['model']?></td>
			<td><?php echo$v['registracija']?></td>
			<td><?php echo$v['broj_sasije']?></td>
			<td><?php echo$v['broj_motora']?></td>
			<td><?php echo$v['godina_proizvodnje']?></td>
			<td><?php echo$v['usluga']?></td>
			<td><?php echo$v['end_at']?></td>
		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=pretraga_prikaz&page=".$i."'>".$i."</a> "; 
 }}}}}?> </div>
</div>