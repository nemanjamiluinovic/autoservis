<?php 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit="delete from proizvodjac where proizvodjac_id='".$_GET['del_id']."'";
$conn->query($upit);
header("Location:http://localhost/nesto/index.php?stranica=lista_proizvodjaca");