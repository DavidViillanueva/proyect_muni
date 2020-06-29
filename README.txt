Update 29/06/2020
Villanueva David
Se agrego header.php y footer.php, usarlos para crear pantallas nuevas
*Importante* Deberan estar al mismo nivel que estos
Bien: <?php include_once('header.php') ?>
Mal: <?php include_once('../header.php') ?> (de esta manera no va a cargar las dependencias de forma correcta)