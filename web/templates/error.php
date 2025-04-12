<?php ob_start();
if (isset($params['mensaje'])) {

    echo $params['mensaje'];
}
?>


<h3>Ha habido un error</h3>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>