<?php 
if (!defined('IS_IN_SCRIPT')) {
   die('I am sorry, you can not access this file directly.');
   exit; 
}

if(!$_POST){
?>


<h1> Lista servisa </h1> <br> <br>
<form  method='post'> 
<h3>
Odaberite registraciju vozila:<br>

<select name='registracija' width=40>
<?php
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT registracija FROM vozilo WHERE user_id = ".intval($_SESSION['user_id'])." and vlasnistvo = 1";
$result=$db->fetchData($upit);




   
    foreach($result as $v) {
        
   
	?>		
		<option  value='<?php echo$v['registracija']?>'> <?php echo$v['registracija']?> </option>

		
		
	<?php }?>

</select> 
<input type='submit' value='PRIKAŽI'>
		</h3>
		</form>
	<?php } else{




$results_per_page = 12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
	
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "SELECT
usluga.naziv as ime,
opis,
cena,
end_at
FROM
usluga
INNER JOIN servis_usluga ON servis_usluga.usluga_id = usluga.usluga_id
INNER JOIN servis on servis_usluga.servis_id = servis.servis_id
INNER JOIN vozilo on vozilo.vozilo_id = servis.vozilo_id
WHERE registracija LIKE '".$_POST['registracija']."'
LIMIT ".$start_from.','.$results_per_page;

$upit1 = 'SELECT COUNT(*) as broj FROM vozilo;';
	$results1=$db->fetchData($upit1);

	foreach($results1 as $v){
		$total_pages = ceil($v["broj"] / $results_per_page);
	}
	
	
	$result=$db->fetchData($upit);
	if($result!=0){ ?>
	<div id='tabela'>
<table>
<caption><h2>Lista servisa</h2> </label></caption>
  <tr>
    <th>Usluga</th>
    <th>Opis</th>
    <th>Cena usluge</th>
    <th>Usluga obavljena</th>
   
  </tr><?php
	
	foreach($result as $v){
    
	
	?>		
		<tr>
			<td><?php echo$v['ime']?></td>
			<td><?php echo$v['opis']?></td>
			<td><?php echo$v['cena']?></td>
			<td><?php echo$v['end_at']?></td>


		</tr>
<?php		
	
    
 }
	

?></table>
</div>
<div id="pagination">
<?php
for ($i=1; $i<=$total_pages; $i++) { 
    echo "<a href='index.php?stranica=lista_servisa_korisnik&page=".$i."'>".$i."</a> "; 
	}}else{
	echo "Jos uvek ne postoje servisi za odabrano vozilo!";}}?> </div>









