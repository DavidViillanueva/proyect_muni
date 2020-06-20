<?php
    // levantamos la sesion para tener los datos de el formulario proveedor
    session_start();
    $type = isset($_GET['type'])? $_GET['type'] : null;

    include_once "proveedor.php";
    $proveedor = $_SESSION['proveedor'];
    $proveedor = unserialize($proveedor);
    $proveedor = $proveedor->getProveedor();
    if($type!=null){
        if($type==1){
            // feriante
            echo("feriante");
            header("location: form_feriante.php");
        }elseif($type==2){
            //servicio
            echo("servicio");
            header("location: form_servicio.php");
        }elseif($type==3){
            //comercio
            echo("comerico");
            header("location: form_comercio.php");
        }
    }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/Logo.png" type="text/png"/>
    <link rel="stylesheet" href="../CSS/style_register.css">
    <link rel="stylesheet" href="css/style_type.css">
    <script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>
<title>Registro Proveedor</title>
	

</head>


<body>
	<main class="main">
		<div class="register_block">
        <form action="#" method="post">
                <div class="header">
                    <h1>¿Que tipo de proveedor sos?</h1>
                </div>
                <div class="content">
                    <a href="?type=1">
                        <div class="type1" title="Comercias cosas hechas con tus propias manos! No contas con habilitacion ni local fisico.">
                                <span class="fas fa-store icon"></span>
                                <h3>Feriante</h3>
                                <p>Comercias cosas hechas con tus propias manos! No contas con habilitacion ni local fisico.</p>
                        </div>
                    </a>

                    <a href="?type=2">
                        <div class="type2" title="Ofreces un servicio en el domicilio de tus clientes. Ej: Electricista.">
                                <span class="fas fa-tools"></span>
                                <h3>Servicio</h3>
                                <p>Ofreces un servicio en el domicilio de tus clientes. Ej: Electricista.</p>
                        </div>
                    </a>

                    <a href="?type=3">
                        <div class="type3" title="Tenes un comercio con habilitacion comercial, local y nombre registrado.">
                                <span class="fas fa-cash-register"></span>
                                <h3>Comercio</h3>
                                <p>Tenes un comercio con habilitacion comercial, local y nombre registrado.</p>
                        </div>
                    </a>
                </div>
            <div class="bottom">
                    <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
	   </div>
	</main>
</body>
</html>