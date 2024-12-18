<?php
require_once 'db.php';

$id = isset($_GET['id']) ? intval(value: $_GET['id']) : null;

if (!$id) {
    http_response_code(response_code: 400);
    echo json_encode(value: ['error' => 'ID is required']);
    exit();
}

try {
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare(query: $sql);
    $stmt->bind_param(types: "i", var: $id);

    if (!$stmt->execute()) {
        throw new Exception(message: 'Ошибка выполнения запроса');
    }

    http_response_code(response_code: 200);
    echo json_encode(value: ['message' => 'Task deleted successfully']);
} catch (Exception $e) {
    http_response_code(response_code: 500);
    echo json_encode(value: ['error' => $e->getMessage()]);
}