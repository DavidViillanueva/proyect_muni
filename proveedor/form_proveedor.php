<?php
    include_once "php/conexion.php";
    // $id = $_GET['id'];
    $id = 2;

    // iniciamos la sesion para almacenar las viariables de este formulario antes de pasar al siguiente
    // previo comprobamos que sea una llamada recursiva
    if(isset($_POST['cuilt'])){
        session_start();
        // comprobamos que el cuit ingresado pueda corresponder al usuario
        $result = $base->prepare(
            "SELECT DNI
            FROM persona
            WHERE `id_persona` = :id"
        );
        $result->execute(array(":id"=>$id));
        //obtenemos el array y pedimos solamente el elemento indexado como DNI (fetch assoc nos permite buscar por nombre de campo)
        $dni = $result->fetch(PDO::FETCH_ASSOC)['DNI'];
        //como nos devuelve un string hacemos uso de la funcion pregmatch para ver si el dni esta dentro del cuit/cuil
        // Le agregamos las 2 barras para que el pregmatch busque la coincidencia en todo el string objetivo
        $dni = "/".$dni."/";
        $cuilt = isset($_POST['cuilt']) ? $_POST['cuilt'] : null;
        if(preg_match($dni,$cuilt)){
            // En este punto sabemos que el cuilt puede corresponder al dni ingresado
            // se graban todas las variables
            $_SESSION['cuilt'] = isset($_POST['cuilt'])? $_POST['cuilt']:null;
            $_SESSION['rubro'] = isset($_POST['rubro'])? $_POST['rubro']:null;
            $_SESSION['plocal'] = isset($_POST['plocal'])? $_POST['plocal']:null;
            $_SESSION['id'] = $id;
        
            // se va al siguiente formulario
            header("location: select_type.php");
        }else{
            // el cuil no puede ser del usuario 
            echo("cuil no corresponde");
            header("location: ?cnp=1");
        }
    }

    // variable bandera para filtrar el cuilt
    $cnp = isset($_GET['cnp'])? $_GET['cnp'] :null;
    // consulta para llenar el select de Rubro
    $resultado = $base->query("SELECT *
        FROM rubro");
    $resultado = $resultado->fetchAll();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_registro_proveedor.css">
    
<title>Registro proveedor</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <form action="#" method="post">
                <div class="header">
                    <h1>Registrate como proveedor</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <!-- CUIT/CUIL -->
                        <label for="cuilt">Ingresa tu cuil/cuit</label>
                            <!-- mensaje de error -->
                            <?php if($cnp =='1'):?>
                            <font color="#bd2424" size="2px">El cuil/cuit ingresado no corresponde al DNI!</font>
                            <?php endif; ?>
                        <input type="text" name="cuilt" id="cuilt" required maxlength="20">

                        <label for="rubro">Rubro:</label>
                        <select name="rubro" id="rubro">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <?php foreach ($resultado as $valor): ?>
                                <option value="<?php echo($valor['Id_rubro'])?>"> <?php echo($valor['nombre'])?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="columna2">
                        <div class="plocal">
                            <input type="checkbox" id="plocal" name="plocal" checked>
                            <label for="plocal">Productor local</label>
                        </div>
                        
                    </div>
                </div>
            <div class="bottom">
                    <input type="submit" value="Siguiente">
                    <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>