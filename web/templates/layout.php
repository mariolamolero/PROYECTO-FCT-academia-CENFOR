<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="estilo.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />

    <!--  con esto consigo que tenga el estilo deseado -->

    <title>PROYECTO</title>

</head>

<body>

    <header>

        <h1>CENFORλ, tu centro de enseñanza.</h1>
       <?php 

if (!isset($menu)) {
    $menu = 'menuHome.php';
     
}
include $menu;
       ?>
    </header>


    <div id="contenido">
        <!--contenido dinámico -->
        <?php echo $contenido ?>
    </div>

    <footer>
        <p>Teléfono de contacto: 601.36.40.27</p>
        <p>Dirección: Calle Vicente Zaragozá, 16 Silla, Valencia</p>
        <p>&copy; 2024 Cenforλ. Todos los derechos reservados.</p>

    </footer>
</body>

</html>