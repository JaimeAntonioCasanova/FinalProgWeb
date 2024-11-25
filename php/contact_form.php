<?php
require_once 'connection.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    try {
        $sql = "INSERT INTO contacto (correo, nombre, asunto, comentario) VALUES (:correo, :nombre, :asunto, :comentario)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();

        echo json_encode(['success' => 'Formulario enviado correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al enviar el formulario: ' . $e->getMessage()]);
    }
}
?>
