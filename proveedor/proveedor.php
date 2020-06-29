<?php
    class proveedor{
        private $cuilt;
        private $rubro;
        private $plocal;
        private $id_usuario;

        public function setProveedor($cuilt,$rubro,$plocal,$id_usuario){
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
    }

    class comercio{
        private $nombre;
        private $licencia;
        private $categoria;
        private $website;
        private $mail;
        private $telefono;
        private $delivery;
        private $descripcion;

        public function setComercio($nombre,$licencia,$categoria,$website,$mail,$delivery,$descripcion){
            $this->nombre = $nombre;
            $this->licencia = $licencia;
            $this->categoria = $categoria;
            $this->website = $website;
            $this->mail = $mail;
            $this->delivery = $delivery;
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
    }

?>