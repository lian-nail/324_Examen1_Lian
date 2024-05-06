<div class="barra">
    <p>Que tal: <?php echo $_SESSION['persona'] ?? ''; ?></p>
    <a class="boton2" href="/logout">Cerrar Sesión</a>
</div>

<?php if( isset( $_SESSION['admin'] ) ): ?>
<div class="barra-servicios">
    <a class="boton" href="/admin">Ver Montos</a>
    <a class="boton" href="/admin/usuarios">Ver Usuarios</a>
    <a class="boton" href="/admin/agregarUs">Agregar Usuario</a>
</div>

<?php else: ?>

<div class="barra-servicios">
    <a class="boton" href="/persona/agregar">Agregar Cuenta</a>
    <a class="boton" href="/persona">Ver Cuentas</a>
</div>

<?php endif; ?>

