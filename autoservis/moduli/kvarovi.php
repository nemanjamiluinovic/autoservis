<?php if (file_exists('./js/' . $_GET['stranica']. '.js')): ?>
<script>
<?php echo file_get_contents('./js/' . $_GET['stranica'] . '.js'); ?>
</script>  
<?php endif; ?>
<form ><h3>
Spisak automobila koji su najčešće nas servisu, za pregled najčešćih kvarova odaberite jedan od modela: </h3> <br>
<select name='kvarisa' id='kvarisa'>
<?php 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit ="SELECT COUNT(servis.servis_id) as broj, servis.vozilo_id, proizvodjac.naziv as proizvodjac,model.naziv as model,godina_proizvodnje
from proizvodjac inner join model on model.proizvodjac_id=proizvodjac.proizvodjac_id
inner join vozilo on vozilo.model_id=model.model_id
inner join servis on servis.vozilo_id= vozilo.vozilo_id
inner join servis_usluga on servis_usluga.servis_id=servis.servis_id
inner join usluga on usluga.usluga_id=servis_usluga.usluga_id
GROUP BY servis.vozilo_id
ORDER BY broj DESC limit 5;";
$result=$db->fetchData($upit);

foreach($result as $v){ ?>
<option value="<?php echo $v['vozilo_id'];?>"> <?php echo $v['proizvodjac'] . " ".$v['model']. " " .  $v['godina_proizvodnje']; ?> </option>
<?php }?>
</select>

</form>
<div id='u'> </div>

