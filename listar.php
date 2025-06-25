<?php
header("Content-Type: application/json; charset=UTF-8");
require_once 'Modelo/conexion.php';

try {
    $db = DB::conectar();
    $stmt = $db->query("SELECT * FROM productos ORDER BY id DESC");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $productos
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error al listar productos'
    ]);
}
