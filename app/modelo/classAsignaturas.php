<?php
/*ponemos las diferentes funciones que se utilizarán para interactuar con la BD. */

class Asignaturas extends Modelo {

    public function insertarAsignatura($nombre_asignatura) {
        $consulta = "INSERT INTO asignaturas (nombre_asignatura) VALUES (:nombre_asignatura)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre_asignatura', $nombre_asignatura);
        return $result->execute();
    }

    public function listarAsignaturas() {
        $consulta = "SELECT * FROM asignaturas";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
    public function consultarAsignatura($id_asignatura) {
        $consulta = "SELECT * FROM asignaturas WHERE id_asignatura = :id_asignatura";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_asignatura', $id_asignatura);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function actualizarAsignatura($id_asignatura, $nuevoNombre) {
        $consulta = "UPDATE asignaturas SET nombre_asignatura = :nombre_asignatura WHERE id_asignatura = :id_asignatura";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre_asignatura', $nuevoNombre);
        $result->bindParam(':id_asignatura', $id_asignatura);
        return $result->execute();
    }
    public function eliminarAsignatura($id_asignatura) {
        $consulta = "DELETE FROM asignaturas WHERE id_asignatura = :id_asignatura";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_asignatura', $id_asignatura);
        return $result->execute();
    }*/


    
}
?>