<?php include '../includes/header.php'; ?>
<main>
    <h1>Контакты</h1>
    <form id="contactForm" action="/equiv_nanka/includes/handle_contact.php" method="POST">
        <input type="text" name="name" placeholder="Ваше имя" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" placeholder="Сообщение"></textarea>
        <button type="submit">Отправить</button>
    </form>
    <div id="formResponse"></div>
</main>
<?php include '../includes/footer.php'; ?>