<?php
    // bloque de conexion (buscar para realizarlo en una sola carpeta)
    include_once "php/conexion.php";

    $licencia = isset($_POST['licencia'])?$_POST['licencia'] : null;

    // inicia la sesion para poder dar uso de las variables
    session_start();
    //si tenemos el paarametro next quiere decir que debemos ir a buscar el dato faltante de la direccion
    if(isset($_GET['next'])){
        $next = $_GET['next'];
        if($next == "1"){
            // hacemos la comprobacion de licencias en este punto
            //Validacion de la licencia comercial (no puede repetirse)
            $licencias_cargadas = $base->query(
            "SELECT licencia_comercial
            FROM comercio
            WHERE licencia_comercial=$licencia")->fetchAll();

            if(count($licencias_cargadas)==0){
                // en este punto se hizo click en el "boton" next
                include_once "proveedor.php";
                $comercio = new comercio($_POST['nombre'],
                                        $_POST['licencia'],
                                        $_POST['categ'],
                                        $_POST['website'],
                                        $_POST['mail'],
                                        $_POST['delivery'],
                                        $_POST['descripcion']
                                    );

                $_SESSION['comercio'] = serialize($comercio->getComercio());
                header("location: ../form_ubicacion.php");
            }else{
                //Existe una licencia previamente cargada(volvemos con ese parametro lc=licencia cargada)
                header("Location: ?lc=1");
            }
        }
    }

    // vemos si la licencia retorna con problemas de registrar_comercio.php
    $lc = isset($_GET['lc'])? $_GET['lc'] : null;

    // consulta para llenar el cuadro de opciones
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
        <form action="?next=1" method="post">
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
                            <?php if($lc=='1'):?>
                            <font color="#bd2424" size="2px">La licencia ya fue cargada!</font>
                            <?php endif; ?>
                        <input type="number" name="licencia" id="licencia" maxlength="30" required>
                        <!-- categoria -->
                        <label for="categ">Categoria</label>
                        <select name="categ" id="categ">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <?php foreach ($resultado as $valor): ?>
                                <option value="<?php echo($valor['id_categoria_comercio'])?>"> <?php echo($valor['nombre'])?> </option>
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

                    <input type="submit" value="Direccion">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>