<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once 'db.php';

$db = (new Database()->conn());

$data = json_decode(file_get_contents('php://input'), true);

if (!is_array($data)) {
    http_response_code(400);

    echo json_encode([
        'success' => false,
        'message' => 'Data tidak sah.'
    ]);

    exit;
}

$id = $_GET['id'] ?? null;
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$course = trim($data['course'] ?? '');
$no_phone = trim($data['no_phone'] ?? '');

try {
    $sql = 'UPDATE student
            SET name = :name,
                email = :email,
                course = :course,
                no_phone = :no_phone
            WHERE id = :id';

    $stmt = $db->prepare($sql);

    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'course' => $course,
        'no_phone' => $no_phone,
        'id' => $id
    ]);

    http_response_code(200);

    echo json_encode([
        'success' => true,
        'message' => 'Edit student success'
    ]);
} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}