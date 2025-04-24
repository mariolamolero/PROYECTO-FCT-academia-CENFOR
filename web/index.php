<?php
//incluyo las carpetas libs y modelo

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classUsuarios.php';
require_once __DIR__ . '/../app/modelo/classAsignaturas.php';

require_once __DIR__ . '/../app/controlador/Controller.php';

//inicio sesion 
session_start();

//hago que todos los usuarios tengan un nivel. si no estaba 'iniciado', le doy el valor 0

if(!isset($_SESSION['nivel_usuario'])){
    $_SESSION['nivel_usuario']=0;
}


$map = array(
    'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel_usuario' => 0),

    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel_usuario' => 0),

    'iniciarSesion' => array('controller' => 'Controller', 'action' => 'iniciarSesion', 'nivel_usuario' => 0),

    'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel_usuario' => 0),

    
    'demo' => array('controller' => 'Controller', 'action' => 'demo', 'nivel_usuario'=>0),  
    
    'matematicas' => array('controller' => 'Controller', 'action' => 'matematicas', 'nivel_usuario'=>1),  
    'quimica' => array('controller' => 'Controller', 'action' => 'quimica', 'nivel_usuario'=>1),  
    'fisica' => array('controller' => 'Controller', 'action' => 'fisica', 'nivel_usuario'=>1),  
    'biologia' => array('controller' => 'Controller', 'action' => 'biologia', 'nivel_usuario'=>1),  
    

    'verBloques' => array('controller' => 'Controller', 'action' => 'verBloques', 'nivel_usuario'=>1),  
    



    
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel_usuario' => 1),

    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel_usuario' => 0),
    'consultarUsuarios' => array('controller' => 'Controller', 'action' => 'consultarUsuarios', 'nivel_usuario' => 2),
    'insertarRecurso' => array('controller' => 'Controller', 'action' => 'insertarRecurso', 'nivel_usuario' => 2)
    /*
    'listarRecursos' => array('controller' => 'Controller', 'action' => 'listarRecursos', 'nivel_usuario' => 0),
    'listarAsignatura' => array('controller' => 'Controller', 'action' => 'listarAsignatura', 'nivel_usuario' => 1),

    'setLanguage' => array('controller' => 'Controller', 'action' => 'setLanguage', 'nivel_usuario'=>1),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel_usuario' => 1),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel_usuario' => 0),
    
    'buscarTema' => array('controller' => 'Controller', 'action' => 'buscarTema', 'nivel_usuario' => 1),
    'listarEnlaces' => array('controller' => 'Controller', 'action' => 'listarEnlaces', 'nivel_usuario' => 1),
    'insertarUsers' => array('controller' => 'Controller', 'action' => 'insertarUsers', 'nivel_usuario' => 2),
    'eliminarUsers' => array('controller' => 'Controller', 'action' => 'eliminarUsers', 'nivel_usuario' => 2),
    'modificarUsers' => array('controller' => 'Controller', 'action' => 'modificarUsers', 'nivel_usuario' => 2),
    */
);


// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        // header('Status: 404 Not Found');
        // echo '<html><body><h1>Error 404: No existe la ruta <i>' .
        //     $_GET['ctl'] . '</p></body></html>';
        $ruta='error';
        exit;
        /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];


if (method_exists($controlador['controller'], $controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action']
        ));
    }else{
        call_user_func(array(
            new $controlador['controller'],
            'inicio'
        )); 
    }
}