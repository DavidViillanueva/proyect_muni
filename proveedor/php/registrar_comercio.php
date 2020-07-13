<?php
    include_once 'conexion.php';
    include_once '../proveedor.php';
    include_once '../../PHP/uploads.php';
    session_start();
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

    $proveedor = unserialize($_SESSION['proveedor']);
    $comercio = unserialize($_SESSION['comercio']);
    // ya tenemos todos los dats que necesitamos
    try{
        // la licencia ya fue validada igual que el cuit/cuil
        $base->beginTransaction();
        // cargamos al proveedor
        $prov = new proveedor($proveedor['cuilt'],$proveedor['rubro'],$proveedor['plocal'],$proveedor['id_usuario']);
        $id_proveedor = $prov->uploadProveedor($base);
        // cargamos la direccion del comercio
        $id_domicilio = uploadAdress($base,$id_localidad,$barrio,$calle,$altura,$piso,$departamento);
        // cargamos al comercio
        $comer = new comercio($comercio['nombre'],$comercio['licencia'],$comercio['categoria'],$comercio['website'],$comercio['mail'],$comercio['delivery'],$comercio['descripcion']);
        $id_comercio = $comer->uploadComercio($base,$id_proveedor,$id_domicilio);

        // lectura del logo copiado a temp
        $fp = fopen('../temp/'.$_SESSION['file_name'],'r');
        $dato = fread($fp,$_SESSION['file_size']);
        fclose($fp);
        if($dato){
            // cargamos el logo del comercio
            uploadLogo($base,'logo_comercio','id_logo_comercio',$id_comercio,$dato,$_SESSION['file_type']);
            // unlink para borrar el archivo
            unlink('../temp/'.$_SESSION['file_name']);
        }
        $base->commit();
        session_unset('comercio');
        session_unset('proveedor');
        session_unset('file_size');
        session_unset('file_name');
        session_unset('file_type');
        header('location: listo.php');
    }catch(PDOException $ex){
        $base->rollback();
        echo($ex->getMessage());
    }
?>