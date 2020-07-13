<?php
    require_once 'conexion.php';
    require_once '../proveedor.php';
    require_once '../../PHP/uploads.php';
    session_start();
    // verificacion de cantidad de archivos, y tipos soportados en parte del servidor
    include_once "../../PHP/verificaciones.php";
    // tener en cuenta que se puede tomar la cantidad maxima desde una consulta
    $submit = isset($_POST['submit'])?$_POST['submit'] : null;
    $parametros = '?';
    if($submit!=null){
        if(!verificacionImagenes($_FILES['images'],5)){
            // si los archivos cumplen no con los requerimientos
            $flag++;
            $parametros = $parametros.'nf=1';
        }
        // revisamos que las fotos esten cargadas (puede que este vacio y no deberia ser error)
        $contador_fotos = 0;
        for($i=0;$i<count($_FILES['images']['size']);$i++){
            if($_FILES['images']['size'][$i]==0){
                $contador_fotos++;
            }
        }
        if($contador_fotos==0)
            $fotos = $_FILES['images'];
        else
            $fotos = null;

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
            $logo = null;
        }
        // Logo = null si no existe logo = al fichero si existe, el unico error es formato incorrecto
        if($flag!=0){
        //      Algo fallo con las imagenes (formato/cantidad)
            header('location: ../form_feriante.php'.$parametros);
        }else{
            // contamos con todos los datos de proveedor y imagenes por sesion
            //la variable de session provedor viene serializada al ser un array
            $proveedor = unserialize($_SESSION['proveedor']);

            try{
                $base->beginTransaction();
                // cargamos al proveedor
                $prov = new proveedor($proveedor['cuilt'],$proveedor['rubro'],$proveedor['plocal'],$proveedor['id_usuario']);
                $id_proveedor=$prov->uploadProveedor($base);
                // cargamos el feriante
                $feriante = new feriante($_SESSION['nombre'],$_SESSION['descripcion']);
                $id_feriante = $feriante->uploadFeriante($base,$id_proveedor);
                // cargamos el logo del feriante
                if($logo != null){
                    $logo = $_FILES['logo'];
                    $tmp_name = $logo['tmp_name'];
                    $file_size = $logo['size'];
                    $fp = fopen($tmp_name,'r');
                    $logo_bin = fread($fp,$file_size);
                    $tipo_logo = $logo['type'];
                    fclose($fp);
                    uploadLogo($base,'logo_feriante','id_logo_feriante',$id_feriante,$logo_bin,$tipo_logo);
                }
                // cargamos las imagenes
                if($fotos!=null){
                    uploadImages($fotos,$id_feriante,$base,'imagenes_feriante','id_feriante');
                }
                $base->commit();
                session_unset('proveedor');
                session_unset('descripcion');
                session_unset('nombre');
                header('location: listo.php');
            }catch(PDOException $ex){
                $base->rollback();
                echo("mal");
                echo($ex->getMessage());
            }
        }
    }
?>