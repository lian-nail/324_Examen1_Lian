<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Iniciar Sessión</p>

<?php include_once __DIR__ . '/../templates/alertas.php' ?>

<form action="/" class="formulario" method="POST">
    <div class="campo">
        <label for="nick">Usuario</label>
        <input 
            type="text"
            id="nick"
            name="nick"
            placeholder="Tu usuario o nick"
            value="<?php echo sanitizar($auth->nick); ?>"
        >

    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password" 
            placeholder="Tu Password"   
        >
    </div>

    <input type="submit" class="boton submit" value="Iniciar Sesión">
</form>

<!-- <div class="acciones">
    <a href="/crear-cuenta">Crea tu cuenta, YA!</a>
    <a href="/olvide">Olvidaste tu Password o contraseña?</a>
</div> -->