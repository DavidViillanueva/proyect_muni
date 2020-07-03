<?php
    include_once('conexion.php');
    include_once('../../PHP/verificaciones.php');
    include_once('../proveedor.php');
    session_start();
    // verificacion de cantidad de archivos, y tipos soportados en parte del servidor
    // tener en cuenta que se puede tomar la cantidad maxima desde una consulta
    $submit = isset($_POST['submit'])?$_POST['submit'] : null;
    // creamos variable de bandera para evitar que se carguen mal las imagenes (si llega != de 0, esta mal algo)
    $flag = 0;
    // creamos un string de parametros a retornar en caso de error
    $parametros = "?";
    if($submit!=null){
        // verificacion de fotos (cantidad y formatos)
        if(!verificacionImagenes($_FILES['fotos'],5)){
            $flag++;
            $parametros = $parametros."nf=1";
        }
        // verificamos que exista un logo
        if($_FILES['logo']['size']!=0){
            // verificamos su formato
            if(!verificacionFormatoImagen($_FILES['logo']['type'])){
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
            try{
                $base->beginTransaction();
                // cargamos al proveedor
                $prov = new proveedor($proveedor['cuilt'],$proveedor['rubro'],$proveedor['plocal'],$proveedor['id_usuario']);
                $id_proveedor = $prov->uploadProveedor($base);
                // cargamos el servicio
                $serv = new servicio($nombre,$matricula,$categoria_servicio,$descripcion,$logo_bin,$tipo_logo);
                $id_servicio = $serv->uploadServicio($base,$id_proveedor);
                // cargamos las fotos (en caso de que existan)
                if($fotos!=null){
                    uploadImages($fotos,$id_servicio,$base,"imagenes_servicio","id_servicio");
                }
                $base->commit();
                header('location: listo.php');
                echo("bien");
            }catch(PDOException $ex){
                echo('mal');
                $base->rollback();
                echo($ex->getMessage());
            }
        }
    }
?>