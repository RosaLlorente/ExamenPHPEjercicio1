<section>
    <h1>Registrate</h1>
    <form action="<?=BASE_URL?>register" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" required>
        </div>
        <div class="form-group">
            <label for="Compania">Compañia</label>
            <input type="text" class="form-control" id="Compania" name="Compania" placeholder="Compania" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <label for="password">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <p>¿Ya eres usuario?Entonces logueate <a href="<?=BASE_URL?>">aqui</a></p>
</section>