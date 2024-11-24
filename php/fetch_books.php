<?php
// Archivo: fetch_books.php
require_once 'connection.php';

try {
    $sql = "SELECT titulo, tipo, precio, fecha_pub FROM titulos";
    $stmt = $pdo->query($sql);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($books);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
