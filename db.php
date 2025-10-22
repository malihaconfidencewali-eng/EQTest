<?php
// db.php
// Database connection using PDO. Use this file in all other php files via require_once.

$DB_HOST = 'localhost'; /* change if your DB host differs */
$DB_NAME = 'dby6tbrzdjmu1q';
$DB_USER = 'ueyhm8rqreljw';
$DB_PASS = 'gutn2hie5vxa';
$DB_CHAR = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHAR}";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    // In production don't echo full error — but for development show readable message
    http_response_code(500);
    echo "Database connection failed: " . htmlspecialchars($e->getMessage());
    exit;
}
?>
