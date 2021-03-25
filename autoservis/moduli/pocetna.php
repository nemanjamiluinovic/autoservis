<script language="javascript">
function odradi(delid)
{
	if(confirm("Da li ste sigurni da zelite da potvrdite zavrsetak servisa?")){
		window.location.href='moduli/zavrsi_servis.php?del_id='+delid+'';
		return true;
		
	}
	
	
}

</script>
<div id='tabela'>
<table>
<caption><h2>Lista servisa na cekanju</h2> </label></caption>
  <tr>
    <th>Proizvodjac</th>
    <th>Model</th>
    <th>Vrsta goriva</th>
    <th>Tip menjaca</th>
    <th>Broj sasije</th>
    <th>Broj motora</th>
    <th>Registracija</th>
    <th>Godina proizvodnje</th>
    <th>Boja</th>
    <th>Vlasnik</th>
    <th>Kontakt</th>
	<th>Opcije</th>
<th>Vreme zahtevanja</th>
	<th>Usluga</th>
	
	
  </tr>

<?php

$results_per_page = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT 
servis.servis_id as servis,
model.naziv as model,
proizvodjac.naziv as proizvodjac,
vrsta_goriva,
tip_menjaca,
registracija,
broj_sasije,
broj_motora,
boja,
godina_proizvodnje,
created_at,
usluga.naziv as usluga,
opis,
cena,
ime_prezime,
telefon
FROM
model
INNER JOIN proizvodjac ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo ON vozilo.model_id = model.model_id 
INNER JOIN servis ON servis.vozilo_id = vozilo.vozilo_id 
INNER JOIN servis_usluga ON servis_usluga.servis_id = servis.servis_id 
INNER JOIN usluga on servis_usluga.usluga_id = usluga.usluga_id
INNER JOIN `user` ON servis.user_id = `user`.user_id where end_at is null order by created_at asc
LIMIT ".$start_from.','.$results_per_page;


		$upit1 = 'SELECT COUNT(*) as broj FROM
model
INNER JOIN proizvodjac ON model.proizvodjac_id = proizvodjac.proizvodjac_id
INNER JOIN vozilo ON vozilo.model_id = model.model_id 
INNER JOIN servis ON servis.vozilo_id = vozilo.vozilo_id 
INNER JOIN servis_usluga ON servis_usluga.servis_id = servis.servis_id 
INNER JOIN usluga on servis_usluga.usluga_id = usluga.usluga_id
INNER JOIN `user` ON servis.user_id = `user`.user_id where end_at is null order by created_at ;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	
	$result=$db->fetchData($upit);
	if ($result):
		foreach ($result as $v): ?>		
		<tr>
			<td><?php echo$v['proizvodjac']?>
			<td><?php echo$v['model']?>
			<td><?php echo$v['vrsta_goriva']?>
			<td><?php echo$v['tip_menjaca']?>
			<td><?php echo$v['broj_sasije']?>
			<td><?php echo$v['broj_motora']?>
			<td><?php echo$v['registracija']?>
			<td><?php echo$v['godina_proizvodnje']?>
			<td><?php echo$v['boja']?>
			<td><?php echo$v['ime_prezime']?>
			<td><?php echo$v['telefon']?>
			<td><?php echo$v['usluga']?>
			<td><?php echo$v['created_at']?>
			<td><input type="button" value="Odradjeno" onClick="odradi(<?php echo $v['servis'];?>)" name="Odradjeno" value="Odradjeno">
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="14">
				Nema redova na ovoj stranici!
				<script>
					setTimeout(function(){
						window.location = 'index.php?stranica=&page=<?php echo $page-1; ?>';
					}, 200);
				</script>
	<?php endif; ?>
</table>
</div>
<div id="pagination">
<?php
if ($page > 1) {
	 echo "<a href='index.php?stranica=&page=".($page-1)."'>&laquo;</a> "; 
}
for ($i=1; $i<=$total_pages; $i++) {
	
    echo "<a href='index.php?stranica=&page=".$i."'>".(($page == $i)?('<u>'.$i.'</u>'):$i)."</a> "; 
};
echo "<a href='index.php?stranica=&page=".($page+1)."'>&raquo;</a> "; 
?> </div>