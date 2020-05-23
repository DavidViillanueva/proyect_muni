<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
    <link rel="stylesheet" type="text/css" href="../CSS/estilos_popup.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style-menu.css">
    <link rel="stylesheet" type="text/css" href="css/style_user.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/menu_tabs.js"></script>

    <!-- se deja por la animacion del toggle -->
    <script src="../javascript/menu.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../javascript/menu-nav.js"></script> 
    
	<link rel="icon" href="../img/Logo.png" type="img/Logo.png"/>


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
					<li><a href="../Indexs.php">Inicio</i> </menu-icon></a></li>
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
                    <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Editar Perfil</span></a></li>
                    <li><a href="#tab2"><span><i class="fas fa-map-marker-alt"></i></span><span class="tab-text">Comercios</span></a></li>
                </ul>

                <div class="secciones">
                    <article id="tab1">
                        <p>Espacio para la edicion de los datos personales del usuario</p>
                    </article>
                    <article id="tab2">
                        <p>espacio para los comercios de dicho usuario (con opcion a editar/bajar/subir</p>
                    </article>
                </div>
	        </div>
        </div>

        <aside>
            <p>No se si poner categorias aca, no se que se puede poner</p>
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
                <a href="#"><img src="../img/facebook-1.png" alt=""></a>
            </div>

        </div>
	</div>
	
</body>
</html>