<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['concept'])) {
    $concept = trim($_POST['concept']);

    $stmt = $pdo->prepare("INSERT INTO concepts (concept) VALUES (:concept)");
    $stmt->execute(['concept' => $concept]);
}

// Возвращаемся на главную
header('Location: index.php');
exit;