<?php
require_once 'db.php'; // Подключение к базе данных

// Получение параметра filter из GET запроса
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

switch ($filter) {
    case 'completed':
        $whereClause = "WHERE completed = 1"; // Только выполненные задачи
        break;
    case 'incomplete':
        $whereClause = "WHERE completed = 0"; // Только невыполненные задачи
        break;
    default:
        $whereClause = ""; // Все задачи
}

// Запрос к базе данных для получения списка задач
$sql = "SELECT * FROM tasks " . $whereClause;
$result = $conn->query(query: $sql);

if ($result->num_rows > 0) {
    $tasks = [];
    
    while ($row = $result->fetch_assoc()) {
        $tasks[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'completed' => $row['completed']
        ];
    }

    http_response_code(response_code: 200); // Код успешного выполнения 200 OK
    echo json_encode(value: ['tasks' => $tasks]);
} else {
    http_response_code(response_code: 404); // Код ошибки 404 Not Found
    echo json_encode(value: ['error' => 'No tasks found']);
}
?>