<?php
	
	$host = 'localhost';
	$dbname =  'blogemi';
	$user = 'root';
	$psw = '';

	

	try{
		$pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $psw);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo $e->getMessage();
	}
?>