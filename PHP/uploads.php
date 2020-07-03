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
?>