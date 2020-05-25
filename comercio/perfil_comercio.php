<?php 
    include_once "../Google Maps/searchMaps.php";
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
    <link rel="stylesheet" type="text/css" href="../CSS/estilos_popup.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style-menu.css">
    <link rel="stylesheet" type="text/css" href="css/style_comercio.css">

	<link rel="icon" href="Logo.png" type="../img/text/png"/>

	

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="javascript/menu_tabs.js"></script>

    <!-- se deja por la animacion del toggle -->
    <script src="../javascript/menu.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../javascript/menu-nav.js"></script> 
    
	<link rel="icon" href="Logo.png" type="img/Logo.png"/>

    
<title>Compra venta Zapala</title>
	
	
</head>

<body>	
	<header>
        <div class="contenedor">
            <div class="logo"></div>
            
            <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
                <div class="hamburger"></div>
            </div>
            
            <nav class="navegador" id="navegador" onClick="cambiarClase()">
				<ul>
					<li><a href="Indexs.php">Inicio</i> </menu-icon></a></li>
					<li><a href="HTML/galeria.html">Galeria</a></li>
					<li><a href="comercios.php">Comercios</a></li>
					<li><a id="btn-abrir-popup" class="btn-abrir-popup" href="#">login</i></a></li>
					<li><a href="#">Buscar</a></li>
				</ul>
			</nav>
		</div>
	</header>
	
    
    <main class="profile">
		<div class="cuerpo">
            <!-- imagen user -->
            <div class="user">
                <img class="icon-shop" src="../img/profile-default.jpg" alt="">
            </div>
            <!-- menu por tabs -->
            <div class="wrap">
                <ul class="tabs">
                    <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Descripcion</span></a></li>
                    <li><a href="#tab2"><span><i class="fas fa-map-marker-alt"></i></span><span class="tab-text">Ubicacion</span></a></li>
                    <li><a href="#tab3"><span><i class="fas fa-hashtag"></i></span><span class="tab-text">Redes</span></a></li>
                    <li><a href="#tab4"><span><i class="far fa-images"></i></span><span class="tab-text">Fotos</span></a></li>
                </ul>

                <div class="secciones">
                    <article id="tab1">
                        <h1><?php echo $nombre_proveedor ?></h1>
                        <p><?php echo $descripcion ?></p>
                        <img src="../img/logozapala.png" alt="">
                    </article>
                    <article id="tab2">
                        <h1>Ubicanos</h1>
                        <div class="map" id="map">
                        <iframe src="../Google Maps/map.php" width="100%" height="800px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe>

                        </div>
                    </article>
                    <article id="tab3">
                        <h1>Nuestras Redes</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum suscipit aliquam consequatur aspernatur, nulla sed veritatis natus omnis voluptate modi pariatur, error commodi consequuntur exercitationem obcaecati ex corporis facilis vel?</p>
                        <div class="socials">
                            <div class="face"><a href="#"><i class="fab fa-facebook icon"></i></a></div>
                            <div class="mail"><a href="#"><i class="far fa-envelope icon"></i></a></div>
                            <div class="cel"><a href="#"><i class="fab fa-whatsapp icon"></i>2942-123456</a></div>
                        </div>
                    </article>
                    <article id="tab4">
                        <h1>Galeria</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ratione minus dolorem delectus, beatae aliquid deleniti amet, ut itaque alias harum veniam eveniet atque? Ut non culpa quidem itaque facere.</p>
                        <div class="imagen">
                            <img src="../img/logozapala.png" alt="">
                        </div>
                    </article>
                </div>
	        </div>
        </div>

        <aside>
            <h1>Categorias</h1>
            <nav class="categorias" id="navegador">
				<ul>
					<li><a href="#">Categoria 1</a></li>
					<li><a href="#">Categoria 2</a></li>
					<li><a href="#">Categoria 3</a></li>
					<li><a href="#">Categoria 4</a></li>
					<li><a href="#">Categoria 5</a></li>
				</ul>
			</nav>
        </aside>
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

    <!-- footer -->
	<div class="footer">
        <div class="content">
            <div class="logo">
                <img class="logo2" src="../img/logo-gris.png"> 
            </div>
            
            <div class="links">
                <h4>Links Relacionados</h4>
                <ul>
                    <li><a href="../indexs.php">Inicio</a></li>
                    <li><a href="#">Buscar</a></li>
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