<?php ob_start() ?>

<div id="contenido">
    <h2>Bloques de la Asignatura: <?= htmlspecialchars($asignatura) ?></h2>

    <?php if (isset($mensaje)): ?>
        <div class="alert alert-warning">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre del Bloque</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bloques as $bloque): ?>
                    <tr>
                        <td><?= htmlspecialchars($bloque['nombre_bloque']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
