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

function publicaciones($idcat, $pdo){
	$stm = $pdo->prepare("SELECT * FROM publicaciones WHERE id_cat = :id");
	$stm->execute([':id'=>$idcat]);
	return $escritor = $stm;
}

$idcat = $_GET['cat'];
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
			$publicaciones = publicaciones($idcat, $pdo);
			foreach ($publicaciones as $pub) {
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
				echo '<a href="">Like</a>';
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