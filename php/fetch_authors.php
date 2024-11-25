<?php
require_once 'connection.php';

try {
    $sql = "SELECT id_autor, nombre, apellido, ciudad, estado, pais FROM autores";
    $stmt = $pdo->query($sql);
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($authors);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
