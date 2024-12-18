<?php
require_once 'db.php';

$data = json_decode(json: file_get_contents(filename: 'php://input'), associative: true);

// Проверка наличия заголовка задачи
if (!isset($title)) {
    http_response_code(response_code: 400); // Код ошибки 400 Bad Request
    echo json_encode(value: ['error' => 'Title is required']);
    exit();
}

$title = $data['title']; // Заголовок задачи

// Добавляем задачу в базу данных
$sql = "INSERT INTO tasks (title) VALUES (?)";
$stmt = $conn->prepare(query: $sql);
$stmt->bind_param(types: "s", var: $title);

if (!$stmt->execute()) {
    http_response_code(response_code: 500); // Код ошибки 500 Internal Server Error
    echo json_encode(value: ['error' => 'Failed to add task']);
    exit();
}

http_response_code(response_code: 201); // Код успешного создания ресурса 201 Created
echo json_encode(value: ['message' => 'Task added successfully', 'id' => $stmt->insert_id]);
?>