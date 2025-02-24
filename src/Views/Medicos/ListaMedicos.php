<h1>Nuestros Especialistas</h1>
<?php
    $oldData = $_SESSION['old_data'] ?? [];
    $errores = $_SESSION['errores'] ?? [];
    unset($_SESSION['old_data'], $_SESSION['errores']);
?>
<?php  if (!empty($medicos)): ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Especialidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicos as $medico): ?>
                <tr>
                    <td><?= htmlspecialchars($medico['nombre']) ?></td>
                    <td><?= htmlspecialchars($medico['apellidos']) ?></td>
                    <td><?= htmlspecialchars($medico['telefono']) ?></td>
                    <td><?= htmlspecialchars($medico['especialidad']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No hay medicos registrados.</p>
<?php endif; ?>