<?php
  include_once "conexion.php";
  $localidad = " Zapala, Neuquén";
  try {
            
    $sql = "SELECT name_provider, address, description FROM provider WHERE id_provider=?";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(10));
    $registro = $resultado->fetch(PDO::FETCH_ASSOC);
    //echo $registro['address'];
    $direccion = $registro['address'];
    $nombre_proveedor = $registro['name_provider'];
    $descripcion = $registro['description'];

    //echo $direccion,$nombre_proveedor,$descripcion;
  

} catch (\Throwable $th) {
    //throw $th;
    die("Error capturado <br>".$th->getMessage());
}
finally{
    $base=NULL;
}
?>

