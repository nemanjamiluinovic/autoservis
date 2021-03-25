<?php
ob_clean();

if($_POST){
	
$dat = filter_input(INPUT_POST, 'dat', FILTER_SANITIZE_STRING);
list($od, $do) = explode(';', $dat);

if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $od)) {
	die('Illegal API call! You will be reported! Your IP address has been logged.');
}

if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $do)) {

	die('Illegal API call! You will be reported! Your IP address has been logged.');
}
	
?>
<div id='tabela'>
<table>

<caption><h2>Najčešći modeli na servisu za period od <?php echo date('j. n. Y.', strtotime($od)); ?> do <?php echo date('j. n. Y.', strtotime($do)); ?></h2> </label></caption>
  <tr><th>Naziv proizvodjača</th>
    <th>Naziv modela</th>
    <th>Godina proizvodnje</th>
    <th>Broj servisa u kvartalu</th>
  </tr>
<?php
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();

$sqlQueryPart = ' BETWEEN \'' . $od . '\' AND \'' . $do . '\' ';

$upit="SELECT
COUNT(vozilo.model_id) as broj,
model.naziv as model,
proizvodjac.naziv as proizvodjac,
vozilo.godina_proizvodnje as godina
FROM
model
INNER JOIN proizvodjac on proizvodjac.proizvodjac_id = model.proizvodjac_id
INNER JOIN vozilo on vozilo.model_id = model.model_id
INNER JOIN servis on servis.vozilo_id = vozilo.vozilo_id
WHERE DATE(end_at) ".$sqlQueryPart."
GROUP BY (model.naziv)
ORDER BY broj desc limit 3";

$result=$db->fetchData($upit);
if ($result)
	foreach($result as $v){
	?>		
		<tr><td><?php echo$v['proizvodjac']?></td>
			<td><?php echo$v['model']?></td>
			<td><?php echo$v['godina']?></td>
			<td><?php echo$v['broj']?></td>
		</tr>
<?php		
}
?>
</table>
</div>
<?php }

exit;
