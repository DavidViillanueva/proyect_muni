<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
	<link rel="stylesheet" type="text/css" href="../CSS/estilos_popup.css">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/cssgaleria.css">
    <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
    <link rel="stylesheet" type="text/png" href="../img/intento.png">
    <link rel="icon" href="img/logo-small.png" type="text/png"/>

	<link rel="icon" href="../img/Logo.png" type=""/>
	
<title>Galeria</title>
	
	
</head>

<body background="../img/fondoazul2.png">	
<?php include_once('../header.php'); ?>
	<span class="linea"></span>
	<main class="main">
		<h1>Galeria de Imagenes</h1>
		<span class="linea"></span>
		<section class="galeria">
			<a href="#image1">
				<img src="../img/galeria/01.jpg" alt=""></a>
			<a href="#image2">
				<img src="../img/galeria/02.jpg" alt=""></a>
			<a href="#image3">
				<img src="../img/galeria/03.jpg" alt=""></a>
			<a href="#image4">
				<img src="../img/galeria/04.jpg" alt=""></a>
			<a href="#image6">
				<img src="../img/galeria/05.jpg" alt=""></a>
			<a href="#image6">
				<img src="../img/galeria/06.jpg" alt=""></a>	
		</section>
        <article class="light-box" id="image1">
            <a href="#image6" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/01.jpg" alt="">
            <a href="#image2" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
        
        <article class="light-box" id="image2">
            <a href="#image1" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/02.jpg" alt="">
            <a href="#image3" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
        
        <article class="light-box" id="image3">
            <a href="#image2" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/03.jpg" alt="">
            <a href="#image4" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
        
        <article class="light-box" id="image4">
            <a href="#image3" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/04.jpg" alt="">
            <a href="#image5" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
        
        <article class="light-box" id="image5">
            <a href="#image4" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/05.jpg" alt="">
            <a href="#image6" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
        
        <article class="light-box" id="image6">
            <a href="#image5" class="next"><i class="fas fa-arrow-alt-circle-left"></i></a>
            <img src="../img/galeria/06.jpg" alt="">
            <a href="#image1" class="next"><i class="fas fa-arrow-alt-circle-right"></i></a>
            <a href="" class="close">X</a>
        </article>
	</main>
	

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
					<a href="../login/registro_cliente.php" >Registrarse</a>
				</div>
			</form>
		</div>
	</div>

	<script src="../javascript/popup.js"></script>


	<?php include_once('../footer.php'); ?>
	
</body>
</html>