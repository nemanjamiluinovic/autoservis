<?php 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$prikaz="select
usluga.naziv as usluga, count(usluga.naziv) as broj
from proizvodjac inner join model on model.proizvodjac_id=proizvodjac.proizvodjac_id
inner join vozilo on vozilo.model_id=model.model_id
inner join servis on servis.vozilo_id= vozilo.vozilo_id
inner join servis_usluga on servis_usluga.servis_id=servis.servis_id
inner join usluga on usluga.usluga_id=servis_usluga.usluga_id 
where vozilo.vozilo_id =".$_POST['kvarisa']." group by usluga.naziv order by broj desc limit 5";

$prikazi=$db->fetchData($prikaz);
echo json_encode($prikazi);



?>