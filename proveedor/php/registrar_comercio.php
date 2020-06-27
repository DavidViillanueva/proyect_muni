<?php
    include_once "conexion.php";
    // tomamos las variables del formulario de ubicacion
    $barrio = isset($_POST['barrio'])?$_POST['barrio'] : null;
    $calle = isset($_POST['calle'])?$_POST['calle'] : null;
    $altura = isset($_POST['altura'])?$_POST['altura'] : null;
    $piso = isset($_POST['piso'])?$_POST['piso'] : null;
    $departamento = isset($_POST['dpto'])?$_POST['dpto'] : null;

    $localidad = isset($_POST['localidad'])?$_POST['localidad']:null;
    // obtenemos el id de la localidad
    $id_localidad = (int)$base->query("SELECT id_localidad
                                       FROM localidad
                                       WHERE nombre = '$localidad'")->fetch(PDO::FETCH_ASSOC)['id_localidad'];
    session_start();
    $proveedor = unserialize($_SESSION['proveedor']);

    $comercio = unserialize($_SESSION['comercio']);
    // los campos checkbox vienen con on, hay que pasarlo a 1 o 0 segn corresponda por tipo de dato en bd
    if(preg_match("/on/",$proveedor['plocal'])){
        $proveedor['plocal'] = 1;
    }else{
        $proveedor['plocal'] = 0;
    }
    if(preg_match("/on/",$comercio['delivery'])){
        $comercio['delivery'] = 1;
    }else{
        $comercio['delivery'] = 0;
    }
    // ya tenemos todos los dats que necesitamos
    try{
        // la licencia ya fue validada igual que el cuit/cuil
        $base->beginTransaction();
        // cargamos al proveedor
        $dbq=$base->prepare("INSERT INTO proveedor(id_persona,Id_rubro,cuil_cuit,ventas_concretadas,suma_puntaje,status_proveedor,id_estado,productor_local)
            VALUES(:id_persona,:Id_rubro,:cuil_cuit,:ventas_concretadas,:suma_puntaje,:status_proveedor,:id_estado,:productor_local)");
        $dbq->execute(array(
            ":id_persona"=>(int)$proveedor['id_usuario'],
            ":Id_rubro"=>(int)$proveedor['rubro'],
            ":cuil_cuit"=>(int)$proveedor['cuilt'],
            // ventas concretadas hardcodeado a 0 al igual que suma puntaje
            ":ventas_concretadas"=>0,
            ":suma_puntaje"=>0,
            // hardcodeado a 2 que indica status regular
            ":status_proveedor"=>2,
            //estado hardcodeado a 4 que es "En espera"
            ":id_estado"=>4,
            ":productor_local"=>$proveedor['plocal']
        ));
        // obtenemos el id del proveedor cargado
        $id_proveedor = $base->lastInsertId();
        // cargamos la direccion del comercio
        $dbq = $base->prepare("INSERT INTO domicilio(id_localidad,barrio,calle,altura,piso,departamento)
            VALUES(:id_localidad,:barrio,:calle,:altura,:piso,:departamento)");
        $dbq->execute(array(
            ":id_localidad"=>(int)$id_localidad,
            ":barrio"=>strtoupper($barrio),
            ":calle"=>strtoupper($calle),
            ":altura"=>(int)$altura,
            ":piso"=>(int)$piso,
            ":departamento"=>strtoupper($departamento)
        ));
        // obtenemos el id del domicilio cargado
        $id_domicilio = $base->lastInsertId();
        // cargamos al comercio
        $dbq = $base->prepare("INSERT INTO comercio(id_proveedor,id_domicilio,id_categoria,nombre_comercio,delivery,licencia_comercial,pagina_web,mail,descripcion)
            VALUES(:id_proveedor,:id_domicilio,:id_categoria,:nombre_comercio,:delivery,:licencia_comercial,:pagina_web,:mail,:descripcion)");
        $dbq->execute(array(
            ":id_proveedor"=>(int)$id_proveedor,
            ":id_domicilio"=>(int)$id_domicilio,
            ":id_categoria"=>(int)$comercio['categoria'],
            ":nombre_comercio"=>strtoupper($comercio['nombre']),
            ":delivery"=>(int)$comercio['delivery'],
            ":licencia_comercial"=>(int)$comercio['licencia'],
            ":pagina_web"=>strtoupper($comercio['website']),
            ":mail"=>strtoupper($comercio['mail']),
            ":descripcion"=>strtoupper($comercio['descripcion']),
        ));
        $base->commit();
        session_unset('comercio');
        session_unset('proveedor');
    }catch(PDOException $ex){
        $base->rollback();
        echo($ex->getMessage());
    }
?>