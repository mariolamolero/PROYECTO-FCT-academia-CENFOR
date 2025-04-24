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


    //funcion para recuperar los bloques según la asignatura
   /* public function obtenerBloques($id_asignatura) {
        $consulta = "SELECT * FROM bloques WHERE id_asignatura = :id_asignatura";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_asignatura', $id_asignatura, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    */
    public function obtenerBloquesPorAsignatura($nombreAsignatura) {
        $sql = "SELECT b.nombre_bloque 
                FROM bloques b
                JOIN asignaturas a ON b.id_asignatura = a.id_asignatura
                WHERE a.nombre_asignatura = :nombre_asignatura";
    
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre_asignatura', $nombreAsignatura, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>