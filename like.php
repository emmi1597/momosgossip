<?php session_start();
	include 'database.php';

	$id = $_GET['id'];
	$tipo = $_GET['tipo'];

	if ($tipo == 'lk') {
		$stm = $pdo->prepare("INSERT INTO likes(id_usuario, id_pub, megusta) VALUES(:user, :pub, :megusta)" );
		$stm ->execute([
			':user'=>$_SESSION['id'],
			':pub' => $id,
			':megusta' => '1'
		]);
		header('Location: inicio.php');
	} elseif ($tipo == 'dl') {
		$stm = $pdo->prepare("DELETE FROM likes WHERE id_pub = :pub AND id_usuario = :user" );
		$stm->execute([
			':pub' => $id,
			':user' => $_SESSION['id']
		]);
		header('Location: inicio.php');
	}

?>


	


