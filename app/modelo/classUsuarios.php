<?php
/*ponemos las diferentes funciones que se utilizarán para interactuar con la BD. */

class Usuarios extends Modelo {
/*   no uso esta función, porque no devuelve el id del usuario insertado
    public function insertarUsuario($nombre, $apellidos, $email, $telefono, $centro_estudios, $usuario, $contrasenya, $nivel_usuario = 1) {
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, telefono, centro_estudios, usuario, contrasenya, nivel_usuario)
                VALUES (:nombre, :apellidos, :email, :telefono, :centro_estudios, :usuario, :contrasenya, :nivel_usuario)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':centro_estudios', $centro_estudios);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasenya', $contrasenya);
        $stmt->bindParam(':nivel_usuario', $nivel_usuario);
        return $stmt->execute();
    }*/
//NUEVO
public function insertarUsuario($nombre, $apellidos, $email, $telefono, $centro_estudios, $usuario, $contrasenya) {
    $consulta = "INSERT INTO usuarios (nombre, apellidos, email, telefono, centro_estudios, usuario, contrasenya) 
                 VALUES (:nombre, :apellidos, :email, :telefono, :centro_estudios, :usuario, :contrasenya)";
    
    $stmt = $this->conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':centro_estudios', $centro_estudios);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasenya', $contrasenya);

    if ($stmt->execute()) {
        return $this->conexion->lastInsertId(); // Devuelve el ID insertado
    } else {
        return false;
    }
}

public function insertarAsignaturaAlumno($id_usuario, $id_asignatura) {
    $consulta = "INSERT INTO usuarios_asignaturas (id_usuario, id_asignatura) VALUES (:id_usuario, :id_asignatura)";
    $stmt = $this->conexion->prepare($consulta);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':id_asignatura', $id_asignatura);
    return $stmt->execute();
}

    /////////////////
    public function consultarUsuario($usuario) {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarUsuario() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function actualizarUsuario($id_usuario, $nombre, $apellidos, $email, $telefono, $centro_estudios, $usuario, $nivel_usuario) {
        $sql = "UPDATE usuarios SET 
                    nombre = :nombre,
                    apellidos = :apellidos,
                    email = :email,
                    telefono = :telefono,
                    centro_estudios = :centro_estudios,
                    usuario = :usuario,
                    nivel_usuario = :nivel_usuario
                WHERE id_usuario = :id_usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':centro_estudios', $centro_estudios);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':nivel_usuario', $nivel_usuario);
        return $stmt->execute();
    }
    public function eliminarUsuario($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_alumno = :id_alumno";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_alumno', $id_usuario);
        return $stmt->execute();
    }
//función que devuelve las asignaturas del usuario logueado
public function obtenerAsignaturasUsuario($id_usuario) {
    $consulta = "SELECT a.nombre_asignatura FROM asignaturas a
                 INNER JOIN usuarios_asignaturas ua ON a.id_asignatura = ua.id_asignatura
                 WHERE ua.id_usuario = :id_usuario";

    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':id_usuario', $id_usuario);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_COLUMN); // Devuelve un array de nombres
}

}

?>