<?php
require_once 'conexion.php';

class Producto {
    public $codigo;
    public $producto;
    public $precio;
    public $cantidad;

    function __construct($data) {
        $this->codigo = $data['codigo'];
        $this->producto = $data['producto'];
        $this->precio = $data['precio'];
        $this->cantidad = $data['cantidad'];
    }

    public function guardar() {
        $db = DB::conectar();
        $sql = "INSERT INTO productos (codigo, producto, precio, cantidad) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->codigo, $this->producto, $this->precio, $this->cantidad]);
        return true;
    }

    public function editar($id) {
        $db = DB::conectar();
        $sql = "UPDATE productos SET codigo=?, producto=?, precio=?, cantidad=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->codigo, $this->producto, $this->precio, $this->cantidad, $id]);
        return true;
    }
}
?>
