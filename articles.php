<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Все статьи</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #fff9fb;
            color: #5a3d5a;
        }

        .container {
            width: 85%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        h1 {
            color: #d48ae6;
            text-align: center;
            margin-bottom: 30px;
        }

        .add-button {
            display: inline-block;
            background-color: #c77dff;
            color: white;
            padding: 12px 25px;
            margin-bottom: 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
        }

        .add-button:hover {
            background-color: #b56bff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(199, 125, 255, 0.3);
        }

        .articles-list {
            margin-top: 40px;
        }

        .article {
            background: linear-gradient(135deg, #ffffff 0%, #fff9fb 100%);
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-left: 5px solid #e8a0e8;
        }

        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(212, 138, 230, 0.15);
        }

        .article h2 {
            margin-top: 0;
            color: #9b59b6;
            font-size: 1.5em;
        }

        .article-content {
            margin: 15px 0;
            color: #6d5875;
            line-height: 1.7;
        }

        .article-meta {
            font-size: 0.85em;
            color: #a18da9;
            font-style: italic;
        }
    </style>
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