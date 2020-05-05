<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style-login.css">
	<link rel="icon" href="img2/Logo.png" type="text/png"/>
<title>Documento sin título</title>
</head>
	
<body background="img/fondoazul2.png">
	
	<header class="header">
		
		 <div class="contenedor logo_nav_contenedor">
			<img src="img/logozapala.png">
			 <span class="menu-icon">Ver Menu</span>
			<nav class="navegador">
				<ul>
					<li><a href="Indexs.php">Inicio</a></li>
					<li><a href="../HTML/galeria.html">Galeria</a></li>
					<li><a href="comercios.php">Comercios</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="registrarse.php">Registrate</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main class="main">
		
		<div class="login">
  
        <h1>Ingreso usuario</h1>
        <form action="PHP/openSession.php" method="post">
            
            
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" id="usuario"  required>

            
            <label for="password">Contraseña:</label>
            <input type="password" name="pass" id="pass"  required>

            <input type="submit" value="Ingresar">

            <a href="">¿Ha olvidado su contraseña?</a><br>
            <a href="registrarse.php">Registrarse</a>
        </form>
    </div>
		
	</main>
</body>
</html>