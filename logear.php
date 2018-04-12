<?php 
	require "./database.php";

  	if (!empty($_POST['user'])) {
    	$user = $_POST['user'];
    	$psw = $_POST['psw'];
    	$stmt = $pdo->prepare("SELECT * FROM signup WHERE name = :nombre");
		$stmt->execute([
			':nombre'=>$user
		]);
		$result = $stmt->FETCH();
		if ($result !== false) {
			echo '';
		} else{
			echo "error";
		}
    	// echo $user.$pas;
  	} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Momo's Gossip Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</script>
  <style>
  .fakeimg {
      height: 200px;
      background: #E9967A;
  }
  .right{
    float: right;;
  }
  .clear{
    clear: both;
  }
  .fa-snapchat-ghost {
  background: #fffc00;
  color: white;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
    padding: 20px;
    font-size: 30px;
    width: 30px;
    text-align: right;
    text-decoration: none;
    border-radius: 50%;
}
}
  </style>
</head>
<body style="background-color: #CD5C5C;">

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1 align="center">Your Gossip</h1>
  
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
   
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    
    </div>
   
  </div>
</nav>


<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Me</h2>
      <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
  <form action="logear.php" method="post">
<input type="submit" name="grabar" value ="Like">
<input type="submit" name="borrar" value ="Comentar">
<input type="submit" name="editar" value ="Compartir">

      <h3 align="right">Status</h3>

      <select name="love" class=right >

<option>Single</option>
<option>In Love</option>
<option>In a Relationship</option>
<option>Complicated</option>
<option>Married</option>

</select>
<div clas=clear></div>
      <h5>Photo of me:</h5>
      
      <p>Please be a bitch with the people you hate!</p>
     
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-sm-8">
      <h2 >Coment:</h2>
      
      <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
     <form action="logear.php" method="post">
<input type="submit" name="grabar" value ="Like">
<input type="submit" name="borrar" value ="Comentar">
<input type="submit" name="editar" value ="Compartir">

      <p></p>
      <br>
      <h2>The people you love goes in here!</h2>
      
      <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
      <form action="logear.php" method="post">
<input type="submit" name="grabar" value ="Like">
<input type="submit" name="borrar" value ="Comentar">
<input type="submit" name="editar" value ="Compartir">


<form action="logear.php" method="post">
if($_POST[grabar]) { instrucciones }


if($_POST[borrar]) { instrucciones }


if($_POST[editar]) { instrucciones }


    </div>
  </div>
</div>


  <h3 align="center">Social Media</h3>
  
<div class="jumbotron text-center" style="margin-bottom:0">
  <a href="#" class="fa fa-snapchat-ghost"></a>

  <p align="center">XOXO...</p>
</div>

</body>
</html>

