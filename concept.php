<?php
require 'config.php';

// Получаем все задачи из базы
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Не указан идентификатор статьи.');
}else{
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare('SELECT  * FROM concepts WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die('Статья не найдена.');
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Определения</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="title"><?= htmlspecialchars($article['concept']) ?></h1>
    <div class="definition"><?= nl2br(htmlspecialchars($article['definition'])) ?></div>
    
    <form action="addDefinition.php" method="POST">
        <input type="text" name="definition" placeholder="Определениe..." required>
        <input type="hidden" name="id" value=<?= $id ?>>
        <button type="submit">Изменить</button>
    </form>
    
    <p><a href="index.php">Вернуться назад</a></p>
</body>
</html>