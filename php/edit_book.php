<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['book_id'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $pubDate = $_POST['pub_date'];

    try {
        $sql = "UPDATE titulos SET titulo = :title, tipo = :type, precio = :price, fecha_pub = :pub_date WHERE id_titulo = :book_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':book_id', $bookId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':pub_date', $pubDate);
        $stmt->execute();

        echo json_encode(['success' => 'Libro actualizado correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al actualizar el libro: ' . $e->getMessage()]);
    }
}
?>
