<?php require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit ="select usluga.naziv as naj_usluga,
count(usluga.naziv) as broj
from usluga inner join servis_usluga on usluga.usluga_id=servis_usluga.usluga_id
inner join servis on servis.servis_id=servis_usluga.servis_id
where end_at like '".$_POST['god'].$_POST['mesec']."' group by naj_usluga ORDER BY broj DESC;";
$data=$db->fetchData($upit);
print json_encode($result);
header('location:../index.php?stranica=mesecno_usluge');
?>