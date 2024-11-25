<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $storeId = $_POST['store_id'];
    $storeName = $_POST['store_name'];
    $storeLocation = $_POST['store_location'];
    $storeManager = $_POST['store_manager'];

    try {
        $sql = "UPDATE tiendas SET nombre = :store_name, ubicacion = :store_location, gerente = :store_manager WHERE id = :store_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':store_id', $storeId);
        $stmt->bindParam(':store_name', $storeName);
        $stmt->bindParam(':store_location', $storeLocation);
        $stmt->bindParam(':store_manager', $storeManager);
        $stmt->execute();

        echo json_encode(['success' => 'Tienda actualizada correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al actualizar la tienda: ' . $e->getMessage()]);
    }
}
?>
