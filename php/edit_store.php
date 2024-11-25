<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tienda = $_POST['id_tienda'];
    $nombre_tienda = $_POST['nombre_tienda'];
    $direcc_tienda = $_POST['direcc_tienda'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $cod_postal = $_POST['cod_postal'];
    $terminos = $_POST['terminos'];

    try {
        $sql = "UPDATE tiendas SET nombre_tienda = :nombre_tienda, direcc_tienda = :direcc_tienda, ciudad = :ciudad, estado = :estado, pais = :pais, cod_postal = :cod_postal, terminos = :terminos WHERE id_tienda = :id_tienda";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_tienda', $id_tienda);
        $stmt->bindParam(':nombre_tienda', $nombre_tienda);
        $stmt->bindParam(':direcc_tienda', $direcc_tienda);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':cod_postal', $cod_postal);
        $stmt->bindParam(':terminos', $terminos);
        $stmt->execute();

        echo json_encode(['success' => 'Tienda actualizada correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al actualizar la tienda: ' . $e->getMessage()]);
    }
}
?>

