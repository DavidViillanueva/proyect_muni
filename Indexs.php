<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">

	<link rel="icon" href="img/Logo.png" type="img/text/png"/>

	<link rel="stylesheet" type="text/css" href="CSS/estilos_popup.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

	<link rel="stylesheet" type="text/css" href="CSS/contenedor2.css">
	
<title>Compra venta Zapala</title>
	
	
</head>

<body background="img/fondoazul2.png">	
	<header class="header">
		
		 <div class="contenedor logo_nav_contenedor">
			 <a title="zappag" href="https://www.zapala.gob.ar"><div class="logo"></div></a>
			 <div class="menu-icon"></div>
			<nav class="navegador">
				<ul>
					<li><a href="Indexs.php">Inicio</a></li>
					<li><a href="#">Galeria</a></li>
					<li><a href="#">Comercios</a></li>
					<li><a id="btn-abrir-popup" class="btn-abrir-popup" href="#">login</a></li>
					<li><a href=" ../registrarse.php ">Registrate</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<span class="linea"></span>
	<main class="main" style="text-align: justify">
		<div class="contenedor">
			<img class="quedatecasa" src="img/quedateencasa.jpg" alt="">
			<h1 color="#ooo" align="center">Sitio Bajo Construcción.</h1>
			<h2 align="center">Bienvenidos a ZapalaComercial.com.ar</h2>
			<h3 align="left">A quién va dirigido...</h3>
		
			<p>Está dirigido a todos los Proveedores (Comerciantes, Productores Locales, Feriantes y Ofrecedores de 
			   Servicios Independientes), como así también a Consumidores de Servicios de la ciudad a formalizarse en
			   el uso de una nueva tecnología ofrecida por la Municipalidad de Zapala.
			</p>
			
			
			<h3 align="left">De qué se trata...</h3>
			<p> ZapalaComercial.com.ar es una iniciativa de la Municipalidad de Zapala en conjunto con Profesores 
				y Alumnos de la Universidad Tecnológica Nacional, Regional Neuquén, con el objetivo de 
				desarrollar un Sitio de Ventas Online que formalice la comercialización de productos y servicios 
				como así también a sus oferentes. 
			</p>
			
			<h3 align="left">Cómo funciona... </h3>
			<p>En el ZapalaComercial.com.ar podrás publicar tus servicios y/o productos para ser adquiridos por 
			   los ciudadanos de Zapala, los cuales elegirán como pagarlos y su forma de entrega, de acuerdo 
			   a lo que ofrezcas, asegurando así una forma rápida y segura de comerciar.
			</p>
			<h3>Beneficios de sumarte como Proveedor en el Sistema...</h3>
			
			<div class="contenedor2">
				<ul>
					<li>
						<img src="img/ubicacion.jpg" alt="">
						<p>
						   Búsqueda por cercanía, 
						   encontrar de manera sencilla productos y/o servicios. 

						</p>
					</li>
					<li>
						<img src="img/imagen1.jpg" alt="">
						<p>
						   Publicidad para potenciar tu negocio obteniendo mayor visibilidad comercial 
						   TOTALMENTE GRATIS.
						</p>
					</li>
					<li>
						<img src="img/imagen2.png" alt="">
						<p>
							Esto te permitirá mejorar la relacion con tus viejos clientes y atraer a nuevos.
						</p>
					</li>
				</ul>
			</div>

			<h3 align="left">Por qué el desarrollo de ZapalaComercial.com.ar.</h3>
			<p>El desarrollo del sistema busca mejorar las políticas de ofrecimiento de Productos y/o Servicios a 
			   consumidores de la ciudad para así dar respuesta a Negocios y Emprendimientos locales en cuanto a la 
			   necesidad de poder comercializar dentro del contexto de la Cuarentena Obligatoria.  Uno de los 
			   problemas generados por la misma es el intercambio de dinero, y por otro, el acercamiento entre 
			   personas para las entregas.
			</p>
		</div>
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