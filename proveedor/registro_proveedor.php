<?php
    $cuilt = $_POST['cuilt'];
    $pro_local = isset($_POST['plocal']);
    $id = (int)$_GET['id'];
    $status = "neutral";
    $rubro = isset($_POST['rubro']);
    $estado = 0;
    //verificamos que el dni este dentro del cuilt ingresado, para ello sacamos el dni por el id
    include_once("php/conexion.php");
    $result = $base->prepare(
        "SELECT DNI
        FROM persona
        WHERE `id persona` = :id"
    );
    $result->execute(array(":id"=>$id));

    //obtenemos el array y pedimos solamente el elemento indexado como DNI (fetch assoc nos permite buscar por nombre de campo)
    $dni = $result->fetch(PDO::FETCH_ASSOC)['DNI'];
    //como nos devuelve un string hacemos uso de la funcion pregmatch para ver si el dni esta dentro del cuit/cuil

    // Le agregamos las 2 barras para que el pregmatch busque la coincidencia en todo el string objetivo
    $dni = "/".$dni."/";
    if(preg_match($dni,$cuilt)){
        // En este punto sabemos que el cuilt puede corresponder al dni ingresado

        // Ya estamos con los datos necesarios para cargar un proveedor, pero solo lo enviaremos al otro formulario con los datos
        
    }else{
        // el cuilt ingresado no coincide con el dni del usuario
    }
?>