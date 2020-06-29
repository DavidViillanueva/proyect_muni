<?php
    include_once "proveedor/php/conexion.php";

    $nombre_prov = $_POST['provincia'];
    $localidades = $base->query("SELECT L.nombre FROM localidad AS L INNER JOIN provincia  AS p ON p.id_provincia=L.id_provincia WHERE p.nombre = '$nombre_prov'");
    $localidades = $localidades->fetchAll(PDO::FETCH_ASSOC);

    $cadena="<label for='loca'>Localidad</label>
            <input list='loca' name='localidad' id='localidad'>
            <datalist id='loca'>";
	foreach($localidades as $key){
		$cadena=$cadena.'<option value="'.$key['nombre'].'"></option>';
	}

    echo $cadena."</datalist>"
?>