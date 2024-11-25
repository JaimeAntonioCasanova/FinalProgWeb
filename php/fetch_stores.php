<?php
require_once 'connection.php';

try {
    // Consulta para obtener las tiendas
    $sql = "SELECT id, nombre, ubicacion, gerente FROM tiendas";
    $stmt = $pdo->query($sql);
    $stores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($stores);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener las tiendas: ' . $e->getMessage()]);
}
?>
