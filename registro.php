<?php
require "./database.php";
define(RUTA, 'http://localhost/blogemi/');
$email=$_POST["email"];
$psw=$_POST["psw"];
$name=$_POST["nombre"];
$fecha_naci=$_POST["fecha"];

$stm=$pdo->prepare("INSERT INTO usuarios(nom_us, email_us, pass_us, fch_nac, tipo_us) values(:nom, :email, :pass, :fecha, :tipo)");
$stm->execute([
	":nom"=>$name,
	":email"=>$email,
	":pass"=>$psw,
	":fecha"=>$fecha_naci,
	':tipo'=>1
]);

	header('Location: '.RUTA.'index.php');
?>