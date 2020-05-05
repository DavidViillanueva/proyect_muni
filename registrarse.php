<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/Logo.png" type="text/png"/>
	<link rel="stylesheet" href="CSS/style-registrarse.css">
<title>Documento sin título</title>
	

</head>


<body background="img/fondoazul2.png">
	
	
	<main class="main">
		
		<div class="bloque">
        <h1>Registro de Usuario</h1>
        <form action="PHP/cargarseSistema.php" method="post">
           
            <label for="name">Nombre:</label>
            <input type="text" name ="name" id="name" required autocomplete=off> 

    
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" id="lastname" required autocomplete=off> 

            
			<label for="username">Usuario:</label>
            <input type="text" name="username" id="username" required autocomplete=off>
            

            
            <label for="password">Contraseña:</label>
            <input type="password" name="pass" id="pass" required autocomplete=off>

            
            <label for="text">Barrio:</label>
            <input type="text" name="barrio" id="barrio" required autocomplete=off>
			
			
			<label for="text">Calle:</label>
            <input type="text" name="calle" id="calle" required autocomplete=off>
			
			
			<label for="text">Mail:</label>
            <input type="email" name="mail" id="mail" required autocomplete=off>
			
			
			<!--<label for="text">Vemos que mas:</label>
            <input type="text" name="" id="" required autocomplete=off>-->
            

            <input type="submit" value="Registrarse">
            <a href="Indexs.php"><input type="button" value="Volver Inicio"></a>
        </form>
	   </div>
	</main>
</body>
</html>