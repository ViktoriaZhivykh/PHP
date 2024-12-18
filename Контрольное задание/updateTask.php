<?php
require_once 'db.php';

// Получаем параметры из запроса
$id = isset($_POST['id']) ? intval(value: $_POST['id']) : null;
$completed = $data["completed"];

// Проверяем наличие необходимых параметров
if (!$id || $completed === null) {
    http_response_code(response_code: 400); // Код ошибки 400 Bad Request
    echo json_encode(value: ['error' => 'Missing or invalid parameters']);
    exit();
}

// Обновляем статус задачи в базе данных
$sql = "UPDATE tasks SET completed = ? WHERE id = ?";
$stmt = $conn->prepare(query: $sql);
$stmt->bind_param(types: "ii", var: $completed, vars: $id);

if (!$stmt->execute()) {
    http_response_code(response_code: 500); // Код ошибки 500 Internal Server Error
    echo json_encode(value: ['error' => 'Failed to update task status']);
    exit();
}

http_response_code(response_code: 200); // Код успешного выполнения запроса 200 OK
echo json_encode(value: ['message' => 'Task status updated successfully']);
?>