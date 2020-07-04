<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilos_popup.css">
</head>
<body>
    <!-- login popup -->
	<div class="overlay" id="overlay">
		<div class="popup" id="popup">
			<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
			<h3>Ingresa</h3>
			<form action="PHP/control_login/control_ingreso.php">
				<div class="contenedor-inputs">
					<label for="usuario">Nombre de Usuario:</label>
					<input type="text" name="usuario" id="usuario"  required>
					<label for="password">Contraseña:</label>
					<input type="password" name="pass" id="pass"  required>
					<input type="submit" class="btn-submit" value="Ingresar">
					<a href="">¿Ha olvidado su contraseña?</a><br>
					<a href="user/registro_usuario.php" >Registrarse</a>
				</div>
			</form>
		</div>
	</div>
	<script src="javascript/popup.js"></script>
</body>
</html>