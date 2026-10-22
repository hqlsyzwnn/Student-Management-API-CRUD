<?php

declare(strict_types=1);

header('Content-Type: application/json');

require_once 'db.php';

$db = (new Database()->conn());

$data = json_decode(file_get_contents('php://input'), true);

$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$course = trim($data['course'] ?? '');
$no_phone = trim($data['no_phone'] ?? '');

if($name === '' || $email === '' || $course === '' || $no_phone === ''){
    http_response_code(422);

    echo json_encode([
        'success' => false,
        'message' => 'All fields required'
    ]);

    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);

    echo json_encode([
        'success' => false,
        'message' => 'Email must be completed'
    ]);

    exit;
}

try {
    $sql = 'INSERT INTO student (name, email, course, no_phone)
            VALUES (:name, :email, :course, :no_phone)';

    $stmt = $db->prepare($sql);

    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'course' => $course,
        'no_phone' => $no_phone
    ]);

    http_response_code(201);

    echo json_encode([
        'success' => true,
        'message' => 'Student created successfully'
    ]);
} catch (PDOException $e) {
    http_response_code(409);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}