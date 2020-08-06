<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="icon" href="img2/Logo.png" type="text/png"/>
	<link rel="stylesheet" type="text/css" href="css/estilos_popup.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/comercio.css">
	<link rel="stylesheet" type="text/css" href="css/tabla-comercio.css">
	<link rel="icon" href="img/Logo.png" type="text/png"/>
<title>Comercios</title>
	<script
	  src="https://code.jquery.com/jquery-3.5.0.js"
	  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
	  crossorigin="anonymous">
	</script>
</head>


<body background="img/fondoazul2.png">
	
	<?php include_once('header.php'); ?>
	<main class="main">
		
		<div class="buscador content-select">
		<label>Filtrar por: <br></label>
		<label for="">Categoria:</label>
			<select id="categoria" name="categoria">
				<option value="0">Selecciona una opcion</option>
				<option value="1">America</option>
				<option value="2">Asia</option>
				<option value="3">Europa</option>
				<option value="4">Africa</option>			
			</select>
			<label for="">Barrio:</label>
			<select name="barrio" id="barrio"></select>
			
			<input type="submit" value="Buscar">
		</div>
		<div class="comercio">
				<table class="tabla">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Nombre del Comercio</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Delivery</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="foto" data-label="">lala</td>
							<td data-label="Nombre del comercio">lalala</td>
							<td data-label="Direccion">ksadjfaskyjcvkfjvbdf</td>
							<td data-label="Telefono">54854518</td>
							<td data-label="Delivery">si</td>
						</tr>
						<tr>
							<td class="foto" data-label="">jaja</td>
							<td data-label="Nombre del comercio">jajaja</td>
							<td data-label="Direccion">sdkjfhsa;dfhe</td>
							<td data-label="Telefono">8548185181</td>
							<td data-label="Delivery">no</td>
						</tr>
					</tbody>
				</table>
			</div>
	</main>
	<div>
		<?php include_once('footer.php'); ?>
  	</div>
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
