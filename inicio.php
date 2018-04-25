<?php session_start();

include_once('database.php');

function tabla($tabla, $pdo){
	$stm = $pdo->prepare("SELECT * FROM $tabla");
	$stm->execute();
	return $tabla = $stm;
}

function escritor($id, $pdo){
	$stm = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
	$stm->execute([':id'=>$id]);
	return $escritor = $stm->fetch();
}

function cat($id, $pdo){
	$stm = $pdo->prepare("SELECT * FROM categorias WHERE id_cat = :id");
	$stm->execute([':id'=>$id]);
	return $escritor = $stm->fetch();
}

$user = '';
$menAdmin = '';

if (!empty($_SESSION['usuario'])) {
	$usuario = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
	$usuario->execute([
		':id'=>$_SESSION['id']
	]);
	$usuario = $usuario->fetch();
	
	$user .= $usuario['nom_us'];

} else {
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>INICIO</title>
</head>
<body>
	<header>
		<h1>Titulo</h1>
		<?php
			switch ($_SESSION['tipo']) {
				case 3:
					echo '<h2>Bienvenido '.ucwords($user).' - Admin</h2>';
					break;
				
				default:
					echo '<h2>Bienvenido '.ucwords($user).'</h2>';
					break;
			}
		?>
	</header>
	<menu>
		<li><a href="inicio.php" title="Inicio">Inicio</a></li>
		<?php
			$categorias = tabla('categorias', $pdo);

			foreach ($categorias as $cat) {
				echo '<li><a href="categoria.php?cat='.$cat['id_cat'].'">'.ucwords($cat['categoria']).'</a></li>';
			}
		?>
		<li>
			<a href="cerrar.php">Cerrar Sesion</a>
		</li>
	</menu>
	<div class="content">
		<div class="content-item">
			<div class="item-titulo">
				<h1>Publicar</h1>
			</div>
			<div class="publicar">
				<form action="nuevo.php" method="post">
					<textarea name="noticia" placeholder="Escribe lo que quieras"></textarea>
					<select name="categoria">
						<?php
							$stm = $pdo->prepare("SELECT * FROM categorias");
							$stm->execute();
							$categorias = $stm;
							foreach ($categorias as $cat) {
								echo '<option value="'.$cat['id_cat'].'">'.$cat['categoria'].'</option>';
							}
						?>
					</select>
					<input type="submit" name="publicar" value="Publicar">
				</form>
			</div>
		</div>
	</div>
	<div class="content">
		<?php
			$publicaciones = tabla('publicaciones', $pdo);

			foreach ($publicaciones as $pub) {
				$stm = $pdo->prepare("SELECT count(*) FROM likes WHERE id_pub = :id");
				$stm->execute([':id'=>$pub['id_pub']]);
				$likes = $stm->fetch();

				$escritor = escritor($pub['id_usuario'], $pdo);
				$cat = cat($pub['id_cat'], $pdo);

				echo '<div class="content-item">';
				echo '<div class="item-datos">
						<p>'.ucwords($escritor['nom_us']).'</p>
						<p>'.$pub['fecha'].'</p>
						<p>'.ucwords($cat['categoria']).'</p>
					</div>';
				echo '<div class="item-post">
						<P>'.$pub['pub'].'</P>
					</div>';
				echo '<div class="item-accion">';
				echo '<p>'.$likes['count(*)'].' Likes</p>';

				$query = $pdo->prepare("SELECT * FROM likes WHERE id_usuario = :user AND id_pub = :pub LIMIT 1");
				$query->execute([
					':user' => $_SESSION['id'],
					':pub' => $pub['id_pub']
				]);
				$mg = $query->fetch();

				if ($mg == false) {
					echo '<a href="like.php?id='.$pub['id_pub'].'&tipo=lk">Like</a>';
				} else {
					echo '<a href="like.php?id='.$pub['id_pub'].'&tipo=dl">Don´t Like</a>';
				}
				// echo '<a href="like.php?id='.$pub['id_pub'].'">Like</a>';
				echo '<a href="mas.php?id='.$pub['id_pub'].'">Mas</a>';
				if ($_SESSION['tipo'] == 3) {
					echo '<a href="eliminar.php?id='.$pub['id_pub'].'&tipo=pub">Eliminar</a>';
				}
				echo '</div>';
				echo '</div>';
			}
		?>
	</div>
</body>
</html>