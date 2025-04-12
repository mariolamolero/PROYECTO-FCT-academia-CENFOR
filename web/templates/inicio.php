<?php ob_start() ?>
 
<h3 >
    <!-- si existe fecha, la muestra -->
<?php if(isset($params['fecha'])){

    echo $params['fecha']; 
}?>

</h3><br>  


<h1>

<!-- si existen mensajes, los muestra -->
<?php if(isset($params['mensaje'])){

echo $params['mensaje']; 
}?>
<?php if(isset($params['mensaje1'])){
    echo $params['mensaje1'];
}?>
</h1>







 
 <?php $contenido = ob_get_clean() ?> 

<?php include 'layout.php' ?>