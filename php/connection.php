<?php
// Archivo: connection.php
$host = 'sql311.infinityfree.com';
$dbname = 'if0_37752925_Libreria';
$username = 'if0_37752925';
$password = 'Jacm2303a';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
