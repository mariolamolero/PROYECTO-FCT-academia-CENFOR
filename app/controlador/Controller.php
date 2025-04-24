<?php

class Controller
{

    //menu a cargar segun el nivel de usuario. Los visitantes son nivel 0. Los registrados, nivel 1 y el administrador nivel 2.

    private function cargaMenu()
    {

        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }
    //home.- pagina de inicio.
    public function home()
    {
        //en el array params están los datos que serán pintados en la plantilla
        $params = array(
            'mensaje' => 'Nuestro objetivo es que comprendáis las ciencias',

            'fecha' => date('d-m-Y'), //escribe la fecha actual

        );

        $menu = 'menuHome.php'; //cargamos el menuhome

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        //incluimos la vista
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {

        //mensajes que se mostrarán en la pantalla de inicio
        $params = array(
            'mensaje' => 'No te rindas, se constante  y ',
            'mensaje1' => 'márcate tus propios retos, que nadie te ponga límites'
        );

        //según el nivel del usuario, se cargará un menú u otro.
        $menu = $this->cargaMenu();

 // Redirige a la vista de asignaturas si es alumno
 if ($_SESSION['nivel_usuario'] == 1) {
    require __DIR__ . '/../../web/templates/vistaAsignaturas.php';
    return;
} else {
    require __DIR__ . '/../../web/templates/inicio.php';
  
    return;
}

        //incluimos la vista


    }


    public function demo()
    {
        //mensajes que se mostrarán en la pantalla

        $params = array(
            'mensaje' =>     'Esto es un ejemplo de lo que podrías tener.',
            'mensaje1' =>    'Regístrate y disfruta de todos los temarios'
        );
        //se carga el menú correspondiente según el nivel del usuario
        $menu = $this->cargaMenu();
        //incluimos la vista

        require __DIR__ . '/../../web/templates/demo.php';
    }

    public function registro()
    {

        //cargamos el menú 
        $menu = $this->cargaMenu();
        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }

        //NUEVO//
        // Inicializar la clase Academia para obtener las asignaturas
     /*   $m = new Asignaturas();
        $asignaturas = $m->listarAsignaturas();
      */  


        //iniciamos el array params
        $params = array(
            'nombre' => '',
            'apellidos' => '',
            'email'=> '',
            'telefono'=>'',
            'centro_estudios'=>'',
            'usuario' => '',
            'contrasenya' => '',
        
        );

        //iniciamos el array para registrar los errores
        $errores = array();

        //empezamos a tratar el registro del formulario

        if (isset($_POST['bRegistro'])) {

            //recogemos, sanitizamos los datos

            $nombre = recoge('nombre');
            $apellidos = recoge('apellidos');
            $email=recoge('email');
            $telefono=recoge ('telefono');
            $centro_estudios=recoge('centro_estudios');
            $usuario = recoge('usuario');
            $contrasenya = recoge('contrasenya');
            $confirmar_contrasenya = recoge('confirmar_contrasenya');
            
            
                        // Comprobamos si coinciden las contraseñas
                        if ($contrasenya !== $confirmar_contrasenya) {
                            $errores['contrasenya'] = "Las contraseñas no coinciden.";
                        }
        
//recogemos la seleccion del checkbox


$asignaturas = isset($_POST['asignaturas']) ? $_POST['asignaturas'] : [];

// Validamos que se haya seleccionado al menos una asignatura
if (empty($asignaturas)) {
    $errores['asignaturas'] = "Debes seleccionar al menos una asignatura.";
}





            //validamos
           
            cTexto($nombre, "nombre", $errores);
            cTexto($apellidos, "apellidos", $errores);
            validar_correo($email,"email",$errores);
            
            cNum($telefono, "telefono", $errores);
            cTexto($centro_estudios, "centro_estudios", $errores);
            cUser($usuario, "usuario", $errores);
            cUser($contrasenya, "contrasenya", $errores);

            //para ver si hay errores. se imprime arriba del formulario
         /*   if (!empty($errores)) {
                echo "<pre>";
                print_r($errores);
                echo "</pre>";
            }*/
            //

            if (empty($errores)) {
                // Si no hay errores, encriptamos la contraseña   
                try {

                    $m = new Usuarios();
                    $contrasenya = encriptar($contrasenya);


                    //AHORA VIENE TODO LO NUEVO 
                    $id_alumno = $m->insertarUsuario($nombre, $apellidos, $email, $telefono, $centro_estudios, $usuario, $contrasenya);
                    if ($id_alumno) {
                        foreach ($asignaturas as $id_asignatura) {
                            $m->insertarAsignaturaAlumno($id_alumno, $id_asignatura);
                        }
    
                        
                    //si la inserción es correcta, vamos a ctl iniciarSesion (el login)
        /*            if ($m->insertarUsuario($nombre, $apellidos, $email, $telefono, $centro_estudios, $usuario, $contrasenya)) {*/

                        header('Location: index.php?ctl=iniciarSesion');
                    } else {

                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            } else {

                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }
        //para que el checkbox sea dinamico
        //inicializar el modelo de asignaturas y obtenerlas
$mAsignaturas = new Asignaturas();
$asignaturas = $mAsignaturas->listarAsignaturas();
//guardarlas en el array $params para pasarlas a la vista
$params['asignaturas'] = $asignaturas;


        //incluimos la vista del formulario

        require __DIR__ . '/../../web/templates/formRegistro.php';
        
    }
    public function iniciarSesion(){
        
        try {
            $params = array(
                'usuario' => '',
                'contrasenya' => ''
            );
            $menu = $this->cargaMenu();


            if ($_SESSION['nivel_usuario'] > 0) {
                header("Location:index.php?ctl=inicio");
            }

            $errores = [];

            if (isset($_POST['biniciarSesion'])) { // Nombre del boton del login

                //recogemos, sanitizamos los datos introducidos por el usuario

                $usuario = recoge('usuario');
                $contrasenya = recoge('contrasenya');

                // validamos. Usamos las funciones que están en el archivo bGeneral

                if (cUser($usuario, "usuario", $errores)) {
                    // Si no ha habido problema creo modelo y hago consulta                    
                    $m = new Usuarios();
                    if ($usuario = $m->consultarUsuario($usuario)) {
                        // Compruebo si el password es correcto
                        if (comprobarhash($contrasenya, $usuario['contrasenya'])) {
                            // Obtenemos el resto de datos. los datos del usuario estabán en $usuario y ahora los tenemos en $_Session

                            $_SESSION['id_usuario'] = $usuario['id_usuario'];
                            $_SESSION['usuario'] = $usuario['usuario'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel_usuario'];

                           header('location:index.php?ctl=inicio');
                          
                          





                        }
                    } else {

                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                    }
                } else {

                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            }







        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/formInicioSesion.php';

    }
    
    public function error()
    {

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/error.php';
    }

    public function salir()
    {

        session_destroy(); //destruimos la sesion

        header("location:index.php?ctl=home");
    }
}