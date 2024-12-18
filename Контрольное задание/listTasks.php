<?php
require_once 'db.php';

try {
    // Получение всех задач из базы данных
    $sql = "SELECT * FROM tasks ORDER BY id DESC";
    $result = $conn->query(query: $sql);

    if ($result === false) {
        throw new Exception(message: 'Ошибка выполнения запроса');
    }

    $tasks = [];

    while ($row = $result->fetch_assoc()) {
        $tasks[] = [
            'id' => $row['id'],
            'title' => htmlspecialchars(string: $row['title'], flags: ENT_QUOTES),
            'completed' => $row['completed'] ? true : false
        ];
    }

    header(header: 'Content-Type: application/json');
    echo json_encode(value: $tasks);
} catch (Exception $e) {
    http_response_code(response_code: 500);
    echo json_encode(value: ['error' => $e->getMessage()]);
}