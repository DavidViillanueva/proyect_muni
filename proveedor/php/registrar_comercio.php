<?php
    // tomamos las variables del formulario de ubicacion
    $barrio = isset($_POST['barrio'])?$_POST['barrio'] : null;
    $calle = isset($_POST['calle'])?$_POST['calle'] : null;
    $altura = isset($_POST['altura'])?$_POST['altura'] : null;
    $piso = isset($_POST['piso'])?$_POST['piso'] : null;
    $departamento = isset($_POST['dpto'])?$_POST['dpto'] : null;
    $provincia = isset($_POST['provincia'])?$_POST['provincia']:null;
    $localidad = isset($_POST['localidad'])?$_POST['localidad']:null;

    // verificamos que la localidad este cargada o sea una nueva
    include_once("conexion.php");
    $localidad_cargada = $base->query("SELECT * FROM localidad WHERE nombre='$localidad'")->fetch(PDO::FETCH_ASSOC);
    $cant_localidad = count($localidad_cargada);
    if($cant_localidad>0){
        echo("hola");
        $id_localidad = $localidad_cargada["id_localidad"];
    }else{
        $codigo_postal = isset($_POST['cp'])?$_POST['cp'] : null;
    }
    
    session_start();
    echo("nombre: ".$_SESSION['nombre']);
    echo("<br>");
    echo("licencia: ".$_SESSION['licencia']);
    echo("<br>");
    echo("categoria: ".$_SESSION['categ']);
    echo("<br>");
    echo("website: ".$_SESSION['website']);
    echo("<br>");
    echo("mail: ".$_SESSION['mail']);
    echo("<br>");
    echo("telefono: ".$_SESSION['telefono']);
    echo("<br>");
    echo("delivery: ".$_SESSION['delivery']);
    echo("<br>");
    echo("descripcion: ".$_SESSION['descripcion']);
    echo("<br>");
    echo("cuilt: ".$_SESSION['cuilt']);
    echo("<br>");
    echo("rubro: ".$_SESSION['rubro']);
    echo("<br>");
    echo("producto local: ".$_SESSION['plocal']);
    echo("<br>");
    echo("id usuario: ".$_SESSION['id']);
    echo("<br>");
    echo("barrio: ".$barrio);
    echo("<br>");
    echo("calle: ".$calle);
    echo("<br>");
    echo("altura: ".$altura);
    echo("<br>");
    echo("piso: ".$piso);
    echo("<br>");
    echo("departamento: ".$departamento);
    echo("<br>");
    echo("provincia: ".$provincia);
    echo("<br>");
    echo("localidad: ".$localidad);

    // ya tenemos todos los dats que necesitamos
    // try{
    //     // la licencia ya fue validada igual que el cuit/cuil
    //     //En este punto sabemos que sno hay ninguna licencia
    //     $base->beginTransaction();

    //     //  cargamos al proveedor
    //     $base->prepare("INSERT INTO poveedor(id_persona,Id_rubro,cuil/cuit,ventas_concretadas,suma_puntaje,status_proveedor,id_estado,productor_local)
    //         VALUES(:id_persona,:Id_rubro,:cuil/cuit,:ventas_concretadas,:suma_puntaje,:status_proveedor,:id_estado,:productor_local)");
    //     $base->execute(array(
    //         ":id_persona"=>$_SESSION['id'],
    //         ":Id_rubro"=>$_SESSION['rubro'],
    //         ":cuil/cuit"=>$_SESSION['cuilt'],
    //         // ventas concretadas hardcodeado a 0 al igual que suma puntaje
    //         ":ventas_concretadas"=>0,
    //         ":suma_puntaje"=>0,
    //         // hardcodeado a 2 que indica status regular
    //         ":status_proveedor"=>2,
    //         //estado hardcodeado a 4 que es "En espera"
    //         ":id_estado"=>4,
    //         ":productor_local"=>$_SESSION['plocal']
    //     ));

    //     $id_proveedor = $base->lastInsertId("proveedor");
    //     // cargamos la direccion del comercio
        

    //     // cargamos al comercio
    //     $base->prepare("INSERT INTO comercio(id_proveedor,id_domicilio,id_rubro,id_categoria,nombre_comercio,delivery,licencia_comercial,pagina_web,mail,descripcion,telefono_comercial)
    //         VALUES(:id_proveedor,:id_domicilio,:id_rubro,:id_categoria,:nombre_comercio,:delivery,:licencia_comercial,:pagina_web,:mail,:descripcion,:telefono_comercial)");
    //     $base->execute(array(
    //         ":id_proveedor",
    //         ":id_domicilio",
    //         ":id_rubro",
    //         ":id_categoria",
    //         ":nombre_comercio",
    //         ":delivery",
    //         ":licencia_comercial",
    //         ":pagina_web",
    //         ":mail",
    //         ":descripcion",
    //         ":telefono_comercial"
    //     ));

    //     $base->commit();

    // }catch(PDOException $ex){
    //     $base->rollback();
    //     echo($ex->getMessage());
    // }
?>