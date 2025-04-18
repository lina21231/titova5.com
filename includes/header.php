<?php
$menuItems = [
    'Главная' => '/index.php',
    'О нас' => '/pages/about.php',
    'Контакты' => '/pages/contact.php'
];
?>
<header>
    <nav>
        <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/pages/about.php">О нас</a></li>
            <li><a href="/pages/contact.php">Контакты</a></li>
            <?php foreach ($menuItems as $title => $url): ?>
                <li>
                    <a href="<?= $url ?>" <?= $_SERVER['REQUEST_URI'] == $url ? 'class="active"' : '' ?>>
                        <?= $title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

