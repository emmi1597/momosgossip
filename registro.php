<?php
require "./database.php";
define(RUTA, 'http://localhost/blog/login.php');
$email=$_POST["email"];
$pass=$_POST["psw1"];
$name=$_POST["nombre"];
$fecha_naci=$_POST["fecha"];

$stm=$pdo->prepare("INSERT INTO signup(email, pass, name, fecha_naci) values(:email, :pass, :name, :fecha_naci)");
$stm->execute([
	":email"=>$email,
	":pass"=>$pass,
	":name"=>$name,
	":fecha_naci"=>$fecha_naci
	]);

	header('Location: '.RUTA);
?>