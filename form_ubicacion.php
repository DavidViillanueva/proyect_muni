<?php
    include_once("proveedor/php/conexion.php");
    $provincias = $base->query("SELECT nombre,id_provincia
                            FROM provincia")->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="CSS/style_register.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>

    <title>Registro proveedor</title>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#provincia').val(1);
		recargarLista();

		$('#provincia').change(function(){
			recargarLista();
		});
	})
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $('#cargando').css("display", "inline");
            $.ajax({
                type:"POST",
                url:"recarga_localidades.php",
                data:"provincia=" + $('#provincia').val(),
                success:function(r){
                    $('#cargando').css("display", "none");
                    $('#local').html(r);
                }
            });
        }
    </script>
</head>


<body>
    <main class="main">
        <div class="register_block">
        <form action="proveedor/php/registrar_comercio.php" method="post">
                <div class="header">
                    <h1>Registrate como comercio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <div class="ubicacion">
                            <!-- direccion -->
                            <h3>Datos de ubicacion</h3>
                            <!-- dejamos el mismo nombre por el css -->
                            <div class="localidad">
                                <label for="provin">Provincia</label>
                                <input list="provin" name="provincia" id="provincia">
                                <datalist id="provin">
                                    <?php foreach($provincias as $valor): ?>
                                    <option value="<?php echo(addslashes($valor['nombre'])) ?>" ><?= $valor['id_provincia'] ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                            <div class="localidad_carga" style="display:flex;">
                                <div class="localidad" id="local"></div>
                                <div id="cargando" style="display:block;"><img src="img/ajax-loader.gif" alt="" srcset=""></div>
                            </div>




                            <label for="text">Barrio:</label>
                            <input type="text" name="barrio" id="barrio" autocomplete=off maxlength="20">
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
                </div>
            <div class="bottom">
                    <input type="submit" -value="Siguiente">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
       </div>
    </main>
</body>
</html>

