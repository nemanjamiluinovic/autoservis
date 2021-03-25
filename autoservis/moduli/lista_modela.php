
<div id='tabela'>
<table>

<caption><h2>Lista modela</h2> </label></caption>
  <tr>
    <th>Naziv modela</th>
    <th>Naziv proizvodjača</th>
	<th>Opcije</th>
  </tr>


<?php
$results_per_page = 12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT model_id,model.naziv AS model,proizvodjac.naziv AS proizvodjac FROM model INNER JOIN proizvodjac ON model.proizvodjac_id = proizvodjac.proizvodjac_id ORDER BY proizvodjac.naziv ASC LIMIT $start_from,".$results_per_page;
$upit1 = 'SELECT COUNT(*) as broj FROM model;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	$result=$db->fetchData($upit);
	foreach($result as $v){
    
	
	?>		
		<tr><td><?php echo$v['proizvodjac']?></td>
			<td><?php echo$v['model']?></td>
			
			<td><input type="button" value="UKLONI" onClick="ukloniNew(<?php echo $v['model_id'];?>, 'ukloni_model', 'Da li ste sigurni da zelite da obrisete ovaj model?');" name="Ukloni" value="Ukloni"></td>
			
		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_modela&page=".$i."'>".$i."</a> "; 
};?> </div>