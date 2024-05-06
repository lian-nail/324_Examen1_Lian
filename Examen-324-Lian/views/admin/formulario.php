<div class="campo">
    <label for="nombre">Nombre</label>
    <input 
        type="text"
        id="nombre"
        placeholder="Nombre del usuario"
        name="nombre"
        value="<?php echo sanitizar( $persona->nombre ); ?>"
        >
</div>
<div class="campo">
    <label for="apellido">Apellido</label>
    <input 
        type="text"
        id="apellido"
        placeholder="Apellido del usuario"
        name="apellido"
        value="<?php echo sanitizar( $persona->apellido ); ?>"
        >
</div>
<div class="campo">
    <label for="ci">CI</label>
    <input 
        type="text"
        id="ci"
        placeholder="CI del usuario"
        name="ci"
        value="<?php echo sanitizar( $persona->ci ); ?>"
        >
</div>
<div class="campo">
    <label for="rol">Rol del usuario</label>
    <select name="rol" id="rol" <?php if( isset($_GET['idPersona']) ) echo 'disabled' ?? '';  ?> >
        <option value="" disabled selected>-- Seleccione el rol del usuario --</option>
        <?php foreach( $roles as $rol ): ?>
            <option <?php echo $persona->rol === $rol->id ? 'selected' : ''; ?> 
                value="<?php echo sanitizar( $rol->id ); ?>">
                <?php echo sanitizar($rol->rol); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="campo">
    <label for="departamento">Departamento del usuario</label>
    <select name="departamento" id="departamento">
        <option value="" disabled selected>-- Seleccione el departamento del usuario --</option>
        <?php foreach( $departamentos as $departamento ): ?>
            <option <?php echo $persona->departamento === $departamento->id ? 'selected' : ''; ?> 
                value="<?php echo sanitizar( $departamento->id ); ?>">
                <?php echo sanitizar($departamento->departamento); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="campo">
    <label for="nick">Nick</label>
    <input 
        type="text"
        id="nick"
        placeholder="Nick del usuario"
        name="nick"
        value="<?php echo sanitizar( $persona->nick ); ?>"
        >
</div>
<?php if( !isset($_GET['idPersona']) ):?>
<div class="campo">
    <label for="password">Password</label>
    <input 
        type="password"
        id="password"
        placeholder="Password del usuario"
        name="password"
        value=""
        >
</div>
<?php endif; ?>

