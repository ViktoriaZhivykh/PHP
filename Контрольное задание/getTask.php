<?php
require_once 'db.php';

$id = isset($_GET['id']) ? intval(value: $_GET['id']) : null;

if (!$id) {
    http_response_code(response_code: 400);
    echo json_encode(value: ['error' => 'ID is required']);
    exit();
}

try {
    $sql = "SELECT * FROM tasks WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare(query: $sql);
    $stmt->bind_param(types: "i", var: $id);

    if (!$stmt->execute()) {
        throw new Exception(message: 'Ошибка выполнения запроса');
    }

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        http_response_code(response_code: 404);
        echo json_encode(value: ['error' => 'Task not found']);
        exit();
    }

    $task = $result->fetch_assoc();

    header(header: 'Content-Type: application/json');
    echo json_encode(value: [
        'id' => $task['id'],
        'title' => htmlspecialchars(string: $task['title'], flags: ENT_QUOTES),
        'completed' => $task['completed'] ? true : false
    ]);
} catch (Exception $e) {
    http_response_code(response_code: 500);
    echo json_encode(value: ['error' => $e->getMessage()]);
}