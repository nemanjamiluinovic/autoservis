<div id="tabela">
<table>
<caption><h2>Lista vozila</h2> </label></caption>
  <tr>
    <th>Proizvodjač</th>
    <th>Model</th>
    <th>Vrsta goriva</th>
    <th>Tip menjača</th>
    <th>Broj sasisije</th>
    <th>Broj motora</th>
    <th>Registracija</th>
    <th>Godina proizvodnje</th>
    <th>Boja</th>
    <th>Vlasnik</th>
    <th>Kontakt</th>
	<th>Opcije</th>
  </tr>

<?php
$results_per_page = 12;
if (isset($_GET["page"])) { $page = intval($_GET["page"]); } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT
vozilo_id,
model.naziv as model,
proizvodjac.naziv as proizvodjac,
vrsta_goriva,
tip_menjaca,
registracija,
broj_sasije,
broj_motora,
boja,
godina_proizvodnje,
telefon,
ime_prezime
FROM
model
INNER JOIN proizvodjac ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo ON vozilo.model_id = model.model_id
INNER JOIN user ON vozilo.user_id = user.user_id
LIMIT ".$start_from.','.$results_per_page;

$upit1 = 'SELECT COUNT(*) as broj FROM vozilo;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	$result=$db->fetchData($upit);
	foreach($result as $v){
    
	
	?>		
		<tr>
			<td><?php echo$v['proizvodjac']?></td>
			<td><?php echo$v['model']?></td>
			<td><?php echo$v['vrsta_goriva']?></td>
			<td><?php echo$v['tip_menjaca']?></td>
			<td><?php echo$v['broj_sasije']?></td>
			<td><?php echo$v['broj_motora']?></td>
			<td><?php echo$v['registracija']?></td>
			<td><?php echo$v['godina_proizvodnje']?></td>
			<td><?php echo$v['boja']?></td>
			<td><?php echo$v['ime_prezime']?></td>
			<td><?php echo$v['telefon']?></td>
			<td><input type="button" value="UKLONI" onClick="ukloniNew(<?php echo $v['vozilo_id'];?>, 'ukloni_vozilo', 'Da li ste sigurni da zelite da obrisete ovaj zapis?');" name="Ukloni" value="Ukloni"></td>
			

		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_vozila&page=".$i."'>".$i."</a> "; 
};?> </div>