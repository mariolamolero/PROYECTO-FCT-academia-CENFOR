<?php

//funcion para encriptar

function encriptar ($password, $cost=10){
    return password_hash($password,PASSWORD_DEFAULT, ['cost' => $cost]);
}

//funcion para comprobar que la contraseña es correcto

function comprobarhash($pass, $passBD){
    return password_verify($pass, $passBD);
}


?>