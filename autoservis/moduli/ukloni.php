<?php 
require_once 'C:\XAMPP\htdocs\nesto\moduli\dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit="delete from model where model_id='".$_GET['del_id']."'";
$conn->query($upit);
header("Location:http://localhost/nesto/index.php?stranica=lista_modela");