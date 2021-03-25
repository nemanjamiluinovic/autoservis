<?php 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit=" UPDATE vozilo
SET vlasnistvo = 0
where vozilo_id='".$_GET['del_id']."'";
$conn->query($upit);
header("Location:http://localhost/nesto/index.php?stranica=lista_vozila_korinik");