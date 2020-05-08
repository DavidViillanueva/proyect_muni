<?php
    $restore_posible = isset($_GET['rp']) ? $_GET['rp'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/style_login.css"> 
    
</head>
<body>
    <div class="login_block">
        <img class="logo" src="img/logo.jpg" alt="logo-utn">
        <h1>Ingreso usuario</h1>
        <form action="control/control_ingreso.php" method="post">
            
            <!-- en caso de cambio de contraseña exitoso -->
            <?php if($restore_posible=='1'):?>
                <font color="#bd2424" size="2px">Se cambio la contraseña correctamente!</font>
            <?php endif; ?> 
            <!-- username -->
            <label for="username">Nombre de Usuario:</label>
            <input type="text" name="username" id="username"  required>

            <!-- password -->
            <label for="password">Contraseña:</label>
            <input type="password" name="pass" id="pass"  required>

            <input type="submit" value="Ingresar">

            <a href="forget_pass.php">¿Ha olvidado su contraseña?</a><br>
            <a href="registro.php">Registrarse</a>
        </form>
    </div>
</body>
</html>