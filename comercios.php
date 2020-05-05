<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
	<link rel="icon" href="img2/Logo.png" type="text/png"/>
<title>Comercios</title>
	<script
	  src="https://code.jquery.com/jquery-3.5.0.js"
	  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
	  crossorigin="anonymous">
	</script>
</head>


<body>
	
	<header class="header">
		
		 <div class="contenedor logo_nav_contenedor">
			<img src="img/logozapala.png">
			 <span class="menu-icon">Ver Menu</span>
			<nav class="navegador">
				<ul>
					<li><a href="Indexs.php">Inicio</a></li>
					<li><a href="../HTML/galeria.html">Galeria</a></li>
					<li><a href="comercios.php">Comercios</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="registrarse.php">Registrate</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main class="main content-select">
		
		<div class="buscador">
		<label>Buscar por:</label>
			<select id="lista1" name="lista1">
				<option value="0">Selecciona una opcion</option>
				<option value="1">America</option>
				<option value="2">Asia</option>
				<option value="3">Europa</option>
				<option value="4">Africa</option>			
			</select>
			
			<div id="select2lista"></div>
			
				<input type="submit" value="Buscar">
		</div>
		<table>
			<tr>
				<th>Comercio</th>
				<th>Rubro</th>
				<th>Barrio</th>
				<th>Horarios</th>
				<th>Telefono</th>
				<th>Mail</th>
				<th>Mercado Pago</th>
        	</tr>
		</table>
	</main>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"continente=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>
