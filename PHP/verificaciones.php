<?php
    // Para validacion y verificacion de datos
    function validacion($dni,$validador){
        // -------------------------------------------------------------------------------
        //     Funcion       : validacion
        //     Descripcion   : funcion interna para validar el dni mas los 2 primeros valores del cuit frente al ultimo (validador)
        //     Entrada       :  $dni int de 10 numeros xx-dni
        //                      $validador validador obtenido del cuil cuit ingresado, se recalculara y comparara
        //     Salida        : return false si es validador no corresponde a los otros 10 numeros, true caso contrario
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 24/06/2020
        // -------------------------------------------------------------------------------
        $dni_array = array();
        $dni_array = str_split($dni);
        $multiplicador = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
        $suma = 0;
        for($i=0;$i<count($dni_array);$i++){
            $suma += $multiplicador[$i] * (int)$dni_array[$i];
        }
        $resto = $suma%11;
        if($resto==0){
            $nuevo_validador = 0;
        }elseif($resto==1){
            if(substr($dni_array,0,2)=="27"){
                // si es mujer
                $nuevo_validador = 4;
            }elseif(substr($dni_array,0,2)=="23"){
                $nuevo_validador = 9;
            }
        }else{
            $nuevo_validador = 11-$resto;
        }
        if($nuevo_validador==$validador){
            return true;
        }else{
            return false;
        }
    }
    function verificacionCuilCuit($cuilt){
        // -------------------------------------------------------------------------------
        //     Funcion       : verificacionCuilCuit
        //     Descripcion   : permite determinar si un cuil/cuit ingresado es valido o no, en base a la reconstruccion del mismo
        //                      y comparacion con el numero validador, hace uso de la funcion "validacion"
        //     Entrada       :  $cuilt- cuil o cuil ingresado para validar
        //     Salida        : retorna true en caso de que sea valido, false en caso de que sea invalido
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 24/06/2020
        // -------------------------------------------------------------------------------
        $cuilt_array = array();
        $cuilt_array = str_split($cuilt);
        if(count($cuilt_array)==11){
            // el cuit/cuil coincide con el largo, hay que obtener un substring que tenga el dni
            // el formato es XY-DNI-CV (cv codigo verificador) xy-123456789-z
            $dni = substr($cuilt,0,-1);
            $cv = substr($cuilt,-1);
            if(validacion($dni,$cv))
                return true;
            else
                return false;
        }else{
            return false;
        }
    }

    function verificacionImagenes (&$arrayImagenes,$cantPermitida){
        // -------------------------------------------------------------------------------
        //     Funcion       : verificacion Imagenes
        //     Descripcion   : permite verificar que un array de varias imagenes, la cantidad no exceda la indicada
        //     Entrada       :  $arrayImagenes-Arreglo de imagenes obtenidas por metodo $_FILES
        //                      $cantPermitida-La cantidad de imagenes permitidas
        //     Salida        : devuelve true en caso de no se exceda la cantidad permitida
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 28/06/2020
        // -------------------------------------------------------------------------------

        // en caso de que el tamaño en el indice 0 sea igual a 0 quiere decir que el
        // arreglo este vacio, se genera igual
        if($arrayImagenes['size'][0]==0){
            return true;
        }
        if(count($arrayImagenes["name"])>$cantPermitida)
            return false;
        $flag=0;
        for($x=0;$x<count($arrayImagenes['type']);$x++){
            if(!verificacionFormatoImagen($arrayImagenes['type'][$x]))
                $flag++;
        }
        if($flag==0)
            return true;
        else
            return false;
    }

    function verificacionFormatoImagen($imagen){
        // -------------------------------------------------------------------------------
        //     Funcion       : verificacionFormatoImagenes
        //     Descripcion   : permite verificar que una imagen dada, sea efectivamente una imagen en base a tipos MIME
        //     Entrada       :  $imagen-la imagen obtenida por metodo $_FILES (array)
        //     Salida        : devuelve true en caso de que sea una imagen, false en caso de que no corresponda
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 29/06/2020
        // -------------------------------------------------------------------------------
        $permitidos = array("image/jpg", "image/jpeg", "image/png");
        if(!in_array($imagen,$permitidos))
            return false;
        return true;
    }
?>