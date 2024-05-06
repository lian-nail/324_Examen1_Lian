<h1 class="nombre-pagina">Agregar Cuenta</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php' ;
    include_once __DIR__ . '/../templates/alertas.php';  
?>

<form method="POST" class="formulario" action="/persona/agregar">
    <?php include_once __DIR__ . '/formulario.php'; ?>

    <input type="submit" class="boton" value="Guadar Cambios">
</form>