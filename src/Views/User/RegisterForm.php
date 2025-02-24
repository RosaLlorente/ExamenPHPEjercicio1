<section>
    <h1>Registrate</h1>
    <?php
        $oldData = $_SESSION['old_data'] ?? [];
        $errores = $_SESSION['errores'] ?? [];
        unset($_SESSION['old_data'], $_SESSION['errores']);
    ?>
    <form action="<?=BASE_URL?>register" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="data[nombre]" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="data[apellido]" placeholder="Apellido" required>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="data[telefono]" placeholder="Telefono" required>
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="data[dni]" placeholder="DNI" required>
        </div>
        <div class="form-group">
            <label for="Compania">Compañia</label>
            <input type="text" class="form-control" id="Compania" name="data[compania]" placeholder="Compania">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="data[email]" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="data[password]" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <label for="password">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password" name="data[password]" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <p>¿Ya eres usuario?Entonces logueate <a href="<?=BASE_URL?>">aqui</a></p>
</section>