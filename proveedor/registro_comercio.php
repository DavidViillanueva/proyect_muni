<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_registro_comercio.css">
    
<title>Registro proveedor</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <form action="select_type.php" method="post">
                <div class="header">
                    <h1>Registrate como comercio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <h3>Datos de Comercio</h3>
                        <!-- nombre fantasia  -->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" maxlength="40" requiered>
                        <!-- licencia comercial -->
                        <label for="licencia">Licencia comercial</label>
                        <input type="number" name="licencia" id="licencia" maxlength="30" requiered>
                        <!-- rubro -->
                        <label for="rubro">Rubro</label>
                        <select name="rubro" id="rubro">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <option value="1">1</option>
                        </select>
                        <!-- categoria -->
                        <label for="categ">Categoria</label>
                        <select name="categ" id="categ">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <option value="2">2</option>
                        </select>
                        
                        
                    </div>

                    <div class="columna2">
                        <h3>Datos de Contacto</h3>
                            <!-- website -->
                            <label for="website">Pagina web</label>
                            <input type="text" name="website" id="website" maxlength="40">
                            <!-- mail -->
                            <label for="mail">E-mail</label>
                            <input type="mail" name="mail" id="mail" maxlength="50">
                            <!-- tel -->
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="telefono" maxlength="20">

                        <!-- delivery -->
                        <div class="delivery">
                            <input type="checkbox" id="delivery" name="delivery" checked>
                            <label for="delivery">Delivery</label>
                        </div>

                </div>
            <div class="bottom">
                    <!-- descripcion -->
                    <div class="text">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                    </div>

                    <input type="submit" value="Siguiente">
                    <a href="select_type.php"><input type="button" value="Volver"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>