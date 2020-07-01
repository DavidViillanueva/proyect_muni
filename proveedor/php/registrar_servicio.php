<?php
    include_once('conexion.php');
    include_once('../../PHP/verificaciones.php');
    session_start();
    // verificacion de cantidad de archivos, y tipos soportados en parte del servidor
    $verificacion = new verificacion();
    // tener en cuenta que se puede tomar la cantidad maxima desde una consulta
    $submit = isset($_POST['submit'])?$_POST['submit'] : null;
    // creamos variable de bandera para evitar que se carguen mal las imagenes (si llega != de 0, esta mal algo)
    $flag = 0;
    // creamos un string de parametros a retornar en caso de error
    $parametros = "?";
    if($submit!=null){
        // verificacion de fotos (cantidad y formatos)
        if(!$verificacion->verificacionImagenes($_FILES['fotos'],5)){
            $flag++;
            $parametros = $parametros."nf=1";
        }
        // verificamos que exista un logo
        if($_FILES['logo']['size']!=0){
            // verificamos su formato
            if(!$verificacion->verificacionFormatoImagen($_FILES['logo']['type'])){
                $flag++;
                $parametros = $parametros."&nl=1";
            }else{
                $logo=$_FILES['logo'];
            }
        }else{
            $logo= null;
        }
        // Logo = null si no existe logo = al fichero si existe, el unico error es formato incorrecto

        // revisamos que las fotos esten cargadas (puede que este vacio y no deberia ser error)
        $contador_fotos = 0;
        for($i=0;$i<count($_FILES['fotos']['size']);$i++){
            if($_FILES['fotos']['size'][$i]==0){
                $contador_fotos++;
            }
        }
        if($contador_fotos==0)
            $fotos = $_FILES['fotos'];
        else
            $fotos = null;

        // Si la bandera es distinta de 0 quiere decir que hubo un error con las imagenes
        if($flag!=0){
            // retornamos y por parametros pasamos cual fue el error
            header("location: ../form_servicio.php".$parametros);
        }else{
            // las imagenes se encuentran bien cargadas procedemos a cargar los datos
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
            $matricula = isset($_POST['matricula'])?$_POST['matricula']:null;
            $categoria_servicio = isset($_POST['categ_servicio'])?$_POST['categ_servicio']: null;
            $telefono_servicio = isset($_POST['telefono'])?$_POST['telefono']:null;
            $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:null;
            // es posible que la imagen no este cargada y no deberia generar problemas
            if($logo != null){
                $logo = $_FILES['logo'];
                $tmp_name = $logo['tmp_name'];
                $file_size = $logo['size'];
                $fp = fopen($tmp_name,'r');
                $logo_bin = fread($fp,$file_size);
                $tipo_logo = $logo['type'];
                fclose($fp);
            }else{
                $logo_bin = null;
                $tipo_logo = null;
            }

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
                    ":id_persona"=>$proveedor['id_usuario'],
                    ":Id_rubro"=>$proveedor['rubro'],
                    ":cuil_cuit"=>$proveedor['cuilt'],
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
                // cargamos el servicio
                $dbq = $base->prepare("INSERT INTO servicio (id_proveedor,id_categoria_servicio,matricula,nombre_fantacia,imagen,tipo_imagen)
                    VALUES (:id_proveedor,:id_categoria_servicio,:matricula,:nombre_fantacia,:imagen,:tipo_imagen)");
                $dbq->execute(array(
                    ":id_proveedor"=>$id_proveedor,
                    ":id_categoria_servicio"=>$categoria_servicio,
                    ":matricula"=>$matricula,
                    ":nombre_fantacia"=>$nombre,
                    ":imagen"=>$logo_bin,
                    ":tipo_imagen"=>$tipo_logo
                ));
                $id_servicio = $base->lastInsertId();
                // cargamos las fotos (en caso de que existan)
                if($fotos!=null){
                    $files_post = $fotos; //vienen las imagenes todos los nombres en 0, todos los tipos en 1 etc
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
                        $dbq = $base->prepare("INSERT INTO imagenes_servicio(id_servicio,imagen,tipo_imagen)
                                VALUES(:id_feriante,:imagen,:tipo_imagen)");
                        $dbq->execute(array(
                            ":id_feriante"=>$id_servicio,
                            ":imagen"=>$data[$i],
                            ":tipo_imagen"=>$imagenes[$i]['type']
                        ));
                    }
                }
                $base->commit();
                echo("bien");
            }catch(PDOException $ex){
                echo('mal');
                $base->rollback();
                echo($ex->getMessage());
            }
        }
    }
?>