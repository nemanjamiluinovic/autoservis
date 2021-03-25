<?php 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit=" UPDATE user
SET is_active = 0
WHERE user_id='".$_GET['del_id']."'";
$conn->query($upit);
header("Location:http://localhost/nesto/index.php?stranica=lista_korisnika");