<?php 
include_once('database.php');

$id = $_GET['id'];
$tipo = $_GET['tipo'];

if ($tipo == 'com') {
	$idpub = $_GET['pub'];

	$stm = $pdo->prepare('DELETE FROM comentarios WHERE id_com = :id');
	$stm->execute([':id'=>$id]);

	header('Location: mas.php?id='.$idpub);
} elseif ($tipo == 'pub') {

	$stm = $pdo->prepare("DELETE FROM likes WHERE id_pub = :id");
	$stm->execute([':id'=>$id]);
	
	$stm = $pdo->prepare("DELETE FROM comentarios WHERE id_pub = :id");
	$stm->execute([':id'=>$id]);

	$stm = $pdo->prepare('DELETE FROM publicaciones WHERE id_pub = :id');
	$stm->execute([':id'=>$id]);

	header('Location: inicio.php');
}
?>