<?php
    // bloque de conexion (buscar para realizarlo en una sola carpeta)
    include_once "php/conexion.php";

    $id = $_GET['id'];
    
    $resultado = $base->query("SELECT *
        FROM categoria_comercio");
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
    
<title>Registro proveedor</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <form action="php/registrar_comercio.php?id=<?php echo($id) ?>" method="post">
                <div class="header">
                    <h1>Registrate como comercio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <h3>Datos de Comercio</h3>
                        <!-- nombre fantasia  -->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" maxlength="40" required>
                        <!-- licencia comercial -->
                        <label for="licencia">Licencia comercial</label>
                        <!-- <?php if($restore_posible=='1'):?>
                            <font color="#bd2424" size="2px">Se cambio la contraseña correctamente!</font>
                        <?php endif; ?>  -->
                        <input type="number" name="licencia" id="licencia" maxlength="30" required>
                        <!-- categoria -->
                        <label for="categ">Categoria</label>
                        <select name="categ" id="categ">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <?php foreach ($resultado as $valor): ?>
                                <option value="<?php echo($valor['id categoria_comercio'])?>"> <?php echo($valor['nombre'])?> </option>
                            <?php endforeach; ?>
                        </select>
                        
                        
                    </div>

                    <div class="columna2">
                        <h3>Datos de Contacto</h3>
                            <!-- website -->
                            <label for="website">Pagina web</label>
                            <input type="text" name="website" id="website" maxlength="40">
                            <!-- mail -->
                            <label for="mail">E-mail</label>
                            <input type="mail" name="mail" id="mail" maxlength="50">
                            <!-- tel -->
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="telefono" maxlength="20" required>

                        <!-- delivery -->
                        <div class="delivery">
                            <input type="checkbox" id="delivery" name="delivery" checked>
                            <label for="delivery">Delivery</label>
                        </div>

                </div>
            <div class="bottom">
                    <!-- descripcion -->
                    <div class="text">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                    </div>

                    <input type="submit" value="Siguiente">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>