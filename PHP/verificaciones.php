<?php
    // Para validacion y verificacion de datos
    class verificacion{
        // CUIL CUIT VILLANUEVA
        private function validacion($dni,$validador){
            // funcion para verificar el cuilt cuit, Villanueva
            $dni_array = array();
            $dni_array = str_split($dni);
            $multiplicador = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
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
        // CUILT CUIT VILLANUEVA
        public function verificacionCuilCuit($cuilt){
            $cuilt_array = array();
            $cuilt_array = str_split($cuilt);
            if(count($cuilt_array)==11){
                // el cuit/cuil coincide con el largo, hay que obtener un substring que tenga el dni
                // el formato es XY-DNI-CV (cv codigo verificador) xy-123456789-z
                $dni = substr($cuilt,0,-1);
                $cv = substr($cuilt,-1);
                $validador = new verificacion();
                if($validador->validacion($dni,$cv))
                    return true;
                else
                    return false;
                return true;
            }else{
                return false;
            }
        }

        // IMAGENES PERMITIDAS Y CANTIDADES VILLANUEVA
        public function verificacionImagenes (&$arrayImagenes,$cantPermitida){
            // en caso de que el tamaño en el indice 0 sea igual a 0 quiere decir que el
            // arreglo este vacio, se genera igual
            if($arrayImagenes['size'][0]==0){
                return true;
            }
            if(count($arrayImagenes["name"])>$cantPermitida)
                return false;
            $flag=0;
            $validador = new verificacion();
            for($x=0;$x<count($arrayImagenes['type']);$x++){
                if(!$validador->verificacionFormatoImagen($arrayImagenes['type'][$x]))
                    $flag++;
            }
            if($flag==0)
                return true;
            else
                return false;
        }

        public function verificacionFormatoImagen($imagen){
            $permitidos = array("image/jpg", "image/jpeg", "image/png");
            if(!in_array($imagen,$permitidos))
                return false;
            return true;
        }
    }
?>