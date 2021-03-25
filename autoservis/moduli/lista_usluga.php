
<div id='tabela'>
<table>

<caption><h2>Lista usluga</h2> </label></caption>
  <tr>
    <th>Naziv usluge</th>
    <th>Cena</th>
    <th>Opis usluge</th>
	<th> Opcije</th>
	
  </tr>
  
<?php	
$results_per_page = 8;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit1 = 'SELECT COUNT(*) as broj FROM usluga;';
$upit = "SELECT * FROM usluga where dostupnost=1 LIMIT ".$start_from.','.$results_per_page;


$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
        $result=$db->fetchData($upit);
	foreach($result as $v){
   
		
?>		
		<tr>
			<td><?php echo$v['naziv']?></td>
			<td><?php echo$v['cena']?></td>
			<td><?php echo$v['opis']?></td>
			<td><input type="button" value="UKLONI" onClick="ukloniNew(<?php echo $v['usluga_id'];?>, 'ukloni_uslugu', 'Da li ste sigurni da zelite da obrisete ovu uslugu?');" name="Ukloni" value="Ukloni"></td>
		</tr>
<?php		
    }
	
    

	

?>
</table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_usluga&page=".$i."'>".$i."</a> "; 
};?> </div>