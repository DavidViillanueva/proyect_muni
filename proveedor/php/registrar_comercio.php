<?php
    // tomamos las variables del formulario de ubicacion
    $barrio = isset($_POST['barrio'])?$_POST['barrio'] : null;
    $calle = isset($_POST['calle'])?$_POST['calle'] : null;
    $altura = isset($_POST['altura'])?$_POST['altura'] : null;
    $piso = isset($_POST['piso'])?$_POST['piso'] : null;
    $departamento = isset($_POST['dpto'])?$_POST['dpto'] : null;
    

     // inicia la sesion para poder dar uso de las variables
     session_start();
    try{
        include_once ("conexion.php");

        //Validacion de la licencia comercial (no puede repetirse)
        $licencias_cargadas = $base->query(
        "SELECT licencia_comercial 
        FROM comercio 
        WHERE licencia_comercial=$licencia")->fetchAll();

        if(count($licencias_cargadas)==0){
            //En este punto sabemos que no hay ninguna licencia
            $base->beginTransaction();

            //  cargamos al proveedor
            $base->prepare("INSERT INTO poveedor(id_persona,Id_rubro,cuil/cuit,ventas_concretadas,suma_puntaje,status_proveedor,id_estado,productor_local)
                VALUES(:id_persona,:Id_rubro,:cuil/cuit,:ventas_concretadas,:suma_puntaje,:status_proveedor,:id_estado,:productor_local)");
            $base->execute(array(
                ":id_persona"=>$_SESSION['id'],
                ":Id_rubro"=>$_SESSION['rubro'],
                ":cuil/cuit"=>$_SESSION['cuilt'],
                // ventas concretadas hardcodeado a 0 al igual que suma puntaje
                ":ventas_concretadas"=>0,
                ":suma_puntaje"=>0,
                // hardcodeado a 2 que indica status regular
                ":status_proveedor"=>2,
                //estado hardcodeado a 4 que es "En espera"
                ":id_estado"=>4,
                ":productor_local"=>$_SESSION['plocal']
            ));

            $id_proveedor = $base->lastInsertId("proveedor");
            // cargamos la direccion del comercio *hacer las modificaciones en el formulario

            // cargamos al comercio
            $base->prepare("INSERT INTO comercio(id_proveedor,id_domicilio,id_rubro,id_categoria,nombre_comercio,delivery,licencia_comercial,pagina_web,mail,descripcion,telefono_comercial)
                VALUES(:id_proveedor,:id_domicilio,:id_rubro,:id_categoria,:nombre_comercio,:delivery,:licencia_comercial,:pagina_web,:mail,:descripcion,:telefono_comercial)");
            $base->execute(array(
                ":id_proveedor",
                ":id_domicilio",
                ":id_rubro",
                ":id_categoria",
                ":nombre_comercio",
                ":delivery",
                ":licencia_comercial",
                ":pagina_web",
                ":mail",
                ":descripcion",
                ":telefono_comercial"
            ));

            $base->commit();
        }else{
            //Existe una licencia previamente cargada(volvemos con ese parametro lc=licencia cargada)
            header("Location: ../form_comercio.php?lc=1");
        }
        
    }catch(PDOException $ex){
        $base->rollback();
        echo($ex->getMessage());
    }
?>