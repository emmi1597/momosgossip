<?php session_start();

include_once('database.php');

if (!empty($_SESSION['usuario'])) {
		$categoria = $_POST['categoria'];
		$noticia = $_POST['noticia'];
		$fecha = date("Y-n-d");

		$stm = $pdo->prepare("INSERT INTO publicaciones(id_cat, id_usuario, pub, fecha) VALUES(:idcat, :user, :noticia, :fecha)");
		$stm->execute([
			':user'		=> $_SESSION['id'],
			':idcat'	=> $categoria,
			':noticia'	=> $noticia,
			':fecha'	=> $fecha
		]);
		header('Location: inicio.php');
}

?>