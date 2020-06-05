<?php
    $id = $_GET['id'];
    $nombre_comercio = $_POST['nombre'];
    $licencia = $_POST['licencia'];
    $id_categoria = $_POST['categ'];
    $descripcion = $_POST['descripcion'];
    $delivery = $_POST['delivery'];
    var_dump($delivery);

    // rubro de productos hardcodeado a 1
    $rubro = 1;
    
    try{
        include_once ("conexion.php");

        //Validacion de la licencia comercial (no puede repetirse)
        $licencias_cargadas = $base->query(
        "SELECT licencia_comercial 
        FROM comercio 
        WHERE licencia_comercial=$licencia")->fetchAll();

        if(count($licencias_cargadas)==0){
            //En este punto sabemos que no hay ninguna licencia
            echo("ninguna licencia cargada");

        }else{
            //Existe una licencia previamente cargada(volvemos con ese parametro lc=licencia cargada)
            header("Location: ../form_comercio.php?lc=1");
        }
        
    }catch(PDOException $ex){
        echo($ex->getMessage());
    }
?>