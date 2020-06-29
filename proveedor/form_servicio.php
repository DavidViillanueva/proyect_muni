<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_registro_comercio.css">

<title>Registro proveedor</title>


</head>


<body>
	<main class="main">
		<div class="register_block">
        <form action="select_type.php" method="post">
                <div class="header">
                    <h1>Registrate como proveedor de servicio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <h3>Datos</h3>
                        <!-- nombre fantasia  -->
                        <label for="nombre">Nombre de fantasia</label>
                        <input type="text" name="nombre" id="nombre" maxlength="30" requiered>
                        <!-- logo -->
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png">
                        <!-- licencia comercial -->
                        <label for="licencia">Matricula</label>
                        <input type="number" name="licencia" id="licencia" maxlength="20">

                        <!-- categoria -->
                        <label for="categ_servicio">Categoria</label>
                        <select name="categ_servicio" id="categ_servicio">
                            <!-- cargar por php foreach de la tabla categoria_servicio-->
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="columna2">
                        <h3>Datos de Contacto</h3>
                        <!-- tel -->
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" maxlength="20">
                        <!-- descripcion -->
                        <div class="text">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                        </div>
                        <!-- logo -->
                        <label for="images">Imagenes productos</label>
                        <?php if($nf =='1'):?>
                        <font color="#bd2424" size="2px">Maximo 5 Imagenes excedido o formato incorrecto.</font>
                        <?php endif; ?>
                        <font color="#3d3d3d" size="2px">Maximo 5 imagenes!</font>
                        <input type="file" multiple="" accept="image/jpg,image/jpeg,image/png" name="images[]">
                        <br>
                    </div>
                </div>
            <div class="bottom">
                    <input type="submit" value="Siguiente">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>