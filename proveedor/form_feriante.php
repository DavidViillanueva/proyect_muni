<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
<title>Registro proveedor</title>

</head>


<body>
	<main class="main">
		<div class="register_block">
        <form action="php/registrar_feriante.php" method="post" enctype="multipart/form-data">
                <div class="header">
                    <h1>Registrate como feriante</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <!-- nombre -->
                        <label for="nombre">Nombre de su emprendimiento</label>
                        <input type="text" name="nombre" id="nombre" maxlength=40>
                        <!-- imagenes -->
                        <label for="images">Imagenes productos</label>
                        <?php if($_GET['nf'] =='1'):?>
                        <font color="#bd2424" size="2px">Maximo 5 Imagenes excedido o formato incorrecto.</font>
                        <?php endif; ?>
                        <input type="file" multiple="" accept="image/jpg,image/jpeg,image/png" name="images[]" class="input_editado">
                        <font color="#3d3d3d" size="2px">Maximo 5 imagenes!</font>
                    </div>

                    <div class="columna2">
                        <!-- logo -->
                        <label for="logo">Logo:</label>
                        <?php if($_GET['nl'] =='1'):?>
                        <font color="#bd2424" size="2px">Formato incorrecto.</font>
                        <?php endif; ?>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png" class="input_editado">
                        <!-- descripcion -->
                        <div class="text">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                        </div>
                    </div>

                </div>
            <div class="bottom">
                    <input type="submit" id="submit" name="submit" value="Siguiente" onclick="loader()">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
    </main>
    <?php include_once 'php/loader.php'?>
</body>
</html>