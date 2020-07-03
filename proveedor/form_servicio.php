<?php
    include_once('php/conexion.php');
    // Consulta para llegar el select de categorias
    $resultado = $base->query("SELECT *
        FROM categoria_servicio");
    $resultado = $resultado->fetchAll();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_registro_comercio.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .overlay{
            background: rgba(0,0,0,.3);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            align-items: center;
            justify-content: center;
            display: none;
            /* visibility: hidden; */
        }
        .loader{
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
        }
    </style>
<title>Registro proveedor</title>
    <script type="text/javascript">
        function loader(){
            var loader = document.getElementById("overlay");
            loader.style.display= "block";
        }
    </script>
</head>
<body>
	<main class="main">
		<div class="register_block">
        <form action="php/registrar_servicio.php" method="post" enctype="multipart/form-data">
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
                        <?php if($_GET['nl'] =='1'):?>
                        <font color="#bd2424" size="2px">Formato incorrecto.</font>
                        <?php endif; ?>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png">
                        <!-- matricula -->
                        <label for="matricula">Matricula</label>
                        <input type="number" name="matricula" id="matricula" maxlength="20">

                        <!-- categoria -->
                        <label for="categ_servicio">Categoria</label>
                        <select name="categ_servicio" id="categ_servicio">
                            <?php foreach ($resultado as $valor): ?>
                                <option value="<?php echo($valor['id_categoria_servicio'])?>"> <?php echo($valor['nombre'])?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="columna2">
                        <h3>Datos del Servicio</h3>
                        <!-- descripcion -->
                        <div class="text">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                        </div>
                        <!-- fotos -->
                        <label for="images">Fotos:</label>
                        <?php if($_GET['nf'] =='1'):?>
                        <font color="#bd2424" size="2px">Maximo 5 Imagenes excedido o formato incorrecto.</font>
                        <?php else: ?>
                        <font color="#3d3d3d" size="2px">Maximo 5 imagenes!</font>
                        <?php endif; ?>
                        <input type="file" multiple="" accept="image/jpg,image/jpeg,image/png" name="fotos[]">
                        <br>
                    </div>
                </div>
            <div class="bottom">
                    <input type="submit" id="submit" name="submit" value="Siguiente" onClick="loader()">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
    </main>
    <div class="overlay" id="overlay">
        <div class="loader" id="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</body>
</html>