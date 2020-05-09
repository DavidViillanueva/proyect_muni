<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">

	<link rel="icon" href="Logo.png" type="img/text/png"/>

	<link rel="stylesheet" type="text/css" href="CSS/estilos_popup.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">



	<link rel="icon" href="Logo.png" type="img/text/Logo.png"/>

	
<title>Compra venta Zapala</title>
	
	
</head>

<body background="fondoazul2.png">	
	<header class="header">
		 <div class="contenedor logo_nav_contenedor">
			<a title="zappag" href="https://www.zapala.gob.ar"><div class="logo"></div></a>
			<div class="menu-icon"></div>
			<nav class="navegador">
				<ul>
					<li><a href="Indexs.php">Inicio</a></li>
					<li><a href="HTML/galeria.html">Galeria</a></li>
					<li><a href="comercios.php">Comercios</a></li>
					<li><a id="btn-abrir-popup" class="btn-abrir-popup" href="#">login</a></li>
					<li><a href="registrarse.php">Registrate</a></li>
				</ul>
			</nav>
		</div>
	</header>



	<span class="linea"></span>



	<main class="main">
		<div class="contenedor">
		   <h1>Bienvenidos a el mercado concentrador de Zapala</h1>
		
			<p>Gracias por confiar en nuestra localidad, esperamos de corazón esta página ayude a mejorar la situación de cada uno de nuestros comerciantes. </p>
			<p>Esta página fue creada en conjunto con alumnos y profesores de la Universidad Tecnológica Nacional, Regional Neuquén. </p>
			
			<h1>SI SOS COMERCIANTE REGISTRATE!!! ES GRATIS. </h1>
			<p>Si sos comerciante y te interés vender a través de esta página, podes registrarte ahora y comenzar a vender tus productos. </p>
			
			<h3>PODES VENDER LO QUE QUIERAS. </h3>
			<p>No importa cuál sea tu rubro, vendas lo que vendas publícalo, alguien lo está necesitando. </p>

			<p>Gracias por confiar en nuestra localidad, esperamos de corazon esta pagina ayude a mejorar la situacion de cada uno de nuestros comerciantes.</p>
			<p>Esta pagina fue creada en conjunto con alumnos y profesores de la Universidad Tecnologica Nacional, Regional Neuquen.</p>
			<p>Gracias por confiar en nuestra localidad, esperamos de corazon esta pagina ayude a mejorar la situacion de cada uno de nuestros comerciantes.</p>
			<p>Esta pagina fue creada en conjunto con alumnos y profesores de la Universidad Tecnologica Nacional, Regional Neuquen.</p>
		</di>
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
					<a href="login/registro_cliente.php" >Registrarse</a>
				</div>
			</form>
		</div>
	</div>

	<script src="javascript/popup.js"></script>


	<div class="footer">
        <div class="content">
            <div class="logo">
                <img class="logo2" src="img/logo-gris.png"> 
            </div>
            
            <div class="links">
                <h4>Links Relacionados</h4>
                <ul>
                    <li><a href="#">2asd</a></li>
                    <li><a href="#">2asd</a></li>
                    <li><a href="#">2asd</a></li>
                    <li><a href="#">2asd</a></li>
                </ul>
            </div>
            
            <div class="contact">
                <h4>Contactanos</h4>
                <span>123456978</span>
                <span>asda2@asdasda.com</span>
                <a href="#"><img src="img/facebook-1.png" alt=""></a>
            </div>

        </div>
	</div>
	
</body>
</html>