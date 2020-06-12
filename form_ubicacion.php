<?php 
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
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="CSS/style_register.css">
    
<title>Registro proveedor</title>
    

</head>


<body>
    <main class="main">
        
        <div class="register_block">
        <form action="php/registrar_comercio.php" method="post">
                <div class="header">
                    <h1>Registrate como comercio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <div class="ubicacion">
                            <!-- direccion -->
                            <h3>Datos de ubicacion</h3>
                            <label for="text">Barrio:</label>
                            <input type="text" name="barrio" id="barrio" autocomplete=off maxlength="20">
                            <label for="text">Calle:</label>
                            <input type="text" name="calle" id="calle" required autocomplete=off maxlength="30">
                            <label for="text">Altura:</label>
                            <input type="number" name="altura" id="altura" required autocomplete=off maxlength="10">
                            <label for="text">Piso:</label>
                            <input type="number" name="piso" id="piso" autocomplete=off maxlength="5">
                            <label for="text">Departamento:</label>
                            <input type="text" name="dpto" id="dpto" autocomplete=off maxlength="5">
                        </div> 
                    </div>    
                </div>
            <div class="bottom">
                    <input type="submit" -value="Siguiente">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
       </div>
    </main>
</body>
</html>