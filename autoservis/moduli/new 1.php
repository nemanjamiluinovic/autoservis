 $upit1 ="select sum(cena) as profit
from  servis 
inner join servis_usluga on servis_usluga.servis_id=servis.servis_id
inner join usluga on usluga.usluga_id=servis_usluga.usluga_id 
where end_at is not null and end_at like '".$_POST['year']."-".$mesec."%';";
$result=$db->fetchData($upit);

foreach($result as $v){
$output[] = array(
   'month'   => $mesec,
   'profit'  => floatval($v["profit"])
  );
}}

 

 echo json_encode($output);
}



<?php if($_POST){
$prikaz="select
usluga.naziv as usluga, count(usluga.naziv) as broj
from proizvodjac inner join model on model.proizvodjac_id=proizvodjac.proizvodjac_id
inner join vozilo on vozilo.model_id=model.model_id
inner join servis on servis.vozilo_id= vozilo.vozilo_id
inner join servis_usluga on servis_usluga.servis_id=servis.servis_id
inner join usluga on usluga.usluga_id=servis_usluga.usluga_id 
where vozilo.vozilo_id =".$_POST['kvarisa'] ." group by usluga.naziv order by broj desc limit 5";
?>
<div id='table'>
<table>
<caption> Pet usluga koje su najčešće radjene na odabranom vozilu:</caption>
<?php
$prikazi=$db->fetchData($prikaz);
foreach($prikazi as $v){ ?>
<tr><td><?php echo $v['usluga'];?>  </td></tr>


<?php }}?>
</table>
</div>