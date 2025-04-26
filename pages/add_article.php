<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);
    
    $result = pg_query_params(
        $conn,
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );
    
    if ($result) {
        header("Location: /articles.php");
        exit;
    } else {
        echo "Ошибка: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить статью</title>
    <style>
        /* Основные стили */
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
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        
        h1 {
            color: #d48ae6;
            text-align: center;
            margin-bottom: 30px;
        }
        
        /* Стили формы */
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #9b59b6;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e8c5f0;
            border-radius: 8px;
            background-color: #fef9ff;
            font-size: 1em;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus,
        textarea:focus {
            border-color: #c77dff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(214, 138, 230, 0.2);
        }
        
        textarea {
            min-height: 200px;
            resize: vertical;
        }
        
        /* Стили кнопок */
        button {
            background-color: #e8a0e8;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            margin: 30px 0;
        }
        
        button:hover {
            background-color: #d48ae6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 138, 230, 0.3);
        }
        
        .back-link {
            display: inline-block;
            color: #c77dff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            color: #9b59b6;
            text-decoration: underline;
        }
        
    </style>
    
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Добавить новую статью</h1>
        <form method="POST" action="/pages/add_article.php">
            <div class="form-group">
                <label for="title">Заголовок:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Содержание:</label>
                <textarea id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit">Опубликовать</button>
        </form>
        <a href="/articles.php" class="back-link">← Назад к статьям</a>
    </div>
</body>
</html>