<?php 

echo 'pruebas';

if (!empty($_POST['hola'])) {
	header('Location: logear.php');
}

?>
<form action="pruebas.php" method="post">
	<input type="submit" name="hola" value="Enviar">
</form>