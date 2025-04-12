<?php ob_start() ?>
<h2>
<b><?php echo $params['mensaje'] ?></b><br><br>
<b><?php echo $params['mensaje1'] ?></b>
</h2>
<div id="contenido">
        <table class="subject-table">
            <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Tema</th>
                    <th>Enlace</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matemáticas</td>
                    <td>Álgebra</td>
                    <td><a href="https://ejemplo.com/algebra">Ver archivo</a></td>
                </tr>
                <tr>
                    <td>Física/Química</td>
                    <td>El átomo</td>
                    <td><a href="https://ejemplo.com/revolucion-francesa">Ver archivo</a></td>
                </tr>
                <tr>
                    <td>Biología</td>
                    <td>Células</td>
                    <td><a href="https://ejemplo.com/celulas">Ver archivo</a></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>