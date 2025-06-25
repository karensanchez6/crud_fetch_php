<?php
header("Content-Type: application/json");
require_once 'Modelo/Productos.php';

$accion = $_POST['accion'];
$data = $_POST;

switch ($accion) {
    case "Guardar":
        $producto = new Producto($data);
        $producto->guardar();
        echo json_encode(['success' => true, 'message' => 'Producto guardado']);
        break;

    case "Modificar":
        $producto = new Producto($data);
        $producto->editar($_POST['id']);
        echo json_encode(['success' => true, 'message' => 'Producto modificado']);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
}
?>
