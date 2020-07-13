<?php
    function  uploadAdress(PDO $db,$id_localidad,$barrio,$calle,$altura,$piso,$departamento){
        // -------------------------------------------------------------------------------
        //     Funcion       : uploadAdress
        //     Descripcion   : permite subir a una base de datos dada con la tabla correspondiente una direccion
        //     Formato tabla:
        //                                |id_localidad|barrio|calle|altura|piso|departamento|
        //
        //     Entrada       :  $db-objeto de conexion tipo PDO
        //     Salida        : devuelve el id del domicilio cargado en caso correcto, en caso contrario retorna false
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 30/06/2020
        // -------------------------------------------------------------------------------
        if($db!=null){
            if(empty($piso)){}
                $piso = NULL;
            if(empty($departamento))
                $departamento = NULL;
            $dbq = $db->prepare("INSERT INTO domicilio(id_localidad,barrio,calle,altura,piso,departamento)
                VALUES(:id_localidad,:barrio,:calle,:altura,:piso,:departamento)");
            $dbq->execute(array(
                ":id_localidad"=>$id_localidad,
                ":barrio"=>strtoupper($barrio),
                ":calle"=>strtoupper($calle),
                ":altura"=>$altura,
                ":piso"=>$piso,
                ":departamento"=>strtoupper($departamento)
            ));
            // obtenemos el id del domicilio cargado
            return $db->lastInsertId();
        }else{
            return false;
        }
    }

    function uploadLogo(PDO $db,$nombre_tabla,$nombre_campo_propietario,$id_propietario,$archivo_bin,$tipo_archivo){
        // -------------------------------------------------------------------------------
        //     Funcion       : uploadLogo
        //     Descripcion   : permite subir a una base de datos dada con la tabla correspondiente una imagen tipo logo
        //     Formato tabla:
        //                                |id_logo|$nombre_campo_propietario|imagen|tipo_imagen|
        //
        //     Entrada       :  $db-objeto de conexion tipo PDO
        //                      $nombre_campo_propietario- nombre del campo al que se le asigna el id
        //                      $id_propietario-valor que se ingresa en el campo de nombre campo propietario
        //     Salida        : devuelve el id del logo cargado, en caso contrario retorna false
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 03/06/2020
        // -------------------------------------------------------------------------------
        if($db !=null){
            try{
                $sql = 'INSERT INTO '.$nombre_tabla.' ('.$nombre_campo_propietario.',imagen,tipo_imagen) VALUES
                        (:'.$nombre_campo_propietario.',:imagen,:tipo_imagen)';
                $dbq = $db->prepare($sql);
                $dbq->execute(array(
                    ":".$nombre_campo_propietario=>$id_propietario,
                    ":imagen"=>$archivo_bin,
                    ":tipo_imagen"=>$tipo_archivo
                ));
            }catch(PDOException $ex){
                echo 'uploadLogo Error: '.$ex->getMessage();
            }
            return $db->lastInsertId();
        }else{
            echo 'base de datos nula (upload Logo)';
            return false;
        }
    }
?>