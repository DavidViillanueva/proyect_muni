<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_registro_proveedor.css">
    
<title>Registro proveedor</title>
	

</head>


<body>
	<main class="main">
		
		<div class="register_block">
        <form action="select_type.php" method="post">
                <div class="header">
                    <h1>Registrate como proveedor</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <!-- CUIT/CUIL -->
                        <label for="cuilt">Ingresa tu cuil/cuit</label>
                        <input type="text" name="cuilt" id="cuilt" required maxlength="20">
                    </div>
                    <div class="columna2">
                        <div class="produlocal">
                            <input type="checkbox" id="plocal" name="plocal" checked>
                            <label for="plocal">Productor local</label>
                        </div>
                    </div>
                </div>
            <div class="bottom">
                    <input type="submit" value="Siguiente">
                    <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>