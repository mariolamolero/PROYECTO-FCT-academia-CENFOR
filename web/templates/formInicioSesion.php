<?php ob_start() ?>

<?php if(isset($params['mensaje'])){
echo $params['mensaje'];
 }
?>
			
            <?php foreach ($errores as $error) {
	echo $error."<br>"; }
    ?>
<div id="contenido">
    
        <div class="login-contenido">
            
            <h2>Iniciar Sesión</h2>
           

            <form action="index.php?ctl=iniciarSesion" method="POST" NAME="formInicioSesion">
                <label for="username">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="contrasenya" required>
                

                
                <input type="submit" value="Enviar" name="biniciarSesion">
            </form>
        </div>
    </div>


<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
