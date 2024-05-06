<h1 class="nombre-pagina">Cuentas Bancarias</h1>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<?php if( count($cuentas) === 0 ): ?>
    <p class="no-proyectos">No hay cuentas aún </p>
<?php else: ?>
    <ul class="listado-proyectos">
        <?php foreach($cuentas as $cuenta): ?>
            <a href="/persona/editar?idCuenta=<?php echo $cuenta->id; ?>">
                <li class="proyecto">
                    <div class="proyecto-info">
                        <p class="proyecto-num">Cuenta: <?php echo $cuenta->numeroCuenta; ?></p>
                        <?php if($cuenta->tipoCuenta === '1'): ?>
                            <p>Tipo de Cuenta: Ahorro</p>
                        <?php elseif($cuenta->tipoCuenta === '2'): ?>
                            <p>Tipo de Cuenta: Corriente</p>
                        <?php elseif($cuenta->tipoCuenta === '3'): ?>
                            <p>Tipo de Cuenta: Empresarial</p>
                        <?php endif; ?>
                        <form class="formulario" action="/persona/eliminar" method="POST">
                            <div class="campo">
                                <input type="hidden" name="id" value="<?php echo $cuenta->id; ?>">
                                <?php if($cuenta->altaBaja === 'alta'): ?>
                                    <input type="hidden" name="altaBaja" value="baja">
                                    <input type="submit" class="boton" value="Baja">
                                <?php elseif($cuenta->altaBaja === 'baja'): ?>
                                    <input type="hidden" name="altaBaja" value="alta">
                                    <input type="submit" class="boton-alta" value="Alta">
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </li>
            </a>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>