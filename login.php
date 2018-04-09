<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: serif, sans-serif, serif;}

input[type=text], input[type=password], input[type=date] {
    width: 100%;
    padding: 20px 20px;
    margin: 20px 0;
    display: inline-block;
    border: 1px solid #CD5C5C;
    box-sizing: border-box;

}

button {
    background-color: #CD5C5C;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-top: 45px;

}

button:small-caps {
    opacity: 0.8;
}


.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #E9967A;
}


.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 25%;
    border-radius: 30%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;

    
  }


.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%; 

}


.close {
    position: absolute;
    right: 35px;
    top: 0;
    color: #C70039;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    cursor: pointer;
}


.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}


@media screen and (max-width: 250px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}


.topnav {
    background-color: black;
    overflow: hidden;
}


.topnav a {
    float: center;
    color: #f2f2f2;
    text-align: center;
    padding: 10px 50px;
    text-decoration: none;
    font-size: 24px;
}


.topnav a:hover {
    background-color:#E9967A ;
    color: black;
}

.topnav a.active {
    background-color: #E9967A;
    color: black;
}
body {font-family: "Serif", Serif;}

.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
    margin-right: 330px ;
    

}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content */
.tabcontent {
    color: white;
    display: none;
    padding: 50px;
    text-align: center;
}

#Home {background-color:#E9967A;}
#About {background-color:#E9967A;}

.footer {
  padding: .5px;
  text-align: right;
  background: #E9967A;
  margin-top: 150px;
}

</style>

</head>
<body style="background-color:#F4F6F6;">

<h2  align="center"> Welcome to the Momo's Gossip </h2>

<div id="Home" class="tabcontent">
  <h3>Home</h3>
  <p>Welcome to Momo's Gossip, here you can write, read whatever you want.</p>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>Here you can write whatever the F*ck YOU WANT! You can express your self, be different </p> 
</div>


<button class="tablink" onclick="openCity('Home', this, 'grey')" id="defaultOpen">Home</button>
<button class="tablink" onclick="openCity('About', this, 'grey')">About</button>


<script>
function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}

document.getElementById("defaultOpen").click();
</script>

<button onclick="document.getElementById('id01').style.display='block'" style="width:center;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="logear.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="login.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pas" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>

var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<button onclick="document.getElementById('id02').style.display='block'" style="width:center;">Sign Up</button>

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="./registro.php" method="POST">
    <div class="container">
      <h1>Sign Up</h1>
      <p> Crea tu usuario</p>
      <hr>
      <label for="nombre"><b>Nombre </b></label>
      <input type="text" placeholder="Enter Name" name="nombre" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw1" required>

      <label date="cumpleaños"><b>Birthday</b></label>
      <input input type="date" name="fecha" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p> Al crear tu cuenta accedes a nuestros <a href="#" style="color:dodgerblue">Terminos & Privacidad</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
        <a href="logear.php"><button type="submit" class="signupbtn2" >Sign Up</button></a>
       
        </div>
    </div>
  </form>
</div>
<div class="footer">
  <h2>Created By: Emi Vargas </h2>
  <h3>All rights reserved </h3>
</div>

<script>

var modal2 = document.getElementById('id02');


window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
</script>


</body>

</html>

