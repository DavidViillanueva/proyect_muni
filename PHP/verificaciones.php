<?php
    // Para validacion y verificacion de datos
    class verificacion{
        private function validacion($dni,$validador){
            // funcion para verificar el cuilt cuit, Villanueva
            $dni_array = array();
            $dni_array = str_split($dni);

            $multiplicador = array(5, 4, 3, 2, 7, 6, 5, 4, 3, 2);
            foreach($dni_array as $caracter_dni)
                $suma += $multiplicador * (int)$caracter_dni;

            $resto = $suma%11;

            $nuevo_validador = $resto == 0 ? 0 : $resto == 1 ? 9 : 11 - $resto;

            if($nuevo_validador==$validador){
                return true;
            }else{
                return false;
            }
        }

        public function verificacionCuilCuit($cuilt){
            $cuilt_array = array();
            $cuilt_array = str_split($cuilt);
            if(count($cuilt_array)==11){
                // el cuit/cuil coincide con el largo, hay que obtener un substring que tenga el dni
                // el formato es XY-DNI-CV (cv codigo verificador) xy-123456789-z
                $dni = substr($cuilt,2,-1);
                $cv = substr($cuilt,-1);
                if(validacion($dni,$cv))
                    return true;
                else
                    return false;
            }else{
                return false;
            }
        }
    }
?>