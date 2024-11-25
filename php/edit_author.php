<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $authorId = $_POST['author_id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    try {
        $sql = "UPDATE autores SET nombre = :name, apellido = :lastname, ciudad = :city, estado = :state, pais = :country WHERE id_autor = :author_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':author_id', $authorId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':country', $country);
        $stmt->execute();

        echo json_encode(['success' => 'Autor actualizado correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al actualizar el autor: ' . $e->getMessage()]);
    }
}
?>
