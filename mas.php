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

$id = $_GET['id'];
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
			<?php if(!empty($menAdmin)){ echo $menAdmin;} ?>
			<a href="cerrar.php">Cerrar Sesion</a>
		</li>
	</menu>
	<div class="content">
		<?php
			$stm = $pdo->prepare("SELECT * FROM publicaciones WHERE id_pub = :id");
			$stm->execute([':id'=>$id]);
			$publicacion = $stm->fetch();

			$escritor = escritor($publicacion['id_usuario'], $pdo);
			$cat = cat($publicacion['id_cat'], $pdo);

			echo '<div class="content-item">';
			echo '<div class="item-datos">
					<p>'.ucwords($escritor['nom_us']).'</p>
					<p>'.$publicacion['fecha'].'</p>
					<p>'.ucwords($cat['categoria']).'</p>
				</div>';
			echo '<div class="item-post">
					<P>'.$publicacion['pub'].'</P>
				</div>';
			echo '<div class="item-accion">';
			if ($_SESSION['tipo'] == 3) {
				echo '<a href="eliminar.php?id='.$publicacion['id_pub'].'&tipo=pub">Eliminar</a>';
			}
			echo '</div>';
			echo '</div>';
		?>
	</div>
	<div class="content">
		<div class="content-item">
			<form action=comentar.php?id=<?= $id ?> method="post">
				<textarea name="comentario"></textarea>
				<input type="submit" value="Comentar" name="comentar">
			</form>
		</div>
		<div class="content-item">
			<div class="item-titulo">
				<h1>Comentarios</h1>
			</div>
		</div>
		<div class="content-item">
			<div class="item-datos">
				<?php
					$stm = $pdo->prepare("SELECT * FROM comentarios WHERE id_pub = :id");
					$stm->execute([':id'=>$id]);
					$comentarios = $stm;

					foreach ($comentarios as $com) {
						$escritor = escritor($com['id_usuario'], $pdo);
						echo '<div class="item-datos">
								<p><b>'.ucwords($escritor['nom_us']).'</b></p>
								<p>Comentario: '.$com['comentario'].'</p>
							</div>';
						if ($_SESSION['tipo'] == 3) {
							echo '<a href="eliminar.php?id='.$com['id_com'].'&pub='.$com['id_pub'].'&tipo=com">Eliminar</a>';
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>