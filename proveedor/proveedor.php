<?php
    class proveedor{
        // -------------------------------------------------------------------------------
        //     Clase         : Proveedor
        //     Descripcion   : Permite la creacion y obtencion de un proveedor, tambien
        //                      la carga de el mismo a la base de datos indicada
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 15/06/2020
        //   -------------------------------------------------------------------------------
        private $cuilt = null;
        private $rubro = null;
        private $plocal = null;
        private $id_usuario = null;
        function __construct($cuilt,$rubro,$plocal,$id_usuario){
            //crear un proveedor nuevo
            $this->cuilt = $cuilt;
            $this->rubro = $rubro;
            $this->plocal = $plocal;
            $this->id_usuario = $id_usuario;
        }

        public function getProveedor(){
            return array(
                "cuilt"=>$this->cuilt,
                "rubro"=>$this->rubro,
                "plocal"=>$this->plocal,
                "id_usuario"=>$this->id_usuario
            );
        }

        public function uploadProveedor(PDO $db){
            // -------------------------------------------------------------------------------
            //     Funcion       : proveedor->uploadProveedor($dataBase)
            //     Descripcion   : Carga en la base de datos los datos cargados de la clase
            //     Entrada       : $db: PDO Object
            //     Salida        : devuelve 2 valores, en caso de haber cargado de forma correcta devuelve el
            //                     id del proveedor cargado (int), en caso de error retorna false
            //     Autor         : Villanueva David Ronco
            //     Fecha         : 30/06/2020
            //   -------------------------------------------------------------------------------
            if(($this->cuilt!=null) & ($this->rubro!=null) & ($this->plocal!=null) & ($this->id_usuario!=null)){
                // los campos checkbox vienen con on, hay que pasarlo a 1 o 0 segn corresponda por tipo de dato en bd
                if(preg_match("/on/",$this->plocal)){
                    $this->plocal = 1;
                }else{
                    $this->plocal = 0;
                }
                try{
                $dbq=$db->prepare("INSERT INTO proveedor(id_persona,Id_rubro,cuil_cuit,ventas_concretadas,suma_puntaje,status_proveedor,id_estado,productor_local)
                    VALUES(:id_persona,:Id_rubro,:cuil_cuit,:ventas_concretadas,:suma_puntaje,:status_proveedor,:id_estado,:productor_local)");
                $dbq->execute(array(
                    ":id_persona"=>$this->id_usuario,
                    ":Id_rubro"=>$this->rubro,
                    ":cuil_cuit"=>$this->cuilt,
                    // ventas concretadas hardcodeado a 0 al igual que suma puntaje
                    ":ventas_concretadas"=>0,
                    ":suma_puntaje"=>0,
                    // hardcodeado a 2 que indica status regular
                    ":status_proveedor"=>2,
                    //estado hardcodeado a 4 que es "En espera"
                    ":id_estado"=>4,
                    ":productor_local"=>$this->plocal
                ));
                }catch(PDOException $ex){
                    echo($ex->getMessage());
                }
                return $db->lastInsertId();
            }else{
                echo('error cargando proveedor');
                return false;
            }
        }
    }

    class comercio{
        private $nombre;
        private $licencia;
        private $categoria;
        private $website;
        private $mail;
        private $delivery;
        private $descripcion;
        function __construct($nombre,$licencia,$categoria,$website,$mail,$delivery,$descripcion)
        {
            $this->nombre = $nombre;
            $this->licencia = $licencia;
            $this->categoria = $categoria;
            $this->website = $website;
            $this->mail = $mail;
            $this->delivery = $delivery;
            $this->descripcion = $descripcion;
            $this->descripcion = $descripcion;
        }

        public function getComercio(){
            return array(
                "nombre"=>$this->nombre,
                "licencia"=>$this->licencia,
                "categoria"=>$this->categoria,
                "website"=>$this->website,
                "mail"=>$this->mail,
                "delivery"=>$this->delivery,
                "descripcion"=>$this->descripcion
            );
        }
        public function uploadComercio(PDO $db,int $id_proveedor,int $id_domicilio){
            // -------------------------------------------------------------------------------
            //     Funcion       : comercio->uploadComercio
            //     Descripcion   : Carga en la base de datos un comercio, relacionado a un proveedor y a un domicilio
            //     Entrada       : $db: PDO Object
            //                      $id_proveedor: al proveedor al cual se le asignara este comercio
            //                      $id_domicilio: el identificador del domicilio al que le corresponde este comercio
            //     Salida        : devuelve 2 valores, en caso de haber cargado de forma correcta devuelve el
            //                     id del comercio cargado (int), en caso de error retorna false
            //     Autor         : Villanueva David Ronco
            //     Fecha         : 03/06/2020
            //   -------------------------------------------------------------------------------
            if(preg_match("/on/",$this->delivery)){
                $this->delivery = 1;
            }else{
                $this->delivery = 0;
            }
            try{
                $dbq = $db->prepare("INSERT INTO comercio(id_proveedor,id_domicilio,id_categoria,nombre_comercio,delivery,licencia_comercial,pagina_web,mail,descripcion)
                VALUES(:id_proveedor,:id_domicilio,:id_categoria,:nombre_comercio,:delivery,:licencia_comercial,:pagina_web,:mail,:descripcion)");
                $dbq->execute(array(
                    ":id_proveedor"=>$id_proveedor,
                    ":id_domicilio"=>$id_domicilio,
                    ":id_categoria"=>$this->categoria,
                    ":nombre_comercio"=>strtoupper($this->nombre),
                    ":delivery"=>$this->delivery,
                    ":licencia_comercial"=>$this->licencia,
                    ":pagina_web"=>strtoupper($this->website),
                    ":mail"=>strtoupper($this->mail),
                    ":descripcion"=>strtoupper($this->descripcion),
                ));
                return true;
            }catch(PDOException $ex){
                return false;
                echo('uploadComercio'.$ex->getMessage());
            }
        }
    }

    class servicio{
        // -------------------------------------------------------------------------------
        //     Clase         : Servicio
        //     Descripcion   : Permite la creacion y obtencion de un servicio, tambien
        //                      la carga de el mismo a la base de datos indicada
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 15/06/2020
        //   -------------------------------------------------------------------------------
        private $nombre = null;
        private $matricula = null;
        private $categoria_servicio = null;
        private $descripcion = null;

        function __construct($nombre,$matricula,$categoria_servicio,$descripcion){
            $this->nombre = $nombre;
            $this->matricula = $matricula;
            $this->categoria_servicio = $categoria_servicio;
            $this->descripcion = $descripcion;
        }

        public function getServicio(){
            return array(
                "nombre"=>$this->nombre,
                "matricula"=>$this->matricula,
                "categoria_servicio"=>$this->categoria_servicio,
                "descripcion"=>$this->descripcion,
                "logo_bin"=>$this->logo_bin,
                "tipo_logo"=>$this->tipo_logo
            );
        }

        public function uploadServicio(PDO $db,int $id_proveedor){
            // -------------------------------------------------------------------------------
            //     Funcion       : servicio->uploadServicio($database,$id_proveedor)
            //     Descripcion   : Carga en la base de datos los datos cargados de la clase
            //     Entrada       : $db: PDO Object,$id_proveedor
            //     Salida        : devuelve 2 valores, en caso de haber cargado de forma correcta devuelve el
            //                     id del servicio cargado (int), en caso de error retorna false
            //     Autor         : Villanueva David Ronco
            //     Fecha         : 30/06/2020
            //   -------------------------------------------------------------------------------
            if($this->nombre != null && $this->matricula != null && $this->categoria_servicio != null &&  $this->descripcion != null &&
                $this->logo_bin != null && $this->tipo_logo != null){
                try{
                    $dbq = $db->prepare("INSERT INTO servicio (id_proveedor,id_categoria_servicio,matricula,nombre_fantacia)
                            VALUES (:id_proveedor,:id_categoria_servicio,:matricula,:nombre_fantacia)");
                    $dbq->execute(array(
                        ":id_proveedor"=>$id_proveedor,
                        ":id_categoria_servicio"=>$this->categoria_servicio,
                        ":matricula"=>$this->matricula,
                        ":nombre_fantacia"=>$this->nombre,
                    ));
                }catch(PDOException $ex){
                    echo('upload servicio error'.$ex->getMessage());
                }
                return $db->lastInsertId();
            }else{
                echo('error Upload Servicio');
                return false;
            }
        }

    }

    class  feriante{
        private $descripcion = null;
        private $nombre = null;

        function __construct($nombre,$descripcion){
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }

        public function getFeriante(){
            return array(
                "nombre"=>$this->nombre,
                "descripcion"=>$this->descripcion
            );
        }

        public function uploadFeriante(PDO $db,$id_proveedor){
            // -------------------------------------------------------------------------------
            //     Funcion       : feriante->uploadFeriante
            //     Descripcion   : Carga en la base de datos un feriante, relacionado a un proveedor
            //     Entrada       : $db: PDO Object
            //                      $id_proveedor: al proveedor al cual se le asignara este feriante
            //     Salida        : devuelve 2 valores, en caso de haber cargado de forma correcta devuelve el
            //                     id del feriante cargado (int), en caso de error retorna false
            //     Autor         : Villanueva David Ronco
            //     Fecha         : 03/06/2020
            //   -------------------------------------------------------------------------------
            if($this->descripcion != null && $this->descripcion != null){
                try{
                    $dbq = $db->prepare("INSERT INTO feriante(id_proveedor,descripcion,nombre)
                        VALUES(:id_proveedor,:descripcion,:nombre)");
                    $dbq->execute(array(
                        ":id_proveedor"=>$id_proveedor,
                        ":descripcion"=>strtoupper($_SESSION['descripcion']),
                        ":nombre"=>strtoupper($_SESSION['nombre'])
                    ));
                }catch(PDOException $ex){
                    echo ($ex->getMessage());
                    return false;
                }
            }else{
                return false;
            }
            // obtenemos el id del feriante cargado
            return $db->lastInsertId();
        }
    }

    function uploadImages($imagenes,$id_destino,PDO $db,string $table_name,string $nombre_campo_destino){
        // -------------------------------------------------------------------------------
        //     Funcion       : uploadImages
        //     Descripcion   : Permite cargar en la base dada un array de imagenes a un id determinado
        //                      tabla destino:
        //                              ___________________________________________________
        //                             |id_imagenes|id_propietario|imagen_data|tipo_imagen|
        //     Entrada       :  $imagenes (array de imagenes tipo $_FILE),
        //                      $id_destino id del usuario en la base al que se le van a adjudicar las imagenes a la base ($db),
        //                      $table_name nombre de la tabla a la cual se van a cargar las imagenes, debe presentar la estructura mostrada
        //                      $nombre_campo_destino nombre del campo en la tabla correspondiente al $id_destino
        //     Salida        : return false si fallo, true si lo hizo de forma correcta
        //     Autor         : Villanueva David Ronco
        //     Fecha         : 02/07/2020
        // -------------------------------------------------------------------------------
        $files_post = $imagenes; //vienen las imagenes todos los nombres en 0, todos los tipos en 1 etc
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
        try{
            $sql = "INSERT INTO ".$table_name." (".$nombre_campo_destino.",imagen,tipo_imagen)
                        VALUES(:".$nombre_campo_destino.",:imagen,:tipo_imagen)";
            for($i=0;$i<$files_count;$i++){
                $dbq = $db->prepare($sql);
                $dbq->execute(array(
                    ":$nombre_campo_destino"=>$id_destino,
                    ":imagen"=>$data[$i],
                    ":tipo_imagen"=>$imagenes[$i]['type']
                ));
            }
            return true;
        }catch(PDOException $ex){
            echo ($ex->getMessage());
            return false;
        }
    }
?>