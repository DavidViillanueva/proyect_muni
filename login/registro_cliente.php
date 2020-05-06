<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/Logo.png" type="text/png"/>
	<link rel="stylesheet" href="css/style_register.css">
<title>Documento sin título</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <h1>Registro de Usuario</h1>
        <form action="PHP/cargarseSistema.php" method="post">
            <div class="content">
                <div class="columna1">
                    <!-- Nombre -->
                    <label for="name">Nombre:</label>
                    <input type="text" name ="name" id="name" required autocomplete=off> 

                    <!-- apellido   -->
                    <label for="lastname">Apellido:</label>
                    <input type="text" name="lastname" id="lastname" required autocomplete=off> 

                    <!-- Contraseña -->
                    <label for="password">Contraseña:</label>
                    <input type="password" name="pass" id="pass" required autocomplete=off>

                    
                    <!-- direccion -->
                    <label for="text">Barrio:</label>
                    <input type="text" name="barrio" id="barrio" required autocomplete=off>
                    
                    <label for="text">Calle:</label>
                    <input type="text" name="calle" id="calle" required autocomplete=off>
                    
                    <!-- datos contacto -->
                    <label for="text">Mail:</label>
                    <input type="email" name="mail" id="mail" required autocomplete=off>
                    

                    
                </div>
                <div class="columna2">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto itaque maiores enim voluptatibus molestiae alias delectus, quisquam dolorum quas modi illum eos rem consequuntur odit vitae, accusamus iste voluptates tempore!</p>
                </div>
            </div>
            <div class="bottom">
                    <input type="submit" value="Registrarse">
                    <a href="Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>