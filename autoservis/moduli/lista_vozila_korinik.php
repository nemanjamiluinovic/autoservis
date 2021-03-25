<script language="javascript">
function ukloni(delid)
{
	if(confirm("Da li ste sigurni da zelite da obrisete ovaj zapis?")){
		window.location.href='moduli/ukloni_vozilo_korisnik.php?del_id='+delid+'';
		return true;
		
	}	
	
}
function servisiraj(delid)
{
	if(confirm("Da li ste sigurni da zelite da servisirate ovo vozilo?")){
		window.location.href='http://localhost/nesto/index.php?stranica=dodaj_servis_korisnik&del_id='+delid+'';
		return true;
		
	}	
	
}
</script>
<div id='tabela'>


<?php

$results_per_page = 12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT
vozilo.user_id,
vozilo_id,
model.naziv as model,
proizvodjac.naziv as proizvodjac,
vrsta_goriva,
tip_menjaca,
registracija,
broj_sasije,
broj_motora,
boja,
godina_proizvodnje
FROM
model
INNER JOIN proizvodjac ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo ON vozilo.model_id = model.model_id
INNER JOIN user ON vozilo.user_id = user.user_id
WHERE vozilo.user_id = ".$_SESSION['user_id']." AND vlasnistvo=1
LIMIT ".$start_from.','.$results_per_page;

$upit1 = 'SELECT COUNT(*) as broj FROM vozilo;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	$result=$db->fetchData($upit);
	if($result!=0){
		
	?>	
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
	<th>Opcije</th>
  </tr>	
		
<?php		
		
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
			<td><input type="button" value="UKLONI" onClick="ukloni(<?php echo $v['vozilo_id'];?>)" name="Ukloni" value="Ukloni">
			<input type="button" value="DODAJ SERVIS" onClick="servisiraj(<?php echo $v['vozilo_id'];?>)" name="Servisiraj" value="Servisiraj">
			
			</td>
			

		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_vozila_korisnik&page=".$i."'>".$i."</a> "; 
	}}else{
		echo "Ne postoje vozila registrovana u Vasem vlasnistvu, mozete dodati svoja vozilo klikom na opciju Dodaj vozilo.";
	}
	
	
	
	
	?> </div>