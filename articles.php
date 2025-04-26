<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Все статьи</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Статьи</h1>
        <a href="/pages/add_article.php" class="add-button">+ Добавить статью</a>
        
        <div class="articles-list">
            <?php
            $result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
            while ($row = pg_fetch_assoc($result)) {
                echo "<div class='article'>
                        <h2>{$row['title']}</h2>
                        <div class='article-content'>{$row['content']}</div>
                        <div class='article-meta'>Опубликовано: {$row['created_at']}</div>
                      </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>