<?php
require 'config.php';

// Получаем все задачи из базы
$stmt = $pdo->query("SELECT * FROM concepts ORDER BY concept");
$concepts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вовчик NEWS</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="title">Вовчик NEWS</h1>

    <div class="add-concept">
        <form action="add.php" method="POST">
            <input type="text" name="concept" placeholder="Новоя новость..." required>
            <button type="submit">Добавить</button>
        </form>
    </div>

    <div class="concept-list">
        <?php if (count($concepts) > 0): ?>
            <?php foreach ($concepts as $concept): ?>
                <a href="concept.php?id=<?= urlencode($concept['id']) ?>" class="concept-button">
                    <?= htmlspecialchars($concept['concept']) ?>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class = "no-data">Новостей пока нет.</p>
        <?php endif; ?>
    </div>
</body>
</html>