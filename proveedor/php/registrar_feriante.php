<?php
    include_once "conexion.php";
    session_start();
    // contamos con todos los datos de proveedor y imagenes por sesion
    //la variable de session provedor viene serializada al ser un array
    $proveedor = unserialize($_SESSION['proveedor']);

    // los campos checkbox vienen con on, hay que pasarlo a 1 o 0 segn corresponda por tipo de dato en bd
    if(preg_match("/on/",$proveedor['plocal'])){
        $proveedor['plocal'] = 1;
    }else{
        $proveedor['plocal'] = 0;
    }

    try{
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
        // cargamos el feriante
        $dbq = $base->prepare("INSERT INTO feriante(id_proveedor,descripcion,nombre)
                VALUES(:id_proveedor,:descripcion,:nombre)");
        $dbq->execute(array(
            ":id_proveedor"=>$id_proveedor,
            ":descripcion"=>strtoupper($_SESSION['descripcion']),
            ":nombre"=>strtoupper($_SESSION['nombre'])
        ));
        // obtenemos el id del feriante cargado
        $id_feriante = $base->lastInsertId();
        // cargamos las imagenes
        $files_post = $_SESSION['images']; //vienen las imagenes todos los nombres en 0, todos los tipos en 1 etc
        $imagenes= array(); //un array para separar los datos de las imagenes por un indice a cada una
        $files_count = count($files_post['name']);
        $file_key = array_keys($files_post); //devuelve las claves de cada valor del array
        for($i=0;$i<$files_count;$i++){
            foreach($file_key as $key){
                $imagenes[$i][$key] = $files_post[$key][$i];
            }
        }
        // en este punto recien tenemos las x imagenes ordenadas en $imagenes
        $data = array();
        for($i=0;$i<$files_count;$i++){
            $fp = fopen($imagenes[$i]['tmp_name'],'r');
            $data[$i] = fread($fp,$imagenes[$i]['size']);
            //en data[] quedan los binarios de cada archivo subido
            fclose($fp);
        }
        for($i=0;$i<$files_count;$i++){
            $dbq = $base->prepare("INSERT INTO imagenes_feriante(id_feriante,imagen,tipo_imagen)
                    VALUES(:id_feriante,:imagen,:tipo_imagen)");
            $dbq->execute(array(
                ":id_feriante"=>$id_feriante,
                ":imagen"=>$data[$i],
                ":tipo_imagen"=>$imagenes[$i]['type']
            ));
        }
        echo("bien");
        $base->commit();
        session_unset('proveedor');
        session_unset('descripcion');
        session_unset('nombre');
    }catch(PDOException $ex){
        $base->rollback();
        echo("mal");
        echo($ex->getMessage());
    }
?>