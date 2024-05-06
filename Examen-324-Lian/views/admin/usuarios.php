<h1 class="nombre-pagina">Administrador Director</h1>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<h2>Usuarios</h2>

<?php if( !empty($personas) ): ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Nombre</th>
                <th scope="col" class="table__th">Departamento</th>
                <th scope="col" class="table__th">Rol</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>
        <tbody class="table__tbody">
            <?php foreach($personas as $persona): ?>
                <tr class="table__tr">
                    <td class="table__td">
                        <?php echo $persona->nombre . ' ' . $persona->apellido; ?>
                    </td>
                    <td class="table__td">
                        <?php foreach( $departamentos as $departamento ): ?>
                        <?php if( $persona->departamento === $departamento->id ): ?>
                            <?php echo $departamento->departamento; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table__td">
                    <?php foreach( $roles as $rol ): ?>
                        <?php if( $persona->rol === $rol->id ): ?>
                            <?php echo $rol->rol; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/admin/editarUs?idPersona=<?php echo $persona->id; ?>">
                            <i class="fa-solid fa-user-pen"></i>
                            Editar
                        </a>
                        <form action="/admin/eliminarUs" method="POST" class="table__formulario">
                            <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else :?>
    <p class="text-center">No existen Exponentes...</p>
<?php endif; ?>