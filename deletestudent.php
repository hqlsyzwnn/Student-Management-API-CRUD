<?php

declare(strict_types=1);

require_once 'db.php';

$db = (new Database()->conn());

$id = $_GET['id'] ?? null;

try {
    $sql = 'DELETE FROM student
            WHERE id = :id';

    $stmt = $db->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);

    http_response_code(200);

    echo json_encode([
        'success' => true,
        'message' => 'Student deleted'
    ]);
} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}