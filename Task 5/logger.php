<?php

// Интерфейс реализует логирование сообщений
interface LoggerInterface {
    public function log(string $message): void;
}

// Класс реалтзует LoggerInterface
class DatabaseLogger implements LoggerInterface {
    protected $pdo;

    // Соединение с базой данных MySQL
    public function __construct() {
        $user = 'root';
        $password = 'mypass';
        $db = 'log_db';
        $host = '127.0.0.1';
        $port = 8800;
        $conn = mysqli_connect(hostname: $host, username: $user, password: $password, database: $db);
        $this->pdo = $conn;
    }

    // Запись в таблицу базы данных
    public function log(string $message): void {
        $sql = "INSERT INTO logs (message, created_at) VALUES (?, NOW())";
        $stmt = $this->pdo->prepare(query: $sql);
        $stmt->bind_param(types: "s", var: $message);
        $stmt->execute();
        $stmt->close();
    }
}

// Создание экземпляра и вызов метода log
$logger = new DatabaseLogger();
$logger->log(message: "Test log");
?>
