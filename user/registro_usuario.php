<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    
<title>Registro</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <form action="#" method="post">
                <div class="header">
                    <h1>Registro de Usuario</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <div class="personales">
                            <h3>Datos personales</h3>
                            <!-- Nombre -->
                            <label for="name">Nombre:</label>
                            <input type="text" name ="name" id="name" required autocomplete=off maxlength="30"> 
                            <!-- apellido   -->
                            <label for="lastname">Apellido:</label>
                            <input type="text" name="lastname" id="lastname" required autocomplete=off maxlength="30"> 
                            <!-- DNI -->
                            <label for="dni">DNI:</label>
                            <input type="number" name="dni" id="dni" require>
                            <!-- fecha nacimiento -->
                            <label for="nacimiento">Fecha de nacimiento:</label>
                            <input type="date" name="nacimiento" id="nacimiento" max="2015-01-01">
                            <!-- sexo -->
                            <label for="sexo">Sexo:</label>
                            <div class="sex">
                                <div><l><label for="hombre">Hombre</label><input type="radio" id="hombre" name="sexo" value="hombre" checked></l></div>
                                <div><label for="mujer">Mujer</label><input type="radio" id="mujer" name="sexo" value="mujer" checked></div>
                                <div><label for="nn">Otro</label><input type="radio" id="nn" name="sexo" value="nn" checked></div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="columna2">
                        <div class="ubicacion">
                            <!-- direccion -->
                            <h3>Datos de ubicacion</h3>
                            <label for="text">Barrio:</label>
                            <input type="text" name="barrio" id="barrio" required autocomplete=off maxlength="20">
                            <label for="text">Calle:</label>
                            <input type="text" name="calle" id="calle" required autocomplete=off maxlength="30">
                            <label for="text">Altura:</label>
                            <input type="number" name="altura" id="altura" required autocomplete=off maxlength="10">
                            <label for="text">Piso:</label>
                            <input type="number" name="piso" id="piso" autocomplete=off maxlength="5">
                            <label for="text">Departamento:</label>
                            <input type="text" name="dpto" id="dpto" autocomplete=off maxlength="5">
                        </div>

                        
                    </div>
                    <div class="columna3">
                        <div class="contacto">
                            <!-- datos contacto -->
                            <h3>Datos de contacto</h3>
                            <label for="text">Mail:</label>
                            <input type="email" name="mail" id="mail" required autocomplete=off>
                            <label for="tel">Telefono:</label>
                            <input type="tel" name="tel" id="tel" require>
                        </div>
                        <div class="user">
                            <h3>Usuario</h3>
                            <label for="usuario">Usuario:</label>
                            <input type="text" name="usuario" id="usuario" maxlength="50">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="pass" id="pass" required autocomplete=off minlength="4">
                        </div>
                    </div>
                </div>
            <div class="bottom">
                    <input type="submit" value="Registrarse">
                    <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>