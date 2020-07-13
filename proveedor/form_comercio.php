<?php
    // en comercio cambia el procedimiento porque tiene un formulario intermedio (ubicacion)
    // bloque de conexion (buscar para realizarlo en una sola carpeta)
    include_once "php/conexion.php";
    include_once "proveedor.php";

    $licencia = isset($_POST['licencia'])?$_POST['licencia'] : null;

    // inicia la sesion para poder dar uso de las variables
    session_start();
    $submit = isset($_POST['submit'])?$_POST['submit'] : null;
    if($submit!=null){
        // hacemos la comprobacion de licencias/formato logo (usamos metodo de string de parametros para determinar cual es el error)
        //Validacion de la licencia comercial (no puede repetirse)
        $licencias_cargadas = $base->query(
        "SELECT licencia_comercial
        FROM comercio
        WHERE licencia_comercial=$licencia")->fetchAll();
        $parametros = '?';
        $flag = 0;
        if(count($licencias_cargadas)!=0){
            $flag++;
            $parametros = $parametros.'&lc=1';
        }
        // verificamos que exista un logo
        if($_FILES['logo']['size']!=0){
            // verificamos su formato
            if(!verificacionFormatoImagen($_FILES['logo']['type'])){
                $flag++;
                $parametros = $parametros."&nl=1";
            }else{
                $logo=$_FILES['logo'];
            }
        }else{
            $logo = null;
        }

        if($flag!=0){
            // Si los 2 datos cumplen los requisitos (formato logo,unica licencia)
            $comercio = new comercio($_POST['nombre'],
                                    $_POST['licencia'],
                                    $_POST['categ'],
                                    $_POST['website'],
                                    $_POST['mail'],
                                    $_POST['delivery'],
                                    $_POST['descripcion']
                                );

            $_SESSION['comercio'] = serialize($comercio->getComercio());
            if($_FILES['logo']['size']!=0){
                var_dump(move_uploaded_file($_FILES['logo']['tmp_name'],'temp/'.$_FILES['logo']['name']));
                $_SESSION['file_name'] = $_FILES['logo']['name'];
                $_SESSION['file_size'] = $_FILES['logo']['size'];
                $_SESSION['file_type'] = $_FILES['logo']['file_type'];
            }
            header("location: ../form_ubicacion.php");
        }else{
            //algo esta mal, o formato del logo o la licencia ya esta cargada
            header("Location: ?".$parametros);
        }
    }
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
    <!-- <link rel="stylesheet" href="css/style_registro_comercio.css"> -->
<title>Registro proveedor</title>

</head>


<body>
	<main class="main">
		<div class="register_block">
        <form action="?next=1" method="post" enctype="multipart/form-data">
                <div class="header">
                    <h1>Registrate como comercio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <h3>Datos de Comercio</h3>
                        <!-- nombre fantasia  -->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" maxlength="40" required>
                        <!-- logo -->
                        <label for="logo">Logo:</label>
                        <?php if($_GET['nl'] =='1'):?>
                        <font color="#bd2424" size="2px">Formato incorrecto.</font>
                        <?php endif; ?>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png" class="input_editado">
                        <!-- licencia comercial -->
                        <label for="licencia">Licencia comercial</label>
                            <?php if($_GET['lc']=='1'):?>
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
                            <!-- telefono -->
                            <label for="telefono">Telefono:</label>
                            <input type="number" name="telefono" id="telefono" required>
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

                    <input type="submit" name="submit" value="Direccion" onclick="loader()">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
    </main>
    <?php include_once 'php/loader.php' ?>
</body>
</html>