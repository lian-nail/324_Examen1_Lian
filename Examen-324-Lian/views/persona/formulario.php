<div class="campo">
    <label for="nombre">Numero de Cuenta</label>
    <input 
        type="text"
        id="numeroCuenta"
        placeholder="Numero de la Cuenta"
        name="numeroCuenta"
        value="<?php echo $cuenta->numeroCuenta; ?>"
        >
</div>
<!-- <div class="campo">
    <label for="precio">Tipo de Cuenta</label>
    <input 
        type="text"
        id="tipoCuenta"
        placeholder="Tipo de Cuenta"
        name="tipoCuenta"
        value="<?php echo $cuenta->tipoCuenta; ?>"
        >
</div> -->
<div class="campo">
    <label for="precio">Tipo de Cuenta</label>
    <select name="tipoCuenta" id="tipoCuenta">
        <option value="" disabled selected>-- Seleccione el tipo --</option>
        <?php foreach( $tipoCuentas as $tipoCuenta ): ?>
            <option <?php echo $cuenta->tipoCuenta === $tipoCuenta->id ? 'selected' : ''; ?> 
                value="<?php echo sanitizar( $tipoCuenta->id ); ?>">
                <?php echo sanitizar($tipoCuenta->tipocuenta); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="campo">
    <label for="saldo">Saldo</label>
    <input 
        type="number"
        id="saldo"
        placeholder="Saldo"
        name="saldo"
        value="<?php echo $cuenta->saldo; ?>"
        <?php if( isset($_GET['idCuenta']) ) echo 'disabled' ?? '';  ?>
        >
</div>