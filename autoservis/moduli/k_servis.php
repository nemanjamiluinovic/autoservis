<?php

require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit = "INSERT INTO servis_usluga (servis_id,usluga_id) VALUES ('$_POST[servis]','$_POST[usluga]');";
$conn->query($upit);


header("Location: ../index.php?stranica=lista_vozila_korinik");


?>