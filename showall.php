<?php

declare(strict_types=1);

require_once 'db.php';

$db = (new Database()->conn());

try {
    $sql = 'SELECT * FROM student';

    $stmt = $db->query($sql);

    http_response_code(200);

    echo json_encode([
        'success' => true,
        'message' => 'Success retrieve data from database',
        'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
    ]);
} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}