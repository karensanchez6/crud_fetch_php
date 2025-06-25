<?php
class DB {
    public static function conectar() {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=productosdb", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die(json_encode(['success' => false, 'message' => 'Error de conexión']));
        }
    }
}
?>
