<?php
require_once 'connection.php';

try {
    $sql = "SELECT id, fecha, correo, nombre, asunto, comentario FROM contacto ORDER BY fecha DESC";
    $stmt = $pdo->query($sql);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($contacts);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
