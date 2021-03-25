<?php require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();

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
WHERE end_at ".$_POST['dat']."
GROUP BY (model.naziv)
ORDER BY broj desc limit 3";

$result=$db->fetchData($upit);

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


