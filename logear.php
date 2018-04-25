
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
  .header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

<? 
session_start(); 
header('Location: logear.php'); 

if (!isset($_SESSION['nombre'])) { 
    $_SESSION['nombre'] = $_REQUEST['nombre']; 
}  

if ($_SESSION['nombre']===NULL){ 

}else{ 
    echo " Welcome ". $_SESSION["nombre"];} 
?>

  </style>
</head>
<body style="background-color: #FFA07A;">

<div class="header" style="margin-bottom:0">
  <h1 align="center">Your Gossip</h1>
  </div>

  <button> Cerrar Sesión </button>



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
    <div class="like"></div>
<input type="submit" name="like" value ="Like">
<input type="submit" name="comentar" value ="Comentar">
<input type="submit" name="compartir" value ="Compartir">

      <h3 align="right">Status</h3>

      <select name="love" class=right >

<option>Single</option>
<option>In Love</option>
<option>In a Relationship</option>
<option>Complicated</option>
<option>Married</option>

</select>
<div clas=clear></div>
      
      
      <p>Please be a bitch with the people you hate!</p>
     
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-sm-8">
      <h2 >Coment:</h2>
      
      <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
     <form action="logear.php" method="post">
<input type="submit" name="like" value ="Like">
<input type="submit" name="comentar" value ="Comentar">
<input type="submit" name="compartir" value ="Compartir">
<hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-sm-8">

      <p></p>
      <br>
      <h2>The people you love goes in here!</h2>
      
      <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
      <form action="logear.php" method="post">
<input type="submit" name="like" value ="Like">

<input type="submit" name="comentar" value ="Comentar">
<input type="submit" name="compartir" value ="Compartir">
<hr class="hidden-sm hidden-md hidden-lg">
    </div>
    <div class="col-sm-8">
      <p></p>

<form action="logear.php" method="post">



    </div>
  </div>
</div>

 <p align="center">XOXO...</p>
</div>

</body>
</html>

