<?php
header('Content-Type: application/json');
$data = [
    'success' => true,
    'message' => 'Спасибо! Ваше сообщение отправлено.'
];
echo json_encode($data);