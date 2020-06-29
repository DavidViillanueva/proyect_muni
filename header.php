<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/style-menu.css">
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
					<li><a href="">Galeria</a></li>
					<li><a href="">Comercios</a></li>
					<li><a id="btn-abrir-popup" class="btn-abrir-popup" href="#">login</i></a></li>
				</ul>
			</nav>
		</div>
	</header>
	<script src="javascript/menu-nav.js"></script>
    <script src="javascript/menu.js"></script>
    <?php include_once('login.php');?>
</body>
</html>