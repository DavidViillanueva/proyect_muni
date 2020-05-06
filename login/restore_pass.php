<?php
    $id_user = isset($_GET['id']) ? $_GET['id'] : null;
    $restore_posible = isset($_GET['rp']) ? $_GET['rp'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reestablecer contraseña</title>
    <link rel="stylesheet" href="css/style_forget_pass.css" >
</head>
<body>
    <div class="restore_block">
        <form action="control/restore_password.php?id=<?php echo($id_user);?>" method="post">
            <h1>Reestablezca su contraseña</h1>
            <!-- en caso de que la contraseña sea igual a la anterior -->
            <?php if($restore_posible=='0'):?>
                <font color="#bd2424" size="2px">La contraseña no puede ser igual a la anterior!</font>
            <?php endif; ?> 
            <!-- Contraseña nueva -->
            <label>Introduzca su nueva contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Aceptar">
        </form>
    </div>
</body>
</html>