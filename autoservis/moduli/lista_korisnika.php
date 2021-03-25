
<div id='tabela'>
<table>
<caption><h2>Lista korisnika</h2> </label></caption>
  <tr>
    
    <th>Ime i prezime</th>
    <th>Kontakt</th>
	<th>Korisničko ime</th>
	<th>Opcije</th>
  </tr>

<?php
$results_per_page = 12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT
user_id,
ime_prezime,
username,
telefon
FROM
user where is_active=1 LIMIT $start_from,".$results_per_page;

$upit1 = 'SELECT COUNT(*) as broj FROM user;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	$result=$db->fetchData($upit);
	foreach($result as $v){
    
	
	?>		
		<tr>
			
			<td><?php echo$v['ime_prezime']?></td>
			<td><?php echo$v['telefon']?></td>
			<td><?php echo$v['username']?></td>
			<td><input type="button" value="UKLONI" onClick="ukloniNew(<?php echo $v['user_id'];?>, 'ukloni_korisnika', 'Da li ste sigurni da zelite da obrisete ovog korisnika?');" name="Ukloni" value="Ukloni"></td>
			
			

		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_korisnika&page=".$i."'>".$i."</a> "; 
};?> </div>