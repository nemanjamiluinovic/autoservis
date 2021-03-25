<?php
session_start();
if($_POST){
	
	require_once 'dbConfig.php';
	$db=new Dbcon();
	$conn=$db->connection();
	$query_a="SELECT username,pass_hash FROM admin";
	$query_u="SELECT * FROM user";
	$query_ua="SELECT is_active FROM user where username like "."'".$_POST['username']."'".";";
	
	$results_a=$db->fetchData($query_a);
	$results_u=$db->fetchData($query_u);
	$aktivnost_u=$db->fetchData($query_ua);
	
	foreach($aktivnost_u as $aktiv){
		$aktivnost = $aktiv['is_active'];
	}
	
	
	
	foreach($results_a as $admin){
		
		
		if($_POST['username'] === $admin['username'] &&  password_verify ( $_POST['password'] , $admin['pass_hash'])){
			$_SESSION['admin'] = 1;
			$_SESSION['ulogovan'] = 1;
			header("Location:http://localhost/nesto/index.php");
		}
	}
	foreach($results_u as $user){
		
		if($_POST['username'] === $user['username'] && password_verify ( $_POST['password'] , $user['pass_hash']) && $aktivnost == 1 ){
			$_SESSION['ulogovan'] = 1;
			$_SESSION['admin'] = 0;
			$_SESSION['user_id'] = $user['user_id'];
			header("Location:http://localhost/nesto/index.php");
		}
	}
	
			
}
header("Location:http://localhost/nesto/index.php");
?>