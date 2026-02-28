<?php
require 'config.php';

$id = trim($_POST['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['definition'])) {
    $definition = trim($_POST['definition']);

    $sql = "UPDATE concepts SET definition = :definition WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['definition' => $definition, 'id' => $id]);
}

// Возвращаемся на главную
header('Location: concept.php?id='.$id);
exit;