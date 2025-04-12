<?php ob_start() ?>

<?php

if (isset($params['mensaje'])) {
    echo $params['mensaje'];
}
?>
<?php foreach ($errores as $error) {
    echo $error . "<br>";
}
?>

<?php // para comprobar que imprime las asignaturas
// echo "<pre>";
// print_r($asignaturas);
// echo "</pre>";
?>
<div id="contenido">
    <div class="form-contenido">
        <h2>Formulario de Registro</h2>
        <form action="index.php?ctl=registro" method="POST" name="formRegistro">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $params['nombre'] ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $params['apellidos'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $params['email'] ?>" required>

            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $params['telefono'] ?>" required>

            <label for="centro_estudios">Centro de estudios:</label>
            <input type="text" id="centro_estudios" name="centro_estudios" value="<?php echo $params['centro_estudios'] ?>" required>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo $params['usuario'] ?>" required>

            <label for="contrasenya">Contraseña:</label>
            <input type="password" id="contrasenya" name="contrasenya" value="<?php echo $params['contrasenya'] ?>" required>


            <label for="confirmar_contrasenya">Confirmar contraseña:</label>
            <input type="password" id="confirmar_contrasenya" name="confirmar_contrasenya" required>

            <!-- Grupo de checkboxes -->
                       

            <label>Asignaturas:</label>
<input type="checkbox" id="matematicas" name="asignaturas[]" value="1">
<label for="matematicas">MATEMÁTICAS</label>

<input type="checkbox" id="fisica" name="asignaturas[]" value="2">
<label for="fisica">FÍSICA</label>

<input type="checkbox" id="quimica" name="asignaturas[]" value="3">
<label for="quimica">QUÍMICA</label>

<input type="checkbox" id="biologia" name="asignaturas[]" value="4">
<label for="biologia">BIOLOGÍA</label>


            <input type="submit" value="Aceptar" name="bRegistro">
        </form>
    </div>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>