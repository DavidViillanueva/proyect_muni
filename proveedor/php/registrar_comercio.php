<?php
    include_once 'conexion.php';
    include_once '../proveedor.php';
    include_once '../../PHP/uploads.php';
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
        $prov = new proveedor($proveedor['cuilt'],$proveedor['rubro'],$proveedor['plocal'],$proveedor['id_usuario']);
        $id_proveedor = $prov->uploadProveedor($base);
        // cargamos la direccion del comercio
        $id_domicilio = uploadAdress($base,$id_localidad,$barrio,$calle,$altura,$piso,$departamento);
        var_dump($id_domicilio);
        // $dbq = $base->prepare("INSERT INTO domicilio(id_localidad,barrio,calle,altura,piso,departamento)
        //     VALUES(:id_localidad,:barrio,:calle,:altura,:piso,:departamento)");
        // $dbq->execute(array(
        //     ":id_localidad"=>(int)$id_localidad,
        //     ":barrio"=>strtoupper($barrio),
        //     ":calle"=>strtoupper($calle),
        //     ":altura"=>(int)$altura,
        //     ":piso"=>(int)$piso,
        //     ":departamento"=>strtoupper($departamento)
        // ));
        // // obtenemos el id del domicilio cargado
        // $id_domicilio = $base->lastInsertId();
        // cargamos al comercio
        $comer = new comercio($comercio['nombre'],$comercio['licencia'],$comercio['categoria'],$comercio['website'],$comercio['mail'],$comercio['delivery'],$comercio['descripcion']);
        var_dump($comer->uploadComercio($base,$id_proveedor,$id_domicilio));
        // $dbq = $base->prepare("INSERT INTO comercio(id_proveedor,id_domicilio,id_categoria,nombre_comercio,delivery,licencia_comercial,pagina_web,mail,descripcion)
        //     VALUES(:id_proveedor,:id_domicilio,:id_categoria,:nombre_comercio,:delivery,:licencia_comercial,:pagina_web,:mail,:descripcion)");
        // $dbq->execute(array(
        //     ":id_proveedor"=>(int)$id_proveedor,
        //     ":id_domicilio"=>(int)$id_domicilio,
        //     ":id_categoria"=>(int)$comercio['categoria'],
        //     ":nombre_comercio"=>strtoupper($comercio['nombre']),
        //     ":delivery"=>(int)$comercio['delivery'],
        //     ":licencia_comercial"=>(int)$comercio['licencia'],
        //     ":pagina_web"=>strtoupper($comercio['website']),
        //     ":mail"=>strtoupper($comercio['mail']),
        //     ":descripcion"=>strtoupper($comercio['descripcion']),
        // ));
        $base->commit();
        session_unset('comercio');
        session_unset('proveedor');
        header('location: listo.php');
    }catch(PDOException $ex){
        $base->rollback();
        echo($ex->getMessage());
    }
?>