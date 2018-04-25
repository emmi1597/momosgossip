<?php session_start();

include_once('database.php');

$id = $_GET['id'];

if (!empty($_POST['comentar'])) {
	$comentario = $_POST['comentario'];

	$stm = $pdo->prepare("INSERT INTO comentarios(id_usuario, id_pub, comentario) VALUES(:user, :pub, :com)");
	$stm->execute([
		':user'=>$_SESSION['id'],
		':pub'=>$id,
		':com'=>$comentario
	]);
	header('Location: mas.php?id='.$id);
}


 ?>