<?php

require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$vreme=date("Y-m-d H:i:s");
echo $vreme;
$upit = "update servis set end_at = '$vreme', placeno=1 where servis_id=".$_GET['del_id'];


$conn->query($upit);



header("Location:http://localhost/nesto/");


?>